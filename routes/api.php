<?php

use Illuminate\Http\Request;

Route::prefix('v1')
    ->namespace('Api')
    ->name('api.v1.')
    ->group(function () {
        Route::middleware('throttle:' . config('api.rate_limits.sign'))
            ->group(function () {
                // 短信验证码
                Route::post('verificationCodes', 'VerificationCodesController@store')
                    ->name('verificationCodes.store');
                // 用户注册
                Route::post('users', 'UsersController@store')
                    ->name('users.store');
                // 图片验证码
                Route::post('captchas', 'CaptchasController@store')
                    ->name('captchas.store');
            });

        Route::middleware('throttle:' . config('api.rate_limits.access'))
            ->group(function () {

            });
    });