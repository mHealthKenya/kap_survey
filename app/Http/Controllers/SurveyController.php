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

    public function addKnowledgeOne(Request $request){

        if($request->five == ''){
            $five = $request->fives;
            $five = implode(',', $five);
        }else{
            $five = $request->five;
        }

        if($request->six == ''){
            $six = $request->sixes;
            $six = implode(',', $six);
        }else{
            $six = $request->six;
        }
        if($request->eight == ''){
            $eight = $request->eights;
            $eight = implode(',', $eight);
        }else{
            $eight = $request->eight;
        }

        if($request->ten == ''){
            $ten = $request->tens;
            $ten = implode(',', $ten);
        }else{
            $ten = $request->ten;
        }

        if($request->eleven == ''){
            $eleven = $request->elevens;
            $eleven = implode(',', $eleven);
        }else{
            $eleven = $request->eleven;
        }

        if($request->fifteen == ''){
            $fifteen = $request->fifteens;
            $fifteen = implode(',', $fifteen);
        }else{
            $fifteen = $request->fifteen;
        }

        if($request->seventeen == ''){
            $seventeen = $request->seventeens;
            $seventeen = implode(',', $seventeen);
        }else{
            $seventeen = $request->seventeen;
        }
        if($request->eighteen == ''){
            $eighteen = $request->eighteens;
            $eighteen = implode(',', $eighteen);
        }else{
            $eighteen = $request->eighteen;
        }


        for($i = 4; $i <= 18; $i++){
            $answer = new Answer;
            $answer->survey_id = $request->survey_id;
            $answer->question_id = $i;
            if($i == 4){
                $answer->answers = $request->four;
            }
            if($i == 5){
                $answer->answers = $five;
            }
            if($i == 6){
                $answer->answers = $six;
            }
            if($i == 7){
                $answer->answers = $request->seven;
            }
            if($i == 8){
                $answer->answers = $eight;
            }
            if($i == 9){
                $answer->answers = $request->nine;
            }
            if($i == 10){
                $answer->answers = $ten;
            }
            if($i == 11){
                $answer->answers = $eleven;
            }
            if($i == 12){
                $answer->answers = $request->twelve;
            }
            if($i == 13){
                $answer->answers = $request->thirteen;
            }
            if($i == 14){
                $answer->answers = $request->fourteen;
            }
            if($i == 15){
                $answer->answers = $fifteen;
            }
            if($i == 16){
                $answer->answers = $request->sixteen;
            }
            if($i == 17){
                $answer->answers = $seventeen;
            }
            if($i == 18){
                $answer->answers = $eighteen;
            }

            $answer->save();
        }

        return view('knowledge_two')->with('answer', $answer);     

    }

    public function demographicsPartThree(){

        return view('knowledge_three');
    }
}
