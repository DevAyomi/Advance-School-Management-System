@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
 	<div class="content-wrapper" style="min-height: 1188.75px;">
		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Update Operator</h4>
			 
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<!-- Form Starts Here -->
					<form action="{{ route('admin.update', $editdata->id) }}" method="POST">
						@csrf
					  <div class="row">
						<div class="col-12">	

							<div class="row">
								<div class="col-md-6">
								<div class="form-group">
									<h5>Role<span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="usertype" id="usertype" required="" class="form-control">
											<option value="" selected="" disabled="">Select Role</option>
											<option value="Operator" {{ ($editdata->role == "Operator" ? "selected": "" )}}>Operator</option>
										</select>
									<div class="help-block"></div></div>
								</div>
								</div> <!-- End First Col-md-6 -->

								<div class="col-md-6">
								<div class="form-group">
									<h5> Operator Name <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" value="{{ $editdata->name }}" name="name" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div>
										<span class="text-danger">@error('email'){{ $message}}@enderror</span>
									</div>
								</div>
								</div><!--  End of second col-md-6 -->
							</div> <!-- End Row -->


							<div class="row">
								<div class="col-md-6">
								<div class="form-group">
									<h5>Operator Email<span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="email" value="{{ $editdata->email }}" name="email" class="form-control" required="" data-validation-required-message="This field is required">
									<div class="help-block"></div>
									<span class="text-danger">@error('email'){{ $message}}@enderror</span>
								</div>
								</div>
								</div> <!-- End First Col-md-6 -->

							</div> <!-- End Row -->
				
						<div class="text-xs-right">
							<input type="submit" class="btn btn-info btn-rounded mb-5" name="" value="Update">
						</div>
					</form>
					<!-- Form Ends Here -->
				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>
  </div>
<!-- /.content-wrapper -->

@endsection

@section('javascript')
	<!-- Vendor JS -->
	<script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>	<script src="../assets/vendor_components/datatable/datatables.min.js"></script>
	<script src="{{ asset('backend/js/pages/data-table.js') }}"></script>
	
	<!-- Sunny Admin App -->
	<script src="{{ asset('backend/js/template.js') }}"></script>
@endsection