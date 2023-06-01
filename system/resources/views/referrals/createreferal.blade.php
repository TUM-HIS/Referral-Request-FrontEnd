@extends('layouts.backend')
<style>
     /*CUSTOM CLASSES*/
     .grid-by-ace{
        display: grid !important;
    }


    .grid-1-1{
        grid-row: 1 !important;
        grid-column: 1 !important;
    }

    .grid-1-2{
        grid-row: 1 !important;
        grid-column: 2 !important;
    }

    .grid-2-1{
        grid-row: 2 !important;
        grid-column: 1 !important;
    }

    .grid-2-2{
        grid-row: 2 !important;
        grid-column: 2 !important;
    }

    fieldset{
        padding: 10px;
        border-radius: 8px;
        border: 2px solid rgb(2,48,71);
        margin-bottom: 40px;
    }

    legend{
        font-weight: bold;
    }

    input{
        width: 30vw;
        height: 35px;
        padding: 5px;
        border-radius: 5px;
    }

    select{
        width: 30vw;
        height: 35px;
        padding: 5px;
        border-radius: 5px;
    }

    textarea{
        max-width: 30vw;
        min-width: 29.9vw;
        height: 100px;
        padding: 5px;
        border-radius: 5px;
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



    <section class='referral grid-by-ace'>
        <form>
            <fieldset class="grid-1-1">
                <legend>Patient Details</legend>

                <p>Full Name</p>
                <input type='text' name='' placeholder='Patient's Full Name'> <br>

                <p>Identification Number</p>
                <input type='text' name='' placeholder='Identification Number'> <br>

                <p>Age</p>
                <input type='number' name='' placeholder='Age'> <br>

                <p>UPI Number</p>
                <input type='text' name='' placeholder='Unique Personal Identification Number'> <br>

                <p>Birth Certificate Number</p>
                <input type='text' name='' placeholder='Birth Certificate Number'> <br>

                <p>Telephone Number</p>
                <input type='text' name='' placeholder='Telephone Number'> <br>


                <p>County</p>
                <input type='text' name='' placeholder='County'> <br>

                <p>Subcounty</p>
                <input type='text' name='' placeholder='Subcounty'> <br>

                <p>Constituency</p>
                <input type='text' name='' placeholder='Constituency'> <br>


                <p>Ward</p>
                <input type='text' name='' placeholder='Ward'> <br>

            </fieldset>

            <div class="grid-1-2">
                <fieldset class="">
                    <legend>Next of Kin Details</legend>
                   
                    <p>Full Name</p>
                    <input type='text' name='' placeholder="Kin's Full Name""> <br>
    
                    <p>Relationship to Patient</p>
                    <select name="" id="">
                        <option value="">--- Select Relationship to Patient ---</option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
    
                    <p>Telephone Number</p>
                    <input type='text' name='' placeholder='Telephone Number'> <br>
                </fieldset>
    
                <fieldset>
                    <legend>Referral Details</legend>
    
                    <p>Referring Officer</p>
                    <input type='text' name='' placeholder="Referring Officer's Name"> <br>
    
                    <p>History/Investigation</p>
                    <input type='text' name='' placeholder='History/Investigation'> <br>
    
                    <p>Diagnosis</p>
                    <input type='text' name='' placeholder='Diagnosis'> <br>
    
                    <p>Referral Details</p>
                    <input type='text' name='' placeholder='Referral Details'> <br>
    
                    <p>Attachments</p>
                    <input type='text' name='' placeholder='File Attachments'> <br>
    
                    <p>Additional Notes</p>
                    <input type='text' name='' placeholder='Additional Medical Notes'> <br>
                </fieldset>
            </div>


            <fieldset>
                <legend>Service Details</legend>

                <p>Priority Level</p>
                <select name="" id="">
                    <option value="">--- Select Priority Level ---</option>
                    <option value=""></option>
                    <option value=""></option>
                </select>

                <p>Service Category</p>
                <select name="" id="">
                    <option value="">--- Select Service Category ---</option>
                    <option value=""></option>
                    <option value=""></option>
                </select>

                <p>Service</p>
                <select name="" id="">
                    <option value="">--- Select Service ---</option>
                    <option value=""></option>
                    <option value=""></option>
                </select>

                <p>Facility</p>
                <select name="" id="">
                    <option value="">--- Select Medical Facility ---</option>
                    <option value=""></option>
                    <option value=""></option>
                </select>

                <p>Approximate Distance</p>
                <input type="text" name='' placeholder='Approximate distance'> <br>

                <p>Additional Notes</p>
                <textarea name="" id="" cols="30" rows="10" placeholder="Additional Medical Notes..."></textarea>
            </fieldset>

            <button>Submit Request</button>
        </form>
    </section>




@endsection
