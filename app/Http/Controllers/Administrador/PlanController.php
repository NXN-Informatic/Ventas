<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Plan;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $planes = Plan::all();
        return view('admin.plan.index', compact('planes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = [
            'name'          =>  'required|min:3|max:40',
            'costos'        =>  'required',
            'description'   =>  'max:120'
        ];
        $this->validate($request, $rules);

        Plan::create([
            'name'  => $request->input('name'),
            'description' => $request->input('description'),
            'costos' => $request->input('costos')
        ]);

        $notification = 'Se ha creado el Plan Correctamente';
        return redirect('/plan/create')->with(compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan) {
        return view('admin.plan.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan) {
        $rules = [
            'name'          =>  'required|min:3|max:40',
            'costos'        =>  'required',
            'description'   =>  'max:120'
        ];
        $this->validate($request, $rules);

        $plan->name = $request->input('name');
        $plan->description = $request->input('description');
        $plan->costos = $request->input('costos');
        $plan->save();

        $notification = 'Se ha actualizado el Plan Correctamente';
        return redirect('/plan/'.$plan->id.'/edit')->with(compact('notification'));
    }
}
