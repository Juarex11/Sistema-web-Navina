<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $query = Client::query();
        if ($request->filled('search')){
            $search = $request->search;
            $query->where(function ($q) use ($search){
                $q->where('name','like',"%{$search}%")
                ->orWhere('lastname','like',"%{$search}%")
                ->orWhere('email','like',"%{$search}%")
                ->orWhere('district','like',"%{$search}%");
            });
        }
        $clients = $query->latest()->paginate(5)->withQueryString();
        return view("admin.clients.index", compact("clients"));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'email'    => 'required|email|unique:clients,email',
            'phone'    => 'required|string|max:20',
            'district' => 'required|string|max:255',
            'message'  => 'required|string'
        ]);
        Client::create($data);
        return back()->with('success', 'Correo enviado Correctamente');;
    }

    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'email'    => 'required|email',
            'phone'    => 'required|string|max:20',
            'district' => 'required|string|max:255',
            'message'  => 'required|string'
        ]);
        $client->update($data);
        return back();
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return back();
    }
}
