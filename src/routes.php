<?php

declare(strict_types=1);

/*
 * +----------------------------------------------------------------------+
 * |                   At all timesI love the moment                      |
 * +----------------------------------------------------------------------+
 * | Copyright (c) 2019 www.Woisk.com All rights reserved.                |
 * +----------------------------------------------------------------------+
 * |  Author:  Maple Grove  <bolelin@126.com>   QQ:364956690   286013629  |
 * +----------------------------------------------------------------------+
 */

Route::prefix('user')
    ->namespace('Woisks\User\Http\Controllers')
    ->group(function () {

        Route::any('/check/{name}', 'ChangeController@check');
        Route::middleware('token')->group(function () {

            Route::post('/', 'CreateController@create');

            Route::post('/address', 'ChangeController@address');
            Route::post('/sign', 'ChangeController@sign');
            Route::post('/name/{name}', 'ChangeController@name');

        });


    });
