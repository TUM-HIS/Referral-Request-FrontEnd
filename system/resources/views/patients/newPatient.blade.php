@extends('layouts.backend')

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Patient Registration</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Patients</a></li>
        <li class="breadcrumb-item active">New Patient</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


  <section>
    <div class="container">
        <div class="main-body">
            <form action="{{ route('patients.storeData') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="field pt-3">
                        <h5 class="title-x">Patient Details</h5>

                        <div class="row">
                            <div class="col-md-6 pb-2">
                                <label for="first_name">First name<span class="required" style="color: red">*</span></label>
                                <input type="text" id="first_name" name="first_name" required class="form-control">
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="name">Last Name<span class="required" style="color: red">*</span></label>
                                <input type="text" id="last_name" name="name" required class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pb-2">
                                <label for="DOB">Date of Birth:<span class="required" style="color: red">*</span></label>
                                <input type="date" id="dob" name="dob" required class="form-control">
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="id">Identification type:<span class="required" style="color: red">*</span></label>
                                <select name="id" id="id" class="form-control">
                                    <option value="">--please select Id type--</option>
                                    <option value="NationalId">National Id</option>
                                    <option value="BirthCertificate">Birth Certificate</option>
                                    <option value="Passport">Passport</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pb-2">
                                <label for="id">Identification No:<span class="required" style="color: red">*</span></label>
                                <input id="id" name="id" required class="form-control">
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="gender">Gender:<span class="required" style="color: red">*</span></label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">--please select gender--</option>
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pb-2">
                                <label for="country">Country:<span class="required" style="color: red">*</span></label>
                                <input type="text" id="country" name="country" required class="form-control">
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="countyOfBirth">County of Birth:<span class="required" style="color: red">*</span></label>
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
                                </select>
                            </div>
                        </div>

                        <hr>

                        <h5 class="pb-1 font-weight-bold title-x">Contact</h5>
                        <div class="row">
                            <div class="col-md-6 pb-2">
                                <label for="telephone">Telephone:<span class="required" style="color: red">*</span></label>
                                <input type="text" id="telephone" name="telephone" required class="form-control">
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="telephone">Other Telephone:</label>
                                <input type="text" id="telephone1" name="telephone1"  not-required class="form-control">
                            </div>
                        </div>

                        <hr>

                        <h5 class="p-1 font-weight-bold title-x">Residence</h5>
                        <div class="row">
                            <div class="col-md-6 pb-2">
                                <label for="county">County:<span class="required" style="color: red">*</span></label>
                                <select id="county" name="county" required class="form-control">
                                    <option value="">--Please select a county--</option>
                                    <option value="mombasa">Mombasa</option>
                                    <option value="Nairobi">Nairobi</option>
                                </select>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="subCounty">Sub-county:<span class="required" style="color: red">*</span></label>
                                <select id="subCounty" name="subCounty" required class="form-control">
                                    <option value="">--Please select a sub-county--</option>
                                    <option value="mvita">Mvita</option>
                                    <option value="changamwe">Changamwe</option>
                                    <option value="nyali">Nyali</option>
                                    <option value="jomvu">Jomvu</option>
                                    <option value="kisauni">Kisauni</option>
                                    <option value="likoni">Likoni</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pb-2">
                                <label for="location">Ward:<span class="required" style="color: red">*</span></label>
                                <select id="location" name="location" required class="form-control">
                                    <option value="">--Please select a location--</option>
                                    <option value="mji wa kale">Mji wa Kale</option>
                                    <option value="tudor">Tudor</option>
                                    <option value="tononoka">Tononoka</option>
                                    <option value="shimanzi">Shimanzi</option>
                                    <option value="majengo">Majengo</option>
                                </select>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="landmark">Landmark:</label>
                                <input type="text" id="landmark" name="landmark" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pb-2">
                                <label for="address">Address:</label>
                                <input type="text" id="address" name="address" class="form-control">
                            </div>
                        </div>
                </div>
                <div class="field pt-3">
                        <h5 class="title-x">Next of Kin</h5>
                        <div class="row">
                            <div class="col-md-6 pb-2">
                                <label for="kinName">Name:<span class="required" style="color: red">*</span></label>
                                <input type="text" id="kinName" name="kinName" required class="form-control">
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="relationship">Relationship:<span class="required" style="color: red">*</span></label>
                                <select id="relationship" name="relationship" required class="form-control">
                                    <option value="">--Please select a relationship--</option>
                                    <option value="parent">Parent</option>
                                    <option value="spouse">Spouse</option>
                                    <option value="sibling">Sibling</option>
                                    <option value="Child">Child</option>
                                    <option value="Other">Other</option>
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pb-2">
                                <label for="kinResidence">Residence:<span class="required" style="color: red">*</span></label>
                                <input type="text" id="KinResidence" name="KinResidence" required class="form-control">
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="kinTelephone">Telephone:<span class="required" style="color: red">*</span></label>
                                <input type="text" id="kinTelephone" name="kinTelephone" required class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pb-2">
                                <label for="mail">Email:</label>
                                <input type="text" id="mail" name="mail" class="form-control">
                            </div>
                        </div>
                </div>
                <div class="d-flex pt-4">
                    <button type="submit" class="btn btn-md btn-primary "> Register Patient </button>
                </div>
            </form>

        </div>
    </div>
  </section>
