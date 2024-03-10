<?php

namespace App\Actions\Auth;

use App\Http\Requests\Auth\CreateTokenRequest;
use App\Models\User;

class CreateTokenAction
{
    public function execute(CreateTokenRequest $request): array
    {
        $validated = $request->validated();
        $user = User::where('email', $validated['email'])->first();

        return [
            'user' => $user,
            'token' => $user->createToken($validated['device_name'])->plainTextToken
        ];
    }
}
