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

namespace Woisks\User\Http\Requests;


use Illuminate\Validation\Rule;

/**
 * Class CreateRequest.
 *
 * @package Woisks\User\Http\Requests
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/8 20:33
 */
class CreateRequest extends Requests
{

    /**
     * rules. 2019/6/8 20:33.
     *
     *
     * @return array|mixed
     */
    public function rules()
    {
        return [

            'background' => 'sometimes|numeric',
            'avatar'     => 'sometimes|numeric',

            'name'     => 'required|string|min:2|max:15',
            'gender'   => ['required', Rule::in(['男', '女'])],
            'birthday' => 'required|date',

            'sign' => 'sometimes|string|max:45',

            'country'  => 'required|numeric|digits_between:1,3',
            'province' => 'sometimes|numeric|digits:6',
            'city'     => 'sometimes|numeric|digits:6',
            'county'   => 'sometimes|numeric|digits:6',
            'town'     => 'sometimes|numeric|digits:9'

        ];
    }
}
