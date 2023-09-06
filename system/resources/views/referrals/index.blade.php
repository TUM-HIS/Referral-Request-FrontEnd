@extends('layouts.backend')
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1> Referrals </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('referrals.incoming') }}">Incoming</a></li>
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
                                <th>Client Name</th>
                                <th>Priority Level</th>
                                <th>Referring Officer </th>
{{--                                <th>Requested Service </th>--}}
                                <th>Status </th>
                                <th>Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($referralRequests as $referralRequest)
                                <tr>
                                    <td >{{ $loop->iteration }}</td>

                                    <td>{{ $referralRequest->clientName }}</td>
                                    <td >{{ $referralRequest->priorityLevel }}</td>
                                    <td >{{ $referralRequest->referringOfficer }}</td>
{{--                                    <td>{{ $referralRequest->service }}</td>--}}
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
                                    <td class="no-click">
                                        <div class="btn-group" role="group">
                                            <button onclick="window.location.href='{{ route('referrals.viewIncomingReferral', $referralRequest) }}'" type="button" class="btn btn-primary" data-bs-toggle="dropdown" aria-expanded="false">
                                              View
                                            </button>
                                          </div>
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
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('table td:not(.no-click)').on('click', function() {
                // Your onclick function logic goes here
                console.log('Clicked on a table column');
            });
        });
    </script>
@endsection
