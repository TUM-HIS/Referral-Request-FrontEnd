@extends('layouts.backend')
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1> Incoming Referrals </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" ">Incoming Referrals</a></li>
                    <li class="breadcrumb-item active">Reviewed requests</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
                <div class="card input-group mx-auto d-flex flex-row p-4 pb-5 justify-content-center" style="width:450px;top:5rem;">
                    <h2 style="font-size: 150% !important;" class="card-title">Work in progress</h2>
                    <p style="text-align: center; font-size: 90% !important;" class="card-title">All incoming requests that have been marked as reviewed and they are awaiting action will appear here.</p>
                </div>
        </section>

    </main>
@endsection