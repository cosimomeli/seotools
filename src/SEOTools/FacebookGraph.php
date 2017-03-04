<?php


namespace Artesaos\SEOTools;

use Artesaos\SEOTools\Contracts\FacebookGraph as FacebookGraphContract;

class FacebookGraph implements FacebookGraphContract {

    /**
     * @var string
     */
    protected $prefix = 'fb:';

    /**
     * @var array
     */
    protected $html = [];

    /**
     * @var array
     */
    protected $values = [];

    /**
     * @param array $defaults
     */
    public function __construct(array $defaults = []) {
        $this->values = $defaults;
    }

    /**
     * @param bool $minify
     *
     * @return string
     */
    public function generate($minify = false) {
        $this->eachValue($this->values);

        return ($minify) ? implode('', $this->html) : implode(PHP_EOL, $this->html);
    }

    /**
     * Make tags.
     *
     * @param array $values
     * @param null|string $prefix
     *
     * @internal param array $properties
     */
    protected function eachValue(array $values, $prefix = null) {
        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $this->eachValue($value, $key);
            } else {
                if (is_numeric($key)) {
                    $key = $prefix . $key;
                } elseif (is_string($prefix)) {
                    $key = $prefix . ':' . $key;
                }
                $this->html[] = $this->makeTag($key, $value);
            }
        }
    }

    /**
     * @param string $key
     * @param $value
     *
     * @return string
     */
    private function makeTag($key, $value) {
        return '<meta property="' . $this->prefix . strip_tags($key) . '" content="' . strip_tags($value) . '" />';
    }

    /**
     * @param string $key
     * @param string|array $value
     *
     * @return FacebookGraphContract
     */
    public function addValue($key, $value) {
        $this->values[$key] = $value;

        return $this;
    }

    /**
     * @param string $id
     *
     * @return FacebookGraphContract
     */
    public function setAppId($id) {
        return $this->addValue('app_id', $id);
    }

}
