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

            'name'     => 'required|string|min:2|max:15',
            'gender'   => ['required', Rule::in(['男', '女'])],
            'birthday' => 'required|date',

            'sign' => 'sometimes|string|max:45',

            'country_id' => 'sometimes|numeric',
            'country'    => 'sometimes|string|max:45',

            'province_id' => 'sometimes|numeric',
            'province'    => 'sometimes|string|max:45',

            'city_id' => 'sometimes|numeric',
            'city'    => 'sometimes|string|max:45',

            'county_id' => 'sometimes|numeric',
            'county'    => 'sometimes|string|max:45',

            'town_id' => 'sometimes|numeric',
            'town'    => 'sometimes|string|max:45',

        ];
    }
}
