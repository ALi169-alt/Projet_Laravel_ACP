<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportRequest;

class SupportRequestController extends Controller
{
    public function create()
{
    return view('Services.SupportInformatique');
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);
    $employe_id = session('id');

    $supportRequest = new SupportRequest;
    $supportRequest->employe_id = $employe_id;
    $supportRequest->title = $request->input('title');
    $supportRequest->description = $request->input('description');
    $supportRequest->save();

    session()->flash('success', 'La demande de soutien informatique a été créée avec succès');

    return redirect('/demande-support-informatique');
}

}
