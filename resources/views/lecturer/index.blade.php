<x-apps>

     <x-slot:title>{{$title}}</x-slot>
     @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

     <a href="{{ route('lecturer.create') }}" class="btn btn-primary mb-3">Create</a>
    <ul class="list-group">
        @foreach ($lecturers as $lecturer)
        <li class="list-group-item">
            <a href="{{ route('lecturer.edit', $lecturer) }}" class="btn btn-warning mb-3 btn-sm">
                Edit</a>{{ $loop->iteration }}. {{ $lecturer->name}} -- {{ $lecturer->departement->name}}
            <form action ="{{ route('lecturer.destroy', $lecturer) }}" method="POST" class="d-inline">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('yakint')">Delete</button>
</form>
            </li>   
            
        @endforeach"  
</x-apps>