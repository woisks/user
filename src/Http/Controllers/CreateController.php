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

namespace Woisks\User\Http\Controllers;


use Illuminate\Http\JsonResponse;
use Woisks\AreaBasis\Models\Services\AreaServices;
use Woisks\Jwt\Services\JwtService;
use Woisks\Photo\Models\Services\PhotoServices;
use Woisks\User\Http\Requests\CreateRequest;
use Woisks\User\Models\Repository\UserRepository;

/**
 * Class ChangeController.
 *
 * @package Woisks\User\Http\Controllers
 *
 * @Author Maple Grove  <bolelin@126.com> 2019/7/28 17:08
 */
class CreateController extends BaseController
{
    /**
     * userRepo.  2019/7/28 17:08.
     *
     * @var  UserRepository
     */
    private $userRepo;

    /**
     * ChangeController constructor. 2019/7/28 17:08.
     *
     * @param UserRepository $userRepo
     *
     * @return void
     */
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }


    /**
     * create. 2019/8/1 19:43.
     *
     * @param CreateRequest $request
     *
     * @return JsonResponse
     * @throws \Exception
     */
    public function create(CreateRequest $request)
    {
        $background = $request->input('background', 0);
        $avatar     = $request->input('avatar', 0);

        $name     = $request->input('name');
        $gender   = $request->input('gender');
        $birthday = $request->input('birthday');

        $sign = $request->input('sign', '');

        $country  = $request->input('country');
        $province = $request->input('province', 0);
        $city     = $request->input('city', 0);
        $county   = $request->input('county', 0);
        $town     = $request->input('town', 0);

        if ($this->userRepo->exists(JwtService::jwt_account_uid())) {
            return res(409, 'user info exists');
        }

        if ($background) {
            if (!PhotoServices::exists($background)) return res(404, 'background data not exists ');
        }

        if ($avatar) {
            if (!PhotoServices::exists($avatar)) return res(404, 'avatar data not exists ');
        }

        //效验地址数据
        $area = AreaServices::cascade($country, $province, $city, $county, $town);

        //创建用户信息
        $db = $this->userRepo->created(JwtService::jwt_account_uid(), $background, $avatar,
            $name, $gender, $birthday, $sign, $area['country_id'], $area['country'],
            $area['province_id'], $area['province'], $area['city_id'], $area['city'],
            $area['county_id'], $area['county'], $area['town_id'], $area['town']);

        if ($db) {
            //统计地址
            AreaServices::increment('user', 'country', $area['country_id']);
            AreaServices::increment('user', 'province', $area['province_id']);
            AreaServices::increment('user', 'city', $area['city_id']);
            AreaServices::increment('user', 'county', $area['county_id']);
            AreaServices::increment('user', 'town', $area['town_id']);

            return res(200, 'success', $db);
        }

        return res(500, 'Come back later');
    }

}
