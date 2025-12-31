@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="card col-12 col-lg-10">
        <div class="card-header d-flex justify-content-between">
            <a href="#" class="text-decoration-none"> Employees </a>
            <a href="{{route('employees.create')}}" class="text-decoration-none"> Create </a>
        </div>

        <div class="card-body">

            <div class="employee-search-form">
                <div class="mb-2 col-12 col-lg-3">
                    <label for=""> Filter By Department </label>

                    <select type="text" class="form-control" name="search" id="filter-employee">
                        <option value=""> Select Department </option>
                        @foreach ($departments as $department)
                            <option value="{{$department->id}}">{{$department->name}} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- partials-table --}}
            <div class="employee-table">
                @include('employees._table')
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script>
        $(document).ready(function(){

            function fetchEmployees(department_id, page = 1){
                $.ajax({
                    url:"{{route('employees.index')}}",
                    type:"GET",
                    data:{page:page, department_id:department_id},
                    success:function(res){
                        $('.employee-table').html(res);
                    },
                    error:function(xhr){
                        alert(xhr.responseText);
                    }
                });
            }

            $('#filter-employee').on('change', function(){
                var department_id = $(this).val();

                fetchEmployees(department_id);
            });

            $(document).on('click', '.page-link', function(e){
                e.preventDefault();

                var department_id = $('#filter-employee').val();
                var href = $(this).attr('href');            
                var page = parseInt(href.split('page=')[1]); 

                fetchEmployees(department_id, page);
            });
        });
    </script>
@endsection