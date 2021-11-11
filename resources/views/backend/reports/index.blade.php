@extends('layouts.admin')
@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Employees Reports</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Employee</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Date</th>


                            <th class="text-center" style="width: 30px">Actions</th>
                        </tr>
                    </thead>


                    <tbody>

                        <tr>
                            @forelse ($reports as $report)




                               <td>
                                <a href="{{route('employees.edit' ,$report->user->id )}}">{{$report->user->fullname}}</a>
                                </td>
                               <td><p>{!!Str::limit(strip_tags($report->description), 30)!!}</p></td>
                               <td>{!! $report->status() !!}</td>
                               <td >{{$report->created_at->diffForHumans()}}</td>
                               <td class="d-flex">
                                        @can('Aproved-Reports')
                                            {!! Form::open(['method' => 'PATCH','route' => ['reports.update',$report->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit($report->status=='1' ? 'Unpproved' : 'Approved', ['class' => 'btn btn-info mr-2']) !!}
                                            {!! Form::close() !!}
                                        @endcan

                                        @can('Delete-Reports')
                                        {!! Form::open(['method' => 'DELETE','route' => ['reports.destroy', $report->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger mr-2']) !!}
                                        {!! Form::close() !!}
                                        @endcan

                                        <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                               show
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    {!! $report->description !!}
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                </td>

                        </tr>


                          @empty
                          <tr>
                              <td colspan="12" class="text-center">No reports found</td>
                          </tr>
                          @endforelse

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="12">
                                <div class="float-right">
                                    {!! $reports->appends(request()->all())->links()  !!}
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
