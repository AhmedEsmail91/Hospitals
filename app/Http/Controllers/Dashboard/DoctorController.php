<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Doctor;
use App\Repository\Doctors\DoctorRepository;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    
    public function __construct(protected DoctorRepositoryInterface $Doctors){
        
    }
    public function index()
    {
        return $this->Doctors->index();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return $this->Doctors->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if (!$this->Doctors->store($request)) {
            session()->flash('error', 'Something went wrong');
            return redirect()->back();
        }
        else{
            return redirect()->route('Doctors.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
