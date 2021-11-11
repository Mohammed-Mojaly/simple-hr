<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;



class StatisticsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Show-Statistics', ['only' => ['index']]);
    }

    public function index(){
        return view('backend.statistics.index');
    }



}
