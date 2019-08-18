<?php

namespace Tests;

use Laravel\BrowserKitTesting\TestCase as BaseTestCase;

abstract class BrowserTest extends BaseTestCase
{
    use CreatesApplication;

    public $baseUrl = 'http://codfac-laraprof.test';

    /*
    static function assertEquals($a,$b){
	    return $a == $b;
    }
     */
}
