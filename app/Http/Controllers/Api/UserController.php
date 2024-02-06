<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Helpers\ApiHelpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();

        if($data)
        {
            return ApiHelpers::createApi(200, 'success', $data);
        }

        return ApiHelpers::createApi(400, 'Failed');
    }

    public function store(Request $request)
    {
        try
        {
            $request->validate([
                'email' => 'required',
                'name' => 'required',
                'password' => 'required',
            ]);

            $user = User::create([
                'email' => $request->email,
                'name' => $request->name,
                'password' => Hash::make($request->password),
            ]);

            $data = User::where('id', '=', $user->id)->get();

            if($data)
            {
                return ApiHelpers::createApi(200, 'success', $data);
            }

            return ApiHelpers::createApi(400, 'Failed');

        }
        catch (Exception $e)
        {
            return ApiHelpers::createApi(200, 'success', $e);
        }
    }

    public function show(string $id)
    {
        $data = User::where('id', '=', $id)->get();

        if($data)
        {
            return ApiHelpers::createApi(200, 'success', $data);
        }

        return ApiHelpers::createApi(400, 'Failed');
    }

    public function update(Request $request, String $id)
    {
        try
        {
            $request->validate([
                'email' => 'required',
                'name' => 'required',
            ]);

            $user = User::findOrFail($id);

            $user->update([
                'email' => $request->email,
                'name' => $request->name,
            ]);

            $data = User::find($user->id);

            if($data)
            {
                return ApiHelpers::createApi(200, 'success', $data);
            }

            return ApiHelpers::createApi(400, 'Failed');
        }
        catch (Exception $e)
        {
            return ApiHelpers::createApi(400, 'Failed', $e);
        }
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $data = $user->delete();

        if($data)
        {
            return ApiHelpers::createApi(200, 'success', $data);
        }

        return ApiHelpers::createApi(400, 'Failed');
    }
}
