@extends('layouts.admin')
@section('content')

<div class="card-body">


    <div class="card-header mb-3 py-3 d-flex">
        <h6 class="mt-1 font-weight-bold text-primary">Edit Job {{$job->name}}</h6>
        <div class="ml-auto">
            <a href="{{ route('jobs.index') }}" class="btn btn-primary">

                <span class="text">Jobs</span>
            </a>
        </div>
    </div>

   <div class="card-body">

    <form class="forms-sample" action="{{route('jobs.update' , $job->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="row">

            <div class="col-lg-12">
                <div class="form-group">
                    <label for="fullname">Name</label>
                    <input type="text" name="name" value="{{ old('name',$job->name) }}" class="form-control" required>
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group">
                    <label for="gender">Status</label>
                    <select name="is_active" class="form-control">
                        <option value="1" {{ old('is_active',$job->is_active) == '1' ? 'selected' : null }}>Active</option>
                        <option value="0" {{ old('is_active',$job->is_active) == '0' ? 'selected' : null }}>InActive</option>
                    </select>
                    @error('is_active')<span class="text-danger">{{ $message }}</span>@enderror

                </div>
            </div>

        </div>

    <div class="form-group pt-4">
        <button type="submit" name="submit" class="btn btn-primary">Update Job</button>
    </div>

    </form>
   </div>
  </div>

@endsection
