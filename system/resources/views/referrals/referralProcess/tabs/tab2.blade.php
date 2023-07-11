<!-- tab2.blade.php -->
@extends('referrals.referralProcess.layout.referral-tabs-layout')
<style>
    #spinnerContainer {
        display: none;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" defer></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />


@section('tab-content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
<div class="tab-pane {{ $activeTab === 'tab2' ? 'active' : '' }}" id="tab2" role="tabpanel">



    <h1>3. Facility Selection</h1>
    <div class="">
        <div class="card">
            <fieldset class="p-4">
                <div class="row" style="padding-top: 58px;">
                    <div class="col-md-8 offset-md-3">
                        <table class="table">

                            <thead>
                            <tr>
                                <th></th>
                                <td >First Name</td>
                                <td >ID Number</td>
                                <td >Gender</td>
                                <td >Age</td>
                            </tr>
                                @if($patient != null)
                                    <tr>
                                        <th>Patient:</th>
                                        <th class="text-primary"> {{ $patient->first_name }} </th>
                                        <th class="text-primary">{{ $patient->idNo }}</th>
                                        <th class="text-primary">{{ $patient->gender }}</th>
                                        <th class="text-primary">{{ \Carbon\Carbon::parse($patient->dob)->age }}</th>
                                    </tr>
                                @endif
                            </thead>
                        </table>
                    </div>
                </div>


{{--                @dd($serviceCategories[0])--}}
                <div class="row">
{{--                    <div class="col-md-4">--}}
{{--                        <form class="my-5 ">--}}
{{--                            --}}{{-- Service category dropdown --}}
{{--                            <div class="form-group">--}}
{{--                                <label for="service_category">Select Service Category:</label>--}}
{{--                                <select class="form-control" id="service_category" name="service_category">--}}
{{--                                    <option value="">--Select Service Category--</option>--}}
{{--                                    @foreach($serviceCategories as $serviceCategory)--}}
{{--                                        <option value="{{ $serviceCategory->name }}">{{ $serviceCategory->name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <script>--}}
{{--                                $(document).ready(function() {--}}
{{--                                    // Initialize Select2--}}
{{--                                    $('#service_category').select2({--}}
{{--                                        placeholder: 'Type to search...'--}}
{{--                                    });--}}
{{--                                });--}}
{{--                            </script>--}}
{{--                        </form>--}}
{{--                    </div>--}}

{{--@dd($services[0]->name)--}}
                    <div class="col-md-6">
                        <form class="my-5 ">
                            {{-- Service category dropdown --}}
                            <div class="form-group">
                                <label for="service_category">Select Service:</label>
                                <select class="form-control" id="services" name="services">
                                    <option value="">--Select Service Category--</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach

                                    <script>
                                        $(document).ready(function() {
                                            // Initialize Select2
                                            $('#services').select2({
                                                placeholder: 'Type a SERVICE to search...'
                                            });
                                        });
                                    </script>
                                </select>

                            </div>

                        </form>
                    </div>


                    <div class="col-md-4">
                        <form class="my-5 ">
                            <div class="form-group">
                                <label for="facilityOwner">Facility Type</label>
                                <select id="facilityOwner" name="facilityOwner" class="form-control" required>
                                    <option>--- Select Type of Facility ---</option>
                                    <option value="Ministry of Health">Ministry of Health</option>
                                    <option value="Private Practice">Private Practice</option>
                                </select>
                            </div>
                        </form>

                    </div>

{{--                    <div class="col-md-6">--}}
{{--                        <form class="my-5 ">--}}
{{--                            --}}{{-- Facility dropdown --}}
{{--                            <div class="form-group position-relative">--}}
{{--                                <label for="facility">Select Facility:</label>--}}
{{--                                <select class="form-control" id="facility" name="facility">--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}

                    <div class="col-md-2 d-flex  align-items-center">
                        <button id="search_button" class="btn btn-primary my-5">Search</button>
                    </div>
                </div>


                <div class="row" id="facilities">

                    <div id="spinnerContainer">
                        <!-- Growing Color spinnersr -->
                        <div class="spinner-grow text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="spinner-grow text-secondary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="spinner-grow text-success" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="spinner-grow text-warning" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="spinner-grow text-info" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="spinner-grow text-light" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="spinner-grow text-dark" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div><!-- End Growing Color spinners -->
                    </div>

                </div>

            </fieldset>
            </div>
    </div>
</div>





    {{--    SCRIPT SECTION  --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            var selectedService = null;
            var category_name = null
            var facilityOwner = null
            // When the service dropdown value changes
            $('#services').on('change', function () {
                selectedService = $(this).val();
                console.log("checking ...", selectedService)
            });

            $('#facilityOwner').on('change', function () {
                facilityOwner = $(this).val();
                console.log("checking owner...", facilityOwner)
            });

            // When the service-category dropdown value changes
            {{--$('#service_category').on('change', function () {--}}
            {{--    category_name = $(this).val();--}}
            {{--    console.log("category name: " + category_name + "service name:" + selectedService)--}}
            {{--    // var category_name = "LEPROSY TREATMENT";--}}

            {{--    axios.get('{{ url('api/service_category/get_services') }}', {--}}
            {{--        params: {--}}
            {{--            category_name: category_name--}}
            {{--        }--}}
            {{--    })--}}
            {{--        .then(function (response) {--}}
            {{--            // console.log(response)--}}

            {{--            var services = response.data;--}}
            {{--            var serviceDropdown = $('#service');--}}

            {{--            // Clear the current options in the second dropdown--}}
            {{--            serviceDropdown.empty();--}}

            {{--            // Add the new options based on the response--}}
            {{--            if (services.length > 0) {--}}
            {{--                serviceDropdown.append('<option value="">-- Select Service --</option>');--}}
            {{--                $.each(services, function (index, service) {--}}
            {{--                    serviceDropdown.append('<option value="' + service.name + '">' + service.name + '</option>');--}}
            {{--                });--}}
            {{--            } else {--}}
            {{--                serviceDropdown.append('<option value="">-- No services available --</option>');--}}
            {{--            }--}}
            {{--        })--}}
            {{--        .catch(function (error) {--}}
            {{--            // console.log(error);--}}
            {{--        });--}}
            {{--});--}}


            $('#search_button').on('click', function () {
                $('#spinnerContainer').show();
                console.log("search btn clicked")
                console.log("service name: " + selectedService)
                // Show the spinner
                // $('#spinner').show();

                if (selectedService) {
                    axios.get('{{ url('api/kmhfl/facility/facility_services') }}', {
                        params: {
                            service_id: selectedService,
                            owner_name: facilityOwner
                        }
                    })
                        .then(function (response) {
                            console.log("inside response")
                            const facilities = response.data;
                            console.log("inside response facilities", facilities)

                            // console.log(facilities[3].results[0].code)
                            let facilitiesHtml = '';
                            // console.log(facilities[0].results[0].name)

                            if (facilities.length === 0) {
                                facilitiesHtml += '<div class="col-md-12"><p>No facilities found for this service.</p></div>';
                            }
                            for (var i = 0; i < facilities.length; i++) {
                                var facilityData = facilities[i]?.results[0];

                                facilitiesHtml += '<div class="col-md-4">' +
                                    '<div class="card mb-4 box-shadow">' +
                                    '<div class="card-body">' +
                                    '<h5 class="card-title">' + (facilities[i]?.results[0]?.code || 'null') + ' - ' + (facilities[i]?.results[0]?.name || 'null') + '</h5>' +
                                    '<h5 class="">No. of Beds: ' + (facilities[i]?.results[0]?.number_of_beds || 'null') + '</h5>' +
                                    '<h5 class="">No. of ICU Beds:  ' + (facilities[i]?.results[0]?.number_of_icu_beds || 'null') + '</h5>' +
                                    '<h5 class="">Owner:  ' + (facilityData?.owner_name || 'null') + '</h5>' +
                                    '<h5 class="">County:  ' + (facilityData?.county || 'null') + '</h5>' +
                                    '<br><button class="btn btn-primary select-facility-btn rounded-pill" data-facility-code="' + facilities[i]?.results[0]?.code + '">Select</button>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                            }
                            $('#spinnerContainer').hide();
                            $("#facilities").html(facilitiesHtml);

                            // Hide the spinner after the response is received
                            // $('#spinner').hide();

                        })
                        .catch(function (error) {
                            console.log(error);
                            // Hide the spinner if an error occurs
                            $('#spinner').hide();
                        });
                }
            });


            $(document).on('click', '.select-facility-btn', function () {
                var referralId = {!! json_encode($referralId) !!};
                console.log("inside facility: ")
                const facilityCode = $(this).data('facility-code');



                console.log(facilityCode)
                var serviceCategory = category_name;
                var service = selectedService;
                var referredFacility = $('#diagnosis').val();

                // Create an object with the data
                var formData = {
                    serviceCategory : category_name,
                    service: selectedService,
                    referredFacilityCode: facilityCode,
                    referralId: referralId
                };

                $.ajax({
                    url: '{{ url('api/referral/save/tab2') }}',
                    type: 'POST',
                    data: formData,
                    success: function (response) {

                        var referralId = response.referralId;
                        var referralSuccess = response.success;

                        console.log("response : "+referralId)
                        var url = '{{ route('referral.tabs', ['tab' => 'tab3']) }}';
                        url += '?referralId=' + referralId;
                        window.location.href = url;
                    },
                error: function(error) {
                    console.log(error);
                }


                });

            });


        })

    </script>


</div>


@endsection
