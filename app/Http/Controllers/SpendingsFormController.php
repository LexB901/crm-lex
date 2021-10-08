<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\project;
use App\Spending;
use Illuminate\Support\Facades\Storage;


class SpendingsFormController extends Controller
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
            'name' => 'required',
            'date' => 'required',
            'project' => 'required',
            'currency' => 'required',
            'note' => 'required',
            'file' => 'required',
            'type' => 'required',


        ]);

        $data = $request->all();
        // dd($data);
        $spending = Spending::create($data);

        $projects = project::select('id', 'project')->get();

        $store = Storage::disk('public')->put($spending->id, $request->file);
        $spending->update([
            'file' => $store,
        ]);
        $message = "uitgave verzonden";
        echo "<script type='text/javascript'>alert('$message');</script>";
        return view('Spendings', ['input' => $spending, 'categorie' => $spending->projects, 'projects' => $projects]);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
    }
}
