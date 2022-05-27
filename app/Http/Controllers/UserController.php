<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * 显示给定用户的个人资料。
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // echo "find id $id for user";
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }

    /**
     * test function index
     *
     * @return void
     */
    public function index()
    {
    }
}
