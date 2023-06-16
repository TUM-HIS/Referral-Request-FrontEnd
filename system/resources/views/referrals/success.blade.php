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

    <div class="container">
        {{ dd('Inside the success view!') }}
        <h1>Referral Submitted Successfully</h1>
        <p>Thank you for submitting the referral request. Our team will review the information and take appropriate actions.</p>
        <p>For any further assistance, please contact our support team.</p>
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
