<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col" class="text-start"> Full Name </th>
            <th scope="col" class="text-center"> Department </th>
            <th scope="col" class="text-left"> Email </th>
            <th scope="col" class="text-center"> Hire Date </th>
            <th scope="col" class="text-end"> Action </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $key => $employee)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td class="text-start">{{$employee->full_name}}</td>
                <td class="text-center">{{$employee->department->name}} </td>
                <td class="text-start">{{$employee->email}} </td>
                <td class="text-center">{{date('d/m/Y', strtotime($employee->hire_date))}} </td>
                <td class="d-flex justify-content-end">
                    <a href="{{route('employees.edit', $employee->id)}}" class="btn btn-primary btn-sm"> Edit </a>
                    <a href="{{route('employees.show', $employee->id)}}" class="btn btn-success btn-sm ms-2"> View </a>
                    <form class="delete-form" action="{{route('employees.destroy', $employee->id)}}" method="POST">
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