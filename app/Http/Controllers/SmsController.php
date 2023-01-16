<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Twilio\Rest\Client;
use Validator;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderby('product_name')->get();
        $product = null;
        $loans = [];
        return view('sms.index', compact('products', 'loans'));
    }

    public function findSmsClients(Request $request)
    {
        if ($request->productId == null) {
            return redirect()->back()->with('info', 'Please Select a Product');
        }
        $products = Product::orderby('product_name')->get();
        $product = Product::find($request->productId);
        //$loans = $product->loans->whereBetween('loan_balance', array($request->minValue, $request->maxValue) )->where('rollover_status_id', '1')->sortBy('loan_balance');
        $loans = $product->loans->where('loan_balance', '>=', $request->minValue)->where('rollover_status_id', '1')->where('loan_balance', '<=', $request->maxValue)->sortBy('loan_balance');
        //return $loans;
        return view('sms.index', compact('products', 'loans'));
    }

    public function sendSms()
    {
    //     $data_json = '{
    //    "from":"Yonder",
    //    "to":"263772728637",
    //    "text":"test msg."
    //     }';

    //     $authorization = 'eW9uZGVyMTpSVEhmdG5LYw==';
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Accept:application/json',"Authorization: Basic $authorization"));
    //     curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    //     curl_setopt($ch, CURLOPT_URL, 'https://example.com/sms/1/text/single');

    //     curl_setopt($ch, CURLOPT_POST, 1);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     $response  = curl_exec($ch);
    //     var_dump(curl_getinfo($ch));
    //     //var_dump($response);
    //     return $response;
    //     curl_close($ch);

    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => "https://example.com/sms/1/text/advanced",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{\"bulkId\":\"string\",\"from\":\"Yonder\",\"to\":\"263772728637\",\"messageId\":\"string\",\"text\":\"Hello\",\"flash\":true,\"transliteration\":\"string\",\"languageCode\":\"string\",\"intermediateReport\":true,\"notifyUrl\":\"string\",\"notifyContentType\":\"string\",\"callbackData\":\"string\",\"validityPeriod\":0,\"sendAt\":\"2022-01-23\",\"hour\":0,\"minute\":0,\"days\":[\"string\"],\"track\":\"string\",\"processKey\":\"string\",\"type\":\"string\"}",
      CURLOPT_HTTPHEADER => [
        "Accept: application/json",
        "Authorization: Basic eW9uZGVyMTpSVEhmdG5LYw==",
        "Content-Type: application/json"
      ],
    ]);
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }


        return redirect()->back()->with('info', " messages sent!");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
