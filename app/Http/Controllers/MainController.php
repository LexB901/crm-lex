<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Respources\Views;
use App\Categorie;
use App\Models\User;
use App\Weetje;
use Illuminate\Support\Facades\Storage;
use App\Role;


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
    public function weetjes()
    {
        return view('weetjes');
    }
    public function profiel()
    {
        return view('profiel');
    }
    public function user()
    {
        return view('user');
    }
    public function maps()
    {
        return view('maps');
    }
    public function rol()
    {
        return view('role');
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
        // dd($posts);
        return view('profiel', ['posts' => $posts]);
    }
    public function getUsers(Request $request)
    {
        $users = User::all();

        // dd($users);
        return view('user', ['users' => $users]);
    }
    public function store(Request $request)
    {
        $store = Storage::disk('public')->put('example.txt', $request->file);
        // dd($store);
        echo asset('storage/' . $store);
    }
    public function role()
    {
        $role = Role::select('id', 'role')->get();
        return view('role', ['role' => $role]);
    }
}
