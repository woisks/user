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
 * Class UserInfoEntity.
 *
 * @package Woisks\User\Models\Entity
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/8 13:27
 */
class UserInfoEntity extends Models
{
    /**
     * table.  2019/6/8 13:27.
     *
     * @var  string
     */
    protected $table = 'user_info';
    /**
     * fillable.  2019/6/8 13:27.
     *
     * @var  array
     */
    protected $fillable = [
        'id',
        'name',
        'count'
    ];
    /**
     * timestamps.  2019/6/8 13:27.
     *
     * @var  bool
     */
    public $timestamps = false;
}