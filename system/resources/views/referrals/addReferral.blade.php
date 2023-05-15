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
                        <form>
                            <div class="form-group">
                                <label for="identifier">Business identifier:</label>
                                <input type="text" class="form-control" id="identifier">
                            </div>
                            <div class="form-group">
                                <label for="definition">Instantiates protocol or definition:</label>
                                <input type="text" class="form-control" id="definition">
                            </div>
                            <div class="form-group">
                                <label for="basedOn">Request fulfilled by this request:</label>
                                <input type="text" class="form-control" id="basedOn">
                            </div>
                            <div class="form-group">
                                <label for="replaces">Request(s) replaced by this request:</label>
                                <input type="text" class="form-control" id="replaces">
                            </div>
                            <div class="form-group">
                                <label for="groupIdentifier">Composite request this is part of:</label>
                                <input type="text" class="form-control" id="groupIdentifier">
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select class="form-control" id="status">
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
                                <select class="form-control" id="intent">
                                    <option value="proposal">Proposal</option>
                                    <option value="plan">Plan</option>
                                    <option value="order">Order</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type">Referral/Transition of care request type:</label>
                                <input type="text" class="form-control" id="type">
                            </div>
                            <div class="form-group">
                                <label for="priority">Urgency of referral / transfer of care request:</label>
                                <input type="text" class="form-control" id="priority">
                            </div>
                            <div class="form-group">
                                <label for="serviceRequested">Actions requested as part of the referral:</label>
                                <input type="text" class="form-control" id="serviceRequested">
                            </div>
                            <div class="form-group">
                                <label for="subject">Patient referred to care or transfer:</label>
                                <input type="text" class="form-control" id="subject">
                </div>
                <div class="form-group">
                    <label for="context">Originating encounter:</label>
                    <input type="text" class="form-control" id="context">
                </div>
                <div class="form-group">
                    <label for="occurrence">When the service(s) requested in the referral should occur:</label>
                    <input type="text" class="form-control" id="occurrence">
                </div>
                <div class="form-group">
                    <label for="authoredOn">Date of creation/activation:</label>
                    <input type="text" class="form-control" id="authoredOn">
                </div>
                <div class="form-group">
                    <label for="requester">Who/what is requesting service:</label>
                    <input type="text" class="form-control" id="requester">
                </div>
                <div class="form-group">
                    <label for="specialty">The clinical specialty (discipline) that the referral is requested for:</label>
                    <input type="text" class="form-control" id="specialty">
                </div>
                <div class="form-group">
                    <label for="recipient">Receiver of referral / transfer of care request:</label>
                    <input type="text" class="form-control" id="recipient">
                </div>
                <div class="form-group">
                    <label for="reasonCode">Reason for referral / transfer of care request:</label>
                    <input type="text" class="form-control" id="reasonCode">
                </div>
                <div class="form-group">
                    <label for="reasonReference">Why is service needed?</label>
                    <input type="text" class="form-control" id="reasonReference">
                </div>
                <div class="form-group">
                    <label for="description">A textual description of the referral:</label>
                    <input type="text" class="form-control" id="description">
                </div>
                <div class="form-group">
                    <label for="supportingInfo">Additonal information to support referral or transfer of care request:</label>
                    <input type="text" class="form-control" id="supportingInfo">
                </div>
                <div class="form-group">
                    <label for="note">Comments made about referral request:</label>
                    <input type="text" class="form-control" id="note">
                </div>
                <div class="form-group">
                    <label for="relevantHistory">Key events in history of request:</label>
                    <input type="text" class="form-control" id="relevantHistory">
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


























