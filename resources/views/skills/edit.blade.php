@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="card col-6">
        <div class="card-header d-flex justify-content-between">
            <a href="#" class="text-decoration-none"> Edit </a>
            <a href="{{route('skills.index')}}" class="text-decoration-none"> skills </a>
        </div>
        <div class="card-body">
            <form action="{{route('skills.update', $skill->slug)}}" method="POST">
                @method('PUT')
                @csrf
                @include('skills._form', ['skill' => $skill, 'button_text' => 'Update'])
            </form>
        </div>
    </div>
</div>

@endsection