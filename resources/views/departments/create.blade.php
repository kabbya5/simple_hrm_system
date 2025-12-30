@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="card col-6">
        <div class="card-header d-flex justify-content-between">
            <a href="#" class="text-decoration-none"> Create </a>
            <a href="{{route('departments.index')}}" class="text-decoration-none"> Departments </a>
        </div>
        <div class="card-body">
            <form action="{{route('departments.store')}}" method="POST">
                @csrf
                @include('departments._form', ['department' => $department, 'button_text' => 'Create'])
            </form>
        </div>
    </div>
</div>

@endsection