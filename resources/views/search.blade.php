<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search and Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <!-- Search Bar -->
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div style="margin-bottom:20px"> <a href="{{url('/')}}" class="btn btn-sm btn-primary">Back</a></div>
                <form class="d-flex" action="{{url('search')}}" method="get" role="search">
                    <input class="form-control me-2" name="search-params" value="{{request()->get('search-params')}}" type="search" placeholder="Search with NID" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>

        @if($searchData)
        <div class="row mt-4">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header text-center">
                        <img src="https://via.placeholder.com/150" class="rounded-circle" alt="Profile Image" width="150">
                    </div>
                    <div class="card-body text-center">
                        <h5>{{ $searchData->first_name }} {{ $searchData->last_name }}</h5>
                        <p class="mb-1"><strong>Registration No:</strong> {{ $searchData->registration_no }}</p>
                        <p class="mb-1"><strong>Email:</strong> {{ $searchData->email }}</p>
                        <p class="mb-1"><strong>Phone Number:</strong> {{ $searchData->phone_number }}</p>
                        <p class="mb-1"><strong>Date of Birth:</strong> {{ $searchData->date_of_birth }}</p>
                        <p class="mb-1"><strong>Gender:</strong> {{ ucfirst($searchData->gender) }}</p>
                        <p class="mb-1"><strong>Address:</strong> {{ $searchData->address }}</p>
                        <p class="mb-1">
                            <strong>Vaccination Status : </strong> {!! $searchData->vaccination_status !!}
                        </p>
                        @if($searchData->schedule)
                        <p class="mb-1"><strong>Schedule Date:</strong> {{ date('d M Y', strtotime($searchData->schedule->scheduled_date)) }}</p>
                        <p class="mb-1"><strong>Schedule Time:</strong> {{ date('h:i a ', strtotime($searchData->schedule->scheduled_time)) }}</p>
                        @endif
                        <hr>
                        <p class="mb-1"><strong>Vaccine Center:</strong> {{ $searchData->vaccineCenter->name }}</p>
                        <p class="mb-1"><strong> Center Type:</strong> {{ $searchData->vaccineCenter->center_type }}</p>
                        <p class="mb-1"><strong> Daily Vaccination Capacity:</strong> {{ $searchData->vaccineCenter->capacity }}</p>
                        <p class="mb-1"><strong> Center Address:</strong> {{ $searchData->vaccineCenter->location }}</p>
                        <p class="mb-1"><strong> Contact No:</strong> {{ $searchData->vaccineCenter->contact_number }}</p>
                    </div>
                </div>
            </div>
        </div>
        @elseif(request()->get('search-params'))
        <div class="row mt-4">
            <div class="col-md-8 offset-md-2">
                <p><strong>NID : </strong> {{request()->get('search-params')}}</p>
                <p><strong>Status : </strong> <code class="danger-code-text">Not Registered</code></p>
                <p><strong>Registration Link : </strong> <a href="{{url('register')}}">Register Here</a></p>
            </div>
        </div>
        @endif


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
