<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo "<h1>" . Auth::user()->name . "</h1>";
        $data = Member::all();
        return view('member/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/member/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama', $request->nama);
        Session::flash('password', $request->password);
        Session::flash('phone_number', $request->phone_number);
        Session::flash('birthdate', $request->birthdate);
        Session::flash('email', $request->email);
        Session::flash('gender', $request->gender);
        Session::flash('ktp_number', $request->ktp_number);

        // Assuming 'photo' is a file input, you might not want to flash the actual file, but you can flash the file name or path
        if ($request->hasFile('photo')) {
            Session::flash('photo', $request->file('photo')->getClientOriginalName());
        }

        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'phone_number' => 'required',
            'birthdate' => 'required',
            'email' => 'required|email|unique:members',
            'gender' => 'required|in:male,female',
            'ktp_number' => 'required',
            'photo' => 'nullable|max:1000',
        ], [
            'photo.max' => 'Foto max 1mb'
        ]);
        // $photo_file = $request->file('photo');
        // $photo_ekstensi = $photo_file->extension();
        // $photo_nama = date('ymdhis') . "." . $photo_ekstensi;
        // $photo_file->move(public_path('photo'), $photo_nama);

        $data = [
            'name' => $request->input('name'),
            'password' => $request->input('password'),
            'phone_number' => $request->input('phone_number'),
            'birthdate' => $request->input('birthdate'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'ktp_number' => $request->input('ktp_number'),
            'photo' => $request->input('photo'),

        ];
        Member::create($data);
        return redirect('/member')->with('success', 'Berhasil menambah data member.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Member::where('id', $id)->first();
        return view('member/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = member::where('id', $id)->first();
        return view('member/edit')->with('data', $data);
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
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'phone_number' => 'required',
            'birthdate' => 'required',
            'email' => 'required|email|unique:members,email,' . $id,
            'gender' => 'required|in:male,female',
            'ktp_number' => 'required',
            'photo' => 'nullable|max:1000',
        ], [
            'photo.max' => 'Foto max 1mb'
        ]);

        $data = [
            'name' => $request->input('name'),
            'password' => $request->input('password'),
            'phone_number' => $request->input('phone_number'),
            'birthdate' => $request->input('birthdate'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'ktp_number' => $request->input('ktp_number'),
        ];
        Member::where('id', $id)->update($data);
        return redirect('/member')->with('success', "Update data berhasil.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::where('id', $id)->delete();
        return redirect('/member')->with('success', 'Berhasil hapus data.');
    }
}
