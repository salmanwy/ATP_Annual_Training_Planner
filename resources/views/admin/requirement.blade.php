@extends('admin.layout')

@section('content')
	
<div class="container">
    <div class="main-body">

          <!-- /Breadcrumb -->

        <div class="d-flex justify-content-center">
  
          <div class="row gutters-sm justify-content-center">
            <div class="col-md-12">
              <div class="row gutters-sm">
                <div class="col-sm-12 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Requirements</i>Current Status</h6>

      <form method="POST" action="{{ route('requirement') }}">
          @csrf
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
                          <td>
        <div class="input-group mb-1">
            <select class="custom-select" name="c1a" required>
              <option value="">Choose</option>
              <option value="gp_trg">Gp Trg</option>
              <option value="admin">Admin</option>
              <option value="leave">Leave</option>
            </select>
          </div>
      </td>
                
                          <td>
                            <div class="input-group mb-1">
            <select class="custom-select" name="c1b" required>
              <option value="">Choose</option>
              <option value="gp_trg">Gp Trg</option>
              <option value="admin">Admin</option>
              <option value="leave">Leave</option>
            </select>
          </div>
                          </td>
                          <td>
                            <div class="input-group mb-1">
            <select class="custom-select" name="c1c" required>
              <option value="">Choose</option>
              <option value="gp_trg">Gp Trg</option>
              <option value="admin">Admin</option>
              <option value="leave">Leave</option>
            </select>
          </div>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>
                            <div class="input-group mb-1">
            <select class="custom-select" name="c2a" required>
              <option value="">Choose</option>
              <option value="gp_trg">Gp Trg</option>
              <option value="admin">Admin</option>
              <option value="leave">Leave</option>
            </select>
          </div>
                          </td>
                          <td>
                            <div class="input-group mb-1">
            <select class="custom-select" name="c2b" required>
              <option value="">Choose</option>
              <option value="gp_trg">Gp Trg</option>
              <option value="admin">Admin</option>
              <option value="leave">Leave</option>
            </select>
          </div>
                          </td>
                          <td>
                            <div class="input-group mb-1">
            <select class="custom-select" name="c2c" required>
              <option value="">Choose</option>
              <option value="gp_trg">Gp Trg</option>
              <option value="admin">Admin</option>
              <option value="leave">Leave</option>
            </select>
          </div>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>
                            <div class="input-group mb-1">
            <select class="custom-select" name="c3a" required>
              <option value="" >Choose</option>
              <option value="gp_trg">Gp Trg</option>
              <option value="admin">Admin</option>
              <option value="leave">Leave</option>
            </select>
            @error('c3a')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
          </div>
                          </td>
                          <td>
         <div class="input-group mb-1">
            <select class="custom-select" name="c3b" required> 
              <option value="">Choose</option>
              <option value="gp_trg">Gp Trg</option>
              <option value="admin">Admin</option>
              <option value="leave">Leave</option>
            </select>
          </div>
                          </td>
                          <td>
                            <div class="input-group mb-1">
            <select class="custom-select" name="c3c" required>
              <option value="">Choose</option>
              <option value="gp_trg">Gp Trg</option>
              <option value="admin">Admin</option>
              <option value="leave">Leave</option>
            </select>
          </div>
                          </td>

                        </tr>
                       
                      </tbody>
                    </table>
                    <button class="btn btn-primary" type="submit">Save</button>
          </form>
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