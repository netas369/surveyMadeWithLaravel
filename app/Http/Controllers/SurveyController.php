<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display the welcome message.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('survey.choosesurvey');
    }

    public function create($language)
    {
        if ($language === 'survey-eng') {
            return view('survey.survey-eng');
        } elseif ($language === 'survey-nl') {
            return view('survey.survey-nl');
        } else {
            abort(404);
        }
    }

    public function store(Request $request, $language)
    {
        $survey = new Survey();

        $survey->PeopleOnBoard = $request->input('PeopleOnBoard');
        $survey->AdultsOnBoard = $request->input('AdultsOnBoard');
        $survey->AgeOfChildren = $request->input('AgeOfChildren');
        $survey->TypeOfVessel = $request->input('TypeOfVessel');
        $survey->FirstVisit = $request->input('FirstVisit');
        $survey->HearAboutHarbour = $request->input('HearAboutHarbour');

        $survey->save();

        if ($language === 'survey-eng') {
            return view('survey.thanks-eng');
        } elseif ($language === 'survey-nl') {
            return view('survey.thanks-nl');
        } else {
            abort(404);
        }
    }}
