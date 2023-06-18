@extends('layouts.backend')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Charts</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Charts</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Charts -->
                        <div class="col-12">
                            <div class="card">

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
                                    <h5 class="card-title">Charts <span>/Today</span></h5>

                                    <!-- All Charts here -->
                                    <div style="width: 600px; margin: auto;">
                                        <canvas id="userChart"></canvas>
                                    </div>

                                    <div style="width: 600px; margin: auto;">
                                        <canvas id="referralChart"></canvas>
                                    </div>

                                    <div style="width: 600px; margin: auto;">
                                        <canvas id="statusChart"></canvas>
                                    </div>

                                    <div style="width: 600px; margin: auto;">
                                        <canvas id="lineChart"></canvas>

                                    </div>



                                </div>

                            </div>
                        </div><!-- End Reports -->




                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <!-- CHARTS -->
    <script>


        {{--const chartData = @json($chartData);--}}

        {{--const ctx = document.getElementById('lineChart').getContext('2d');--}}

        {{--var chartData = new Chart(ctx, {--}}
        {{--    type: 'line',--}}
        {{--    data: {--}}
        {{--        labels: chartData.labels,--}}
        {{--        datasets: [--}}
        {{--            {--}}
        {{--                label: 'Number of Referrals',--}}
        {{--                data: chartData.data,--}}
        {{--                fill: false,--}}
        {{--                borderColor: 'rgba(0, 123, 255, 1)', // Blue color for the line--}}
        {{--                borderWidth: 2,--}}
        {{--            },--}}
        {{--        ],--}}
        {{--    },--}}
        {{--    options: {--}}
        {{--        responsive: true,--}}
        {{--        maintainAspectRatio: false,--}}
        {{--        scales: {--}}
        {{--            y: {--}}
        {{--                beginAtZero: true,--}}
        {{--                title: {--}}
        {{--                    display: true,--}}
        {{--                    text: 'Number of Referrals',--}}
        {{--                },--}}
        {{--            },--}}
        {{--            x: {--}}
        {{--                title: {--}}
        {{--                    display: true,--}}
        {{--                    text: 'Months',--}}
        {{--                },--}}
        {{--            },--}}
        {{--        },--}}
        {{--    },--}}
        {{--});--}}












        var statusData = @json($statusData);

        var statusLabels = Object.keys(statusData);
        var statusCounts = Object.values(statusData);

        var ctx = document.getElementById('statusChart').getContext('2d');
        var statusChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: statusLabels,
                datasets: [{
                    label: 'Referral Count by Status',
                    data: statusCounts,
                    backgroundColor: [
                        'rgba(46, 204, 113, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        // Add more colors for additional statuses
                    ],
                    borderColor: [
                        'rgba(46, 204, 113, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 99, 132, 1)',

                        // Add more colors for additional statuses
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });











        var facilityNames = @json($referralChart->facilityNames);
        var referralCounts = @json($referralChart->referralCounts);

        var ctx = document.getElementById('referralChart').getContext('2d');
        var referralChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: facilityNames,
                datasets: [{
                    label: 'Referral Count',
                    data: referralCounts,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            // Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function(value) {if (value % 1 === 0) {return value;}}
                        },
                        scaleLabel: {
                            display: false
                        }
                    }]
                },
                legend: {
                    labels: {
                        // This more specific font property overrides the global property
                        fontColor: '#122C4B',
                        fontFamily: "'Muli', sans-serif",
                        padding: 25,
                        boxWidth: 25,
                        fontSize: 14,
                    }
                },
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 0,
                        bottom: 10
                    }
                }
            }
        });











        var ctx = document.getElementById('userChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',
            // The data for our dataset
            data: {
                labels:  {!!json_encode($chart->labels)!!} ,
                datasets: [
                    {
                        label: 'Count of ages',
                        backgroundColor: {!! json_encode($chart->colours)!!} ,
                        data:  {!! json_encode($chart->dataset)!!} ,
                    },
                ]
            },
// Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function(value) {if (value % 1 === 0) {return value;}}
                        },
                        scaleLabel: {
                            display: false
                        }
                    }]
                },
                legend: {
                    labels: {
                        // This more specific font property overrides the global property
                        fontColor: '#122C4B',
                        fontFamily: "'Muli', sans-serif",
                        padding: 25,
                        boxWidth: 25,
                        fontSize: 14,
                    }
                },
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 0,
                        bottom: 10
                    }
                }
            }
        });
    </script>


@endsection


