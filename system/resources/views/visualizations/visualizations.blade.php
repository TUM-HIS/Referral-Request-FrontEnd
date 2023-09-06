@extends('layouts.backend')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Data Visualisations</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                    <h5 class="card-title">Referrals <span>/per day</span></h5>

                                    <div class="width: 50%">
                                        {!! $chart->container() !!}
                                    </div>

                                </div>

                            </div>
                        </div>

                        <br><br><br>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Completed vs Incomplete Referrals <span>/Past Month</span></h5>

                                    <div class="width: 50%">
                                        {!! $completedPieChart->container() !!}
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Accepted vs Pending vs Rejected Referrals <span>/Past Month</span></h5>

                                    <div class="width: 50%">
                                        {!! $completedPieChart2->container() !!}
                                    </div>

                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- ChartScript --}}
{{--    @if($chart)--}}
        {!! $chart->script() !!}
        {!! $completedPieChart->script() !!}
        {!! $completedPieChart2->script() !!}
{{--    @endif--}}

@endsection


