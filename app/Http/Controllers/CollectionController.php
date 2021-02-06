<?php

namespace App\Http\Controllers;

use App\MArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;

class CollectionController extends Controller
{
    public function index()
    {
        $article = MArticle::join('user', 'user.id', '=', 'tb_artikel.upload_by')->where('upload_by', Session::get('id'))->get();
        return view('blog.menu.collection', [
            'article' => $article
        ]);
    }

    public function add_article()
    {
        return view('blog.menu.add_article');
    }

    public function article_proccess(Request $request)
    {
        $extension = $request->file('foto_artikel')->extension();
        $imgname = rand(0, 50000) . '_' . 'Article' . '_' . date('dmyHis') . '.' . $extension;
        Storage::putFileAs('public/article', $request->file('foto_artikel'), $imgname);

        $article = new MArticle();
        $article->id_kategori = 1;
        $article->nama_artikel = $request->input('nama_artikel');
        $article->isi_artikel = $request->input('isi_artikel');
        $article->foto_artikel = $imgname;
        $article->upload_by = Session::get('id');
        $article->upload_at = date('Y-m-d');

        $save = $article->save();

        if ($save) {
            return 'success';
        } else {
            return 'error';
        }
    }
}
