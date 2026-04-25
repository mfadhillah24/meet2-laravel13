<x-apps>

     <x-slot:title>{{$tittle}}</x-slot>

     <a href="{{ route('departement.index') }}" class="btn btn-warning mb-3">Back</a>  

     <h4>Detail Departement</h4>
     <ul class="list-group mb-3">
        <li class="list-group-item">Name : {{ $departement->name }}</li>
        <li class="list-group-item">Created At : {{ $departement->created_at->format('d F Y H:i:s') }}</li>
        <li class="list-group-item">Last Update : {{ $departement->updated_at->diffForHumans() }}</li>
     </ul>
     
     {{-- dosen --}}
     <h4>Data Lecturer</h4>
     @foreach ($departement->lecturers as $lecturer )
     <ul class="list-group">
            
       
        <li class="list-group-item">Name : {{ $lecturer->name }}</li>
         @endforeach
     </ul>
</x-apps>