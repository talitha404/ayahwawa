<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        return view('document.index');
    }

    public function create()
    {
        return view('document.create');
    }

    public function store()
    {
        return view('document.store');
    }

    public function show()
    {
        return view('document.show');
    }

    public function edit()
    {
        return view('document.edit');
    }

    public function update()
    {
        return view('document.update');
    }

    public function destroy()
    {
        return view('document.destroy');
    }
}
