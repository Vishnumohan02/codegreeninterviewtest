<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use PHPMailer\PHPMailer\PHPMailer;
use Mail;
use App\Model\users;
use App\Model\UserDetails;
use App\Model\UserOtp;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profilelogin(Request $request)
    {
        $this->validate($request, [
            'uname' => 'required',
            'password' => 'required',
        ]);

        $lguname = $request->input('uname');

        $login   = users::select('id','uname')
                   ->where('uname',$lguname)
                   ->where('status','=',"Y")
                   ->first();


        if($login != "")
            {
              if (Auth::attempt(['uname' => $request->uname, 'password' => $request->password]))
              {

                $data['userdata'] =  users::leftjoin('user_details','users.id','=','user_details.userId')
                           ->select('users.id','users.uname','user_details.email','user_details.dob','user_details.city')
                           ->where('users.uname', $lguname )
                           ->first();

                return view('profile',$data);

              }
              else
              {
                $data['loginerror']  = "Failed";
                return view('login',$data);
              }
            }
            else
            {
                $data['loginerror']  = "Failed";
                return view('login',$data);
              }

          
    }

    public function show($id)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profileedit($id)
    {
     // DB::enableQueryLog(); 

          $data['profiledata'] = Users::leftjoin('user_details','users.id','=','user_details.userId')
                           ->select('users.id','users.uname','user_details.email','user_details.dob','user_details.city')
                           ->where('users.id', $id )
                           ->first();
     //$query = DB::getQueryLog(); print_r($query); exit;

            return view('editprofile',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function canceledit($id)
    {

     // DB::enableQueryLog(); 

          $data['userdata'] = Users::leftjoin('user_details','users.id','=','user_details.userId')
                           ->select('users.id','users.uname','user_details.email','user_details.dob','user_details.city')
                           ->where('users.id', $id )
                           ->first();
     //$query = DB::getQueryLog(); print_r($query); exit;

           return view('profile',$data);

    }

    public function update(Request $request, $id)
    {
       $validator        = Validator::make($request->all(), [
            'uname'   => 'required',
            'email' => 'required|email',
            'dob' => 'required',
            'city' => 'required'
        ]);
        if ($validator->fails()) {
           return back()->withErrors($validator);
        }

              $users                = Users::where('id',$id)->first();
              $users->uname   = $request->input('uname');      

              // Save users
              $users->save();

              $user_details     = UserDetails::where('userId',$id)->first();
              $user_details->userId = $id;
              $user_details->email    = $request->input('email');
              $user_details->dob     = $request->input('dob');
              $user_details->city     = $request->input('city');

              $user_details->save();

              $data['userdata'] = Users::leftjoin('user_details','users.id','=','user_details.userId')
                           ->select('users.id','users.uname','user_details.email','user_details.dob','user_details.city')
                           ->where('users.id', $id )
                           ->first();

            return view('profile',$data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return view('login');
    }
}
