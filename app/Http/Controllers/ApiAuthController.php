<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use App\User;

class ApiAuthController extends Controller
{
    public function register()
    {
        if(request()->ajax())
        {
            try
            {
                $this->validate(request(), [
                    'name' => 'required|min:5|string|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|string|min:8|confirmed',
                ]);

                $user = User::create([
                    'name' => request('name'),
                    'email' => request('email'),
                    'password' => bcrypt(request('password'))
                ]);

                return response()->json([
                    'ok' => true,
                    'message' => 'User created',
                    'user' => $user
                ]);
            }
            catch(ValidationException $e)
            {
                return response()->json($e->validator->errors());
            }
        }
        abort(401);
    }

    public function login()
    {
        try
        {
            $this->validate(request(), [
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            $credentials = request(['email', 'password']);

            if(!auth()->attempt($credentials))
            {
                return response()->json([
                    'ok' => false,
                    'message' => 'Credenciales incorrectas.'
                ], 401);
            }

            $user = request()->user();
            
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            $token->save();

            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer'
                ]);
            }
            catch(ValidationException $e)
            {
            return response()->json($e->validator->errors());
        }
    }

    public function logout()
    {
        request()->user()->token()->revoke();
        
        return response()->json([
            'ok' => true,
            'message' => 'Success logout'
        ]);
    }

    public function user()
    {
        return response()->json(request()->user());
    }
}
