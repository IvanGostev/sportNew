<?php

namespace App\Http\Controllers;


use App\Mail\PaymentNotificationMail;
use App\Models\Order;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DeliveryController extends Controller
{

    private array $headers = [
        "Content-Type: application/json",
        "Authorization: Bearer y2_AgAAAAD04omrAAAPeAAAAAACRpC94Qk6Z5rUTgOcTgYFECJllXYKFx8",
        "Accept-Language: ru"
    ];

    private string $sourcePlatformId = "fbed3aa1-2cc6-4370-ab4d-59c5cc9bb924";

    /**
     * @throws Exception
     */
    private function info($requestId, $orderId)
    {


//            $dateTime = Carbon::create(strtok($res['destination']['interval_utc']['from'], 'T'));
//            $dateTime->addHours(strtok(explode('T', $res['destination']['interval_utc']['from'])[1], '+'));
//            $order["date_time"] = $dateTime->toDateTimeString();
////            $order["from"] = Carbon::create($res['destination']['interval_utc']['from'])->toDateTimeString();
////            $order["to"] = Carbon::create($res['destination']['interval_utc']['to'])->toDateTimeString();

    }

    public function create($data)
    {
        $query = [];

        $url = "https://b2b.taxi.tst.yandex.net/api/b2b/platform/request/create?" . http_build_query($query);

        $body = [
            "info" => [
                "operator_request_id" => (string)($data["order_id"]) . 'MUR'
            ],
            "source" => [
                "platform_station" => [
                    "platform_id" => $this->sourcePlatformId
                ]
            ],
            "destination" => [
                "type" => "platform_station",
                "platform_station" => [
//                        "platform_id" => $data['platform_id']
                    "platform_id" => "0eb2a31e-b3bd-4ca3-9b9c-233d19f5a546"
                ]
            ],
            "items" => [],
            "places" => [
                [
                    "physical_dims" => [
                        "weight_gross" => 250
                    ],
                    "barcode" => (string)($data["order_id"])

                ]
            ],
            "billing_info" => [
                "payment_method" => "already_paid"
            ],
            "recipient_info" => [
                "first_name" => $data["name"],
                "phone" => $data["phone"]
            ],
            "last_mile_policy" => "time_interval"
        ];


        foreach ($data['products'] as $product) {
            $body['items'][] =
                [
                    "count" => $product['count'],
                    "name" => $product['title'],
                    "article" => $product['title'],
                    "billing_details" => [
                        "unit_price" => $product['price'],
                        "assessed_unit_price" => $product['price']
                    ],
                    "place_barcode" => (string)($data["order_id"])
                ];
        }


        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body, JSON_UNESCAPED_UNICODE));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $res = curl_exec($ch);
        curl_close($ch);
        $res = json_decode($res, TRUE);
        $res['bro_create'] = 555;

        Mail::to('ivangostev07@gmail.com')->send(new PaymentNotificationMail($res));

        $order = Order::where('id', $data["order_id"])->first();
        $order['request_id'] = $res['request_id'];
        $order->update();

        sleep(20);

        $requestId = $res['request_id'];
        $url = "https://b2b.taxi.tst.yandex.net/api/b2b/platform/request/info?request_id=" . $requestId;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $res = curl_exec($ch);
        curl_close($ch);
        $res = json_decode($res, TRUE);
        $res['bro_info'] = 555;
        Mail::to('ivangostev07@gmail.com')->send(new PaymentNotificationMail($res));
        $order["sharing_url"] = (string)$res["sharing_url"];
        $order->update();
    }


}
