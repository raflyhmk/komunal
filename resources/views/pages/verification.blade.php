@extends('layout.master')
@section('content')
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900">Mohon masukan kode otp</h1>
                                        <h5 class="mb-4 text-left"><span class="mobile-text">Kami baru saja mengirimkan kode otp ke email <b class="text-danger">{{$user->email}}</b></span></h5>
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
                                        <div class="d-flex flex-row mb-4">
                                            <input type="text" class="form-control" autofocus="" name="input_otp">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection