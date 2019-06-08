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


use Woisks\User\Models\Entity\UserInfoEntity;

/**
 * Class UserInfoRepository.
 *
 * @package Woisks\User\Models\Repository
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/8 13:34
 */
class UserInfoRepository
{
    /**
     * model.  2019/6/8 13:34.
     *
     * @var static \Woisks\User\Models\Entity\UserInfoEntity
     */
    private static $model;

    /**
     * UserInfoRepository constructor. 2019/6/8 13:34.
     *
     * @param \Woisks\User\Models\Entity\UserInfoEntity $userInfo
     *
     * @return void
     */
    public function __construct(UserInfoEntity $userInfo)
    {
        self::$model = $userInfo;
    }

}