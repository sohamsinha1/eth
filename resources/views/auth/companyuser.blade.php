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

<!-- @if(session()->has('message'))
<div class="alert alert-warning" role="alert" style="margin-top: 100px;">
  {{ session()->get('message') }}
</div>
@endif -->

<!-- @if(!empty($coms)) -->


@if($coms->isEmpty())

<button type="button" class="btn btn-outline-secondary btn-lg btn-block">
<p class="lead">No users at this company</p>
</button>

@else

@foreach($coms as $com)

<button type="button" class="btn btn-outline-secondary btn-lg btn-block">

<p class="lead">User Name: {{ $com->full_name }}</p>
<p class="lead">Company Name: {{ $com->company_name }}</p>
<p class="lead">status: 

@if($com->status == 'active')  
<a class="btn btn-success">Active</a>
@else($com->status == 'inactive')
<a class="btn btn-danger">InActive</a>
@endif
</p>
</button>
@endforeach
<div class="d-flex justify-content-center" style="margin-top:5px;">
{!! $coms->links() !!}
</div>

@endif

<!-- @else
<button type="button" class="btn btn-outline-secondary btn-lg btn-block">
<p class="lead">No users at this company</p>
</button>
@endif -->
@endsection