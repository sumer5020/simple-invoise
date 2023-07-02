<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    # Home
    public function home()
    {
        $invoiceCount = Invoice::count();
        return view('welcome',compact('invoiceCount'));
    }

    # List
    public function list()
    {
        $invoiceList = Invoice::orderBy('created_at','desc')
        ->simplePaginate(2);
        return view('list',compact('invoiceList'));
    }

    # Download
    public function download(Invoice $invoice)
    {
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
        ]);

        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $data = $invoice->toArray();

        $pdf = view('invoice',compact(['data']))->render();
        $mpdf->WriteHTML($pdf);
        return $mpdf->Output();
    }
}
