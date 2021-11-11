<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Postions;

class PostionsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:List-Jobs', ['only' => ['index']]);
        $this->middleware('permission:Create-Jobs', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit-Jobs', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete-Jobs', ['only' => ['destroy']]);
    }
    public function index()
    {
        $postions = Postions::orderBy('id', 'DESC')->paginate(5);
        return view('backend.jobs.index' , compact('postions'));
    }
    public function create()
    {
        return view('backend.jobs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required|unique:postions,name',
            'is_active' => 'required',

        ]);
        $input['name'] = $request->name;
        $input['is_active'] = $request->is_active;
        $job = Postions::create($input);

        return redirect()->route('jobs.index')
            ->with('success', 'job created successfully');
    }

    public function edit($id)
    {
        $job = Postions::find($id);
        return view('backend.jobs.edit' , compact('job'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:postions,name,' . $id,
            'is_active' => 'required',
        ]);
        $input['name'] = $request->name;
        $input['is_active'] = $request->is_active;
         $job = Postions::whereId($id)->first();
         $job->update($input);
        return redirect()->route('jobs.index')
        ->with('success', 'job updated successfully');

    }


    public function destroy($id)
    {
        $postion = Postions::whereId($id)->first();

            $postion->delete();

            return redirect()->route('jobs.index')
            ->with('success', 'Job deleted successfully');
        }


}


