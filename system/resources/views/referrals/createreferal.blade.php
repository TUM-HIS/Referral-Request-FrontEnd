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
                    <fieldset class="grid-1-1">
                        <legend>Patient Details</legend>

                        <div class="">
                            <p>Full Name</p>
                            <input type='text' name='clientName' placeholder="Patient's Full Name" value="{{ $patient->first_name }} {{ $patient->last_name }}" phprequired> <br>
                        </div>

                        <div class="">
                            <p>Identification Number</p>
                            <input type='text' name='clientID' placeholder='Identification Number' value="{{ $patient->idNo }}" required> <br>
                        </div>

                        <div class="">
                            <p>Age</p>
                            <input type='number' name='clientAge' value="{{ \Carbon\Carbon::parse($patient->dob)->age }}" placeholder='Age'> <br>
                        </div>

                        <div class="">
                            <p>UPI Number</p>
                            <input type='text' name='clientUPI' placeholder='Unique Personal Identification Number' value="{{ $patient->upi }}"> <br>
                        </div>

                        <div class="">
                            <p>Birth Certificate Number</p>
                            <input type='text' name='clientBirthCert' placeholder='Birth Certificate Number'> <br>
                        </div>

                        <div class="">
                            <p>Telephone Number</p>
                            <input type='text' name='clientTelephone' placeholder='Telephone Number' value="{{ $patient->telephone }}" required> <br>
                        </div>

                        <div class="">
                            <p>County</p>
                            <input type='text' name='clientCounty' placeholder='County' value="{{ $patient->countyOfBirth }}" required> <br>
                        </div>


                        <div class="">
                            <p>Subcounty</p>
                            <input type='text' name='clientSubCounty' placeholder='Subcounty' value="{{ $patient->subCounty }}" required> <br>
                        </div>


                        <div class="">
                            <p>Constituency</p>
                            <input type='text' name='clientConstituency' placeholder='Constituency' value="{{ $patient->village }}" required> <br>
                        </div>


                        <div class="">
                            <p>Ward</p>
                            <input type='text' name='clientWard' placeholder='Ward' value="{{ $patient->address }}" required> <br>
                        </div>


                    </fieldset>

                    <div class="grid-1-2">
                        <fieldset class="">
                            <legend>Next of Kin Details</legend>


                            <div class="">
                                <p>Full Name</p>
                                <input type='text' name='kinName' placeholder="Kin's Full Name" value="{{ $patient->kinName }}" required> <br>
                            </div>


                            <div class="">
                                <p>Relationship to Patient</p>
                                <input name="kinRelationship" id="" value="{{ $patient->relationship }}"> <br>
                            </div>

                            <div class="">
                                <p>Telephone Number</p>
                                <input type='text' name='kinTelephone' placeholder='Telephone Number' value="{{ $patient->kinTelephone }}"> <br>
                            </div>


                        </fieldset>


                        <fieldset class="">
                            <legend>Referral Details</legend>

                            <div class="">
                                <p>Referring Officer</p>
                                <input type='text' name='referringOfficer' id='referringOfficer' placeholder="Referring Officer's Name" value="{{ Auth::user()->name }}" readonly> <br>
                                </input>
                            </div>

                            <div class="">
                                <p>History/Investigation</p>
                                <select type="text" id="historyInvestigation" name="historyInvestigation" required>
                                    <option value="">Select History/Investigation</option>
                                    <!-- Populate history/investigation options dynamically -->
                                    <option value="history1">Radiography (X-ray) of the affected area</option>
                                    <option value="history2">Complete blood count (CBC) with differential</option>
                                    <option value="history3">Electrocardiogram (ECG)</option>
                                    <option value="history4">Magnetic Resonance Imaging (MRI) scan of the brain</option>
                                    <option value="history5">Colonoscopy</option>
                                    <option value="history6">Pulmonary function tests (PFTs)</option>
                                    <option value="history7">Ultrasound examination of the abdomen</option>
                                    <option value="history8">Upper gastrointestinal endoscopy</option>
                                    <option value="history9">Genetic testing</option>
                                    <option value="history10">Tissue biopsy</option>
                                    <option value="history11">Allergy testing</option>
                                    <option value="history12">Electroencephalogram (EEG)</option>
                                    <option value="history13">Urine analysis</option>
                                    <option value="history14">Bone mineral density (BMD) scan</option>
                                    <option value="history15">Spirometry</option>
                                  </select>
                            </div>

                            <div class="">
                                <p>Diagnosis</p>
                                <select id="diagnosis" name="diagnosis" required>
                                    <option value="">Select Diagnosis</option>
                                    <!-- Populate diagnosis options dynamically using coded concepts -->
                                    <option value="diagnosis1">Hypertension</option>
                                    <option value="diagnosis2">Diabetes mellitus type 2</option>
                                    <option value="diagnosis3">Acute respiratory infection</option>
                                    <option value="diagnosis4">Major depressive disorder</option>
                                    <option value="diagnosis5">Osteoarthritis</option>
                                    <option value="diagnosis6">Asthma</option>
                                    <option value="diagnosis7">Urinary tract infection</option>
                                    <option value="diagnosis8">Chronic obstructive pulmonary disease (COPD)</option>
                                    <option value="diagnosis9">Migraine</option>
                                    <option value="diagnosis10">Gastroesophageal reflux disease (GERD)</option>
                                    <option value="diagnosis11">Coronary artery disease</option>
                                    <option value="diagnosis12">Schizophrenia</option>
                                    <option value="diagnosis13">Rheumatoid arthritis</option>
                                    <option value="diagnosis14">Stroke</option>
                                    <option value="diagnosis15">Breast cancer</option>
                                  </select>
                            </div>


                            <div class="required">
                                <p>Reason for Referral</p>
                                <select id="reasonReferral" name="reasonReferral" required>
                                    <option value="">Select Reason for Referral</option>
                                    <!-- Populate reason for referral options dynamically using coded concepts -->
                                    <option value="reason1">Need for specialized surgical intervention</option>
                                    <option value="reason2">Diagnostic uncertainty requiring further investigation by a specialist</option>
                                    <option value="reason3">Suspected malignancy or cancer diagnosis</option>
                                    <option value="reason4">Inadequate response to initial treatment or therapy</option>
                                    <option value="reason5">Need for specialized rehabilitative services</option>
                                    <option value="reason6">Evaluation for organ transplantation</option>
                                    <option value="reason7">Second opinion for a challenging medical case</option>
                                    <option value="reason8">Need for genetic testing or counseling</option>
                                    <option value="reason9">Suspected neurological disorder or condition</option>
                                    <option value="reason10">Assessment and management of chronic pain</option>
                                    <option value="reason11">Evaluation and management of psychiatric or psychological concerns</option>
                                    <option value="reason12">Complex obstetric or gynecological conditions</option>
                                    <option value="reason13">Evaluation and management of developmental delays or disabilities in children</option>
                                    <option value="reason14">Suspected infectious diseases or rare medical conditions requiring expertise</option>
                                </select>
                            </div>

                            <div class="required">
                                <p>Referral Details</p>
                                <input type='text' name='referralDetails' placeholder='Referral Details'> <br>
                            </div>


                            <div class="">
                                <p>Attachments</p>
                                <input type="file" id="formFileMultiple" multiple placeholder='File Attachments'> <br>
                            </div>

                            <div class="">
                                <p>Additional Notes</p>
                                <input type='text' id="additionalNotes" name="additionalNotes" placeholder='Additional Medical Notes' required> <br>
                            </div>


                        </fieldset>
                    </div>
            </div>




                <fieldset class="grid-by-ace">
                    <div class="grid-1-1" style="margin-right: 6vw;">
                        <legend>Service Details</legend>

                        <div class="">
                            <p>Priority Level</p>
                            <select id="priorityLevel" name="priorityLevel">
                                <option value="">--- Select Priority Level ---</option>
                                <option value="stat">Emergency</option>
                                <option value="asap">Critical</option>
                                <option value="urgent">Urgent</option>
                                <option value="routine">Routine</option>
                            </select>
                        </div>


                        <div class="">
                            <p>Service Category</p>
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


                        <div class="">
                            <p>Service</p>
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


                        <div class="">
                            <p>Facility</p>
                            <select id="facility" name="facility">
                                <option selected disabled>--- Select Medical Facility ---</option>
                                @foreach($facilities as $facility)
                                    <option value="{{ $facility->Code }}">{{$facility->Code}} - {{ $facility->Officialname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="grid-1-2" style="margin-top: 40px;">
                        <div class="">
                            <p>Approximate Distance</p>
                            <input type="text" id="distance" name='distance' placeholder='Approximate distance' readonly> <br>
                        </div>

                        <div class="">
                            <p>Additional Notes</p>
                            <textarea id="serviceNotes" name="serviceNotes" cols="30" rows="10" placeholder="Additional Medical Notes..."></textarea>
                        </div>
                    </div>
                </fieldset>
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
