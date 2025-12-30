@extends('layouts.app')
@section('header_links')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection 
@section('content')
<div class="row justify-content-center">
    <div class="card col-6">
        <div class="card-header d-flex justify-content-between">
            <a href="#" class="text-decoration-none"> Create </a>
            <a href="{{route('employees.index')}}" class="text-decoration-none"> employees </a>
        </div>
        <div class="card-body">
            <form action="{{route('employees.store')}}" method="POST">
                @csrf
                @include('employees._form', ['employee' => $employee, 'button_text' => 'Create'])
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 

<script>
    $(document).ready(function(){
        $('.select2').select2();
    })
</script>
@endsection 