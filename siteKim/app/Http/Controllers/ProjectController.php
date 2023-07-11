<?php

namespace App\Http\Controllers;

use App\Models\ClientSatisfait;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project::all();
        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clients = ClientSatisfait::all()->where('status',1)->pluck('designation', 'designation');
        $services = Service::all()->where('status',1)->pluck('service_name','service_name');
        return view('admin.projects.create', compact('services','clients'));
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
            'project_image1' => 'image|nullable|max:5999',
            'project_image2' => 'image|nullable|max:5999',
            'project_image3' => 'image|nullable|max:5999',
            'project_image4' => 'image|nullable|max:5999',
            'project_service' => 'required',
            'project_client' => 'required',
            'duree' => 'required',
        ]);

        if ($request->hasFile('project_image1') && $request->hasFile('project_image2')
        && $request->hasFile('project_image3') && $request->hasFile('project_image4') ) {
            //nom de l'image avec extension
            $fileNameWithExt1 = $request->file('project_image1')->getClientOriginalName();
            $fileNameWithExt2 = $request->file('project_image2')->getClientOriginalName();
            $fileNameWithExt3 = $request->file('project_image3')->getClientOriginalName();
            $fileNameWithExt4 = $request->file('project_image4')->getClientOriginalName();
            //nom  du fichier
            $filename1 = pathinfo($fileNameWithExt1, PATHINFO_FILENAME);
            $filename2 = pathinfo($fileNameWithExt2, PATHINFO_FILENAME);
            $filename3 = pathinfo($fileNameWithExt3, PATHINFO_FILENAME);
            $filename4 = pathinfo($fileNameWithExt4, PATHINFO_FILENAME);
            //extension
            $ext1 = $request->file('project_image1')->getClientOriginalExtension();
            $ext2 = $request->file('project_image2')->getClientOriginalExtension();
            $ext3 = $request->file('project_image3')->getClientOriginalExtension();
            $ext4 = $request->file('project_image4')->getClientOriginalExtension();
            //nom de l'image to store
            $fileNameToStrore1 = $filename1 . '_' . time() . '.' . $ext1;
            $fileNameToStrore2 = $filename2 . '_' . time() . '.' . $ext2;
            $fileNameToStrore3 = $filename3 . '_' . time() . '.' . $ext3;
            $fileNameToStrore4 = $filename4 . '_' . time() . '.' . $ext4;
            //upload image et creation du dossier de stockage
            $path1 = $request->file('project_image1')->storeAs('public/project_images', $fileNameToStrore1);
            $path2 = $request->file('project_image2')->storeAs('public/project_images', $fileNameToStrore2);
            $path3 = $request->file('project_image3')->storeAs('public/project_images', $fileNameToStrore3);
            $path4 = $request->file('project_image4')->storeAs('public/project_images', $fileNameToStrore4);
        } else {
            $fileNameToStrore1 = 'noimage.jpg';
            $fileNameToStrore2 = 'noimage.jpg';
            $fileNameToStrore3 = 'noimage.jpg';
            $fileNameToStrore4 = 'noimage.jpg';
        }


        $project = new Project();
        $project->project_name = $request->input('name');
        $project->project_description = $request->input('description');
        $project->project_image1 = $fileNameToStrore1;
        $project->project_image2 = $fileNameToStrore2;
        $project->project_image3 = $fileNameToStrore3;
        $project->project_image4 = $fileNameToStrore4;
        $project->project_service = $request->input('project_service');
        $project->client_name = $request->input('project_client');
        $project->duree = $request->input('duree');
        $project->status = 1;

        $project->save();
        return back()->with('status', 'Le projet a été enregistré avec succès !!');
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
        $project = Project::find($id);
        $services = Service::all()->where('status',1)->pluck('service_name','service_name');
        $clients = ClientSatisfait::all()->where('status',1)->pluck('designation', 'designation');
        return view('admin.projects.edit', compact('project','services','clients'));
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
            'project_name' => 'required',
            'project_description' => 'required',
            'project_image1' => 'image|nullable|max:5999',
            'project_image2' => 'image|nullable|max:5999',
            'project_image3' => 'image|nullable|max:5999',
            'project_image4' => 'image|nullable|max:5999',
            'project_service' => 'required',
            'client_name' => 'required',
            'duree' => 'required',
        ]);

        $project = Project::find($id);
        $project->project_name = $request->input('project_name');
        $project->project_description = $request->input('project_description');
        $project->project_service = $request->input('project_service');
        $project->project_service = $request->input('project_service');
        $project->client_name = $request->input('client_name');

        if ($request->hasFile('project_image1') && $request->hasFile('project_image2')
        && $request->hasFile('project_image3') && $request->hasFile('project_image4')) {
            //nom de l'image avec extension
            $fileNameWithExt1 = $request->file('project_image1')->getClientOriginalName();
            $fileNameWithExt2 = $request->file('project_image2')->getClientOriginalName();
            $fileNameWithExt3 = $request->file('project_image3')->getClientOriginalName();
            $fileNameWithExt4 = $request->file('project_image4')->getClientOriginalName();
            //nom  du fichier
            $filename1 = pathinfo($fileNameWithExt1, PATHINFO_FILENAME);
            $filename2 = pathinfo($fileNameWithExt2, PATHINFO_FILENAME);
            $filename3 = pathinfo($fileNameWithExt3, PATHINFO_FILENAME);
            $filename4 = pathinfo($fileNameWithExt4, PATHINFO_FILENAME);
            //extension
            $ext1 = $request->file('project_image1')->getClientOriginalExtension();
            $ext2 = $request->file('project_image2')->getClientOriginalExtension();
            $ext3 = $request->file('project_image3')->getClientOriginalExtension();
            $ext4 = $request->file('project_image4')->getClientOriginalExtension();
            //nom de l'image to store
            $fileNameToStrore1 = $filename1 . '_' . time() . '.' . $ext1;
            $fileNameToStrore2 = $filename2 . '_' . time() . '.' . $ext2;
            $fileNameToStrore3 = $filename3 . '_' . time() . '.' . $ext3;
            $fileNameToStrore4 = $filename4 . '_' . time() . '.' . $ext4;
            //upload image et creation du dossier de stockage
            $path1 = $request->file('project_image1')->storeAs('public/project_images', $fileNameToStrore1);
            $path2 = $request->file('project_image2')->storeAs('public/project_images', $fileNameToStrore2);
            $path3 = $request->file('project_image3')->storeAs('public/project_images', $fileNameToStrore3);
            $path4 = $request->file('project_image4')->storeAs('public/project_images', $fileNameToStrore4);

            if ($project->project_image1 != 'noimage.jpg' && $project->project_image2 != 'noimage.jpg'
            && $project->project_image3 != 'noimage.jpg' && $project->project_image4 != 'noimage.jpg') {
                Storage::delete('public/project_images/' . $project->project_image1);
                Storage::delete('public/project_images/' . $project->project_image2);
                Storage::delete('public/project_images/' . $project->project_image3);
                Storage::delete('public/project_images/' . $project->project_image4);
            }

            $project->project_image1 = $fileNameToStrore1;
            $project->project_image2 = $fileNameToStrore2;
            $project->project_image3 = $fileNameToStrore3;
            $project->project_image4 = $fileNameToStrore4;
        }

        $project->update();

        return back()->with('status', 'Le projet a été modifié avec succès !!');
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
        $project = Project::find($id);

        if ($project->project_image1 != 'noimage.jpg' && $project->project_image2 != 'noimage.jpg'
        && $project->project_image3 != 'noimage.jpg' && $project->project_image4 != 'noimage.jpg') {
            Storage::delete('public/project_images/' . $project->project_image1);
            Storage::delete('public/project_images/' . $project->project_image2);
            Storage::delete('public/project_images/' . $project->project_image3);
            Storage::delete('public/project_images/' . $project->project_image4);
        }

        $project->delete();

        return back()->with('status', 'Le projet a été supprimé avec succès !!');
    }

    public function activer_project($id)
    {

        $project = Project::find($id);

        $project->status = 1;

        $project->save();

        return back();
    }
    public function desactiver_project($id)
    {

        $project = Project::find($id);

        $project->status = 0;

        $project->save();

        return back();
    }
}
