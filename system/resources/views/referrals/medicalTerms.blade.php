@extends('layouts.backend')
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1> Facilities </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" ">Facilities</a></li>
                    <li class="breadcrumb-item active">Search</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <div class="input-group mx-auto d-flex justify-content-center" style="width:450px;top:5rem;">
                    <div class="form-outline">
                        <label class="form-label visually-hidden" for="nhddform">Search medical Terms</label>
                        <input id="search-input" type="search" id="nhddform" class="form-control" placeholder="Search Medical Terms"/>
                    </div>
                    <button id="search-button" type="button" class="btn btn-primary">
                      <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </section>

    </main>
@endsection
