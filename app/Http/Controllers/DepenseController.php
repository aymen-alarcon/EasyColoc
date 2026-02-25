<?php

namespace App\Http\Controllers;

use App\Models\adhesion;
use App\Models\depense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\category;

class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($colocation)
    {
        $query = Depense::query();
        $depenses = $query->where("colocation_id", $colocation)->get();
        return view("colocation.expenses", compact("depenses"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $query = adhesion::query();
        $adhesions = $query->where("colocation_id", Auth::user()->ownColocation->id)->get();
        $categories = Category::all();
        return view("colocation.expense-create", compact("adhesions", "categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = [
            "colocation_id" => $request->colocation,
            "buyer" => $request->payer,
            "category_id" => $request->category,
            "title" => $request->title,
            "price" => $request->price,
        ];

        Depense::create($validate);

        return redirect()->route("colocation.expenses", $request->colocation);
    }

    /**
     * Display the specified resource.
     */
    public function show(depense $depense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(depense $depense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, depense $depense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(depense $depense)
    {
        //
    }
}
