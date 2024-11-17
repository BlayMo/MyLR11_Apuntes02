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
 *   @Proyecto: MyLR11_Apuntes02
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
 *   PHP 8.2.1 + Laravel 11
 *   Script creado el 12-11-2024
 *   
 */

namespace App\Http\Controllers;

use App\Models\Tipos;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TiposController extends Controller {

    private $retorno;
    private $faker;
    
    function __construct() {

        $this->retorno = 'tipos';
        $this->faker   = \Faker\Factory::create();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View {
        $tipos = Tipos::all();

        $data = array(
            'tipos_data' => $tipos,
        );

        $data['retorno'] = '/';
        return view('tipos.tipos_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View {
        $data = array(
            'tipo' => 'Test/'.$this->faker->company(),// test
            //'tipo' => '', //no test
        );

        $data['retorno'] = $this->retorno;
        return view('tipos.tipos_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse {
        
        $rules = $this->myrules();
        $request->validate($rules);
        $input = $request->input();
        
        $res = Tipos::create($input);

        if ($res) {
            $msg = 'Tipo successfully created';
        }
        else {
            $msg = 'Error,Tipo not created successfully';
        }

        return redirect()->route('tipos.index')
                        ->with('success', $msg);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id_tipo) {
        $row             = Tipos::find($id_tipo);
        $data            = array(
            'id_tipo'    => $row->id_tipo,
            'tipo'       => $row->tipo,
            'created_at' => $row->created_at,
            'updated_at' => $row->updated_at,
        );
        $data['retorno'] = $this->retorno;
        return view('tipos.tipos_show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id_tipo): View {
        $row  = Tipos::find($id_tipo);
        $data = array(
            'id_tipo' => $row->id_tipo,
            'tipo'    => $row->tipo,
        );

        $data['retorno'] = $this->retorno;
        return view('tipos.tipos_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tipos $tipos) {
        $rules = $this->myrules();
        $request->validate($rules);
        
        $oData       = $tipos::find($request->input('id_tipo'));
        $oData->tipo = $request->input('tipo');

        $res = $oData->save();

        if ($res) {
            $msg = 'Tipo #'.$oData->id_tipo.' updated successfully ';
        }
        else {
            $msg = 'Error,Tipo #'.$oData->id_tipo.' not updated successfully';
        }

        return redirect()->route('tipos.index')
                        ->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id_tipo) {
        $oData = Tipos::find($id_tipo);
        $del = $oData->delete();
        
         if ($del) {
            $msg = 'Tipo successfully deleted';
        }
        else {
            $msg = 'Error, Tipo not deleted successfully';
        }
           
        return redirect()->route('tipos.index')
                        ->with('success',$msg);
    }
    
    private function myrules(){
        $rules = array(
            'tipo' => 'required|string|max:100',
        );
        
        return $rules;
    }
}
