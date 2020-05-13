<?php

namespace App\Http\Controllers;

use App\Member;
use DB;
use Validator, File, Redirect, Response;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_member = DB::table('users')->get();
        return view('member.index', compact('ar_member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("member.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'password' => 'required|min:8',
                'roles' => 'required',
                'status' =>  'required',
                'address' =>  'required',
                'phone' =>  'required',
                'avatar' => 'image|mimes:png,jpg,jpeg|max:2048',
            ]
        );
        //proses upload file
        if (!empty($request->avatar)) {
            $fileName = $request->name . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('images/member'), $fileName);
        } else { //tidak ada upload file
            $fileName = '';
        }

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  Hash::make($request->password),
            'roles' => $request->roles,
            'address' => $request->address,
            'phone' => $request->phone,
            'avatar' => $fileName,
            'status' =>  $request->status,

        ]);
        return redirect('/member')->with('status', 'User
        successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ar_member = DB::table('users')
            ->select('users.*')
            ->where('users.id', '=', $id)
            ->get();
        return view('member.show', compact('ar_member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = member::where('id', $id)->get();
        return view('member.edit', compact('data'));
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
        $validasi = $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'password' => 'required|min:8',
                'roles' => 'required',
                'status' =>  'required',
                'address' =>  'required',
                'phone' =>  'required',
                'avatar' => 'image|mimes:png,jpg,jpeg|max:2048',
            ]
        );
        $foto = DB::table('users')->select('avatar')
            ->where('id', $id)->get();
        foreach ($foto as $f) {
            $namaFile = $f->avatar;
        }
        if (!empty($request->avatar)) {
            //hapus fisik foto lama di folder img
            File::delete(public_path('images/member/' . $namaFile));
            //proses upload file foto baru
            $request->validate([
                'avatar' => 'image|mimes:png,jpg,jpeg|max:2048',
            ]);
            $fileName = $request->name . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('images/member'), $fileName);
        } else { //tidak ganti foto
            $fileName = $namaFile;
        }

        DB::table('users')->where('id', $id)->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'roles' => $request->roles,
                'address' => $request->address,
                'phone' => $request->phone,
                'avatar' => $fileName,
                'status' =>  $request->status,
            ]
        );
        return redirect('/member')->with('status', 'User
        succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foto = DB::table('users')->select('avatar')
            ->where('id', $id)->get();
        foreach ($foto as $f) {
            $namaFile = $f->avatar;
        }
        File::delete(public_path('images/member/' . $namaFile));
        DB::table('users')->where('id', $id)->delete();
        return redirect('/member');
    }
}
