@extends('layouts.admin')
@section('content')

<div class="card-body">


    <div class="card-header mb-3 py-3 d-flex">
        <h6 class="mt-1 font-weight-bold text-primary">Edit Employee {{$user->username}}</h6>
        <div class="ml-auto">
            <a href="{{ route('employees.index') }}" class="btn btn-primary">

                    <span class="text">Employees</span>
            </a>
        </div>
    </div>



   <div class="card-body">

    <form class="forms-sample" action="{{route('employees.update' , $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="row">

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="fullname">Fullname</label>
                    <input type="text" name="fullname" value="{{ old('fullname',$user->fullname) }}" class="form-control" required>
                    @error('fullname')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" value="{{ old('username',$user->username) }}" class="form-control" required>
                    @error('username')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>


            <div class="col-lg-6">
                <div class="form-group">
                    <label for="id_number">ID Number</label>
                    <input type="text" name="id_number" value="{{ old('id_number',$user->id_number) }}" class="form-control" required>
                    @error('id_number')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ old('email',$user->email) }}" class="form-control" required>
                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="number" name="salary" value="{{ old('salary',$user->salary) }}" class="form-control" required>
                    @error('salary')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone' , $user->phone) }}" class="form-control" required>
                    @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control">
                    @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="1" {{ old('gender',$user->gender) == '1' ? 'selected' : null }}>Male</option>
                        <option value="0" {{ old('gender',$user->gender) == '0' ? 'selected' : null }}>Female</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                <label for="postion_id">Job</label>
                <select name="postion_id" class="form-control" required>
                    <option value="">---</option>
                    @forelse($postions as $postion)
                    <option value="{{$postion->id}}" {{ old('postion_id' , $user->postion_id) == $postion->id ? 'selected' : null }}>{{ $postion->name }}</option>
                    @empty
                    @endforelse
                </select>
                 @error('postion_id')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="gender">Is Work</label>
                    <select name="is_work" class="form-control">
                        <option value="1" {{ old('is_work',$user->is_work) == '1' ? 'selected' : null }}>Working</option>
                        <option value="0" {{ old('is_work',$user->is_work) == '0' ? 'selected' : null }}>No Working</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input class="form-control"  name="avatar" type="file" onchange="preview('frame')">
                     @error('avatar')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="col-lg-6">


                <img id="frame" height="100"  class="rounded float-start">
                @if ($user->avatar != '')
                    <img src="{{ asset('assets/users/' . $user->avatar) }}" id="frame" height="100"  class="rounded float-start" alt="{{$user->fullname}}">
                @endif
                    {{-- @else
                         <img src="{{ asset('assets/users/default_avatar.svg') }}" id="frame" height="100" class="rounded float-start" alt="{{$user->fullname}}">
                    @endif --}}
            </div>

            <div class="col-lg-12">
                <div class="form-group">
                <label for="avatar">Roles</label>
                {!! Form::select('roles_name[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}

            </div>
            </div>



        </div>

    <div class="form-group pt-4">
        <button type="submit" name="submit" class="btn btn-primary">Update Employee</button>
    </div>

    </form>
   </div>
  </div>


  <script>
    function preview(getFream) {
        let imgElement = document.getElementById(getFream);
       imgElement.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection
