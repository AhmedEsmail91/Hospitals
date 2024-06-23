<?php
namespace App\Repository\Doctors;

use App\Interfaces\Doctors\DoctorRepositoryInterface;

use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class DoctorRepository implements DoctorRepositoryInterface
{
    private $dayMapping = [
        'Monday' => 'الاثنين',
        'Tuesday' => 'الثلاثاء',
        'Wednesday' => 'الأربعاء',
        'Thursday' => 'الخميس',
        'Friday' => 'الجمعة',
        'Saturday' => 'السبت',
        'Sunday' => 'الأحد'
    ];

    public function index()
    {
        
      $doctors = Doctor::orderBy('id','desc')->get();
      return view('Dashboard.Doctors.index',[
        // Passed Data to the view
        'doctors'=>$doctors,
        'sections'=>Section::all(),
        'appointments'=>
        ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday']]);
    
    }

    public function store($request)
    {
        $request->merge([
            
            'email' => "examples@gmail.com",
            'password' => '123456',
            'phone' => Hash::make('123456'),
            'price' => '100',
            'status' => '1',
            'section_id' => '1'
        ]);
        // $request->appointments= 0;
        
        Doctor::create($request->all());
        session()->flash('add');
        return redirect()->route('Doctors.index');
    }

    public function update($request)
    {
        $doctor = Doctor::findOrFail($request->id);
        $doctor->update([
            'name' => $request->name,
        ]);
        session()->flash('edit');
        return redirect()->route('Doctors.index');
    }


    public function destroy($request)
    {
        Doctor::findOrFail($request->id)->delete();
        session()->flash('delete');
    }

    public function show($id)
    {
        Doctor::findOrFail($id)->doctors;
        $section = Doctor::findOrFail($id);
        // $doctors =$section->load('doctors');
        return view('Dashboard.Doctors.show_doctors',compact('doctors','section'));
    }

}
// to make session for sweet alert which is called in the index page and implemented as following 
        /*
        @if (session()->has('add'))
            <script>
                window.onload = function() {
                    notif({
                        msg: "{{ trans('Dashboard/messages.add') }}",
                        type: "success"
                    });
                }
            </script>
        @endif
         */