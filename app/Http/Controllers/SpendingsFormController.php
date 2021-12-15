<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Project;
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
    public function create(Request $id)
    {
        $spending = Spending::find($id);
        $spendings = Spending::all();
        $projects = Project::select('id', 'project')->get();

        $total = Spending::sum('amount');
        $total = number_format($total, '2', ',', '.');
        $unpaid = DB::table('spendings')->where('status', 'unpaid')->sum('amount');
        $unpaid = number_format($unpaid, '2', ',', '.');
        $paid = DB::table('spendings')->where('status', 'paid')->sum('amount');
        $paid = number_format($paid, '2', ',', '.');

        // dd($spending);
        return view('/expense/create', ['input' => $spending, 'spendings' => $spendings, 'projects' => $projects, 'total' => $total, 'unpaid' => $unpaid, 'paid' => $paid]);
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
            'date' => 'date_format:"Y-m-d"|required',
            'file' => 'required',
            'project' => 'required',
            'currency' => 'required',
            'note' => 'required',
            'type' => 'required',
            'amount' => 'required',
        ]);

        $data = $request->all();

        $total = Spending::sum('amount');
        $total = number_format($total, '2', ',', '.');
        $unpaid = DB::table('spendings')->where('status', 'unpaid')->sum('amount');
        $paid = DB::table('spendings')->where('status', 'paid')->sum('amount');
        $unpaid = number_format($unpaid, '2', ',', '.');
        $paid = number_format($paid, '2', ',', '.');

        $spending = Spending::create($data);
        $spendings = Spending::all();
        $projects = Project::select('id', 'project')->get();

        $store = Storage::disk('public')->put($spending->id, $request->file('file'));
        $spending->update([
            'file' => $store,
        ]);
        $message = "expense verzonden";
        // dd($data);
        echo "<script type='text/javascript'>alert('$message');</script>";
        return view('/expense/show', ['spendings' => $spendings, 'categorie' => $spending->projects, 'projects' => $projects, 'total' => $total, 'unpaid' => $unpaid, 'paid' => $paid]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $total = Spending::sum('amount');
        $total = number_format($total, '2', ',', '.');
        $unpaid = DB::table('spendings')->where('status', 'unpaid')->sum('amount');
        $unpaid = number_format($unpaid, '2', ',', '.');
        $paid = DB::table('spendings')->where('status', 'paid')->sum('amount');
        $paid = number_format($paid, '2', ',', '.');

        $spending = Spending::find($id);
        $spendings = Spending::all();
        $projects = Project::select('id', 'project')->get();
        // dd($spending);

        return view('/expense/edit', ['input' => $spending, 'projects' => $projects, 'project' => $spending->projects, 'spendings' => $spendings, 'total' => $total, 'unpaid' => $unpaid, 'paid' => $paid]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        // dd($request->input('project'));

        $input = Spending::find($id);
        $input->name = $data['name'];
        $input->date = $data['date'];
        $input->project = $data['project'];
        $input->currency = $data['currency'];
        $input->status = $data['status'];
        $input->note = $data['note'];
        $input->type = $data['type'];
        $input->amount = $data['amount'];
        $input->update();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $input = Spending::find($id);
        $input->delete();

        return redirect()->back();
    }
}
