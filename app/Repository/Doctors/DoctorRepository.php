<?php
namespace App\Repository\Doctors;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorRepository implements DoctorRepositoryInterface{
    public function index(){
        $doctors = Doctor::all();
        return view('Dashboard.Doctors.index',compact('doctors'));
    }
    public function create(){
        $appointments=DB::table('appointments')->get();
        return view('Dashboard.Doctors.add',['sections' => Section::all(),'appointments'=>$appointments]);
    }
    public function store($request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors',// make sure that the email is unique in the doctors table
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:255',
            'section_id' => 'required|exists:sections,id', // make sure that the section_id exists in the sections table
        ]);
        Doctor::create([
            'name' => $request->input('name'),
            'email'=> $request->input('email'),
            'password'=> Hash::make($request->input('password')),
            'phone'=> $request->input('phone'),
            'section_id' => $request->input('section_id'),
        ]);
        session()->flash('add');
        return redirect()->route('Doctors.index');
    }
    public function update($request){
        $doctor = Doctor::findOrFail($request->id);
        $doctor->update([
            'name' => $request->input('name'),
            'section_id' => $request->input('section_id'),
        ]);
        session()->flash('edit');
        return redirect()->route('Doctors.index');
    }
    public function destroy($request){
        Doctor::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('Doctors.index');
    }
    public function show($id){
        $doctor = Doctor::findOrFail($id);
        return view('Dashboard.Doctors.show',compact('doctor'));
    }
}