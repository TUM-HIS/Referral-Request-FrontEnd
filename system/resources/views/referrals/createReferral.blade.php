@extends('layouts.backend')

//adding select cdn for column selection
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.7.0.slim.min.js"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>



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
                <li class="breadcrumb-item"><a href="{{ route('referrals.addReferral') }}"> Add </a></li>
                <li class="breadcrumb-item active">Referrals</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->



    <section class='referral'>
        <form id="referralForm" action="{{ route('referrals.submitReferral') }}" method="POST">
            @csrf
            <div class="grid-by-ace">
                <div class="grid-by-ace">
                    <div class="card resize">
                        <fieldset class="grid-1-1">
                            <legend>Patient Details</legend>

                            <div class="pb-2">
                                <label for="clientName">Full Name</label> <br>
                                <input type='text' name='clientName' placeholder="Patient's Full Name" value="{{ $patient->first_name }} {{ $patient->last_name }}"> <br>
                            </div>

                            <div class="pb-2">
                                <label for="clientID">Identification Number</label> <br>
                                <input type='text' name='clientID' placeholder='Identification Number' value="{{ $patient->idNo }}" > <br>
                            </div>

                            <div class="pb-2">
                                <label for="clientAge">Age</label> <br>
                                <input type='number' name='clientAge' value="{{ \Carbon\Carbon::parse($patient->dob)->age }}" placeholder='Age' > <br>
                            </div>

                            <div class="pb-2">
                                <label for="clientUPI">UPI Number</label> <br>
                                <input type='text' name='clientUPI' placeholder='Unique Personal Identification Number' value="{{ $patient->upi }}" > <br>
                            </div>

                            <div class="pb-2">
                                <label for="clientBirthCert">Birth Certificate Number</label> <br>
                                <input type='text' name='clientBirthCert' placeholder='Birth Certificate Number'> <br>
                            </div>

                            <div class="pb-2">
                                <label for="clientTelephone">Telephone Number</label> <br>
                                <input type='text' name='clientTelephone' placeholder='Telephone Number' value="{{ $patient->telephone }}" > <br>
                            </div>

                            <div class="pb-2">
                                <label for="clientCounty">County</label> <br>
                                <input type='text' name='clientCounty' placeholder='County' value="{{ $patient->countyOfBirth }}" > <br>
                            </div>


                            <div class="pb-2">
                                <label for="clientSubCounty">Subcounty</label> <br>
                                <input type='text' name='clientSubCounty' placeholder='Subcounty' value="{{ $patient->subCounty }}" > <br>
                            </div>


                            <div class="pb-2">
                                <label for="clientConstituency">Constituency</label> <br>
                                <input type='text' name='clientConstituency' placeholder='Constituency' value="{{ $patient->village }}" > <br>
                            </div>


                            <div class="pb-2">
                                <label for="clientWard">Ward</label> <br>
                                <input type='text' name='clientWard' placeholder='Ward' value="{{ $patient->address }}" > <br>
                            </div>


                        </fieldset>
                    </div>

                    <div class="grid-1-2">
                        <div class="card resize">
                            <fieldset class="">
                                <legend>Next of Kin Details</legend>


                                <div class="pb-2">
                                    <label for="kinName">Full Name</label> <br>
                                    <input type='text' name='kinName' placeholder="Kin's Full Name"" value="{{ $patient->kinName }}" > <br>
                                </div>


                                <div class="pb-2">
                                    <label for="kinRelationship">Relationship to Patient</label> <br>
                                    <input name="kinRelationship" id="" value="{{ $patient->relationship }}" > <br>
                                </div>

                                <div class="pb-2">
                                    <label for="kinTelephone">Telephone Number</label> <br>
                                    <input type='text' name='kinTelephone' placeholder='Telephone Number' value="{{ $patient->kinTelephone }}" > <br>
                                </div>


                            </fieldset>
                        </div>

                        <div class="card resize">
                            <fieldset class="">
                                <legend>Referral Details</legend>

                                <div class="pb-2">
                                    <label for="referringOfficer">Referring Officer</label> <br>
                                    <input type='text' name='referringOfficer' id='referringOfficer' placeholder="Referring Officer's Name" value="{{ Auth::user()->name }}" readonly> <br>
                                </div>

                                <div class="pb-2">
                                    <label for="historyInvestigation">History/Investigation</label> <br>
                                    <select type="text" id="historyInvestigation" name="historyInvestigation" required>
                                        <!-- Place all the options here initially -->
                                        @foreach($diagnosis as $reason)
                                            <option value="{{ $reason->id }}">{{ $reason->{'from concept name'} }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="pb-2">
                                    <label for="diagnosis">Diagnosis</label> <br>
                                    <select class="select" id="diagnosis" name="diagnosis" required>
                                        <!-- Populate diagnosis options dynamically using coded concepts -->
                                        @foreach($diagnosis as $reason)
                                            <option value="{{ $reason->id }}">{{ $reason->{'from concept name'} }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="pb-2">
                                    <label for="reasonReferral">Reason for Referral</label> <br>
                                    <select id="reasonReferral" name="reasonReferral"  required>
                                        <!-- Populate diagnosis options dynamically using coded concepts -->
                                        @foreach($diagnosis as $reason)
                                            <option value="{{ $reason->id }}">{{ $reason->{'from concept name'} }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>

                                <div class="pb-2">
                                    <label for="formFileMultiple">Attachments</label> <br>
                                    <input type="file" id="formFileMultiple" multiple placeholder='File Attachments'> <br>
                                </div>

                                <div class="pb-2">
                                    <label for="additionalNotes">Additional Notes</label> <br>
                                    <input type='text' id="additionalNotes" name="additionalNotes" placeholder='Additional Medical Notes' required> <br>
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
                            <select id="priorityLevel" name="priorityLevel">
                                <option value="">--- Select Priority Level ---</option>
                                <option value="stat">Emergency</option>
                                <option value="asap">Critical</option>
                                <option value="urgent">Urgent</option>
                                <option value="routine">Routine</option>
                            </select>
                        </div>


                        <div class="pb-2">
                            <label for="serviceCategory">Service Category</label> <br>
                            <select id="serviceCategory" name="serviceCategory">
                                <option value="">--- Select Service Category ---</option>
                                <!-- Populate service category options dynamically from KMHFL API -->
                                <option value="category1">Cardiology</option>
                                <option value="category2">Dermatology</option>
                                <option value="category3">Gastroenterology</option>
                                <option value="category4">Hematology</option>
                                <option value="category5">Neurology</option>
                                <option value="category6">Obstetrics and Gynecology</option>
                                <option value="category7">Orthopedics</option>
                                <option value="category8">Pediatrics</option>
                                <option value="category9">Psychiatry</option>
                                <option value="category10">Pulmonology</option>
                                <option value="category11">Radiology</option>
                                <option value="category12">Rehabilitation</option>
                                <option value="category13">Urology</option>
                                <option value="category14">Oncology</option>
                            </select>
                        </div>


                        <div class="pb-2">
                            <label for="service">Service</label> <br>
                            <select id="service" name="service">
                                <option value="">--- Select Service ---</option>
                                <!-- Populate service options dynamically based on selected service category -->
                                <option value="service1">Echocardiography</option>
                                <option value="service2">Angiography</option>
                                <option value="service3">Cardiac catheterization</option>
                                <option value="service4">Electrocardiogram (ECG)</option>
                                <option value="service5">Stress test</option>
                            </select>
                        </div>


                        <div class="pb-2">
                            <label for="facility">Facility</label> <br>
                            <select id="facility" name="facility">
                                <option selected disabled>--- Select Medical Facility ---</option>
                                @foreach($facilities as $facility)
                                    <option value="{{ $facility->Code }}">{{$facility->Code}} - {{ $facility->Officialname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="grid-1-2" style="margin-top: 40px;">
                        <div class="pb-2">
                            <label for="distance">Approximate Distance</label> <br>
                            <input type="text" id="distance" name='distance' placeholder='Approximate distance' readonly> <br>
                        </div>
        
                        <div class="pb-2">
                            <label for="serviceNotes">Additional Notes</label> <br>
                            <textarea id="serviceNotes" name="serviceNotes" cols="30" rows="10" placeholder="Additional Medical Notes..."></textarea>
                        </div>     
                    </div>
                </fieldset>
            </div>
        </div>
    </div>

    <button class="submitreqbtn">Submit Request</button>
</form>
</section>






@endsection
        <script>
            $(document).ready(function() {
            $('#facility').select2();
            });
        </script>
