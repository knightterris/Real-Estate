@extends('admin.home')

@section('title', 'Rent List Page')
@section('content')
    <div class="main-content">


        <div class="row mt-5">
            @foreach ($rentList as $item)
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
        </div>
    </div>
@endsection
