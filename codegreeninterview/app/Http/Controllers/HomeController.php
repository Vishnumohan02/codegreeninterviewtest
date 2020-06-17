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

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return  view('Register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator        = Validator::make($request->all(), [
            'uname'   => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'dob' => 'required',
            'city' => 'required'
        ]);
        if ($validator->fails()) {
           return back()->withErrors($validator);
        }

              $users                = new Users;
              $users->uname   = $request->input('uname');      
              $users->password   = bcrypt($request->input('password'));
              $users->status     = "N";


              // Save users
              $users->save();

              $user_details     = new UserDetails ;
              $user_details->userId = $users->id;
              $user_details->email    = $request->input('email');
              $user_details->dob     = $request->input('dob');
              $user_details->city     = $request->input('city');

              $user_details->save();


              $otp_no = mt_rand(1000,9999);
              $otp    = new UserOtp;
              $otp->userId  = $users->id;
              $otp->otp   = $otp_no;

              $otp->save();

              $to_email = $user_details->email;
              $maildata = array('name' => $users->uname, 'otp' => $otp->otp );
              Mail::send('mail',$maildata,function($message) use ($to_email){
                $message->to($to_email)
                ->subject('OTP for registration');
              });

              $data['userId'] = $users->id;

              return view('otpverification',$data);

    }

    public function verify(Request $request)
    {
       $uid = $request->input('userid');
       $inputotp = $request->input('otp');

       $verifyotp = UserOtp::where('userId',$uid)->first(); 

       if($inputotp == $verifyotp->otp)
        {
          $users = Users::where('id',$uid)->first();
          $users->status  = "Y";

          $users->save();

       $data['success'] = "success";
       return view('welcome',$data);
        }
       else
       {
        $data['userId'] = $uid;
        $data['error']  = "Failed";

        return view('otpverification',$data);
       }

    }

    public function verification(Request $request)
    {
        $userId = $request->userid;
        $otpvalinput = $request->otp;
        $userotp = Userotp::where('userId','=',$userId)->first(); 
        $otpval = $userotp->userotp;

        if ($otpvalinput == $otpval) {
            $objuserdetails         = userDetails::find($userId);   
            $objuserdetails->status  = '1';
            $objuserdetails->save();
           Session::flash('message','User Registration successful!');
            return redirect('/Register');
        }
        else
        {
            Session::flash('message','Otp is invalid!');
            return redirect('otpverification');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
