@extends('layouts.backend')

//adding select cdn for column selection
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.7.0.slim.min.js"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>


@section('form')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Triage</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Patients</a></li>
          <li class="breadcrumb-item active">Triage</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    
    <section>
        <div class="container">
            <div class="main-body">
                <form action="{{ route('triages.store-form') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="field pt-3">
                            <h5 class="title-x">Patient Details</h5>
                            <div class="row">
                                <div class="col-md-6 pb-2">
                                    <label for="name" class="form-label">Name:</label>
                                    <select class="form-control selected2" name="name" id="name">
                                        <option selected disabled style="text-align: center !important;">-- search patient --</option>
                                        @foreach($patients as $patient)
                                            <option value="{{$patient}}">{{$patient->idNo}} - {{$patient->first_name.' '.$patient->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label for="age" class="form-label">Age:</label>
					                <input type="text" readonly class="form-control readonly" id="age" name="age" min="1" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pb-2">
                                    <label for="gender" class="form-label">Gender:</label>
                                    <input type="text" readonly class="form-control" id="gender" name="gender" min="1" required placeholder="-- gender --">
                                </div>
                                <div class="col-md-6 pb-2">
                                    <label for="reason_for_visit" class="form-label">Reason For Visit:</label>
                                    <textarea class="form-control" id="reason_for_visit" name="reason_for_visit" ></textarea>
                                </div>
                            </div>

                            <hr>
                            <h5 class="title-x">Triage Details</h5>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="blood-pressure" class="form-label">Blood Pressure:</label>
                                    <input type="text" class="form-control" id="blood-pressure" name="blood_pressure" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="heart-rate" class="form-label">Heart Rate:</label>
                                    <input type="text" class="form-control" id="heart-rate" name="heart_rate" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="respiratory-rate" class="form-label">Respiratory Rate:</label>
                                    <input type="text" class="form-control" id="respiratory-rate" name="respiratory_rate" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="temperature" class="form-label">Temperature:</label>
                                    <input type="text" class="form-control" id="temperature" name="temperature" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="oxygen-saturation" class="form-label">Oxygen Saturation:</label>
                                    <input type="text" class="form-control" id="oxygen-saturation" name="oxygen_saturation" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="pain-level" class="form-label">Pain Level:</label>
                                    <input type="number" class="form-control" id="pain-level" name="pain_level" min="1" max="10" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="allergies" class="form-label">Allergies:</label>
                                    <input type="text" class="form-control" id="allergies" name="allergies" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="medications" class="form-label">Medications:</label>
                                    <input type="text" class="form-control" id="medications" name="medications" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="medical-history" class="form-label">Medical History:</label>
                                    <textarea class="form-control" id="medical-history" name="medical_history" required>
                                    </textarea>
                                </div>
                                <div  class="col-md-6">
                                    <label for="recent-travel" class="form-label">Recent Travel:</label>
                                    <input type="text" class="form-control" id="recent-travel" name="recent_travel" required>
                                </div>
                            </div>

                            <hr>
                            <h5 class="title-x">Emergency Contact</h5>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="emergency-contact-name" class="form-label">Emergency Contact Name: </label>
                                    <input type="text" class="form-control" id="emergency-contact-name" name="emergency_contact_name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="emergency-contact-phone" class="form-label">Emergency Contact Phone:</label>
                                    <input type="text" class="form-control" id="emergency-contact-phone" name="emergency_contact_phone" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="emergency-contact-relation" class="form-label">Emergency Contact Relation:</label>
                                    <input type="text" class="form-control" id="emergency-contact-relation" name="emergency_contact_relation" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div  class="d-flex pt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</main>
@endsection
<script>
    $(document).ready(function() {
        $('.selected2').select2();
    });

    $(document).ready(function() {
        $('#name').on('change', function() {

            var name = $(this).val();//this is a jquery function for getting the selected object

            if (name !== '') {
                var patient = JSON.parse(name);

                var dob = patient.dob
                // Split the date and time parts
                var parts = dob.split(' ');
                var datePart = parts[0]; // "2007-04-15"

                // Split the date into year, month, and day
                var dateParts = datePart.split('-');
                var year = parseInt(dateParts[0], 10);
                var month = parseInt(dateParts[1], 10) - 1; // Month is zero-based in JavaScript
                var day = parseInt(dateParts[2], 10);

                // Calculate the age
                var birthDate = new Date(year, month, day);
                var currentDate = new Date();
                var ageDiff = currentDate - birthDate;

                // Convert the age difference to years
                var ageDate = new Date(ageDiff);
                var age = Math.abs(ageDate.getUTCFullYear() - 1970);

                // var date = Carbon

                //console.log(age)


                $('#age').val(age);
                $('#gender').val(patient.gender);
            } else {
                // Clear the fields if no object is selected
                $('#age').val('-- age --');
                $('#gender').val('-- gender --');
                //$('#field2').val('');
            }
        });
    });

</script>