@extends('admin.home')

@section('title', 'Admin List Page')
@section('content')
    <div class="main-content">


        <a href="{{ route('admin#createAdminPage') }}" class="offset-10 my-3 ">

            <button class="btn btn-dark ">Create Admin</button>

        </a>

        @if (session('createSuccess'))
            <div class="col-5 offset-7">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('createSuccess') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

        <h3 class="ml-2 my-3">Admin List</h3>
        <div class="row my-3">


            <div class="col-4 offset-8">
                <form action="{{ route('admin#adminListPage') }}" method="get">
                    @csrf
                    <div class=" d-flex">
                        <input type="text" name="key" class="form-control rounded" placeholder="Search admin"
                            value="{{ request('key') }}">
                        <button type="submit" class="btn btn-outline-dark rounded shadow-sm">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>

                    @if (count($adminList) != 0)
                        <th></th>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th></th>
                    @else
                        <h2 class="text-danger text-center mt-5 p-5">There is no such key!!!</h2>
                    @endif


                </thead>

                @if (session('deleteSuccess'))
                    <div class="col-4 offset-8">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('deleteSuccess') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif

                @if (session('updateSuccess'))
                    <div class="col-4 offset-8">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('updateSuccess') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif

                <tbody>
                    @if (count($adminList) != 0)
                        @foreach ($adminList as $item)
                            <tr class="tr-shadow">
                                <td></td>
                                <td class="">{{ $item->id }}</td>
                                <td>
                                    {{-- <img src="{{ asset('storage/.'$item->image) }}" style="width:100px; height:100px;" > --}}
                                    {{-- <img src="{{ asset('storage/' . $item->image) }}" class="rounded shadow"
                                        style="width:200px; height:200px;"> --}}
                                    @if ($item->image == null)
                                        <img src="{{ asset('images/default.png') }}" class="rounded shadow"
                                            style="width:200px; height:200px;">
                                    @else
                                        <img src="{{ asset('storage/' . $item->image) }}" class="rounded shadow"
                                            style="width:200px; height:200px;">
                                    @endif
                                </td>
                                <td class="">{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->gender }}</td>

                                <td class="">
                                    <div class="table-data-feature">


                                        @if (Auth::user()->id == $item->id)
                                        @else
                                            <a href="">
                                                <button class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                                                    title="Delete">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </a>
                                        @endif

                                    </div>
                                </td>
                            </tr>
                            <tr class="spacer"></tr>
                        @endforeach
                    @else
                    @endif

                </tbody>
            </table>
            <div class="mt-3">
                {{ $adminList->links() }}
            </div>
        </div>
    </div>
@endsection
