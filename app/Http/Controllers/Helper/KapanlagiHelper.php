<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KapanlagiHelper extends Controller
{

    private $main_url = 'https://d.kapanlaginetwork.com/banner/test';

    public function FetchProvinces()
    {
        try {

            $provincesJsonUrl = $this->main_url . "/province.json";
            $response         = Http::acceptJson()->get($provincesJsonUrl);
            if (!$response)
                throw new \Exception('Error when fetching data provinces from d.kapanlagi.com');

            $decode             = json_decode($response->body());
            $collectionProvince = collect($decode);
            $grouped            = $collectionProvince->mapWithKeys(
                function ($item, $key) {
                    return [$item->kode => $item->nama];
                }
            );

            return [
                'status' => 1,
                'data'   => $grouped->all()
            ];

        } catch (\Exception $e) {
            return [
                'status'  => 0,
                'message' => $e->getMessage()
            ];
        }
    }

    public function FetchCities()
    {
        try {

            $citiesUrl = $this->main_url . "/city.json";
            $response  = Http::acceptJson()->get($citiesUrl);
            if (!$response)
                throw new \Exception('Error when fetching data cities from d.kapanlagi.com');

            $decode     = json_decode($response->body());
            $collection = collect($decode);
            $grouped    = $collection->mapWithKeys(
                function ($item, $key) {
                    return [$item->kode => $item->nama];
                }
            );

            return [
                'status' => 1,
                'data'   => $grouped->all()
            ];

        } catch (\Exception $e) {
            return [
                'status'  => 0,
                'message' => $e->getMessage()
            ];
        }
    }

}
