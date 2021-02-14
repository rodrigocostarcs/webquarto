<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Imovel;
class ImovelController extends Controller
{
    public function index()
    {

       $imoveis = Imovel::all();

       return view('admin.imovel.index',compact('imoveis'));
    }

    public function create()
    {
        return view('admin.imovel.create');
    }

    public function store(Request $request)
    {
        $imovel = Imovel::create($request->all());

        if($imovel)
            return redirect()->route('imovel.index');
        else
            return back()->withInput();
    }
}
