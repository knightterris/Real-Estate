@extends('user.home.homePage')
@section('title', 'Contact Page')
@section('content')
    <div class="row">
        @if (session('messageSent'))
            <div class="col-6 offset-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('messageSent') }}</strong>
                    {{-- <h3>helloworld</h3> --}}

                </div>
            </div>
        @endif
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="head1 text-center">Contact Form</h3>
                </div>
                <div class="card-body">
                    <form id="form" method="post" action="{{ route('user#createContact') }}">
                        @csrf
                        <label for="" class="my-3">Name</label>
                        <input type="text" name="name" placeholder="Please enter your name"
                            class="form-control rounded @error('name')
                                        is-invalid
                                    @enderror">
                        @error('name')
                            <div class="invalid-message text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="" class="my-3">Email</label>
                        <input type="text" name="email" placeholder="Please enter your email"
                            class="form-control rounded @error('email')
                                        is-invalid
                                    @enderror">
                        @error('email')
                            <div class="invalid-message text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="" class="my-3">Phone</label>
                        <input type="number" name="phone" placeholder="Please enter your phone"
                            class="form-control rounded @error('phone')
                                        is-invalid
                                    @enderror">
                        @error('phone')
                            <div class="invalid-message text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="" class="my-3">Message</label>
                        <textarea name="message" placeholder="Please enter your message" cols="30" rows="8"
                            class="form-control @error('message')
                                        is-invalid
                                    @enderror"></textarea>
                        @error('message')
                            <div class="invalid-message text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div>
                            <div class="clear"></div>
                            <div class="btns offset-11 mt-3">
                                <button class="btn btn-info" type="submit">Send</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
