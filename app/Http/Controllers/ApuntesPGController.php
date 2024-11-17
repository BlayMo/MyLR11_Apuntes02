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
 *   Script creado el 14-11-2024
 *   
 */

namespace App\Http\Controllers;


use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;

class ApuntesPGController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View {
        $filas   = 10;
        
        $apuntes = DB::table('apuntes')
                ->join('tipos', 'apuntes.id_tipo', '=', 'tipos.id_tipo')
                ->select('apuntes.*', 'tipos.id_tipo', 'tipos.tipo')
                ->latest()
                ->paginate($filas);

        $data = array(
            'apuntes_data' => $apuntes,
            'numero_es'    => new Number(),
            'tot_cobros'   => DB::table('apuntes')->select('cobros')->sum('apuntes.cobros'),
            'tot_pagos'    => DB::table('apuntes')->select('pagos')->sum('apuntes.pagos'),
            'paginado'     => true,
            'tabla'        => '',
            'titulo'       => 'Listado de Apuntes Paginado'
        );

        $data['retorno'] = '/';
        return view('apuntes.apuntes_index', $data)->with('i', (request()->input('page', 1) - 1) * $filas);
    }

    
}
