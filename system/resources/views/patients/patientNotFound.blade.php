@extends('layouts.backend')
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1> Patients </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" ">Patients</a></li>
                    <li class="breadcrumb-item active">Search Error</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="container card input-group mx-auto d-flex p-4 pb-5 justify-content-center" style="width:450px;top:5rem;"">
            <div class="mx-auto">
                <h4 style="color: red">Patient not Found</h4>
            </div>

            <div class="mx-auto pt-3">
                <p>The ID entered is not in our system or is not entered correctly. Please <a href="{{ route('patients.searchPatients') }}">Try again.</a></p>
            </div>

            <div class="mx-auto pt-3">
                <p>If the Patient with the entered is not registered please register the patient first.</p>
            </div>

            <div class="pt-2 mx-auto">
                <button class="btn btn-primary" onclick="window.location.href='{{ route('patients.addPatient') }}'">Register patient</button>
            </div>
        </div>

    </main>
@endsection
    