<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::all();
        return view('admin.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'service_image' => 'image|nullable'
        ]);

        if ($request->hasFile('service_image')) {
            //nom de l'image avec extension
            $fileNameWithExt = $request->file('service_image')->getClientOriginalName();
            //nom  du fichier
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //extension
            $ext = $request->file('service_image')->getClientOriginalExtension();
            //nom de l'image to store
            $fileNameToStrore = $filename . '_' . time() . '.' . $ext;
            //upload image et creation du dossier de stockage
            $path = $request->file('service_image')->storeAs('public/service_images', $fileNameToStrore);
        } else {
            $fileNameToStrore = 'noimage.jpg';
        }


        $service = new Service();
        $service->service_name = $request->input('name');
        $service->service_description = $request->input('description');
        $service->service_image = $fileNameToStrore;
        $service->status = 1;

        $service->save();
        return back()->with('status', 'Le service a été enregistré avec succès !!');
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
        $service = Service::find($id);
        return view('admin.services.edit', compact('service'));
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
            'service_name' => 'required',
            'service_description' => 'required',
            'service_image' => 'image|nullable'
        ]);

        $service = Service::find($id);
        $service->service_name = $request->input('service_name');
        $service->service_description = $request->input('service_description');

        if ($request->hasFile('service_image')) {
            //nom de l'image avec extension
            $fileNameWithExt = $request->file('service_image')->getClientOriginalName();
            //nom  du fichier
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //extension
            $ext = $request->file('service_image')->getClientOriginalExtension();
            //nom de l'image to store
            $fileNameToStrore = $filename . '_' . time() . '.' . $ext;
            //upload image et creation du dossier de stockage
            $path = $request->file('service_image')->storeAs('public/service_images', $fileNameToStrore);

            if ($service->service_image != 'noimage.jpg') {
                Storage::delete('public/service_images/' . $service->service_image);
            }

            $service->service_image = $fileNameToStrore;
        }

        $service->update();

        return redirect('/services')->with('status', 'Le service a été modifié avec succès !!');
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
        $service = Service::find($id);

        if ($service->service_image != 'noimage.jpg') {
            Storage::delete('public/service_images/' . $service->service_image);
        }

        $service->delete();

        return back()->with('status', 'Le service a été supprimé avec succès !!');
    }

    public function activer_service($id)
    {

        $service = Service::find($id);

        $service->status = 1;

        $service->save();

        return back();
    }
    public function desactiver_service($id)
    {

        $service = Service::find($id);

        $service->status = 0;

        $service->save();

        return back();
    }
}
