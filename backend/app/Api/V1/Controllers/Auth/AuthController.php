<?php

namespace App\Api\V1\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Models\User;

class AuthController extends Controller
{
    use Helpers;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function login()
    {
        $this->validate($this->request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ( ! $token = Auth::guard('api')->attempt([
            'email' => $this->request->get('email'),
            'password' => $this->request->get('password')
        ]) ) {
            return $this->response->errorUnauthorized('Incorrect username or password');
        }

        return $this->respondWithToken($token);
    }

    public function user()
    {
        $authUser = Auth::guard('api')->user();
        if ( ! $authUser ) {
            return $this->response->errorUnauthorized();
        }

        return $authUser;
    }

    public function logout()
    {
        Auth::guard('api')->logout();
        return ['message' => 'Successfully logged out'];
    }

    public function refresh()
    {
        return $this->respondWithToken(Auth::guard('api')->refresh());
    }

    protected function respondWithToken($token)
    {
        return [
            'status' => 'ok',
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ];
    }
}
