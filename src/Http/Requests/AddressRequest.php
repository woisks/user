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

            'country'  => 'required|numeric|digits_between:1,3',
            'province' => 'sometimes|numeric|digits:6',
            'city'     => 'sometimes|numeric|digits:6',
            'county'   => 'sometimes|numeric|digits:6',
            'town'     => 'sometimes|numeric|digits:9'

        ];
    }
}
