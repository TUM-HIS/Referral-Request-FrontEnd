@extends('layouts.backend')
<style>
    .form-floating>.form-control,
    .form-floating>.form-control-plaintext {
        padding: 0rem 0.75rem !important;
    }

    .form-floating>.form-control,
    .form-floating>.form-control-plaintext,
    .form-floating>.form-select {
        height: calc(2.5rem + 2px) !important;
        line-height: 1 !important;
    }

    .form-floating>label {
        padding: 0.5rem 0.75rem !important;
    }
</style>
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

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Referral Request</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Referral Request</h1>
<form id="referralForm" action="{{ route('referrals.submitReferral') }}" method="POST">
    @csrf
    <div class="section">
      <h2>Patient Details</h2>
      <div class="form-group">
        <label for="clientName">Name:</label>
        <input type="text" id="clientName" name="clientName" class="form-control" value="{{ $patient->first_name }}" phprequired>
        
      </div>
      <div class="form-group">
        <label for="clientID">ID Number:</label> 
        <input type="text" id="clientID" name="clientID" class="form-control" value="{{ $patient->idNo }}" required>
      </div>
      <div class="form-group">
        <label for="clientAge">Age:</label>
        <input type="number" id="clientAge" name="clientAge" class="form-control">
      </div>
      <div class="form-group">
        <label for="clientUPI">UPI Number:</label>
        <input type="text" id="clientUPI" name="clientUPI" class="form-control" value="{{ $patient->upi }}">
      </div>
      <div class="form-group">
        <label for="clientBirthCert">Birth Certificate Number:</label>
        <input type="text" id="clientBirthCert" name="clientBirthCert" class="form-control">
      </div>
      <div class="form-group">
        <label for="clientTelephone">Telephone Number:</label>
        <input type="tel" id="clientTelephone" name="clientTelephone" class="form-control" value="{{ $patient->telephone }}" required>
      </div>
      <div class="form-group">
        <label for="clientCounty">County:</label>
        <input type="text" id="clientCounty" name="clientCounty" class="form-control" value="{{ $patient->countyOfBirth }}" required>
      </div>
      <div class="form-group">
        <label for="clientSubCounty">Sub-county:</label>
        <input type="text" id="clientSubCounty" name="clientSubCounty" class="form-control" value="{{ $patient->subCounty }}" required>
      </div>
      <div class="form-group">
        <label for="clientConstituency">Constituency:</label>
        <input type="text" id="clientConstituency" name="clientConstituency" class="form-control" value="{{ $patient->village }}" required>
      </div>
      <div class="form-group">
        <label for="clientWard">Ward:</label>
        <input type="text" id="clientWard" name="clientWard" class="form-control" value="{{ $patient->address }}" required>
      </div>
    </div>
    
    <div class="section">
      <h2>Next of Kin Details</h2>
      <div class="form-group">
        <label for="kinName">Name:</label>
        <input type="text" id="kinName" name="kinName" class="form-control" value="{{ $patient->kinName }}" >
      </div>
      <div class="form-group">
        <label for="kinRelationship">Relationship to Patient:</label>
        <input type="text" id="kinRelationship" name="kinRelationship" class="form-control" value="{{ $patient->relationship }}">
      </div>
      <div class="form-group">
        <label for="kinTelephone">Telephone Number:</label>
        <input type="tel" id="kinTelephone" name="kinTelephone" class="form-control" value="{{ $patient->kinTelephone }}">
      </div>
    </div>
    
    <div class="section">
      <h2>Referral Details</h2>
      <div class="form-group">
        <label for="referringOfficer">Referring Officer:</label>
        <select id="referringOfficer" name="referringOfficer" class="form-control" required>
          <option value="">Select Referring Officer</option>
          <!-- Populate referring officers dynamically from the database or an API -->
          <option value="officer1">Dr. Amos Katwa</option>
          <option value="officer2">Dr. Mercy Cherono</option>
        </select>
      </div>
      <div class="form-group">
        <label for="historyInvestigation">History/Investigation:</label>
        <select id="historyInvestigation" name="historyInvestigation" class="form-control" multiple required>
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
      <div class="form-group">
        <label for="diagnosis">Diagnosis:</label>
        <select id="diagnosis" name="diagnosis" class="form-control" multiple required>
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
      <div class="form-group">
        <label for="reasonReferral">Reason for Referral:</label>
        <select id="reasonReferral" name="reasonReferral" class="form-control" required>
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
      <div class="mb-3">
        <label for="attachments" class="form-label">Attachments:</label>
        <input class="form-control" type="file" id="formFileMultiple" multiple>
      </div>
      <div class="form-group">
        <label for="additionalNotes">Additional Notes:</label>
        <textarea id="additionalNotes" name="additionalNotes" class="form-control"></textarea>
      </div>
    </div>

    <div class="section">
      <h2>Service Details</h2>
      <div class="form-group">
        <label for="priorityLevel">Priority Level:</label>
        <select id="priorityLevel" name="priorityLevel">
          <option value="stat">Emergency</option>
          <option value="asap">Critical</option>
          <option value="urgent">Urgent</option>
          <option value="routine">Routine</option>
        </select>
      </div>
      <div class="form-group">
        <label for="serviceCategory">Service Category:</label>
        <select id="serviceCategory" name="serviceCategory">
          <option value="">Select Service Category</option>
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
      <div class="form-group">
        <label for="service">Service:</label>
        <select id="service" name="service">
          <option value="">Select Service</option>
          <!-- Populate service options dynamically based on selected service category -->
          <option value="service1">Echocardiography</option>
          <option value="service2">Angiography</option>
          <option value="service3">Cardiac catheterization</option>
          <option value="service4">Electrocardiogram (ECG)</option>
          <option value="service5">Stress test</option>
        </select>
      </div>
      <div class="form-group">
        <label for="facility">Facility:</label>
        <select id="facility" name="facility">
          <option value="">Select Facility</option>
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
      <div class="form-group">
        <label for="distance">Approximate Distance:</label>
        <input type="text" id="distance" name="distance" readonly>
      </div>
      <div class="form-group">
        <label for="serviceNotes">Additional Notes:</label>
        <textarea id="serviceNotes" name="serviceNotes"></textarea>
      </div>
    </div>
    
    <div class="form-group">
      <button type="submit">Submit</button>
    </div>
  </form>

{{--                    <form>--}}
{{--                        <div class="d-flex justify-content-center">--}}
{{--                            <div class="form-floating col-md-4">--}}
{{--                                <select class="form-control text-center">--}}
{{--                                    <option selected disabled> -- select option -- </option>--}}
{{--                                    <option value="1">Client Referral</option>--}}
{{--                                    <option value="2">Parameter Referral</option>--}}
{{--                                    <option value="1">Specimen Referral</option>--}}
{{--                                </select>--}}
{{--                                <label> REFERRAL TYPE </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
                </div>
            </div>
        </section>

    </main>

@endsection