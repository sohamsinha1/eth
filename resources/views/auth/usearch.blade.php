@extends('layouts.auth')
@section('nav')
<li class="nav-item">
<a class="nav-link" href="{{ url('/users_list') }}">Users</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ url('/company_list') }}">Companies</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ url('/user_search') }}">User Search</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ url('/company_search') }}">Company Search</a>
</li>

@endsection

@section('content')

<form class="form-inline" method="POST" action='{{ route("user.search") }}'>
@csrf
    <input class="form-control mr-sm-2" type="search" placeholder="Search by name" aria-label="Search" name="full_name">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>

  @if(isset($users))
  @if($users->isEmpty())
  <button type="button" class="btn btn-outline-secondary btn-lg btn-block" style="margin-top:5px;">
<p class="lead">No users found!!!</p>
</button>
  @else

  @foreach($users as $user)

<button type="button" class="btn btn-outline-secondary btn-lg btn-block" style="margin-top:5px;">

<p class="lead">User Name: {{ $user->full_name }}</p>
<p class="lead">Company Name: {{ $user->company_name }}</p>
<p class="lead">Status: 

@if($user->status == 'active')  
<a class="btn btn-success">Active</a>
@else($user->status == 'inactive')
<a class="btn btn-danger">InActive</a>
@endif
</p>
</button>
@endforeach

<div class="d-flex justify-content-center">

{!! $users->links() !!}


</div>
  @endif
@endif

 
@endsection