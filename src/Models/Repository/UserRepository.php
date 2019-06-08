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


use Carbon\Carbon;
use Woisks\User\Models\Entity\UserEntity;

/**
 * Class UserRepository.
 *
 * @package Woisks\User\Models\Repository
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/8 13:30
 */
class UserRepository
{
    /**
     * model.  2019/6/8 13:30.
     *
     * @var static \Woisks\User\Models\Entity\UserEntity
     */
    private static $model;

    /**
     * UserRepository constructor. 2019/6/8 13:30.
     *
     * @param \Woisks\User\Models\Entity\UserEntity $user
     *
     * @return void
     */
    public function __construct(UserEntity $user)
    {
        self::$model = $user;
    }

    /**
     * uidExists. 2019/6/8 21:27.
     *
     * @param int $account_uid
     *
     * @return bool
     */
    public function uidExists(int $account_uid): bool
    {
        return self::$model->where('account_uid', $account_uid)->exists();
    }

    /**
     * created. 2019/6/8 21:44.
     *
     * @param int    $account_uid
     * @param int    $background
     * @param int    $avatar
     * @param string $name
     * @param string $gender
     * @param string $sign
     *
     * @return mixed
     */
    public function created(int $account_uid, int $background, int $avatar, string $name, string $gender, string $sign)
    {
        return self::$model->create([
            'id'                  => create_numeric_id(),
            'account_uid'         => $account_uid,
            'background_photo_id' => $background,
            'avatar_photo_id'     => $avatar,
            'name'                => $name,
            'name_last_time'      => Carbon::now()->timestamp,
            'gender'              => $gender,
            'sign'                => $sign
        ]);
    }


}