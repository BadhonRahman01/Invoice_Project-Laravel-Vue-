<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function get_all_invoices(){
        $invoices = Invoice::with('customer')->orderBy('id', 'desc')->get();
        return response()->json([
            'invoices' => $invoices]
        , 200);
    }


    public function search_invoice(Request $request){
        $search = $request->get('s');
        if($search != null){
            $invoices = Invoice::with('customer')->where('id', 'LIKE', "%$search%")->get();
            return response()->json([
                'invoices' => $invoices]
            , 200);
        }else{
            return $this->get_all_invoices();
        }
    }

    public function create_invoice(Request $request){
        $counter = Counter::where('key', 'invoice')->first();
        $radmin = Counter::where('key', 'invoice')->first();

        $invoice = Invoice::orderBy('id', 'desc')->first();
        if($invoice){
            $invoice = $invoice->id + 1;
            $counters = $counter->value + $invoice;

        }else{
            $counters = $counter->value;
        }

        $formData = [
            'number' => $counter->prefix.$counters,
            'customer_id' => null,
            'customer' => null,
            'date' => date('Y-m-d'),
            'due_date' => null,
            'refernce' => null,
            'discount' => 0,
            'terms_and_condition' => 'Default Term and Conditions',
            'items' => [
                [
                    'product_id' => null,
                    'product' => null,
                    'unit_price' => 0,
                    'quantity' => 1,
                ]
            ],
        ];
        return response()->json($formData);
    }
}
