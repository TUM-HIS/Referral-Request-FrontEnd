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
                                    <select type='text' name='referringOfficer' id='referringOfficer' placeholder="Referring Officer's Name">
                                        <option value="">Select Referring Officer</option>
                                        <!-- Populate referring officers dynamically from the database or an API -->
                                        <option value="officer1">Dr. Amos Katwa</option>
                                        <option value="officer2">Dr. Mercy Cherono</option>
                                    </select>
                                </div>

                                <div class="pb-2">
                                    <label for="historyInvestigation">History/Investigation</label> <br>
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

                                <div class="pb-2">
                                    <label for="diagnosis">Diagnosis</label> <br>
                                    <select class="select" id="diagnosis" name="diagnosis" multiple required>
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
                                    <label for="reasonReferral">Reason for Referral</label> <br>
                                    <select id="reasonReferral" name="reasonReferral" multiple required>
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
                                    <label for="referralDetails">Referral Details</label> <br>
                                    <input type='text' name='referralDetails' placeholder='Referral Details'> <br>
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
                                        <option value="">--- Select Medical Facility ---</option>
                                        <!-- Populate facility options dynamically based on selected service -->
                                        <option value="facility1">Kenyatta National Hospital - Nairobi</option>
                                        <option value="facility2">Aga Khan University Hospital - Nairobi</option>
                                        <option value="facility3">Nairobi Hospital - Nairobi</option>
                                        <option value="facility4">Moi Teaching and Referral Hospital - Eldoret</option>
                                        <option value="facility5">Coast Provincial General Hospital - Mombasa</option>
                                        <option value="facility6">Gertrude's Children's Hospital - Nairobi</option>
                                        <option value="facility7">Mater Misericordiae Hospital - Nairobi</option>
                                        <option value="facility8">Aga Khan Hospital - Mombasai</option>
                                        <option value="facility9">Tenwek Hospital - Bomet</option>
                                        <option value="facility10">Rift Valley Provincial General Hospital - Nakuru</option>
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
