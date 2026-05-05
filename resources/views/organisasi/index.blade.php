<x-apps>

     <x-slot:title>{{$tittle}}</x-slot>
     @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

     <a href="{{ route('organisasi.create') }}" class="btn btn-primary mb-3">Create</a>
    <ul class="list-group">
        @foreach ($organisasis as $organisasi)
        <li class="list-group-item">
            <a href="{{ route('organisasi.edit', $organisasi) }}" class="btn btn-warning mb-3 btn-sm">
                Edit</a>{{ $loop->iteration }}. {{ $organisasi->OrganisasiLeader?->leader_name}} -- {{ $organisasi->name}}
            <form action ="{{ route('organisasi.destroy', $organisasi) }}" method="POST" class="d-inline">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('yakint')">Delete</button>
</form>
            </li>   
            
        @endforeach"  
</x-apps>