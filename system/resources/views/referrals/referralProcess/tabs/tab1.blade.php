<!-- tab1.blade.php -->
@extends('referrals.referralProcess.layout.referral-tabs-layout')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.7.0.slim.min.js"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


@section('tab-content')
<div class="tab-pane {{ $activeTab === 'tab1' ? 'active' : '' }}" id="tab1" role="tabpanel">
    <div class="accordion-item">
{{--        <h2 class="accordion-header" id="headingOne">--}}
{{--                <h1 class="card-title" style="font-size: 180% !important;">Patient Details</h1>--}}
{{--        </h2>--}}
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row">
                    <div class="col-xxl-6 col-md-4">
                        <div class="card">
                            <div class="p-4">
                                <div class="pb-1">
                                    <h6 class="card-title" style="font-size: 120% !important;">Patient Details</h6>
                                    <p><strong>Full Name</strong> {{ $patient->first_name }} {{ $patient->last_name }}</p>
                                    <p><strong>Identification Number:</strong> {{ $patient->idNo }}</p>
                                    <p><strong>Age:</strong> {{ \Carbon\Carbon::parse($patient->dob)->age }}</p>
                                    <p><strong>UPI Number:</strong> {{ $patient->upi }}</p>
                                    <p><strong>Telephone number:</strong> {{ $patient->telephone }}</p>
                                    <p><strong>County:</strong> {{ $patient->countyOfBirth }} County</p>
                                    <p><strong>Sub County:</strong> {{ $patient->subCounty }}</p>
                                    <p><strong>Constituency:</strong> {{ $patient->village }}</p>
                                    <p><strong>Ward:</strong> {{ $patient->address }}</p>
                                    <p><strong>Phone:</strong> {{ $patient->telephone }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-6 col-md-4">
                        <div class="card">
                            <div class="p-4">
                                <div class="pb-1">
                                    <h6 class="card-title" style="font-size: 120% !important;">Next of Kin Details</h6>
                                    <p><strong>Full name:</strong> {{ $patient->kinName }} {{ $patient->last_name }}</p>
                                    <p><strong>Relationship:</strong> {{ $patient->relationship }}</p>
                                    <p><strong>Phone:</strong> {{ $patient->kinTelephone }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--            <h1>2. Referral Details</h1>--}}

    <div class="accordion-body">
        <div class="card">

            <fieldset class="p-4">
                <h6 class="card-title" style="font-size: 120% !important;">Referral Details</h6>
                <div class=" pb-1">
                    <label for="referringOfficer">Referring Officer</label>
                    <input type='text' class="form-control" name='referringOfficer' id='referringOfficer' placeholder="Referring Officer's Name" value="{{ Auth::user()->name }}" readonly>
                </div>

                <div class=" pb-1">
                    <label for="historyInvestigation">History/Investigation<span class="required" style="color: red">*</span></label>
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
                <br>

                <div class=" pb-1">
                    <label for="diagnosis">Diagnosis<span class="required" style="color: red">*</span></label>
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
                <br>

                <div class=" pb-1">
                    <label for="reasonReferral">Reason for Referral<span class="required" style="color: red">*</span></label>
                    <select id="reasonReferral" name="reasonReferral" class="form-control" required>

                        <option>--- Select reason for referral ---</option>
                        <option value="Equipment">Equipment</option>
                        <option value="Expertise">Expertise</option>
                        <option value="Out of scope Service">Out of scope Service</option>
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
                <br>
                <div class=" pb-1">
                    <label for="priorityLevel">Priority Level<span class="required" style="color: red">*</span></label>
                    <select id="priorityLevel" name="priorityLevel" class="form-control">
                        <option value="">--- Select Priority Level ---</option>
                        <option value="stat">Emergency</option>
                        <option value="routine">Routine</option>
                    </select>
                </div>
                <br>

                <div class=" pb-1">
                    <label for="formFileMultiple">Attachments</label>
                    <input type="file" class="form-control" id="formFileMultiple" multiple placeholder='File Attachments'>
                </div>
                <br>

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


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>

    $(document).ready(function() {
        var userId = {{ auth()->id() }};
        {{--var patientName = {{ $patient->first_name }} {{ $patient->last_name }};--}}
        var patient = {!! json_encode($patient) !!};
        var patientName = patient.first_name+" "+patient.last_name;
        var patientUPI = patient.upi;
        console.log(userId);
        console.log(patientName);

        $('#next_button').on('click', function () {
            // Send the data to the controller using AJAX POST request
            console.log("next btn clicked")
            // Get the form data
            var referringOfficer = $('#referringOfficer').val();
            var historyInvestigation = $('#historyInvestigation').val();
            var diagnosis = $('#diagnosis').val();
            var reasonReferral = $('#reasonReferral').val();
            var additionalNotes = $('#additionalNotes').val();
            var priorityLevel = $('#priorityLevel').val();

            // Create an object with the data
            var formData = {
                referringOfficer: referringOfficer,
                historyInvestigation: historyInvestigation,
                diagnosis: diagnosis,
                reasonReferral: reasonReferral,
                additionalNotes: additionalNotes,
                userId: userId,
                clientName: patientName,
                clientUPI: patientUPI,
                priorityLevel: priorityLevel
            };


            $.ajax({
                url: '{{ url('api/referral/save/tab1') }}',
                type: 'POST',
                data: formData,
                success: function (response) {
                    // Handle the response after saving
                    var referralId = response.referralId;
                    var referralSuccess = response.success;
                    // console.log(response.success);
                    // console.log(response.referralId);
                    var url = '{{ route('referral.tabs', ['tab' => 'tab2']) }}';
                    url += '?referralId=' + referralId;
                    {{--window.location.href = '{{ route('referral.tabs', ['tab' => 'tab2']) }}';--}}
                        window.location.href = url;
                },

                error: function (error) {
                    console.log(error);
                }
            });

        })

    });




</script>

@endsection
