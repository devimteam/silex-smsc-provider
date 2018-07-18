<?php

namespace Devim\Provider\SmscServiceProvider\Options;

/**
 * Interface Option
 * @package Devim\Provider\SmscServiceProvider\Options
 */
interface Option
{
    /**
     * @param array $options
     * @return array
     */
    public function apply(array $options) : array;
}