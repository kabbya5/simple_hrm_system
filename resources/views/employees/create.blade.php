@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="card col-6">
        <div class="card-header d-flex justify-content-between">
            <a href="#" class="text-decoration-none"> Create </a>
            <a href="{{route('employees.index')}}" class="text-decoration-none"> employees </a>
        </div>
        <div class="card-body">
            <form action="{{route('employees.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('employees._form', ['employee' => $employee, 'button_text' => 'Create'])
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
    $(document).ready(function () {
        
    });
</script>
@endsection 