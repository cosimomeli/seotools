<?php


namespace Artesaos\SEOTools\Contracts;


interface FacebookGraph {

    /**
     * @param array $defaults
     */
    public function __construct(array $defaults = []);

    /**
     * @param bool $minify
     *
     * @return string
     */
    public function generate($minify = false);

    /**
     * @param string $key
     * @param string|array $value
     *
     * @return FacebookGraph
     */
    public function addValue($key, $value);

    /**
     * @param string $id
     *
     * @return FacebookGraph
     */
    public function setAppId($id);

}