@extends('layouts.backend')
<style>
    .form-floating>.form-control,
    .form-floating>.form-control-plaintext {
        padding: 0rem 0.75rem !important;
    }

    .form-floating>.form-control,
    .form-floating>.form-control-plaintext,
    .form-floating>.form-select {
        height: calc(2.5rem + 2px) !important;
        line-height: 1 !important;
    }

    .form-floating>label {
        padding: 0.5rem 0.75rem !important;
    }
</style>
@section('content')

    <main id="main" class="main">

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="pagetitle">
            <h1> Referrals </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('referrals.addReferral') }}"> Add </a></li>
                    <li class="breadcrumb-item active">Referrals</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">









                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <title>Referral Request</title>
                        <!-- Bootstrap CSS -->
                        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                    </head>
                    <body>
                    <div class="container">
                        <h1>Referral Request</h1>
                        <form name="referalRequest" method="post" action="{{ route('referral.storeReferral') }}">
                            @csrf
                            <div class="form-group">
                                <label for="identifier">Business identifier:</label>
                                <input type="text" class="form-control" name="identifier" id="identifier">
                            </div>
                            <div class="form-group">
                                <label for="definition">Instantiates protocol or definition:</label>
                                <input type="text" class="form-control" name="definition" id="definition">
                            </div>
                            <div class="form-group">
                                <label for="basedOn">Request fulfilled by this request:</label>
                                <input type="text" class="form-control" name="basedOn" id="basedOn">
                            </div>
                            <div class="form-group">
                                <label for="replaces">Request(s) replaced by this request:</label>
                                <input type="text" class="form-control" name="replaces" id="replaces">
                            </div>
                            <div class="form-group">
                                <label for="groupIdentifier">Composite request this is part of:</label>
                                <input type="text" class="form-control" name="groupIdentifier" id="groupIdentifier">
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="draft">Draft</option>
                                    <option value="active">Active</option>
                                    <option value="suspended">Suspended</option>
                                    <option value="cancelled">Cancelled</option>
                                    <option value="completed">Completed</option>
                                    <option value="entered-in-error">Entered in Error</option>
                                    <option value="unknown">Unknown</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="intent">Intent:</label>
                                <select class="form-control" name="intent" id="intent">
                                    <option value="proposal">Proposal</option>
                                    <option value="plan">Plan</option>
                                    <option value="order">Order</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type">Referral/Transition of care request type:</label>
                                <select class="form-control" name="type" id="type">
                                    <option value="client">Client</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="priority">Urgency of referral / transfer of care request:</label>
                                <select class="form-control" name="priority" id="priority">
                                    <option value="proposal">Proposal</option>
                                    <option value="plan">Plan</option>
                                    <option value="order">Order</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="serviceRequested">Actions requested as part of the referral:</label>
                                <input type="text" class="form-control" name="serviceRequested" id="serviceRequested">
                            </div>
                            <div class="form-group">
                                <label for="subject">Patient referred to care or transfer:</label>
                                <select class="form-control" name="subject" id="subject">
                                    <option value="care">Care</option>
                                    <option value="transfer">Transfer</option>
                                </select>
                </div>
                <div class="form-group">
                    <label for="context">Originating encounter:</label>
                    <input type="text" class="form-control" name="context" id="context">
                </div>
                <div class="form-group">
                    <label for="occurrence">When the service(s) requested in the referral should occur:</label>
                    <input type="text" class="form-control" name="occurrence" id="occurrence">
                </div>
                <div class="form-group">
                    <label for="authoredOn">Date of creation/activation:</label>
                    <input type="text" class="form-control" name="authoredOn" id="authoredOn">
                </div>
                <div class="form-group">
                    <label for="requester">Who/what is requesting service:</label>
                    <input type="text" class="form-control" name="requester" id="requester">
                </div>
                <div class="form-group">
                    <label for="specialty">The clinical specialty (discipline) that the referral is requested for:</label>
                    <input type="text" class="form-control" name="specialty" id="specialty">
                </div>
                <div class="form-group">
                    <label for="recipient">Receiver of referral / transfer of care request:</label>
                    <input type="text" class="form-control" name="recipient" id="recipient">
                </div>
                <div class="form-group">
                    <label for="reasonCode">Reason for referral / transfer of care request:</label>
                    <input type="text" class="form-control" name="reasonCode" id="reasonCode">
                </div>
                <div class="form-group">
                    <label for="reasonReference">Why is service needed?</label>
                    <input type="text" class="form-control" name="reasonReference" id="reasonReference">
                </div>
                <div class="form-group">
                    <label for="description">A textual description of the referral:</label>
                    <textarea type="text" class="form-control" name="description" id="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="supportingInfo">Additonal information to support referral or transfer of care request:</label>
                    <textarea type="text" class="form-control" name="supportingInfo" id="supportingInfo"></textarea>
                </div>
                <div class="form-group">
                    <label for="note">Comments made about referral request:</label>
                    <textarea type="text" class="form-control" name="note" id="note"></textarea>
                </div>
                <div class="form-group">
                    <label for="relevantHistory">Key events in history of request:</label>
                    <textarea class="form-control" name="relevantHistory" id="relevantHistory"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
            </div>
{{--                    <form>--}}
{{--                        <div class="d-flex justify-content-center">--}}
{{--                            <div class="form-floating col-md-4">--}}
{{--                                <select class="form-control text-center">--}}
{{--                                    <option selected disabled> -- select option -- </option>--}}
{{--                                    <option value="1">Client Referral</option>--}}
{{--                                    <option value="2">Parameter Referral</option>--}}
{{--                                    <option value="1">Specimen Referral</option>--}}
{{--                                </select>--}}
{{--                                <label> REFERRAL TYPE </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
                </div>
            </div>
        </section>

    </main>

@endsection


























