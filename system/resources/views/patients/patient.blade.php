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
            <select id="county" name="county" required class="form-control">
              <option value="">--Please select a county--</option>
              <option value="Nyandarua">Nyandarua</option>

              <option value="Embu">Embu</option>

              <option value="Machakos">Machakos</option>

              <option value="Lamu">Lamu</option>

              <option value="Meru">Meru</option>

              <option value="Nairobi">Nairobi</option>

              <option value="Nyamira">Nyamira</option>

              <option value="Bungoma">Bungoma</option>

              <option value="Tharaka Nithi">Tharaka Nithi</option>

              <option value="Marsabit">Marsabit</option>

              <option value="Taita Taveta">Taita Taveta</option>

              <option value="Kisumu">Kisumu</option>

              <option value="Garissa">Garissa</option>

              <option value="Uasin Gishu">Uasin Gishu</option>

              <option value="Bomet">Bomet</option>

              <option value="Kakamega">Kakamega</option>

              <option value="Wajir">Wajir</option>

              <option value="Trans Nzoia">Trans Nzoia</option>

              <option value="Turkana">Turkana</option>

              <option value="Nyeri">Nyeri</option>

              <option value="Kericho">Kericho</option>

              <option value="Tana River">Tana River</option>

              <option value="Muranga">Muranga</option>

              <option value="Isiolo">Isiolo</option>

              <option value="Laikipia">Laikipia</option>

              <option value="Migori">Migori</option>

              <option value="Samburu">Samburu</option>

              <option value="Kilifi">Kilifi</option>

              <option value="Siaya">Siaya</option>

              <option value="Elgeyo Marakwet">Elgeyo Marakwet</option>

              <option value="Kiambu">Kiambu</option>

              <option value="Nakuru">Nakuru</option>

              <option value="Kitui">Kitui</option>

              <option value="West Pokot">West Pokot</option>

              <option value="Vihiga">Vihiga</option>

              <option value="Kisii">Kisii</option>

              <option value="Mombasa">Mombasa</option>

              <option value="Homa Bay">Homa Bay</option>

              <option value="Makueni">Makueni</option>

              <option value="Mandera">Mandera</option>

              <option value="Nandi">Nandi</option>

              <option value="Kirinyaga">Kirinyaga</option>

              <option value="Kwale">Kwale</option>

              <option value="Kajiado">Kajiado</option>

              <option value="Baringo">Baringo</option>

              <option value="Busia">Busia</option>

              <option value="Narok">Narok</option>
            </select><br>
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
              <option value="mvita">Mvita</option>
              <option value="changamwe">Changamwe</option>
              <option value="nyali">Nyali</option>
              <option value="jomvu">Jomvu</option>
              <option value="kisauni">Kisauni</option>
              <option value="likoni">Likoni</option>
            </select><br>

            <label for="location">Ward:<abbr title="required">*</abbr></label>
            <select id="location" name="location" required class="form-control">
              <option value="">--Please select a location--</option>
              <option value="mji wa kale">Mji wa Kale</option>
              <option value="tudor">Tudor</option>
              <option value="tononoka">Tononoka</option>
              <option value="shimanzi">Shimanzi</option>
              <option value="majengo">Majengo</option>
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
              <option value="Other">Other</option>
              </option>
            </select><br>

            <label for="kinResidence">Residence:<abbr title="required">*</abbr></label>
            <input type="text" id="KinResidence" name="KinResidence" required class="form-control"><br>


            <label for="kinTelephone">Telephone:<abbr title="required">*</abbr></label>
            <input type="text" id="kinTelephone" name="kinTelephone" required class="form-control"><br>


            <label for="mail">Kin Email:<abbr title="required">*</abbr></label>
            <input type="text" id="mail" name="mail" required class="form-control"><br>

            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-md btn-primary col-md-7"> Register Patient </button>

            </div>

          </form>
        </div>

      </div>
  </section>

</main>
@endsection