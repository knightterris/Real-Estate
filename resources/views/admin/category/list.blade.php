@extends('admin.home')

@section('title', 'Category List Page')
@section('content')
    <div class="main-content">


        <a href="{{ route('admin#createCategoryPage') }}" class="offset-10 my-3 ">

            <button class="btn btn-dark ">Create Category</button>

        </a>

        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>

                    @if (count($createdCategory) != 0)
                        <th>no.</th>
                        <th>category name</th>
                        <th>description</th>

                        <th><a href="{{ route('admin#deleteAllcategory') }}"><button class="btn btn-danger"
                                    title="Delete All"><i class="fa-regular fa-trash-can"></i></button></a>
                        </th>
                    @else
                        <h2 class="text-danger text-center mt-5 p-5">There is no category!!!</h2>
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
                    @if (count($createdCategory) != 0)
                        @foreach ($createdCategory as $item)
                            <tr class="tr-shadow">
                                <td class=" col-1 ">{{ $item->id }}</td>
                                <td class=" col-2">
                                    <span class="">{{ $item->name }}</span>
                                </td>
                                <td class="desc col-7">{{ $item->description }}</td>

                                <td class=" col-2 ">
                                    <div class="table-data-feature">

                                        <a href="{{ route('admin#editPage', $item->id) }}">
                                            <button class="item mx-3" data-toggle="tooltip" data-placement="top"
                                                title="Edit">
                                                <i class="zmdi zmdi-edit "></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('admin#deleteCategory', $item->id) }}">
                                            <button class="item" data-toggle="tooltip" data-placement="top"
                                                title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </a>

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
                {{ $createdCategory->links() }}
            </div>
        </div>
    </div>
@endsection
