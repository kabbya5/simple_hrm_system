@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="card col-6">
        <div class="card-header d-flex justify-content-between">
            <a href="#" class="text-decoration-none"> Edit </a>
            <a href="{{route('departments.index')}}" class="text-decoration-none"> Departments </a>
        </div>
        <div class="card-body">
            <form action="{{route('departments.update', $department->slug)}}" method="POST">
                @method('PUT')
                @csrf
                @include('departments._form', ['department' => $department, 'button_text' => 'Update'])
            </form>
        </div>
    </div>
</div>

@endsection