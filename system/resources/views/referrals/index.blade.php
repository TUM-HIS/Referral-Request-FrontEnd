@extends('layouts.backend')
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1> Referrals </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('referrals.index') }}">Incoming</a></li>
                    <li class="breadcrumb-item active">Referrals</li>
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
                                <th>Referral ID</th>
                                <th>Client Name</th>
                                <th>Priority Level</th>
                                <th>Referring Officer </th>
                                <th>Requested Service </th>
                                <th>Status </th>
                                <th>Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($referralRequests as $referralRequest)
                                <tr class="
                                    @if ($referralRequest->priorityLevel == 'stat')
                                        color-red
                                    @elseif ($referralRequest->priorityLevel == 'asap')
                                        color-blue
                                    @elseif ($referralRequest->priorityLevel == 'urgent')
                                        color-green
                                    @elseif ($referralRequest->priorityLevel == 'routine')
                                        color-yellow
                                    @else
                                        color-default
                                    @endif
                                ">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $referralRequest->referralId }}</td>
                                    <td>{{ $referralRequest->clientName }}</td>
                                    <td>{{ $referralRequest->priorityLevel }}</td>
                                    <td>{{ $referralRequest->referringOfficer }}</td>
                                    <td>Cardiovascular</td>
                                    <td>Pending</td>

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
