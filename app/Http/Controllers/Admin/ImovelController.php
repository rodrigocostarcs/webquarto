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
        $key = env('MAPS_KEY', null);

        $address = urlencode($request->cep);

        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&key='.$key;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($ch);
        curl_close($ch);
        $endereco = json_decode($res, true);

       $data = $request->all();

       if( $request->file('foto')->isValid()){


            $nameFile = Str::of($request->titulo)
                    ->slug('-').date('Hms').'.'.$request->file('foto')->getClientOriginalExtension();

            $foto = $request->file('foto')->storeAs('imoveis',$nameFile);
            $data['foto'] = $foto;
       }

        $imovel = Imovel::create([
            'titulo' => $data['titulo'],
            'foto' => $data['foto'],
            'endereco' => $endereco['results'][0]['address_components'][1]['long_name'],
            'cep' => $data['cep'],
            'cidade' => $endereco['results'][0]['address_components'][3]['long_name'],
            'estado' => $endereco['results'][0]['address_components'][4]['long_name'],
            'latitude' => $endereco['results'][0]['geometry']['location']['lat'],
            'longitude' => $endereco['results'][0]['geometry']['location']['lng'],
            'descricao' => $data['descricao'],
            'valor' => $data['valor']
        ]);

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

        if($data['cep'] != $imovel->cep){
            $key = env('MAPS_KEY', null);
            $address = urlencode($request->cep);
            $url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&key='.$key;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $res = curl_exec($ch);
            curl_close($ch);
            $endereco = json_decode($res, true);

            $imovel->update([
                'titulo' => $data['titulo'],
                'foto' => $data['foto'],
                'endereco' => $endereco['results'][0]['address_components'][1]['long_name'],
                'cep' => $data['cep'],
                'cidade' => $endereco['results'][0]['address_components'][3]['long_name'],
                'estado' => $endereco['results'][0]['address_components'][4]['long_name'],
                'latitude' => $endereco['results'][0]['geometry']['location']['lat'],
                'longitude' => $endereco['results'][0]['geometry']['location']['lng'],
                'descricao' => $data['descricao'],
                'valor' => $data['valor']
            ]);

            return redirect()
                ->route('imovel.index')
                ->with('message', 'Imóvel atualizado com sucesso!');
        }else{

            $imovel->update($data);

            return redirect()
                ->route('imovel.index')
                ->with('message', 'Imóvel atualizado com sucesso!');
        }

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
