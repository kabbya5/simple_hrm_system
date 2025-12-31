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
    <label for=""> Dipartment </label>
    <select  class="form-control @error('department_id') is-invalid @enderror"
         name="department_id">

        <option value=""> Select </option>
        @foreach ($departments as $department)
            <option value="{{$department->id}}" {{old('department_id', $employee->department_id) == $department->id ? 'selected' : ''}}> {{$department->name}}</option>
        @endforeach
    </select>

    @error('department_id') 
        <p class="text-danger"> {{$message}} </p>
    @enderror 
</div>

<div class="mb-2">
    <label for=""> Image </label>

    <div class="d-flex items-center">
        <input type="file" class="form-control image-input @error('image') is-invalid @enderror"
        value="{{old('image', $employee->last_name)}}" name="image">

        <img src="{{asset('storage/' .$employee->image_path)}}" alt="" class="image-preview form-control" style="height:38px; width:60px;">

    </div>

    @error('image') 
        <p class="text-danger"> {{$message}} </p>
    @enderror 
</div>


<div class="mb-2">
    <label for=""> Skills </label>
    <select class="form-select select2 @error('skills') is-invalid @enderror"
         name="skills[]" multiple>

        @foreach ($skills as $skill)
             <option value="{{$skill->id}}" 
                {{in_array($skill->id, old('skills', $employee->skills->pluck('id')->toArray())) ? 'selected' : ''}}> {{$skill->name}} </option>
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