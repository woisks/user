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


use Woisks\User\Models\Entity\UserExtendEntity;

/**
 * Class UserExtendRepository.
 *
 * @package Woisks\User\Models\Repository
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/8 13:33
 */
class UserExtendRepository
{
    /**
     * model.  2019/6/8 13:33.
     *
     * @var static \Woisks\User\Models\Entity\UserExtendEntity
     */
    private static $model;

    /**
     * UserExtendRepository constructor. 2019/6/8 13:33.
     *
     * @param \Woisks\User\Models\Entity\UserExtendEntity $userExtend
     *
     * @return void
     */
    public function __construct(UserExtendEntity $userExtend)
    {
        self::$model = $userExtend;
    }


}