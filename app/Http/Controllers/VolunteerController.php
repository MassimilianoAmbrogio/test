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
use Illuminate\Support\Facades\Storage;

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

            if ($request->file('document_type')){
                $file = $request->file('document_type');
                $filename = $file->getClientOriginalName();
                $disk = Storage::disk('public');
                $directory = "volunteers";
                $disk->putFileAs($directory, $file, $filename);
                $url = $disk->url($directory."/".$filename);
                $url = str_replace('http://localhost', 'http://127.0.0.1:8000', $url);
                $volunteer_document->document_type = $url;
                $volunteer_document->save();
            }

        } catch (\Exception $e) {
            return redirect()->route('volunteers')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('volunteers')->with('success', 'Operazione completata con successo');
    }

    public function show($volunteer_id)
    {
        $user = User::all();
        $volunteer = Volunteer::find($volunteer_id);
        $genders = VolunteerAgeGender::all();


        return view("volunteer", [
            "volunteer" => $volunteer,
            "genders" => $genders,
            'user' => $user,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $volunteer_age_id)
    {
        $data = $request->only( 'date_of_birth', 'volunteers_age_gender_id');

        try {

            $volunteer_age = VolunteerAge::find($volunteer_age_id);

            $volunteer_age->update($data);

        } catch (\Exception $e) {
            return redirect()->route('volunteers')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('volunteers')->with('success', 'Operazione completata con successo');
    }

    public function show_document($volunteer_id)
    {
        $volunteer = Volunteer::find($volunteer_id);
        $documents = VolunteerDocumentTipology::all();

        return view("volunteer_document", [
            "volunteer" => $volunteer,
            "documents" => $documents,
        ]);
    }

    public function update_document(Request $request, $volunteer_document_id)
    {
        $data = $request->only( 'volunteers_document_tipology_id', 'document_type');

        try {
            $volunteer_document = VolunteerDocument::find($volunteer_document_id);

            $volunteer_document->update($data);

            if ($request->file('document_type')){
                $file = $request->file('document_type');
                $filename = $file->getClientOriginalName();
                $disk = Storage::disk('public');
                $directory = "volunteers";
                $disk->putFileAs($directory, $file, $filename);
                $url = $disk->url($directory."/".$filename);
                $url = str_replace('http://localhost', 'http://127.0.0.1:8000/storage/volunteers', $url);
                $volunteer_document->document_type = $url;
                $volunteer_document->save();
            }

        } catch (\Exception $e) {
            return redirect()->route('volunteers')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('volunteers')->with('success', 'Operazione completata con successo');
    }

    public function show_feature($volunteer_id)
    {
        $volunteer = Volunteer::find($volunteer_id);
        $features = VolunteerFeatureTipology::all();

        return view("volunteer_feature", [
            "volunteer" => $volunteer,
            "features" => $features,
        ]);
    }

    public function update_feature(Request $request, $volunteer_feature_id)
    {
        $data = $request->only( 'volunteers_feature_tipology_id', 'training');

        try {
            $volunteer_feature = VolunteerFeature::find($volunteer_feature_id);

            $volunteer_feature->update($data);

        } catch (\Exception $e) {
            return redirect()->route('volunteers')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('volunteers')->with('success', 'Operazione completata con successo');
    }
}
