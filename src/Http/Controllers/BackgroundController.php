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
use Woisks\Photo\Models\Services\PhotoServices;
use Woisks\User\Models\Repository\UserRepository;

/**
 * Class BackgroundController.
 *
 * @package Woisks\User\Http\Controllers
 *
 * @Author Maple Grove  <bolelin@126.com> 2019/7/28 19:56
 */
class BackgroundController extends BaseController
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
     * background. 2019/7/30 23:55.
     *
     * @param $id
     *
     * @return JsonResponse
     */
    public function background($id)
    {
        //效验图片合法性
        if (PhotoServices::exists($id)) {

            //验证用户信息是否存在
            $db = $this->userRepo->first(JwtService::jwt_account_uid());
            if (!$db) {
                return res(404, 'data not exists ');
            }
            $db->backround_photo_id = $id;
            return $db->save() ? res(200, 'success') : res(500, 'Come back later');
        }

        return res(404, 'background data not exists ');
    }


}
