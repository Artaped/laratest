<?php

namespace App\Http\Controllers;

use App\News;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(6);
        return view('admin.users.users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'avatar' => 'nullable|image',
        ]);

        $user = User::add($request->all());
        $user->setNews($request->get('news'));
        $user->uploadAvatar($request->file('avatar'));
        return redirect()->route('admin.users')->with('status', 'User created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $newses = News::pluck('title', 'id')->all();
        $selectedNews = $user->news->pluck('id')->all();
        return view('admin.users.edit', ['user' => $user, 'selectedNews'=>$selectedNews, 'newses' => $newses]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate($request, [
            'name' => 'required',
            'email' =>  [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'required',
            'avatar' => 'nullable'
        ]);

        $user->edit($request->all());
        $user->uploadAvatar($request->file('avatar'));
        return redirect()->route('admin.users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         User::find($id)->remove();
        return redirect()->route('admin.users')->with('status', 'user deleted');
    }
}
