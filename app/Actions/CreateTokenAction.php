<?php

namespace App\Actions;

use App\Http\Requests\CreateTokenRequest;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class CreateTokenAction
{
    public function execute(CreateTokenRequest $request): array
    {
        $validated = $request->validated();
        $user = User::where('email', $request->email)->first();

        return [
            'user' => $user,
            'token' => $user->createToken($validated['device_name'])->plainTextToken
        ];
    }
}
