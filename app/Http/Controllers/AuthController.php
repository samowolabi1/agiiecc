<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Response;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Access\AuthorizationException;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Auth\Events\Verified;
use Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{
    //
   

    public function register(Request $request){

        $rules = array(
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%]).*$/|confirmed'
        );

        $validator = Validator::make($request->all(), $rules);
       
 
        if ($validator->fails()) {

            return response([
                'error_msg' => $validator->errors()
            ], 400);
        
        }else{
        
            $user = User::create([

                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            event(new Registered($user));
    
            $token = $user->createToken('myapptoken')->plainTextToken;

            // verification Url
            $url = URL::temporarySignedRoute(
                'verification.verify',
                Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
                [
                    'id' => $user->getKey(),
                    'hash' => sha1($user->getEmailForVerification()),
                ]
            );

            // $response = $this->get($url);
            // $response->assertSuccessful();

            // $this->assertNotNull($user->fresh()->email_verified_at);


            // 
        
        }

        return Response::json([
            'status' => 201,
            'user' => $user,
            'token' => $token,
            'url' => $url,
        ]);
    }

    public function show($id){

        $user = User::find($id);

        return Response::json([
            'status' => 201,
            'user' => $user
        ]);
    }

    public function edit($id){

        $user = User::find($id);

        return Response::json([
            'status' => 201,
            'user' => $user
        ]);
    }

    
    public function update(Request $request, $id){

            
            $user = User::find($id);
            $user->update($request->all());
            // $token = $user->createToken('myapptoken')->plainTextToken;
        
        

        return Response::json([
            'status' => 201,
            'user' => $user
        ]);
    }

    
    public function login(Request $request){
        $fields = $request->validate([

            'email' => 'required|string',
            'password' => 'required|string'
            

        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'Bad Credentials'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        return Response::json([
            'status' => 201,
            'user' => $user,
            'token' => $token
        ]);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged Out'
        ];
    }

    public function sendVerificationEmail(Request $request){

        if ($request->user()->hasVerifiedEmail()) {
            return [
                'message' => 'Already is Verified'
            ];
        }

        $request->user()->sendEmailVerificationNotification();

        return ['status' => 'verification-link-sent'];

        return back()->with('resent', true);

        
    }

    public function verify(Request $request){

        $user = User::find($request->route('id'));

    
        Auth::loginUsingId($user->id);


        if($request->route('id') != $request->user()->getKey()){
            throw new AuthorizationException;
        }

        if ($request->user()->hasVerifiedEmail()) {
                return [
                    'message' => 'Email is already verified'
                ];
            }

            if ($request->user()->markEmailAsVerified()) {
                    event(new Verified($request->user()));

                }

                return [
                    'message' => 'Succesfully Verified'
                ];
        
    }


    // public function verify($user_id, Request $request) {

    //     if (!$request->hasValidSignature()) {
    //         return response()->json(["msg" => "Invalid/Expired url provided."], 401);
    //     }

    //     $user = User::findOrFail($user_id);

    //     if (!$user->hasVerifiedEmail()) {
    //         $user->markEmailAsVerified();
    //     }

    //     return redirect()->to('/');
    // }

    // public function resend() {
    //     if (auth()->user()->hasVerifiedEmail()) {
    //         return response()->json(["msg" => "Email already verified."], 400);
    //     }

    //     auth()->user()->sendEmailVerificationNotification();

    //     return response()->json(["msg" => "Email verification link sent on your email id"]);
    // }
}
