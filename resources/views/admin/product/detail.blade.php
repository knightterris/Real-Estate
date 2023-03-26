@extends('admin.home')

@section('title', 'Product Detail Page')
@section('content')
    <div class="main-content ">

        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="card ">
                    <div class="card-header p-3 text-center">
                        Product Details
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5 offset-1 ">

                                <img src="{{ asset('storage/' . $product['image']) }}" class="rounded shadow"
                                    style="width:450px; height:450px;">


                            </div>
                            <div class="col offset-1">
                                <label for="" class="my-2 me-3">Name :</label>
                                <b>{{ $product['name'] }}</b><br>

                                <label for="" class="my-2 me-3">Phone :</label>
                                <b>{{ $product['phone'] }}</b><br>

                                <label for="" class="my-2 me-3">Address :</label>
                                <b>{{ $product['address'] }} </b><br>

                                <label for="" class="my-2 me-3">Price :</label>
                                <b>{{ $product['price'] }}</b><br>

                                <label for="" class="my-2 me-3">Title :</label>
                                <b>{{ $product['title'] }}</b><br>

                                <label for="" class="my-2 me-3">For Rent/Sale :</label>
                                <b>{{ $product['option'] }}</b><br>

                                <label for="" class="my-2 me-3">Category :</label>
                                <b>{{ $product['category_name'] }}</b><br>

                                <label for="" class="my-2 me-3">Description :</label>
                                <b>{{ $product['description'] }}</b><br>

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

        <div class="row">
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
