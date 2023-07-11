<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Nouvelle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NouvelleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nouvelles = Nouvelle::all();
        return view('admin.nouvelles.index',compact('nouvelles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all()->where('status',1)->pluck('service_name','service_name');
        return view('admin.nouvelles.create', compact('services'));
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
            'titre' => 'required',
            'description' => 'required',
            'nouvelle_image' => 'image|nullable|max:5999',
            'sujet' => 'required',
            'service' => 'required',

        ]);

        if ($request->hasFile('nouvelle_image')) {
            //nom de l'image avec extension
            $fileNameWithExt = $request->file('nouvelle_image')->getClientOriginalName();
            //nom  du fichier
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //extension
            $ext = $request->file('nouvelle_image')->getClientOriginalExtension();
            //nom de l'image to store
            $fileNameToStrore = $filename . '_' . time() . '.' . $ext;
            //upload image et creation du dossier de stockage
            $path = $request->file('nouvelle_image')->storeAs('public/nouvelle_images', $fileNameToStrore);
        } else {
            $fileNameToStrore = 'noimage.jpg';
        }


        $nouvelle = new Nouvelle();
        $nouvelle->nouvelle_titre = $request->input('titre');
        $nouvelle->nouvelle_contenu = $request->input('description');
        $nouvelle->sujet = $request->input('sujet');
        $nouvelle->service  = $request->input('service');
        $nouvelle->nouvelle_image = $fileNameToStrore;
        $nouvelle->status = 1;

        $nouvelle->save();
        return back()->with('status', 'La nouvelle a été enregistrée avec succès !!');
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
        $nouvelle = Nouvelle::find($id);
        $services = Service::all()->where('status',1)->pluck('service_name','service_name');
        return view('admin.nouvelles.edit',compact('nouvelle', 'services'));
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
            'nouvelle_titre' => 'required',
            'nouvelle_contenu' => 'required',
            'nouvelle_image' => 'image|nullable|max:5999',
            'sujet' => 'required',
            'service' => 'required',
        ]);

        $nouvelle = Nouvelle::find($id);
        $nouvelle->nouvelle_titre = $request->input('nouvelle_titre');
        $nouvelle->nouvelle_contenu = $request->input('nouvelle_contenu');
        $nouvelle->sujet = $request->input('sujet');
        $nouvelle->service  = $request->input('service');
        $nouvelle->status = 1;

        if ($request->hasFile('nouvelle_image')) {
            //nom de l'image avec extension
            $fileNameWithExt = $request->file('nouvelle_image')->getClientOriginalName();
            //nom  du fichier
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //extension
            $ext = $request->file('nouvelle_image')->getClientOriginalExtension();
            //nom de l'image to store
            $fileNameToStrore = $filename . '_' . time() . '.' . $ext;
            //upload image et creation du dossier de stockage
            $path = $request->file('nouvelle_image')->storeAs('public/nouvelle_images', $fileNameToStrore);

            if ($nouvelle->nouvelle_image != 'noimage.jpg') {
                Storage::delete('public/nouvelle_images/' . $nouvelle->nouvelle_image);
            }

            $nouvelle->nouvelle_image = $fileNameToStrore;
        }

        $nouvelle->update();

        return redirect('/nouvelles')->with('status', 'La nouvelle a été modifiée avec succès !!');
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
        $nouvelle = Nouvelle::find($id);

        if ($nouvelle->nouvelle_image != 'noimage.jpg') {
            Storage::delete('public/nouvelle_images/' . $nouvelle->nouvelle_image);
        }

        $nouvelle->delete();

        return back()->with('status', 'La nouvelle a été supprimée avec succès !!');
    }

    public function activer_nouvelle($id)
    {

        $nouvelle = Nouvelle::find($id);

        $nouvelle->status = 1;

        $nouvelle->save();

        return back();
    }
    public function desactiver_nouvelle($id)
    {

        $nouvelle = Nouvelle::find($id);

        $nouvelle->status = 0;

        $nouvelle->save();

        return back();
    }
}
