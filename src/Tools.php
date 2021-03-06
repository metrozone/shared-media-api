<?php

namespace Attogram\SharedMedia\Api;

/**
 * SharedMedia Tools
 */
class Tools
{
    const VERSION = '1.0.2';

    /**
     * @param array $arrays
     * @return array
     */
    public static function flatten($arrays)
    {
        if (!is_array($arrays)) {
            return $arrays;
        }
        $flat = [];
        foreach ($arrays as $key => $val) {
            $key = strtolower($key);
            if (is_array($val)) {
                $flat[$key] = self::flattenArray($val);
                continue;
            }
            $flat[$key] = $val;
        }
        return $flat;
    }

    /**
     * flatten a multi-dimensional array, with concatenated keys
     *
     * @param array $array
     * @param string $prefix Optional
     * @return array
     */
    public static function flattenArray(array $array, $prefix = '')
    {
        $prefix = self::keySanitize($prefix);
        $result = [];
        foreach ($array as $key => $val) {
            $key = strtolower($key);
            if (is_array($val)) {
                $result += self::flattenArray($val, $prefix.$key.'.');
                continue;
            }
            $key = self::keySanitize($key);
            $newKey = rtrim($prefix.$key, '.');
            $result[$newKey] = $val;
        }
        return $result;
    }

    /**
     * @param string $key
     * @return null|string
     */
    public static function keySanitize($key)
    {
        $discards = [
            'categoryinfo.',
            'imageinfo.0.',
            'extmetadata.',
            'pageprops.',
            'value',
        ];
        if (in_array($key, $discards)) {
            return null;
        }
        return $key;
    }

    /**
     * @param string $string
     * @return boolean
     */
    public static function isGoodString($string)
    {
        if (is_string($string) && $string) {
            return true;
        }
        return false;
    }

    /**
     * implode an array, using | as the glue
     *
     * @param array|mixed $values
     * @return string|mixed
     */
    public static function valuesImplode($values)
    {
        if (!is_array($values)) {
            return $values;
        }
        return implode('|', $values);
    }

    /**
     * make a string safe for web output
     *
     * @param string|mixed $string
     * @return string
     */
    public static function safeString($string)
    {
        if (!is_string($string)) {
            return $string;
        }
        return htmlentities($string);
    }

    /**
     * get a value from an array
     *
     * @param array $array
     * @param mixed|string $value
     * @return mixed|string
     */
    public static function getFromArray($array, $value)
    {
        if (!is_array($array)) {
            return '';
        }
        if (isset($array[$value])) {
            return $array[$value];
        }
        return '';
    }
}
