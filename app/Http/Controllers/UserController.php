<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $users = User::orderBy('id', 'desc')->paginate(5);

        return view('users.index', [
            'users' => $users,
        ]);
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
        // Melakukan validasi
        $request->validate([
            'nama' => ['required', 'max:100'],
            'usia' => ['required', 'integer', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
            'avatar' => ['mimes:png,jpg,jpeg', 'max:1024'],
        ]);

        // Jika ada request avatar
        if ($request->avatar) {
            $imgName = $request->avatar->getClientOriginalName() . '-' . time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('uploads/image'), $imgName);
        } else {
            $imgName = null;
        }

        // Membuat session success
        session()->flash('success', 'User Berhasil Ditambahkan.');

        User::create([
            'nama' => $request->nama,
            'usia' => $request->usia,
            'email' => $request->email,
            'avatar' => $imgName,
        ]);

        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            abort(404);
        }

        return view('users.show', [
            'user' => $user,
        ]);
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

        if (!$user) {
            abort(404);
        }

        return view('users.edit', [
            'user' => $user,
        ]);
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
        // Melakukan validasi
        $request->validate([
            'nama' => ['required', 'max:100'],
            'usia' => ['required', 'integer', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
            'avatar' => ['mimes:png,jpg,jpeg', 'max:1024'],
        ]);

        // Jika ada request avatar
        if ($request->avatar) {
            $imgName = $request->avatar->getClientOriginalName() . '-' . time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('uploads/image'), $imgName);
        } else {
            $imgName = null;
        }

        // Merangkai data
        $data = [
            'nama' => $request->nama,
            'usia' => $request->usia,
            'email' => $request->email,
        ];

        // Menambahkan avatar jika ada
        if ($imgName) {
            $data['avatar'] = $imgName;
        }

        User::find($id)->update($data);

        // Membuat session success
        session()->flash('success', 'User Berhasil Diubah.');

        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        // Membuat session success
        session()->flash('success', 'User Berhasil Dihapus.');

        return redirect('/user');
    }
}
