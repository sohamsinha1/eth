@extends('layouts.app')
@section('side_nav')
<!-- <div class="sidenav">
<a href="{{ url('/pat_list') }}">Patient List</a>
  <a href="{{ url('/doc_list') }}">Doctor List</a>
  <a href="{{ url('/gnm_list') }}">GNM list</a>
</div> -->
<div class="sidebar-heading">Admin Panel</div>
        <div class="list-group list-group-flush">
            <a href="{{ url('/pat_list') }}" class="list-group-item list-group-item-action bg-light">Patient List</a>
            <a href="{{ url('/doc_list') }}" class="list-group-item list-group-item-action bg-light">Doctor List</a>
            <a href="{{ url('/gnm_list') }}" class="list-group-item list-group-item-action bg-light">GNM list</a>
            <!-- <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Status</a> -->
        </div>
        </div>
@endsection
@section('content')
<!-- <div class="container tab"> -->
<table class="table table-bordered mb-5" style="margin-left:100px; overflow-x:auto;overflow-y:auto">
<thead>
<tr class="table-success">
<th scope="col">Specialist</th>
<th scope="col">Qualification</th>
<th scope="col">Doctor Fee</th>
<th scope="col">Action</th>
<th scope="col">Is_deleted</th>
<th scope="col">Is_approved</th>
</tr>
</thead>
<tbody>

@foreach($doctors as $doctor)
<tr>
<td>{{ $doctor->specialist_in }}</td>
<td>{{  $doctor->qualification }}</td>
<td>{{  $doctor->doctor_fee }}</td>
<td style="white-space: nowrap"> 
<form method="post" action= "{{ route('doctor.destroy',$doctor->id) }}">
{{csrf_field()}}
{{method_field('delete')}}
<input type="submit" value="Delete" class="btn btn-warning" style="display:inline-block">
</form>


</td>
<td>
@if($doctor->is_deleted == '1')
<p class="lead">Yes</p>
@else($doctor->is_deleted == '0')
<p class="lead">No</p>
@endif
</td>
<td>
@if($doctor->is_approved == '1')
<p class="lead">Yes</p>
@else($doctor->is_approved == '0')
<p class="lead">No</p>
@endif
</td>
</tr>
@endforeach
</tbody>
</table>
<div class="d-flex justify-content-center">

{!! $doctors->links() !!}


</div> 
@if(session()->has('status'))
    <div class="alert alert-success margin-top:20px;">
        {{ session()->get('status') }}
    </div>
@endif  
    </div>

    <div class="container" style="margin-top:30px;margin-left:70px;overflow-x:scroll;overflow-y:scroll;">
    <a href="{{ url('/doctor_verify') }}">View Certificate</a>
    <div class="row">
    <!-- <div class="col-md-2">
     <a href="{{ url('/doctor_verify') }}">View Certificate</a>
    </div> -->
    <div class="col-md-4">
    <table class="table table-bordered mb-5">
    <thead>
    <tr class="table-success">
    <th class="col">Doctor ID</th>
    <th class="col">Click to view Certificate</th>
    <th class="col">Certificate</th>
    </tr>
    </thead>
    <tbody>
    @if(!empty($path))
    @foreach($doctors as $doctor)
    @foreach($path as $paths)
    <tr>
    <td>{{ $doctor->id }}</td>
    <td></td>
    <td>
     @php
    $filename = pathinfo($paths,PATHINFO_FILENAME);
    $extension = pathinfo($paths,PATHINFO_EXTENSION);
    $full_path = 'img/' . $filename . '.' . $extension;
    @endphp
    <a href="{{ url('img/'.$filename.'.'.$extension) }}" target="_blank">
    <img src="{{ asset('img/'.$filename.'.'.$extension) }}" alt="oops..." class="viewImage act"style="width:30px;height:30px;">
   </a>
   <form method="post" action= "{{ route('doctor.approve') }}">
{{csrf_field()}}
{{method_field('delete')}}
<input type="hidden" value="{{ $doctor->id }}" name="id">
<input type="hidden" value="{{ $full_path }}" name="path">
<input type="submit" value="Approve" class="btn btn-warning"style="margin-top:5px;">
</form>
   </td>
   </tr>
    @endforeach
    @endforeach
    @endif
    </tbody>
    </table>
    </div>
    </div>
    <!-- </div> -->
@endsection

<!-- <script type="text/javascript">
function openimage()
{
    var largeImages = document.getElementsByClassName("viewImage");
    for(var i=0; i < largeImages.length; i++)
    {
        largeImages[i].addEventListener("click",function(){
            var current = document.getElementsByClassName("act");
            if(current.length>0)
            {
                current[0].className=current[0].className.replace("act","");
            }
            this.className += "act";

        });
    }
    largeImage.style.display = 'block';
    largeImage.style.width = 400 + "px";
    largeImage.style.height = 400 + "px";

    var w = window.open("");
    w.document.write(largeImage.outerHTML);
}
</script> -->