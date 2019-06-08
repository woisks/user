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

namespace Woisks\User\Models\Repository;


use Woisks\User\Models\Entity\UserAttributeEntity;

/**
 * Class UserAttributeRepository.
 *
 * @package Woisks\User\Models\Repository
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/8 13:32
 */
class UserAttributeRepository
{
    /**
     * model.  2019/6/8 13:32.
     *
     * @var static \Woisks\User\Models\Entity\UserAttributeEntity
     */
    private static $model;

    /**
     * UserAttributeRepository constructor. 2019/6/8 13:32.
     *
     * @param \Woisks\User\Models\Entity\UserAttributeEntity $userAttribute
     *
     * @return void
     */
    public function __construct(UserAttributeEntity $userAttribute)
    {
        self::$model = $userAttribute;
    }


}