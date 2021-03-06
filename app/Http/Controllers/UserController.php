<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //条件追加のためのクエリーを生成
        $query = User::query();
        //条件追加
        $query -> where('delete_flg',0);
        //要素を取得
        //$users = $query->get();
        $users = $query->paginate(10);

        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
        $this->validate($request, User::$validateRule);

        $user = new User;
        // $user->name = $request->name;
        // $user->full_name = $request->full_name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->admin = $request->admin;
        $form = $request->all();
        unset($form['_token']);
        $user->fill($form)->save();
        return redirect('user/'.$user->id);
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
        $user = User::find($id);
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', ['user' => $user]);
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
        $this->validate($request, User::$validateRule);

        $user = User::find($id);
        $form = $request->all();
        unset($form['_token']);
        $user->fill($form)->save();
        return redirect('user/'.$user->id);
    }

    public function logicDelete($id)
    {
        $user = User::find($id);
        $user->delete_flg = 1;
        $user->save();

        //一覧画面に戻る
        $query = User::query();
        $query -> where('delete_flg',0);
        $users = $query->paginate(10);
        return view('users.index', ['users' => $users]);
    }
}
