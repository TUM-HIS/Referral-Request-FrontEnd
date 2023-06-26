<!-- tab2.blade.php -->
@extends('referrals.referralProcess.layout.referral-tabs-layout')
<style>
    .spinner {
        display: none; /* Initially hide the spinner */
        /* Add your custom styles for the spinner */
    }
</style>
@section('tab-content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
<div class="tab-pane {{ $activeTab === 'tab2' ? 'active' : '' }}" id="tab2" role="tabpanel">



    <h1>3. Facility Selection</h1>
{{--    <div class="">--}}
{{--        <div class="card">--}}
{{--            <fieldset class="p-4">--}}
                <div class="row" style="padding-top: 58px;">
                    <div class="col-md-6 offset-md-3">
                        <table class="table">

                            <thead>
                            <tr>
                                <th></th>
                                <td >First Name</td>
                                <td >ID Number</td>
                                <td >Gender</td>
                                <td >Age</td>
                            </tr>
                            <tr>
                                <th>Patient:</th>
                                <th class="text-primary"> {{ $patient->first_name }} </th>
                                <th class="text-primary">{{ $patient->idNo }}</th>
                                <th class="text-primary">{{ $patient->gender }}</th>
                                <th class="text-primary">{{ \Carbon\Carbon::parse($patient->dob)->age }}</th>
                            </tr>

                            </thead>
                        </table>
                    </div>
                </div>


                {{--@dd($serviceCategories[0])--}}
                <div class="row">
                    <div class="col-md-4">
                        <form class="my-5">
                            {{-- Service category dropdown --}}
                            <div class="form-group">
                                <label for="service_category">Select Service Category:</label>
                                <select class="form-control" id="service_category" name="service_category">
                                    <option value="">--Select Service Category--</option>
                                    @foreach($serviceCategories as $serviceCategory)
                                        <option value="{{ $serviceCategory->name }}">{{ $serviceCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <form class="my-5 ">
                            {{-- Services dropdown --}}
                            <div class="form-group position-relative">
                                <label for="service">Select Service:</label>
                                <select class="form-control" id="service" name="service">
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-2">
                        <button id="search_button" class="btn btn-primary my-5">Search</button>
                    </div>
                </div>


                <div class="row" id="facilities">

{{--                        <div id="spinner" class="spinner"></div>--}}
                    <!-- facilities cards will be dynamically generated here -->
                </div>
{{--            </fieldset>--}}
{{--            </div>--}}
{{--    </div>--}}
</div>





    {{--    SCRIPT SECTION  --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        $(document).ready(function () {
            var selectedService = null;
            // When the service dropdown value changes
            $('#service').on('change', function () {
                selectedService = $(this).val();
                console.log("checking ...", selectedService)
            });

            // When the service-category dropdown value changes
            $('#service_category').on('change', function () {
                var category_name = $(this).val();
                // var category_name = "LEPROSY TREATMENT";

                axios.get('{{ url('api/service_category/get_services?category_name=LABORATORY SERVICES') }}', {
                    params: {
                        category_name: category_name
                    }
                })
                    .then(function (response) {
                        // console.log(response)

                        var services = response.data;
                        var serviceDropdown = $('#service');

                        // Clear the current options in the second dropdown
                        serviceDropdown.empty();

                        // Add the new options based on the response
                        if (services.length > 0) {
                            serviceDropdown.append('<option value="">-- Select Service --</option>');
                            $.each(services, function (index, service) {
                                serviceDropdown.append('<option value="' + service + '">' + service.name + '</option>');
                            });
                        } else {
                            serviceDropdown.append('<option value="">-- No services available --</option>');
                        }
                    })
                    .catch(function (error) {
                        // console.log(error);
                    });
            });


            $('#search_button').on('click', function () {
                console.log("search btn clicked")
                // Show the spinner
                // $('#spinner').show();

                if (selectedService) {
                    axios.get('{{ url('api/kmhfl/facility/facility_services') }}', {
                        params: {
                            service_id: selectedService
                        }
                    })
                        .then(function (response) {
                            console.log("inside response")
                            const facilities = response.data;
                            console.log(facilities[3].results[0].code)
                            let facilitiesHtml = '';
                            // console.log(facilities[0].results[0].name)

                            if (facilities.length === 0) {
                                facilitiesHtml += '<div class="col-md-12"><p>No facilities found for this service.</p></div>';
                            }
                            for (var i = 0; i < facilities.length; i++) {
                                facilitiesHtml += '<div class="col-md-4">' +
                                    '<div class="card mb-4 box-shadow">' +
                                    '<div class="card-body">' +
                                    '<h5 class="card-title">'+ (facilities[i]?.results[0]?.code || 'null') +' - '+ (facilities[i]?.results[0]?.name || 'null') + '</h5>' +
                                    '<h5 class="">No. of Beds: ' + (facilities[i]?.results[0]?.number_of_beds || 'null') + '</h5>' +
                                    '<h5 class="">No. of ICU Beds:' + (facilities[i]?.results[0]?.number_of_icu_beds || 'null') + '</h5>' +
                                    '<button class="btn btn-primary select-facility-btn rounded-pill" data-facility-info="' + facilities[i]?.results[0]?.id + '">Select</button>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                            }
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





        })

        $(document).on('click', '.select-facility-btn', function() {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            console.log("inside facility")
            const facilityInfo = $(this).data('facility-info');


            var data = {
                _token: csrfToken,
                facility: facilityInfo
            };
            // Get the selected facility's data
            console.log("this is facility info..."+facilityInfo)



            // Send the data to the controller using AJAX POST request
            $.ajax({
                url: '{{ route('referral.tabs.save', ['tab' => 'tab2']) }}',
                type: 'POST',
                data: data,
                success: function(response) {
                    // Handle the response after saving
                    console.log(response);
                    window.location.href = '{{ route('referral.tabs', ['tab' => 'tab3']) }}';
                },
                error: function(error) {
                    console.log(error);
                }
            });


        });



    </script>


</div>
@endsection
