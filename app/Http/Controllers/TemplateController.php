<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        return view('template.index');
    }

    public function create()
    {
        return view('template.create');
    }

    public function store()
    {
        return view('template.store');
    }

    public function show()
    {
        return view('template.show');
    }

    public function edit()
    {
        return view('template.edit');
    }

    public function update()
    {
        return view('template.update');
    }

    public function destroy()
    {
        return view('template.destroy');
    }
}
