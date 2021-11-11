<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Postions;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class EmployeesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:List-Employees', ['only' => ['index']]);
        $this->middleware('permission:Create-Employees', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit-Employees', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete-Employees', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {

        $employees = User::with('postion')->orderBy('id', 'DESC')->paginate(5);
        return view('backend.employees.index', compact('employees'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {

        $roles = Role::pluck('name', 'name')->all();
        $postions = Postions::whereIs_active(1)->get(['id', 'name']);
        return view('backend.employees.create', compact('roles','postions'));
    }


    public function show(Request $request)
    {
        $employees = User::with('postion')->orderBy('id', 'DESC')->paginate(5);
        return view('backend.employees.index', compact('employees'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'id_number' => 'required|numeric',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'fullname' => 'required',
            'salary' => 'required|numeric',
            'phone' => 'required|unique:users,phone',
            'avatar' => 'nullable|mimes:jpg,jpeg,png,WebP|max:20000',
            'is_work' => 'required',
            'gender' => 'required',
            'password' => 'required',
            'roles_name' => 'required',
            'postion_id' => 'required',
        ]);
        $file_n='';
        if ($image = $request->file('avatar')) {
            if ($request->avatar != null && File::exists('assets/users/' . $request->avatar)) {
                unlink('assets/users/' . $request->avatar);
            }
            $file_name = $request->username . "." . $image->getClientOriginalExtension();
            $path = public_path('/assets/users/' . $file_name);

            Image::make($image->getRealPath())->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);

            $file_n = $file_name;
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        if($file_n != '' || $file_n != null){
            $input['avatar'] = $file_n;
        }


        $user = User::create($input);
        $user->assignRole($request->input('roles'));



        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully');
    }

    public function edit($id)
    {

        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        $postions = Postions::whereIs_active(1)->get(['id', 'name']);
        return view('backend.employees.edit', compact('user', 'roles', 'userRole','postions'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'id_number' => 'required|numeric',
            'username'   => 'required|max:20|unique:users,username,'.$id,
            'email' => 'required|email|unique:users,email,' . $id,
            'fullname' => 'required',
            'salary' => 'required|numeric',
            'phone'        => 'required|unique:users,phone,'.$id,
            'is_work' => 'required',
            'gender' => 'required',
            'roles_name' => 'required',
            'postion_id' => 'required',
        ]);
        $input = $request->all();

        if (trim($input['password']) != '') {
            $input['password'] = bcrypt($input['password']);
        }
        $file_n='';
        if ($image = $request->file('avatar')) {
            if ($request->avatar != null && File::exists('assets/users/' . $request->avatar)) {
                unlink('assets/users/' . $request->avatar);
            }
            $file_name = $request->username . "." . $image->getClientOriginalExtension();
            $path = public_path('/assets/users/' . $file_name);

            Image::make($image->getRealPath())->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);

            $file_n = $file_name;
        }
        if($file_n != '' || $file_n != null){

            $input['avatar'] = $file_n;
        }

        $user = User::whereId($id)->first();
         $user->update($input);

        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles_name'));

        return redirect()->route('employees.index')
        ->with('success', 'Employee updated successfully');

    }

    public function destroy($id)
    {
        $user = User::whereId($id)->first();
        if ($user) {
            if ($user->avatar != '') {
                    if (File::exists('assets/users/' . $user->avatar)) {
                        unlink('assets/users/' . $user->avatar);
                }
            }
            $user->delete();

            return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully');
        }


}



public function update_user(Request $request, $id)
{
    $this->validate($request, [
        'username'   => 'required|max:20|unique:users,username,'.$id,
        'email' => 'required|email|unique:users,email,' . $id,

    ]);

    $input = $request->all();

    if (trim($input['password']) != '') {
        $input['password'] = bcrypt($input['password']);
    }
    $file_n='';
    if ($image = $request->file('avatar')) {
        if ($request->avatar != null && File::exists('assets/users/' . $request->avatar)) {
            unlink('assets/users/' . $request->avatar);
        }
        $file_name = $request->username . "." . $image->getClientOriginalExtension();
        $path = public_path('/assets/users/' . $file_name);

        Image::make($image->getRealPath())->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path, 100);

        $file_n = $file_name;
    }
    if($file_n != '' || $file_n != null){

        $input['avatar'] = $file_n;
    }

    $user = User::whereId($id)->first();
    $user->update($input);

   return redirect()->route('index')->with('success', 'updated successfully');


}
}
