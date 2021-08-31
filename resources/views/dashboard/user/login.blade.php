@extends('layouts.auth')

@section('content')


	<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-4 col-md-5 col-12">
						<div class="content-top-agile p-10">
							<h2 class="text-white">You are welcome</h2>
							<p class="text-white-50">Login As Student</p>							
						</div>
						<div class="p-30 rounded30 box-shadowed b-2 b-dashed">

							<form action="{{  route('user.check') }}" method="post" autocomplete="off">
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
										<input type="text" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Email" name="student_no" value="{{ old('student_no')}}">
									</div>
									<span class="text-danger">@error('student_no'){{ $message}}@enderror</span>
								</div>
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text  bg-transparent text-white"><i class="ti-lock"></i></span>
										</div>
										<input type="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Password" name="password" value="{{ old('password')}}">
									</div>
									<span class="text-danger">@error('password'){{ $message}}@enderror</span>
								</div>
								  <div class="row">
									<div class="col-6">
									  <div class="checkbox text-white">
										<input type="checkbox" id="basic_checkbox_1" >
										<label for="basic_checkbox_1">Remember Me</label>
									  </div>
									</div>
									<!-- /.col -->
									<div class="col-6">
									 <div class="fog-pwd text-right">
										<a href="javascript:void(0)" class="text-white hover-info"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
									  </div>
									</div>
									<!-- /.col -->
									<div class="col-12 text-center">
									  <button type="submit" class="btn btn-info btn-rounded mt-10">SIGN IN</button>
									</div>
									<!-- /.col -->
								  </div>
							</form>														

							<div class="text-center text-white">
							  <p class="mt-20">- Sign With -</p>
							  <p class="gap-items-2 mb-20">
								  <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-facebook"></i></a>
								  <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-twitter"></i></a>
								  <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-google-plus"></i></a>
								  <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-instagram"></i></a>
								</p>	
							</div>
							
							<div class="text-center">
								<p class="mt-15 mb-0 text-white">Admin User? <a href="{{ route('admin.login')}}" class="text-danger ml-5">Sign In</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>



@endsection