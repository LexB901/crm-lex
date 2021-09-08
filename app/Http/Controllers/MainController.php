<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Respources\Views;
use App\Categorie;
use App\Models\User;
use App\Weetje;

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
}
