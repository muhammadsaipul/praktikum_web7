@extends('theme.default')
@section('content')
<div class="container-fluid px-4">
<h1 class="mt-4">Users</h1>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item"><a
href="/dashboard">Dashboard</a></li>
<li class="breadcrumb-item active">Users</li>
</ol>
<div class="card mb-4">
<div class="card-header">
</div>
<div class="card-body">
<div class="row">
<table class="table table-bordered data-table">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
</tr>
</thead>
<tbody>
@forelse($users as $user)
<tr>
<td>{{ $user->id }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
</tr>
@empty
<tr>
<td colspan="3">There are no
users.</td>
</tr>
@endforelse
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection