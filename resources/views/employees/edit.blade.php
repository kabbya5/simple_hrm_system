@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="card col-6">
        <div class="card-header d-flex justify-content-between">
            <a href="#" class="text-decoration-none"> Edit </a>
            <a href="{{route('employees.index')}}" class="text-decoration-none"> Employees </a>
        </div>
        <div class="card-body">
            <form action="{{route('employees.update', $employee->id)}}" method="POST">
                @method('PUT')
                @csrf
                @include('employees._form', ['employee' => $employee, 'button_text' => 'Update'])
            </form>
        </div>
    </div>
</div>

@endsection