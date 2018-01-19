@extends('layouts.app')


@section('content')
    <div class="col-lg-12">
		<h1 class="page-header">Users</h1>
	</div>
		
	<a href="{{ route('employees.create') }}" class="btn btn-primary">Create</a>
	
	<br>
	<br>
	<table class= "table table-hover">
		<thead>
			<th>Email</th>	
			<th>Date Created</th>
			<th>Action</th>
			<th>Admin Permission</th>	
		</thead>
		
		<tbody>
			@if($users->count() > 0)
				@foreach($users as $user)
					<!--Superadmin account is not shown -->
					@if(Auth::id() != $user->id)
						<tr>
							<td>{{ $user->email }}</td>
							<td>{{ $user->created_at->diffForHumans() }}</td>
							
							@if($user->active)
								<td>
									<a href="{{ route('users.deactivate', ['id' => $user->id ]) }}" class="btn btn-xs btn-danger">Deactivate</a>							
								</td>
							@else
								<td>
									<a href="{{ route('users.activate', ['id' => $user->id ]) }}" class="btn btn-xs btn-info">Activate</a>							
								</td>
							@endif
							
							@if($user->admin)
								<td>
									<a href="{{ route('users.notAdmin', ['id' => $user->id ]) }}" class="btn btn-xs btn-danger">revoke</a>							
								</td>
							@else
								<td>
									<a href="{{ route('users.admin', ['id' => $user->id ]) }}" class="btn btn-xs btn-info">Admin</a>							
								</td>
							@endif
						</tr>
					@endif
				@endforeach
			@else
				<tr> 
					<th colspan="5" class="text-center">No Users</th>
				</tr>
			@endif
		
		</tbody>
	
	</table>
		
@endsection