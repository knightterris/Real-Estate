@extends('admin.home')

@section('title', 'Account Update Page')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2 offset-10">
                        <a href="{{ route('admin#accountPage') }}"><button
                                class="btn bg-dark text-white my-3">Back</button></a>
                    </div>
                </div>
                <div class="">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Update Category</h3>
                            </div>
                            <hr>
                            <form action="{{ route('admin#updateProfile', Auth::user()->id) }}" method="post"
                                novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-5">
                                        @if (Auth::user()->image == null)
                                            <img src="{{ asset('images/default.png') }}" class="rounded shadow"
                                                style="width:500px; height:400px;">
                                        @else
                                            <img src="{{ asset('storage/' . Auth::user()->image) }}" class="rounded shadow"
                                                style="width:500px; height:400px;">
                                        @endif
                                        <input type="file" name="image"
                                            class="form-control mt-3 @error('image')
                                        is-invalid
                                    @enderror">
                                        @error('image')
                                            <div class="invalid-message">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Name</label>
                                            <input name="name" type="text" value="{{ Auth::user()->name }}"
                                                class="form-control @error('name')
                                        is-invalid
                                    @enderror"
                                                value="" aria-required="true" aria-invalid="false"
                                                placeholder="Type your name...">
                                            @error('name')
                                                <div class="invalid-message">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Email</label>
                                            <input name="email" type="text" value="{{ Auth::user()->email }}"
                                                class="form-control @error('email')
                                        is-invalid
                                    @enderror"
                                                value="" aria-required="true" aria-invalid="false"
                                                placeholder="Type your email...">
                                            @error('email')
                                                <div class="invalid-message">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Address</label>
                                            <input name="address" type="text" value="{{ Auth::user()->address }}"
                                                class="form-control @error('address')
                                        is-invalid
                                    @enderror"
                                                value="" aria-required="true" aria-invalid="false"
                                                placeholder="Type your address...">
                                            @error('address')
                                                <div class="invalid-message">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Role</label>
                                            <input name="" type="text" class="form-control"
                                                value="{{ Auth::user()->role }}" aria-required="true" aria-invalid="false"
                                                disabled>

                                        </div>

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Gender</label>
                                            <select name="gender"
                                                class="form-control @error('gender') is-invalid @enderror">
                                                <option value="">Choose Gender</option>
                                                <option value="male" @if (Auth::user()->gender == 'male') selected @endif>
                                                    Male</option>
                                                <option value="female" @if (Auth::user()->gender == 'female') selected @endif>
                                                    Female</option>
                                            </select>
                                            @error('gender')
                                                <div class="invalid-message">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div>
                                            <button type="submit" class="btn btn-lg btn-info btn-block">
                                                <span id="payment-button-amount">Update</span>
                                                <i class="fa-solid fa-circle-right"></i>
                                            </button>
                                        </div>
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
