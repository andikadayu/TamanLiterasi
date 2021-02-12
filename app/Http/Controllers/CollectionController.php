<?php

namespace App\Http\Controllers;

use App\MArticle;
use App\MEpisode;
use App\MNovel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;

class CollectionController extends Controller
{
    public function index()
    {
        $article = MArticle::select("tb_artikel.id as id", "name", "nama_artikel", "isi_artikel", "upload_at", "foto_artikel")
            ->join('user', 'user.id', '=', 'tb_artikel.upload_by')->where('upload_by', Session::get('id'))->orderBy('tb_artikel.id', 'DESC')->get();
        $novel = MNovel::select("tb_novel.id as id", "name", "nama_novel", "sinopsis", "published_at", "foto_novel")
            ->join('user', 'user.id', '=', 'tb_novel.author')->where('author', Session::get('id'))->orderBy('tb_novel.id', 'DESC')->get();
        return view('blog.menu.collection', [
            'novel' => $novel,
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

    public function viewEdit($id)
    {
        $article = MArticle::where('id', base64_decode($id))->get();
        return view('blog.menu.update_article', [
            'article' => $article
        ]);
    }

    public function article_update(Request $request)
    {
        $article = MArticle::find(base64_decode($request->input('id')));
        $article->nama_artikel = $request->input('nama_artikel');
        $article->isi_artikel = $request->input('isi_artikel');
        $article->last_update = date('Y-m-d');

        if ($request->hasFile('foto_artikel')) {
            $artBefore = $this->check_article(base64_decode($request->input('id')))->foto_artikel;
            unlink(storage_path('app/public/laporan' . $artBefore));

            $extension = $request->file('foto_artikel')->extension();
            $imgname = rand(0, 50000) . '_' . 'Article' . '_' . date('dmyHis') . '.' . $extension;
            Storage::putFileAs('public/article', $request->file('foto_artikel'), $imgname);

            $article->foto_artikel = $imgname;
        }

        $update = $article->save();

        if ($update) {
            return 'success';
        } else {
            return 'error';
        }
    }

    public function check_article($id)
    {
        return MArticle::where('id', $id)->first();
    }

    public function article_delete(Request $request)
    {
        $artBefore = $this->check_article(base64_decode($request->get('id')))->foto_artikel;
        unlink(storage_path('app/public/laporan' . $artBefore));

        $article = MArticle::find($request->get('id'));
        $delete = $article->delete();

        if ($delete) {
            return 'success';
        } else {
            return 'error';
        }
    }

    // Novel Collection Controoller 

    public function add_novel()
    {
        return view('blog.menu.add_novel');
    }

    public function novel_proccess(Request $request)
    {
        $extension = $request->file('foto_novel')->extension();
        $imgname = rand(0, 50000) . '_' . 'Novel' . '_' . date('dmyHis') . '.' . $extension;
        Storage::putFileAs('public/novel', $request->file('foto_novel'), $imgname);

        $novel = new MNovel();
        $novel->id_kategori = 2;
        $novel->nama_novel = $request->input('nama_novel');
        $novel->sinopsis = $request->input('sinopsis');
        $novel->author = Session::get('id');
        $novel->published_at = date('Y-m-d');
        $novel->foto_novel = $imgname;

        $save = $novel->save();
        if ($save) {
            return 'success';
        } else {
            return 'error';
        }
    }

    public function collecion_novel($id)
    {
        $novel = MNovel::select('tb_novel.id as id', 'name', 'sinopsis', 'nama_novel', 'published_at', 'foto_novel', 'img')
            ->join('user', 'user.id', '=', 'tb_novel.author')
            ->where('tb_novel.id', base64_decode($id))
            ->get();

        $episode = MEpisode::join('tb_novel', 'tb_novel.id', 'tb_episode.id_novel')->where('id_novel', base64_decode($id))->paginate(10);
        $Jepisode = MEpisode::where('id_novel', base64_decode($id))->count();

        return view('blog.menu.collection_novel', [
            'novel' => $novel,
            'episode' => $episode,
            'Jepisode' => $Jepisode
        ]);
    }

    public function episode($id)
    {
        return view('blog.menu.add_episode', [
            'id' => base64_decode($id)
        ]);
    }

    public function add_proccess(Request $request)
    {
        $ep = $this->get_episode($request->input('id_novel'));
        $episode = new MEpisode();
        $episode->id_novel = $request->input('id_novel');
        $episode->judul_episode = $request->input('judul_episode');
        $episode->isi_episode = $request->input('isi_episode');
        $episode->tanggal = date('Y-m-d H:i:s');
        if ($ep == null || $ep == "") {
            $episode->episode = 1;
        } else {
            $episode->episode = $ep->episode + 1;
        }

        $insert = $episode->save();

        if ($insert) {
            return 'success';
        } else {
            return 'error';
        }
    }

    public function get_episode($id)
    {
        return MEpisode::where('id_novel', $id)->first();
    }
}
