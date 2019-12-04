<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\UserPersonalDetails;
use App\Models\UsersDetail;
use Illuminate\Http\Request;

class AccountController extends UserBaseController
{
    public function index()
    {
        $user = \Auth::user();
        return view('user.account', compact('user'));
    }

    public function edit(UserPersonalDetails $request)
    {
        $data = $request->except('_token');

        $data['user_id'] = \Auth::user()->id;

        if (UsersDetail::where('user_id', $data['user_id'])->exists()) {
            UsersDetail::where('user_id', $data['user_id'])->update($data);
            return back();
        }

        (new UsersDetail($data))->save();
        return back();
    }
}
