<?php

namespace pdeans\Utilities;

use League\Csv\CharsetConverter;
use League\Csv\Reader;
use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * FileReader class
 *
 * Collection of helper methods to read and parse files.
 */
class FileReader
{
    /**
     * Convert CSV file to League\Csv\Reader object
     *
     * @param string  $csv_file
     * @param boolean $has_header_row
     *
     * @return League\Csv\Reader
     */
    public static function csvToReader($csv_file, $has_header_row = true)
    {
        $csv = Reader::createFromPath($csv_file, 'r');

        if ($has_header_row) {
            $csv->setHeaderOffset(0);
        }

        $input_bom = $csv->getInputBOM();

        if ($input_bom === Reader::BOM_UTF16_LE || $input_bom === Reader::BOM_UTF16_BE) {
            CharsetConverter::addTo($csv, 'utf-16', 'utf-8');
        }

        return $csv;
    }

    /**
     * Convert Xlsx or Xls file to an array
     *
     * @param string               $xlsx_file
     * @param boolean|string|array $load_sheets
     * @param boolean              $parse_header_row
     *
     * @return array
     */
    public static function xlsxToArray($xlsx_file, $load_sheets = false, $parse_header_row = true)
    {
        $spreadsheet = self::xlsxToReader($xlsx_file, $load_sheets);
        $worksheet   = $spreadsheet->getActiveSheet()->toArray();

        if ($parse_header_row) {
            $header_row = array_shift($worksheet);

            array_walk($worksheet, function(&$row) use ($header_row) {
                $row = array_combine($header_row, $row);
            });
        }

        return $worksheet;
    }

    /**
     * Convert Xlsx or Xls file to PhpOffice\PhpSpreadsheet\Spreadsheet object
     *
     * @param string               $xlsx_file
     * @param boolean|string|array $load_sheets
     *
     * @return PhpOffice\PhpSpreadsheet\Spreadsheet
     */
    public static function xlsxToReader($xlsx_file, $load_sheets = false)
    {
        $reader = IOFactory::createReaderForFile($xlsx_file);
        $reader->setReadDataOnly(true);

        if ($load_sheets && (is_string($load_sheets) || is_array($load_sheets))) {
            $reader->setLoadSheetsOnly($load_sheets);
        } else {
            $reader->setLoadAllSheets();
        }

        return $reader->load($xlsx_file);
    }
}
