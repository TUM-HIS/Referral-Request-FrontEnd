@extends('layouts.backend')


@section('content')
<main id="main" class="main">

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="pagetitle">
        <h1> Referrals </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=" "> View </a></li>
                <li class="breadcrumb-item active">Referrals</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <section class='referral section'>
        <form id="referralForm" action="{{ route('referrals.submitReferral') }}" method="POST">
            @csrf
            <div class="row">
                <div class="">
                    <div class="row">
                        <div class="col-xxl-6 col-md-4">
                            <div class="card">
                                <div class="p-4">
                                    <legend>Patient Details</legend>

                                    <div class="pb-1">
                                        <label for="clientName">Full Name</label>
                                        <input type='text' class="form-control" name='clientName' placeholder="Patient's Full Name" readonly value="{{ $patient->first_name }} {{ $patient->last_name }}">
                                    </div>

                                    <div class=" pb-1">
                                        <label for="clientID">Identification Number</label>
                                        <input type='text' class="form-control" name='clientID' placeholder='Identification Number' readonly value="{{ $patient->idNo }}" >
                                    </div>

                                    <div class=" pb-1">
                                        <label for="clientAge">Age</label>
                                        <input type='number' class="form-control" name='clientAge' value="{{ \Carbon\Carbon::parse($patient->dob)->age }}" readonly placeholder='Age' >
                                    </div>

                                    <div class=" pb-1">
                                        <label for="clientUPI">UPI Number</label>
                                        <input type='text' class="form-control" name='clientUPI' placeholder='Unique Personal Identification Number' readonly value="{{ $patient->upi }}" >
                                    </div>

                                    <div class=" pb-1">
                                        <label for="clientBirthCert">Birth Certificate Number</label>
                                        <input type='text' class="form-control" name='clientBirthCert' placeholder='Birth Certificate Number'>
                                    </div>

                                    <div class=" pb-1">
                                        <label for="clientTelephone">Telephone Number</label>
                                        <input type='text' class="form-control" name='clientTelephone' placeholder='Telephone Number' readonly value="{{ $patient->telephone }}" >
                                    </div>

                                    <div class=" pb-1">
                                        <label for="clientCounty">County</label>
                                        <input type='text' class="form-control" name='clientCounty' placeholder='County' value="{{ $patient->countyOfBirth }}" readonly>
                                    </div>


                                    <div class=" pb-1">
                                        <label for="clientSubCounty">Subcounty</label>
                                        <input type='text' class="form-control" name='clientSubCounty' placeholder='Subcounty' value="{{ $patient->subCounty }}" readonly>
                                    </div>


                                    <div class=" pb-1">
                                        <label for="clientConstituency">Constituency</label>
                                        <input type='text' class="form-control" name='clientConstituency' placeholder='Constituency' value="{{ $patient->village }}" >
                                    </div>


                                    <div class=" pb-1">
                                        <label for="clientWard">Ward</label>
                                        <input type='text' class="form-control" name='clientWard' placeholder='Ward' value="{{ $patient->address }}" >
                                    </div>

                                </div>
                            </div>

                            <div class="card">
                                <div class="p-4">
                                    <legend>Next of Kin Details</legend>


                                    <div class=" pb-1">
                                        <label for="kinName">Full Name</label>
                                        <input type='text' class="form-control" name='kinName' placeholder="Kin's Full Name" value="{{ $patient->kinName }}" readonly>
                                    </div>


                                    <div class=" pb-1">
                                        <label for="kinRelationship">Relationship to Patient</label>
                                        <input class="form-control" name="kinRelationship" id="" value="{{ $patient->relationship }}" >
                                    </div>

                                    <div class=" pb-1">
                                        <label for="kinTelephone">Telephone Number</label>
                                        <input class="form-control" type='text' name='kinTelephone' placeholder='Telephone Number' value="{{ $patient->kinTelephone }}" readonly>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-6 col-md-4">


                            <div class="card">
                                <fieldset class="p-4">
                                    <legend>Referral Details</legend>

                                    <div class=" pb-1">
                                        <label for="referringOfficer">Referring Officer</label>
                                        <input type="text" class="form-control" readonly value="{{ $referral->referringOfficer }}">
                                    </div>

                                    <div class=" pb-1">
                                        <label for="historyInvestigation">History/Investigation</label>
                                        <input type="text" class="form-control" readonly value="{{ $referral->historyInvestigation }}">
                                    </div>

                                    <div class=" pb-1">
                                        <label for="diagnosis">Diagnosis</label>
                                        <input type="text" class="form-control" readonly value="{{ $referral->diagnosis }}">
                                    </div>

                                    <div class=" pb-1">
                                        <label for="reasonReferral">Reason for Referral</label>
                                        <input type="text" class="form-control" readonly value="{{ $referral->reasonReferral }}">
                                    </div>

                                    <div class=" pb-1">
                                        <label for="formFileMultiple">Attachments</label>
                                        <input type="text" class="form-control" readonly value="{{ $referral->attachments }}">
                                    </div>

                                    <div class=" pb-1">
                                        <label for="additionalNotes">Additional Notes</label>
                                        <input type="text" name="additionalNotes" class="form-control" readonly value="{{ $referral->additionalNotes }}">
                                    </div>
                                </fieldset>
                            </div>

                            <div class="card">
                                <fieldset class="">
                                    <div class="p-4">
                                        <legend>Service Details</legend>

                                        <div class=" pb-1">
                                            <label for="priorityLevel">Priority Level</label>
                                            <input type="text" class="form-control" readonly value="{{ $referral->priorityLevel }}">
                                        </div>


                                        <div class=" pb-1">
                                            <label for="serviceCategory">Service Category</label>
                                            <input type="text" class="form-control" readonly value="{{ $referral->serviceCategory }}">
                                        </div>


                                        <div class=" pb-1">
                                            <label for="service">Service</label>
                                            <input type="text" class="form-control" readonly value="{{ $referral->service }}">
                                        </div>


                                        <div class="pb-1">
                                            <label for="facility">Facility</label>
                                            <input type="text" class="form-control" readonly value="{{ $referral->facilityReffered->Officialname }}">
                                        </div>

                                        <div class="pb-1">
                                            <label for="distance">Approximate Distance</label>
                                            <input type="text" class="form-control" id="distance" name='distance' placeholder='Approximate distance' readonly>
                                        </div>

                                        <div class="pb-1">
                                            <label for="serviceNotes">Additional Notes</label>
                                            <textarea class="form-control" id="serviceNotes" name="serviceNotes" cols="30" rows="10" placeholder="Additional Medical Notes..." readonly style="height: 102px;" >{{ $referral->additionalNotes }}</textarea>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="mt-3 pb-2">

                <!-- Button trigger modal -->

                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Accept Referral
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Warning</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        Are you sure you want to accept this referral?
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Exit</button>
                        <a href="{{ route('referral.accept', $referral) }}" class="btn btn-success">Accept</a>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Button trigger modal -->

{{--                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#anotherModal">--}}
{{--                    Reject Referral--}}
{{--                </button>--}}

                <!-- Modal -->
                <div class="modal fade" id="anotherModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Warning</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        Are you sure you want to Reject this referral?
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Exit</button>
                        <a href="{{ route('referral.reject', $referral) }}"  class="btn btn-danger">Reject</a>
                        </div>
                    </div>
                    </div>
                </div>
                <a class="btn btn-primary" href="{{ route('referrals.incoming', $referral) }}">Close</a>
            </div>

        </form>
    </section>

 @endsection
