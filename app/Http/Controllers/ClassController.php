<?php

namespace App\Http\Controllers;

use App\Clas;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = Clas::all();
        return view('class.index', compact('class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('class.create');
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
            'name' => 'required',
            'kelas' => 'required',
        ]);
        $class = new Clas();
        if ($class->Create($request->all())) {
            return redirect('/class')->with(['success' => 'Pesan Berhasil']);
        }
        return redirect('/class')->with(['error' => 'Pesan Error']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clas  $clas
     * @return \Illuminate\Http\Response
     */
    public function show(Clas $clas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clas  $clas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = Clas::find($id);
        return view('class.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clas  $clas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'kelas' => 'required',
        ]);
        $class = new Clas();
        if ($class->find($id)->Update($request->all())) {
            return redirect('/class')->with(['success' => 'Pesan Berhasil']);
        }
        return redirect('/class')->with(['error' => 'Pesan Error']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clas  $clas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = new Clas();
        if ($class->find($id)->Delete()) {
            return redirect('/class')->with(['success' => 'Pesan Berhasil']);
        }
        return redirect('/class')->with(['error' => 'Pesan Error']);
    }
    
}
