<div class="mb-2">
    <label for=""> Department Name </label>
    <input type="text" class="form-control @error('name') is-invalid @enderror"
        value="{{old('name', $department->name)}}" name="name">

    @error('name') 
        <p class="text-danger"> {{$message}} </p>
    @enderror 
</div>

<div class="mb-2">
    <label for=""> Position </label>
    <input type="number" class="form-control @error('position') is-invalid @enderror"
        value="{{old('position', $department->position)}}" name="position">

    @error('position') 
        <p class="text-danger"> {{$message}} </p>
    @enderror 
</div>

<div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-primary"> {{$button_text}} </button>
</div>