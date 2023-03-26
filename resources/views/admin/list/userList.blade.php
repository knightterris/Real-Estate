@extends('admin.home')

@section('title', 'User List Page')
@section('content')
    <div class="main-content">

        <div class="row my-3">


            <div class="col-4 offset-8">
                <form action="{{ route('admin#userListPage') }}" method="get">
                    @csrf
                    <div class=" d-flex">
                        <input type="text" name="key" class="form-control rounded" placeholder="Search category"
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

                    @if (count($userList) != 0)
                        <th></th>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th></th>
                    @else
                        <h2 class="text-danger text-center mt-5 p-5">There is no user!!!</h2>
                    @endif


                </thead>

                <tbody>
                    @if (count($userList) != 0)
                        @foreach ($userList as $item)
                            <tr class="tr-shadow">
                                <td></td>
                                <td class="">{{ $item->id }}</td>
                                <td class="">
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

                                <td class=" col-2 ">
                                    <div class="table-data-feature">
                                        <a href="{{ route('admin#accountDeatil', $item->id) }}" class="mr-2">
                                            <button class="item" data-toggle="tooltip" data-placement="top"
                                                title="Check Details">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('admin#deleteUser', $item->id) }}">
                                            <button class="item" data-toggle="tooltip" data-placement="top"
                                                title="Delete User">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </a>

                                    </div>
                                </td>
                                <td></td>

                            </tr>
                            <tr class="spacer"></tr>
                        @endforeach
                    @else
                    @endif

                </tbody>
            </table>
            <div class="mt-3">
                {{ $userList->links() }}
            </div>
        </div>
    </div>
@endsection
