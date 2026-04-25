<x-apps>

     <x-slot:title>{{$title}}</x-slot>
     @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

     <a href="{{ route('lecturer.create') }}" class="btn btn-primary mb-3">Create</a>

     <form action="">
        <div class="row g-3 mb-3 align-items-end">
            <div class="col-md-4">
                <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Search lecturer Name..." value="{{ request('keyword') }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
            <div class="col-md-4">
                 <select class="form-select @if(old('name')) @error('name') is-invalid @else is-valid 
    @enderror @endif" id="departement_id" name="departement_id">
        <option value="">Pilih Prodi</option>
        @foreach ($departements as $departement)
        <option value="{{ $departement->id }}" {{ request('departement_id') == $departement->id ? 'selected' : '' }}> 
            {{ $departement->name }}
        </option>
               
        @endforeach
    </select>
            </div>
            
        </div>
        
     </form>
    <ul class="list-group">
        @foreach ($lecturers as $lecturer)
        <li class="list-group-item">
            <a href="{{ route('lecturer.edit', $lecturer) }}" class="btn btn-warning mb-3 btn-sm">
                Edit</a>{{ $lecturers->firstItem() + $loop->index }}. {{ $lecturer->name}} -- {{ $lecturer->departement->name}}
            <form action ="{{ route('lecturer.destroy', $lecturer) }}" method="POST" class="d-inline">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('yakint')">Delete</button>
</form>
            </li>
            @endforeach
    </ul>
    
    {{ $lecturers->links() }}
            
        
</x-apps>