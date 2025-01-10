<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cruduser;

class UserController extends Controller
{
    public function index()
    {
        $getdata = Cruduser::all();

        return view('User.index', get_defined_vars());
    }

    public function add_user()
    {
        return view('User.add_user');
    }

    public function post(Request $request)
    {
        $validated = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
        ]);

        $adduser = new Cruduser;
        $adduser->first_name = $request->fname;
        $adduser->last_name = $request->lname;
        $adduser->mobile_number = $request->mobile;
        $adduser->email_id = $request->email;
        $adduser->save();

        return redirect()->route('index')->with('success', 'User added Successfully');
    }

    public function edit_user($id)
    {
        $data = Cruduser::find($id);

        return view('User.edit_user', get_defined_vars());
    }

    public function edit_user_post(Request $request)
    {
        $adduser = Cruduser::find($request->id);
        $adduser->first_name = $request->fname;
        $adduser->last_name = $request->lname;
        $adduser->mobile_number = $request->mobile;
        $adduser->email_id = $request->email;
        $adduser->save();

        return redirect()->route('index')->with('success', 'User edited Successfully');

    }

    public function delete($id)
    {
        $delete = Cruduser::find($id)->delete();

        return redirect()->route('index')->with('success', 'User deleted Successfully');

    }
}
