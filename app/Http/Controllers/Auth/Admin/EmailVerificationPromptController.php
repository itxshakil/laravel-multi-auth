<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return $request->user('admin')->hasVerifiedEmail()
            ? redirect()->intended(RouteServiceProvider::ADMIN_HOME)
            : Inertia::render('Auth/Admin/VerifyEmail', ['status' => session('status')]);
    }
}
