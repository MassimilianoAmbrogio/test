<?php

namespace App\Http\Controllers;

use App\Volunteer;
use App\VolunteerAge;
use App\VolunteerDocument;
use App\VolunteerFeature;
use App\VolunteerAgeGender;
use App\VolunteerDocumentTipology;
use App\VolunteerFeatureTipology;
use App\User;

use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function index()
    {
        $volunteers = Volunteer::all();
        $genders = VolunteerAgeGender::all();
        $document_tipologys = VolunteerDocumentTipology::all();
        $feature_tipologys = VolunteerFeatureTipology::all();
        return view('volunteers', [
            'volunteers' => $volunteers,
            'genders' => $genders,
            'document_tipologys' => $document_tipologys,
            'feature_tipologys' => $feature_tipologys,
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

            $pippo = $user->id;
            $volunteer = Volunteer::create([
                'user_id' => $pippo,
                'first_name' => $data["first_name"],
                'last_name' => $data["last_name"],
            ]);

            $giovanni = $volunteer->id;
            $volunteer_age = VolunteerAge::create([
                'volunteer_id' => $giovanni,
                'date_of_birth' => $data['date_of_birth'],
                'volunteers_age_gender_id' => $data['gender'],
            ]);

            $volunteer_document = VolunteerDocument::create([
                'volunteer_id' => $giovanni,
                'document_type' => $data['document_type'],
                'volunteers_document_tipology_id' => $data['document_tipology'],
            ]);

            $volunteer_feature = VolunteerFeature::create([
                'volunteer_id' => $giovanni,
                'training' => $data['training'],
                'volunteers_feature_tipology_id' => $data['feature_tipology'],
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
        $gender = VolunteerAgeGender::find($volunteer_id);
        $document_tipology = VolunteerDocumentTipology::find($volunteer_id);
        $feature_tipology = VolunteerFeatureTipology::find($volunteer_id);
        return view("volunteer", [
            "volunteer" => $volunteer,
            "gender" => $gender,
            "document_tipology" => $document_tipology,
            "feature_tipology" => $feature_tipology,
            'user' => $user,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $data = $request->only( 'first_name', 'last_name', 'email', 'date_of_birth', 'gender', 'document_tipology', 'document_type', 'feature_tipology', 'training');

        try {

            $volunteer = Volunteer::update($data);
            $volunteer_age = VolunteerAge::update($data);
            $volunteer_document = VolunteerDocument::update($data);
            $volunteer_feature = VolunteerFeature::update($data);

        } catch (\Exception $e) {
            return redirect()->route('volunteers')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('volunteers')->with('success', 'Operazione completata con successo');
    }
}
