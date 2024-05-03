<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class DataController extends Controller
{

    // public function getProductType()
    // {
    //     $data = [
    //         [
    //             "name" => "Casing",
    //             "qty" => 20,
    //             "grade" => [
    //                 [
    //                     "id" => 1,
    //                     "name" => "API 5L X60",
    //                     "sizes" => [
    //                         [
    //                             "id" => 1,
    //                             "name" => "30",
    //                             "connections" => [["id" => 1, "name" => "Conductor"], ["id" => 10, "name" => "Threaded & Coupled"]]
    //                         ],
    //                         [
    //                             "id" => 10,
    //                             "name" => "60",
    //                             "connections" => [["id" => 1, "name" => "Conductor"]]
    //                         ],
    //                     ]
    //                 ],
    //                 [
    //                     "id" => 2,
    //                     "name" => "API 4L X80",
    //                     "sizes" => [
    //                         [
    //                             "id" => 2,
    //                             "name" => "80",
    //                             "connections" => [["id" => 1, "name" => "Conductor"], ["id" => 3, "name" => "Threaded & Coupled"]]
    //                         ]
    //                     ]
    //                 ]
    //             ]
    //         ],
    //         [
    //             "name" => "Pup Joint",
    //             "qty" => 2,
    //             "grade" => [
    //                 "id" => 3,
    //                 "name" => "N80-1",
    //                 "sizes" => [
    //                     [
    //                         "id" => 3,
    //                         "name" => "8 5\/8",
    //                         "connections" => [["id" => 3, "name" => "Threaded & Coupled"]]
    //                     ],
    //                     [
    //                         "id" => 4,
    //                         "name" => "13 3\/8",
    //                         "connections" => [["id" => 8, "name" => "Conductor"]]
    //                     ]
    //                 ]
    //             ]
    //         ],
    //         [
    //             "name" => "Sandscreen",
    //             "qty" => 9,
    //             "grade" => [
    //                 "id" => 4,
    //                 "name" => "N80-Q",
    //                 "sizes" => [
    //                     [
    //                         "id" => 5,
    //                         "name" => "13 3\/8",
    //                         "connections" => [["id" => 9, "name" => "Threaded & Coupled"]]
    //                     ],
    //                     [
    //                         "id" => 6,
    //                         "name" => "5 1\/2",
    //                         "connections" => [["id" => 11, "name" => "Threaded & Coupled"]]
    //                     ]
    //                 ]
    //             ]
    //         ],
    //     ];

    //     return response()->json($data);
    // }

    public function getProduct(Request $request)
    {
        $filePath = database_path('json/data.json');
        if (File::exists($filePath)) {
            $result = [];
            $jsonString = File::get($filePath);
            $data = json_decode($jsonString, true);
            $type = $request->input('type', 'ALL');
            $grade = $request->input('grade', 'ALL');
            $size = $request->input('size', 'ALL');
            $connection = $request->input('connection', 'ALL');

            $filteredData = collect($data)->filter(function ($item) use ($type, $grade, $size, $connection) {
                return ($type === 'ALL' || $item['product_type'] === $type) &&
                    ($grade === 'ALL' || $item['grade'] === $grade) &&
                    ($size === 'ALL' || $item['size'] === $size) &&
                    ($connection === 'ALL' || $item['connection'] === $connection);
            })->values();

            return $filteredData;
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
    }

    // public function getProductList(Request $request)
    // {
    //     $filePath = database_path('json/data.json');
    //     if (File::exists($filePath)) {
    //         $type = $request->query('type');
    //         $jsonString = File::get($filePath);
    //         $data = json_decode($jsonString);

    //         $result = collect($data)->filter(function ($item) use ($type) {
    //             return $item->product_type == $type;
    //         })->values()->all();

    //         return $result;
    //     } else {
    //         return response()->json(['error' => 'File not found'], 404);
    //     }
    // }

    // public function getProductGroup()
    // {
    //     // Path file JSON
    //     $filePath = database_path('json/data.json');

    //     // Mengecek apakah file JSON ada
    //     if (File::exists($filePath)) {
    //         // Membaca isi file JSON
    //         $jsonString = File::get($filePath);
    //         $data = json_decode($jsonString);

    //         // Inisialisasi array untuk grup produk
    //         $productGroups = [];

    //         // Meloopi setiap item produk
    //         foreach ($data as $product) {
    //             $productType = $product->product_type;
    //             $grade = $product->grade;
    //             $size = $product->size;
    //             $connection = $product->connection;

    //             // Grupkan berdasarkan tipe produk
    //             if (!isset($productGroups[$productType])) {
    //                 $productGroups[$productType] = [];
    //             }

    //             // Grupkan berdasarkan grade
    //             if (!isset($productGroups[$productType]['grades'])) {
    //                 $productGroups[$productType]['grades'] = [];
    //             }
    //             if (!in_array($grade, $productGroups[$productType]['grades'])) {
    //                 $productGroups[$productType]['grades'][] = $grade;
    //             }

    //             // Grupkan berdasarkan ukuran
    //             if (!isset($productGroups[$productType]['sizes'])) {
    //                 $productGroups[$productType]['sizes'] = [];
    //             }
    //             if (!in_array($size, $productGroups[$productType]['sizes'])) {
    //                 $productGroups[$productType]['sizes'][] = $size;
    //             }

    //             // Grupkan berdasarkan koneksi
    //             if (!isset($productGroups[$productType]['connections'])) {
    //                 $productGroups[$productType]['connections'] = [];
    //             }
    //             if (!in_array($connection, $productGroups[$productType]['connections'])) {
    //                 $productGroups[$productType]['connections'][] = $connection;
    //             }
    //         }

    //         // Mengembalikan response dalam bentuk JSON
    //         return response()->json($productGroups);
    //     } else {
    //         // Mengembalikan error jika file tidak ditemukan
    //         return response()->json(['error' => 'File not found'], 404);
    //     }
    // }
    // public function getProductGroup()
    // {
    //     // Path to the JSON file
    //     $filePath = database_path('json/data.json');

    //     // Check if the JSON file exists
    //     if (File::exists($filePath)) {
    //         // Read the contents of the JSON file
    //         $jsonString = File::get($filePath);
    //         $data = json_decode($jsonString);

    //         // Initialize an array to store product counts
    //         $productCounts = [];

    //         // Loop through each product in the data
    //         foreach ($data as $product) {
    //             $productType = $product->product_type;
    //             $grade = $product->grade;

    //             // Increment the count for the product type
    //             if (!isset($productCounts[$productType])) {
    //                 $productCounts[$productType] = [];
    //             }
    //             if (!isset($productCounts[$productType][$grade])) {
    //                 $productCounts[$productType][$grade] = 1;
    //             } else {
    //                 $productCounts[$productType][$grade]++;
    //             }
    //         }

    //         // Return the product counts
    //         return response()->json($productCounts);
    //     } else {
    //         // File not found
    //         return response()->json(['error' => 'File not found'], 404);
    //     }
    // }

    public function getProductGroup()
    {
        // Path to the JSON file
        $filePath = database_path('json/data.json');

        // Check if the JSON file exists
        if (File::exists($filePath)) {
            // Read the contents of the JSON file
            $jsonString = File::get($filePath);
            $data = json_decode($jsonString);

            // Initialize an array to store the counts for each product type
            $productTypeCounts = [];

            // Loop through each product in the data
            foreach ($data as $product) {
                $productType = $product->product_type;

                // Increment the count for the current product type
                if (!isset($productTypeCounts[$productType])) {
                    $productTypeCounts[$productType] = 1;
                } else {
                    $productTypeCounts[$productType]++;
                }
            }

            // Return the counts for each product type
            return response()->json(['product_type_counts' => $productTypeCounts]);
        } else {
            // File not found
            return response()->json(['error' => 'File not found'], 404);
        }
    }

    public function getProductGradeCounts(Request $request)
    {
        // Read the JSON file containing product data
        $filePath = database_path('/json/data.json');
        $productType = $request->input('type', 'all');
        if (File::exists($filePath)) {
            // Read the JSON file contents
            $jsonData = File::get($filePath);

            // Decode the JSON data into an array
            $dataArray = json_decode($jsonData, true);

            // Initialize an associative array to store grade counts
            $gradeCounts = [];

            // Loop through each product in the data
            foreach ($dataArray as $product) {
                // Check if the product type matches the requested value
                if ($product['product_type'] === $productType) {
                    // Get the grade of the product
                    $grade = $product['grade'];

                    // If the grade exists in the grade counts array, increment the count
                    if (isset($gradeCounts[$grade])) {
                        $gradeCounts[$grade]++;
                    } else {
                        // Otherwise, initialize the count for the grade
                        $gradeCounts[$grade] = 1;
                    }
                }
            }

            // Return the associative array containing grade counts
            return $gradeCounts;
        } else {
            // File not found
            return [];
        }
    }

    public function getProductSizeCounts(Request $request)
    {
        // Read the JSON file containing product data
        $filePath = database_path('/json/data.json');
        $productType = $request->input('type', 'all');
        $productGrade = $request->input('grade', 'all');

        if (File::exists($filePath)) {
            // Read the JSON file contents
            $jsonData = File::get($filePath);

            // Decode the JSON data into an array
            $dataArray = json_decode($jsonData, true);

            // Initialize an associative array to store size counts
            $sizeCounts = [];

            // Loop through each product in the data
            foreach ($dataArray as $product) {
                // Check if the product type and grade match the requested values
                if ($product['product_type'] === $productType && $product['grade'] === $productGrade) {
                    // Get the size of the product
                    $size = $product['size'];

                    // If the size exists in the size counts array, increment the count
                    if (isset($sizeCounts[$size])) {
                        $sizeCounts[$size]++;
                    } else {
                        // Otherwise, initialize the count for the size
                        $sizeCounts[$size] = 1;
                    }
                }
            }

            // Return the associative array containing size counts
            return $sizeCounts;
        } else {
            // File not found
            return [];
        }
    }

    public function getProductConnectionCounts(Request $request)
    {
        // Read the JSON file containing product data
        $filePath = database_path('/json/data.json');
        $productType = $request->input('type', 'all');
        $productGrade = $request->input('grade', 'all');
        $productSize = $request->input('size', 'all');

        if (File::exists($filePath)) {
            // Read the JSON file contents
            $jsonData = File::get($filePath);

            // Decode the JSON data into an array
            $dataArray = json_decode($jsonData, true);

            // Initialize an associative array to store connection counts
            $connectionCounts = [];

            // Loop through each product in the data
            foreach ($dataArray as $product) {
                // Check if the product type, grade, and size match the requested values
                if ($product['product_type'] === $productType && $product['grade'] === $productGrade && $product['size'] === $productSize) {
                    // Get the connection of the product
                    $connection = $product['connection'];

                    // If the connection exists in the connection counts array, increment the count
                    if (isset($connectionCounts[$connection])) {
                        $connectionCounts[$connection]++;
                    } else {
                        // Otherwise, initialize the count for the connection
                        $connectionCounts[$connection] = 1;
                    }
                }
            }

            // Return the associative array containing connection counts
            return $connectionCounts;
        } else {
            // File not found
            return [];
        }
    }


}
