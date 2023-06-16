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
                                        <input type='text' class="form-control" name='clientName' placeholder="Patient's Full Name" value="{{ $patient->first_name }} {{ $patient->last_name }}"> 
                                    </div>

                                    <div class=" pb-1">
                                        <label for="clientID">Identification Number</label> 
                                        <input type='text' class="form-control" name='clientID' placeholder='Identification Number' value="{{ $patient->idNo }}" > 
                                    </div>

                                    <div class=" pb-1">
                                        <label for="clientAge">Age</label> 
                                        <input type='number' class="form-control" name='clientAge' value="{{ \Carbon\Carbon::parse($patient->dob)->age }}" placeholder='Age' > 
                                    </div>

                                    <div class=" pb-1">
                                        <label for="clientUPI">UPI Number</label> 
                                        <input type='text' class="form-control" name='clientUPI' placeholder='Unique Personal Identification Number' value="{{ $patient->upi }}" > 
                                    </div>

                                    <div class=" pb-1">
                                        <label for="clientBirthCert">Birth Certificate Number</label> 
                                        <input type='text' class="form-control" name='clientBirthCert' placeholder='Birth Certificate Number'> 
                                    </div>

                                    <div class=" pb-1">
                                        <label for="clientTelephone">Telephone Number</label> 
                                        <input type='text' class="form-control" name='clientTelephone' placeholder='Telephone Number' value="{{ $patient->telephone }}" > 
                                    </div>

                                    <div class=" pb-1">
                                        <label for="clientCounty">County</label> 
                                        <input type='text' class="form-control" name='clientCounty' placeholder='County' value="{{ $patient->countyOfBirth }}" > 
                                    </div>


                                    <div class=" pb-1">
                                        <label for="clientSubCounty">Subcounty</label> 
                                        <input type='text' class="form-control" name='clientSubCounty' placeholder='Subcounty' value="{{ $patient->subCounty }}" > 
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
                                        <input type='text' class="form-control" name='kinName' placeholder="Kin's Full Name"" value="{{ $patient->kinName }}" > 
                                    </div>


                                    <div class=" pb-1">
                                        <label for="kinRelationship">Relationship to Patient</label> 
                                        <input class="form-control" name="kinRelationship" id="" value="{{ $patient->relationship }}" > 
                                    </div>

                                    <div class=" pb-1">
                                        <label for="kinTelephone">Telephone Number</label> 
                                        <input class="form-control" type='text' name='kinTelephone' placeholder='Telephone Number' value="{{ $patient->kinTelephone }}" > 
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
                                        <input type='text' class="form-control" name='referringOfficer' id='referringOfficer' placeholder="Referring Officer's Name" value="{{ Auth::user()->name }}" readonly> 
                                    </div>

                                    <div class=" pb-1">
                                        <label for="historyInvestigation">History/Investigation</label> 
                                        <select id="historyInvestigation" name="historyInvestigation" class="form-control" required>
                                            <!-- Place all the options here initially -->
                                            @foreach($diagnosis as $reason)
                                                <option value="{{ $reason->id }}">{{ $reason->{'from concept name'} }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class=" pb-1">
                                        <label for="diagnosis">Diagnosis</label> 
                                        <select id="diagnosis" name="diagnosis" class="form-control" required>
                                            <!-- Populate diagnosis options dynamically using coded concepts -->
                                            @foreach($diagnosis as $reason)
                                                <option value="{{ $reason->id }}">{{ $reason->{'from concept name'} }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class=" pb-1">
                                        <label for="reasonReferral">Reason for Referral</label> 
                                        <select id="reasonReferral" name="reasonReferral" class="form-control" required>
                                            <!-- Populate diagnosis options dynamically using coded concepts -->
                                            @foreach($diagnosis as $reason)
                                                <option value="{{ $reason->id }}">{{ $reason->{'from concept name'} }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class=" pb-1">
                                        <label for="formFileMultiple">Attachments</label> 
                                        <input type="file" class="form-control" id="formFileMultiple" multiple placeholder='File Attachments'> 
                                    </div>

                                    <div class=" pb-1">
                                        <label for="additionalNotes">Additional Notes</label> 
                                        <textarea cols="30" rows="10" class="form-control" id="additionalNotes" name="additionalNotes" style="height: 100px;" placeholder='Additional Medical Notes' required></textarea>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="card">
                                <fieldset class="">
                                    <div class="p-4">
                                        <legend>Service Details</legend>
                
                                        <div class=" pb-1">
                                            <label for="priorityLevel">Priority Level</label> 
                                            <select id="priorityLevel" name="priorityLevel" class="form-control">
                                                <option value="">--- Select Priority Level ---</option>
                                                <option value="stat">Emergency</option>
                                                <option value="asap">Critical</option>
                                                <option value="urgent">Urgent</option>
                                                <option value="routine">Routine</option>
                                            </select>
                                        </div>
                
                
                                        <div class=" pb-1">
                                            <label for="serviceCategory">Service Category</label> 
                                            <select id="serviceCategory" name="serviceCategory" class="form-control">
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
                
                
                                        <div class=" pb-1">
                                            <label for="service">Service</label> 
                                            <select id="service" name="service" class="form-control">
                                                <option value="">--- Select Service ---</option>
                                                <!-- Populate service options dynamically based on selected service category -->
                                                <option value="service1">Echocardiography</option>
                                                <option value="service2">Angiography</option>
                                                <option value="service3">Cardiac catheterization</option>
                                                <option value="service4">Electrocardiogram (ECG)</option>
                                                <option value="service5">Stress test</option>
                                            </select>
                                        </div>
                
                
                                        <div class="pb-1">
                                            <label for="facility">Facility</label> 
                                            <select id="facility" name="facility" class="form-control">
                                                <option selected disabled>--- Select Medical Facility ---</option>
                                                @foreach($facilities as $facility)
                                                    <option value="{{ $facility->Code }}">{{$facility->Code}} - {{ $facility->Officialname }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="pb-1">
                                            <label for="distance">Approximate Distance</label> 
                                            <input type="text" class="form-control" id="distance" name='distance' placeholder='Approximate distance' readonly> 
                                        </div>
                        
                                        <div class="pb-1">
                                            <label for="serviceNotes">Additional Notes</label> 
                                            <textarea class="form-control" id="serviceNotes" name="serviceNotes" cols="30" rows="10" style="height: 100px;" placeholder="Additional Medical Notes..."></textarea>
                                        </div>     
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>




            
        </div>
    </div>

    <div class="p-4">
        <button class="btn btn-primary">Submit Request</button>
    </div>
</form>
</section>






@endsection
        <script>
            $(document).ready(function() {
            $('#facility').select2();
            });
        </script>
