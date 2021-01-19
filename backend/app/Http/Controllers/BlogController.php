<?php

namespace App\Http\Controllers;

use App\Models\Blog; // ORM用
use App\Http\Requests\BlogRequest; // バリデーション用

class BlogController extends Controller
{
    /**
     *  ブログ一覧を表示
     * @return view
     */
    public function showList()
    {
        $blogs = Blog::all(); // Blogデータ
        // dd($blogs); // デバック
        return view('blog.list', ['blogs' => $blogs]);
    }
    /**
     *  詳細画面を表示
     * @param int $id
     * @return view
     */
    public function showDetail($id)
    {
        $blog = Blog::find($id); // id取得
        // idがなければ一覧に戻す
        if (is_null($blog)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('blogs'));
        }
        return view('blog.detail', ['blog' => $blog]);
    }
    /**
     *  ブログ登録画面を表示
     *
     * @return view
     */
    public function showCreate()
    {
        return view('blog.form');
    }
    /**
     *  ブログを登録
     *
     * @return view
     */
    public function exeStore(BlogRequest $request)
    {
        // ブログのリクエスト
        $input = $request->all();
        // トランザクション（エラーがあったら登録しない）
        \DB::beginTransaction();
        try {
            // ブログを登録
            Blog::create($input);
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg', 'ブログを登録しました');
        return redirect(route('blogs'));
    }
    /**
     *  ブログ編集画面を表示
     * @param int $id
     * @return view
     */
    public function showEdit($id)
    {
        $blog = Blog::find($id);
        if (is_null($blog)) {
            \Session::flash('err_msg', 'データがありません');
            return redirect(route('blogs'));
        }
        return view('blog.edit', ['blog' => $blog]);
    }
    /**
     *  ブログを更新
     *
     * @return view
     */
    public function exeUpdate(BlogRequest $request)
    {
        $input = $request->all();
        \DB::beginTransaction();
        try {
            // （hiddenから送られたidを取得）
            $blog = Blog::find($input['id']);
            // 更新
            $blog->fill([
                'title' => $input['title'],
                'content' => $input['content'],
            ]);
            $blog->save(); // saveは差分更新 updateは全更新
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg', 'ブログを更新しました');
        return redirect(route('blogs'));
    }
    /**
     *  ブログを削除
     * @param int $id
     * @return view
     */
    public function exeDelete($id)
    {
        if (empty($id)) {
            \Session::flash('err_msg', '削除できるデータがありません');
            return redirect(route('blogs'));
        }
        try {
            // ブログを削除
            Blog::destroy($id);
        } catch (\Throwable $e) {
            abort(500);
        }
        \Session::flash('err_msg', '削除しました');
        return redirect(route('blogs'));
    }
}
