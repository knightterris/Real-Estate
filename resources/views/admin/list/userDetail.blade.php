@extends('admin.home')

@section('title', 'User Account Page')
@section('content')
    <div class="main-content ">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <a href="{{ route('admin#userListPage') }}" class="my-3">
                    <button class="btn btn-dark ">Back</button>
                </a>
                <div class="card ">
                    <div class="card-header p-3 text-center">
                        User Account Info
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5 offset-1 ">
                                @if ($userData->image == null)
                                    <img src="{{ asset('images/default.png') }}" class="rounded shadow"
                                        style="width:450px; height:450px;">
                                @else
                                    <img src="{{ asset('storage/' . $userData->image) }}" class="rounded shadow"
                                        style="width:450px; height:450px;">
                                @endif
                            </div>
                            <div class="col offset-1">
                                <label for="" class="my-2 me-3">Name :</label>
                                <b>{{ $userData->name }}</b><br>
                                <label for="" class="my-2 me-3">Email :</label>
                                <b>{{ $userData->email }}</b><br>
                                <label for="" class="my-2 me-3">Address :</label>
                                <b>{{ $userData->address }} </b><br>
                                <label for="" class="my-2 me-3">Gender :</label>
                                <b>{{ $userData->gender }}</b><br>
                                <label for="" class="my-2 me-3">Role :</label>
                                <b>{{ $userData->role }}</b><br>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
