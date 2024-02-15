<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vacancy.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vacancy.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacancy $vacancy)
    {
        return view('vacancy.show', [ 'vacancy' => $vacancy ]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancy $vacancy)
    {
        $this->authorize('update', $vacancy);
        return view('vacancy.edit', compact('vacancy'));
    }
}
