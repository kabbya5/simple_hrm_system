<div class="mb-2">
    <label for=""> First name </label>
    <input type="text" class="form-control @error('first_name') is-invalid @enderror"
        value="{{old('first_name', $employee->first_name)}}" name="first_name">

    @error('first_name') 
        <p class="text-danger"> {{$message}} </p>
    @enderror 
</div>

<div class="mb-2">
    <label for=""> Last Name </label>
    <input type="text" class="form-control @error('last_name') is-invalid @enderror"
        value="{{old('last_name', $employee->last_name)}}" name="last_name">

    @error('last_name') 
        <p class="text-danger"> {{$message}} </p>
    @enderror 
</div>

<div class="mb-2">
    <label for=""> Skills </label>
    <select class="form-control select2 @error('skills') is-invalid @enderror"
         name="skills[]" multiple>

        @foreach ($skills as $skill)
             <option value="{{$skill->id}}"> {{$skill->name}} </option>
        @endforeach
        
    </select>

    @error('skills') 
        <p class="text-danger"> {{$message}} </p>
    @enderror 
</div>

<div class="mb-2">
    <label for=""> Email </label>
    <input type="text" class="form-control @error('email') is-invalid @enderror"
        value="{{old('email', $employee->email)}}" name="email">

    @error('email') 
        <p class="text-danger"> {{$message}} </p>
    @enderror 
</div>

<div class="mb-2">
    <label for=""> Phone </label>
    <input type="text" class="form-control @error('phone') is-invalid @enderror"
        value="{{old('phone', $employee->phone)}}" name="phone">

    @error('phone') 
        <p class="text-danger"> {{$message}} </p>
    @enderror 
</div>

<div class="mb-2">
    <label for=""> Date of Birth </label>
    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
        value="{{old('date_of_birth', $employee->date_of_birth)}}" name="date_of_birth">

    @error('date_of_birth') 
        <p class="text-danger"> {{$message}} </p>
    @enderror 
</div>

<div class="mb-2">
    <label for=""> Hire Date </label>
    <input type="date" class="form-control @error('hire_date') is-invalid @enderror"
        value="{{old('hire_date', $employee->hire_date)}}" name="hire_date">

    @error('hire_date') 
        <p class="text-danger"> {{$message}} </p>
    @enderror 
</div>

<div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-primary"> {{$button_text}} </button>
</div>