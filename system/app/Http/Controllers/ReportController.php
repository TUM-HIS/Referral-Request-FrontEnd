<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function incomingReports(){

        return view('reports.incoming-reports');
    }

    public function outgoingReports(){

        return view('reports.outgoing-reports');
    }

    public function completedReports(){

        return view('reports.completed-reports');
    }
}
