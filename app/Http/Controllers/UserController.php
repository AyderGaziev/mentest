<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Создание пользователя
    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }

    // Обновление информации пользователя
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'string',
            'email' => 'email|unique:users,email,' . $id,
            'password' => 'string|min:6',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return response()->json(['message' => 'User updated successfully', 'user' => $user]);
    }

    // Удаление пользователя
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }

    // Авторизация пользователя
    public function authenticateUser(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $token = $user->createToken('AuthToken')->plainTextToken;

            return response()->json(['token' => $token]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    // Получить информацию о пользователе
    public function getUserInfo()
    {
        $user = auth()->user();

        return response()->json(['user' => $user]);
    }
}
