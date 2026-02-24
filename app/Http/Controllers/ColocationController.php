<?php

namespace App\Http\Controllers;

use App\Models\colocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ColocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = colocation::query();
        $colocation = $query->where("owner_id", FacadesAuth::user()->id);
        dd($colocation);

        return view("colocation.index", compact("colocation"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(colocation $colocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(colocation $colocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, colocation $colocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(colocation $colocation)
    {
        //
    }
}
