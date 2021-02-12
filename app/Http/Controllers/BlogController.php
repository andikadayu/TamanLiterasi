<?php

namespace App\Http\Controllers;

use App\MArticle;
use App\MComment;
use App\MNovel;
use Illuminate\Http\Request;
use Session;

class BlogController extends Controller
{
    public function viewBlog()
    {
        $article = MArticle::join('user', 'user.id', '=', 'tb_artikel.upload_by')->orderBy('tb_artikel.id', 'DESC')->paginate(9);
        return view("blog.menu.blogging", [
            'article' => $article
        ]);
    }

    public function detailBlog($name)
    {
        $article = MArticle::join('user', 'user.id', '=', 'tb_artikel.upload_by')->where('nama_artikel', $name)->get();

        $recent = MArticle::join('user', 'user.id', '=', 'tb_artikel.upload_by')->whereNotIn('nama_artikel', [$name])->paginate(9);

        $getId = MArticle::where('nama_artikel', $name)->get();

        foreach ($getId as $key) {
            $komentar = MComment::join('user', 'user.id', '=', 'tb_komentar.id_user')
                ->join('tb_artikel', 'tb_artikel.id', '=', 'tb_komentar.id_detail')
                ->where('tb_komentar.id_detail', $key->id)
                ->where('tb_komentar.id_kategori', 1)
                ->paginate(10);

            $jkomentar = MComment::where('id_detail', $key->id)
                ->where('id_kategori', 1)
                ->count();
        }


        $jArt = MArticle::count();
        $jNov = MNovel::count();

        return view("blog.menu.detail_article", [
            'article' => $article,
            'getId' => $getId,
            'jArt' => $jArt,
            'jNov' => $jNov,
            'recent' => $recent,
            'komentar' => $komentar,
            'jkomentar' => $jkomentar
        ]);
    }

    public function comment_article(Request $request)
    {
        $komen = new MComment();
        $komen->id_detail = $request->input('id_detail');
        $komen->id_kategori = 1;
        $komen->id_user = Session::get('id');
        $komen->tanggal = date('Y-m-d H:i:s');
        $komen->isi_chat = $request->input('komentar');

        $post = $komen->save();
        if ($post) {
            return 'success';
        } else {
            return 'error';
        }
    }
}
