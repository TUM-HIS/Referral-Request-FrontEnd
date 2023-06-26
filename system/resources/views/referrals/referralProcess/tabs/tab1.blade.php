<!-- tab1.blade.php -->
@extends('referrals.referralProcess.layout.referral-tabs-layout')

@section('tab-content')
<div class="tab-pane {{ $activeTab === 'tab1' ? 'active' : '' }}" id="tab1" role="tabpanel">
    <h1>Tab 1 Content</h1>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
                <h1> 1. Patient Details</h1>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row">
                    <div class="col-xxl-6 col-md-4">
                        <div class="card">
                            <div class="p-4">

                                <div class="pb-1">
                                    <label for="clientName">Full Name</label>
                                    <input type='text' class="form-control" name='clientName' placeholder="Patient's Full Name" value="{{ $patient->first_name }} {{ $patient->last_name }}">
                                </div>

                                <div class=" pb-1">
                                    <label for="clientID">Identification Number</label>
                                    <input type='text' class="form-control" name='clientID' placeholder='Identification Number' value="{{ $patient->idNo }}" >
                                </div>

                                <div class=" pb-1">
                                    <label for="clientAge">Age</label>
                                    <input type='number' class="form-control" name='clientAge' value="{{ \Carbon\Carbon::parse($patient->dob)->age }}" placeholder='Age' >
                                </div>

                                <div class=" pb-1">
                                    <label for="clientUPI">UPI Number</label>
                                    <input type='text' class="form-control" name='clientUPI' placeholder='Unique Personal Identification Number' value="{{ $patient->upi }}" >
                                </div>

                                <div class=" pb-1">
                                    <label for="clientBirthCert">Birth Certificate Number</label>
                                    <input type='text' class="form-control" name='clientBirthCert' placeholder='Birth Certificate Number'>
                                </div>

                                <div class=" pb-1">
                                    <label for="clientTelephone">Telephone Number</label>
                                    <input type='text' class="form-control" name='clientTelephone' placeholder='Telephone Number' value="{{ $patient->telephone }}" >
                                </div>

                                <div class=" pb-1">
                                    <label for="clientCounty">County</label>
                                    <input type='text' class="form-control" name='clientCounty' placeholder='County' value="{{ $patient->countyOfBirth }}" >
                                </div>


                                <div class=" pb-1">
                                    <label for="clientSubCounty">Subcounty</label>
                                    <input type='text' class="form-control" name='clientSubCounty' placeholder='Subcounty' value="{{ $patient->subCounty }}" >
                                </div>


                                <div class=" pb-1">
                                    <label for="clientConstituency">Constituency</label>
                                    <input type='text' class="form-control" name='clientConstituency' placeholder='Constituency' value="{{ $patient->village }}" >
                                </div>


                                <div class=" pb-1">
                                    <label for="clientWard">Ward</label>
                                    <input type='text' class="form-control" name='clientWard' placeholder='Ward' value="{{ $patient->address }}" >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-6 col-md-4">
                        <div class="card">
                            <div class="p-4">
                                <legend>Next of Kin Details</legend>


                                <div class=" pb-1">
                                    <label for="kinName">Full Name</label>
                                    <input type='text' class="form-control" name='kinName' placeholder="Kin's Full Name" value="{{ $patient->kinName }}" >
                                </div>


                                <div class=" pb-1">
                                    <label for="kinRelationship">Relationship to Patient</label>
                                    <input class="form-control" name="kinRelationship" id="" value="{{ $patient->relationship }}" >
                                </div>

                                <div class=" pb-1">
                                    <label for="kinTelephone">Telephone Number</label>
                                    <input class="form-control" type='text' name='kinTelephone' placeholder='Telephone Number' value="{{ $patient->kinTelephone }}" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

            <h1>2. Referral Details</h1>

    <div class="accordion-body">
        <div class="card">
            <fieldset class="p-4">
                <div class=" pb-1">
                    <label for="referringOfficer">Referring Officer</label>
                    <input type='text' class="form-control" name='referringOfficer' id='referringOfficer' placeholder="Referring Officer's Name" value="{{ Auth::user()->name }}" readonly>
                </div>

                <div class=" pb-1">
                    <label for="historyInvestigation">History/Investigation</label>
                    <select id="historyInvestigation" name="historyInvestigation" class="form-control" required>
                        <option>--- Select History/Investigation Facility ---</option>
                        <!-- Place all the options here initially -->
                        @foreach($diagnosis as $reason)
                            <option value="{{ $reason->id }}">{{ $reason->{'from concept name'} }}</option>
                        @endforeach
                    </select>
                    <script>
                        $(document).ready(function() {
                            // Initialize Select2
                            $('#historyInvestigation').select2({
                                placeholder: 'Type to search...',
                                minimumInputLength: 1 // Minimum number of characters to trigger the autocomplete
                            });
                        });
                    </script>
                </div>

                <div class=" pb-1">
                    <label for="diagnosis">Diagnosis</label>
                    <select id="diagnosis" name="diagnosis" class="form-control" required>
                        <option>--- Select Diagnosis details ---</option>
                        <!-- Populate diagnosis options dynamically using coded concepts -->
                        @foreach($diagnosis as $reason)
                            <option value="{{ $reason->id }}">{{ $reason->{'from concept name'} }}</option>
                        @endforeach
                    </select>
                    <script>
                        $(document).ready(function() {
                            // Initialize Select2
                            $('#diagnosis').select2({
                                placeholder: 'Type to search...',
                                minimumInputLength: 1 // Minimum number of characters to trigger the autocomplete
                            });
                        });
                    </script>
                </div>

                <div class=" pb-1">
                    <label for="reasonReferral">Reason for Referral</label>
                    <select id="reasonReferral" name="reasonReferral" class="form-control" required>
                        <!-- Add an empty option for the placeholder -->
                        <option>--- Select reason for referral ---</option>
                        <!-- Populate diagnosis options dynamically using coded concepts -->
                        @foreach($diagnosis as $reason)
                            <option value="{{ $reason->id }}">{{ $reason->{'from concept name'} }}</option>
                        @endforeach
                    </select>
                    <script>
                        $(document).ready(function() {
                            // Initialize Select2
                            $('#reasonReferral').select2({
                                placeholder: 'Type to search...',
                                minimumInputLength: 1 // Minimum number of characters to trigger the autocomplete
                            });
                        });
                    </script>
                </div>

                <div class=" pb-1">
                    <label for="formFileMultiple">Attachments</label>
                    <input type="file" class="form-control" id="formFileMultiple" multiple placeholder='File Attachments'>
                </div>

                <div class=" pb-1">
                    <label for="additionalNotes">Additional Notes</label>
                    <textarea cols="30" rows="10" class="form-control" id="additionalNotes" name="additionalNotes" style="height: 100px;" placeholder='Additional Medical Notes' required></textarea>
                </div>
            </fieldset>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button id="next_button" class="btn btn-primary btn-lg">Next <i class="fas fa-arrow-right ml-2"></i></button>
    </div>
</div>

<script>


        $('#next_button').on('click', function () {
            window.location.href = '{{ route('referral.tabs', ['tab' => 'tab2']) }}';
        })

</script>

@endsection
