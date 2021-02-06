<?php

namespace App\Http\Controllers;

use App\MArticle;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function viewBlog()
    {
        $article = MArticle::join('user', 'user.id', '=', 'tb_artikel.upload_by')->paginate(9);
        return view("blog.menu.blogging", [
            'article' => $article
        ]);
    }

    public function detailBlog($name)
    {
        $article = MArticle::join('user', 'user.id', '=', 'tb_artikel.upload_by')->where('nama_artikel', $name)->get();

        $recent = MArticle::join('user', 'user.id', '=', 'tb_artikel.upload_by')->whereNotIn('nama_artikel', [$name])->paginate(9);

        $jArt = MArticle::count();
        $jNov = 0;

        return view("blog.menu.detail_article", [
            'article' => $article,
            'jArt' => $jArt,
            'jNov' => $jNov,
            'recent' => $recent
        ]);
    }
}
