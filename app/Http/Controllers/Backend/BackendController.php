<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;



class BackendController extends Controller
{

    public function __construct()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        else{
            return view('backend.index');
          //   return redirect()->route('admin.index');
           // return redirect()->route('admin.admin.index');
         }

    }
    public function index(){
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        else{
           return view('backend.index');
         //   return redirect()->route('admin.index');
          // return redirect()->route('admin.admin.index');
        }
    }



}
