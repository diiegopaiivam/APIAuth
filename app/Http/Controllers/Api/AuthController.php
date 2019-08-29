<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{
    private $jwtAuth;

    public function __construct(JWTAuth $jwtAuth){
        $this->jwtAuth = $jwtAuth;
    }

    public function login(Request $request){
        
        //Armazenando em um array os atributos de email e senha
        $credentials = $request->only('email', 'password');

        //verificando o token
        if (! $token = $this->jwtAuth->attempt($credentials)) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }
        
        //Se verdadeiro armazenando o token na model de user
        $user = $this->jwtAuth->authenticate($token);

        //retornando a verificação
        return response()->json(compact('token', 'user'));
    }

    public function refresh(){
        //Armazenando o token com o método getToken logo após dando o refresh nele
        $token = $this->jwtAuth->getToken();
        $token = $this->jwtAuth->refresh($token);

        return response()->json(compact('token'));
    }


    //método de logout
    public function logout(){
        //armazenando o token na variavél com o método getToken e logo após o tornando inválido
        $token = $this->jwtAuth->getToken();
        $this->jwtAuth->invalidate($token);

        return response()->json(['logout']);
    }

    public function me(){

        if (!$user = $this->jwtAuth->parseToken()->authenticate()) {
            return response()->json(['error' => 'user_not_found'], 404);
        }
	

	// the token is valid and we have found the user via the sub claim
	return response()->json(compact('user'));
    }
}