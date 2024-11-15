<?php

/* 
 * The MIT License
 *
 * Copyright 2024 BlayMo.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *  Laravel
 * 
 * 
 *  --------------------- xxx My Codigo xxx -------------------------
 * 
 *   This content is released under the MIT License (MIT)
 * 
 *   @Proyecto: MyLRXX_XXXXX
 *   @Autor:    BlayMo
 *   @Objeto:   Aprendizaje/Desarrollo 
 *   @Comienzo: XX-XX-24
 *   @licencia  http://opensource.org/licenses/MIT  MIT License
 *   @link      https://github.com/BlayMo
 *   @Version   1.0.0
 *   Copyright  2024 BlayMo.
 * 
 *   @mail: expresoweb2019@gmail.com
 * 
 *   PHP 8.2.X + LaravelXX + Breeze
 *   Script creado el 11-11-2024
 
 * 
 */

namespace App\Http\Controllers;

use App\Models\Apuntes;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Tipos;
use Illuminate\Support\Number;

class ApuntesController extends Controller {
    
    private $faker;
    function __construct() {        
        $this->faker   = \Faker\Factory::create();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View {
        $apuntes = DB::table('apuntes')
                ->join('tipos', 'apuntes.id_tipo', '=', 'tipos.id_tipo')
                ->select('apuntes.*', 'tipos.id_tipo', 'tipos.tipo')
                ->get();

        $data = array(
            'apuntes_data' => $apuntes,
            'numero_es'    => new Number(),
            'tot_cobros'   => DB::table('apuntes')->select('cobros')->sum('apuntes.cobros'),
            'tot_pagos'    => DB::table('apuntes')->select('pagos')->sum('apuntes.pagos'),
            'paginado'     => false,
            'tabla'        => 'mytable',
            'titulo'       => 'List of Non-Server-Side Datatables Notes'
        );

        $data['retorno'] = '/';
        return view('apuntes.apuntes_index', $data);
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $tipos = Tipos::all();
        
        $data = array(
            'concepto'   => $this->faker->text(50),
            'cobros'     => $this->faker->randomFloat(2, 100, 10000),
            'pagos'      => $this->faker->randomFloat(2, 100, 5000),
            'dia'        => $this->faker->dayOfMonth($max         = 'now'),
            'mes'        => $this->faker->month($max         = 'now'),
            'ano'        => $this->faker->year($max         = 'now'),
            'tipos_data' => $tipos,
        );
        
        /*  no test
        $data = array(
            'concepto'   => '',
            'cobros'     => 0,
            'pagos'      => 0,
            'dia'        => date('d', time()),
            'mes'        => date('m', time()),
            'ano'        => date('Y', time()),
            'tipos_data' => $tipos,
        );
         */

        return view('apuntes.apuntes_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $rules = $this->myrules();
        $request->validate($rules);
        $input = $request->input();
        
        $input['id_tipo'] = $request->input('nid_tipo');
        
        if ($request->input('nid_tipo') == 0){
            $input['id_tipo'] = 1;
        }

        $res = Apuntes::create($input);

        if ($res) {
            $msg = 'Note successfully created';
        }
        else {
            $msg = 'Error,Note not created successfully';
        }

        return redirect()->route('apuntes.index')
                        ->with('success', $msg);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id_apunte) {
        $row             = Apuntes::find($id_apunte);
        $data            = array(
            'id_apunte'  => $row->id_apunte,
            'id_tipo'    => $row->id_tipo,
            'concepto'   => $row->concepto,
            'cobros'     => $row->cobros,
            'pagos'      => $row->pagos,
            'dia'        => $row->dia,
            'mes'        => $row->mes,
            'ano'        => $row->ano,
            'created_at' => $row->created_at,
            'updated_at' => $row->updated_at,
        );
        
        return view('apuntes.apuntes_show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id_apunte) {
        $tipos = Tipos::all();
//        $row             = Apuntes::find($id_apunte);
         $row = DB::table('apuntes')
                ->join('tipos', 'apuntes.id_tipo', '=', 'tipos.id_tipo')
                ->select('apuntes.*', 'tipos.id_tipo', 'tipos.tipo')
                ->where('id_apunte','=',$id_apunte) 
                ->first();
        
        $data            = array(
            'id_apunte'  => $row->id_apunte,
            'id_tipo'    => $row->id_tipo,
            'concepto'   => $row->concepto,
            'cobros'     => $row->cobros,
            'pagos'      => $row->pagos,
            'dia'        => $row->dia,
            'mes'        => $row->mes,
            'ano'        => $row->ano,
            'created_at' => $row->created_at,
            'updated_at' => $row->updated_at,
            'tipos_data' => $tipos,
            'tipo'       => $row->tipo
        );
        
        return view('apuntes.apuntes_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apuntes $apuntes) {
        $rules = $this->myrules();
        $request->validate($rules);
        
        $input           = $request->input();
        
        if ($request->input('nid_tipo') == 0){
            $input['id_tipo'] = 1;
        }
        
        $oData           = $apuntes->find($request->input('id_apunte'));
        
        $oData->concepto = $request->input('concepto');
        $oData->cobros   = $request->input('cobros');
        $oData->pagos    = $request->input('pagos');
        $oData->dia      = $request->input('dia');
        $oData->mes      = $request->input('mes');
        $oData->ano      = $request->input('ano');
        
        if ($request->input('nid_tipo') != 0){
            $oData->id_tipo  = $request->input('nid_tipo');
        }

        $res = $oData->save($input);

        if ($res) {
            $msg = 'Memo updated successfully';
        }
        else {
            $msg = 'Error, Memo not updated successfully';
        }

        return redirect()->route('apuntes.index')
                        ->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id_apunte) {
        $oData = Apuntes::find($id_apunte);
        $del = $oData->delete();
        
        if ($del) {
            $msg = 'Memo successfully deleted';
        }
        else {
            $msg = 'Error, Memo not deleted successfully';
        }

        return redirect()->route('apuntes.index')
                        ->with('success', $msg);
    }
    
    private function myrules():array {
        $rules           = array(
            'concepto' => 'required|string|max:100',
            'cobros'   => 'nullable|decimal:0,2',
            'pagos'    => 'nullable|decimal:0,2',
        );
        
        return $rules;
    }
}
