<?php

namespace App\Http\Controllers;

use App\Models\credit;
use Illuminate\Http\Request;
use App\Models\depense;
use App\Models\colocation;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($depense)
    {
        $query = Credit::query();
        $credits = $query->where("depense_id", $depense)->get();

        return view("colocation.credit", compact("credits"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($depense)
    {
        $depenses = Depense::findOrFail($depense);

        $members = count($depenses->colocation->adhesion);
        $price = $depenses->price;
        foreach ($depenses->colocation->adhesion as $adhesion) {
            $validate["price"] = $price / $members;
            if ($adhesion->user->id === $depenses->user->id) {
                $validate["status"] = "paid";
            }else{
                $validate["status"] = "not paid";
            }
            $validate["user_id"] = $adhesion->user->id;
            $validate["depense_id"] = $depenses->id;

            credit::create($validate);
        }

        return redirect()->route("colocation.expenses", $adhesion->colocation->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(credit $credit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(credit $credit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, credit $credit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(credit $credit)
    {
        //
    }
}
