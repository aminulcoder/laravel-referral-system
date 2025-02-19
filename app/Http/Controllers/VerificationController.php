<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    // public function verifyEmail($id, $hash)
    // {
    //     $user = User::findOrFail($id);

    //     if (sha1($user->email) !== $hash) {
    //         return abort(403, 'Invalid verification link');
    //     }

    //     return view('submission-form', compact('user'));
    // }


    public function verifyEmail($id, $hash)
    {
        $user = User::findOrFail($id);

        if (! hash_equals(sha1($user->getEmailForVerification()), $hash)) {
            abort(403, 'Invalid verification link');
        }

        $user->markEmailAsVerified();

        return view('submission-form', compact('user'));
    }

}
