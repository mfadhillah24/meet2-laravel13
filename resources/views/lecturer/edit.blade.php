<x-apps>

     <x-slot:title>{{  $title }}</x-slot> 
     
     @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
  <form method="POST" action="{{ route('lecturer.update', $lecturer) }}">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control @if(old('name')) @error('name') is-invalid @else is-valid 
    @enderror @endif" id="name" name="name" value="{{ old('name', $lecturer->name) }}"> @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
    
  </div>
  <div class="mb-3">
    <label for="departement_id" class="form-label">Departement ID</label>


    <select class="form-select @if(old('departement_id')) @error('departement_id') is-invalid @else is-valid 
    @enderror @endif" id="departement_id" name="departement_id">
        <option value="">Pilih Prodi</option>
        @foreach ($departements as $departement)
        <option value="{{ $departement->id }}" 
            @selected(old('departement_id', $lecturer->departement_id) == $departement->id)> 
            {{ $departement->name }}
        </option>   
            
        @endforeach
    </select>
  </div>
  
  <a href={{ route('lecturer.index') }} class="btn btn-warning me-1">Cancel</a>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</x-apps>