<x-apps>

     <x-slot:title>{{$tittle}}</x-slot>


       @session('success')
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endsession
     

     <a href="{{ route('student.create') }}" class="btn btn-primary mb-3">Create</a>
    <ul class="list-group">
        @foreach ($students as $student)
        <li class="list-group-item">

    
    <span>{{ $student->name }}</span>

    
        <form action ="{{ route('student.restore', $student) }}" method="POST" class="d-inline">
            @method('PUT')
            @csrf
            <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('yakin?')">Restore</button>
        </form>
        
        <form action ="{{ route('student.forceDelete', $student) }}" method="POST" class="d-inline">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus permanen?')">Force Delete</button>
        </form>
    

</li>  
        @endforeach
</x-apps> 