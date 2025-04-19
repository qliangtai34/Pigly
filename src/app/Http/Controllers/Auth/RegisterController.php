<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class RegisterController extends Controller
{
    protected CreatesNewUsers $creator;

    public function __construct(CreatesNewUsers $creator)
    {
        $this->creator = $creator;
    }

    public function store(Request $request)
    {
        $user = $this->creator->create($request->all());

        Auth::login($user);

        return redirect('/register/step2'); // ← 新規登録後のリダイレクト先
    }

    public function index()
    {
        return view('auth/step2');
    }
    
}
