<?php
namespace App\Http\Controllers;

use App\Models\FormSubmission;
use App\Models\Network;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class ReferralController extends Controller
{
    public function referral()
    {
        return view('referral.referal');
    }

    public function referralstore(Request $request)
    {
        $request->validate([
            'fname'    => 'required',
            'lname'    => 'required',
            // 'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:4',
        ]);

        $referralCode = Str::random(10);
        $userData     = null;

        if ($request->filled('referral_code')) {
            $userData = User::where('referral_code', $request->referral_code)->first();
        }

        if ($userData) {
            $user = User::create([
                'fname'         => $request->fname,
                'lname'         => $request->lname,
                'email'         => $request->email,
                'country'       => $request->country,
                'address'       => $request->address,
                'address2'      => $request->address2,
                'city'          => $request->city,
                'religion'      => $request->religion,
                'zip_code'      => $request->zip_code,
                'telephone'     => $request->telephone,
                'referral_code' => $referralCode,
                'password'      => Hash::make($request->password),
            ]);

            Network::create([
                'referral_code'  => $request->referral_code,
                'user_id'        => $user->id,
                'parent_user_id' => $userData->id,
            ]);
        } else {
            $user = User::create([
                'fname'         => $request->fname,
                'lname'         => $request->lname,
                'email'         => $request->email,
                'country'       => $request->country,
                'address'       => $request->address,
                'address2'      => $request->address2,
                'city'          => $request->city,
                'religion'      => $request->religion,
                'zip_code'      => $request->zip_code,
                'telephone'     => $request->telephone,
                'referral_code' => $referralCode,
                'password'      => Hash::make($request->password),
            ]);
        }

        $url  = Url::to('/referral-register?ref=' . $referralCode);
        // return    $url ;
        $data = [
            'url'                => $url,
            'fname'              => $request->fname,
            'email'              => $request->email,
            'password_reset_url' => Url::to('/password/reset'),
            'title'              => 'Registered',
        ];

        Mail::send('emails.registerMail', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])->subject($data['title']);
        });

        return redirect()->route('dashboard')->with('success', 'User successfully registered!');
    }

    public function LoadReferralRegister()
    {

        // if(isset($request->ref)){

        //     $referral = $request->ref;
        //     $userData = User::where('referral_code',$referral)->get();
        //     if(count($userData)> 0){

        //         return view('referral.stureferral',compact('referral'));
        //     }else{
        //         return view('404');
        //     }
        // }else{
        //     return redirect('/');
        // }
        return view('referral.stureferral');
    }

    public function referstduntstore(Request $request)
    {

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:form_submissions,email',
        ]);

        $user = FormSubmission::create([
            'user_id' => $request->user_id,
            'fname'   => $request->fname,
            'lname'   => $request->lname,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'address' => $request->address,
            'course'  => $request->course,
        ]);
        return redirect()->back();
    }
}
