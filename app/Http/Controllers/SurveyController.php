<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\County;
use App\SubCounty;
use App\Facility;
use App\Survey;
use App\Answer;
use App\Report;
use App\HealthCareWorkers;
use App\Exports\SurveyExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\API\SenderController;
use Illuminate\Support\Facades\DB;
ini_set('max_execution_time', 7200);


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

        for($i = 1; $i <=5; $i++){
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
                
                $answer->answers = $request->phone;
            }
            if($i ==4){
                
                $answer->answers = $request->experience;
            }
            if($i ==5){
                
                $answer->answers = $cadre;
            }

            $answer->save();
        }

        return view('knowledge_one')->with('answer', $answer);     

    }

    public function addKnowledgeOne(Request $request){

        if($request->six == ''){
            $six = $request->sixes;
            if(!empty($six)){
                $six = implode(',', $six);
            }else{
                $six = '';
            }
        }else{
            $six = $request->six;
        }

        if($request->seven == ''){
            $seven = $request->sevens;
            if(!empty($seven)){
                $seven = implode(',', $seven);
            }else{
                $seven = '';
            }
        }else{
            $seven = $request->seven;
        }

        if($request->eight == ''){
            $eight = $request->eights;
        }else{
            $eight = $request->eight;
        }

        if($request->nine == ''){
            $nine = $request->nines;
            if(!empty($nine)){
                $nine = implode(',', $nine);
            }else{
                $nine = '';
            }
        }else{
            $nine = $request->nine;
        }

        // if($request->nine == ''){
        //     $nine = $request->nines;
        // }else{
        //     $nine = $request->nine;
        // }

        // if($request->ten == ''){
        //     $ten = $request->tens;
        // }else{
        //     $ten = $request->ten;
        // }


        if($request->ten == ''){
            $ten = $request->tens;
            if(!empty($ten)){
                $ten = implode(', ', $ten);
            } else{
                $ten = '';
            }
        }else{
            $ten = $request->ten;
        }


        if($request->eleven == ''){
            $eleven = $request->elevens;
            if(!empty($eleven)){
                $eleven = implode(', ', $eleven);
            } else{
                $eleven = '';
            }
        }else{
            $eleven = $request->eleven;
        }

        // if($request->eleven == ''){
        //     $eleven = $request->elevens;
        // }else{
        //     $eleven = $request->eleven;
        // }
        

        // if($request->fifteen == ''){
        //     $fifteen = $request->fifteens;
        //     if(!empty($fifteen)){
        //         $fifteen = implode(',', $fifteen);
        //     }else{
        //         $fifteen = '';
        //     }
        // }else{
        //     $fifteen = $request->fifteen;
        // }

        // if($request->seventeen == ''){
        //     $seventeen = $request->seventeens;
        //     if(!empty($seventeen)){
        //         $seventeen = implode(',', $seventeen);
        //     }else{
        //         $seventeen = '';
        //     }
        // }else{
        //     $seventeen = $request->seventeen;
        // }
        // if($request->eighteen == ''){
        //     $eighteen = $request->eighteens;
        //     if(!empty($eighteen)){
        //         $eighteen = implode(',', $eighteen);
        //     }else{
        //         $eighteen = '';
        //     }        
        // }else{
        //     $eighteen = $request->eighteen;
        // }


        for($i = 6; $i <= 11; $i++){
            $answer = new Answer;
            $answer->survey_id = $request->survey_id;
            $answer->question_id = $i;
            
            if($i == 6){
                $answer->answers = $six;
            }
            if($i == 7){
                $answer->answers = $seven;
            }
            if($i == 8){
                $answer->answers = $request->eight;
            }
            if($i == 9){
                $answer->answers = $nine;  
            }
            if($i == 10){
                $answer->answers = $ten;
            }

            // if($i == 11){
            //     $elevens = $request->elevens;

            //     if(!empty($elevens)){
            //         $elevens = implode(', ', $elevens);
            //     } else{
            //         $elevens = '';
            //     }
            //     $answer->answers = $elevens;
            // }


            if($i == 11){
                $answer->answers = $eleven;
            }
            
            // if($i == 12){
            //     $answer->answers = $request->twelve;
            // }
            // if($i == 13){
            //     $answer->answers = $request->thirteen;
            // }
            // if($i == 14){
            //     $answer->answers = $request->fourteen;
            // }
            // if($i == 15){
            //     $answer->answers = $fifteen;
            // }
            // if($i == 16){
            //     $answer->answers = $request->sixteen;
            // }
            // if($i == 17){
            //     $answer->answers = $seventeen;
            // }
            // if($i == 18){
            //     $answer->answers = $eighteen;
            // }
            $answer->save();
        }

        return view('knowledge_two')->with('answer', $answer);     

    }

    public function addKnowledgeTwo(Request $request){
        // if($request->twelve == ''){
        //     $twelve = $request->twelves;
        //     if(!empty($twelve)){
        //         $twelve = implode(',', $twelve);
        //     }else{
        //         $twelve = '';
        //     } 
        // }else{
        //     $twelve = $request->twelve;
        // }

        if($request->twelve == ''){
            $twelve = $request->twelves;
        }else{
            $twelve = $request->twelve;
        }

        if($request->thirteen == ''){
            $thirteen = $request->thirteens;
            if(!empty($thirteen)){
                $thirteen = implode(',', $thirteen);
            }else{
                $thirteen = '';
            } 
        }else{
            $thirteen = $request->thirteen;
        }
        
        // if($request->thirteen == ''){
        //     $thirteen = $request->thirteens;
        // }else{
        //     $thirteen = $request->thirteen;
        // }

        if($request->fourteen == ''){
            $fourteen = $request->fourteens;
        }else{
            $fourteen = $request->fourteen;
        }

        // if($request->twentyfour == ''){
        //     $twentyfour = $request->twentyfours;
        // }else{
        //     $twentyfour = $request->twentyfour;
        // }
        // if($request->twentyfive == ''){
        //     $twentyfive = $request->twentyfives;
        //     if(!empty($twentyfive)){
        //         $twentyfive = implode(',', $twentyfive);
        //     }else{
        //         $twentyfive = '';
        //     } 
        // }else{
        //     $twentyfive = $request->twentyfive;
        // }

        for($i = 12; $i <= 14; $i++){
            $answer = new Answer;
            $answer->survey_id = $request->survey_id;
            $answer->question_id = $i;

            // if($i == 11){
            //     $answer->answers = $request->eleven;
            // }
            if($i == 12){
                $answer->answers = $request-> twelve;
            }
            if($i == 13){
                $answer->answers = $thirteen;
            }
            if($i == 14){
                $answer->answers = $fourteen;
            }


            // if($i == 22){
            //     $answer->answers = $request->twentytwo;
            // }
            // if($i == 23){
            //     $answer->answers = $request->twentythree;
            // }
            // if($i == 24){
            //     $answer->answers = $twentyfour;
            // }
            // if($i == 25){
            //     $answer->answers = $twentyfive;
            // }
            // if($i == 26){
            //     $answer->answers = $request->twentysix;
            // }
            // if($i == 27){
            //     $answer->answers = $request->twentyseven;
            // }
            // if($i == 28){
            //     $answer->answers = $request->twentyeight;
            // }
            // if($i == 29){
            //     $answer->answers = $request->twentynine;
            // }
            // if($i == 30){
            //     $answer->answers = $request->thirty;
            // }
            // if($i == 31){
            //     $answer->answers = $request->thirtyone;
            // }

            $answer->save();
        }

        return view('knowledge_three')->with('answer', $answer);     


    }
 
    public function demographicsPartThree(Request $request){


        // if($request->thirtysix == ''){
        //     $thirtysix = $request->thirtysixes;
        //     if(!empty($thirtysix)){
        //         $thirtysix = implode(', ', $thirtysix);
        //     } else{
        //         $thirtysix = '';
        //     }
        // }else{
        //     $thirtysix = $request->thirtysix;
        // }

        // if($request->thirtyseven == ''){
        //     $thirtyseven = $request->thirtysevens;
        //     if(!empty($thirtyseven)){
        //         $thirtyseven = implode(', ', $thirtyseven);
        //     } else{
        //         $thirtyseven = '';
        //     }
        // }else{
        //     $thirtyseven = $request->thirtyseven;
        // }

        // if($request->thirtyeight == ''){
        //     $thirtyeight = $request->thirtyeights;
        //     if(!empty($thirtyeight)){
        //         $thirtyeight = implode(', ', $thirtyeight);
        //     } else{
        //         $thirtyeight = '';
        //     }
        // }else{
        //     $thirtyeight = $request->thirtyeight;
        // }



        if($request->fifteen == ''){
            $fifteen = $request->fifteens;
        }else{
            $fifteen = $request->fifteen;
        }

        for($i = 15; $i <= 18; $i++){
            $answer = new Answer;
            $answer->survey_id = $request->survey_id;
            $answer->question_id = $i;

            if($i == 15){
                $answer->answers = $fifteen;
            }
            
            if($i == 16){
                $answer->answers = $request->sixteen;
            }
            if($i == 17){
                $seventeens = $request->seventeens;

                if(!empty($seventeens)){
                    $seventeens = implode(', ', $seventeens);
                } else{
                    $seventeens = '';
                }
                $answer->answers = $seventeens;
            }
            if($i == 18){
                $eighteens = $request->eighteens;

                if(!empty($eighteens)){
                    $eighteens = implode(', ', $eighteens);
                } else{
                    $eighteens = '';
                }
                $answer->answers = $eighteens;
            }
            // if($i == 35){
            //     $thirtyfives = $request->thirtyfives;
            //     if(!empty($thirtyfives)){
            //         $thirtyfives = implode(', ', $thirtyfives);
            //     } else{
            //         $thirtyfives = '';
            //     }
            //     $answer->answers = $thirtyfives;
            // }
            // if($i == 36){
            //     $answer->answers = $thirtysix;
            // }
            // if($i == 37){
            //     $answer->answers = $thirtyseven;
            // }
            // if($i == 38){
            //     $answer->answers = $thirtyeight;
            // }
            // if($i == 39){
            //     $answer->answers = $request->thirtynine;
            // }
            // if($i == 40){
            //     $answer->answers = $request->forty;
            // }
            // if($i == 41){
            //     $fortyones = $request->fortyones;
            //     if(!empty($fortyones)){
            //         $fortyones = implode(', ', $fortyones);
            //     } else{
            //         $fortyones = '';
            //     }
            //     $answer->answers = $fortyones;
            // }

            $answer->save();

        }
        toastr("Thank you for taking part in this survey!");
        return redirect()->route('survey');

        // return view('knowledge_three')->with('answer' , $answer);
    }

    public function reports(){

      $reports = Report::select('survey_id','county', 'sub_county', 'facility','created_at')->groupBy('survey_id')->get();

        foreach($reports as $report){
            $answers = Report::select('questions', 'answers')->where('survey_id', $report->survey_id)->get();

            $report['answers'] = $answers;

        }
        return view('reports')->with('reports',$reports);

    }

    public function export(){

        return Excel::download(new SurveyExport, 'survey-report.xlsx');

    }

    public function send_sms() {
        //get healthcare workers contacts from c4c and send the link to take the survey
        $hcws = HealthCareWorkers::select('f_name', 'l_name', 'mobile_no')->where('sent_status', 0)->get();
        // echo json_encode($hcws);
        // exit;
        
        foreach($hcws as $hcw){
            $source = '40146';
            $first_name = $hcw->f_name;
            $last_name = $hcw->l_name;
            $destination = $hcw->mobile_no;
            // $destination = '+254721990078';
            $msg = "Hello " . $first_name . ", the National Ministry of Health is conducting a survey among health workers on Corona to inform outbreak preparedness and response. Your participation is highly appreciated. Open survey Link - http://url.style/naxEO";
            
            $sender = new SenderController();
            $send_msg = $sender->sender($source, $destination, $msg);
            if ($send_msg === false) {
                //Error has occured....
                echo " SMS Not sent, Number: ";
                echo $destination;
            } else {
                //Success posting the  message and changing the status of sent flag...
                echo " SMS sent to Number: ";
                echo $destination;
                HealthCareWorkers::where('mobile_no', $destination)->update(['sent_status' => 1]);
            }
            // exit;            
        }
    }

}
