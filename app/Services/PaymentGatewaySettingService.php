<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;



class PaymentGatewaySettingService
{

    public function getSettings() {
        return Cache::rememberForever('key', function () {
    
        });
    }
}
