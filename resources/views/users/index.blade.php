@extends('layouts.app')

@section('content')
	<h1>List of Users</h1>

	@empty ($users)
		<div class="alert alert-warning">
			The list of users is empty
		</div>

	@else
		<div class="table-responsive">
			<table class="table table-striped">
				<thead class="thead-light">
					<tr class="text-center">
						<th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Admin Since</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ optional($user->admin_since)->diffForHumans() ?? 'Never' }}</td>
						<td >
							<form class="d-inline-block" action="{{ route('users.admin.toggle', ['user' => $user->id]) }}" method="post">
								@csrf
								<input class="btn btn-link" type="submit" value="{{ $user->isAdmin() ? 'Remove' : 'Make' }} Admin">
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	@endempty
@endsection
