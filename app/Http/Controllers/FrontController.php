<?php

namespace App\Http\Controllers;

use App\Models\GuestBook_Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Helper\KapanlagiHelper;

class FrontController extends Controller
{
    public function index()
    {
        $dataView     = ['provinces' => NULL, 'cities' => NULL];
        $kapanlagi    = new KapanlagiHelper();
        $getProvinces = $kapanlagi->FetchProvinces();
        if ($getProvinces["status"] == 1 and !empty($getProvinces["data"])) {
            $dataView['provinces'] = $getProvinces["data"];
        }

        $getCities = $kapanlagi->FetchCities();
        if ($getCities["status"] == 1 and !empty($getCities["data"])) {
            $dataView['cities'] = $getCities["data"];
        }
        return view('front', $dataView);
    }

    public function submit(Request $request)
    {
        $this->validate($request, [
            'firstname'    => 'required',
            'lastname'     => 'required',
            'organization' => 'required',
            'province_id'  => 'required|numeric',
            'city_id'      => 'required|numeric',
            'address'      => 'required',
        ]);

        $input      = $request->all();
        $mGuestBook = new GuestBook_Model();
        $mGuestBook->create($input);

        return redirect()->route('front')->with('success', 'Success submit guest book');
    }
}
