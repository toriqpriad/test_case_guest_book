<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="https://bootswatch.com/4/litera/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
          integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

</head>
<body>
<header>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container ">
                <a class="navbar-brand " href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                </div>
            </div>
        </nav>
    </div>
</header>
<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">


                <form class="form-signin" action="{{route('submit_guest_book')}}" method="POST">
                    @csrf
                    <div class="text-center mb-4">
                        <img class="mb-4" src="{{asset('icon.png')}}" alt="" width="72" height="72">
                        <h1 class="display-4">Welcome to MyGuestBook</h1>
                        <p>Please fill form below to submit your guest book </p>
                    </div>
                    <hr>

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
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
                    <p class="mt-3 mb-3 text-center">
                        or login as admin <a href="{{route('login')}}">click here.</a>
                    </p>
                </form>

            </div>
        </div>

    </div>
</main>
<br><br>
<hr>

<div class="container mb-5 pb-5">
    <span class="text-muted">Laravel Bootstrap - Test Case @toriqpriad - {{date('Y-m-d H:i:s')}}</span>
</div>

</body>

</html>
