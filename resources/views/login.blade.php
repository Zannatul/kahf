<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'COVID Vaccine Registration system')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS (optional) -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <!-- Main Content -->
    <div class="container" style="margin-top : 50px">

        <div class="row justify-content-center">
            <div class="col-md-6">
                @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {!! \Session::get('success') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if (\Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {!! \Session::get('error') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <h2>Login User</h2>
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <!-- Login Form -->
                        {!! Form::open(['url' => 'login-attempt', 'method' => 'POST']) !!}

                        <!-- National ID Field -->
                        <div class="form-group">
                            {!! Form::label('national_id', 'National ID') !!}
                            {!! Form::text('national_id', old('national_id'), ['class' => 'form-control' . ($errors->has('national_id') ? ' is-invalid' : ''), 'autofocus']) !!}

                            @if ($errors->has('national_id'))
                            <span class="invalid-feedback" role="alert">
                                {{ $errors->first('national_id') }}
                            </span>
                            @endif
                        </div>

                        <!-- Password Field -->
                        <div class="form-group mt-3">
                            {!! Form::label('password', 'Password') !!}
                            {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : '')]) !!}

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                {{ $errors->first('password') }}
                            </span>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group mt-4">
                            {!! Form::submit('Login', ['class' => 'btn btn-primary btn-block']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
