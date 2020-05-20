<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Music;
use App\User;
use App\Scene;
use App\Category;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //条件追加のためのクエリーを生成
        $query = Music::query();
        //条件追加
        $query -> where('delete_flg',0);
        //要素を取得
        //$musics = $query->get();
        $musics = $query->paginate(10);

        $query = Category::query();
        $query -> where('delete_flg',0);
        $categories = $query->get();

        $query = Scene::query();
        $query -> where('delete_flg',0);
        $scenes = $query->get();

        $items = [
            'musics' => $musics,
            'categories' => $categories,
            'scenes' => $scenes
        ];

        return view('musics.index', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $query = Category::query();
        $query -> where('delete_flg',0);
        $categories = $query->get();

        $query = Scene::query();
        $query -> where('delete_flg',0);
        $scenes = $query->get();

        $items = [
            'categories' => $categories,
            'scenes' => $scenes
        ];

        return view('musics.create', $items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // エラーチェック
        //$this->validate($request, Music::$validateRule);

        $music = new Music;
        $form = $request->all();
        unset($form['_token']);
        $music->user_id = 1;
        $music->fill($form)->save();
        return redirect('music/'.$music->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //条件追加のためのクエリーを生成
        $music = Music::find($id);
        return view('musics.show', ['music' => $music]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $music = Music::find($id);

        $query = Category::query();
        $query -> where('delete_flg',0);
        $categories = $query->get();

        $query = Scene::query();
        $query -> where('delete_flg',0);
        $scenes = $query->get();

        $items = [
            'music' => $music,
            'categories' => $categories,
            'scenes' => $scenes
        ];

        return view('musics.edit', $items);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // エラーチェック
        //$this->validate($request, Music::$validateRule);

        $music = Music::find($id);
        $form = $request->all();
        unset($form['_token']);
        $music->fill($form)->save();
        return redirect('music/'.$music->id);
    }

    // 論理削除用メソッド
    public function logicDelete($id)
    {
        $music = Music::find($id);
        $music->delete_flg = 1;
        $music->save();

        //一覧画面に戻る
        $query = Music::query();
        $query -> where('delete_flg',0);
        // $musics = $query->get();
        $musics = $query->paginate(10);

        $query = Category::query();
        $query -> where('delete_flg',0);
        $categories = $query->get();

        $query = Scene::query();
        $query -> where('delete_flg',0);
        $scenes = $query->get();

        $items = [
            'musics' => $musics,
            'categories' => $categories,
            'scenes' => $scenes
        ];

        return view('musics.index', $items);
    }

    // 検索用メソッド
    public function search(Request $request)
    {
        //条件追加のためのクエリーを生成
        $query = Music::query();
        //deleteFlgが立っているものはリストに入れない
        $query -> where('delete_flg',0);

        // 検索条件が入力されていれば追加
        // 曲名
        if ($request->music_title != "") {
            $query -> where('music_title', 'like', '%'.$request->music_title.'%');
        }
        // アーティスト　
        if ($request->artist != "") {
            $query -> where('artist', 'like', '%'.$request->artist.'%');
        }
        // カテゴリー
        if ($request->category_id != "") {
            $query -> where('category_id', $request->category_id);
        }
        // 場面
        if ($request->scene_id != "") {
            $query -> where('scene_id', $request->scene_id);
        }
        // 備考
        if ($request->music_remark != "") {
            $query -> where('music_remark', 'like', '%'.$request->music_remark.'%');
        }
        // 最大得点
        if ($request->high_score_from != "") {
            $high_score_from = $request->high_score_from;
            if ($request->high_score_to != "") {
                $high_score_to = $request->high_score_to;
                $query -> whereBetween('high_score', [$high_score_from, $high_score_to]);
            } else {
                $query ->where('high_score', '>=', $high_score_from);
            }
        } elseif ($request->high_score_to != "") {
            $high_score_to = $request->high_score_to;
            $query ->where('high_score', '<=', $high_score_to);
        }
        // 平均得点
        if ($request->average_score_from != "") {
            $average_score_from = $request->average_score_from;
            if ($request->average_score_to != "") {
                $average_score_to = $request->average_score_to;
                $query -> whereBetween('average_score', [$average_score_from, $average_score_to]);
            } else {
                $query ->where('average_score', '>=', $average_score_from);
            }
        } elseif ($request->average_score_to != "") {
            $average_score_to = $request->average_score_to;
            $query ->where('average_score', '<=', $average_score_to);
        }
        // 時間
        if ($request->time_from != "") {
            $time_from = $request->time_from;
            if ($request->time_to != "") {
                $time_to = $request->time_to;
                $query ->where('time', '>=', $time_from);
                $query ->where('time', '<=', $time_to);
            } else {
                $query ->where('time', '>=', $time_from);
            }
        } elseif ($request->time_to != "") {
            $time_to = $request->time_to;
            $query ->where('time', '<=', $time_to);
        }

        //要素を取得
        //$musics = $query->get();
        $musics = $query->paginate(10);

        $query = Category::query();
        $query -> where('delete_flg',0);
        $categories = $query->get();

        $query = Scene::query();
        $query -> where('delete_flg',0);
        $scenes = $query->get();

        $items = [
            'musics' => $musics,
            'categories' => $categories,
            'scenes' => $scenes
        ];

        return view('musics.index', $items);
    }
}
