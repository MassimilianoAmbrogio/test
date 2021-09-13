<?php

namespace App\Http\Controllers;

use App\Volunteer;
use App\VolunteerAge;
use App\VolunteerDocument;
use App\VolunteerFeature;
use App\User;

use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function index()
    {
        $users = User::all();
        $volunteers = Volunteer::all();
        $volunteers_ages = VolunteerAge::all();
        $volunteers_documents = VolunteerDocument::all();
        $volunteers_features = VolunteerFeature::all();
        return view('volunteers', [
            'volunteers' => $volunteers,
            'volunteers_ages' => $volunteers_ages,
            'volunteers_documents' => $volunteers_documents,
            'volunteers_features' => $volunteers_features,
            'users' => $users,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->only( 'user_id', 'first_name', 'last_name', 'date_of_birth', 'gender', 'document_tipology', 'document_type', 'feature_tipology', 'training');

        try {
            if ( ! empty($volunteer->user->email)) {
                return redirect()->route('volunteers')->with('error', 'Email esiste già');
            }

            Volunteer::create($data);
            VolunteerAge::create($data);
            VolunteerDocument::create($data);
            VolunteerFeature::create($data);
        } catch (\Exception $e) {
            return redirect()->route('volunteers')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('volunteers')->with('success', 'Operazione completata con successo');
    }

    public function show($volunteer_id)
    {
        $user = User::all();
        $volunteer = Volunteer::find($volunteer_id);
        $volunteer_age = VolunteerAge::find($volunteer_id);
        $volunteer_document = VolunteerDocument::find($volunteer_id);
        $volunteer_feature = VolunteerFeature::find($volunteer_id);
        return view("volunteer", [
            "volunteer" => $volunteer,
            "volunteer_age" => $volunteer_age,
            "volunteer_document" => $volunteer_document,
            "volunteer_feature" => $volunteer_feature,
            'user' => $user,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $volunteer_id)
    {
        $data = $request->only('user_id', 'first_name', 'last_name', 'date_of_birth', 'gender', 'document_tipology', 'document_type', 'feature_tipology', 'training');

        if (! empty($user->email)) {
            return redirect()->route('user')->with('error', 'Email esiste già');
        }

        try {
            Volunteer::find($volunteer_id)->update($data);
            VolunteerAge::find($volunteer_id)->update($data);
            VolunteerDocument::find($volunteer_id)->update($data);
            VolunteerFeature::find($volunteer_id)->update($data);

        } catch (\Exception $e) {
            return redirect()->route('volunteers')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('volunteers')->with('success', 'Operazione completata con successo');
    }
}
