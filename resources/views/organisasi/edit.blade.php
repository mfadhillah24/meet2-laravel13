<x-apps>

<x-slot:title>{{ $tittle }}</x-slot>

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

  <form method="POST" action="{{ route('organisasi.update', $organisasi) }}">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @elseif(old('name')) is-valid @enderror" id="name" name="name" value="{{ old('name', $organisasi->name) }}"> @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
    
  </div>
  <div class="mb-3">
    <label for="leader_name" class="form-label">Leader Name</label>
    <input type="text" class="form-control @error('leader_name') is-invalid @elseif(old('leader_name')) is-valid @enderror" id="leader_name" name="leader_name" value="{{ old('leader_name', $organisasi->OrganisasiLeader?->leader_name) }}"> @error('leader_name')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
    
  </div>
  
  <a href={{ route('organisasi.index') }} class="btn btn-warning me-1">Cancel</a>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</x-apps>