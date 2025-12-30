@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="card col-12 col-lg-10">
        <div class="card-header d-flex justify-content-between">
            <a href="#" class="text-decoration-none"> Employees </a>
            <a href="{{route('employees.create')}}" class="text-decoration-none"> Create </a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="text-start"> Name </th>
                        <th scope="col" class="text-center"> Department </th>
                        <th scope="col" class="text-left"> Email </th>
                        <th scope="col" class="text-center"> Date Of Birth </th>
                        <th scope="col" class="text-center"> Hire Date </th>
                        <th scope="col" class="text-end"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $key => $employee)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td class="text-start">{{$department->name}}</td>
                            <td class="text-center">{{$department->position}} </td>
                            <td class="d-flex justify-content-end">
                                <a href="{{route('departments.edit', $department->slug)}}" class="btn btn-primary btn-sm"> Edit </a>
                                <form class="delete-form" action="{{route('departments.destroy', $department->slug)}}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="ms-2 btn btn-danger btn-sm"> Delete </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-2">
                {{$employees->links()}}
            </div>
        </div>
    </div>
</div>

@endsection