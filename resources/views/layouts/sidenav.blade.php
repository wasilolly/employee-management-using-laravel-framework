
<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">
			<li class="sidebar-search">
				<div class="input-group custom-search-form">
					<input type="text" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button">
							<i class="fa fa-search"></i>
						</button>
					</span>
				</div>
				<!-- /input-group -->
			</li>
			
			<li><a href="{{ route('home')}}"><i class="fa fa-tachometer fa-fw"></i> Dashboard</a></li>
			<li><a href="{{ route('employees.index') }}"><i class="fa fa-address-card fa-fw"></i>Employees</a></li>			
			<li><a href="{{ route('departments.index') }}"><i class="fa fa-bars fa-fw"></i>Departments</a></li>			
			<li><a href="{{ route('roles.index') }}"><i class="fa fa-user-plus fa-fw"></i>Roles</a></li>			
			<li><a href="{{ route('users') }}"><i class="fa fa-users fa-fw"></i>Users</a></li>
		</ul>
	</div>            
</div>