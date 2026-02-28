<?php

namespace App\Http\Controllers;

use App\Models\Adhesion;
use App\Models\colocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Credit;
use App\Models\User;

class AdhesionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($colocation)
    {
        $colocationObject = colocation::findOrFail($colocation);
        $query = Adhesion::query();
        $members = $query->where('left_at', NULL)->where('colocation_id', $colocation)->get();
        return view('colocation.list', compact("members", "colocationObject"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($colocation)
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
     * Remove the specified resource from storage.
     */
    public function update(Adhesion $adhesion)
    {
        if(Credit::where("user_id", $adhesion->user->id)->where("status", "not paid")->exists()) {
            Credit::where("user_id", $adhesion->user->id)
                ->where("status", "not paid")
                ->update(['user_id' => Auth::user()->id]);
            User::where("id", Auth::user()->id)
                ->update(["reputation" => Auth::user()->reputation - 1]);
        }elseif (Credit::where("user_id", $adhesion->user->id)->where("status", "not paid")->doesntExist()) {
            User::where("id", Auth::user()->id)
                ->update(["reputation" => Auth::user()->reputation + 1]);
        }

        $adhesion->update(["left_at" => now()] );

        return redirect()->route("dashboard");
    }
}
