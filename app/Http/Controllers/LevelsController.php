<?php

namespace App\Http\Controllers;

use App\Level;
use App\Unit;
use Illuminate\Http\Request;

class LevelsController extends Controller
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
        $levels = Level::with('unit')->paginate(10);
        return view('levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::all();
        return view('levels.create', compact('units'));
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
            'nama_kelas' => 'required',
            'units_id' => 'required',
        ]);
        $kelas = Level::create($request->all());
        if ($kelas) {
            toastr()->success('Data has been saved successfully!');
            return redirect('levels');
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
        $levels = Level::findOrFail($id);
        return view('levels.edit', compact('levels'));
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
            'nama_kelas' => 'required',
        ]);
        $updateKelas = Level::findOrFail($id)->update($request->all());
        if ($updateKelas) {
            toastr()->success('Data has been update successfully!');
            return redirect('levels');
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
        $deleteKelas = Level::findOrFail($id)->delete();
        if ($deleteKelas) {
            toastr()->success('Data has been delete successfully!');
            return redirect('levels');
        }
        toastr()->error('An error has occurred please try again later.');
        return back();
    }
}
