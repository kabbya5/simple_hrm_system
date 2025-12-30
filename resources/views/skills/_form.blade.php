<div class="mb-2">
    <label for="">  Name </label>
    <input type="text" class="form-control @error('name') is-invalid @enderror"
        value="{{old('name', $skill->name)}}" name="name">

    @error('name') 
        <p class="text-danger"> {{$message}} </p>
    @enderror 
</div>

<div class="mb-2">
    <label for=""> Description </label>
    <textarea name="description" cols="20" rows="4"
        class="form-control @error('description') is-invalid @enderror">{{old('description', $skill->description)}}</textarea>

    @error('description') 
        <p class="text-danger"> {{$message}} </p>
    @enderror 
</div>

<div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-primary"> {{$button_text}} </button>
</div>