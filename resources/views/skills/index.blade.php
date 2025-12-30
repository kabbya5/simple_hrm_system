@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="card col-12 col-lg-10">
        <div class="card-header d-flex justify-content-between">
            <a href="#" class="text-decoration-none"> Skills </a>
            <a href="{{route('skills.create')}}" class="text-decoration-none"> Create </a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="text-start"> Name </th>
                        <th scope="col" class="text-center"> Despriction </th>
                        <th scope="col" class="text-end"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($skills as $key => $skill)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td class="text-start">{{$skill->name}}</td>
                            <td class="text-center">{{$skill->description}} </td>
                            <td class="d-flex justify-content-end">
                                <a href="{{route('skills.edit', $skill->slug)}}" class="btn btn-primary btn-sm"> Edit </a>
                                <form class="delete-form" action="{{route('skills.destroy', $skill->slug)}}" method="POST">
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
                {{$skills->links()}}
            </div>
        </div>
    </div>
</div>

@endsection