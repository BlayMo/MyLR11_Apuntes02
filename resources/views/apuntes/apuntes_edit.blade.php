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
 *   Script creado el 13-11-2024
 *   
 */
?>
@extends('apuntes')

@section('content')
<div class="container">
    <div class="card shadow mt-2 mb-4">
        <div class="card-header py-3">
            <h4 class='m-0 font-weight-bold text-primary'>Actualizar Apunte</h4>
        </div>
        <div class="card-body">
            <form class="row g-3" action="{{ route('apuntes.update',$id_apunte) }}" method="POST" >
                @csrf
                @method('PUT')
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="id_tipo">Tipo </label>
                        <input type="text" class="form-control"  id="id_tipo"  value="<?php echo $tipo; ?>" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="nid_tipo">Otro Tipo </label>
                        <select class="form-select" name="nid_tipo" id="nid_tipo" >
                            <option  value="0" selected>Sel. Tipo</option>
                            @foreach ($tipos_data as $tipos)
                            <option value="{{ $tipos->id_tipo }}">{{ $tipos->tipo }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="concepto">Concepto </label>
                        <input type="text" class="form-control" name="concepto" id="concepto" autocomplete="off" placeholder="Concepto" value="<?php echo $concepto; ?>" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="cobros">Cobros </label>
                        <input type="number" step=".01" class="form-control" name="cobros" id="cobros" autocomplete="off" value="<?php echo $cobros; ?>" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="pagos">Pagos </label>
                        <input type="number" class="form-control" name="pagos" id="pagos" autocomplete="off" step=".01" value="<?php echo $pagos; ?>" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="dia">Dia</label>
                        <input type="text" class="form-control" name="dia" id="dia" autocomplete="off" placeholder="Dia" value="<?php echo $dia; ?>" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="mes">Mes </label>
                        <input type="text" class="form-control" name="mes" id="mes" autocomplete="off" placeholder="Mes" value="<?php echo $mes; ?>" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="ano">Ano </label>
                        <input type="text" class="form-control" name="ano" id="ano" autocomplete="off" placeholder="Ano" value="<?php echo $ano; ?>" >
                    </div>
                </div>

                <input type="hidden" name="id_apunte" value="<?php echo $id_apunte; ?>" >
                <div class="text-center mt-2"> 
                    <button type="submit" class="btn btn-primary">Actualizar</button> 
                    <a href="<?php echo url()->previous() ?>"  class="btn btn-danger">Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


