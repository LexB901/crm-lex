<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use App\Models\User;
use App\Models\Status;
use Auth;
use Illuminate\Support\Facades\Hash;
// use Auth, Hash;

class RegisterUserController extends Controller
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
    public function create(Request $id)
    {
        $users = User::all();
        $statuses = Status::all();

        // dd($users);

        return view('/user/create', ['users' => $users, 'statuses' => $statuses]); //
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
            'password_confirmation',


        ]);
        $data = $request->all();
        $user = Register::create($data);

        // dd($data);
        return view('/user/create', ["input" => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = User::find($id);
        // return view('account', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $statuses = Status::all();

        $users = User::all();
        $status = $user->statuss->status;

        // dd($status);
        return view('/user/edit', ['input' => $user, 'statuses' => $statuses, 'status' => $status, 'users' => $users, 'role' => $user->role]);
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
        $data = $request->all();
        $input = User::find($data['id']);
        $input->name = $data['name'];
        $input->email = $data['email'];
        $input->role = $data['role'];
        $input->status = $data['status'];
        $input->save();
        // dd($data);
        return back();
    }


    public function accountUpdate(Request $request)
    {
        $data = $request->all();

        $input = User::find($data['id']);
        $input->name = $data['name'];
        $input->email = $data['email'];
        $input->save();
        // dd($data);
        return redirect('account')->with('message', 'Account updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $input = User::find($id);
        $input->delete();
        // dd($input);

        return redirect()->back();
    }
    public function deleteSession(Request $request, $id)
    {
        $session = \DB::table('sessions')->where('user_id', $id)->delete();

        return redirect('/user/show');
    }
    public function return()
    {
        return redirect()->back();
    }
}
