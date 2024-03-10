<?php

namespace App\Http\Controllers\API;

use App\Actions\Auth\CreateTokenAction;
use App\Actions\Auth\RegisterAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CreateTokenRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $userWithToken = app(RegisterAction::class)->execute($request);

        return response()->json($userWithToken, 200);
    }

    public function createToken(CreateTokenRequest $request)
    {
        $userWithToken = app(CreateTokenAction::class)->execute($request);

        return response()->json($userWithToken, 200);
    }
}
