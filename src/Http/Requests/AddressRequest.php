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


/**
 * Class AddressRequest.
 *
 * @package Woisks\User\Http\Requests
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/8 20:33
 */
class AddressRequest extends Requests
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

            'country_id' => 'required|numeric',
            'country'    => 'required|string|max:45',

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
