<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //条件追加のためのクエリーを生成
        $query = Category::query();
        //条件追加
        $query -> where('delete_flg',0);
        //要素を取得
        $categories = $query->get();

        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
        $this->validate($request, Category::$validateRule);

        $category = new Category;
        // $category->name = $request->name;
        // $category->remark = $request->remark;
        // $category->save();
        $form = $request->all();
        unset($form['_token']);
        $category->fill($form)->save();
        return redirect('category/'.$category->id);
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
        $category = Category::find($id);
        return view('categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', ['category' => $category]);
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
        $this->validate($request, Category::$validateRule);

        $category = Category::find($id);
        // $category->name = $request->name;
        // $category->remark = $request->remark;
        // $category->save();
        $form = $request->all();
        unset($form['_token']);
        $category->fill($form)->save();
        return redirect('category/'.$category->id);
    }

    public function logicDelete($id)
    {
        $category = Category::find($id);
        $category->delete_flg = 1;
        $category->save();

        //一覧画面に戻る
        $query = Category::query();
        $query -> where('delete_flg',0);
        $categories = $query->get();
        return view('categories.index', ['categories' => $categories]);
    }
}
