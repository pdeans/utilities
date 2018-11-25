<?php

namespace pdeans\Utilities;

use ForceUTF8\Encoding as UTF8Encoding;

/**
 * Encoding class
 *
 * Collection of character encoding helper methods.
 */
class Encoding
{
    /**
     * Fix a multi-encoded UTF8 string
     *
     * @param string      $subject
     * @param string|null $options
     *
     * @return string
     */
    public static function fixUtf8(string $subject, $options = null)
    {
        if ($options !== null) {
            return UTF8Encoding::fixUTF8($subject, $options);
        }

        return UTF8Encoding::fixUTF8($subject);
    }

    /**
     * Convert string to ISO 8859-1
     *
     * @param string      $subject
     * @param string|null $options
     *
     * @return string
     */
    public static function toLatin1(string $subject, $options = null)
    {
        if ($options !== null) {
            return UTF8Encoding::toLatin1($subject, $options);
        }

        return UTF8Encoding::toLatin1($subject);
    }

    /**
     * Convert string to UTF8
     *
     * @param string $subject
     *
     * @return string
     */
    public static function toUtf8(string $subject)
    {
        return UTF8Encoding::toUTF8($subject);
    }
}
