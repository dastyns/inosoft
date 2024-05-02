<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function data()
    {
        $data = [
            [
                "id" => 1,
                "code" => "PS-11111",
                "item_id" => "1",
                "qty" => "283",
                "qty_unit" => "Ea",
                "country_name" => "Indonesia",
                "Item code" => "OCTG-0134",
                "Item desc" => "30\", 456.67 PPF, X56, PSL3, LYNX HDHT, R3",
                "Product type" => "Casing",
                "grade" => "API 5L X60",
                "connection" => "Conductor",
                "size" => "30"
            ],
            [
                "id" => 2,
                "code" => "PS-11111",
                "item_id" => "1",
                "qty" => "283",
                "qty_unit" => "Ea",
                "country_name" => "Indonesia",
                "Item code" => "OCTG-0134",
                "Item desc" => "30\", 456.67 PPF, X56, PSL3, LYNX HDHT, R3",
                "Product type" => "Casing",
                "grade" => "API 5L X60",
                "connection" => "Conductor",
                "size" => "30"
            ],
        ];
        $response = ['data' => $data];

        return response()->json($response);
    }
}
