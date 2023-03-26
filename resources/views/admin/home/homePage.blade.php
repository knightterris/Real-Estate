@extends('admin.home')

@section('title', 'List Page')
@section('content')
    <div class="main-content">
        @if (count($product) != 0)
            <div class="row">
                <div class="offset-9">
                    <a href="{{ route('admin#salePage') }}">
                        <button class="btn btn-dark">For Sale</button>
                    </a>
                    <a href="{{ route('admin#rentPage') }}">
                        <button class="btn btn-dark">For Rent</button>
                    </a>
                </div>
            </div>
        @else
        @endif

        <div class="row mt-5">
            @if (count($product) != 0)
                @foreach ($product as $item)
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body p-0">
                                <img src="{{ asset('storage/' . $item['image']) }}" style="width: 420px; height:300px;">
                            </div>
                            <div class="card-header">{{ $item['title'] }}
                                <a href="{{ route('admin#viewDetail', $item['id']) }}" class="">
                                    <button class="btn btn-danger ">View</button>
                                </a>
                            </div>
                        </div>



                    </div>
                @endforeach
            @else
                <div class="row">
                    <div class="col">
                        <h2 style="margin-left:28rem;">There is no item.</h2>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
