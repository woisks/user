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
use Woisks\User\Models\Repository\UserRepository;

class NameController extends BaseController
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

        if (Carbon::now() >= Carbon::parse($db->name_last_time)) {
            $db->name           = $name;
            $db->name_last_time = Carbon::now()->addMonth(3)->timestamp;
            return $db->save() ? res(200, 'success') : res(500, 'Come back later');
        }

        return res(422, 'name update too frequent');
    }
}
