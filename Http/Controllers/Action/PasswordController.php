<?php

namespace Apolune\Account\Http\Controllers\Action;

use Illuminate\Contracts\Auth\Guard;
use Apolune\Core\Http\Controllers\Controller;
use Apolune\Account\Jobs\Action\ChangePassword;
use Apolune\Account\Http\Requests\Action\PasswordRequest;

class PasswordController extends Controller
{
    /**
     * The Guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Show the change password page.
     *
     * @return \Illuminate\View\View
     */
    public function form()
    {
        return view('theme::account.action.password.form');
    }

    /**
     * Change the account password.
     *
     * @param  \Apolune\Account\Http\Requests\Action\PasswordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(PasswordRequest $request)
    {
        $this->dispatch(
            new ChangePassword($this->auth->user())
        );

        return redirect('/account');
    }
}
