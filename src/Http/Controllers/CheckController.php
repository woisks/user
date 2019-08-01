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
use Woisks\User\Models\Repository\UserRepository;

class CheckController extends BaseController
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
     * checkName. 2019/7/28 19:27.
     *
     * @param $name
     *
     * @return JsonResponse
     */
    public function checkName($name)
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
     * checkUser. 2019/7/30 23:43.
     *
     *
     * @return JsonResponse
     */
    public function checkUser()
    {
        $db = $this->userRepo->first(JwtService::jwt_account_uid());

        if (!$db) {
            return res(404, 'user info not exists ');
        }

        return res(200, 'success');
    }

}
