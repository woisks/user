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
use Woisks\User\Http\Requests\AddressRequest;
use Woisks\User\Models\Repository\UserRepository;

class AddressController extends BaseController
{
    /**
     * userRepo.  2019/7/28 19:56.
     *
     * @var  UserRepository
     */
    private $userRepo;

    /**
     * BackgroundController constructor. 2019/7/28 19:56.
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
     * address. 2019/8/1 20:10.
     *
     * @param AddressRequest $request
     *
     * @return JsonResponse
     * @throws \Exception
     */
    public function address(AddressRequest $request)
    {
        $country  = $request->input('country');
        $province = $request->input('province', 0);
        $city     = $request->input('city', 0);
        $county   = $request->input('county', 0);
        $town     = $request->input('town', 0);

        //效验地址数据是否合法
        $area = AreaServices::cascade($country, $province, $city, $county, $town);

        //用户信息是否存在
        $db = $this->userRepo->first(JwtService::jwt_account_uid());
        if (!$db) {
            return res(404, 'data not exists ');
        }

        //比对前后数据改动
        $db_diff   = $db->only(['country_id', 'province_id', 'city_id', 'county_id', 'town_id']);
        $area_diff = collect($area)->only(['country_id', 'province_id', 'city_id', 'county_id', 'town_id']);

        $new = $area_diff->diffAssoc($db_diff)->filter(function ($val) {
            return $val > 0;
        });

        $old = collect($db_diff)->diffAssoc($area_diff)->filter(function ($val) {
            return $val > 0;
        });

//        dd(['old' => $old, 'new' => $new]);
        $db->country_id = $area['country_id'];;
        $db->country = $area['country'];

        $db->province_id = $area['province_id'];;
        $db->province = $area['province'];

        $db->city_id = $area['city_id'];;
        $db->city = $area['city'];

        $db->county_id = $area['county_id'];;
        $db->county = $area['county'];

        $db->town_id = $area['town_id'];;
        $db->town = $area['town'];

        if ($db->save()) {

            if (!$old->isEmpty()) {
                //城市地址递减
                foreach ($old as $key => $value) {
                    list($table, $_) = explode('_', $key);
                    AreaServices::decrement('user', $table, $value);
                }
            }

            if (!$new->isEmpty()) {
                //城市地址新增
                foreach ($new as $key => $value) {
                    list($table, $_) = explode('_', $key);
                    AreaServices::increment('user', $table, $value);
                }
            }

            return res(200, 'success');
        }
        return res(500, 'Come back later');

    }
}
