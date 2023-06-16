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
                <li class="breadcrumb-item"><a href="{{ route('referrals.addReferral') }}"> View </a></li>
                <li class="breadcrumb-item active">Referrals</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->



    <section class='referral'>
        <form id="referralForm" action="{{ route('referral.destroy', $referral->id) }}" method="POST">
            @csrf
            <div class="grid-by-ace">
                <div class="grid-by-ace">
                    <div class="card resize">
                        <fieldset class="grid-1-1">
                            <legend>Patient Details</legend>

                            <div class="pb-2">
                                <label for="clientName">Full Name</label> <br>
                                <input type='text' name='clientName' placeholder="Patient's Full Name" readonly value="{{ $patient->first_name }} {{ $patient->last_name }}"> <br>
                            </div>

                            <div class="pb-2">
                                <label for="clientID">Identification Number</label> <br>
                                <input type='text' name='clientID' placeholder='Identification Number' readonly value="{{ $patient->idNo }}" > <br>
                            </div>

                            <div class="pb-2">
                                <label for="clientAge">Age</label> <br>
                                <input type='number' name='clientAge' readonly value="{{ \Carbon\Carbon::parse($patient->dob)->age }}" placeholder='Age' > <br>
                            </div>

                            <div class="pb-2">
                                <label for="clientUPI">UPI Number</label> <br>
                                <input type='text' name='clientUPI' placeholder='Unique Personal Identification Number' readonly value="{{ $patient->upi }}" > <br>
                            </div>

                            <div class="pb-2">
                                <label for="clientBirthCert">Birth Certificate Number</label> <br>
                                <input type='text' name='clientBirthCert' placeholder='Birth Certificate Number' readonly> <br>
                            </div>

                            <div class="pb-2">
                                <label for="clientTelephone">Telephone Number</label> <br>
                                <input type='text' name='clientTelephone' placeholder='Telephone Number' readonly value="{{ $patient->telephone }}" > <br>
                            </div>

                            <div class="pb-2">
                                <label for="clientCounty">County</label> <br>
                                <input type='text' name='clientCounty' placeholder='County' readonly value="{{ $patient->countyOfBirth }}" > <br>
                            </div>


                            <div class="pb-2">
                                <label for="clientSubCounty">Subcounty</label> <br>
                                <input type='text' name='clientSubCounty' placeholder='Subcounty' readonly value="{{ $patient->subCounty }}" > <br>
                            </div>


                            <div class="pb-2">
                                <label for="clientConstituency">Constituency</label> <br>
                                <input type='text' name='clientConstituency' placeholder='Constituency' readonly value="{{ $patient->village }}" > <br>
                            </div>


                            <div class="pb-2">
                                <label for="clientWard">Ward</label> <br>
                                <input type='text' name='clientWard' placeholder='Ward' readonly value="{{ $patient->address }}" > <br>
                            </div>


                        </fieldset>
                    </div>

                    <div class="grid-1-2">
                        <div class="card resize">
                            <fieldset class="">
                                <legend>Next of Kin Details</legend>


                                <div class="pb-2">
                                    <label for="kinName">Full Name</label> <br>
                                    <input type='text' name='kinName' placeholder="Kin's Full Name" readonly value="{{ $patient->kinName }}" > <br>
                                </div>


                                <div class="pb-2">
                                    <label for="kinRelationship">Relationship to Patient</label> <br>
                                    <input name="kinRelationship" id="" readonly value="{{ $patient->relationship }}" > <br>
                                </div>

                                <div class="pb-2">
                                    <label for="kinTelephone">Telephone Number</label> <br>
                                    <input type='text' name='kinTelephone' placeholder='Telephone Number' readonly value="{{ $patient->kinTelephone }}" > <br>
                                </div>


                            </fieldset>
                        </div>

                        <div class="card resize">
                            <fieldset class="">
                                <legend>Referral Details</legend>

                                <div class="pb-2">
                                    <label for="referringOfficer">Referring Officer</label> <br>
                                    <input type="text" readonly value="{{ $referral->referringOfficer }}"> <br>
                                </div>

                                <div class="pb-2">
                                    <label for="historyInvestigation">History/Investigation</label> <br>
                                    <input type="text" readonly value="{{ $referral->historyInvestigation }}">
                                </div>

                                <div class="pb-2">
                                    <label for="diagnosis">Diagnosis</label> <br>
                                    <input type="text" readonly value="{{ $referral->diagnosis }}">
                                </div>


                                <div class="required">
                                    <label for="reasonReferral">Reason for Referral</label> <br>
                                    <input type="text" readonly value="{{ $referral->reasonReferral }}">
                                </div>

                                <div class="pb-2">
                                    <label for="formFileMultiple">Attachments</label> <br>
                                    <input type="text" readonly value="{{ $referral->attachments }}"> <br>
                                </div>

                                <div class="pb-2">
                                    <label for="additionalNotes">Additional Notes</label> <br>
                                    <input type="text" readonly value="{{ $referral->additionalNotes }}"> <br>
                                </div>


                            </fieldset>
                        </div>
                    </div>




            <div class="resized">
                <fieldset class="grid-by-ace card">
                    <div class="grid-1-1" style="margin-right: 6vw;">
                        <legend>Service Details</legend>

                        <div class="pb-2">
                            <label for="priorityLevel">Priority Level</label> <br>
                            <input type="text" readonly value="{{ $referral->priorityLevel }}">
                        </div>


                        <div class="pb-2">
                            <label for="serviceCategory">Service Category</label> <br>
                            <input type="text" readonly value="{{ $referral->serviceCategory }}">
                        </div>


                        <div class="pb-2">
                            <label for="service">Service</label> <br>
                            <input type="text" readonly value="{{ $referral->service }}">
                        </div>


                        <div class="pb-2">
                            <label for="facility">Facility</label> <br>
                            <input type="text" readonly value="{{ $referral->facilityReffered->Officialname }}">
                        </div>
                    </div>


                    <div class="grid-1-2" style="margin-top: 40px;">
                        <div class="pb-2">
                            <label for="distance">Approximate Distance</label> <br>
                            <input type="text" id="distance" name='distance' placeholder='Approximate distance' readonly> <br>
                        </div>

                        <div class="pb-2">
                            <label for="serviceNotes">Additional Notes</label> <br>
                            <textarea id="serviceNotes" name="serviceNotes" cols="30" rows="10" placeholder="Additional Medical Notes..." readonly >{{ $referral->additionalNotes }}</textarea>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>

    <div class="mt-3 pb-2">

        <!-- Button trigger modal -->
        
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#34Modal">
            Cancel Referral
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="34Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Warning</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                This action is irreversible, once done the referal data is lost. do you still wish to calcel the referal?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Exit</button>
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Proceed</button>
                </div>
            </div>
            </div>
        </div>

        <a class="btn btn-primary" href="{{ route('referral.outgoing') }}">Exit Referral</a>

        
    </div>

</form>
</section>






@endsection
