@extends('user.home.homePage')

@section('title', 'Product Detail Page')
@section('content')
    <div class="main-content ">

        <a href="{{ route('user#productPage') }}">
            <button class="btn btn-info m-4">Back</button>
        </a>
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="card ">
                    <h1 class="card-header p-3 text-center ">
                        Product Details
                    </h1>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3 offset-1 ">

                                <img src="{{ asset('storage/' . $product['image']) }}" class="rounded shadow"
                                    style="width:450px; height:450px;">


                            </div>
                            <div class="col offset-1">
                                <h1 for="" class="my-2 me-3 d-inline">Name :</h1>
                                <h1 class="d-inline text-dark">{{ $product['name'] }}</h1><br>

                                <h1 for="" class="my-2 me-3 d-inline">Phone :</h1>
                                <h1 class="d-inline  text-dark">{{ $product['phone'] }}</h1><br>

                                <h1 for="" class="my-2 me-3 d-inline">Address :</h1>
                                <h1 class="d-inline  text-dark">{{ $product['address'] }} </h1><br>

                                <h1 for="" class="my-2 me-3 d-inline">Price :</h1>
                                <h1 class="d-inline  text-dark">{{ $product['price'] }}</h1><br>

                                <h1 for="" class="my-2 me-3 d-inline">Title :</h1>
                                <h1 class="d-inline  text-dark">{{ $product['title'] }}</h1><br>

                                <h1 for="" class="my-2 me-3 d-inline">For Rent/Sale :</h1>
                                <h1 class="d-inline  text-dark">{{ $product['option'] }}</h1><br>

                                <h1 for="" class="my-2 me-3 d-inline">Category :</h1>
                                <h1 class="d-inline  text-dark">{{ $product['category_name'] }}</h1><br>

                                <h1 for="" class="my-2 me-3 d-inline">Description :</h1>
                                <h1 class="d-inline  text-dark">{{ $product['description'] }}</h1><br>

                            </div>

                        </div>



                    </div>
                </div>
            </div>
        </div>


        {{-- <div class="row">
            @foreach ($images as $item)
                <img src="{{ asset('storage/productImages/' . $item['image']) }}" class="col-4 my-3">
            @endforeach
        </div> --}}


        <div class="row p-5">
            @foreach ($images as $item)
                <div class="col-4 mb-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <img src="{{ asset('storage/productImages/' . $item['image']) }}"
                                style="width:500px; height:300px;">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>

@endsection
