<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\RoleUser;



class RoleUserController extends Controller
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
            'role' => 'required'
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $user = Auth::user();
        $user->roles()->attach([
            $data['role']
        ]);
        // dd($user->roles);
        return view('role2', ['roles' => $user, 'rol' => $user->roles]);
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
    public function editRole($id)
    {
        $role = Role::find($id);

        return view('editRole', ['input' => $role]);
    }
    public function editRole2($id)
    {
        $allusers = User::with('roles')->get()->all();
        // dd($allusers);
        return view('editRole2', ['input' => $allusers]);
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

        $input = Role::find($data['id']);
        $input->role = $request->role;
        $input->save();
        return redirect('roles');
    }
    public function update2(Request $request)
    {
        $data = $request->all();

        $input = Role::find($data['id']);
        $input->role = $request->role;
        $input->save();
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteRole($id)
    {
        Auth::user()->roles()->detach($id);
        return redirect('roles');
    }
    public function deleteRole2($id)
    {
        Auth::user()->roles()->detach($id);
        return redirect('admin');
    }
}
