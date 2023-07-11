<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function details($id){
        $service = Service::find($id);
        $details = $service->details;
        return view('admin.details.index', compact('details','service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.details.create');
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
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'detail_image' => 'image|nullable|max:5999',
            'service' => 'required',
        ]);

        if ($request->hasFile('detail_image')) {
            //nom de l'image avec extension
            $fileNameWithExt = $request->file('detail_image')->getClientOriginalName();
            //nom  du fichier
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //extension
            $ext = $request->file('detail_image')->getClientOriginalExtension();
            //nom de l'image to store
            $fileNameToStrore = $filename . '_' . time() . '.' . $ext;
            //upload image et creation du dossier de stockage
            $path = $request->file('detail_image')->storeAs('public/detail_images', $fileNameToStrore);
        } else {
            $fileNameToStrore = 'noimage.jpg';
        }


        $detail = new Detail();
        $detail->detail_titre = $request->input('name');
        $detail->detail_description = $request->input('description');
        $detail->service_id = $request->input('service');
        $detail->detail_image = $fileNameToStrore;

        $detail->save();
        return back()->with('status', 'Le détail a été enregistré avec succès !!');
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
        $detail = Detail::find($id);
        return view('admin.details.edit', compact('detail'));
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
        $this->validate($request, [
            'detail_titre' => 'required',
            'detail_description' => 'required',
            'detail_image' => 'image|nullable|max:5999',
            'service_id' => 'required',
        ]);

        $detail = Detail::find($id);
        $detail->detail_titre = $request->input('detail_titre');
        $detail->detail_description = $request->input('detail_description');
        $detail->service_id = $request->input('service_id');

        if ($request->hasFile('detail_image')) {
            //nom de l'image avec extension
            $fileNameWithExt = $request->file('detail_image')->getClientOriginalName();
            //nom  du fichier
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //extension
            $ext = $request->file('detail_image')->getClientOriginalExtension();
            //nom de l'image to store
            $fileNameToStrore = $filename . '_' . time() . '.' . $ext;
            //upload image et creation du dossier de stockage
            $path = $request->file('detail_image')->storeAs('public/detail_images', $fileNameToStrore);

            if ($detail->detail_image != 'noimage.jpg') {
                Storage::delete('public/detail_images/' . $detail->detail_image);
            }

            $detail->detail_image = $fileNameToStrore;
        }

        $detail->update();

        return back()->with('status', 'Le détail a été modifié avec succès !!');
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
        $detail = Detail::find($id);

        if ($detail->detail_image != 'noimage.jpg') {
            Storage::delete('public/service_images/' . $detail->detail_image);
        }

        $detail->delete();

        return back()->with('status', 'Le détail a été supprimé avec succès !!');
    }
}
