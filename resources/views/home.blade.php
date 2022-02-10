@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="jumbotron text-center">
                    <h4 class="display-5">Halo, {{ Auth::user()->name }} !</h4>
                    <p class="lead">
                        Welcome to MyGuestBook aplication
                    </p>
                    <hr class="my-4">
                    <p>Total data guest book calculated : </p>

                    <h1>
                        {{$total}}
                    </h1>
                    <br>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="{{route('guest-book.index')}}" role="button">Click Here To Manage <i class="fas fa-chevron-right ml-1"></i></a>
                    </p>
                </div>
            </div>
            <div class="col-md-8" style="display: none">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Welcome <strong>{{ Auth::user()->name }} </strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
