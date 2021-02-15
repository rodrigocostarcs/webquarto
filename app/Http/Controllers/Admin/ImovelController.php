<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateImovelRequest;
use Illuminate\Http\Request;
use App\Models\Admin\Imovel;

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
        $imovel = Imovel::create($request->all());

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

        $imovel->update($request->all());

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
