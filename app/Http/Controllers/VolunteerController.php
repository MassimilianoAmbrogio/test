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
        $data = $request->only( 'first_name', 'last_name', 'email', 'date_of_birth', 'gender', 'document_tipology', 'document_type', 'feature_tipology', 'training');

        try {

            if ($data['email'] == "") {
                return redirect()->route('volunteers')->with('error', 'Campo mail vuoto');
            }

            $user = User::where('email', $data["email"])->first();
            if (empty($user)) {
                return redirect()->route('volunteers')->with('error', 'Email non esiste');
            }

            $data['user_id'] = $user->id;
            $volunteer = Volunteer::create([
                'user_id' => $data['user_id'],
                'first_name' => $data["first_name"],
                'last_name' => $data["last_name"],
            ]);

            $volunteer_age = VolunteerAge::create([
                'date_of_birth' => $data['date_of_birth'],
                'gender' => $data['gender'],
            ]);

            $volunteer_document = VolunteerDocument::create([
                'document_tipology' => $data['document_tipology'],
                'document_type' => $data['document_type'],
            ]);

            $volunteer_feature = VolunteerFeature::create([
                'feature_tipology' => $data['feature_tipology'],
                'training' => $data['training'],
            ]);
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
