<?php
namespace App\Interfaces\Doctors;


interface DoctorRepositoryInterface
{

    // get All Sections
    public function index();

    // store Sections
    public function store($request);

    // Update Sections
    public function update($request);

    // destroy Sections
    public function destroy($request);

    // destroy Sections
    public function show($id);

}