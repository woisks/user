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

class EthnicController extends BaseController
{
    public function created(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ethnic' => 'required|string',
        ]);
        if ($validator->fails()) {
            return res(422, $validator->errors()->first());
        }

        return $request->all();
    }
}