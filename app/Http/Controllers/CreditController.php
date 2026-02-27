<?php

namespace App\Http\Controllers;

use App\Models\credit;
use Illuminate\Http\Request;
use App\Models\Depense;

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
        $members = $depenses->colocation->users()->wherePivotNull('left_at');
        $price = $depenses->price;
        foreach ($members->get() as $member) {
            $validate["price"] = $price / $members->count();
            if ($member->id === $depenses->user->id) {
                $validate["status"] = "paid";
            }else{
                $validate["status"] = "not paid";
            }
            $validate["user_id"] = $member->id;
            $validate["depense_id"] = $depenses->id;

            credit::create($validate);
        }

        return redirect()->route("colocation.expenses", $depenses->colocation->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Credit $credit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Credit $credit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Credit $credit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Credit $credit)
    {
        //
    }
}
