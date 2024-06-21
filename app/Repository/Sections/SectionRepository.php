<?php
namespace App\Repository\Sections;

use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Models\Section;

class SectionRepository implements SectionRepositoryInterface
{

    public function index()
    {
      $sections = Section::all();
      return view('Dashboard.Sections.index',compact('sections'));
    }

    public function store($request)
    {
        Section::create([
            'name' => $request->input('name'),
        ]);

        session()->flash('add');
        return redirect()->route('Sections.index');
    }

    public function update($request)
    {
        $section = Section::findOrFail($request->id);
        $section->update([
            'name' => $request->input('name'),
        ]);
        session()->flash('edit');
        return redirect()->route('Sections.index');
    }


    public function destroy($request)
    {
        Section::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('Sections.index');
    }

    public function show($id)
    {
        Section::findOrFail($id)->doctors;
        $section = Section::findOrFail($id);
        // $doctors =$section->load('doctors');
        return view('Dashboard.Sections.show_doctors',compact('doctors','section'));
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