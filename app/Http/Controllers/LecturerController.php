<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Lecturer;
use Illuminate\Http\Request;


class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $lecturers = Lecturer::latest()->filter(request(['keyword', 'departement_id']));
        

            $lecturers = $lecturers->paginate(5)->withQueryString();
        
    
        return view('lecturer.index',[
            'lecturers' => $lecturers,
            'departements' => Departement::latest()->get(),
            'title' => 'Lecturer List'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lecturer.create',[
            'title' => 'Lecturer Create',
            'departements' => Departement::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|max:255',
        'departement_id' => 'required|exists:departements,id',
    
    ],
    [
        'name.required' => 'Nama wajib diisi',
        'name.max' => 'Nama tidak boleh lebih dari :max karakter',
        'departement_id.required' => 'prodi wajib diisi',
        'departement_id.exists' => 'prodi yang dipilih tidak valid',
        
    ]);

    Lecturer::create($validated);
    
    return to_route('lecturer.index')->withSuccess('Lecturer created successfully');

    return redirect('/lecturer');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lecturer $lecturer)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecturer $lecturer)
    {
         return view('lecturer.edit',[
            'title' => 'Lecturer edit',
            'departements' => Departement::latest()->get(),
            'lecturer' => $lecturer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        $validated = $request->validate([
        'name' => 'required|max:255',
        'departement_id' => 'required|exists:departements,id',
    
    ],
    [
        'name.required' => 'Nama wajib diisi',
        'name.max' => 'Nama tidak boleh lebih dari :max karakter',
        'departement_id.required' => 'prodi wajib diisi',
        'departement_id.exists' => 'prodi yang dipilih tidak valid',
        
    ]);

    $lecturer->update($validated);
    
    return to_route('lecturer.index')->withSuccess('Lecturer updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecturer $lecturer)
    {
         $lecturer->delete();
        return to_route('lecturer.index')->withSuccess('Lecturer deleted successfully');
    }
}
