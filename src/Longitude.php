<?php

namespace Encima\PostGIS;

class Longitude extends CoordinateBase
{
    public $coordinatesIndex = 0;

    /**
     * Create a new field.
     *
     * @param  string  $name
     * @param  string|null  $attribute
     * @param  mixed|null  $resolveCallback
     * @return void
     */
    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);
        $this->longitudeKey = $attribute;
        $precision = function_exists('config') ? config('postgis.precision', 6) : 6;
        $this->withMeta(['step' => 1 / pow(10, $precision)]);
    }
}
