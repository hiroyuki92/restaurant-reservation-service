<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\User\RegisterRequest;
use App\Actions\Fortify\CreateNewUser;

class RegisteredUserController extends Controller
{
    protected $creator;

    public function __construct(CreateNewUser $creator)
    {
        $this->creator = $creator;
    }

    public function index()
    {
        return view('auth.register');
    }

    /**
     * 新しいユーザーを登録
     *
     * @param  \App\Http\Requests\RegisterRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(RegisterRequest $request)
    {
        $user = $this->creator->create($request->validated());
        return redirect()->route('thanks');
    }

    public function complete()
    {
        return view('auth.registration_completed');
    }
}
