@extends('layouts.backend')
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1> Referrals </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('referrals.index') }}">Outgoing</a></li>
                    <li class="breadcrumb-item active">Referrals</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="d-flex justify-content-end m-2">
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('referrals.addReferral') }}">Refer</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Referral ID</th>
                                <th>Status</th>
                                <th>Referral Type</th>
                                <th>Priority</th>
                                <th>Requested Service </th>
                                <th>Intended Facility </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($referralRequests as $referralRequest)
                                <tr>
                                    <td>{{ $referralRequest->id }}</td>
                                    <td>{{ $referralRequest->identifier }}</td>
                                    {{-- <td>{{ $referralRequest->definition }}</td>
                                    <td>{{ $referralRequest->basedOn }}</td>
                                    <td>{{ $referralRequest->replaces }}</td>
                                    <td>{{ $referralRequest->groupIdentifier }}</td> --}}
                                    <td>{{ $referralRequest->status }}</td>
                                    {{-- <td>{{ $referralRequest->intent }}</td> --}}
                                    <td>{{ $referralRequest->type }}</td>
                                    <td>{{ $referralRequest->priority }}</td>
                                    <td>{{ $referralRequest->serviceRequested }}</td>
                                    {{-- <td>{{ $referralRequest->subject }}</td>
                                    <td>{{ $referralRequest->context }}</td>
                                    <td>{{ $referralRequest->occurrence }}</td>
                                    <td>{{ $referralRequest->authoredOn }}</td>
                                    <td>{{ $referralRequest->requester }}</td>
                                    <td>{{ $referralRequest->specialty }}</td> --}}
                                    <td>{{ $referralRequest->recipient }}</td>
                                    {{-- <td>{{ $referralRequest->reasonCode }}</td>
                                    <td>{{ $referralRequest->reasonReference }}</td>
                                    <td>{{ $referralRequest->description }}</td>
                                    <td>{{ $referralRequest->supportingInfo }}</td>
                                    <td>{{ $referralRequest->note }}</td>
                                    <td>{{ $referralRequest->relevantHistory }}</td> --}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
