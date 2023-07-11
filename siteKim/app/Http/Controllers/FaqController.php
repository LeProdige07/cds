<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $faqs = Faq::all();
        return view('admin.faqs.index', compact('faqs'));
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
        $validated = $request->validate([
            'question' => 'required',
            'reponse' => 'required',
        ]);


        $input = $request->all();
        $faq = new Faq();
        $faq->question = $input['question'];
        $faq->reponse = $input['reponse'];
        $faq->status = 1;
        $faq->save();

        return back()->with('status','Question-Réponse créée avec succès');
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
        $validated = $request->validate([
            'question' => 'required',
            'reponse' => 'required',
        ]);


        $input = $request->all();
        $faq = Faq::find($id);
        $faq->question = $input['question'];
        $faq->reponse = $input['reponse'];
        $faq->update();

        return back()->with('status','Question-Réponse modifiée avec succès');
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
        $faq = Faq::find($id)->delete();
        return back()->with('status','Question-Réponse supprimée avec succès');
    }

    public function activer_faq($id)
    {

        $faq = Faq::find($id);

        $faq->status = 1;

        $faq->save();

        return back();
    }
    public function desactiver_faq($id)
    {

        $faq = Faq::find($id);

        $faq->status = 0;

        $faq->save();

        return back();
    }
}
