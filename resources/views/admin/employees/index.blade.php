@extends('layouts.app')


@section('content')

	<div class="col-lg-12">
		<h1 class="page-header">Employees</h1>
	</div>
		
		<a href="{{ route('employees.create') }}" class="btn btn-primary">Create</a>
		<a href="{{ route('employees.bin') }}" class="btn btn-danger">Recycle Bin</a>
	<br>
	<br>
	<table class= "table table-hover">
		<thead>					
			<th>Name</th>
			<th>Email</th>
			<th>Department</th>
			<th>Phone</th>
			<th>hired date</th>
			<th>Edit</th>	
			<th>Trash</th>
		</thead>		
			
		<tbody>
			@if($employees->count()> 0)
				@foreach($employees as $employee)
					<tr>								
						<td><a href="{{ route('employees.show', ['id' => $employee->id]) }}">{{ $employee->getFullName() }}</a></td>
						<td>{{ $employee->email }}</td>
						<td>{{ $employee->role->department->name }}</td>
						<td>{{ $employee->phone }}</td>
						<td>{{ $employee->hired_date }}</td>
						<td>
							<a href="{{ route('employees.edit', ['id' => $employee->id]) }}" class="btn btn-info">Edit</a>
						</td>
						<td>
							<form action="{{ route('employees.destroy', ['id' => $employee->id]) }}" method="POST">
								{{csrf_field() }}
								{{method_field('DELETE')}}
								<button class="btn btn-danger">Bin</button>
							</form>
						</td>
					</tr>
				@endforeach
			@else
				<tr> 
					<th colspan="5" class="text-center">Employee Datatabse is empty</th>
				</tr>
			@endif
		</tbody>						
	</table>		
@endsection