@extends('user.home.homePage')

@section('title', 'Account Page')
@section('content')
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <h1>
                    <div class="card-header text-center p-3">Account Info</div>
                </h1>
                <div class="card-body ">
                    <div class="row">
                        <div class="text-center my-3">
                            @if (Auth::user()->image == null)
                                <img src="{{ asset('images/default.png') }}" class="rounded shadow" style="width:450px; ">
                            @else
                                <img src="{{ asset('storage/' . Auth::user()->image) }}" class="rounded shadow"
                                    style="width:450px; ">
                            @endif
                        </div>
                    </div>
                    <div class=" mt-3 card-footer">
                        <div class="row">
                            <div class="col-6 my-2">
                                <h1 class="text-center my-2">Name :</h1>
                                <h1 class="text-center my-2">Email :</h1>
                                <h1 class="text-center my-2">Gender :</h1>
                                <h1 class="text-center my-2">Address :</h1>
                            </div>
                            <div class="col-6 my-2">
                                <h1 class="my-2">{{ Auth::user()->name }}</h1>
                                <h1 class="my-2">{{ Auth::user()->email }}</h1>
                                <h1 class="my-2">{{ Auth::user()->gender }}</h1>
                                <h1 class="my-2">{{ Auth::user()->address }}</h1>
                            </div>
                        </div>

                    </div>

                    <div class="row d-flex">
                        <div class="col-6  mt-3 ">
                            <a href="{{ route('user#editAccountPage') }}" class="">
                                <button class="btn btn-info  offset-7">Edit Profile</button>
                            </a>
                        </div>

                        <div class="col-6  mt-3 ">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-info offset-7">Logout</button>
                            </form>
                        </div>
                    </div>


                </div>



            </div>
        </div>
    </div>



@endsection
