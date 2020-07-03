<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Document;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::orderBy('created_at','asc')->paginate(10);

        return response()->json($documents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $document = Document::create($request->all());

        return response()->json($document, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $document = Document::create($request->all());

        return response()->json($document, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
         $document = Document::findOrFail($id);

         return response()->json($document);
    }



    /**
     * Published the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publish($id)
    {
        
         $document = Document::findOrFail($id);

         if ($document->status =="published") {
          
          return response()->json($document, 400);
          

         }

         else {
         
          $document->status="published";

          $document->save(); 

         return response()->json($document, 200);

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
        $document = Document::create($request->all());

        return response()->json($document, 201);
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
        $document = Document::findOrFail($id);

        $document->update($request->all());

        return response()->json($document, 200);
    }


    /**
     * Update by PATCH method the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function patched(Request $request, $id)
    {
        $document = Document::findOrFail($id);

        if (empty($request->get('payload'))) {
 
          return response()->json($document, 400);


        }
        
        else {

        $document->payload = $request->get('payload');

        $document->save();

        return response()->json($document, 200);
    
    }

   }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();
        return response()->json(null, 204);
    }
}
