@extends('layouts.app')


@section('content')
	<div class="col-lg-12">
		<h1 class="page-header">Employee: {{ $employee->getFullName() }}<h1>
	</div>
	
	@if(Auth::user()->admin)
		<a href="{{ route('employees.edit',['id'=>$employee->id]) }}" class="btn btn-primary">Edit</a>	
		<a href="{{ route('employees.destroy',['id'=>$employee->id]) }}" class="btn btn-danger">Delete</a>
		<a href="{{ route('employees.download',['id'=>$employee->id]) }}" class="btn btn-info">Download PDF</a>
	@endif
	
	<br>
	<br>
	
	<table style="width:100% ">
		<tr>
			<th>Name:</th>
			<td>{{ $employee->getFullName() }}</td>		
		</tr>
		<tr>
			<th>DOB: </th>
			<td>{{ $employee->birth_date }}</td>
		</tr>
		<tr>
			<th>Email</th>
			<td>{{ $employee->email }}</td>
		</tr>	
		<tr>
			<th>hired date</th>
			<td>{{ $employee->hired_date }}</td>
		</tr>
		<tr>
			<th>Department</th>
			<td>{{ $employee->role->department->name }}</td>
		</tr>										
		<tr>
			<th>Role</th>
			<td>{{ $employee->role->name }}</td>
		</tr>	
		<tr>
			<th>Salary</th>
			<td>{{ $employee->role->salary }}</td>			
		</tr>	
		<tr>
			<th>Phone</th>
			<td>{{ $employee->phone }}</td>			
		</tr>
		<tr>
			<th>street</th>
			<td>{{ $employee->street }}</td>			
		</tr>
		<tr>
			<th>town</th>
			<td>{{ $employee->town }}</td>			
		</tr>
		<tr>
			<th>city</th>
			<td>{{ $employee->city }}</td>			
		</tr>
		<tr>
			<th>country</th>
			<td>{{ $employee->country }}</td>	
		</tr>		
	</table>		
@endsection