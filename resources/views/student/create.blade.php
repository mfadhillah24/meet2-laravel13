<x-apps>

     <x-slot:title>{{  $tittle }}</x-slot> 
     
     @session('success')
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endsession
  <form method="POST" action="{{ route('student.store') }}">
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @elseif(old('name')) is-valid @enderror" id="name" name="name" value="{{ old('name') }}"> @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
    
  </div>
  <div class="mb-3">
    <label for="nim" class="form-label">Nim</label>
    <input type="number" class="form-control @error('nim') is-invalid @elseif(old('nim')) is-valid @enderror" id="nim" name="nim" value="{{ old('nim') }}"> @error('nim')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
    
  </div>
  
  <a href={{ route('student.index') }} class="btn btn-warning me-1">Cancel</a>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</x-apps>