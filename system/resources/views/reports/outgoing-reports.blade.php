@extends('layouts.backend')
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1> Reports </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" ">Reports</a></li>
                    <li class="breadcrumb-item active">Outgoing Referrals Report</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
                <div class="card input-group mx-auto d-flex flex-row p-4 pb-5 justify-content-center" style="width:450px;top:5rem;">
                    <h2 style="font-size: 150% !important;" class="card-title">Work in progress</h2>
                    <p style="text-align: center; font-size: 90% !important;" class="card-title">All outgoing referrals for this facility will be displayed here as a list. A user can then use filters to narrow down the search that can display the referrals based on whether they were: Accepted, Declined, Counter Referral or Revoked.</p>
                </div>
        </section>

    </main>
@endsection