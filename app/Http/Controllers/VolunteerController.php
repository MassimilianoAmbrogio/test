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

        $arr_typologies = [
            "Arrival Area",
            "Hotel Area",
            "Competition Area"
        ];
        $volunteers = Volunteer::all();
        $genders = VolunteerAgeGender::all();
        $document_tipologys = VolunteerDocumentTipology::all();
        return view('volunteers', [
            'volunteers' => $volunteers,
            'arr_typologies' => $arr_typologies,
            'genders' => $genders,
            'document_tipologys' => $document_tipologys,
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
            ]);

           /* $andrea = $feature_tipology->id;
            $volunteer_feature_tipology = VolunteerFeatureTipology::create([
                'feature_tipology_id' => $andrea,
                'feature_tipology' => $data['feature_tipology'],
            ]);*/
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
