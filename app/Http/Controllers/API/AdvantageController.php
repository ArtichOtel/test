<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advantage;

class AdvantageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //$erroMsg = "Perhaps you wanted one of these: GET /advantage/{id} || GET /advantages";

        return response()->json("RTFM", 405);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:60',
            'description' => 'required|max:300',
            'icon' => 'required|max:20',
            'order' => 'required'
        ]);

        $newAdvantage = new Advantage([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'icon' => $request->get('icon'),
            'order' => $request->get('order'),
        ]);

        $newAdvantage->save();

        return response()->json($newAdvantage);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $advantage = Advantage::findOrFail($id);

        return response()->json($advantage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $advantage = Advantage::findOrFail($id);

        $request->validate([
            'title' => 'required|max:60',
            'description' => 'required|max:300',
            'icon' => 'required|max:20',
            'order' => 'required'
        ]);

        $advantage->title = $request->get('title');
        $advantage->description = $request->get('description');
        $advantage->icon = $request->get('icon');
        $advantage->order = $request->get('order');

        $advantage->save();

        return response()->json($advantage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $advantage = Advantage::findOrFail($id);

        $advantage->delete();

        return response()->json(Advantage::all());
    }
}
