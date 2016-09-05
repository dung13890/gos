<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function index()
    {
        return view('backend.report.index');
    }

    public function reportInportExport()
    {
        return view('backend.report.report_import_export');
    }

    public function overall()
    {
    	return view('backend.report.report_overall');
    }

    public function overallDetail()
    {
        return view('backend.report.report_overall_detail');
    }
}
