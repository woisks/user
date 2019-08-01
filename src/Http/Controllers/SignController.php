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
use Woisks\User\Http\Requests\SignRequest;
use Woisks\User\Models\Repository\UserRepository;

class SignController extends BaseController
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
}
