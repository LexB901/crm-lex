<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weetje;
use Illuminate\Support\Facades\Auth;
use App\Categorie;

class WeetjesFormController extends Controller
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
        return view('WeetjesForm'); //
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
            'categorie' => 'required',
            'date' => 'required',
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $weetje = Weetje::create($data);
        $categories = Categorie::select('id', 'categorie')->get();
        $message = "Weetje verzonden";
        echo "<script type='text/javascript'>alert('$message');</script>";
        // dd($weetje);
        return view('WeetjesForm', ['input' => $weetje, 'categorie' => $weetje->categorien, 'user' => $weetje->user, 'categories' => $categories]);
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
        return view('EditWeetjes', ['input' => $weetje, 'categories' => $categories, 'categorie' => $weetje->categorien]);
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
        return  redirect('Weetjes-Beheer');
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
        return redirect('Weetjes-Beheer');
    }
}
