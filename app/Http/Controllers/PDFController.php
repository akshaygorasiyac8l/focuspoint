<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;

class PDFController extends Controller
{
    //
    public function htmlPDF()
    {
    
        return view('pdfs/employees');
        
    }

    public function generatePDF()
    {		
			//print_r($request->print_array);
			$data = ['title' => 'Laravel HTML to PDF'];
			$pdf = PDF::loadView('pdfs/employees', $data);
			return $pdf->download('demonutslaravel.pdf');

    }

}