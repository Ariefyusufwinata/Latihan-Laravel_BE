<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Helpers\ApiHelpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();

        return ApiHelpers::success($data, 'Get all users data!');
    }

    public function search(Request $request)
    {
        $uuid = $request->header('uuid');

        $data = User::where('uuid', $uuid)->get();

        return ApiHelpers::success($data, 'Get user data!');
    }

    public function create(Request $request)
    {

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return ApiHelpers::success($user, 'User created successfully!');
    }
}
