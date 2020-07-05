<?php

namespace App\Http\Controllers;

use App\ArtikelModel;
use ArtikelSeeder;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = ArtikelModel::get();
        return view('artikel.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artikel.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new ArtikelModel();
        $model->judul = $request->judul;
        $model->isi = $request->isi;
        $model->slug = $request->slug;
        $model->tag = implode(",",$request->tag);

        $model->save();

        return redirect('artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ArtikelModel::where(['id' => $id])->first();
        $data = collect($data)->merge([
            'tag' => explode(',', $data->tag)
        ]);
        $data = json_decode(json_encode($data));
        return view('artikel.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ArtikelModel::where(['id' => $id])->first();
        return view('artikel.form', compact('data'));
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
        $model = ArtikelModel::where(['id' => $id])->first();
        
        $model->judul = $request->judul;
        $model->isi = $request->isi;
        $model->slug = $request->slug;
        $model->tag = $request->tag;
        $model->update();
        
        return redirect('artikel/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ArtikelModel::where(['id' => $id])->delete();
        return $data;
    }
}
