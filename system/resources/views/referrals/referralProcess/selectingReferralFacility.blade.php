@extends('layouts.backend')

@section('content')

    <main id="main" class="main">
        <div class="container">
            <h1>Refer Patient</h1>
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
                    <form class="my-5 bg-danger-light">
                        {{-- Service category dropdown --}}
                        <div class="form-group">
                            <label for="service_category">Select Service Category:</label>
                            <select class="form-control" id="service_category" name="service_category">
                                <option value="">--Select Service Category--</option>
                                @foreach($serviceCategories as $serviceCategory)
                                    <option value="{{ $serviceCategory->name }}">{{ $serviceCategory->name }}</option>
                                @endforeach
                            </select>
{{--                            <div class="dropdown-icon">--}}
{{--                                <i class="fas fa-chevron-down"></i>--}}
{{--                            </div>--}}
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                    <form class="my-5 bg-danger-light">
                        {{-- Services dropdown --}}
                        <div class="form-group position-relative">
                            <label for="service">Select Service:</label>
                            <select class="form-control" id="service" name="service">
{{--                                <option value="">--Select Service--</option>--}}
{{--                                @foreach($services as $service)--}}
{{--                                    <option value="{{ $service->id }}">{{ $service->name }}</option>--}}
{{--                                @endforeach--}}
                            </select>
{{--                            <div class="dropdown-icon">--}}
{{--                                <i class="fas fa-chevron-down"></i>--}}
{{--                            </div>--}}
                        </div>
                    </form>
                </div>

                <div class="col-md-2">
                    <button id="search_button" class="btn btn-primary my-5">Submit</button>
                </div>
            </div>




            <div class="row" id="facilities">

                <!-- Services cards will be dynamically generated here -->
            </div>
        </div>
    </main>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        $(document).ready(function () {
            var selectedService = null;
            // When the service dropdown value changes
            $('#service').on('change', function () {
                selectedService = $(this).val();
                // console.log("checking ...", selectedService)
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
                                serviceDropdown.append('<option value="' + service.id + '">' + service.name + '</option>');
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
                console.log(selectedService)
                if (selectedService) {
                    axios.get('{{ url('api/kmhfl/facility/facility_services') }}', {
                        params: {
                            service_id: selectedService
                        }
                    })
                        .then(function (response) {
                            // Handle the response from the other endpoint
                            console.log(response);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }
            });




            })

    </script>

@endsection
