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
    ->middleware('throttle:60,1')
    ->namespace('Woisks\User\Http\Controllers')
    ->group(function () {

        //检查昵称是否可用
        Route::any('/check/{name}', 'CheckController@checkName');
        //根据uid获取用户信息
        Route::get('/{account_uid}', 'GetController@getUser')->where(['account_uid' => '[0-9]+']);
        Route::middleware('token')->group(function () {

            //检查用户信息是否存在
            Route::post('/check', 'CheckController@checkUser');

            Route::post('/', 'CreateController@create');
            Route::post('/address', 'AddressController@address');
            Route::post('/sign', 'SignController@sign');
            Route::post('/background/{id}', 'BackgroundController@background');
            Route::post('/avatar/{id}', 'AvatarController@avatar');
            Route::post('/name/{name}', 'NameController@name');
        });
    });
