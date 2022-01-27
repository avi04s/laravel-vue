<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Validator;
class PassportAuthController extends Controller
{
    //

    /**
     * Registration Req
     */
    public function register(Request $request)
    {


       // $input = $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        
        if($validator->fails()){


            return response()->json( ['error' => $validator->errors(),401 ]);

        }
        else{


            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
      
            $token = $user->createToken('Laravel8PassportAuth')->accessToken;

         
      
            return response()->json([
                'token' => $token,
                'success' =>'success',
                'user' =>$user
            ], 200);

        }

    
    }
  
    /**
     * Login Req
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
  
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('Laravel8PassportAuth')->accessToken;
            
            $id = User::where('email',$request->email)->value('id');
            $user = User::find($id);

            return response()->json([
                'token' => $token,
                'user'=>$user,
                'success' =>"success",
            ], 200);
        } else {
            return response()->json([
                'error' => "Invalid Username and Password",
            ]);
        }
    }
 
    public function userInfo() 
    {
 
     $user = auth()->user();
      
     return response()->json(['user' => $user], 200);
 
    }

    public function updateUser(Request $request){
        $user = User::find($request->id);

        $user->name = $request->name;
        $user->email = $request->email;

        if(isset($request->file)){
            $user->file = $request->file->store('public','Profile');
        }

        $user->save();

        $user = User::find($request->id);

        return response()->json([
            
            'user'=>$user,
            'success' =>"success",
        ], 200);



    }


}
