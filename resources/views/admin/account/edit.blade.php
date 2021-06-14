@extends('admin.layout')

@section('content')

	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>

                <div class="card-body">

                    @if(Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @if(Session::get('fail'))
                        <div class="alert alert-success">
                            {{ Session::get('fail') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Profile Picture') }}
                            </label>

                            <div class="col-md-6">
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>












                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Your Name" value="{{$LoggedUserInfo['name']}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sainik_id" class="col-md-4 col-form-label text-md-right">{{ __('Sainik ID') }}</label>

                            <div class="col-md-6">
                                <input id="sainik_id" type="text" class="form-control @error('sainik_id') is-invalid @enderror" name="sainik_id" placeholder="Enter your Sainik ID here" value="{{$LoggedUserInfo['sainik_id']}}" required autocomplete="coy_name" autofocus>

                                @error('sainik_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sainik_id" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Enter your Mobile No here" value="{{$LoggedUserInfo['phone']}}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                    <div class="form-group row">
                          <label for="rank" class="col-md-4 col-form-label text-md-right">{{ __('Rank') }}</label>

                      <div class="col-md-6">

                        <input type="radio" id="snk" name="rank" value="snk" @if($LoggedUserInfo['rank'] =='snk') echo checked @endif>
                          <label for="snk">Sainik</label><br>

                        <input type="radio" id="lcpl" name="rank" value="lcpl" @if($LoggedUserInfo['rank'] =='lcpl') echo checked @endif>
                          <label for="lcpl">Lance Corporal</label><br>
 
                        <input type="radio" id="cpl" name="rank" value="cpl" @if($LoggedUserInfo['rank'] =='cpl') echo checked @endif>
                          <label for="cpl">Corporal</label><br>

                          <input type="radio" id="sgt" name="rank" value="sgt" @if($LoggedUserInfo['rank'] =='sgt') echo checked @endif>
                          <label for="sgt">Sergeant</label><br>

                        <input type="radio" id="jco" name="rank" value="jco" @if($LoggedUserInfo['rank'] =='jco') echo checked @endif>
                          <label for="jco">JCO</label><br><br>


                            </div>
                     </div>














                     <div class="form-group row">
                          <label for="coy_name" class="col-md-4 col-form-label text-md-right">{{ __('Coy Name') }}</label>

                      <div class="col-md-6">

                        <input type="radio" id="A" name="coy_name" value="A" @if($LoggedUserInfo['coy_name'] =='A') echo checked @endif>
                          <label for="A">A</label><br>
                        <input type="radio" id="B" name="coy_name" value="B" @if($LoggedUserInfo['coy_name'] =='B') echo checked @endif>
                          <label for="female">B</label><br>
                        <input type="radio" id="C" name="coy_name" value="C" @if($LoggedUserInfo['coy_name'] =='C') echo checked @endif>
                          <label for="C">C</label><br><br>
                            </div>
                     </div>



                     <div class="form-group row">
                          <label for="trade" class="col-md-4 col-form-label text-md-right">{{ __('Trade') }}</label>

                      <div class="col-md-6">

                        <input type="radio" id="alpha" name="trade" value="alpha" @if($LoggedUserInfo['trade'] =='alpha') echo checked @endif>
                          <label for="alpha">Alpha</label><br>
                        <input type="radio" id="bravo" name="trade" value="bravo" @if($LoggedUserInfo['trade'] =='bravo') echo checked @endif>
                          <label for="bravo">Bravo</label><br>
                        <input type="radio" id="charlie" name="trade" value="charlie" @if($LoggedUserInfo['trade'] =='charlie') echo checked @endif>
                          <label for="charlie">Charlie</label><br><br>
                            </div>
                     </div>



                     <div class="form-group row">
                            <label for="joining_date" class="col-md-4 col-form-label text-md-right">{{ __('Joining Date') }}</label>

                            <div class="col-md-6">
                                <input id="joining_date" type="Date" class="form-control @error('joining_date') is-invalid @enderror" name="joining_date" placeholder="Select your Joining Date" value="{{$LoggedUserInfo['joining_date']}}" required autocomplete="joining_date" autofocus>

                                @error('joining_Date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection