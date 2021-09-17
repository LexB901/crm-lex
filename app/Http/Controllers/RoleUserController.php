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
        $allusers = User::with('roles')->find($id);
        $roles = $allusers->roles;
        $allroles = Role::all();

        foreach ($allroles as $item) {
            $item['selected'] = false;
            if (collect($roles)->where('id', $item['id'])->all()) {
                $item['selected'] = true;
            }
        }
        // dd($allusers);
        return view('editRole', ['input' => $roles, 'allroles' => $allroles, 'allusers' => $allusers]);
    }
    public function editRole2($id)
    {
        $allusers = User::with('roles')->find($id);
        $roles = $allusers->roles;
        $allroles = Role::all();

        foreach ($allroles as $item) {
            $item['selected'] = false;
            if (collect($roles)->where('id', $item['id'])->all()) {
                $item['selected'] = true;
            }
        }
        // dd($allusers);
        return view('editRole2', ['input' => $roles, 'allroles' => $allroles, 'allusers' => $allusers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdateRole(Request $request)
    {

        $data = $request->only('id');
        // dd($data);
        $user = User::find($data['id']);
        $user->roles()->sync($request->input('roles'));

        // dd($user->roles);
        return redirect('roles');
    }
    public function UpdateRole2(Request $request)
    {

        $data = $request->only('id');
        // dd($data);
        $user = User::find($data['id']);
        $user->roles()->sync($request->input('roles'));

        // dd($user->roles);
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
    }
}
