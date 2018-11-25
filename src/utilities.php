<?php

use pdeans\Utilities\Encoding;
use pdeans\Utilities\FileReader;
use pdeans\Utilities\Miva;
use pdeans\Utilities\VarDumper;

if (!function_exists('dp')) {
    /**
     * Print variable with optional label.
     *
     * @param mixed  $data
     * @param string $label
     */
    function dp($data, $label = '')
    {
        VarDumper::dp($data, $label);
    }
}

if (!function_exists('dpx')) {
    /**
     * Print string with all applicable characters converted to HTML entities.
     *
     * @param string $data
     * @param string $label
     */
    function dpx($data, $label = '')
    {
       VarDumper::dpx($data, $label);
    }
}

if (!function_exists('fix_utf8')) {
    /**
     * Fix a multi-encoded UTF8 string
     *
     * @param string      $subject
     * @param string|null $options
     *
     * @return string
     */
    function fix_utf8(string $subject, $options = null)
    {
        if ($options !== null) {
            return Encoding::fixUtf8($subject, $options);
        }

        return Encoding::fixUtf8($subject);
    }
}

if (!function_exists('miva_deserialize_array')) {
    /**
     * Deserialize Miva data into an associative array
     *
     * @param string $mv_serialized_str
     *
     * @return array
     */
    function miva_deserialize_array($mv_serialized_str)
    {
        return Miva::deserialize($mv_serialized_str);
    }
}

if (!function_exists('miva_generate_code')) {
    /**
     * Generate a Miva code value (ex: category code, product code, etc.)
     *
     * @param string  $subject
     * @param integer $max_length
     * @param string  $separator
     * @param string  $case
     *
     * @return string
     */
    function miva_generate_code($subject, $max_length = 50, $separator = '-', $case = 'lowercase')
    {
        return Miva::createCode($subject, $max_length, $separator, $case);
    }
}

if (!function_exists('miva_generate_login')) {
    /**
     * Create a customer login from an email address
     *
     * @param string  $email
     * @param integer $max_length
     *
     * @return string
     */
    function miva_generate_login($email, $max_length = 50)
    {
        return Miva::createLoginFromEmail($email, $max_length);
    }
}

if (!function_exists('read_csv')) {
    /**
     * Convert CSV file to League\Csv\Reader object
     *
     * @param string  $csv_file
     * @param boolean $has_header_row
     *
     * @return League\Csv\Reader
     */
    function read_csv($csv_file, $has_header_row = true)
    {
        return FileReader::csvToReader($csv_file, $has_header_row);
    }
}

if (!function_exists('read_xlsx')) {
    /**
     * Convert Xlsx or Xls file to PhpOffice\PhpSpreadsheet\Spreadsheet object
     *
     * @param string               $xlsx_file
     * @param boolean|string|array $load_sheets
     *
     * @return PhpOffice\PhpSpreadsheet\Spreadsheet
     */
    function read_xlsx($xlsx_file, $load_sheets = false)
    {
        return FileReader::xlsxToReader($xlsx_file, $load_sheets);
    }
}

if (!function_exists('to_utf8')) {
    /**
     * Convert string to UTF8
     *
     * @param string $subject
     *
     * @return string
     */
    function to_utf8(string $subject)
    {
        return Encoding::toUtf8($subject);
    }
}

if (!function_exists('to_latin1')) {
    /**
     * Convert string to ISO 8859-1
     *
     * @param string      $subject
     * @param string|null $options
     *
     * @return string
     */
    function to_latin1(string $subject, $options = null)
    {
        if ($options !== null) {
            return Encoding::toLatin1($subject, $options);
        }

        return Encoding::toLatin1($subject);
    }
}

if (!function_exists('vd')) {
    /**
     * Pretty var dumper with optional label.
     *
     * @param mixed  $data
     * @param string $label
     */
    function vd($data, $label = '')
    {
        VarDumper::vd($data, $label);
    }
}

if (!function_exists('xlsx_to_array')) {
    /**
     * Convert Xlsx or Xls file to an array
     *
     * @param string               $xlsx_file
     * @param boolean|string|array $load_sheets
     * @param boolean              $parse_header_row
     *
     * @return array
     */
    function xlsx_to_array($xlsx_file, $load_sheets = false, $parse_header_row = true)
    {
        return FileReader::xlsxToArray($xlsx_file, $load_sheets, $parse_header_row);
    }
}
