<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Banner;
use App\Models\Catalog;
use App\Models\Content;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $views = Content::all()->sum('views');
        $content = Content::where('topic', '!=', 'Arsip')->count();
        $member = Anggota::all()->count();
        $cars = Anggota::whereNotNull('kendaraan_jenis')->count();
        $banner = Banner::all()->count();
        $history = Content::where('topic', '=', 'Arsip')->count();
        $product = Catalog::all()->count();
        $owner = Catalog::distinct('product_owner')->count('product_owner');

        return view('admin.home')
        ->with('views', $views)
        ->with('content', $content)
        ->with('member', $member)
        ->with('cars', $cars)
        ->with('banner', $banner)
        ->with('history', $history)
        ->with('product', $product)
        ->with('owner', $owner);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
