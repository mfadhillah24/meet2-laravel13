<x-apps>

     <x-slot:title>{{$tittle}}</x-slot>

     <a href="{{ route('departement.create') }}" class="btn btn-primary mb-3">Create</a>
    <ul class="list-group">
        @foreach ($departements as $departement)
        
        <li class="list-group-item">
        {{ $loop->iteration }}. {{ $departement->nim}} -- {{ $departement->name}}
        </li>
        <li class="list-group-item">
            <a href="{{ route('departement.show', $departement) }}" class="btn btn-info mb-3 btn-sm">
                Detail</a>
            <a href="{{ route('departement.edit', $departement) }}" class="btn btn-warning mb-3 btn-sm">
                Edit</a>
            <form action ="{{ route('departement.destroy', $departement) }}" method="POST" class="d-inline">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger btn-sm mb-3" onclick="return confirm('yakint')">Delete</button>
</form>
            </li>   
            
        @endforeach"  
</x-apps>