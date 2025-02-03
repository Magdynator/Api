<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB\Client;

class apicontroller extends Controller
{
    //
    public function index(){
        return response()->json([
            'state' => 'done'
        ]);
    }

    public function getdata(){
        $client = new Client('mongodb://localhost:27017/');
        $database = $client->test;
        $collection = $database->test;
        $post = $collection->find()->toArray();
        return response()->json($post); 
    }

    public function closerHis($longitude, $latitude, $radius = 1){
        $client = new Client('mongodb://localhost:27017/');
        $collection = $client->test->test;
        $post = $collection->find([
            'geolocation' => [
                '$near' => [
                    '$geometry' => [
                        'type' => 'Point',
                        'coordinates' => [(float) $longitude, (float) $latitude]
                    ],
                ]
            ]
        ]);
        return iterator_to_array($post);

    }

    public function closer10His($longitude, $latitude, $radius = 1){
        $client = new Client('mongodb://localhost:27017/');
        $collection = $client->test->test;
        $post = $collection->find([
            'geolocation' => [
                '$near' => [
                    '$geometry' => [
                        'type' => 'Point',
                        'coordinates' => [(float) $longitude, (float) $latitude]
                    ],
                ]
            ]
        ]);
        $count = iterator_to_array($post);
       
        return (array_slice($count, 0, 9));

    }

}
