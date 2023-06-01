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



    <section class='referral grid-by-ace'>
        <form>
            <fieldset class="grid-1-1">
                <legend>Patient Details</legend>

                <div class="">
                    <p>Full Name</p>
                    <input type='text' name='' placeholder='Patient's Full Name'> <br>  
                </div>
                
                <div class="">
                    <p>Identification Number</p>
                    <input type='text' name='' placeholder='Identification Number'> <br>
                </div>

                <div class="">
                    <p>Age</p>
                    <input type='number' name='' placeholder='Age'> <br>
                </div>

                <div class="">
                    <p>UPI Number</p>
                    <input type='text' name='' placeholder='Unique Personal Identification Number'> <br>
                </div>

                <div class="">
                    <p>Birth Certificate Number</p>
                    <input type='text' name='' placeholder='Birth Certificate Number'> <br>
                </div>

                <div class="">
                    <p>Telephone Number</p>
                    <input type='text' name='' placeholder='Telephone Number'> <br>
                </div>

                <div class="">
                    <p>County</p>
                    <input type='text' name='' placeholder='County'> <br>
                </div>

                <div class="">
                    <p>Subcounty</p>
                    <input type='text' name='' placeholder='Subcounty'> <br>
                </div>

                <div class="">
                    <p>Constituency</p>
                    <input type='text' name='' placeholder='Constituency'> <br>
                </div>
                
                <div class="">
                    <p>Ward</p>
                    <input type='text' name='' placeholder='Ward'> <br>
                </div>
                
            </fieldset>

            <div class="grid-1-2 ">
                <fieldset class="">
                    <legend>Next of Kin Details</legend>
                   
                    <div class="">
                        <p>Full Name</p>
                        <input type='text' name='' placeholder="Kin's Full Name""> <br>
                    </div>

                    <div class="">
                        <p>Relationship to Patient</p>
                        <select name="" id="">
                            <option value="">--- Select Relationship to Patient ---</option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>

                    <div class="">
                        <p>Telephone Number</p>
                        <input type='text' name='' placeholder='Telephone Number'> <br>
                    </div>
                    
                </fieldset>
    
                <fieldset class="">
                    <legend>Referral Details</legend>
    
                    <div class="">
                        <p>Referring Officer</p>
                        <input type='text' name='' placeholder="Referring Officer's Name"> <br>
                    </div>
                    
                    <div class="">
                        <p>History/Investigation</p>
                        <input type='text' name='' placeholder='History/Investigation'> <br>
                    </div>

                    <div class="">
                        <p>Diagnosis</p>
                        <input type='text' name='' placeholder='Diagnosis'> <br>
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


            <fieldset class="">
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

                <div class="">
                    <p>Approximate Distance</p>
                    <input type="text" id="distance" name='distance' placeholder='Approximate distance' readonly> <br>
                </div>

                <div class="">
                    <p>Additional Notes</p>
                    <textarea id="serviceNotes" name="serviceNotes" cols="30" rows="10" placeholder="Additional Medical Notes..."></textarea>
                </div>

            </fieldset>

            <button>Submit Request</button>
        </form>
    </section>




@endsection
