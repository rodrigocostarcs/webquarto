<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateImovelRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\Imovel;
use Illuminate\Support\Str;

class ImovelController extends Controller
{

    protected $totalPage = 1;

    public function index()
    {
        /*orderBy ou latest()*/
        $imoveis = Imovel::latest()->paginate($this->totalPage);

        return view('admin.imovel.index', compact('imoveis'));
    }

    public function create()
    {
        return view('admin.imovel.create');
    }

    public function store(StoreUpdateImovelRequest $request)
    {
       $data = $request->all();

       if( $request->file('foto')->isValid()){


            $nameFile = Str::of($request->titulo)
                    ->slug('-').date('Hms').'.'.$request->file('foto')->getClientOriginalExtension();

            $foto = $request->file('foto')->storeAs('imoveis',$nameFile);
            $data['foto'] = $foto;
       }

        $imovel = Imovel::create($data);

        if ($imovel)
            return redirect()->route('imovel.index')->with('message', 'Imóvel cadastrado com sucesso!');
        else
            return back()->withInput();
    }

    public function show($id)
    {
        $imovel = Imovel::find($id);

        if (!$imovel) {

            return redirect()->route('imovel.index');
        }

        return view('admin.imovel.show', compact('imovel'));
    }

    public function edit($id)
    {
        $imovel = Imovel::find($id);

        if (!$imovel) {

            return redirect()->route('imovel.index');
        }

        return view('admin.imovel.edit', compact('imovel'));
    }

    public function update(StoreUpdateImovelRequest $request, $id)
    {
        $imovel = Imovel::find($id);

        if (!$imovel) {

            return back()->withInput();
        }

        $data = $request->all();

        if($request->file('foto') && $request->file('foto')->isValid()){

             if(Storage::exists($imovel->foto))
                    Storage::delete($imovel->foto);

             $nameFile = Str::of($request->titulo)
                     ->slug('-').date('Hms').'.'.$request->file('foto')->getClientOriginalExtension();

             $foto = $request->file('foto')->storeAs('imoveis',$nameFile);
             $data['foto'] = $foto;
        }

        $imovel->update($data);

        return redirect()
            ->route('imovel.index')
            ->with('message', 'Imóvel atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $imovel = Imovel::find($id);

        if (!$imovel) {

            return back();
        }

        if(Storage::exists($imovel->foto))
            Storage::delete($imovel->foto);

        $delete = $imovel->delete();

        if ($delete)
            return redirect()
                ->route('imovel.index')
                ->with('message', 'Imóvel deletado com sucesso!');
        else
            return back();
    }

    public function search(Request $request)
    {
        $filtro = $request->except('_token');

        $imoveis = Imovel::where('titulo', 'LIKE', "%{$request->search}%")
            ->paginate($this->totalPage);
        //toSql();
        //dd($imoveis);

        return view('admin.imovel.index', compact('imoveis', 'filtro'));
    }
}
