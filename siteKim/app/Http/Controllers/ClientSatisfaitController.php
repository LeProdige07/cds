<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientSatisfait;
use Illuminate\Support\Facades\Storage;

class ClientSatisfaitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clientsatisfaits = ClientSatisfait::all();
        return view('admin.clientsatisfait.index', compact('clientsatisfaits'));
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
        $this->validate($request, [
            'name' => 'required',
            'clientsatisfait_image' => 'image|nullable|max:5999',
        ]);

        if ($request->hasFile('clientsatisfait_image')) {
            //nom de l'image avec extension
            $fileNameWithExt = $request->file('clientsatisfait_image')->getClientOriginalName();
            //nom  du fichier
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //extension
            $ext = $request->file('clientsatisfait_image')->getClientOriginalExtension();
            //nom de l'image to store
            $fileNameToStrore = $filename . '_' . time() . '.' . $ext;
            //upload image et creation du dossier de stockage
            $path = $request->file('clientsatisfait_image')->storeAs('public/clientsatisfait_images', $fileNameToStrore);
        } else {
            $fileNameToStrore = 'noimage.jpg';
        }


        $clientsatisfait = new ClientSatisfait();
        $clientsatisfait->designation = $request->input('name');
        $clientsatisfait->status = 1;
        $clientsatisfait->logo_client = $fileNameToStrore;

        $clientsatisfait->save();
        return back()->with('status', 'Le partenaire a ete enregistré avec succès !!');
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
        $clientsatisfait = ClientSatisfait::find($id);
        return view('admin.clientsatisfait.edit', compact('clientsatisfait'));
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
            'designation' => 'required',
            'logo_client' => 'image|nullable|max:5999',
        ]);

        $clientsatisfait = ClientSatisfait::find($id);
        $clientsatisfait->designation = $request->input('designation');

        if ($request->hasFile('logo_client')) {
            //nom de l'image avec extension
            $fileNameWithExt = $request->file('logo_client')->getClientOriginalName();
            //nom  du fichier
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //extension
            $ext = $request->file('logo_client')->getClientOriginalExtension();
            //nom de l'image to store
            $fileNameToStrore = $filename . '_' . time() . '.' . $ext;
            //upload image et creation du dossier de stockage
            $path = $request->file('logo_client')->storeAs('public/clientsatisfait_images', $fileNameToStrore);

            if ($clientsatisfait->clientsatisfait_image != 'noimage.jpg') {
                Storage::delete('public/clientsatisfait_images/' . $clientsatisfait->clientsatisfait_image);
            }

            $clientsatisfait->logo_client = $fileNameToStrore;
        }

        $clientsatisfait->update();

        return back()->with('status', 'Le partenaire a ete modifié avec succès !!');
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
        $clientsatisfait = ClientSatisfait::find($id);

        if ($clientsatisfait->logo_client != 'noimage.jpg') {
            Storage::delete('public/service_images/' . $clientsatisfait->logo_client);
        }

        $clientsatisfait->delete();

        return back()->with('status', 'Le partenaire a été supprimé avec succès !!');
    }

    public function activer_clientsatisfait($id)
    {

        $clientsatisfait = Clientsatisfait::find($id);

        $clientsatisfait->status = 1;

        $clientsatisfait->save();

        return back();
    }
    public function desactiver_clientsatisfait($id)
    {

        $clientsatisfait = Clientsatisfait::find($id);

        $clientsatisfait->status = 0;

        $clientsatisfait->save();

        return back();
    }
}
