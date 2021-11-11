<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeesReport;

class EmployeesReportController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:List-Reports', ['only' => ['index']]);
        $this->middleware('permission:Create-Reports', ['only' => ['store']]);
        $this->middleware('permission:Aproved-Reports', ['only' => ['update']]);
        $this->middleware('permission:Delete-Reports', ['only' => ['destroy']]);
    }

    public function index()
    {
      $reports =  EmployeesReport::with('user')->orderBy('id', 'DESC')->paginate(5);
      return view('backend.reports.index' , compact('reports'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [

            'description' => 'required|min:50',

        ]);

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        EmployeesReport::create($input);
        return redirect()->route('reports.index')
        ->with('success', 'Report Created successfully');
    }


    public function update($id)
    {
        $report = EmployeesReport::find($id);
        $report->status == 1 ? $report->status = 0 : $report->status = 1;
        $report->save();
        return redirect()->route('reports.index')
        ->with('success', 'Report Updated successfully');
    }
    public function destroy($id)
    {
        $report = EmployeesReport::find($id);
        $report->delete();
        return redirect()->route('reports.index')
        ->with('success', 'Report Deleted successfully');
    }


}
