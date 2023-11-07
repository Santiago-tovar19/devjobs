<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Vacante::class);
        return view('vacantes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $this->authorize('viewAny', Vacante::class);
        return view('vacantes.create');
    }



    /**
     * Display the specified resource.
     */
    public function show(Vacante $vacante)
    {
        return view('vacantes.show', [
            'vacante' => $vacante
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Vacante $vacante)
    {

        $this->authorize('update', $vacante);

        return view('vacantes.edit', [
            'vacante' => $vacante
        ]);
    }

    public function destroy(Vacante $vacante)
    {
        $this->authorize("delete",$vacante);

        $vacante->delete();

        return back();


        // return redirect()->back()->with('estado', 'Tu vacante ha sido eliminada');
    }


}
