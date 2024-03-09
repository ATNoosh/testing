<?php

namespace App\Http\Controllers\API;

use App\Actions\CreateTokenAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTokenRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function createToken(CreateTokenRequest $request)
    {
        $userWithToken = app(CreateTokenAction::class)->execute($request);

        return response()->json($userWithToken, 200);
    }
}
