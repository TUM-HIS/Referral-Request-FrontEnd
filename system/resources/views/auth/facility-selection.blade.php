<!-- facility-selection.blade.php -->

@extends('layouts.simple')

@section('content')
<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="card mb-3">
                    <div class="card-body">
                        <form class="row g-3 needs-validation" method="post" action="{{ route('facility.select') }}">
                            @csrf
                            <div class="d-flex justify-content-center py-4">
                                <h4>Select your operating facility</h4>
                            </div>
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <select name="facility_id" class="form-label" style="width: 50vw">
                                    @foreach ($facilities as $facility)
                                    <option value="{{ $facility->id }}"> <strong>{{ $facility->Code }}</strong> | {{ $facility->Officialname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

