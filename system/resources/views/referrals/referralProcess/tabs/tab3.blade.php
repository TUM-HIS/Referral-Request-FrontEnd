<!-- tab1.blade.php -->
@extends('referrals.referralProcess.layout.referral-tabs-layout')

@section('tab-content')
<div class="tab-pane {{ $activeTab === 'tab3' ? 'active' : '' }}" id="tab3" role="tabpanel">


    <h2 class="accordion-header" id="headingFour">

            <h1>Summary</h1>
    </h2>
        <div class="accordion-body">
            @if($patient != null)
                <div class="row">
                    <div class="col-xxl-6 col-md-4">
                        <div class="card">
                            <div class="p-4">
                                <div class="pb-1">
                                    <h6 class="card-title" style="font-size: 120% !important;">Patient Details</h6>
                                    <p><strong>Name:</strong> {{ $patient->first_name }} {{ $patient->last_name }}</p>
                                    <p><strong>Identification Number:</strong> {{ $patient->idNo }}</p>
                                    <p><strong>Phone:</strong> {{ $patient->telephone }}</p>
                                    <p><strong>County:</strong> {{ $patient->countyOfBirth }} County</p>
                                    <p><strong>Sub County:</strong> {{ $patient->subCounty }}</p>
                                    <p><strong>Constituency:</strong> {{ $patient->village }}</p>
                                    <p><strong>Ward:</strong> {{ $patient->address }}</p>
                                    <p><strong>Phone:</strong> {{ $patient->telephone }}</p>
                                    <!-- Add more fields as needed -->
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
                                    <!-- Add more fields as needed -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-xxl-6 col-md-4">
                    <div class="card">
                        <div class="p-4">
                            <div class="pb-1">
                                <h6 class="card-title" style="font-size: 120% !important;">Referral Details</h6>
                                <p>Referring Officer: <span class="fs-5"> @if($referral != null) <strong> {{ $referral->referringOfficer }}</strong> @endif </span></p>
                                <p>History/Investigation: <span class="fs-5" id="summary-historyInvestigation"><strong>{{ $referral->historyInvestigation }}</strong></span></p>
                                <p>Diagnosis: <span class="fs-5" id="summary-diagnosis">
{{--                                        @dd($referral->referredFacility)--}}
                                        <strong>{{$referral->diagnosis}}</strong>
{{--                                        <strong>{{ $referral }}</strong>--}}
                                    </span></p>
                                <p>Reason for referral: <span class="fs-5" id="summary-reasonReferral"><strong>{{ $referral->reasonReferral }}</strong></span></p>
                                <p>Attachments: <span class="fs-5" id="summary-formFileMultiple"><strong>{{ $referral->attachments }}</strong></span></p>
                                <p>Additional Notes: <span class="fs-5" id="summary-additionalNotes"><strong>{{ $referral->additionalNotes }}</strong></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-md-4">
                    <div class="card">
                        <div class="p-4">
                            <div class="pb-1">
                                <h6 class="card-title" style="font-size: 120% !important;">Service Details</h6>
                                <p>Priority Level: <span class="fs-5" id="summary-priorityLevel"><strong>{{ ucfirst($referral->priorityLevel) }}</strong></span></p>
                                <p>Service Category: <span class="fs-5" id="summary-serviceCategory"><strong>{{ $referral->reasonReferral }}</strong></span></p>
                                <p>Service: <span class="fs-5" id="summary-service"><strong>{{ $referral->service }}</strong></span></p>
                                <p>Facility: <span class="fs-5" id="summary-facility"><strong>{{ $referral->referredFacility }}</strong></span></p>
                                <p>Approximate Distance: <span class="fs-5" id="summary-distance"><strong>{{ $referral->distance }}</strong></span></p>
                                <p>Additional Notes: <span class="fs-5" id="summary-serviceNotes"><strong>{{ $referral->additionalNotes }}</strong></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="d-flex justify-content-end">
        <button id="complete_button" class="btn btn-primary btn-lg">complete <i class="fas fa-check ml-2"></i></button>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>

    $(document).ready(function() {

        $('#complete_button').on('click', function () {

            let referringFacilityId = "{{ $referral->referring_facility_id }}";
            let referredFacilityCode =  "{{ $referral->referredFacility }}";
            let referralId = "{{ $referral->id }}"
            console.log(referringFacilityId)

            // console.log("complete clicked")
            // Create an object with the data
            let formData = {
                referringFacilityCode : referringFacilityId,
                referredFacilityCode : referredFacilityCode,
                referralId: referralId
            };

            $.ajax({
                url: '{{ url('api/referral/save/tab3') }}',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    console.log(response)
                    if(response.status === "success"){
                        console.log("inside response "+response.status);
                        let url = '{{ route('referral.tabs', ['tab' => 'tab4']) }}';
                        window.location.href = url;
                    }
                },

                error: function (error) {
                    console.log(error);
                }
            });
        });
    });
</script>
@endsection
