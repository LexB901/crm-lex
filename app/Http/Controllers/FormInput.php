<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weetje;
use Illuminate\Support\Facades\Auth;
use App\Categorie;

class FormInput extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('weetjes'); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'weetje' => 'required',
            'categorie' => 'required'
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $weetje = Weetje::create($data);
        // dd($weetje);
        return view('post', ['input' => $weetje, 'categorie' => $weetje->categorien, 'user' => $weetje->user]);
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
        $weetje = Weetje::find($id);
        $categories = Categorie::all();
        // dd($categories);
        return view('edit', ['input' => $weetje, 'categories' => $categories, 'categorie' => $weetje->categorien]);
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
        $input = Weetje::find($request->id);
        $input->title = $request->title;
        $input->weetje = $request->weetje;
        $input->categorie = $request->categorie;
        $input->save();
        return  redirect('profiel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteWeetje($id)
    {
        $input = Weetje::find($id);
        $input->delete();
        return redirect('profiel');
    }
}
