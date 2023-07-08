@extends('layout.master')
@section('content')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Silahkan membuat akun</h1>
                                </div>
                                @if(session('status'))
                                    <div class="alert alert-{{ session('status') }}">
                                        {{ session('message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <form class="user" method="post" action="">
                                @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                            placeholder="Nama lengkap" name="name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                            placeholder="Email Address" name="email">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleRepeatPassword" placeholder="Repeat Password" name="password_confirmation">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                            placeholder="Nomor telpon" name="phone_number">
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block" type="submit">Register account</button>
                                    <hr>
                                </form>
                                <div class="text-center">
                                    <a class="small" href="/login">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection