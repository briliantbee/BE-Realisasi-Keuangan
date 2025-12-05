<?php

namespace App\Http\Controllers\API\Auth;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        try {
            // validasi form input
            $request->validate([
                'email' => ['required', 'string'],
                'password' => ['required']
            ]);
    
            // check credential login
            if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized'
                ], 'Authentication Failed', 422);
            }
    
            // Jika Hash atau password tidak sesuai
            $user = User::where('email', $request->email)->first();
    
            if(empty($user)) {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized'
                ], 'Authentication Failed', 422);
            }
            
            if (!Hash::check($request->password, $user->password)) {
                throw new \Exception('Invalid Credentials');
            }
            // Jika berhasil maka loginkan
            $tokenResult = $user->createToken('authToken')->accessToken;
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => new UserResource($user)
            ], 'Authenticated');
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'message' => 'server error'
            ], 'Authentication Failed', 500);
        }
    }
}
