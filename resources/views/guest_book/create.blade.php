@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mt-4 mb-4">
                    <h5 class="header">Add Data Guest Book</h5>
                </div>
                <form method="POST" action="{{ route('guest-book.store') }}">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            @foreach ($errors->all() as $error)
                                <span><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $error }}</span><br>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            <i class="fas fa-circle-check mr-1"></i> {{ session('success') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">First Name</label>
                                    <input type="text" name="firstname" class="form-control" id="firstname" required
                                           value="{{ old('firstname') }}"
                                           placeholder="First Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Last Name</label>
                                    <input type="text" name="lastname" class="form-control" id="lastname" required
                                           value="{{ old('lastname') }}"
                                           placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Organization</label>
                                    <input type="text" name="organization" class="form-control" id="organization"
                                           value="{{ old('organization') }}"
                                           required
                                           placeholder="Organization">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputState">Province</label>
                                    <select id="province_id" class="form-control" name="province_id" required>
                                        <option selected>Choose...</option>
                                        @foreach($provinces as $key => $val)
                                            <option value="{{$key}}">{{$val}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputCity">City</label>
                                    <select id="city_id" class="form-control" name="city_id" required>
                                        <option value="" selected>Choose...</option>
                                        @foreach($cities as $key1 => $val1)
                                            <option value="{{$key1}}">{{$val1}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input type="text" name="address" class="form-control" id="address"
                                       placeholder="Full Addres" required>
                            </div>

                        </div>
                        <div class="card-footer">
                            <a href="{{ route('guest-book.index') }}" class="btn btn-outline-primary"><i
                                    class="fas fa-chevron-left mr-1"></i> Back</a>
                            <button type="submit" class="btn btn-success float-right">Save<i
                                    class="fas fa-chevron-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('js/module/guest-book/create.js?'.time())}}"></script>
@endsection
