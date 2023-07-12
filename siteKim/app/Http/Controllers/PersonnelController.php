<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $personnels = Personnel::all();

        return view('admin.personnels.index', compact('personnels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.personnels.create');
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
            'names' => 'required',
            'poste' => 'required',
            'description' => 'required',
            'personnel_image' => 'image|nullable'
        ]);

        if ($request->hasFile('personnel_image')) {
            //nom de l'image avec extension
            $fileNameWithExt = $request->file('personnel_image')->getClientOriginalName();
            //nom  du fichier
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //extension
            $ext = $request->file('personnel_image')->getClientOriginalExtension();
            //nom de l'image to store
            $fileNameToStrore = $filename . '_' . time() . '.' . $ext;
            //upload image et creation du dossier de stockage
            $path = $request->file('personnel_image')->storeAs('public/personnel_images', $fileNameToStrore);
        } else {
            $fileNameToStrore = 'noimage.jpg';
        }


        $personnel = new personnel();
        $personnel->names = $request->input('names');
        $personnel->poste = $request->input('poste');
        $personnel->description = $request->input('description');
        $personnel->image = $fileNameToStrore;
        $personnel->status = 1;

        $personnel->save();
        return back()->with('status', 'La personne a été enregistrée avec succès !!');
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
        $personnel = Personnel::find($id);

        return view('admin.personnels.edit', compact('personnel'));
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
            'names' => 'required',
            'poste' => 'required',
            'description' => 'required',
            'personnel_image' => 'image|nullable'
        ]);

        $personnel = Personnel::find($id);
        $personnel->names = $request->input('names');
        $personnel->poste = $request->input('poste');
        $personnel->description = $request->input('description');

        if ($request->hasFile('personnel_image')) {
            //nom de l'image avec extension
            $fileNameWithExt = $request->file('personnel_image')->getClientOriginalName();
            //nom  du fichier
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //extension
            $ext = $request->file('personnel_image')->getClientOriginalExtension();
            //nom de l'image to store
            $fileNameToStrore = $filename . '_' . time() . '.' . $ext;
            //upload image et creation du dossier de stockage
            $path = $request->file('personnel_image')->storeAs('public/personnel_images', $fileNameToStrore);

            if ($personnel->personnel_image != 'noimage.jpg') {
                Storage::delete('public/personnel_images/' . $personnel->personnel_image);
            }

            $personnel->image = $fileNameToStrore;
        }

        $personnel->update();

        return redirect('/personnels')->with('status', 'La personne a été modifiée avec succès !!');
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
        $personnel = Personnel::find($id);

        if ($personnel->image != 'noimage.jpg') {
            Storage::delete('public/personnel_images/' . $personnel->image);
        }

        $personnel->delete();

        return back()->with('status', 'La personne a été supprimée avec succès !!');
    }

    public function activer_personnel($id)
    {

        $personnel = Personnel::find($id);

        $personnel->status = 1;

        $personnel->save();

        return back();
    }
    public function desactiver_personnel($id)
    {

        $personnel = Personnel::find($id);

        $personnel->status = 0;

        $personnel->save();

        return back();
    }
}
