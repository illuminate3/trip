<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Log;
class LaravelLoggerProxy
{
    public function log( $msg ) {
        Log::info($msg);
    }
}