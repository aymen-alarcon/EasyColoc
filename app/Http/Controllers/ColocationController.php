<?php

namespace App\Http\Controllers;

use App\Models\adhesion;
use App\Models\colocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Auth;

class ColocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adhesionQuery = adhesion::query();
        $adhesion = $adhesionQuery->where("user_id", FacadesAuth::user()->id)->first();

        return view("colocation.index", compact("adhesion"));
    }

    public function create(){
        return view("colocation.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => "required",
            "description" => "required",
        ]);

        $validate["owner_id"] = Auth::user()->id;
        $validate["status"] = "pending";

        $colocation = Colocation::create($validate);

        return redirect()->route("adhesion.store", $colocation->id);
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
    public function destroy(Colocation $Colocation)
    {
        $Colocation->delete();

        return redirect()->route("dashboard");
    }
}
