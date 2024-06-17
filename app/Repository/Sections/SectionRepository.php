<?php
namespace App\Repository\Sections;

use App\Interfaces\Sections\SectionRepositoryInterface;
use Illuminate\Support\Facades\Request;

class SectionRepository implements SectionRepositoryInterface
{
    public function index()
    {
        // return all sections
        return 'All sections';
    }

    public function create()
    {
        // create a new section
        
    }

    public function update(array $data, $id)
    {
        // update a section
    }

    public function delete($id)
    {
        // delete a section
    }

    public function show($id)
    {
        // show a section
    }
}