<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    //
    public function index()
    {
        $offers = offer::all();
        return view('home',compact('offers'));
    }

    public function index1()
    {
        $offers = offer::all();
        return view('offer',compact('offers'));
    }
    public function index2()
    {
        $offers = offer::all();
        return view('offeradmin',compact('offers'));
    }
    public function storeoffer(Request $request)
    {
        
        

        $userid = Auth::user()->email;
       
        Offer::create([
            'userid' => $userid,
            'title' => $request->title,
            'description' => $request->description,
            'salary' => $request->salary,
            'location' => $request->location,
            'type' => $request->type,
        ]);

        
   
        return redirect()->route('offer')->with('success', 'Votre offre a été créée avec succès.');
    }

    public function destroy(offer $offer)
    {
        $offer->delete();
        return to_route('offer')->with('success','offer est supprimer');
    }

    public function destroy1(offer $offer)
    {
        $offer->delete();
        return to_route('offeradmin')->with('success','offer est supprimer');
    }
    
    public function edit(offer $offer)
    {
        return view('edit',compact('offer'));
    }

    public function edit1(offer $offer)
    {   
        return view('editadmin',compact('offer'));
    }
    public function update(Request $request,offer $offer)
    {
        $formFields = $request->only(['title', 'description', 'salary', 'location', 'type']);
        $offer->fill($formFields)->save();
        return to_route('offer')->with('success','offer est modifier');

    }
    public function update1(Request $request,offer $offer)
    {
        $formFields = $request->only(['title', 'description', 'salary', 'location', 'type']);
        $offer->fill($formFields)->save();
        return to_route('offeradmin')->with('success','offer est modifier');

    }
    public function search(Request $request)
{
    $search = $request->get('search');

    $offers = Offer::where('title', 'like', '%'.$search.'%')
                    ->orWhere('description', 'like', '%'.$search.'%')
                    ->get();

    return view('home', compact('offers'));
}
}