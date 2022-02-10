@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mt-4 mb-4">
                    <h5 class="header">Detail Data Guest Book</h5>
                </div>
                <form method="POST" action="{{ route('guest-book.update',$guest_book->id) }}">
                    <input type="hidden" name="_method" value="PUT">
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
                                           value="{{ $guest_book->firstname }}"
                                           placeholder="First Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Last Name</label>
                                    <input type="text" name="lastname" class="form-control" id="lastname" required
                                           value="{{ $guest_book->lastname }}"
                                           placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Organization</label>
                                    <input type="text" name="organization" class="form-control" id="organization"
                                           value="{{ $guest_book->organization }}"
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
                                            <?php
                                            $selected_prov = '';
                                            if ($key == $guest_book->province_id) {
                                                $selected_prov = 'selected';
                                            }
                                            ?>
                                            <option {{$selected_prov}} value="{{$key}}">{{$val}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputCity">City</label>
                                    <select id="city_id" class="form-control" name="city_id" required>
                                        <option value="" selected>Choose...</option>
                                        @foreach($cities as $key1 => $val1)
                                            <?php
                                            $selected_city = '';
                                            if ($key1 == $guest_book->city_id) {
                                                $selected_city = 'selected';
                                            }
                                            ?>
                                            <option {{$selected_city}} value="{{$key1}}">{{$val1}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input type="text" name="address" class="form-control" id="address"
                                       placeholder="Full Addres" required value="{{$guest_book->address}}">
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
