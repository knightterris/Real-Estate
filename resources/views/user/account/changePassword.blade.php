@extends('user.home.homePage')

@section('title', 'Password Update Page')
@section('content')




    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2 offset-10">
                        <a href="{{ route('user#editAccountPage') }}"><button
                                class="btn bg-dark text-white my-3">Back</button></a>
                    </div>
                </div>
                @if (session('notMatch'))
                    <div class="col-6 offset-3">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('notMatch') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                <div class="">
                    <div class="card col-6 offset-3">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Update Credential</h3>
                            </div>
                            <hr>
                            <form action="{{ route('user#changePassword') }}" method="post" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label my-3">Old Password</label>
                                            <input name="oldPassword" type="password"
                                                class="form-control @error('oldPassword')
                                        is-invalid
                                    @enderror"
                                                value="" aria-required="true" aria-invalid="false"
                                                placeholder="Type your oldpassword...">
                                            @error('oldPassword')
                                                <div class="invalid-message text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label my-3">New Password</label>
                                            <input name="newPassword" type="password"
                                                class="form-control @error('newPassword')
                                        is-invalid
                                    @enderror"
                                                value="" aria-required="true" aria-invalid="false"
                                                placeholder="Type your new password...">
                                            @error('newPassword')
                                                <div class="invalid-message text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label my-3">Confirm New Password</label>
                                            <input name="confirmPassword" type="password"
                                                class="form-control @error('confirmPassword')
                                        is-invalid
                                    @enderror"
                                                value="" aria-required="true" aria-invalid="false"
                                                placeholder="Type your new password again...">
                                            @error('confirmPassword')
                                                <div class="invalid-message text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>



                                        <div>
                                            <button type="submit" class="btn btn-lg btn-info offset-9 mt-5 ">
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
