<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function reports()
    {
        $reports=Report::where('status','like','%'.request('filter').'%')->paginate(5);
        // dd($reports);
        return view('admin.reports.index', compact('reports'));
    }

    public function reportCheck($id)
    {
        $reports=Report::find($id);
        if ($reports) {
            $reports->status="done";
            $reports->save();
        }
        return redirect()->back();
    }
}
