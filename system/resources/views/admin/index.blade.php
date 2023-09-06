@extends('layouts.backend')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <div class="container" style="padding-bottom: 10rem;">
                    <div class="row">


                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card">
                                <div class="filter">
                                    <!-- Dropdown menu for selecting the period -->
                                    <!-- Add appropriate IDs and classes as needed -->
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                        <li><button class="dropdown-item" onclick="fetchPatientsCount('today')">Today</button></li>
                                        <li><button class="dropdown-item" onclick="fetchPatientsCount('this_month')">This Month</button></li>
                                        <li><button class="dropdown-item" onclick="fetchPatientsCount('this_year')">This Year</button></li>
                                        <li><button class="dropdown-item" onclick="fetchPatientsCount('all')">All</button></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Patients <span id="patients-period">| This Month</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6  id="patients-count">{{ $patientsCount }}</h6>
                                            <span class="text-success small pt-1 fw-bold">12%</span>
                                            <span class="text-muted small pt-2 ps-1">increase</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                        <li><button class="dropdown-item" onclick="fetchPhysiciansCount('today')">Today</button></li>
                                        <li><button class="dropdown-item" onclick="fetchPhysiciansCount('this_month')">This Month</button></li>
                                        <li><button class="dropdown-item" onclick="fetchPhysiciansCount('this_year')">This Year</button></li>
                                        <li><button class="dropdown-item" onclick="fetchPhysiciansCount('all')">All</button></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Physicians <span id="physicians-period">| This Month</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6 id="physicians-count">{{ $physiciansCount }}</h6>
                                            <span class="text-success small pt-1 fw-bold">12%</span>
                                            <span class="text-muted small pt-2 ps-1">increase</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Facilities</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-hospital"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $facilities }}</h6>
                                            <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- Patients Card -->

                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                        <li><button class="dropdown-item" onclick="fetchReferralsCount('today')">Today</button></li>
                                        <li><button class="dropdown-item" onclick="fetchReferralsCount('this_month')">This Month</button></li>
                                        <li><button class="dropdown-item" onclick="fetchReferralsCount('this_year')">This Year</button></li>
                                        <li><button class="dropdown-item" onclick="fetchReferralsCount('all')">All</button></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Referrals <span id="referrals-period">| This Month</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-check"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6 id="referrals-count">{{ $referralsCount }}</h6>
                                            <span class="text-success small pt-1 fw-bold">10%</span>
                                            <span class="text-muted small pt-2 ps-1">increase</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Feedback</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-file-medical"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145</h6>
                                            <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- Patients Card -->
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Reports</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-file-medical"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145</h6>
                                            <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- Patients Card -->

                        <div class="pagetitle">
                            <h1>Find Something</h1>
                        </div>
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center pt-4">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                                <a href="{{ route('patients.searchPatients') }}" class="ps-3">
                                                    <div class="dashboardItem">
                                                        <p><i class="fa-sharp fa-solid fa-hospital"></i></p>
                                                        <h3>Find patient</h3>
                                                    </div>
                                                </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center pt-4">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                                <a href="" class="ps-3">
                                                    <div class="dashboardItem">
                                                        <p><i class="fa-sharp fa-solid fa-hospital"></i></p>
                                                        <h3>Find a doctor</h3>
                                                    </div>
                                                </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center pt-4">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                                <a href="" class="ps-3">
                                                    <div class="dashboardItem">
                                                        <p><i class="fa-sharp fa-solid fa-hospital"></i></p>
                                                        <h3>Referral Status</h3>
                                                    </div>
                                                </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="pagetitle">
                            <h1>About Us</h1>
                        </div>

                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center pt-4">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-file-medical"></i>
                                                </div>
                                                        <a href="" class="ps-3">
                                                            <div class="dashboardItem">
                                                                <p><i class="fa-sharp fa-solid fa-hospital"></i></p>
                                                                <h3>Our Services</h3>
                                                            </div>
                                                        </a>
                                            </div>
                                        </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center pt-4">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-file-medical"></i>
                                                </div>
                                                        <a href="" class="ps-3">
                                                            <div class="dashboardItem">
                                                                <p><i class="fa-sharp fa-solid fa-hospital"></i></p>
                                                                <h3>Facility Data</h3>
                                                            </div>
                                                        </a>
                                            </div>
                                        </div>
                            </div>
                        </div> --}}
                 </div>
                </div>


            </div>
        </section>

    </main><!-- End #main -->

@endsection

