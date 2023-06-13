<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function incomingReports(){

        return view('reports.incoming-reports');
    }
}
