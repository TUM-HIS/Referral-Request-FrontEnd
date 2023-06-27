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
                                <th>Requested Service </th>
                                <th>Status </th>
                                <th>Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($referralRequests as $referralRequest)
                                <tr
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
{{--                                "--}}
                                >
                                    <td onclick="window.location.href='{{ route('referrals.viewIncomingReferral', $referralRequest) }}'">{{ $loop->iteration }}</td>

                                    <td onclick="window.location.href='{{ route('referrals.viewIncomingReferral', $referralRequest) }}'">{{ $referralRequest->clientName }}</td>
                                    <td onclick="window.location.href='{{ route('referrals.viewIncomingReferral', $referralRequest) }}'">{{ $referralRequest->priorityLevel }}</td>
                                    <td onclick="window.location.href='{{ route('referrals.viewIncomingReferral', $referralRequest) }}'">{{ $referralRequest->referringOfficer }}</td>
                                    <td>{{ $referralRequest->service }}</td>
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
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                              Action
                                            </button>
                                            <ul class="dropdown-menu">
{{--                                              <li><a class="dropdown-item" href="#">Reject</a></li>--}}
                                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Accept
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                            Another
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </a></li>
                                            </ul>
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
