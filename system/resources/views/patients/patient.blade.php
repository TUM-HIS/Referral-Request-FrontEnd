@extends('layouts.backend')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Patient Registration</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Patients</a></li>
                    <li class="breadcrumb-item active">Add Patient</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                    <form action="{{ route('patients.storeData') }}" method="POST">
                        @csrf
          <label for="username">First name:<abbr title="required">*</abbr></label>
          <input type="text" id="username" name="username" required class="form-control">

          
          <label for="name">Last Name:<abbr title="required">*</abbr></label>
          <input type="text" id="name" name="name" required class="form-control"><br>
          
          <label for="DOB">DOB:<abbr title="required">*</abbr></label>
          <input type="date" id="dob" name="dob" required class="form-control"><br>

          <label for="id">Identification type:<abbr title="required">*</abbr></label>
          <select name="id" id="id" class="form-control">
          <option value="">--please select Id type--</option>
           <option value="NationalId">National Id</option>
           <option value="BirthCertificate">Birth Certificate</option>
         </select><br>

         <label for="id">Identification No:<abbr title="required">*</abbr></label>
         <input type="number" id="id" name="id" required class="form-control"><br>


          <label for="gender">Gender:<abbr title="required">*</abbr></label>
          <select name="gender" id="gender" class="form-control">
          <option value="">--please select gender--</option>
           <option value="male">male</option>
           <option value="female">female</option>
         </select><br>

         <label for="country">Country:<abbr title="required">*</abbr></label>
          <input type="text" id="country" name="country" required class="form-control"><br>

          <label for="countyOfBirth">County of Birth:<abbr title="required">*</abbr></label>
          <input type="text" id="countyOfBirth" name="countyOfBirth" required class="form-control"><br>


          <h5>Contact:</h5>
          <label for="telephone">Telephone:<abbr title="required">*</abbr></label>
          <input type="text" id="telephone" name="telephone" required class="form-control"><br>
          
          <label for="telephone">Other Telephone:</label>
          <input type="text" id="telephone1" name="telephone1" class="form-control"><br>
          
          <h5>Residence:</h5>
          <label for="county">County:<abbr title="required">*</abbr></label>
          <select id="county" name="county" required class="form-control">
            <option value="">--Please select a county--</option>
            <option value="mombasa">Mombasa</option>
            <option value="Nairobi">Nairobi</option>
          </select><br>

          <label for="subCounty">Sub-county:<abbr title="required">*</abbr></label>
          <select id="subCounty" name="subCounty" required class="form-control">
            <option value="">--Please select a sub-county--</option>
            <option value="sub1">Mvita</option>
            <option value="sub2">Changamwe</option>
            <option value="sub3">Nyali</option>
          </select><br>

          <label for="location">Location:<abbr title="required" >*</abbr></label>
          <select id="location" name="location" required class="form-control">
            <option value="">--Please select a location--</option>
            <option value="loc1">Location 1</option>
            <option value="loc2">Location 2</option>
            <option value="loc3">Location 3</option>
            <option value="loc4">Location 4</option>
            <option value="loc5">Location 5</option>
         </select><br><br>
         
         <label for="landmark">Landmark:<abbr title="required">*</abbr></label>
          <input type="text" id="landmark" name="landmark" required class="form-control"><br>

          <label for="address">Address:</label>
          <input type="text" id="address" name="address" required class="form-control"><br>
          
           
          <h2>Next of Kin Details:</h2>
          <label for="kinName">Name:<abbr title="required">*</abbr></label>
          <input type="text" id="kinName" name="kinName" required class="form-control"><br>

          <label for="relationship">Relationship:<abbr title="required">*</abbr></label>
          <select id="relationship" name="relationship" required class="form-control">
          <option value="">--Please select a relationship--</option>
          <option value="parent">Parent</option>
          <option value="spouse">Spouse</option>
          <option value="sibling">Sibling</option>
          <option value="Child">Child</option>
          <option value="Other">Other</option></option>
          </select><br>

          <label for="kinResidence">Residence:<abbr title="required">*</abbr></label>
           <input type="text" id="KinResidence" name="KinResidence" required class="form-control"><br>
     

           <label for="kinTelephone">Telephone:<abbr title="required">*</abbr></label>
          <input type="text" id="kinTelephone" name="kinTelephone" required class="form-control"><br>

           
      <label for="mail">Kin Email:<abbr title="required">*</abbr></label>
      <input type="text" id="mail" name="mail" required class="form-control"><br>

      <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-md btn-primary col-md-7" > Register Patient </button>

      </div>
          
    </form> 
                    </div>

            </div>
        </section>

    </main>
@endsection
