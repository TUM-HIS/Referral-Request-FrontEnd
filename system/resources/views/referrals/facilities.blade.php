@extends('layouts.backend')
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1> Facilities </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" ">Facilities</a></li>
                    <li class="breadcrumb-item active">Search</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                                        <!-- Left side columns -->
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped datatable">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Facility ID</th>
                                                        <th>Facility name</th>
                                                        <th>abbreviation</th>
                                                        <th>description</th>
                                                        <th>location</th>
                                                        <th>beds</th>
                                                        <th>cots</th>
                                                        <th>open_whole_day</th>
                                                        <th>open_whole_week</th>
                                                        <th>Type</th>
                                                        <th>operation_status</th>
                                                        <th>ward</th>
                                                        <th>owner</th>
                                                        <th>officer_in_charge</th>
                                                        <th>physical address</th>
                                                        <th>parent</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                  {{--   @foreach($facilities as $key => $facility)
                                                            <tr>

                                                            </tr>
                                                    @endforeach--}}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
            </div>
        </section>

    </main>
@endsection
