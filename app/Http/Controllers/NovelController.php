<?php

namespace App\Http\Controllers;

use App\MComment;
use App\MEpisode;
use App\MNovel;
use Illuminate\Http\Request;
use Session;

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

    public function detail($nama)
    {
        $novel = MNovel::select('tb_novel.id as id', 'name', 'sinopsis', 'nama_novel', 'published_at', 'foto_novel', 'img')
            ->join('user', 'user.id', '=', 'tb_novel.author')
            ->where('tb_novel.nama_novel', $nama)
            ->get();

        $episode = MEpisode::join('tb_novel', 'tb_novel.id', 'tb_episode.id_novel')->where('nama_novel', $nama)->paginate(10);
        $Jepisode = MEpisode::join('tb_novel', 'tb_novel.id', 'tb_episode.id_novel')->where('nama_novel', $nama)->count();

        $getId = MNovel::where('nama_novel', $nama)->get();

        foreach ($getId as $key) {
            $komentar = MComment::join('user', 'user.id', '=', 'tb_komentar.id_user')
                ->join('tb_novel', 'tb_novel.id', '=', 'tb_komentar.id_detail')
                ->where('tb_komentar.id_detail', $key->id)
                ->where('tb_komentar.id_kategori', 2)
                ->paginate(10);

            $jkomentar = MComment::where('id_detail', $key->id)
                ->where('id_kategori', 2)
                ->count();
        }

        return view('blog.menu.detailing_novel', [
            'novel' => $novel,
            'episode' => $episode,
            'Jepisode' => $Jepisode,
            'getId' => $getId,
            'komentar' => $komentar,
            'jkomentar' => $jkomentar
        ]);
    }

    public function comment_novel(Request $request)
    {
        $komen = new MComment();
        $komen->id_detail = $request->input('id_detail');
        $komen->id_kategori = 2;
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

    public function episode($nama, $eid)
    {
        $episode = MEpisode::join('tb_novel', 'tb_novel.id', '=', 'tb_episode.id_novel')
            ->where('ide', base64_decode($eid))
            ->get();
        foreach ($episode as $key => $v) {
            $next = MEpisode::where('id_novel', $v->id_novel)
                ->where('episode', '>', $v->episode)
                ->paginate(10);
        }

        return view('blog.menu.detail_episode', [
            'episode' => $episode,
            'next' => $next
        ]);
    }
}
