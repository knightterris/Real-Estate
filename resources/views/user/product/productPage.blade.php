@extends('user.home.homePage')

@section('title', 'Properties Page')
@section('content')
    <div class="content">


        <div class="row my-3">


            <div class="col-4 offset-5">
                <form action="" method="get">
                    @csrf
                    <div class=" d-flex">
                        <input type="text" name="key" class="form-control rounded" placeholder="Search products"
                            value="">
                        <button type="submit" class="btn btn-outline-dark rounded shadow-sm">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <div class="ic">More Website Templates @ TemplateMonster.com - March 10, 2014!</div>
        <div class="container_12">
            <div class="grid_12 center">
                <h1>Our Products</h1>
                <section class="tt-grid-wrapper">
                    <ul class="tt-grid tt-effect-stackback tt-effect-delay">
                        <div class="row mt-3 ">
                            @if (count($product) != 0)
                                @foreach ($product as $item)
                                    <div class="col-4 my-2">
                                        <div class="card shadow">
                                            <div class="card-body p-0">
                                                <img src="{{ asset('storage/' . $item['image']) }}"
                                                    style="width: 420px; height:300px;">
                                            </div>
                                            <div class="">
                                                <h3>{{ $item['title'] }}</h3>
                                            </div>
                                            <div class="card-header">
                                                <a href="{{ route('user#detailPage', $item['id']) }}" class="">
                                                    <button class="btn btn-danger ">View</button>
                                                </a>
                                            </div>
                                        </div>


                                    </div>
                                @endforeach
                            @else
                                <h1 class="text-center">There is no product.</h2>
                            @endif
                        </div>

                        {{-- <li><a href="#"><img src="{{ asset('user/images/feat1.jpg') }}" alt="img01"></a></li>
                        <li><a href="#"><img src="{{ asset('user/images/feat2.jpg') }}" alt="img02"></a></li>
                        <li><a href="#"><img src="{{ asset('user/images/feat3.jpg') }}" alt="img03"></a></li>
                        <li><a href="#"><img src="{{ asset('user/images/feat4.jpg') }}" alt="img04"></a></li>
                        <li><a href="#"><img src="{{ asset('user/images/feat5.jpg') }}" alt="img05"></a></li>
                        <li><a href="#"><img src="{{ asset('user/images/feat6.jpg') }}" alt="img06"></a></li> --}}
                    </ul>
                    {{-- <nav>
                        <a class="tt-current"></a><a></a><a></a><a></a>
                    </nav> --}}
                </section>
                <div class="clear"></div>

            </div>
        </div>
        <div class="hor"></div>

    </div>
@endsection
