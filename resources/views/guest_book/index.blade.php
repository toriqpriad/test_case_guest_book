@extends('layouts.app')
@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <div class="container">
        <div class="row justify-content-center">
            @if (session('success'))
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-circle-check mr-1"></i> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            <div class="col-md-12 mt-4">
                <div class="row">
                    <div class="col-6">
                        <h5 class="header">Data Guest Book</h5>
                    </div>

                    <div class="col-6">
                        <a href="{{route('guest-book.create')}}" class="btn btn-outline-primary float-right"><i
                                class="fas fa-plus-circle mr-2"></i>Add Guest Book</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
            <div class="col-md-12">
                <table class="table table-hover table-sm table-bordered" id="guest-book-table">
                    <thead>
                    <tr class="bg-light">
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Organization</th>
                        <th scope="col">Address</th>
                        <th scope="col">Province</th>
                        <th scope="col">City</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($guest_books as $g)
                        <tr>
                            <td>{{ $loop->index + 1}}</td>
                            <td>{{$g->firstname}}</td>
                            <td>{{$g->lastname}}</td>
                            <td>{{$g->organization}}</td>
                            <td>{{$g->address}}</td>
                            <td>{{$g->prov_name}}</td>
                            <td>{{$g->city_name}}</td>
                            <td>{{$g->updated_at}}</td>
                            <td>
                                <form action="{{ route('guest-book.destroy', $g->id) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    @csrf
                                    <div class="btn-group">
                                        <a href="{{route("guest-book.show",$g->id)}}"
                                           class="btn btn-warning btn-sm btn-">DETAIL
                                            <i class="fas fa-external-link ml-1"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm">DELETE
                                            <i class="fas fa-trash ml-1"></i></button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#guest-book-table').DataTable();
        });
    </script>
@endsection
