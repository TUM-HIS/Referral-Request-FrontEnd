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

                <div class="input-group">
                    <div class="form-outline">
                      <input id="search-input" type="search" id="form1" class="form-control" />
                      <label class="form-label" for="form1">Search medical Terms</label>
                    </div>
                    <button id="search-button" type="button" class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>

                                        {{-- <!-- Left side columns -->
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped datatable">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Referral ID</th>
                                                        <th>Referral Type</th>
                                                        <th>Initiating Facility </th>
                                                        <th>Requested Service </th>
                                                        <th>Status </th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($referrals as $key => $referral)
                                                            <tr>

                                                            </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div> --}}
            </div>
        </section>

    </main>
@endsection
