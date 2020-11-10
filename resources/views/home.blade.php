@extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welcome</div>

                    <div class="card-body">
                         Hi there, regular user
                         <a href="{{URL('/register/admin')}}">Admin Registration</a><br/>
                         <a href="{{URL('/login/admin')}}">Admin Login</a>
                    </div>

                    <div class="card-body">
                         Hi there, regular user
                         <a href="{{URL('/register/writer')}}">Admin Registration</a><br/>
                         <a href="{{URL('/login/writer')}}">Admin Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection