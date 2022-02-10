<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helper\KapanlagiHelper;
use Illuminate\Http\Request;
use App\Models\GuestBook_Model;

class GuestbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dataView   = ['guest_books' => NULL];
        $dataGb     = NULL;
        $mGuestBook = new GuestBook_Model();
        $fetchGb    = $mGuestBook->get();
        if (!empty($fetchGb)) {
            $dataGb = $fetchGb;
        }
        $kapanlagi     = new KapanlagiHelper();
        $fetchProvinsi = $kapanlagi->FetchProvinces();
        $provinces     = $fetchProvinsi['data'];
        $fetchCities   = $kapanlagi->FetchCities();
        $cities        = $fetchCities['data'];
        foreach ($dataGb as $dt) {
            $dt->prov_name = $provinces[$dt->province_id];
            $dt->city_name = $cities[$dt->city_id];
        }

        $dataView['guest_books'] = $dataGb;
        return view('guest_book/index', $dataView);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        return view('guest_book/create', $dataView);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
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

        return redirect()->route('guest-book.create')->with('success', 'Success add data');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataView     = ['provinces' => NULL, 'cities' => NULL, 'guest_book' => NULL];
        $mGuestBook   = new GuestBook_Model();
        $get          = $mGuestBook->findOrFail($id);
        $kapanlagi    = new KapanlagiHelper();
        $getProvinces = $kapanlagi->FetchProvinces();
        if ($getProvinces["status"] == 1 and !empty($getProvinces["data"])) {
            $dataView['provinces'] = $getProvinces["data"];
        }

        $getCities = $kapanlagi->FetchCities();
        if ($getCities["status"] == 1 and !empty($getCities["data"])) {
            $dataView['cities'] = $getCities["data"];
        }
        $dataView['guest_book'] = $get;
        return view('guest_book/detail', $dataView);
    }

    public function update(Request $request, $guest_book_id)
    {
        $this->validate($request, [
            'firstname'    => 'required',
            'lastname'     => 'required',
            'organization' => 'required',
            'province_id'  => 'required|numeric',
            'city_id'      => 'required|numeric',
            'address'      => 'required',
        ]);

        $input  = $request->all();
        $mGB    = new GuestBook_Model();
        $check  = $mGB->find($guest_book_id);
        $update = $check->update($input);
        return redirect()->route('guest-book.show', $guest_book_id)->with('success', 'Success update data');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($guest_book_id)
    {
        $mGB    = new GuestBook_Model();
        $check  = $mGB->findOrFail($guest_book_id);
        $delete = $check->delete();

        return redirect()->route('guest-book.index')->with('success', 'Success delete data');
    }
}
