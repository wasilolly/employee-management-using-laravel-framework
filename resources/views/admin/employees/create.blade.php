@extends('layouts.app')


@section('content')
	<div class="col-lg-12">
		<h1 class="page-header">New Employee</h1>
	</div>
	
	<form action="{{ route('employees.store') }}" method="POST">
			{{ csrf_field() }}
		
		<div class="form-group col-md-6">
			<label for="fname">First Name: </label>
			<input type="text" name="fname" class="form-control">		
		</div>
		
		<div class="form-group col-md-6">
			<label for="lname">Last Name: </label>
			<input type="text" name="lname" class="form-control">		
		</div>
		
		<div class="form-group col-md-12">
			<label for="email">Email: </label>
			<input type="email" name="email" class="form-control">		
		</div>
		
		<div class="form-group col-md-4">
			<label for="birth_date">Date of Birth: </label>
			<input type="date" name="birth_date" class="form-control">		
		</div>
		
		<div class="form-group col-md-4">
			<label for="hired_date">Hired Date: </label>
			<input type="date" name="hired_date" class="form-control">		
		</div>
		
		<div class="form-group col-md-4">
			<label for="phone">Contact Phone: </label>
			<input type="text" name="phone" class="form-control">		
		</div>
		
		<div class="form-group col-md-12">
			<label for="street">Street: </label>
			<input type="text" name="street" class="form-control">		
		</div>
		
		<div class="form-group col-md-6">
			<label for="town">Town: </label>
			<input type="text" name="town" class="form-control">		
		</div>
		
		<div class="form-group col-md-4">
			<label for="city">City: </label>
			<input type="text" name="city" class="form-control">		
		</div>
		
		<div class="form-group col-md-2">
			<label for="country">Country: </label>
			<input type="text" name="country" class="form-control">		
		</div>
		
		<div class="form-group col-md-6">
			<label for="gender">Gender:	</label>
			<select name="gender" id="gender" class="form-control">
				<option value="male">Male</option>
				<option value="female">Female</option>					
			</select>
		</div>
		
		<div class="form-group col-md-6">
			<label for="role">Select a Role</label>
			<select name="role_id"  cols="5" rows="5" class="form-control">
				@foreach($roles as $role)
					<option value="{{ $role->id}}">{{ $role->name }}</option>
				@endforeach
			</select>
		</div>
		
		<div class="text-center">
			<button class="btn btn-success" type="submit" >Create</button>
		</div>
	</form>
	


@endsection