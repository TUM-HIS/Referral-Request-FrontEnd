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
        <form class="" id="referralForm" action="{{ route('referrals.submitReferral') }}" method="POST">
            @csrf
            <div class="grid-by-ace">
                <div class="grid-by-ace">
                    <fieldset class="grid-1-1">
                        <legend>Patient Details</legend>
        
                        <div class="">
                            <p>Full Name</p>
                            <input type='text' name='' placeholder="Patient's Full Name" value="{{ $patient->first_name }}" phprequired> <br>  
                        </div>
                        
                        <div class="">
                            <p>Identification Number</p>
                            <input type='text' name='' placeholder='Identification Number' value="{{ $patient->idNo }}" required> <br>
                        </div>
        
                        <div class="">
                            <p>Age</p>
                            <input type='number' name='' placeholder='Age'> <br>
                        </div>
        
                        <div class="">
                            <p>UPI Number</p>
                            <input type='text' name='' placeholder='Unique Personal Identification Number' value="{{ $patient->upi }}"> <br>
                        </div>
        
                        <div class="">
                            <p>Birth Certificate Number</p>
                            <input type='text' name='' placeholder='Birth Certificate Number'> <br>
                        </div>
        
                        <div class="">
                            <p>Telephone Number</p>
                            <input type='text' name='' placeholder='Telephone Number' value="{{ $patient->telephone }}" required> <br>
                        </div>
        
                        <div class="">
                            <p>County</p>
                            <input type='text' name='' placeholder='County' value="{{ $patient->tcountyOfBirth }}" required> <br>
                        </div>
        
                        <div class="">
                            <p>Subcounty</p>
                            <input type='text' name='' placeholder='Subcounty' value="{{ $patient->subCounty }}" required> <br>
                        </div>
        
                        <div class="">
                            <p>Constituency</p>
                            <input type='text' name='' placeholder='Constituency' value="{{ $patient->village }}" required> <br>
                        </div>
                        
                        <div class="">
                            <p>Ward</p>
                            <input type='text' name='' placeholder='Ward' value="{{ $patient->address }}" required> <br>
                        </div>
                        
                    </fieldset>
        
                    <div class="grid-1-2 ">
                        <fieldset class="">
                            <legend>Next of Kin Details</legend>
                           
                            <div class="">
                                <p>Full Name</p>
                                <input type='text' name='' placeholder="Kin's Full Name"" value="{{ $patient->kinName }}" required> <br>
                            </div>
        
                            <div class="">
                                <p>Relationship to Patient</p>
                                <input name="" id="" value="{{ $patient->relationship }}"> <br>
                            </div>
        
                            <div class="">
                                <p>Telephone Number</p>
                                <input type='text' name='' placeholder='Telephone Number' value="{{ $patient->kinTelephone }}"> <br>
                            </div>
                            
                        </fieldset>
            
                        <fieldset class="">
                            <legend>Referral Details</legend>
            
                            <div class="">
                                <p>Referring Officer</p>
                                <select type='text' name='referringOfficer' id='referringOfficer' placeholder="Referring Officer's Name"> 
                                    <option value="">Select Referring Officer</option>
                                    <!-- Populate referring officers dynamically from the database or an API -->
                                    <option value="officer1">Dr. Amos Katwa</option>
                                    <option value="officer2">Dr. Mercy Cherono</option>
                                </select>
                            </div>
                            
                            <div class="">
                                <p>History/Investigation</p>
                                <select type="text" id="historyInvestigation" name="historyInvestigation" multiple required>
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
                                <select id="diagnosis" name="diagnosis" multiple required>
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
        
                            <div class="">
                                <p>Referral Details</p>
                                <input type='text' name='' placeholder='Referral Details'> <br>
                            </div>
        
                            <div class="">
                                <p>Attachments</p>
                                <input type="file" id="formFileMultiple" multiple placeholder='File Attachments'> <br>
                            </div>
            
                            <div class="">
                                <p>Additional Notes</p>
                                <input type='text' id="additionalNotes" name="additionalNotes" placeholder='Additional Medical Notes'> <br>
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
