<?php
namespace App\Http\Controllers;

use App\Models\Network;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

Use Mail;
class ReferralController extends Controller
{
    public function referral()
    {

        return view('referral.referal');

    }

    public function referralstore(Request $request)
    {

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => ['required', 'confirmed', 'min:4'],
        // ]);

        $referralCode = Str::random(10);

        if (isset($request->refrral_code)) {

            $userData = User::where('refrral_code', $request->refrral_code)->get();
            if (count($userData) > 0) {

                $user_id = User::insertGetId([
                    'fname'        => $request->fname,
                    'lname'        => $request->lname,
                    'email'        => $request->email,
                    'country'      => $request->country,
                    'address'      => $request->address,
                    'address2'     => $request->address2,
                    'city'         => $request->city,
                    'religon'      => $request->religon,
                    'zip_code'     => $request->zip_code,
                    'telephone'    => $request->telephone,
                    'refrral_code' => $referralCode,
                    'password'     => Hash::make($request->password),
                ]);

                Network::insert([
                    'refrral_code'   => $request->refrral_code,
                    'user_id'        => $user_id,
                    'parent_user_id' => $userData[0]['id'],

                ]);
            } else {
                return back()->with('error', 'Please enter Valid Referral Code');
            }
        } else {

            User::insert([

                'fname'        => $request->fname,
                'lname'        => $request->lname,
                'email'        => $request->email,
                'country'      => $request->country,
                'address'      => $request->address,
                'address2'     => $request->address2,
                'city'         => $request->city,
                'religon'      => $request->religon,
                'zip_code'     => $request->zip_code,
                'telephone'    => $request->telephone,
                'refrral_code' => $referralCode,
                'password'     => Hash::make($request->password),

            ]);

        }

        $domain = Url::to('/referral-register?ref='.$referralCode);
        $url = $domain.''.$referralCode;
        $data['url'] = $url;
        $data['fname'] = $request->fname;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['title'] = 'Registered';

        Mail::send('emails.registerMail',['data'=> $data] ,function($message) use($data){
            $message->to($data['email'])->subject($data['title']);
        });
        return redirect()->route('admin.index')->with('create', ' Admin Successfully Created');
    }

    public function stureferral()
    {

        return view('referral.stureferral');
    }
}
