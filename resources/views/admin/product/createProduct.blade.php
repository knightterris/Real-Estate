@extends('admin.home')

@section('title', 'Product Create Page')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-1 offset-11">
                        <a href="{{ route('admin#productListPage') }}"><button
                                class="btn bg-dark text-white my-3">List</button></a>
                    </div>
                </div>
                <div class="">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create Category</h3>
                            </div>
                            <hr>
                            <form action="{{ route('admin#createProduct') }}" method="post" novalidate="novalidate"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-6">

                                        <label for="cc-payment" class="control-label ">Owner's Name</label>
                                        <input name="ownerName" type="text"
                                            class="form-control @error('ownerName')
                                        is-invalid
                                    @enderror "
                                            aria-required="true" aria-invalid="false" placeholder="Eg. Mr.John..">
                                        @error('ownerName')
                                            <div class="invalid-message">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <label for="cc-payment" class="control-label mt-2">Product Short Title</label>
                                        <input name="title" type="text"
                                            class="form-control @error('title')
                                        is-invalid
                                    @enderror "
                                            aria-required="true" aria-invalid="false"
                                            placeholder="eg. House For Sale In Shwe Taung Gyar (100sqft). Near American Center.">
                                        @error('title')
                                            <div class="invalid-message">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <label for="cc-payment" class="control-label mt-2">Type of Your Product</label>
                                        <select name="category"
                                            class="form-control @error('category')
                                        is-invalid
                                    @enderror">
                                            <option value="">Choose Category</option>
                                            @foreach ($category as $c)
                                                <option value="{{ $c['id'] }}">{{ $c['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <div class="invalid-message">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <label for="cc-payment" class="control-label mt-2">Owner's Phone</label>
                                        <input name="phone" type="number"
                                            class="form-control  @error('phone')
                                        is-invalid
                                    @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="09123456789">
                                        @error('phone')
                                            <div class="invalid-message">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <label for="cc-payment" class="control-label mt-2">Product Address</label>
                                        <input name="address" type="text"
                                            class="form-control  @error('address')
                                        is-invalid
                                    @enderror"
                                            aria-required="true" aria-invalid="false"
                                            placeholder="eg. No.1, Example Street ,Example Ward...">
                                        @error('address')
                                            <div class="invalid-message">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <label for="cc-payment" class="control-label mt-2">Cover Image Of Product</label>
                                        <small class="text-info">(Please Choose a cover image for your product. <i
                                                class="fa-solid fa-circle-exclamation"></i>)</small>
                                        <input name="image" type="file"
                                            class="form-control @error('image')
                                        is-invalid
                                    @enderror"
                                            aria-required="true" aria-invalid="false">
                                        @error('image')
                                            <div class="invalid-message">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <label for="cc-payment" class="control-label mt-2">Product Images</label>
                                        <small class="text-info">(You can select multiple images. <i
                                                class="fa-solid fa-circle-exclamation"></i>)</small>
                                        <input name="images[]" type="file" multiple
                                            class="form-control @error('images')
                                        is-invalid
                                    @enderror"
                                            aria-required="true" aria-invalid="false">
                                        @error('image')
                                            <div class="invalid-message">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <label for="cc-payment" class="control-label mt-2">Product Price</label>
                                        <small class="text-info">(Price is taken in Lakhs.<i
                                                class="fa-solid fa-circle-exclamation"></i>)</small>
                                        <input name="price" type="number"
                                            class="form-control @error('price')
                                        is-invalid
                                    @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="eg. 1500Lakhs">
                                        @error('price')
                                            <div class="invalid-message">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                    <div class="col-6">

                                        <label for="cc-payment" class="control-label mb-1">Description</label>
                                        <textarea name="description"
                                            class="form-control @error('description')
                                        is-invalid
                                    @enderror"
                                            cols="30" rows="10" placeholder="Description goes here"></textarea>
                                        @error('description')
                                            <div class="invalid-message">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <label for="cc-payment" class="control-label mt-2">Please Choose an option</label>
                                        <select name="option"
                                            class="form-control @error('option')
                                        is-invalid
                                    @enderror">
                                            <option value="">Please Choose One Option</option>
                                            <option value="Sale">For Sale</option>
                                            <option value="Rent">For Rent</option>

                                        </select>
                                        @error('option')
                                            <div class="invalid-message">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn  btn-info mt-3 w-25">
                                        <span id="payment-button-amount">Create</span>
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
