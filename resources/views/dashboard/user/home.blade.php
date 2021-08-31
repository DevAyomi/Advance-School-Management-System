<!DOCTYPE html>
<html>
<head>
	<title>User Dashboard | Home</title>
	<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/css/skin_color.css')}}">	
	<link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">
</head>
<body>

	<div class="container">
		<div class="card-header mt-5">
			<p>Gsis Student Dashboard</p>
		</div>
		<div class="card-body">
			<table class="table table-striped table-inverse table-responsive">
				<thead class="thead-inverse">
					<tr>
						<th>Name</th>
						<th>Student No</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{ Auth::guard('web')->user()->name }}</td>
						<td>{{ Auth::guard('web')->user()->student_no }}</td>
						<td><a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="text-danger">Logout</a>
							<form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

</body>
</html>