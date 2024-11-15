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
 * 
 */

?>
@extends('apuntes')

@section('content')
<div class="container">
    <div class="row" style="margin-top: 10px;margin-bottom: 10px">
        <div class="col-md-10">
            <h4 style="margin-top:0px">Tipos</h4>
        </div>

        <div class="col-md-2 text-right">
            <div class="d-grid gap-2">
                <a href="{{ route('tipos.create') }}" class="btn btn-sm btn-primary"> <span class="fa fa-plus"></span> Nuevo Tipo</a>

            </div>
        </div>
    </div>
    <div class="card shadow mb-4" >
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listado de Tipos</h6>
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
                <table class="table table-bordered table-hover table-sm align-middle" id="mytable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="text-align:center">Tipo</th>
                            <th style="text-align:center">Created At</th>

                            <th style="text-align:center" >Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tipos_data as $tipos)
                        <tr>
                            <td style="text-align:center">{{ $tipos->id_tipo }}</td>
                            <td  style="text-align:left">{{ $tipos->tipo }}</td>
                            <td  style="text-align:center">{{ $tipos->created_at }}</td>
                            <td style="text-align:center">
                                <form action="{{ route('tipos.destroy',$tipos->id_tipo) }}" method="POST">
                                    <a class="btn btn-info btn-sm  mx-2" href="{{ route('tipos.show', $tipos->id_tipo) }}"><i class="fa-solid fa-list"></i> Show</a>
                                    <a class="btn btn-primary btn-sm  mx-2" href="{{ route('tipos.edit',$tipos->id_tipo) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                <div class="text-center">
                    <a href="{{ url($retorno) }}" class="btn btn-danger btn-sm">Volver</a>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection

