<?php

namespace App\Http\Controllers;

use App\News;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newses = DB::table('news')->paginate(6);

        return view('admin.news.news', ['newses' => $newses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('admin',  0)->get();
        return view('admin.news.create', ['users' => $users]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
        ]);
        $news = News::add($request->all());
        if($request->input('users')){
            $news->users()->attach($request->input('users'));
        }
        return redirect()->route('admin.news', $news)->with('status', 'news created');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        $users = $news->users->where('admin', 0)->all();
        return view('admin.news.edit', ['news' => $news, 'users' => $users]);
    }


    /**
     * @param Request $request
     * @param $id
     * @return bool
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
        ]);
        $news = News::find($id);
        $news->edit($request->all());
// you can change authors this news if use this code
//        if($request->input('users')){
//            $news->users()->attach($request->input('users'));
//        }
        return redirect()->route('main');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::find($id)->remove();
        return redirect()->route('admin.news')->with('status', 'news deleted');
    }
}
