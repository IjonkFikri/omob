<?php

namespace App\Http\Controllers;

use App\Recap;
use App\User;
use App\Unit;
use Illuminate\Http\Request;

class RecapsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recaps = Recap::with('user', 'unit')->paginate(10);
        return view('recaps.index', compact('recaps'));
        // dd($recaps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('role', 4)->get();
        $units = Unit::all();
        return view('recaps.create', compact('users', 'units'));
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
            'units_id' => 'required',
            'users_id' => 'required',
        ]);
        $recap = Recap::create($request->all());
        if ($recap) {
            toastr()->success('Data has been saved successfully!');
            return redirect('recaps');
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
        $users = User::where('role', 4)->get();
        $units = Unit::all();
        $recaps = Recap::findOrFail($id);
        // dd($recaps);
        return view('recaps.edit', compact('recaps', 'users', 'units'));
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
            'units_id' => 'required',
            'users_id' => 'required',
        ]);
        $updateRecap = Recap::findOrFail($id)->update($request->all());
        if ($updateRecap) {
            toastr()->success('Data has been update successfully!');
            return redirect('recaps');
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
        $deleteRecap = Recap::findOrFail($id)->delete();
        if ($deleteRecap) {
            toastr()->success('Data has been delete successfully!');
            return redirect('recaps');
        }
        toastr()->error('An error has occurred please try again later.');
        return back();
    }
}
