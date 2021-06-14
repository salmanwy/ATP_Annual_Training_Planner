 @if($LoggedUserInfo['type'] == 'user') 
      <script>window.location ='/user/dashboard';</script>
 @endif

 @php     


  $c1a = App\Models\Requirement::where('cycle','=','1')
                    ->where('coy','=','a')
                    ->latest()
                    ->first();
  $c1b = App\Models\Requirement::where('cycle','=','1')
                    ->where('coy','=','b')
                    ->latest()
                    ->first();
  $c1c = App\Models\Requirement::where('cycle','=','1')
                    ->where('coy','=','c')
                    ->latest()
                    ->first();

  $c2a = App\Models\Requirement::where('cycle','=','2')
                    ->where('coy','=','a')
                    ->latest()
                    ->first();
  $c2b = App\Models\Requirement::where('cycle','=','2')
                    ->where('coy','=','b')
                    ->latest()
                    ->first();
  $c2c = App\Models\Requirement::where('cycle','=','2')
                    ->where('coy','=','c')
                    ->latest()
                    ->first();

  $c3a = App\Models\Requirement::where('cycle','=','3')
                    ->where('coy','=','a')
                    ->latest()
                    ->first();
  $c3b = App\Models\Requirement::where('cycle','=','3')
                    ->where('coy','=','b')
                    ->latest()
                    ->first();
  $c3c = App\Models\Requirement::where('cycle','=','3')
                    ->where('coy','=','c')
                    ->latest()
                    ->first();
 @endphp

@extends('admin.layout')

@section('content')
	
<div class="container">
    <div class="main-body">

          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    @php
                      $image = $LoggedUserInfo['image'];
                    @endphp
                    <img src="{{asset('images/'.$image)}}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{ ($LoggedUserInfo['name'])}}</h4>
                      <p class="text-secondary mb-1">{{ strtoupper($LoggedUserInfo['rank'])}} ID {{ $LoggedUserInfo['sainik_id'] }}</p>
                      <p class="text-muted font-size-sm">{{$LoggedUserInfo['coy_name'] }} Company</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6  class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>View All Sainik Data</h6>
                    <span class="text-secondary"><a href="{{ route('all-users') }}">Click Here</a></span>
                  </li>
                   <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Generate Planning</h6>
                    <span class="text-secondary"><a href="{{ route('generate') }}">Click Here</a></span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $LoggedUserInfo['name'] }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $LoggedUserInfo['email'] }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $LoggedUserInfo['phone'] }}
                    </div>
                  </div>
                  
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Joining Date </h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $LoggedUserInfo['joining_date'] }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="{{ URL('admin/edit-profile/'.$LoggedUserInfo['id'])}}">Edit</a>
                    </div>
                  </div>
                </div>
              </div>


             
              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Requirements</i>Current Status</h6>
                    <table class="table">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Cycle</th>
                          <th scope="col">A Coy</th>
                          <th scope="col">B Coy</th>
                          <th scope="col">C Coy</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>{{ $c1a['assignment'] }}</td>
                          <td>{{ $c1b['assignment'] }}</td>
                          <td>{{ $c1c['assignment'] }}</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>{{ $c2a['assignment'] }}</td>
                          <td>{{ $c2b['assignment'] }}</td>
                          <td>{{ $c2c['assignment'] }}</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>{{ $c3a['assignment'] }}</td>
                          <td>{{ $c3b['assignment'] }}</td>
                          <td>{{ $c3c['assignment'] }}</td>
                        </tr>
                      </tbody>
                    </table>
                    <a style="font-size: larger;" href="{{ route('requirement') }}">Edit/Update</a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-60">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Courses</i>Current Status</h6>
                      <small>BMR</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>BTT</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>ATT</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          



            </div>
          </div>

        </div>
    </div>

@endsection