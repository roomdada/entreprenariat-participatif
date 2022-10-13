<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use App\Models\Domaine;
use Illuminate\Http\Request;

class DomaineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboards.domaines.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.domaines.create');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Domaine  $domaine
     * @return \Illuminate\Http\Response
     */
    public function show(Domaine $domaine)
    {
        $domaine->load('projects');
        return view('dashboards.domaines.show', compact('domaine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Domaine  $domaine
     * @return \Illuminate\Http\Response
     */
    public function edit(Domaine $domaine)
    {
        return view('dashboards.domaines.edit', compact('domaine'));
    }


    public function destroy(Domaine $domaine)
    {
        $domaine->delete();
        session()->flash('success', 'Domaine supprimé avec succès !');
        return redirect()->route('domaines.index');
    }

  
}
