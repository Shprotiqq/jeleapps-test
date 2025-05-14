<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\JsonResponse;
use App\DTOs\UserRegistrationDTO;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class UserRegisterController extends Controller
{
    public function __invoke(RegisterRequest $request): JsonResponse
    {
        try {
            $dto = UserRegistrationDTO::fromArray($request->validated());

            $user = User::query()->create([
                'name' => explode('@', $dto->email)[0],
                'email' => $dto->email,
                'password' => Hash::make($dto->password),
                'gender' => $dto->gender,
            ]);

            $token = $user->createToken('api-token')->plainTextToken;

            return response()->json([
                'message' => 'Пользователь успешно создан',
                'user' => $user,
                'token' => $token,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ошибка регистрации',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
