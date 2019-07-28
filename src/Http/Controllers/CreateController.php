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
use Woisks\Jwt\Services\JwtService;
use Woisks\User\Http\Requests\CreateRequest;
use Woisks\User\Models\Repository\UserRepository;

/**
 * Class CreateController.
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
     * CreateController constructor. 2019/7/28 17:08.
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
     * create. 2019/7/28 17:08.
     *
     * @param CreateRequest $request
     *
     * @return JsonResponse
     */
    public function create(CreateRequest $request)
    {
        $name     = $request->input('name');
        $gender   = $request->input('gender');
        $birthday = $request->input('birthday');

        $sign = $request->input('sign', '');

        $country_id = $request->input('country_id', 1);
        $country    = $request->input('country', '');

        $province_id = $request->input('province_id', 0);
        $province    = $request->input('province', '');

        $city_id = $request->input('city_id', 0);
        $city    = $request->input('city', '');

        $county_id = $request->input('county_id', 0);
        $county    = $request->input('county', '');

        $town_id = $request->input('town_id', 0);
        $town    = $request->input('town', '');

        if ($this->userRepo->exists(JwtService::jwt_account_uid())) {
            return res(422, 'user info exists');
        }


        $db = $this->userRepo->created(JwtService::jwt_account_uid(),
            $name, $gender, $birthday, $sign, $country_id, $country,
            $province_id, $province, $city_id, $city, $county_id, $county, $town_id, $town);
        if ($db) {
            return res(200, 'success', $db);
        }
        return res(500, 'Come back later');
    }

}
