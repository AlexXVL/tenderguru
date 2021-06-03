<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SearchRequest;
use App\Models\SearchRequestData;
use App\Models\TenderGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TenderGuruController extends Controller
{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
//        $response= Http::get(TenderGuru::url, [
//            'api_code'=> TenderGuru::api_code,
//            'dtype'=> TenderGuru::dtype,
//            'kwords'=> 'kaspersky',
//            'mode'  => 'zajavka'
//        ]);
//
//
//        if ($response->successful())
//        {
//            $response= (string)$response;
//            $decode= json_decode($response, true);
//            #print (count($decode));
//            foreach ($decode as $key=> $value)
//            {
//                if (!(int)$value['Win'])
//                    unset($decode[$key]);
//            }
//            #print (count($decode));
//            print_r ($decode);
//        }
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     */
    public function store(Request $request)
    {
        if (is_null($request->input('kwords')))
            exit;

        $request->merge(['user_id'=> Auth::user()->id]);
        $search_request= new SearchRequest();
        $search_request->user_id= $request->input('user_id');
        $search_request->kwords= $request->input('kwords');
        $search_request->save();

        foreach ($request->input('data') as $item)
        {
            $search_request_data= new SearchRequestData();
            $search_request_data->search_request_id= $search_request->id;
            $search_request_data->data= $item;
            $search_request_data->save();
        }
    }
}
