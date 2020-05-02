<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Scene;

class SceneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //条件追加のためのクエリーを生成
        $query = Scene::query();
        //条件追加
        $query -> where('delete_flg',0);
        //要素を取得
        $scenes = $query->get();

        return view('scenes.index', ['scenes' => $scenes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('scenes.create');
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
        $this->validate($request, Scene::$validateRule);

        $scene = new Scene;
        // $scene->name = $request->name;
        // $scene->remark = $request->remark;
        $form = $request->all();
        unset($form['_token']);
        $scene->fill($form)->save();
        return redirect('scene/'.$scene->id);
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
        $scene = Scene::find($id);
        return view('scenes.show', ['scene' => $scene]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scene = Scene::find($id);
        return view('scenes.edit', ['scene' => $scene]);
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
        $this->validate($request, Scene::$validateRule);

        $scene = Scene::find($id);
        // $scene->name = $request->name;
        // $scene->remark = $request->remark;
        // $scene->save();
        $form = $request->all();
        unset($form['_token']);
        $scene->fill($form)->save();
        return redirect('scene/'.$scene->id);
    }

    public function logicDelete($id)
    {
        $scene = Scene::find($id);
        $scene->delete_flg = 1;
        $scene->save();

        //一覧画面に戻る
        $query = Scene::query();
        $query -> where('delete_flg',0);
        $scenes = $query->get();
        return view('scenes.index', ['scenes' => $scenes]);
    }
}
