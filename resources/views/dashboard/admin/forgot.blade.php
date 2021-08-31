@extends('layouts.auth')

@section('title')
	<title>Gsis Admin - Reset Password </title>
@endsection

@section('content')


<div class="col-12">
                <div class="row justify-content-center no-gutters">
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="content-top-agile p-10">
                            <h2 class="text-white">GSIS</h2>
                            <p class="text-white-50">Reset Your Password</p>                          
                        </div>
                        <div class="p-30 rounded30 box-shadowed b-2 b-dashed">

                            <form action="{{  route('admin.forgotPassword') }}" method="post" autocomplete="off">
                                @if(Session::get('fail'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('fail')}}
                                    </div>
                                @endif
                                @csrf
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Email" name="email" value="{{ old('email')}}">
                                    </div>
                                    <span class="text-danger">@error('email'){{ $message}}@enderror</span>
                                </div>
                                  <div class="row">
                                   
                                    <div class="col-12 text-center">
                                      <button type="submit" class="btn btn-info btn-rounded mt-10">RESET</button>
                                    </div>
                                    <!-- /.col -->

                                     <div class="text-center">
		                                <p class="mt-15 mb-0 text-white"><a href="{{ route('admin.login')}}" class="text-danger ml-5">Back To Login Page</a></p>
		                            </div>
		                            </div>
                            </form>                                                     
                            
                        </div>
                    </div>
                </div>
            </div>



@endsection