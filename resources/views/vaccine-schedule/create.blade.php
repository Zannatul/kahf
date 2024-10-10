@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Schedule Vaccine</div>
                <div class="card-body">

                    <p class="mb-1"><strong>Registration No:</strong> {{ $profile->registration_no }}</p>
                    <p class="mb-1"><strong>Vaccine Center:</strong> {{ $profile->vaccineCenter->name }}</p>
                    <p class="mb-1"><strong> NB* : </strong> You can change vaccine center untill create schedule. <a href="">Click here to change</a></p>
                    <hr>
                    {!! Form::open(['url'=>'user/store-schedule','method'=>'post']) !!}
                    <div class="form-group mt-3">
                        {!! Form::label('vaccine_name', 'Vaccine Name') !!}
                        {!! Form::select('vaccine_name', ['AstraZeneca'=>'AstraZeneca', 'Pfizer'=>'Pfizer', 'Moderna'=>'Moderna'], old('vaccine_name'), ['class' => 'form-control', 'placeholder' => 'Select Vaccine']) !!}
                        @error('vaccine_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        {!! Form::label('scheduled_date', 'Scheduled Date') !!}
                        {!! Form::date('scheduled_date', old('scheduled_date'), ['class' => 'form-control','id'=>'datePicker']) !!}
                        @error('scheduled_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                        {!! Form::submit('Schedule Vaccine', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('custom-scripts')

<script>
    const datePicker = document.getElementById('datePicker');
    datePicker.addEventListener('change', function() {
        console.log('siam');
        const selectedDate = new Date(this.value);
        const day = selectedDate.getUTCDay();
        // Check if the selected day is Friday (5) or Saturday (6)
        if (day === 5 || day === 6) {
            alert('Weekends are not allowed!');
            this.value = '';
        }
    });

</script>
@endpush
