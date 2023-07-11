<?php

namespace App\Http\Controllers;

use App\Models\ClientSatisfait;
use App\Models\Faq;
use App\Models\Nouvelle;
use App\Models\Personnel;
use App\Models\Project;
use App\Models\Service;
use App\Models\Temoignage;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listeTemoin = Temoignage::all()->where('status', 1);
        $project = Project::where('status', 1)->limit(6)->get();
        $servicesName = Service::all()->where('status', 1);
        $client = ClientSatisfait::all()->where('status', 1);
        $recentProject = Project::orderBy('id', 'desc')->where('status', 1)->limit(3)->get();
        return view('clients.home', compact('servicesName', 'project', 'listeTemoin', 'client', 'recentProject'));
    }

    public function services()
    {
        $servicesName = Service::all()->where('status', 1);
        return view('clients.services.services', compact('servicesName'));
    }

    public function about()
    {
        $team = Personnel::all()->where('status', 1);
        $servicesName = Service::all()->where('status', 1);
        return view('clients.about.about', compact('servicesName', 'team'));
    }

    public function contact()
    {
        $servicesName = Service::all()->where('status', 1);
        return view('clients.contact', compact('servicesName'));
    }

    public function temoignage()
    {
        $listeTemoin = Temoignage::all()->where('status', 1);
        $servicesName = Service::all()->where('status', 1);
        return view('clients.about.temoignage', compact('listeTemoin', 'servicesName'));
    }

    public function faq()
    {
        $question = Faq::all()->where('status', 1);
        $project = Project::all()->where('status', 1);
        $servicesName = Service::all()->where('status', 1);
        $recentProject = Project::orderBy('id', 'desc')->where('status', 1)->limit(3)->get();
        return view('clients.about.faq', compact('question', 'servicesName', 'project', 'recentProject'));
    }

    public function project()
    {
        $project = Project::all()->where('status', 1);
        $servicesName = Service::all()->where('status', 1);
        $recentProject = Project::orderBy('id', 'desc')->where('status', 1)->where('status', 1)->limit(3)->get();
        return view('clients.about.project', compact('project', 'servicesName', 'recentProject'));
    }

    public function team()
    {
        $team = Personnel::all()->where('status', 1);
        $servicesName = Service::all()->where('status', 1);
        return view('clients.about.team', compact('team', 'servicesName'));
    }

    public function news()
    {
        $news = Nouvelle::all()->where('status', 1);
        $servicesName = Service::all()->where('status', 1);
        $recentProject = Project::orderBy('id', 'desc')->where('status', 1)->limit(3)->get();
        return view('clients.about.news', compact('news', 'servicesName', 'recentProject'));
    }
    public function details($id)
    {
        $services = Service::all()->where('status', 1);
        $servicesName = Service::find($id);
        $detail = $servicesName->details;
        return view('clients.services.detail', compact('detail', 'servicesName', 'services'));
    }
    public function singleProject($id)
    {
        $project = Project::all()->where('status', 1);
        $services = Service::all()->where('status', 1);
        $projectOne = Project::findOrFail($id);
        $servicesName = Service::all()->where('status', 1);
        $servicesName = Service::all()->where('status', 1);
        return view('clients.about.single-project', compact('projectOne', 'services', 'project','servicesName'));
    }

    public function singleNews($id)
    {
        $servicesName = Service::all()->where('status', 1);
        $singleNews = Nouvelle::findOrFail($id);
        $recentProject = Project::orderBy('project_name', 'desc')->where('status', 1)->limit(3)->get();
        return view('clients.about.news-single', compact('servicesName', 'singleNews', 'recentProject'));
    }
}
