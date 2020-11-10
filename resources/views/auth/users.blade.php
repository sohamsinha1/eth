@extends('layouts.auth')
@section('nav')
<li class="nav-item">
<a class="nav-link" href="{{ url('/users_list') }}">Users</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ url('/company_list') }}">Companies</a>
</li>
@endsection
@section('content')
@foreach($users as $user)
<button type="button" class="btn btn-outline-secondary btn-lg btn-block">

<p class="lead">Full Name: {{ $user->full_name }}</p>
<p class="lead">status: 

@if($user->status == 'active')  
<a class="btn btn-success">Active</a>
@else($user->status == 'inactive')
<a class="btn btn-danger">InActive</a>
@endif
</p>


</button>
@endforeach
<div class="d-flex justify-content-center" style="margin-top:5px;">
{!! $users->links() !!}
</div>
@endsection