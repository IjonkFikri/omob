<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('users.index', compact('users', 'roles'));
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nis' => ['required'],
            'role' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $cUser = User::create([
            'name' => $request['name'],
            'nis' => $request['nis'],
            'role' => $request['role'],
            'password' => Hash::make($request['password']),
        ]);
        if ($cUser) {
            toastr()->success('Data has been saved successfully!');
            return redirect('users');
        }
        toastr()->error('An error has occurred please try again later.');
        return back();
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
        $users = User::findOrFail($id);
        $roles = Role::all();
        // dd($users);
        return view('users.edit', compact('users', 'roles'));
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
            'name' => ['required', 'string', 'max:255'],
            'nis' => ['required'],
            'role' => ['required'],
        ]);
        $updateUser = User::findOrFail($id)->update($request->all());
        if ($updateUser) {
            toastr()->success('Data has been update successfully!');
            return redirect('users');
        }
        toastr()->error('An error has occurred please try again later.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteUser = User::findOrFail($id)->delete();
        if ($deleteUser) {
            toastr()->success('Data has been delete successfully!');
            return redirect('users');
        }
        toastr()->error('An error has occurred please try again later.');
        return back();
    }

    /**
     * function import data
     */
    public function import_excel(Request $request)
    {
        //validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        if ($request->hasFile('file')) {
            // menangkap fils excel
            $file = $request->file('file');
            Excel::import(new UserImport, $file);
            // notifikasi dengan session
            toastr()->success('Data has been saved', 'Successfully !');
            return redirect('/users');
        }
        toastr()->error('An error has occurred please try again later.');
        return back();
    }
}
