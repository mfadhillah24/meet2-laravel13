<x-apps>

     <x-slot:title>{{$tittle}}</x-slot>

     <a href="{{ route('student.create') }}" class="btn btn-primary mb-3">Create</a>
    <ul class="list-group">
        @foreach ($students as $student)
        <li class="list-group-item">
            <a href="{{ route('student.edit', $student) }}" class="btn btn-warning mb-3 btn-sm">
                Edit</a>{{ $loop->iteration }}. {{ $student->nim}} -- {{ $student->name}} -- {{ $student->gender }}
            <form action ="{{ route('student.destroy', $student) }}" method="POST" class="d-inline">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('yakint')">Delete</button>
</form>
            </li>   
            
        @endforeach"  
</x-apps>