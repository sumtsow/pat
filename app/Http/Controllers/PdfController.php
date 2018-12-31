<?php

namespace App\Http\Controllers;

use App\Pdf;
use App\Http\Requests\CreatePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $files = Storage::files('public/pdf');
        foreach($files as $file) {
            if(pathinfo($file)['extension'] == 'pdf') {
                $pdffiles[] = new Pdf(pathinfo($file)['basename']);
            }
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
        $pdf = new Pdf($request->file('pdf')->getClientOriginalName());
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
        $exist = Storage::exists('public/pdf/'.$page);
        if(isset($page) && $exist) {
            return response()->file('storage/pdf/'.$page);
        }
        else {
            return redirect()->back();
        }
    }

    /**
     * Remove the PDF file from storage.
     *
     * @param  string  $basename
     * @return \Illuminate\Http\Response
     */
    public function destroy($basename)
    {
        $pdf = new Pdf($basename);
        $pdf->delete();
        return redirect('/pdf/index');
    }
}