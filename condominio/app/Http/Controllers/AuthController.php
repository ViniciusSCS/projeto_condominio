<?php

namespace App\Http\Controllers;

use App\Constants\Geral;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\TokenRepository;

class AuthController extends Controller
{
    protected $tokenRepository;

    public function __construct(TokenRepository $tokenRepository)
    {
        $this->tokenRepository = $tokenRepository;
    }

    public function login(LoginRequest $request)
    {
        $data = $request->all();

        if (Auth::attempt(['email' => strtolower($data['email']), 'password' => $data['password']])) {
            $user = Auth::user();

            $user->token = $user->createToken($user->email)->accessToken;

            return ['status' => true, 'message' => Geral::USUARIO_LOGADO, "usuario" => $user];
        } else {
            return ['status' => false, 'message' => Geral::USUARIO_INCORRETO];
        }
    }

    public function logout(Request $request)
    {
        $tokenId = $request->user()->token()->id;

        $this->tokenRepository->revokeAccessToken($tokenId);

        return ['status' => true, 'message' => Geral::USUARIO_DESLOGADO];
    }
}
