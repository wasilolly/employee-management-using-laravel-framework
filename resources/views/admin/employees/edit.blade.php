@extends('layouts.app')


@section('content')

	<div class="col-lg-12">
		<h1 class="page-header">Update Employee: {{$employee->getFullName() }}</h1>
	</div>
	
	
	<form action="{{ route('employees.update', ['id'=>$employee->id]) }}" method="POST">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			
		<div class="form-group col-md-6">
			<label for="fname">First Name: </label>
			<input type="text" name="fname" value="{{ $employee->fname}}" class="form-control">		
		</div>
		
		<div class="form-group col-md-6">
			<label for="lname">Last Name: </label>
			<input type="text" name="lname" value="{{ $employee->lname}}" class="form-control">		
		</div>
		
		<div class="form-group col-lg-4">
			<label for="birth_date">Date of Birth: </label>
			<input type="text" name="birth_date" value="{{ $employee->birth_date}}" class="form-control">		
		</div>
		
		<div class="form-group col-lg-4">
			<label for="hired_date">Hired Date: </label>
			<input type="text" name="hired_date" value="{{ $employee->hired_date }}" class="form-control">		
		</div>
		
		<div class="form-group col-lg-4">
			<label for="phone">Contact Phone: </label>
			<input type="text" name="phone" value="{{ $employee->phone }}" class="form-control">		
		</div>
		
		<div class="form-group col-md-12">
			<label for="street">Street: </label>
			<input type="text" name="street" value="{{ $employee->street}}" class="form-control">		
		</div>
		
		<div class="form-group col-md-6">
			<label for="town">Town: </label>
			<input type="text" name="town" value="{{ $employee->street }}" class="form-control">		
		</div>
		
		<div class="form-group col-lg-4">
			<label for="city">City: </label>
			<input type="text" name="city" value="{{ $employee->city}}" class="form-control">		
		</div>
		
		<div class="form-group col-md-2">
			<label for="country">Country: </label>
			<input type="text" name="country"  value= "{{ $employee->country}}" class="form-control">		
		</div>
		
		<div class="form-group col-lg-6">
			<label for="role">Select a Role</label>
			<select name="role_id"  cols="5" rows="5" class="form-control">
				@foreach($roles as $role)
					<option value="{{ $role->id}}"
						@if($employee->role->id == $role->id)
							selected							
						@endif						
					>{{ $role->name }}</option>
				@endforeach
			</select>
		</div>
					
		<div class="form-group col-lg-6">
			<label for="gender">Gender:	</label>
			<select name="gender" id="gender" class="form-control">
				<option value="male">Male</option>
				<option value="female">Female</option>					
			</select>
		</div>
		
		<div class="text-center">
			<button class="btn btn-success" type="submit" >Update Changes</button>
		</div>
	</form>

@endsection