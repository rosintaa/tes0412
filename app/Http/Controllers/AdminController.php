<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Admin::all();
        return view('admin/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'role' => 'required|in:administrator,member', // Validate the 'role' field
        ]);

        // Create an array with the input values
        $data = [
            'name' => $request->input('name'),
            'password' => $request->input('password'),
            'email' => $request->input('email'),
            'role' => $request->input('role'), // Include the 'role' field
        ];

        // Create a new admin record
        Admin::create($data);

        return redirect('/admin')->with('success', 'Berhasil menambah data.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Admin::where('id', $id)->first();
        return view('admin/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Admin::where('id', $id)->first();
        return view('admin/edit')->with('data', $data);
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
        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'role' => 'required|in:administrator,member', // Validate the 'role' field
        ]);

        // Create an array with the input values
        $data = [
            'name' => $request->input('name'),
            'password' => $request->input('password'),
            'email' => $request->input('email'),
            'role' => $request->input('role'), // Include the 'role' field
        ];

        // Update the admin record
        Admin::where('id', $id)->update($data);

        return redirect('/admin')->with('success', "Update data berhasil.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::where('id', $id)->delete();
        return redirect('/admin')->with('success', 'Berhasil hapus data.');
    }
}