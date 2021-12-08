<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/Carbon/src/Carbon/Carbon.php';
require_once dirname(__FILE__) . '/Carbon/src/Carbon/CarbonPeriod.php';
require_once dirname(__FILE__) . '/Carbon/src/Carbon/CarbonInterval.php';

use Carbon\Carbon;
use Carbon\CarbonPeriod;

class Carbonlib extends Carbon
{
    public function getPeriod($startDate, $lastDate)
    {
        return CarbonPeriod::create($startDate, $lastDate);
    }
}