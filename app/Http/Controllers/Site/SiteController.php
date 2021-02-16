<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Imovel;

class SiteController extends Controller
{
    protected $totalPage = 1;

    public function index()
    {

        /*orderBy ou latest()*/
        $imoveis = Imovel::latest()->paginate($this->totalPage);
        return view('site.home.index', compact('imoveis'));
    }
}
