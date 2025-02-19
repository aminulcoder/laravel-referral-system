<?php

namespace App\Http\Controllers;

use App\Models\FormSubmission;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'name' => 'required',
        'phone' => 'required',
    ]);

    FormSubmission::create([
        'user_id' => $request->user_id,
        'name' => $request->name,
        'phone' => $request->phone,
    ]);

    return redirect()->route('dashboard')->with('success', 'Form submitted successfully.');
}

}
