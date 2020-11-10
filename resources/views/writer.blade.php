@extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        Hi there, awesome writer
                        @if(Auth::guard('writer')->check())
                        Hello {{Auth::guard('writer')->user()->name}}
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection