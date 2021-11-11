@extends('layouts.admin')
@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Employees</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Avatar</th>
                            <th>Full name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Job</th>
                            <th>join Date</th>
                            <th>Salary</th>
                            <th>Role Name</th>
                            <th>Status</th>

                            <th class="text-center" style="width: 30px">Actions</th>
                        </tr>
                    </thead>


                    <tbody>

                        <tr>
                            @forelse ($employees as $employee)

                            @if ($employee->avatar != '')
                            <td> <img src="{{asset('assets/users/' . $employee->avatar)}}"  alt="{{$employee->username}}" style="border-radius: 0; width:50px; height:50px ; "></td>
                            @else
                            <td> <img src="{{asset('assets/users/default_avatar.svg')}}" style="border-radius: 0; width:50px; height:50px ; "></td>
                            @endif



                               <td>{{$employee->fullname}}</td>
                               <td>{{$employee->username}}</td>
                               <td>{{$employee->email}}</td>
                               <td>{{$employee->postion->name}}</td>
                               <td>{{$employee->created_at->format('d-m-y')}}</td>
                               <td>${{$employee->salary}}</td>
                               <td>{{$employee->roles_name[0]}}</td>
                               <td>{!! $employee->status() !!}</td>

                               <td>

                                   <div class="btn-group">
                                    @can('Edit-Employees')
                                       <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary mr-1"><i class="fa fa-edit"></i></a>
                                    @endcan
                                    @can('Delete-Employees')
                                    <a href="javascript:void(0)" onclick="if (confirm('Are you sure to delete this employee?') ) { document.getElementById('employee-delete-{{ $employee->id }}').submit(); } else { return false; }" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="post" id="employee-delete-{{ $employee->id }}" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>


                          @empty
                          <tr>
                              <td colspan="12" class="text-center">No employees found</td>
                          </tr>
                          @endforelse

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="12">
                                <div class="float-right">
                                    {!! $employees->appends(request()->all())->links()  !!}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


@endsection
