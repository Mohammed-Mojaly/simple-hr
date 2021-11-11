@extends('layouts.admin')
@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">jobs Jobs</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th class="text-center" style="width: 30px">Actions</th>
                        </tr>
                    </thead>


                    <tbody>

                        <tr>
                            @forelse ($postions as $job)


                               <td>{{ $job->name}}</td>
                               <td>{!! $job->status() !!}</td>
                               <td>

                                <div class="btn-group">
                                 @can('Edit-Jobs')
                                    <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-primary mr-1"><i class="fa fa-edit"></i></a>
                                 @endcan
                                 @can('Delete-Jobs')
                                 <a href="javascript:void(0)" onclick="if (confirm('Are you sure to delete this job?') ) { document.getElementById('job-delete-{{ $job->id }}').submit(); } else { return false; }" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                 <form action="{{ route('jobs.destroy', $job->id) }}" method="post" id="job-delete-{{ $job->id }}" style="display: none;">
                                     @csrf
                                     @method('DELETE')
                                 </form>
                                 @endcan
                             </div>

                         </td>


                        </tr>


                          @empty
                          <tr>
                              <td colspan="12" class="text-center">No jobs found</td>
                          </tr>
                          @endforelse

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="12">
                                <div class="float-right">
                                    {!! $postions->appends(request()->all())->links()  !!}
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
