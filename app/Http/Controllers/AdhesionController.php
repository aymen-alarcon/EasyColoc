<?php

namespace App\Http\Controllers;

use App\Models\adhesion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdhesionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($adhesion)
    {
        dd($adhesion);
        return view('colocation.list', compact("members"));
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
    public function store(Request $request, $colocation)
    {
        $validate = [
            "user_id" => Auth::user()->id,
            "colocation_id" => $colocation,
            "left_at" => NULL
        ];

        Adhesion::create($validate);

        return redirect()->route("dashboard");
    }

    /**
     * Display the specified resource.
     */
    public function show(adhesion $adhesion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(adhesion $adhesion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, adhesion $adhesion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(adhesion $adhesion)
    {
        //
    }
}
