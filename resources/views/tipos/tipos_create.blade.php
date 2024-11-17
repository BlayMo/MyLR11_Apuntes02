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

?>

@extends('apuntes')

@section('content')
<div class="container">
    <div class="card shadow mt-2 mb-4">
        <div class="card-header py-3">
            <h4 class='m-0 font-weight-bold text-primary'>Nuevo Tipo</h4>
        </div>
        <div class="card-body">
            <form class="row g-3" action="{{ route('tipos.store') }}" method="POST" >
                 @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label" for="tipo">Tipo </label>
                        <input type="text" class="form-control" name="tipo" id="tipo" autocomplete="off" placeholder="Tipo" value="<?php echo $tipo; ?>" >
                    </div>
                </div>

                <div class="text-center mt-2"> 
                    <button type="submit" class="btn btn-primary">Nuevo</button> 
                    <a href="<?php echo url($retorno) ?>"  class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection