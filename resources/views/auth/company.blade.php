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


@foreach($company as $com)

<a href="{{ route('company.list',$com->user_id) }}" class="btn btn-outline-secondary btn-lg btn-block">
<p class="h1 font-italic">Company Name: {{ $com->company_name }}</p>
<p class="lead">Company Address: {{ $com->address }}</p>
<p class="lead">Company Email: {{ $com->email }}</p>


</a>
@endforeach
<div class="d-flex justify-content-center" style="margin-top:5px;">
{!! $company->links() !!}
</div>

@if(session()->has('message'))
<div class="alert alert-warning" role="alert" style="margin-top: 100px;">
  {{ session()->get('message') }}
</div>
@endif
@endsection