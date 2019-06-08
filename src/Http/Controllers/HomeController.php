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

namespace Woisks\User\Http\Controllers;


use Illuminate\Http\Request;
use Validator;

class HomeController extends BaseController
{
    public function created(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'home_country'  => 'required|string',
            'home_province' => 'sometimes|required|string',
            'home_city'     => 'sometimes|required|string',
            'home_county'   => 'sometimes|required|string',
            'home_town'     => 'sometimes|required|string',
            'home_village'  => 'sometimes|required|string',
        ]);
        if ($validator->fails()) {
            return res(422, $validator->errors()->first());
        }

        return $request->all();
    }
}