<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('role.index');
    }

    public function create()
    {
        return view('role.create');
    }

    public function store()
    {
        return view('role.store');
    }

    public function show()
    {
        return view('role.show');
    }

    public function edit()
    {
        return view('role.edit');
    }

    public function update()
    {
        return view('role.update');
    }

    public function destroy()
    {
        return view('role.destroy');
    }
}
