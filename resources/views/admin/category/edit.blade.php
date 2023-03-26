@extends('admin.home')

@section('title', 'Category Update Page')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3 offset-8">
                        <a href="{{ route('admin#categoryListPage') }}"><button
                                class="btn bg-dark text-white my-3">Back</button></a>
                    </div>
                </div>
                <div class="col-lg-6 offset-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Update Category</h3>
                            </div>
                            <hr>
                            <form action="{{ route('admin#updateCategory') }}" method="post" novalidate="novalidate">
                                <input type="hidden" name="categoryId" value="{{ $data->id }}">
                                @csrf

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                    <input name="categoryName" type="text"
                                        class="form-control @error('categoryName')
                                        is-invalid
                                    @enderror"
                                        value="{{ $data->name }}" aria-required="true" aria-invalid="false"
                                        placeholder="Apartment/condominium,etc...">
                                    @error('categoryName')
                                        <div class="invalid-message">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Description</label>
                                    <textarea name="categoryDescription"
                                        class="form-control @error('categoryDescription')
                                        is-invalid
                                    @enderror"
                                        cols="30" rows="5" placeholder="A short definition about your category">{{ $data->description }}</textarea>
                                    @error('categoryDescription')
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
@endsection
