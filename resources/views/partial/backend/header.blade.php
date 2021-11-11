<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>


<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">





    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->fullname}}</span>
            @if(auth()->user()->avatar != '')
                <img class="img-profile rounded-circle" src="{{asset('assets/users/'.  auth()->user()->avatar)}}">
                @else
                <img class="img-profile rounded-circle" src="{{asset('assets/users/default_avatar.svg')}}">

            @endif
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
            </a>

            @can('Create-Reports')
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="fa fa-file fa-sm fa-fw mr-2 text-gray-400"></i>
                    Add Reports
                </a>
            @endcan
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>

</ul>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="{{route('user.update' , auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
          <div class="form-group">
            <label for="username" class="col-form-label">Username</label>
            <input value="{{auth()->user()->username}}" type="text" name="username" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="email" class="col-form-label">Email</label>
            <input type="email" name="email" class="form-control"  value="{{auth()->user()->email}}" required>
            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label for="password" class="col-form-label">Password</label>
            <input type="password" name="password" class="form-control">
            @error('password')<span class="text-danger">{{ $message }}</span>@enderror

          </div>


        <div class="col-lg-6">
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input class="form-control"  name="avatar" type="file" onchange="preview('frame2')">
                 @error('avatar')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-lg-6">
            @if (auth()->user()->avatar != '')
            <img src="{{ asset('assets/users/' . auth()->user()->avatar) }}" id="frame2" height="100"  class="rounded float-start">
            @else
            <img id="frame2" height="100"  class="rounded float-start">
            @endif
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </form>




<script>
    function preview(getFream) {
        let imgElement = document.getElementById(getFream);
       imgElement.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

      </div>
    </div>
  </div>
</div>










@can('Create-Reports')
  @include('backend.reports.create')
  @endcan

</nav>
<!-- End of Topbar -->
