<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Validator;
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
        Schema::defaultStringLength(191);

        // Validator::extend('later_than_field', function($attribute, $value, $parameters, $validator) {
        //     // $min_field = $parameters[0];
        //     $data = $validator->getData();
        //     // $min_value = $data[$min_field];
        //     // return $value > $min_value;
        //   });   
      
        //   Validator::replacer('later_than_field', function($message, $attribute, $rule, $parameters) {
        //     return str_replace(':field', $parameters[0], $message);
        //   });
    }
}
