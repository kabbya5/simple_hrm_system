@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="card col-12 col-lg-10">
        <div class="card-header d-flex justify-content-between">
            <a href="#" class="text-decoration-none"> {{$employee->full_name}} </a>
            <a href="{{route('employees.index')}}" class="text-decoration-none"> Employee </a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <h5> Basic Information </h5>
                    <img src="{{asset('storage/' . $employee->image_path)}}" alt="" class="img-rounded">
                    <div class="mt-2">
                        <p>{{$employee->full_name}}</p>
                        <p> Date of Birth: {{date('d/m/Y', strtotime($employee->date_of_birth))}}</p>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <h5> Skills </h5>
                
                    <div class="mt-2">
                        <p> Department: {{$employee->department->name}} </p>
                        <p> Skills: {{ $employee->skills->pluck('name')->implode(', ') }} </p>
                        <p> Hire Date: {{date('d/m/Y', strtotime($employee->hire_date))}}</p>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <h5> Other Information </h5>
                
                    <div class="mt-2">
                        <p> Email: {{$employee->email}} </p>
                        <p> Phone: {{ $employee->phone }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection