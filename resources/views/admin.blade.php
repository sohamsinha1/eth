@extends('layouts.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Welcome admin
                    @if(Auth::guard('admin')->check())
                        Hello {{Auth::guard('admin')->user()->name}}
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection