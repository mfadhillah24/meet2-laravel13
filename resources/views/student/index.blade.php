<x-apps>

     <x-slot:title>{{$tittle}}</x-slot>

    <ul class="list-group">
        @foreach ($students as $student)
        <li class="list-group-item">{{ $loop->iteration }}. {{ $student->nim}} -- {{ $student->name}}</li>  
            
        @endforeach"  
</x-apps>