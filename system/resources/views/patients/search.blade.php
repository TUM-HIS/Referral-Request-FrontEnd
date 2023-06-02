@extends('layouts.backend')
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1> Patients </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" ">Patients</a></li>
                    <li class="breadcrumb-item active">Search</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <div class="card input-group mx-auto d-flex flex-row p-4 pb-5 justify-content-center" style="width:450px;top:5rem;">
                    <div>
                        <h5 class="p-2">Search Patient using Patient Identifier</h5>
                    </div>
                    <div class="form-outline">
                        <label class="form-label visually-hidden" for="searchform">Search Patient</label>
                        <input id="search-input" type="search" id="searchform" class="form-control" placeholder="Search Patients"/>
                    </div>
                    <button id="search-button" type="button" class="btn btn-primary">
                      <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </section>

    </main>
@endsection
