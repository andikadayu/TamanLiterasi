<?php

namespace App\Http\Controllers;

use App\MUser;
use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view("blog.menu.home");
    }

    public function login(Request $request)
    {
        $email = $request->get('email');
        $gid = $request->get('id');
        $img = $request->get('img');
        $name = $request->get('name');

        $cek = MUser::where('email', $email)->first();
        if ($cek == null || $cek == "") {
            $user = new MUser();
            $user->name = $name;
            $user->email = $email;
            $user->g_id = $gid;
            $user->img = $img;

            $user->save();
            $IdFirst = $user->id;
            Session::put('is_login', true);
            Session::put('id', $IdFirst);
            Session::put('name', $name);
            Session::put('email', $email);
            Session::put('img', $img);
            Session::put('gid', $gid);
        } else {
            Session::put('is_login', true);
            Session::put('id', $cek->id);
            Session::put('name', $cek->name);
            Session::put('email', $cek->email);
            Session::put('img', $cek->img);
            Session::put('gid', $cek->g_id);
        }

        if (Session::get('is_login') == true) {
            return 'success';
        } else {
            return 'error';
        }
    }

    function logout()
    {
        Session::flush();
        return 'success';
    }
}
