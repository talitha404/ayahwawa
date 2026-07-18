<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company.index');
    }

    public function create()
    {
        return view('company.create');
    }

    public function store()
    {
        return view('company.store');
    }

    public function show()
    {
        return view('company.show');
    }

    public function edit()
    {
        return view('company.edit');
    }

    public function update()
    {
        return view('company.update');
    }

    public function destroy()
    {
        return view('company.destroy');
    }
}
