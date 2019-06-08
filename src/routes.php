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

use Woisks\User\Models\Entity\UserAttributeEntity;

Route::prefix('user')
     ->namespace('Woisks\User\Http\Controllers')
     ->group(function () {

         Route::get('/demo', function () {

             return UserAttributeEntity::all();
         });
         Route::middleware('token')->group(function () {

             Route::post('/', 'CreateUserController@create');
             
             Route::post('/create/{type}', 'UserInfoController@create');
             Route::post('/change/{type}', 'UserInfoController@change');

         });


     });