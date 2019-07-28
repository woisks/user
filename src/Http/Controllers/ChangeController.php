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


use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Woisks\Jwt\Services\JwtService;
use Woisks\User\Http\Requests\AddressRequest;
use Woisks\User\Http\Requests\SignRequest;
use Woisks\User\Models\Repository\UserRepository;

/**
 * Class ChangeController.
 *
 * @package Woisks\User\Http\Controllers
 *
 * @Author Maple Grove  <bolelin@126.com> 2019/7/28 19:56
 */
class ChangeController extends BaseController
{
    /**
     * userRepo.  2019/7/28 19:56.
     *
     * @var  UserRepository
     */
    private $userRepo;

    /**
     * ChangeController constructor. 2019/7/28 19:56.
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
     * check. 2019/7/28 19:27.
     *
     * @param $name
     *
     * @return JsonResponse
     */
    public function check($name)
    {
        if (strlen($name) > 15) {
            return res(422, ' Too long a name');
        }

        if ($this->userRepo->check($name)) {
            return res(422, 'name exists');
        }

        return res(200, 'success');
    }

    /**
     * name. 2019/7/28 19:54.
     *
     * @param $name
     *
     * @return JsonResponse
     */
    public function name($name)
    {
        if (strlen($name) > 15) {
            return res(422, ' Too long a name');
        }

        if ($this->userRepo->check($name)) {
            return res(422, 'name exists');
        }

        $db = $this->userRepo->first(JwtService::jwt_account_uid());
        if (!$db) {
            return res(404, 'data not exists ');
        }

        $update_time = Carbon::parse($db->name_last_time);

        if (Carbon::now() >= $update_time) {
            $db->name           = $name;
            $db->name_last_time = Carbon::now()->addMonth(3)->timestamp;
            if ($db->save()) {
                return res(200, 'success');
            }
            return res(500, 'Come back later');
        }

        return res(422, 'name update too frequent');
    }


    public function background($type, $value)
    {

    }


    public function avatar()
    {

    }

    /**
     * sign. 2019/7/28 19:22.
     *
     * @param SignRequest $request
     *
     * @return JsonResponse
     */
    public function sign(SignRequest $request)
    {
        $sign = $request->input('sign');

        $db = $this->userRepo->first(JwtService::jwt_account_uid());
        if (!$db) {
            return res(404, 'data not exists ');
        }

        $db->sign = $sign;
        if ($db->save()) {
            return res(200, 'success');
        }
        return res(500, 'Come back later');
    }

    /**
     * address. 2019/7/28 19:22.
     *
     * @param AddressRequest $request
     *
     * @return JsonResponse
     */
    public function address(AddressRequest $request)
    {
        $country_id = $request->input('country_id');
        $country    = $request->input('country');

        $province_id = $request->input('province_id', 0);
        $province    = $request->input('province', '');

        $city_id = $request->input('city_id', 0);
        $city    = $request->input('city', '');

        $county_id = $request->input('county_id', 0);
        $county    = $request->input('county', '');

        $town_id = $request->input('town_id', 0);
        $town    = $request->input('town', '');

        $db = $this->userRepo->first(JwtService::jwt_account_uid());
        if (!$db) {
            return res(404, 'data not exists ');
        }
        $db->country_id = $country_id;
        $db->country    = $country;

        $db->province_id = $province_id;
        $db->province    = $province;

        $db->city_id = $city_id;
        $db->city    = $city;

        $db->county_id = $county_id;
        $db->county    = $county;

        $db->town_id = $town_id;
        $db->town    = $town;

        if ($db->save()) {
            return res(200, 'success');
        }
        return res(500, 'Come back later');

    }


}
