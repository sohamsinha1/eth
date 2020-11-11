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
        <div class="row justify-content-center" style="margin-top:20px;">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welcome</div>

                    <div class="card-body">
                         Hi welcome admin
                         @if (Auth::check())
                         {{ Auth::user()->name }}
                         @endif
                         
                    </div>

                    
                </div>
            </div>
        </div>
@endsection