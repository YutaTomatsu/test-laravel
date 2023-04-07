<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('convert_to_half_width', function ($attribute, $value, $parameters, $validator) {
    $value = mb_convert_kana($value, 'a', 'UTF-8');
    $validator->setData(array_merge($validator->getData(), [$attribute => $value]));
    return true;
});
    }
}
