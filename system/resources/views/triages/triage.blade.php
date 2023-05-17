@extends('layouts.backend')

@section('form')
  <main id="main" class="main">
	<div class="container py-5">
		<div class="pagetitle">
		    <h1 class="text-center mb-5">Triage Form</h1>
		</div>
		<form name="triage" id="triage" method="post" action="{{ route('triages.store-form') }}">
			@csrf
			<div class="row mb-3">
				<div class="col-md-6">
					<label for="name" class="form-label">Name:</label>
					<input type="text" class="form-control" id="name" name="name" required>
				</div>
				<div class="col-md-6">
					<label for="age" class="form-label">Age:</label>
					<input type="number" class="form-control" id="age" name="age" min="1" required>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-md-6">
					<label for="gender" class="form-label">Gender:</label>
					<select class="form-select" id="gender" name="gender" required>
						<option value="">--Select--</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
						<option value="other">Other</option>
					</select>
				</div>
				<div class="col-md-6">
					<label for="reason_for_visit" class="form-label">Reason For Visit:</label>
					<textarea class="form-control" id="reason_for_visit" name="reason_for_visit" ></textarea>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-md-6">
					<label for="blood-pressure" class="form-label">Blood Pressure:</label>
					<input type="text" class="form-control" id="blood-pressure" name="blood_pressure" required>
				</div>
				<div class="col-md-6">
					<label for="heart-rate" class="form-label">Heart Rate:</label>
					<input type="text" class="form-control" id="heart-rate" name="heart_rate" required>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-md-6">
					<label for="respiratory-rate" class="form-label">Respiratory Rate:</label>
					<input type="text" class="form-control" id="respiratory-rate" name="respiratory_rate" required>
				</div>
				<div class="col-md-6">
					<label for="temperature" class="form-label">Temperature:</label>
					<input type="text" class="form-control" id="temperature" name="temperature" required>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-md-6">
					<label for="oxygen-saturation" class="form-label">Oxygen Saturation:</label>
					<input type="text" class="form-control" id="oxygen-saturation" name="oxygen_saturation" required>
                </div>
                <div class="col-md-6">
                    <label for="pain-level" class="form-label">Pain Level:</label>
                    <input type="number" class="form-control" id="pain-level" name="pain_level" min="1" max="10" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="allergies" class="form-label">Allergies:</label>
                    <input type="text" class="form-control" id="allergies" name="allergies" required>
                </div>
                <div class="col-md-6">
                    <label for="medications" class="form-label">Medications:</label>
                    <input type="text" class="form-control" id="medications" name="medications" required>
                </div>
            </div>
            <div class="row mb-3">
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
            
            <div class="row mb-3">
                <div class="row md-6">
                    <label for="emergency-contact-name" class="form-label">Emergency Contact Name: </label>
                    <input type="text" class="form-control" id="emergency-contact-name" name="emergency_contact_name" required>
                </div>
                <div class="col-md-6">
                    <label for="emergency-contact-phone" class="form-label">Emergency Contact Phone:</label>
                    <input type="tel" class="form-control" id="emergency-contact-phone" name="emergency_contact_phone" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="row md-6">
                    <label for="emergency-contact-relation" class="form-label">Emergency Contact Relation:</label>
                    <input type="text" class="form-control" id="emergency-contact-relation" name="emergency_contact_relation" required>
                </div>
            </div>
            <div  class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
  </main>
@endsection