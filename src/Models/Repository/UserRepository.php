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
     * model.  2019/7/28 16:47.
     *
     * @var static UserEntity
     */
    private static $model;


    /**
     * UserRepository constructor. 2019/7/28 16:47.
     *
     * @param UserEntity $user
     *
     * @return void
     */
    public function __construct(UserEntity $user)
    {
        self::$model = $user;
    }


    /**
     * exists. 2019/7/28 16:47.
     *
     * @param $account_uid
     *
     * @return mixed
     */
    public function exists($account_uid)
    {
        return self::$model->where('account_uid', $account_uid)->exists();
    }

    /**
     * check. 2019/7/28 19:33.
     *
     * @param $name
     *
     * @return mixed
     */
    public function check($name)
    {
        return self::$model->where('name', $name)->exists();
    }

    /**
     * first. 2019/7/28 16:47.
     *
     * @param $account_uid
     *
     * @return mixed
     */
    public function first($account_uid)
    {
        return self::$model->where('account_uid', $account_uid)->first();
    }


    /**
     * created. 2019/7/28 18:03.
     *
     * @param $account_uid
     * @param $name
     * @param $gender
     * @param $birthday
     * @param $sign
     * @param $country_id
     * @param $country
     * @param $province_id
     * @param $province
     * @param $city_id
     * @param $city
     * @param $county_id
     * @param $county
     * @param $town_id
     * @param $town
     *
     * @return mixed
     */
    public function created($account_uid, $name, $gender, $birthday, $sign, $country_id, $country,
                            $province_id, $province, $city_id, $city, $county_id, $county, $town_id, $town)
    {
        return self::$model->create([
            'id'             => create_numeric_id(),
            'account_uid'    => $account_uid,
            'name'           => $name,
            'name_last_time' => Carbon::now()->addMonth(3)->timestamp,
            'sign'           => $sign,
            'gender'         => $gender,
            'birthday'       => $birthday,
            'country_id'     => $country_id,
            'country'        => $country,
            'province_id'    => $province_id,
            'province'       => $province,
            'city_id'        => $city_id,
            'city'           => $city,
            'county_id'      => $county_id,
            'county'         => $county,
            'town_id'        => $town_id,
            'town'           => $town
        ]);
    }


}
