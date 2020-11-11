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

<form class="form-inline" method="POST" action='{{ route("company.search") }}'>
@csrf
    <input class="form-control mr-sm-2" type="search" placeholder="Search by name" aria-label="Search" name="company_name">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>

  @if(isset($coms))
  @if($coms->isEmpty())
  <button type="button" class="btn btn-outline-secondary btn-lg btn-block" style="margin-top:5px;">
<p class="lead">No users found!!!</p>
</button>
  @else

  @foreach($coms as $com)

<button type="button" class="btn btn-outline-secondary btn-lg btn-block" style="margin-top:5px;">


<p class="h1 font-italic">Company Name: {{ $com->company_name }}</p>
<p class="lead">Company Address: {{ $com->address }}</p>
<p class="lead">Company Email: {{ $com->email }}</p>

</button>
@endforeach


<div class="d-flex justify-content-center">

{!! $coms->links() !!}


</div>
  @endif

  
@endif

 
@endsection