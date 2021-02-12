<?php

namespace App\Http\Controllers;

use App\MNovel;
use Illuminate\Http\Request;

class NovelController extends Controller
{
    public function index()
    {
        $novel = MNovel::select('tb_novel.id as id', 'name', 'nama_novel', 'published_at', 'foto_novel', 'sinopsis')
            ->join('user', 'user.id', '=', 'tb_novel.author')
            ->orderBy('tb_novel.id', 'DESC')
            ->paginate(9);
        return view('blog.menu.novel', [
            'novel' => $novel
        ]);
    }
}
