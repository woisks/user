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
 * Class CreateUserRequests.
 *
 * @package Woisks\User\Http\Requests
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/8 20:33
 */
class CreateUserRequests extends Requests
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
            'background' => 'sometimes|required|numeric|digits_between:18,19',
            'avatar'     => 'sometimes|required|numeric|digits_between:18,19',
            'name'       => 'required|string|min:2|max:16',
            'gender'     => 'required|string',
            'sign'       => 'sometimes|string|max:16',
        ];
    }
}