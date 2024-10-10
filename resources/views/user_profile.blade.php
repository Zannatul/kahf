@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>My Profile</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            @if($profile->profile_picture)
                            <img src="{{ asset('storage/' . $profile->profile_picture) }}" alt="Profile Picture" class="img-thumbnail mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                            @else
                            <img src="https://via.placeholder.com/150" alt="Profile Picture" class="img-thumbnail mb-3">
                            @endif
                        </div>

                        <div class="col-md-8">
                            <h5>{{ $profile->first_name }} {{ $profile->last_name }}</h5>
                            <p class="mb-1"><strong>Registration No:</strong> {{ $profile->registration_no }}</p>
                            <p class="mb-1"><strong>Email:</strong> {{ $profile->email }}</p>
                            <p class="mb-1"><strong>Phone Number:</strong> {{ $profile->phone_number }}</p>
                            <p class="mb-1"><strong>Date of Birth:</strong> {{ $profile->date_of_birth }}</p>
                            <p class="mb-1"><strong>Gender:</strong> {{ ucfirst($profile->gender) }}</p>
                            <p class="mb-1"><strong>Address:</strong> {{ $profile->address }}</p>
                            <p class="mb-1">
                                <strong>Vaccination Status : </strong> {!! $profile->vaccination_status !!}
                            </p>
                            @if($profile->schedule)
                            <p class="mb-1"><strong>Schedule Date:</strong> {{ date('d M Y', strtotime($profile->schedule->scheduled_date)) }}</p>
                            <p class="mb-1"><strong>Schedule Time:</strong> {{ date('h:i a ', strtotime($profile->schedule->scheduled_time)) }}</p>
                            @endif

                            <hr>
                            <p class="mb-1"><strong>Vaccine Center:</strong> {{ $profile->vaccineCenter->name }}</p>
                            <p class="mb-1"><strong> Center Type:</strong> {{ $profile->vaccineCenter->center_type }}</p>
                            <p class="mb-1"><strong> Daily Vaccination Capacity:</strong> {{ $profile->vaccineCenter->capacity }}</p>
                            <p class="mb-1"><strong> Center Address:</strong> {{ $profile->vaccineCenter->location }}</p>
                            <p class="mb-1"><strong> Contact No:</strong> {{ $profile->vaccineCenter->contact_number }}</p>



                        </div>
                    </div>

                    <div class="text-center mt-4">
                        {{-- <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-primary">Edit Profile</a>
                        <a href="{{ route('home') }}" class="btn btn-secondary">Back to Dashboard</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
