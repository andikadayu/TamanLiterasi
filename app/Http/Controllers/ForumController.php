<?php

namespace App\Http\Controllers;

use App\MForum;
use Illuminate\Http\Request;
use Session;

class ForumController extends Controller
{
    public function index()
    {
        $chat = MForum::join('user', 'user.id', '=', 'tb_forum.id_user')
            ->whereMonth('chat_time', date('m'))
            ->get();
        return view('blog.menu.forum', [
            'chat' => $chat
        ]);
    }

    public function chat_forums(Request $request)
    {
        $chat = new MForum();
        $chat->id_user = Session::get('id');
        $chat->chat = $request->input('chat');
        $chat->chat_time = date('Y-m-d H:i:s');

        $insert = $chat->save();
        if ($insert) {
            return 'success';
            MForum::where('chat_time', '<', date('m Y'))->delete();
        } else {
            return 'error';
        }
    }
}
