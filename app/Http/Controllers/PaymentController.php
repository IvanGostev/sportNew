<?php

namespace App\Http\Controllers;

use App\Mail\PaymentNotificationMail;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use YooKassa\Client;

class PaymentController extends Controller
{
    public function purchaseSubscription(Request $request)
    {
        $data = $request->validate([
            'm' => 'required',
            'user_id' => 'required',
        ]);
        $user = User::where('id', $data['user_id'])->first();
        $price = ($data['m'] == 1 ? 30.00 : 365.00);
        $client = new Client();

//        $client->setAuth('415003', 'live_sz-3hg8Fuu4b5V7ADMrP2UJ-KAsAAKZpEsYRaOts3C0');
        $client->setAuth('471468', 'test_fzCPF_GXiHBTQxd1bFZMP81CqK7CeeJGKGRH_88y1Ig');
        $payment = $client->createPayment(
            [
                'amount' => [
                    'value' => $price,
                    'currency' => 'RUB',
                ],
                'confirmation' => [
                    'type' => 'redirect',
                    'return_url' => 'https://becoolcorp.com/profile',
                ],
                'capture' => true,
                'description' => 'Подписка ' . $data['user_id'],
                "metadata" => [
                    'user_id' => $data['user_id'],
                    'product_type' => 'subscription'
                ],
                'save_payment_method' => true,
                'receipt' => [
                    "customer" => [
                        "email" => $user->email
                    ],
                    'items' => [
                        [
                            'description' => 'Подписка ' . $data['user_id'],
                            "quantity" => 1,
                            "amount" => [
                                "value" => $price,
                                "currency" => "RUB"
                            ],
                            "vat_code" => 1,
                            "payment_subject" => "service",
                            'payment_mode' => 'full_payment',
                        ],
                    ]
                ]
            ],
            uniqid('212', true)
        );

        return redirect($payment->confirmation->confirmation_url);
    }

    public function purchaseOrder($order)
    {
        $items = [];
        foreach ($order->products() as $product) {
            $items[] = [
                'description' => $product->product()['title'],
                "quantity" => $product['qty'],
                "amount" => [
                    "value" => $product->price,
                    "currency" => "RUB"
                ],
                "vat_code" => 1,
                "payment_subject" => "commodity",
                'payment_mode' => 'full_payment',
            ];
        }
        $client = new Client();
//        $client->setAuth('415003', 'live_sz-3hg8Fuu4b5V7ADMrP2UJ-KAsAAKZpEsYRaOts3C0');
        $client->setAuth('471468', 'test_fzCPF_GXiHBTQxd1bFZMP81CqK7CeeJGKGRH_88y1Ig');
        $payment = $client->createPayment(
            [
                'amount' => [
                    'value' => $order->totalPrice(),
                    'currency' => 'RUB',
                ],
                'confirmation' => [
                    'type' => 'redirect',
                    'return_url' => 'https://becoolcorp.com/profile',
                ],

                'capture' => true,
                'description' => 'Заказ ' . $order['id'],
                "metadata" => [
                    'order_id' => $order['id'],
                    'product_type' => 'order'
                ],
                'receipt' => [
                    "customer" => [
                        "email" => $order->user()->email
                    ],
                    'items' => $items
                ]
            ],
            uniqid('121', true)
        );

        return redirect($payment->confirmation->confirmation_url);
    }

    public function notification(Request $request)
    {

//        Mail::to('ivangostev07@gmail.com')->send(new PaymentNotificationMail($request->all()));
        $data = $request->all();

        if ($data['object']['status'] == 'succeeded') {
            if ($data['object']['metadata']['product_type'] == 'subscription') {
                $user = User::where('id', $data['object']['metadata']['user_id'])->first();
                $user['payment_method_id'] = $data['object']['payment_method']['id'];

                if ($data['object']['amount']['value'] == '30.00') {
                    $user['subscription_days'] = 30;
                } elseif ($data['object']['amount']['value'] == '365.00') {
                    $user['subscription_days'] = 365;
                }
                $user['day_pay'] = Carbon::now()->toDateString();
                $user['paid'] = 1;

                $user->update();
            } elseif ($data['object']['metadata']['product_type'] == 'order') {
                $order = Order::where('id', $data['object']['metadata']['order_id'])->first();
                $order['paid'] = 1;
                $order['status'] = 'В сборке';
                $order->update();
                $data = [];
                $data['order_id'] = $order['id'];
                $data['platform_id'] = $order['platform_id'];
                $data['name'] = $order->user()['name'];
                $data['phone'] = '+' . ltrim($order->user()['phone'], '+');
                foreach ($order->products() as $product) {
                    $data['products'][] =
                        [
                            "count" => $product['qty'],
                            "title" => $product->product()['title'],
                            "price" => $product['price'],
                        ];
                }
                $delivery = new DeliveryController();
                $delivery->create($data);
            }
        }

        return response(200)->setStatusCode(200);
    }

    public function renewal($user)
    {
        $client = new Client();
//        $client->setAuth('415003', 'live_sz-3hg8Fuu4b5V7ADMrP2UJ-KAsAAKZpEsYRaOts3C0');
        $client->setAuth('471468', 'test_fzCPF_GXiHBTQxd1bFZMP81CqK7CeeJGKGRH_88y1Ig');
        $client->createPayment(
            array(
                'amount' => array(
                    'value' => $user['subscription_days'] == 1 ? 30.00 : 365.00,
                    'currency' => 'RUB',
                ),
                "metadata" => [
                    'user_id' => $user['id'],
                    'product_type' => 'subscription'
                ],
                'capture' => true,
                'payment_method_id' => $user['payment_method_id'],
                'description' => 'Подписка ' . $user['id'],
            ),
            uniqid('', true)
        );
    }

    public function autoRenewal()
    {
        $user = auth()->user();
        if ($user['autorenewal'] == 1) {
            $user['autorenewal'] = 0;
        } else {
            $user['autorenewal'] = 1;
        }
        $user->update();
        return back();
    }


    public function test() {
        $user = auth()->user();
        if (!$user->test_period) {
            $user['test_period'] = 1;
            $user['day_pay'] = Carbon::now()->toDateString();
            $user['paid'] = 1;
            $user['subscription_days'] = 3;
            $user->update();
        }
        return back();
    }

}
