<?php

namespace App\Helpers;

use Midtrans\Config;

class MidtransHelper
{
    public static function init()
    {
        // Set your Merchant Server Key and Client Key
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }
}
