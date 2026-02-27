<?php

namespace App\Http\Controllers;

use App\Models\Adhesion;
use App\Models\Depense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Colocation;

class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($colocation)
    {
        $query = Depense::query();
        $depenses = $query->where("colocation_id", $colocation)->get();
        $colocationObject = Colocation::findOrFail($colocation);
        return view("colocation.expenses", compact("depenses", "colocationObject"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $query = Adhesion::query();

        dd(Auth::user()->adhesion->id);

        if (Auth::user()->colocation->owner_id === Auth::user()->id) {
            $adhesions = $query->where("colocation_id", Auth::user()->ownColocation->id)->get();
        }else{
            $adhesions = $query->where("colocation_id", Auth::user()->Colocation->id)->get();
        }
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

        $depense = Depense::create($validate);

        return redirect()->route("credit.store", $depense);
    }

    /**
     * Display the specified resource.
     */
    public function show(Depense $depense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Depense $depense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Depense $depense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Depense $depense)
    {
        //
    }
}
