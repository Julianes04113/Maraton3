<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\ImportReport;
use Illuminate\Http\Request;

class ImportReportController extends Controller
{
    public function index(): View
    {
        $imports = ImportReport::paginate(10);
        return view('imports', compact('imports'));
    }

}
