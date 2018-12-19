<?php

namespace App\Http\Controllers;

use App\Pdf;
use App\Http\Requests\CreatePdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pdffiles = array();
        $files = \Storage::files('public/pdf');
        foreach($files as $file) {
            $pdffiles[] = new \App\Pdf(pathinfo($file)['basename']);
        }
        return view('pdf', [
            'pdffiles' => $pdffiles,
        ]);
    }

    /**
     * Upload new PDF file
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreatePdf $request)
    {
        $pdf = new \App\Pdf($request->file('pdf')->getClientOriginalName());
        $pdf->addFile($request);
        return redirect('/pdf/index');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($page)
    {
        $exist = \Storage::exists('public/pdf/'.$page);
        if(isset($page) && $exist) {
            return response()->file('storage/pdf/'.$page);
        }
        else {
            return redirect()->back();
        }
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
    }
}
