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


use Exception;
use Illuminate\Http\Request;
use Woisks\User\Http\Requests\CreateUserRequests;
use Woisks\User\Models\Services\CreateUserService;

/**
 * Class CreateUserController.
 *
 * @package Woisks\User\Http\Controllers
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/8 22:25
 */
class CreateUserController extends BaseController
{
    /**
     * createUserService.  2019/6/8 22:25.
     *
     * @var  \Woisks\User\Models\Services\CreateUserService
     */
    private $createUserService;

    /**
     * CreateUserController constructor. 2019/6/8 22:25.
     *
     * @param \Woisks\User\Models\Services\CreateUserService $createUserService
     *
     * @return void
     */
    public function __construct(CreateUserService $createUserService)
    {
        $this->createUserService = $createUserService;
    }

    /**
     * create. 2019/6/8 22:25.
     *
     * @param \Woisks\User\Http\Requests\CreateUserRequests $request
     *
     * @return \Illuminate\Http\JsonResponse|\Woisks\User\Models\Entity\UserEntity
     */
    public function create(CreateUserRequests $request)
    {
        if ($this->createUserService->uidExists()) {
            return res(422, 'user info exists not create');
        }

        try {

            return $this->services($request);

        } catch (Exception $e) {

            return res(4001, 'photo id not exists');
        }

    }

    /**
     * services. 2019/6/8 22:25.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Woisks\User\Models\Entity\UserEntity
     * @throws \Exception
     */
    private function services(Request $request)
    {
        $background = 0;
        if ($this->createUserService->checkPhotoIsValid($request->input('background'))) {
            $background = $request->input('background');
        }

        $avatar = 0;
        if ($this->createUserService->checkPhotoIsValid($request->input('avatar'))) {
            $avatar = $request->input('avatar');
        }

        $sign = '';
        if (!is_null($request->input('sign'))) {
            $sign = $request->input('sign');
        }

        $name = $request->input('name');
        $gender = $request->input('gender');


        return $this->createUserService->create((int)$background, (int)$avatar, $name, $gender, $sign);
    }


}