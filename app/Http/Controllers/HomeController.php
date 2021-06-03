<?php

namespace App\Http\Controllers;

use App\Models\TenderGuru;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return View|Factory
     */
    public function index()
    {
        //return view('home');
        return view('search');
    }


    /**
     * Поиск по слову
     *
     * @param string $kwords
     * @return View|Factory
     */
    public function search(string $kwords)
    {
        $response= Http::get(TenderGuru::url, [
            'api_code'=> TenderGuru::api_code,
            'dtype'=> TenderGuru::dtype,
            'kwords'=> $kwords,
            'mode'  => 'zajavka'
        ]);


        if ($response->successful())
        {
            $response= (string)$response;
            $decode= json_decode($response, true);
            foreach ($decode as $key=> $value)
            {
                if (!(int)$value['Win'])
                    unset($decode[$key]);
            }
            #print_r ($decode);
            return view('search', compact('kwords', 'decode'));
        }
    }


    public function save()
    {

    }
}
