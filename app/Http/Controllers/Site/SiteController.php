<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Imovel;

class SiteController extends Controller
{
    protected $totalPage = 5;

    public function index()
    {

        /*orderBy ou latest()*/
        $imoveis = Imovel::latest()->paginate($this->totalPage);
        return view('site.home.index', compact('imoveis'));
    }

    public function detalhes($id)
    {

        /*orderBy ou latest()*/
        $imovel = Imovel::find($id);

        $imoveisProximos = Imovel::select(Imovel::raw('*, SQRT(
            POW(69.1 * (latitude - '.$imovel->latitude.'), 2) +
            POW(69.1 * ('.$imovel->longitude.' - longitude) * COS(latitude / 57.3), 2)) AS distance'))
            ->havingRaw('distance < ?', [20])
            ->where('id','!=',$imovel->id)
            ->orderBy('distance', 'ASC')
            ->paginate($this->totalPage);

        return view('site.home.detalhes', compact('imovel','imoveisProximos'));
    }

    public function search(Request $request)
    {
        $filtro = $request->except('_token');

        $imoveis = Imovel::where('cidade', 'LIKE', "%{$request->search}%")
            ->paginate($this->totalPage);
        //toSql();
        //dd($imoveis);

        return view('site.home.index', compact('imoveis', 'filtro'));
    }
}
