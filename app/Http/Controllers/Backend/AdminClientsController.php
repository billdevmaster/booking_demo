<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Clients;

class AdminClientsController extends Controller
{
    //
    public function index(Request $request)
    {
        $menu = "clients";
        return view('backend.clients.index', compact("menu"));
    }

    public function get_list() {
        $clients_list = Clients::where("is_delete", 'N')->get();
        return Datatables::of($clients_list)
            ->addIndexColumn()
            ->make(true);
    }

    public function save(Request $request) {
        if ($request->id == 0) {
            $client = new Clients();
        } else {
            $client = Clients::find($request->id);
        }
        $client->username = $request->username;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->save();
        if ($request->id == 0) {
            return back()->with("added", "client is successfully added");
        } else {
            return back()->with("updated", "client is successfully udpated");
        }
    }

    public function remove(Request $request) {
        $client = Clients::find($request->id);
        $client->is_delete = 'Y';
        $client->save();
        return response(json_encode(['success' => true]));
    }
}