<?php

namespace App\Http\Controllers\Api\Courier;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Steadfast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class CourierController extends Controller
{
    public function steadfast(Request $request)
    {
        $data = Steadfast::all()->first();
      return view('backend.CourierApi.Steadfast.index',[
          'datas'=>$data
        ]);

    }

    public function  steadfast_create(Request $request)
    {
        $validated = $request->validate([
            'api_url' => 'required|max:255',
            'api_key' => 'required',
            'api_secret' => 'required',
        ]);

        // The blog post is valid.
                $data = Steadfast::all()->first();
                if($data){
                    $data->update($validated);
                }else{
                    Steadfast::create($validated);
                }

        return view('backend.CourierApi.Steadfast.index',[$validated,
            'datas'=>$data]);

   }

    public function steadfast_order(Request $request)
    {

        $validated = $request->validate([
            'selected_items' => 'required',
            ]);

        foreach ($request->selected_items as $key => $value) {
            $orders = Order::find($value);
            //steadfast api
            $steadfast = Steadfast::all()->first();
            $address = json_decode($orders->shipping_address);
            //steadfast api
            $response = Http::withHeaders([
                'Api-Key' => $steadfast->api_key,
                'Secret-Key' =>  $steadfast->api_secret,

                'Content-Type' => 'application/json'

            ])->post($steadfast->api_url . '/create_order', [
                'invoice' =>  $orders->code,
                'recipient_name' => $address->name,
                'recipient_address' => $address->address,
                'recipient_phone' => $address->phone,
                'cod_amount' => $orders->grand_total,
                'note' => 'N/A',

            ]);
            $orders->update(['courier_status' => 'steadfast']);
        }
        return to_route('all_orders.index')->with('success', 'Your order has been updated successfully');


   }

}
