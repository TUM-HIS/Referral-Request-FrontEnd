@extends('layouts.backend')

@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1> Referrals </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('referrals.incoming') }}">Outgoing</a></li>
                    <li class="breadcrumb-item active">Referrals</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="d-flex justify-content-end m-2">
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('referrals.worklist') }}">Refer</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped datatable" id="patientTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Client Name</th>
                                <th>Client UPI</th>
                                <th>Referring Officer</th>
                                <th>Investigations</th>
                                <th>diagnosis</th>
                                <th>Referral Reason</th>
                                <th>Priority</th>
                                <th>Requested Service </th>
                                <th>Intended Facility </th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($referralRequests as $referralRequest)
                                <tr onclick="window.location.href='{{ route('referrals.viewReferral', $referralRequest) }}'"
{{--                                    class="--}}
{{--                                    @if ($referralRequest->priorityLevel == 'stat')--}}
{{--                                        color-red--}}
{{--                                    @elseif ($referralRequest->priorityLevel == 'asap')--}}
{{--                                        color-blue--}}
{{--                                    @elseif ($referralRequest->priorityLevel == 'urgent')--}}
{{--                                        color-green--}}
{{--                                    @elseif ($referralRequest->priorityLevel == 'routine')--}}
{{--                                        color-yellow--}}
{{--                                    @else--}}
{{--                                        color-default--}}
{{--                                    @endif--}}
                                ">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $referralRequest->clientName }}</td>
                                    <td>{{ $referralRequest->clientUPI }}</td>
                                    <td>{{ $referralRequest->referringOfficer }}</td>
                                    <td>{{ $referralRequest->historyInvestigation }}</td>
                                    <td>{{ $referralRequest->diagnosis }}</td>
                                    <td>{{ $referralRequest->reasonReferral }}</td>
                                    {{-- <td>{{ $referralRequest->attachments }}</td>
                                    <td>{{ $referralRequest->additionalNotes }}</td> --}}
                                    <td>{{ $referralRequest->priorityLevel }}</td>
                                    {{-- <td>{{ $referralRequest->serviceCategory }}</td> --}}
                                    <td>{{ $referralRequest->service }}</td>
                                    <td>{{ $referralRequest->referredFacility }}</td>
                                    <td >
                                        <p class="badge
                                            @if ($referralRequest->status == 'Pending')
                                                bg-warning
                                            @elseif ($referralRequest->status == 'Accepted')
                                                bg-success
                                            @elseif ($referralRequest->status == 'Rejected')
                                                bg-danger
                                            @endif"
                                           style="display: flex; align-items: center; justify-content: center;">
                                            {{ $referralRequest->status }}
                                        </p>
                                    </td>
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
