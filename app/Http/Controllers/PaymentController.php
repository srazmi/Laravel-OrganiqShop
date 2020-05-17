<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Shetabit\Payment\Invoice;
use Shetabit\Payment\Facade\Payment;
use App\Model\Factor;
use App\Model\Transaction;
use App\Model\Baskets;
use Carbon\Carbon;
use SoapClient;
use Redirect;
class PaymentController extends Controller
{
    public function Payment(Request $request)
    {
            $MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX'; //Required
            $factor=Factor::where('id',session('factor_id'))->first();
            $Amount =$factor->sum; //Amount will be based on Toman - Required
            $Description = 'خرید از سایت سپیدپروار'; // Required
            $Email = Auth::user()->email; // Optional
            $Mobile = Auth::user()->mobile; // Optional
            $CallbackURL = 'http://localhost:8000/verify'; // Required


            $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

            $result = $client->PaymentRequest(
                [
                    'MerchantID' => $MerchantID,
                    'Amount' => $Amount,
                    'Description' => $Description,
                    'Email' => $Email,
                    'Mobile' => $Mobile,
                    'CallbackURL' => 'http://localhost:8000/verify'
                ]
            );

            //Redirect to URL You can do it also by creating a form
            if ($result->Status == 100) {
            // Header('Location: https://sandbox.zarinpal.com/pg/StartPay/'.$result->Authority);
            $url = 'https://sandbox.zarinpal.com/pg/StartPay/'.$result->Authority;
            return Redirect::to($url);
            } 
            else 
            {
                echo'ERR: '.$result->Status;
            }
    }

    public function Verify()
    {
        $MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX';
        $factor=Factor::where('id',session('factor_id'))->first();
        $Amount = $factor->sum; //Amount will be based on Toman
        $Authority = $_GET['Authority'];
    
        if ($_GET['Status'] == 'OK') 
        {
    
            $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
        
            $result = $client->PaymentVerification(
            [
            'MerchantID' => $MerchantID,
            'Authority' => $Authority,
            'Amount' => $Amount,
            ]
            );
            // dd($result);
            if ($result->Status == 100)
            {
                // echo 'Transaction success. RefID:'.$result->RefID;
                $transaction = new Transaction();
                $transaction->factor_id = session('factor_id');
                $transaction->price = $Amount;
                $transaction->peygiri_code = $result->RefID;
                $transaction->created_at = Carbon::now();
                $transaction->paymentgateway_id = 1;
                $transaction->save();
                session(['factor_id'=> null]);

                $basket_item = Baskets::getcontent(auth::user()->id);
                foreach($basket_item as $item)
                {
                    $item->delete();
                }

                $Message="Transaction success. RefID:.$result->RefID";
                return view('Payment.verify',compact('result','Message'));

            } else {
                // echo 'Transaction failed. Status:'.$result->Status;

                $Message="Transaction failed. Status:.$result->Status";
                return view('Payment.verify',compact('result','Message'));
            }
        } else {
            $result="";
            $Message="تراکنش توسط کاربر لغو شد!";
            return view('Payment.verify',compact('result','Message'));

        }
            
        
    }
}
