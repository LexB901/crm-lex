<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Models\User;
use App\Weetje;
use Illuminate\Support\Facades\Storage;
use App\Suggestie;


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
    public function AdminNav()
    {
        return view('Admin-Nav');
    }
    public function create()
    {
        $categories = Categorie::select('id', 'categorie')->get();
        return view('WeetjesForm', ['categories' => $categories]);
    }
    public function getWeetjes()
    {
        $posts = Weetje::paginate(10);
        $gebruikers = User::all();
        // dd($posts);
        return view('Weetjes-Beheer', ['posts' => $posts]);
    }
    public function getUsers(Request $request)
    {
        $users = User::paginate(10);
        $datas = $request->session()->all();
        // dd($datas);
        return view('User-Beheer', ['users' => $users, 'datas' => $datas]);
    }
    public function getRoles(Request $request)
    {
        // $roles = \Auth::user()->roles;
        // $users = \Auth::user();

        // dd($roles);
        // return view('roles', ['roles' => $roles, 'users' => $users]);
        $roles = \Auth::user()->roles;
        $users = \Auth::user();
        $allusers = User::with('roles')->get();

        // dd($allusers);
        return view('Mijn-Rollen', ['roles' => $roles, 'users' => $users, 'allusers' => $allusers]);
    }
    public function store(Request $request)
    {
        $store = Storage::disk('public')->put('example.txt', $request->file);
        // dd($store);
        echo asset('storage/' . $store);
    }
    public function getRoles2(Request $request)
    {
        $roles = \Auth::user()->roles;
        $users = \Auth::user();
        $allusers = User::with('roles')->get();

        // dd($allusers);
        return view('Rollen-Beheer', ['roles' => $roles, 'users' => $users, 'allusers' => $allusers]);
    }
    public function getWeetjes2()
    {
        $posts = Weetje::paginate(10);
        $gebruikers = User::all();
        // dd($gebruikers);
        return view('Alle-Weetjes', ['posts' => $posts]);
    }
    public function getSuggesties()
    {
        $suggestie = Suggestie::paginate(10);


        // dd($suggestie);
        return view('Suggesties', ['suggestie' => $suggestie]);
    }
    public function test()
    {
        $users = \DB::table('users')
            ->select(\DB::raw('count(*) as user_count, status'))
            ->where('status', '!=', 1)
            ->groupBy('status')
            ->get();


        dd($users);
        return view('test', ['users' => $users]);
    }
}
