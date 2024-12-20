<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Payment;

class PaymentController extends Controller
{

    private const IS_LIVE = true;

   

    public function index()
    {
        return view('payment.payment-form');
    }

    public function submitPaymentForm(Request $request)
    {
        $request->validate([
            'amount' => 'required'
        ], [
            'amount' => 'Amount is Required'
        ]);

        $name = 'subhajit';
        $amount = $request->input('amount');

        if ($name != '' && $amount != '') {
            $redirectUrl = route('confirm');
            $order_id = uniqid();

            $transaction_data = array(
                'merchantId' => $this->getMerchantId(),
                'merchantTransactionId' => $order_id,
                "merchantUserId" => $order_id,
                'amount' => $amount * 100,
                'redirectUrl' => $redirectUrl,
                'redirectMode' => "POST",
                'callbackUrl' => $redirectUrl,
                "paymentInstrument" => array(
                    "type" => "PAY_PAGE",
                )
            );

            $encode = json_encode($transaction_data);
            $payloadMain = base64_encode($encode);
            $payload = $payloadMain . "/pg/v1/pay" . $this->getApiKey();
            $sha256 = hash("sha256", $payload);
            $final_x_header = $sha256 . '###' . $this->getApiKeyIndex();
            $request = json_encode(array('request' => $payloadMain));

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => $this->getHostUrl() . "/pg/v1/pay",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $request,
                CURLOPT_HTTPHEADER => [
                    "Content-Type: application/json",
                    "X-VERIFY: " . $final_x_header,
                    "accept: application/json"
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $res = json_decode($response);

                // Store information into database
                $data = [
                    'amount' => $amount,
                    'transaction_id' => $order_id,
                    'payment_status' => 'PAYMENT_PENDING',
                    'response_msg' => $response,
                    'providerReferenceId' => $this->getMerchantId(),
                    'merchantOrderId' => $order_id,
                    'checksum' => $final_x_header,
                    'merchant_id' => $this->getMerchantId(),
                    'merchant_order_id' => $order_id,
                    'payment_method' => 'phonepe'
                ];

                Payment::create($data);

                if (isset($res->code) && ($res->code == 'PAYMENT_INITIATED')) {
                    $payUrl = $res->data->instrumentResponse->redirectInfo->url;
                    return redirect()->away($payUrl);
                } else {
                    //HANDLE YOUR ERROR MESSAGE HERE
                    $errorMessage = is_object($res) ? json_encode($res) : $res;
                    dd('ERROR : ' . $errorMessage);
                }
            }
        }
    }

    public function confirmPayment(Request $request) {
      
        // Remove the signature validation since this is a PhonePe callback
        // if (!$request->hasValidSignature()) {
        //     abort(419, 'Page Expired');
        // }

        // Check if the code is a string
        $code = is_object($request->code) ? json_encode($request->code) : $request->code;

        if ($code == 'PAYMENT_SUCCESS') {
            $transactionId = $request->transactionId;
            $merchantId = $request->merchantId;
            $providerReferenceId = $request->providerReferenceId;
            $merchantOrderId = $request->merchantOrderId;
            $checksum = $request->checksum;
            $status = $request->code;

            // Update the payment status in the database
            $data = [
                'provider_reference_id' => $providerReferenceId,
                'checksum' => $checksum,
                'payment_status' => 'PAYMENT_SUCCESS', // Add payment status
                'paid_at' => now() // Add payment timestamp
            ];

            if ($merchantOrderId != '') {
                $data['merchantOrderId'] = $merchantOrderId;
            }

            Payment::where('transaction_id', $transactionId)->update($data);

            return view('payment.confirm_payment', compact('providerReferenceId', 'transactionId'));
        } else {
            // Handle your error message here
            $errorMessage = is_object($request->code) ? json_encode($request->code) : $request->code;
            return redirect()->route('payment')->with('error', 'Payment failed: ' . $errorMessage);
        }
    }
}
