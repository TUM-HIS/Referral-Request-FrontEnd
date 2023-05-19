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

  <div class="table-responsive">
    <h1>Worklist</h1>
    <table class="table table-bordered table-striped datatable" id="patientTable">
      <thead>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>ID Number</th>
          <th>Gender</th>
          <th>Telephone</th>
          <!-- Add more patient fields as needed -->
        </tr>
      </thead>
      <tbody>
        <!-- Patient records will be dynamically added here -->
        @foreach ($patients as $patient)
            <tr onclick="window.location.href='{{ route('referrals.create', $patient) }}'">
                <td>{{ $patient->id }}</td>
                <td>{{ $patient->first_name }}</td>
                <td>{{ $patient->last_name }}</td>
                <td>{{ $patient->idNo }}</td>
                <td>{{ $patient->gender }}</td>
                <td>{{ $patient->telephone }}</td>
                <!-- Add more patient fields as needed -->
            </tr>
        @endforeach
      </tbody>
    </table>
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