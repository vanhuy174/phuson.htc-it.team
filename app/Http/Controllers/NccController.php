<?php

namespace App\Http\Controllers;

use App\Ncc;
use Illuminate\Http\Request;

class NccController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $ncc = Ncc::all();
        return view('index_ncc', compact('ncc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ncc = new Ncc();
        $ncc->name = $request->name;
        $ncc->discription = $request->discription;
        $ncc->save();
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_area, $id_product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ncc = Ncc::find($id);
        return view('edit_ncc', compact('ncc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ncc = Ncc::find($request->id);
        $ncc->name=  $request->name;
        $ncc->discription=  $request->discription;
        $ncc->save();
        return redirect('/ncc');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ncc= Ncc::find($id);
        $ncc->delete();
        return back();
    }
}
