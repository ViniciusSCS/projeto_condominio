<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create($request)
    {
        $data = $request->all();

        $user = $this->repository->create($data);

        $user->token = $user->createToken($user->email)->accessToken;

        return $user;
    }

    public function me($request)
    {
        $userUuid = $request->user()->uuid;

        return $this->repository->findMe($userUuid);
    }
}

