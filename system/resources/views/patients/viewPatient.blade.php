@extends('layouts.backend')
<link href="{{ url('assets/css/patientProfile.css') }}" rel="stylesheet">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
        <h1> Patients </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=" ">Patients</a></li>
                <li class="breadcrumb-item active">Patient Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="main-body">

              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card origami">
                    <div class="origami-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{ url('assets/img/person-circle.svg') }}" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3 pb-2">
                          <h4>{{ $patient->first_name }} {{ $patient->last_name }}</h4>
                          <p class="text-secondary mb-1">{{ $patient->upi }}</p>
                          <p class="text-muted font-size-sm">{{ $patient->village }}, {{ $patient->subCounty }}, {{ $patient->county }}, {{ $patient->country }}</p>
                          <button class="btn btn-primary" onclick="window.location.href='{{ route('referrals.createreferal', $patient) }}'">Refer Patient</button>
                          {{-- <button class="btn btn-outline-primary" onclick="window.location.href='{{ route('referrals.createreferal', $patient) }}'">Refer Patient</button> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card origami">
                    <div class="origami-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <h4>Referal History</h4>
                            <div class="mt-3 pb-2">
                                <table class="table table-bordered table-striped wide">
                                    <thead>
                                        <tr>
                                            <th>Referal ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Null</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="card origami mb-3">
                    <div class="origami-body">
                        <h5 class="pb-1 font-weight-bold align-items-center text-center">Patient Details</h5>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $patient->first_name }} {{ $patient->last_name }}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">ID No</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $patient->idNo }}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Contact</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $patient->telephone }}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Age</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ \Carbon\Carbon::parse($patient->dob)->age }}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $patient->address }}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Gender</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $patient->gender }}
                        </div>
                      </div>
                      {{-- <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Gender</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $patient->gender }}
                        </div>
                      </div> --}}

                    </div>
                  </div>
                  <div class="card origami mb-3">
                        <div class="origami-body">
                            <h5 class="pb-1 font-weight-bold align-items-center text-center">Next of Kin</h5>
                            <div class="row">
                                <div class="col-sm-3">
                                <h6 class="mb-0">Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $patient->kinName}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                <h6 class="mb-0">Relationship</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $patient->relationship }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                <h6 class="mb-0">Residence</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $patient->kinResidence }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                <h6 class="mb-0">Contact</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $patient->kinTelephone }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                <h6 class="mb-0">email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $patient->mail }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>

            </div>
        </div>
@endsection
