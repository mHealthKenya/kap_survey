<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\County;
use App\SubCounty;
use App\Facility;
use App\Survey;
use App\Answer;

class SurveyController extends Controller
{
    public function index(){

        $counties = County::all();
       return view('survey')->with('counties', $counties);
    }

    public function getSubCounties(Request $request){
        $county_id = $request->county_id;
        $subcounties = SubCounty::where('county_id', $county_id)->get();
        return $subcounties;
    }

    public function getFacilities(Request $request){
        $sub_county_id = $request->sub_county_id;
        $facilities = Facility::where('Sub_County_ID', $sub_county_id)->get();
        return $facilities;
    }

    public function addSurvey(Request $request){
        $survey = new Survey;

        $survey->county_id = $request->county_id;
        $survey->sub_county_id = $request->sub_county_id;
        $survey->facility_code = $request->mfl_code;

        $survey->save();

        return view('demographic')->with('survey', $survey);


    }

    public function addDemographics(Request $request){

        

        if($request->cadre == ''){
            $cadre = $request->cadres;
        }else{
            $cadre = $request->cadre;
        }

        for($i = 1; $i <=3; $i++){
            $answer = new Answer;

            $answer->survey_id = $request->survey_id;
            $answer->question_id = $i;
            if($i ==1){
                $answer->answers = $request->age;
            }
            if($i ==2){
                $answer->answers = $request->gender;
            }
            if($i ==3){
                
                $answer->answers = $cadre;
            }

            $answer->save();
        }

        return view('knowledge_one')->with('answer', $answer);

     

    }

    public function demographicsPartThree(){

        return view('knowledge_three');
    }
}
