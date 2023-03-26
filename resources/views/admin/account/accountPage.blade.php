@extends('admin.home')

@section('title', 'Admin Account Page')
@section('content')
    <div class="main-content ">
        @if (session('updateSuccess'))
            <div class="col-5 offset-7">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('updateSuccess') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="card ">
                    <div class="card-header p-3 text-center">
                        Admin Account Info
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5 offset-1 ">
                                @if (Auth::user()->image == null)
                                    <img src="{{ asset('images/default.png') }}" class="rounded shadow"
                                        style="width:450px; height:450px;">
                                @else
                                    <img src="{{ asset('storage/' . Auth::user()->image) }}" class="rounded shadow"
                                        style="width:450px; height:450px;">
                                @endif
                            </div>
                            <div class="col offset-1">
                                <label for="" class="my-2 me-3">Name :</label>
                                <b>{{ Auth::user()->name }}</b><br>
                                <label for="" class="my-2 me-3">Email :</label>
                                <b>{{ Auth::user()->email }}</b><br>
                                <label for="" class="my-2 me-3">Address :</label>
                                <b>{{ Auth::user()->address }} </b><br>
                                <label for="" class="my-2 me-3">Gender :</label>
                                <b>{{ Auth::user()->gender }}</b><br>
                                <label for="" class="my-2 me-3">Role :</label>
                                <b>{{ Auth::user()->role }}</b><br>
                                <a href="{{ route('admin#editAccountPage') }}" class="mt-5">
                                    <button class="btn btn-dark ">Edit Profile</button>
                                </a>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
