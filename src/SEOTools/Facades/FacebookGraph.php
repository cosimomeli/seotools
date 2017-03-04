<?php

namespace Artesaos\SEOTools\Facades;

use Illuminate\Support\Facades\Facade;

class FacebookGraph extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'seotools.facebook';
    }
}
