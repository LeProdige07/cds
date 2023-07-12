<?php

namespace App\Http\Controllers;

use App\Models\Temoignage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemoignageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $temoignages = Temoignage::all();

        return view('admin.temoignages.index', compact('temoignages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.temoignages.create');
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
            'temoin_image' => 'image|nullable'
        ]);

        if ($request->hasFile('temoin_image')) {
            //nom de l'image avec extension
            $fileNameWithExt = $request->file('temoin_image')->getClientOriginalName();
            //nom  du fichier
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //extension
            $ext = $request->file('temoin_image')->getClientOriginalExtension();
            //nom de l'image to store
            $fileNameToStrore = $filename . '_' . time() . '.' . $ext;
            //upload image et creation du dossier de stockage
            $path = $request->file('temoin_image')->storeAs('public/temoin_images', $fileNameToStrore);
        } else {
            $fileNameToStrore = 'noimage.jpg';
        }


        $temoin = new Temoignage();
        $temoin->temoin_name = $request->input('name');
        $temoin->temoin_contenu = $request->input('description');
        $temoin->temoin_image = $fileNameToStrore;
        $temoin->status = 1;

        $temoin->save();
        return back()->with('status', 'Le témoignage a été enregistré avec succès !!');
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
        $temoignage = Temoignage::find($id);
        return view('admin.temoignages.edit', compact('temoignage'));
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
            'temoin_name' => 'required',
            'temoin_contenu' => 'required',
            'temoin_image' => 'image|nullable'
        ]);

        $temoin = Temoignage::find($id);
        $temoin->temoin_name = $request->input('temoin_name');
        $temoin->temoin_contenu = $request->input('temoin_contenu');

        if ($request->hasFile('temoin_image')) {
            //nom de l'image avec extension
            $fileNameWithExt = $request->file('temoin_image')->getClientOriginalName();
            //nom  du fichier
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //extension
            $ext = $request->file('temoin_image')->getClientOriginalExtension();
            //nom de l'image to store
            $fileNameToStrore = $filename . '_' . time() . '.' . $ext;
            //upload image et creation du dossier de stockage
            $path = $request->file('temoin_image')->storeAs('public/temoin_images', $fileNameToStrore);

            if ($temoin->temoin_image != 'noimage.jpg') {
                Storage::delete('public/temoin_images/' . $temoin->temoin_image);
            }

            $temoin->temoin_image = $fileNameToStrore;
        }

        $temoin->update();

        return redirect('/temoignages')->with('status', 'Le témoignage a été modifié avec succès !!');
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
        $temoin = Temoignage::find($id);

        if ($temoin->temoin_image != 'noimage.jpg') {
            Storage::delete('public/temoin_images/' . $temoin->temoin_image);
        }

        $temoin->delete();

        return back()->with('status', 'Le témoignage a été supprimé avec succès !!');
    }

    public function activer_temoignage($id)
    {

        $temoignage = Temoignage::find($id);

        $temoignage->status = 1;

        $temoignage->save();

        return back();
    }
    public function desactiver_temoignage($id)
    {

        $temoignage = Temoignage::find($id);

        $temoignage->status = 0;

        $temoignage->save();

        return back();
    }
}
