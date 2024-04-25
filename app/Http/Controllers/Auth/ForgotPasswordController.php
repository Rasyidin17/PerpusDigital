<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showLinkRequestForm(Request $request)
    {
        return view('customer.forgot-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        Alert::success('Success', 'Password berhasil diubah!');
        return back();
    }
    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $this->broker()->sendResetLink(
            $this->credentials($request)
        );

        return back()->with('status', trans($this->linkSentResponse()));
    }
}
