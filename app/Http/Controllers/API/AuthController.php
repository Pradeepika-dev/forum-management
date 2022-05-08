<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //Validate user request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['validation_errors' => $validator->errors()]);
        }

        //If validation success create an user and generate a token
        try{
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            $token =  $user->createToken('Token')->accessToken;

            return response()->json([
                'status' => 200,
                'email' => $user->email,
                'token' => $token,
                'message' => 'Registered Successfully'
            ]);
        }catch(\Exception $e){
            \Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while registering the user!!'
            ],500);
        }

    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['validation_errors' => $validator->errors()]);

//            return $this->sendError('Validation Error.', $validator->errors());
        }else{
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $user = Auth::user();
                $token =  $user->createToken('Token')-> accessToken;

                return response()->json([
                    'status' => 200,
                    'email' => $user->email,
                    'userId' => $user->id,
                    'roleId' => $user->role_id,
                    'token' => $token,
                    'message' => 'User login successfully'
                ]);

//            return $this->sendResponse($success, 'User login successfully.');
            }
            else{
                return response()->json([
                   'status' => 401,
                    'message' => 'Invalid Credentials'
                ]);
//            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
            }
        }

    }

    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        return response()->json([
            'status' => 200,
            'message' => 'You have been successfully logged out!'
        ]);
    }

}
