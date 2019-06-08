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

namespace Woisks\User\Models\Services;


use Exception;
use Woisks\Jwt\Services\JwtService;
use Woisks\User\Models\Entity\UserEntity;
use Woisks\User\Models\Repository\UserRepository;

/**
 * Class CreateUserService.
 *
 * @package Woisks\User\Models\Services
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/8 21:45
 */
class CreateUserService
{
    /**
     * userRepo.  2019/6/8 21:45.
     *
     * @var  \Woisks\User\Models\Repository\UserRepository
     */
    private $userRepo;

    /**
     * CreateUserService constructor. 2019/6/8 21:45.
     *
     * @param \Woisks\User\Models\Repository\UserRepository $userRepo
     *
     * @return void
     */
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * uidExists. 2019/6/8 21:27.
     *
     *
     * @return bool
     */
    public function uidExists()
    {
        $info = JwtService::jwt_token_info();

        return $this->userRepo->uidExists($info['ide']);
    }


    /**
     * create. 2019/6/8 21:45.
     *
     * @param int    $background
     * @param int    $avatar
     * @param string $name
     * @param string $gender
     * @param string $sign
     *
     * @return \Woisks\User\Models\Entity\UserEntity
     */
    public function create(int $background, int $avatar, string $name, string $gender, string $sign): UserEntity
    {
        $info = JwtService::jwt_token_info();

        return $this->userRepo->created($info['ide'], $background, $avatar, $name, $gender, $sign);
    }


    /**
     * checkPhotoIsValid. 2019/6/8 21:57.
     *
     * @param $photo_id
     *
     * @return bool
     * @throws \Exception
     */
    public function checkPhotoIsValid($photo_id)
    {
        if (is_null($photo_id)) {
            return false;
        }

        //效验id
        if (!strlen($photo_id) == 18 || !strlen($photo_id) == 19) {
            throw new Exception('photo error');
        }

        return true;

    }


}