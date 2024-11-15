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
 *   Script creado el 12-11-2024
 *   
 * 
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;
use App\Models\Apuntes;

class ApuntesSSController extends Controller {

    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        
        $datatables = new \Yajra\DataTables\DataTables();
        if ($request->ajax()) {

            //$data = Apuntes::query();
            $data = DB::table('apuntes')
                ->join('tipos', 'apuntes.id_tipo', '=', 'tipos.id_tipo')
                ->select('apuntes.*', 'tipos.id_tipo', 'tipos.tipo')
                ->get();

            return $datatables::of($data)
                            ->addIndexColumn()                            
                            ->editColumn('cobros', function($row) {
                               //return \number_format($row->cobros, 2, ',', '.');
                                return Number::format($row->cobros, locale: 'es');
                            })
                            ->editColumn('pagos', function($row) {
                               //return \number_format($row->pagos, 2, ',', '.');
                               return Number::format($row->pagos, locale: 'es'); 
                            })
                            ->addColumn('action', function ($row) {
                                return $this->btn($row);
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        
        $data2 = array(    
            'numero_es'  => new Number(),
            'tot_cobros' => DB::table('apuntes')->select('cobros')->sum('apuntes.cobros'),
            'tot_pagos'  => DB::table('apuntes')->select('pagos')->sum('apuntes.pagos'),
            'retorno'    => '/'
        );

        return view('apuntes.apuntes_ss',$data2);
    }
    
    private function btn($row){
        $cad  = '';       
        $cad .= '<a class="btn btn-info btn-sm  mx-2" href="'.route('apuntes.show',$row->id_apunte).'"><i class="fa-solid fa-list"></i> Show</a>';
        $cad .= '<a class="btn btn-primary btn-sm  mx-2" href="'.route('apuntes.edit',$row->id_apunte).'"><i class="fa-solid fa-pen-to-square"></i> Edit</a>';
        $cad .= '<a class="btn btn-danger btn-sm  mx-2" href="'.route('apuntes_ss.borrar',$row->id_apunte).'"><i class="fa-solid fa-trash"></i> Del</a>';
        return $cad;
    }

    public function borrar(int $id_apunte) {
        $oData = Apuntes::find($id_apunte);
        $del = $oData->delete();

        if ($del) {
            $msg = 'Memo successfully deleted';
        }
        else {
            $msg = 'Error, Memo not deleted successfully';
        }

        return redirect()->route('apuntes_ss')
                        ->with('success', $msg);
        
    }
    
}
