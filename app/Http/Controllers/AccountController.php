<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPersonalDetails;
use App\UsersDetail;
use Illuminate\Http\Request;

class AccountController extends Controller
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

        if ($detail = UsersDetail::find($data['user_id'])) {
            $detail->update($data);
            return redirect()->back();
        }

        (new UsersDetail($data))->save();
        return redirect()->back();
    }
}
