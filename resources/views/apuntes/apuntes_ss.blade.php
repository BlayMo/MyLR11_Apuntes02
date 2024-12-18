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
 * 
 */
?>

@extends('apuntes')
@section('content')
<div class="container">
    <div class="container">
    <div class="row" style="margin-top: 10px;margin-bottom: 10px">
        <div class="col-md-8">
            <h4 style="margin-top:0px">Notes</h4>
        </div>

        <div class="col-md-4 text-right">
            <div class="d-grid gap-2">
                
                <a href="{{ route('apuntes.create') }}" class="btn btn-sm btn-primary"> <span class="fa fa-plus"></span> Nuevo Apunte</a>

            </div>
        </div>
    </div>
    <div class="card shadow mb-4" >
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of Datatables Server-Side Notes</h6>
        </div>
        <div class="card-body">
            @session('success')
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ $value }} 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endsession
            <form class="d-flex mt-4 mb-4" role="search">            
                <input class="form-control me-2" name="search" type="search" placeholder="buscar..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
            <div class="table-responsive" style="padding:5px;font-size:80%" >
                <table class="table table-bordered table-hover table-sm align-middle data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="text-align:center">Tipo</th>
                            <th style="text-align:center">Concepto</th>
                            <th style="text-align:center">Cobros</th>
                            <th style="text-align:center">Pagos</th>
                            <th style="text-align:center">Dia</th>
                            <th style="text-align:center">Mes</th>
                            <th style="text-align:center">A&ntilde;o</th>
                            <th style="text-align:center" width="25%">Opciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th  style="text-align:center"></th>
                            <th  style="text-align:center">Totales</th>
                            <th  style="text-align:center"></th>
                            <th  style="text-align:right">{{ $numero_es->format($tot_cobros, locale: 'es') }}</th>
                            <th  style="text-align:center">{{ $numero_es->format($tot_pagos, locale: 'es') }}</th>
                            <th  style="text-align:center"></th>
                            <th  style="text-align:center"></th>
                            <th  style="text-align:center"></th>
                            <th  style="text-align:center"></th>
                        </tr>
                    </tfoot>
                </table>
                <div class="text-center">
                    <a href="{{ url($retorno) }}" class="btn btn-danger btn-sm">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection