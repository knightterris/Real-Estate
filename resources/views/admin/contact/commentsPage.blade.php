@extends('admin.home')

@section('title', 'Comments List Page')
@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                {{--  --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 text-center">

                            <button class="btn btn-dark text-light w-75" disabled> <i
                                    class="fa-regular fa-comments mr-3"></i>{{ $clientMessage->total() }}
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive table-responsive-data2 ">
                        <table class="table table-data2">
                            <thead>
                                @if (count($clientMessage) != 0)
                                    <tr class="">
                                        <th></th>
                                        <th class="text-center w-25 " style="font-size: 19px;">User Name</th>
                                        <th class="text-center w-25 " style="font-size: 19px;">Email</th>
                                        <th class="text-center w-25 " style="font-size: 19px;">Phone</th>
                                        <th class="text-center w-25 " style="font-size: 19px;">Message</th>
                                        <th class="">
                                            <a href="{{ route('admin#deleteAllComments') }}">
                                                <button class="btn btn-outline-dark  text-center"
                                                    title="Clear All Comments"><i
                                                        class="fa-solid fa-trash-can"></i></button>
                                            </a>
                                        </th>

                                    </tr>
                                @else
                                @endif
                            </thead>

                            <tbody id="dataList">
                                @if (count($clientMessage) != 0)
                                    @foreach ($clientMessage as $cM)
                                        <tr class="shadow-sm">
                                            <td></td>
                                            <td class="text-center" style="font-size: 19px;">{{ $cM['name'] }}</td>
                                            <td class="text-center" style="font-size: 19px;">{{ $cM['email'] }}</td>
                                            <td class="text-center" style="font-size: 19px;">{{ $cM['phone'] }}</td>
                                            <td class="text-center" style="font-size: 19px;">
                                                {{ substr($cM['message'], 0, 100) }}
                                            </td>
                                            <td class="d-flex">
                                                <a href="{{ route('admin#readComment', $cM['id']) }}">
                                                    <button class="btn btn-outline-dark mr-3" title="Read"><i
                                                            class="fa-solid fa-book-open-reader"></i></button>
                                                </a>
                                                <a href="{{ route('admin#deleteComment', $cM['id']) }}">
                                                    <button class="btn btn-outline-dark" title="Delete"><i
                                                            class="fa-solid fa-trash-can"></i></button>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    <h2 class="text-center">There is no message.</h2>
                                @endif


                            </tbody>
                        </table>

                        <div class="mt-3">
                            {{ $clientMessage->links() }}
                            {{-- {{ $pizzas->appends(request()->query())->links() }} --}}
                        </div>

                    </div>

                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
