@extends('layouts.custom')

@section('title', 'Login Area Borwita x Reckitt')
{{-- @section('page-title', 'Ini Dashboard Title') --}}

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-4">
            <div class="card card-primary">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        Logo BCP
                    </div>
                    <div>
                        Logo Reckitt
                    </div>
                </div>

                <h1 style="font-size: 20px; text-align: center; margin-top: 25px">Integrasi Borwita - Reckitt</h1>

                <div class="card-body">
                    <form method="POST" action="#" class="needs-validation" novalidate="">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" required autofocus>
                            <div class="invalid-feedback">
                                Please fill in your email
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Password</label>
                            </div>
                            <input id="password" type="password" class="form-control" name="password" required>
                            <div class="invalid-feedback">
                                please fill in your password
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="select_cabang">Pilih Cabang</label>
                            <select name="select_cabang" id="select_cabang" class="form-control">
                                <option value="">Cabang A</option>
                                <option value="">Cabang B</option>
                                <option value="">Cabang C</option>
                            </select>
                            <div class="invalid-feedback">
                                Please fill in your email
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection