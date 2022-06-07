<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\project;
use Illuminate\Support\Facades\Storage;
use App\Spending;
use Ramsey\Uuid\Type\Decimal;

class MainController extends Controller
{
    public function AdminNav()
    {
        return view('Admin-Nav');
    }
    public function expenses()
    {
        $spendings = Spending::all();
        $projects = Project::select('id', 'project')->get();
        $total = Spending::sum('amount');
        $total = number_format($total, '2', ',', '.');
        $unpaid = DB::table('spendings')->where('status', 'unpaid')->sum('amount');
        $unpaid = number_format($unpaid, '2', ',', '.');
        $paid = DB::table('spendings')->where('status', 'paid')->sum('amount');
        $paid = number_format($paid, '2', ',', '.');
        // dd($paid);
        return view('expense.show ', ['projects' => $projects, 'spendings' => $spendings, 'total' => $total, 'unpaid' => $unpaid, 'paid' => $paid]);
    }

    public function users(Request $request)
    {
        $users = User::paginate(10);

        // dd($users);
        return view('user.show', ['users' => $users]);
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
    public function account(Request $request)
    {
        $data = Auth::user();
        $session = $request->session()->all();
        $user = User::find(Auth::user()->id);
        dd($session);
        return view('account', ['data' => $data, 'session' => $session, 'users' => $user]);
    }
    public function account2(Request $request)
    {
        $data = Auth::user();
        $session = $request->session()->all();
        $user = User::find(Auth::user()->id);
        dd($session);
        return view('account', ['data' => $data, 'session' => $session, 'users' => $user]);
    }
}
