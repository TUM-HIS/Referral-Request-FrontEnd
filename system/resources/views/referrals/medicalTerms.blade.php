@extends('layouts.backend')
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1> Medical Terms </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" ">Medical Terms</a></li>
                    <li class="breadcrumb-item active">Search</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <div class="card input-group mx-auto d-flex flex-row p-4 pb-5 justify-content-center" style="width:450px;top:5rem;">
                    <div>
                        <h5 class="p-2">Search Medical Terms</h5>
                    </div>
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
