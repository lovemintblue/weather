<?php

/*
 * This file is part of the zcysunshine/weather.
 *
 * (c) lovebintlove @ 2791548686@qq.com
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Zcy\Weather;

use Illuminate\Support\Facades\Log;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        Log::info('天气服务注册');
        $this->app->singleton(Weather::class, function () {
            return new Weather(config('services.weather.key'));
        });
        $this->app->alias(Weather::class, 'weather');
    }

    public function provides()
    {
        return [Weather::class, 'weather'];
    }
}
