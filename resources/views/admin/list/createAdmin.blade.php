@extends('admin.home')

@section('title', 'Admin Create Page')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3 offset-8">
                        <a href="{{ route('admin#adminListPage') }}"><button
                                class="btn bg-dark text-white my-3">List</button></a>
                    </div>
                </div>
                <div class="col-lg-6 offset-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create Admin</h3>
                            </div>
                            <hr>
                            <form action="{{ route('admin#createAdmin') }}" method="post" novalidate="novalidate">
                                @csrf
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Name</label>
                                    <input name="name" type="text"
                                        class="form-control @error('name')
                                        is-invalid
                                    @enderror"
                                        aria-required="true" aria-invalid="false" placeholder="Name...">
                                    @error('name')
                                        <div class="invalid-message">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Email</label>
                                    <input name="email" type="text"
                                        class="form-control @error('email')
                                        is-invalid
                                    @enderror"
                                        aria-required="true" aria-invalid="false" placeholder="Email...">
                                    @error('email')
                                        <div class="invalid-message">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Password</label>
                                    <input name="password" type="password"
                                        class="form-control @error('password')
                                        is-invalid
                                    @enderror"
                                        aria-required="true" aria-invalid="false" placeholder="Password...">
                                    @error('password')
                                        <div class="invalid-message">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Address</label>
                                    <input name="address" type="text"
                                        class="form-control @error('address')
                                        is-invalid
                                    @enderror"
                                        aria-required="true" aria-invalid="false" placeholder="Address...">
                                    @error('address')
                                        <div class="invalid-message">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Gender</label>
                                    <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                        <option value="">Choose Gender</option>
                                        <option value="male">
                                            Male</option>
                                        <option value="female">
                                            Female</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-message">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Role</label>
                                    <select name="role" class="form-control @error('role') is-invalid @enderror">
                                        <option value="">Choose Role</option>
                                        <option value="admin" selected>
                                            Admin</option>
                                        <option value="user">
                                            User</option>
                                    </select>
                                    @error('role')
                                        <div class="invalid-message">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Create </span>
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
@endsection
