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

namespace Woisks\User\Models\Entity;


/**
 * Class UserEntity.
 *
 * @package Woisks\User\Models\Entity
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/8 13:19
 */
class UserEntity extends Models
{
    /**
     * table.  2019/6/8 13:19.
     *
     * @var  string
     */
    protected $table = 'user';
    /**
     * fillable.  2019/6/8 13:19.
     *
     * @var  array
     */
    protected $fillable = [
        'id',
        'account_uid',
        'background_photo_id',
        'avatar_photo_id',
        'name',
        'name_last_time',
        'gender',
        'sign',
        'created_at',
        'updated_at',
        'birthday',
        
        'country_id',
        'country',
        'province_id',
        'province',
        'city_id',
        'city',
        'county_id',
        'county',
        'town_id',
        'town'
    ];
    /**
     * hidden.  2019/6/8 21:02.
     *
     * @var  array
     */
    protected $hidden = [
        'id'
    ];
}
