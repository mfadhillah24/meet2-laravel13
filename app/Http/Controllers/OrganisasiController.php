<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('organisasi.index' , 
        ['tittle' => 'organisasi',
        'organisasis' => Organisasi::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('organisasi.create' , 
        ['tittle' => 'organisasi create',
        'organisasis' => Organisasi::latest()->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|max:255',
        'leader_name' => 'required|max:255',
        
        
    
    ],
    [
        'name.required' => 'Nama Organisasi wajib diisi',
        'name.max' => 'Nama tidak boleh lebih dari :max karakter',
        'leader_name.required' => 'Nama ketua wajib diisi',
        'leader_name.max' => 'Nama ketua tidak boleh lebih dari :max karakter',

    ]);


    try {
    DB::beginTransaction();

    $organisasi = Organisasi::create($validated);
    $organisasi->OrganisasiLeader()->create($validated);

    DB::commit(); 

    return to_route('organisasi.index')->withSuccess('Organisasi created successfully');

} catch (\Exception $e) {
    DB::rollBack();

    return to_route('organisasi.create')
        ->with('error', 'Failed to create organisasi: ');
}
    
    }



    /**
     * Display the specified resource.
     */
    public function show(Organisasi $organisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organisasi $organisasi)
    {
         return view('organisasi.edit' , 
        ['tittle' => 'organisasi edit',
        'organisasi' => $organisasi,
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organisasi $organisasi)
{
    $validated = $request->validate([
        'name' => 'required|max:255',
        'leader_name' => 'required|max:255',
    ], [
        'name.required' => 'Nama Organisasi wajib diisi',
        'name.max' => 'Nama tidak boleh lebih dari :max karakter',
        'leader_name.required' => 'Nama ketua wajib diisi',
        'leader_name.max' => 'Nama ketua tidak boleh lebih dari :max karakter',
    ]);

    try {
        DB::beginTransaction();

        $organisasi->update([
            'name' => $validated['name'],
        ]);

        $organisasi->OrganisasiLeader()->updateOrCreate(
            ['organisasi_id' => $organisasi->id],
            ['leader_name' => $validated['leader_name']]
        );

        DB::commit();

        return to_route('organisasi.index')
            ->withSuccess('Organisasi updated successfully');

    } catch (\Exception $e) {
        DB::rollBack();

        return to_route('organisasi.edit', $organisasi)
            ->with('error', 'Failed to edit organisasi: ' . $e->getMessage());
    }
}
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organisasi $organisasi)
    {
        $organisasi->delete($organisasi);
        return to_route('organisasi.index')->withSuccess('Organisasi deleted successfully');
    }
}
