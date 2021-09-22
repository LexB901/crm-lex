<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use App\Models\User;
use App\Models\Status;
use Illuminate\Support\Facades\Hash;

class RegisterInput extends Controller
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
        return view('index'); //
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
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
            'image' => 'required',

        ]);
        $store = Storage::disk('public')->put('example.txt', $request->file);
        $data = $request->all();
        $user = Register::create($data);
        // dd($data);
        return view('user', ["input" => $user, 'image' => $store]);
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
    public function editUser($id)
    {
        $user = User::find($id);
        $statuses = Status::all();
        // dd($user->statuss);
        return view('editUser', ['input' => $user, 'statuses' => $statuses, 'status' => $user->statuss]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request)
    {
        $data = $request->all();

        $input = User::find($data['id']);
        $input->name = $data['name'];
        $input->email = $data['email'];
        $input->status = $data['banned'];
        $input->save();
        // dd($data);
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteUser($id)
    {
        $input = User::find($id);
        $input->delete();
        return redirect('user');
    }
    public function banUser($id)
    {
        $input = User::find($id);

        // dd($input);
        return redirect('user');
    }
}
