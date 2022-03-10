<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GuestBook_Model;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class BukutamuController extends Controller
{
    public function index()
    {
        $records      = GuestBook_Model::latest()->get();
        $inertiaPages = "Buku_tamu/Index";
        $viewData     = ['records' => $records];
        return Inertia::render($inertiaPages, $viewData);
    }

    public function create()
    {
        return Inertia::render('Buku_tamu/Create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'firstname' => 'required',
            'lastname'  => 'required',
        ]);

        //create post
        $data   = [
            'firstname'    => $request->firstname,
            'lastname'     => $request->lastname,
            'organization' => $request->organization,
            'address'      => $request->address
        ];
        $create = GuestBook_Model::create($data);

        if ($create) {
            return Redirect::route('buku-tamu.index')->with('message', 'Data Berhasil Disimpan !');
        }
    }

    public function edit($id)
    {
        $mGuestBook = new GuestBook_Model();
        $get        = $mGuestBook->findOrFail($id);
        return Inertia::render('Buku_tamu/Edit', [
            'record' => $get
        ]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'firstname' => 'required',
            'lastname'  => 'required',
        ]);

        $params = [
            'firstname'    => $request->firstname,
            'lastname'     => $request->lastname,
            'organization' => $request->organization,
            'address'      => $request->address
        ];


        $book   = new GuestBook_Model();
        $update = $book->where('id', $id)->update($params);

        if ($update) {
            return Redirect::route('buku-tamu.index')->with('message', 'Data Berhasil Diupdate !');
        }
    }

    public function destroy($id)
    {

        $mGuestBook = new GuestBook_Model();
        $get        = $mGuestBook->findOrFail($id);
        $delete     = $mGuestBook->where('id', $id)->delete();
        if ($delete) {
            return Redirect::route('buku-tamu.index')->with('message', 'Data Berhasil Dihapus !');
        }
    }

}
