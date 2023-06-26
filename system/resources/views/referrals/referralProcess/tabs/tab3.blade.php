<!-- tab1.blade.php -->
@extends('referrals.referralProcess.layout.referral-tabs-layout')

@section('tab-content')
<div class="tab-pane {{ $activeTab === 'tab3' ? 'active' : '' }}" id="tab3" role="tabpanel">


    <h2 class="accordion-header" id="headingFour">

            <h1>4. Summary</h1>
    </h2>
        <div class="accordion-body">
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
            <div class="row">
                <div class="col-xxl-6 col-md-4">
                    <div class="card">
                        <div class="p-4">
                            <div class="pb-1">
                                <h6 class="card-title" style="font-size: 120% !important;">Referral Details</h6>
                                <p><strong>Referring Officer:</strong> Dr. {{ Auth::user()->name }}</p>
                                <p><strong>History/Investigation:</strong> <span id="summary-historyInvestigation"></span></p>
                                <p><strong>Diagnosis:</strong> <span id="summary-diagnosis"></span></p>
                                <p><strong>Reason for referral:</strong> <span id="summary-reasonReferral"></span></p>
                                <p><strong>Attachments:</strong> <span id="summary-formFileMultiple"></span></p>
                                <p><strong>Additional Notes:</strong> <span id="summary-additionalNotes"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-md-4">
                    <div class="card">
                        <div class="p-4">
                            <div class="pb-1">
                                <h6 class="card-title" style="font-size: 120% !important;">Service Details</h6>
                                <p><strong>Priority Level:</strong> <span id="summary-priorityLevel"></span></p>
                                <p><strong>Service Category:</strong> <span id="summary-serviceCategory"></span></p>
                                <p><strong>Service:</strong> <span id="summary-service"></span></p>
                                <p><strong>Facility:</strong> <span id="summary-facility"></span></p>
                                <p><strong>Approximate Distance:</strong> <span id="summary-distance"></span></p>
                                <p><strong>Additional Notes:</strong> <span id="summary-serviceNotes"></span></p>
                                <!-- Add more fields as needed -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="d-flex justify-content-end">
        <button class="btn btn-primary btn-lg">complete <i class="fas fa-check ml-2"></i></button>
    </div>

</div>
@endsection
