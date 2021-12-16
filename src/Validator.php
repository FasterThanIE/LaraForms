<?php

namespace FasterThanIE\LaraForms;

class Validator
{
    /**
     * char, string, tinyText, text, mediumText, longText
    integer, tinyInteger, smallInteger, mediumInteger, bigInteger,
    date, datetime,dateTimeTz
     *
    float, double, decimal
    boolean
    enum
    set
    json, jsonb,
    time, timeTz, timestamp, timestampTz
    year,
    binary,
    ipaddress,
    macAddress,
    geometry,
    point,
    linestring,
    polygon,
    geometrycollection,
    multipoint,
    multilinestring,
    multipolygon,
    multipolygonz,
    computed,
     */

    const FIELD_TYPE_CHAR = "char";
    const FIELD_TYPE_STRING = "string";
    const FIELD_TYPE_TINY_TEXT = "tinytext";
    const FIELD_TYPE_TINY_MEDIUM_TEXT = "mediumtext";
    const FIELD_TYPE_TINY_LONG_TEXT = "longtext";

    const FIELD_TYPE_INTEGER = "integer";
    const FIELD_TYPE_TINY_INTEGER = "tinyint";
    const FIELD_TYPE_SMALL_INTEGER = "smallint";
    const FIELD_TYPE_MEDIUM_INTEGER = "mediumint";
    const FIELD_TYPE_BIG_INTEGER = "bigint";

    const FIELD_TYPE_DATE_TIME = "datetime";
    const FIELD_TYPE_DATE = "date";
    const FIELD_TYPE_DATE_TIME_TZ = "datetimeTz";

    const FIELD_TYPE_BOOLEAN = "boolean";


    protected CONST FORM_TYPE_TEXT = "text";
    protected CONST FORM_TYPE_NUMBER = "number";
    protected CONST FORM_TYPE_BOOL = "number";
    protected CONST FORM_TYPE_DATE_TIME = "datetime";
    protected CONST FORM_TYPE_DATE = "date";

    const FORM_RULE_MIN = "min";
    const FORM_RULE_MAX = "max";

    const TYPE_MAPPER = [
        //char, string, tinyText, text, mediumText, longText
        self::FIELD_TYPE_CHAR => self::FORM_TYPE_TEXT,
        self::FIELD_TYPE_STRING => self::FORM_TYPE_TEXT,
        self::FIELD_TYPE_TINY_TEXT => self::FORM_TYPE_TEXT,
        self::FIELD_TYPE_TINY_MEDIUM_TEXT => self::FORM_TYPE_TEXT,
        self::FIELD_TYPE_TINY_LONG_TEXT => self::FORM_TYPE_TEXT,

        // integer, tinyInteger, smallInteger, mediumInteger, bigInteger,
        self::FIELD_TYPE_INTEGER => self::FORM_TYPE_NUMBER,
        self::FIELD_TYPE_TINY_INTEGER =>self::FORM_TYPE_NUMBER,
        self::FIELD_TYPE_SMALL_INTEGER => self::FORM_TYPE_NUMBER,
        self::FIELD_TYPE_MEDIUM_INTEGER => self::FORM_TYPE_NUMBER,
        self::FIELD_TYPE_BIG_INTEGER => self::FORM_TYPE_NUMBER,

        //date, datetime,dateTimeTz
        self::FIELD_TYPE_DATE_TIME => self::FORM_TYPE_DATE_TIME,
        self::FIELD_TYPE_DATE_TIME_TZ => self::FORM_TYPE_DATE_TIME,
        self::FIELD_TYPE_DATE => self::FORM_TYPE_DATE,

        // Boolean
        self::FIELD_TYPE_BOOLEAN => self::FORM_TYPE_BOOL,
    ];

    const FORM_RULES = [

        /**
         * Boolean rules
         */
        self::FIELD_TYPE_BOOLEAN => [
            self::FORM_RULE_MIN => 0,
            self::FORM_RULE_MAX => 1,
        ],

        /**
         * Integer rules
         */
        self::FIELD_TYPE_TINY_INTEGER => [
            self::FORM_RULE_MIN => 0,
            self::FORM_RULE_MAX => 255,
        ],
        self::FIELD_TYPE_SMALL_INTEGER => [
            self::FORM_RULE_MIN => -32,768,
            self::FORM_RULE_MAX => 32,768,
        ],
        self::FIELD_TYPE_INTEGER => [
            self::FORM_RULE_MIN => -2147483648,
            self::FORM_RULE_MAX => 2147483647,
        ],
        self::FIELD_TYPE_BIG_INTEGER => [
            self::FORM_RULE_MIN => -9223372036854775808,
            self::FORM_RULE_MAX => 9223372036854775808,
        ]
    ];
}
