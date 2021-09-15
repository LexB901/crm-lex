<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Respources\Views;
use App\Categorie;
use App\Models\User;
use App\Weetje;
use Illuminate\Support\Facades\Storage;
use App\Role;
use App\RoleUser;
use Response;


class MainController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function registreer()
    {
        return view('registreer');
    }
    public function maps()
    {
        return view('maps');
    }
    public function welcome()
    {
        return view('welcome');
    }
    public function beheer()
    {
        return view('beheer');
    }
    public function create()
    {
        $categories = Categorie::select('id', 'categorie')->get();
        return view('weetjes', ['categories' => $categories]);
    }
    public function getWeetjes()
    {
        $posts = Weetje::all();
        $gebruikers = User::all();
        // dd($gebruikers);
        return view('profiel', ['posts' => $posts]);
    }
    public function getUsers(Request $request)
    {
        $users = User::all();

        // dd($users);
        return view('user', ['users' => $users]);
    }
    public function getRoles(Request $request)
    {
        $roles = \Auth::user()->roles;
        $users = \Auth::user();

        // dd($roles);
        return view('roles', ['roles' => $roles, 'users' => $users]);
    }
    public function store(Request $request)
    {
        $store = Storage::disk('public')->put('example.txt', $request->file);
        // dd($store);
        echo asset('storage/' . $store);
    }
    public function role()
    {
        $roles = Role::select('id', 'role')->get();
        return view('role', ['roles' => $roles]);
    }
    public function getRoles2(Request $request)
    {
        $roles = \Auth::user()->roles;
        $users = \Auth::user();
        $allusers = User::with('roles')->get();

        // dd($allusers);
        return view('admin', ['roles' => $roles, 'users' => $users, 'allusers' => $allusers]);
    }
    public function getWeetjes2()
    {
        $posts = Weetje::all();
        $gebruikers = User::all();
        // dd($gebruikers);
        return view('weetjess', ['posts' => $posts]);
    }
}
