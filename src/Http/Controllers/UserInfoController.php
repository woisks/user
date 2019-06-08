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


use Illuminate\Http\Request;

/**
 * Class UserInfoController.
 *
 * @package Woisks\User\Http\Controllers
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/9 0:46
 */
class UserInfoController extends BaseController
{
    /**
     * create. 2019/6/9 0:46.
     *
     * @param \Illuminate\Http\Request $request
     * @param                          $type
     *
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function create(Request $request, $type)
    {
        switch ($type) {
            case 'name':
                $res = app(NameController::class)->created($request);
                break;
            case 'birthday':
                $res = app(BirthdayController::class)->created($request);
                break;
            case 'ethnic':
                $res = app(EthnicController::class)->created($request);
                break;
            case 'faith':
                $res = app(FaithController::class)->created($request);
                break;
            case 'home':
                $res = app(HomeController::class)->created($request);
                break;
            case 'live':
                $res = app(LiveController::class)->created($request);
                break;
            default:
                $res = res(422, 'param type error');
                break;
        }

        return $res;
    }


    /**
     * change. 2019/6/9 0:46.
     *
     * @param \Illuminate\Http\Request $request
     * @param                          $type
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function change(Request $request, $type)
    {
        switch ($type) {
            case 'name':
                $res = app(NameController::class)->change($request);
                break;
            case 'birthday':
                $res = app(BirthdayController::class)->change($request);
                break;
            case 'ethnic':
                $res = app(EthnicController::class)->change($request);
                break;
            case 'faith':
                $res = app(FaithController::class)->change($request);
                break;
            case 'home':
                $res = app(HomeController::class)->change($request);
                break;
            case 'live':
                $res = app(LiveController::class)->change($request);
                break;
            default:
                $res = res(422, 'param type error');
                break;
        }

        return $res;
    }
}