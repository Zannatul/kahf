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
    <div class="container mt-4">
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
        <div class="container">
            <h2>Register User</h2>
            {!! Form::open(['url'=>'register','method'=>'post']) !!}

            <div class="row">
                <!-- First Name -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        {!! Form::label('first_name', 'First Name') !!}
                        {!! Form::text('first_name', old('first_name'), ['class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : ''), 'placeholder' => 'Enter first name']) !!}
                        @if ($errors->has('first_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('first_name') }}
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Last Name -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        {!! Form::label('last_name', 'Last Name') !!}
                        {!! Form::text('last_name', old('last_name'), ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'Enter last name']) !!}
                        @if ($errors->has('last_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('last_name') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Email -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::email('email', old('email'), ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Enter email']) !!}
                        @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Phone Number -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        {!! Form::label('phone_number', 'Phone Number') !!}
                        {!! Form::number('phone_number', old('phone_number'), ['class' => 'form-control' . ($errors->has('phone_number') ? ' is-invalid' : ''), 'placeholder' => 'Enter phone number']) !!}
                        @if ($errors->has('phone_number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone_number') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Date of Birth -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        {!! Form::label('date_of_birth', 'Date of Birth') !!}
                        {!! Form::date('date_of_birth', old('date_of_birth'), ['class' => 'form-control' . ($errors->has('date_of_birth') ? ' is-invalid' : '')]) !!}
                        @if ($errors->has('date_of_birth'))
                        <div class="invalid-feedback">
                            {{ $errors->first('date_of_birth') }}
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Gender -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        {!! Form::label('gender', 'Gender') !!}
                        {!! Form::select('gender', ['male' => 'Male', 'female' => 'Female', 'other' => 'Other'], old('gender'), ['class' => 'form-control' . ($errors->has('gender') ? ' is-invalid' : ''), 'placeholder' => 'Select gender']) !!}
                        @if ($errors->has('gender'))
                        <div class="invalid-feedback">
                            {{ $errors->first('gender') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- National ID -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        {!! Form::label('national_id', 'National ID') !!}
                        {!! Form::text('national_id', old('national_id'), ['class' => 'form-control' . ($errors->has('national_id') ? ' is-invalid' : ''), 'placeholder' => 'Enter national ID']) !!}
                        @if ($errors->has('national_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('national_id') }}
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Emergency Contact Name -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        {!! Form::label('emergency_contact_name', 'Emergency Contact Name') !!}
                        {!! Form::text('emergency_contact_name', old('emergency_contact_name'), ['class' => 'form-control' . ($errors->has('emergency_contact_name') ? ' is-invalid' : ''), 'placeholder' => 'Enter emergency contact name']) !!}
                        @if ($errors->has('emergency_contact_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('emergency_contact_name') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Emergency Contact Phone -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        {!! Form::label('emergency_contact_phone', 'Emergency Contact Phone') !!}
                        {!! Form::text('emergency_contact_phone', old('emergency_contact_phone'), ['class' => 'form-control' . ($errors->has('emergency_contact_phone') ? ' is-invalid' : ''), 'placeholder' => 'Enter emergency contact phone']) !!}
                        @if ($errors->has('emergency_contact_phone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('emergency_contact_phone') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        {!! Form::label('center_id', 'Select Center') !!}
                        {!! Form::select('center_id',$centers, old('center_id'), ['class' => 'form-control' . ($errors->has('center_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Center']) !!}
                        @if ($errors->has('center_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('center_id') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Emergency Contact Phone -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        {!! Form::label('password', 'Password') !!}
                        {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'password']) !!}
                        @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        {!! Form::label('password_confirmation', 'Password Confirmation') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control' . ($errors->has('password_confirmation') ? ' is-invalid' : ''), 'placeholder' => 'password confirmation']) !!}
                        @if ($errors->has('password_confirmation'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password_confirmation') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-sm btn-success">Register</button>

            {!! Form::close() !!}
        </div>
    </div>


    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
