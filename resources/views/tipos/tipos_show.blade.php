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
?>
@extends('apuntes')

@section('content')
<div class="container">
    <div class="card shadow mb-4" style="margin-bottom: 50px" >
        <div class="card-header py-3">
            <h4 class='m-0 font-weight-bold text-primary'>Tipos</h4>
        </div>
        <div class="card-body" style="padding:5px">

            <div class="table-responsive" style="padding:5px;font-size:80%" >
                <table class="table table-bordered table-hover table-sm align-middle">
                    <tr><td>Tipo</td><td><?php echo $tipo; ?></td></tr>
                    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
                    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>

                    <tr><td></td><td><a href="<?php echo url($retorno) ?>" class="btn btn-danger btn-sm">Volver</a></td></tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
