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
use Woisks\Photo\Models\Services\PhotoServices;
use Woisks\User\Models\Repository\UserRepository;

class GetController extends BaseController
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
     * getUser. 2019/7/31 0:16.
     *
     * @param $account_uid
     *
     * @return JsonResponse
     */
    public function getUser($account_uid)
    {
        $db = $this->userRepo->first($account_uid);
        if (!$db) {
            return res(404, 'user info not exists ');
        }

        $db->avatar     = PhotoServices::transUrl($db->avatar_photo_id, 'avatar');
        $db->background = PhotoServices::transUrl($db->background_photo_id, 'background');
        unset($db->avatar_photo_id);
        unset($db->background_photo_id);

        return res(200, 'success', $db);


    }
}
