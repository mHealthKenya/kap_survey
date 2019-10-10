<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.11/css/bootstrap-select.min.css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class='content col-md-12'>
            <h1> KAPS SURVEY</h1>
            <h2> Knowledge, attitude and perceptions on Ebola virus disease among health care workers in Kenya. </h2>
          
            <div class="col-md-12" style="margin-top:20px;">
            <h2><b> Section C: Knowledge & Attitude Questions</b> </h2>
                <form role="form" method="post" action="{{route('addKnowledgeOne')}}" >
                    {{ csrf_field() }}
                    <input type="hidden" name="survey_id" class="form-control" value="{{$answer->survey_id}}">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>4.	Have you heard about Ebola virus disease?  </b></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="four" name="four" onChange='displayFive(this.value);'>
                                <option>Select Answer</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="Unknown">Don't Know</option>
                            </select>                          
                        </div>
                    </div>

                    <div style="display: none;"  id="numberFive" class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>5.	If yes, from whom did you hear of Ebola? (Check all that apply)</b></label>
                        <div class="col-sm-10">
                            <select multiple name="fives[]" class=" selectpicker form-control" data-width="100%" data-live-search="true" onchange='checkOtherFive(this.value);'>
                                <option data-tokens="Health worker" value="Health worker">Health worker</option>
                                <option data-tokens="Sensitization" value="Sensitization">Sensitization</option>
                                <option data-tokens="Radio" value="Radio">Radio</option>
                                <option data-tokens="Television" value="Television">Television</option>
                                <option data-tokens="Internet" value="Internet">Internet</option>
                                <option data-tokens="Print Media" value="Print Media">Print Media</option>
                                <option data-tokens="Social Media" value="Social Media">Social Media</option>
                                <option data-tokens="Other" value="other">Other (Specify)</option>
                            </select>
                            <p></p><input id="five" type="text" name="five" class="form-control" style='display:none;'>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>6.	What is Ebola virus disease? (Check the best answer)</b></label>
                        <div class="col-sm-10">
                            <select multiple name="sixes[]" class="selectpicker form-control" data-width="100% data-live-search="true" onchange='checkOtherSix(this.value);'>
                                <option data-tokens="It is a severe and often deadly disease caused by Ebola virus" value="It is a severe and often deadly disease caused by Ebola virus">It is a severe and often deadly disease caused by Ebola virus</option>
                                <option data-tokens="It is a severe disease caused by a protozoann" value="It is a severe disease caused by a protozoann">It is a severe disease caused by a protozoann</option>
                                <option data-tokens="Disease only found among people eating monkeys in Congo and West Africa. " value="Disease only found among people eating monkeys in Congo and West Africa. ">Disease only found among people eating monkeys in Congo and West Africa. </option>
                                <option data-tokens="Don’t know" value="Don’t know">Don’t know</option>
                                <option data-tokens="Other" value="other">Other (Specify)</option>
                            </select>
                            <p></p><input id="six" type="text" name="six" class="form-control" style='display:none;'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>7. Do you know how Ebola virus disease is transmitted? (If No, skip Q.8) </b></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="seven" name="seven" onChange='displayEight(this.value);'>
                                <option>Select Answer</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="Unknown">Don't Know</option>
                            </select>                          
                        </div>
                    </div>

                    <div style="display: none;"  id="numberEight" class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>8. If yes, how?  (Check all that apply)</b></label>
                        <div class="col-sm-10">
                            <select multiple name="eights[]" class=" selectpicker form-control" data-width="100%" onchange='checkOtherEight(this.value);'>
                                <option data-tokens="Body contact with sick person" value="Body contact with sick person">Body contact with sick person</option>
                                <option data-tokens="Through air" value="Through air">Through air</option>
                                <option data-tokens="Through needle pricks" value="Through needle pricks">Through needle pricks</option>
                                <option data-tokens="Contact with Animals" value="Contact with Animals">Contact with Animals</option>
                                <option data-tokens="Contact With dead person" value="Contact With dead person">Contact With dead person</option>
                                <option data-tokens="Contact with body fluids of person infected with Ebola " value="Contact with body fluids of person infected with Ebola ">Contact with body fluids of person infected with Ebola </option>
                                <option data-tokens="Bite from mosquitoes(insects)" value="Bite from mosquitoes(insects)">Bite from mosquitoes(insects)</option>
                                <option data-tokens="Other" value="other">Other (Specify)</option>
                            </select>
                            <p></p><input id="eight" type="text" name="eight" class="form-control" style='display:none;'>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>9. Do you know the signs and symptoms of Ebola virus diseases in humans(If No, skip Q.10) </b></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="nine" name="nine" onChange='displayTen(this.value);'>
                                <option>Select Answer</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="Unknown">Don't Know</option>
                            </select>                          
                        </div>
                    </div>

                    <div style="display:none;" id="numberTen" class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>9. If yes which ones are this? (Check all that apply) </b></label>
                        <div class="col-sm-10">
                            <select multiple class="selectpicker form-control" id="tens" name="tens[]" >
                                <option value="Bleeding">Bleeding</option>
                                <option value="High fever">High Fever</option>
                                <option value="Vomiting">Vomiting</option>
                                <option value="Diarrhea">Diarrhea</option>
                                <option value="Muscle Ache">Muscle Ache</option>
                                <option value="Body Weakness">Body Weakness</option>
                                <option value="All the above">All the above</option>
                                <option value="Unknown">Don't Know</option>
                            </select>                          
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>11. In your opinion, when would you suspect Ebola in a patient? (Check the best answer)</b></label>
                        <div class="col-sm-10">
                            <select  name="elevens" class=" selectpicker form-control" data-width="100%" onchange='checkOtherEleven(this.value);'>
                                <option value="History of travel to an area known to have cases of Ebola">History of travel to an area known to have cases of Ebola</option>
                                <option  value="History of contact with living or dead person suspected to have Ebola">History of contact with living or dead person suspected to have Ebola</option>
                                <option  value="Clinical Presentations">Clinical Presentations</option>
                                <option  value="All the above">All the above</option>
                                <option value="other">Other (Specify)</option>
                            </select>
                            <p></p><input id="eleven" type="text" name="eleven" class="form-control" style='display:none;'>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>12. How long does it take for one to show signs and symptoms from time of exposure? (Check the best answer)</b></label>
                        <div class="col-sm-10">
                            <select  name="twelve" class=" selectpicker form-control" data-width="100%">
                                <option value="Within 12 Hours">Within 12 Hours</option>
                                <option  value="Between 24 to 48 Hours">Between 24 to 48 Hours</option>
                                <option  value="Within 7 Days">Within 7 days</option>
                                <option  value="Between 2 and 21 days">Between 2 and 21 days</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>13. Do you know who to contact in case you see a suspect case of Ebola virus diseases?  </b></label>
                        <div class="col-sm-10">
                            <select class="form-control"  name="thirteen">
                                <option>Select Answer</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="Unknown">Don't Know</option>
                            </select>                          
                        </div>
                    </div>
                    

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>14. In your opinion, do you think animals can transmit Ebola? (If No, skip Q.15) </b></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="nine" name="nine" onChange='displayFifteen(this.value);'>
                                <option>Select Answer</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="Unknown">Don't Know</option>
                            </select>                          
                        </div>
                    </div>

                    <div style="display:none;" id="numberFifteen" class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>If yes, through which animals? (Check all that apply)</b></label>
                        <div class="col-sm-10">
                            <select multiple name="fifteens[]" class=" selectpicker form-control" data-width="100%" onchange='checkOtherFifteen(this.value);'>
                                <option value="Goats">Goats</option>
                                <option  value="Cattle">Cattle</option>
                                <option  value="Sheep">Sheep</option>
                                <option  value="Poultry">Poultry</option>
                                <option value="Dogs">Dogs</option>
                                <option  value="Monkey">Monkey</option>
                                <option  value="Fruit Bats">Fruit Bats</option>
                                <option  value="Antelopes">Antelopes</option>
                                <option  value="Wild Pigs">Wild Pigs</option>
                                <option value="other">Other (Specify)</option>
                            </select>
                            <p></p><input id="fifteen" type="text" name="fifteen" class="form-control" style='display:none;'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>16. Do you think you are at risk of contracting Ebola virus disease? (Check the best answer)  </b></label>
                        <div class="col-sm-10">
                            <select class="form-control"  name="sixteen">
                                <option>Select Answer</option>
                                <option value="No Risk">No Risk</option>
                                <option value="Low Risk">Low Risk</option>
                                <option value="High Risk">High Risk</option>
                                <option value="Unknown">Don't Know</option>
                            </select>                          
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>17. If at risk, why? (Check all that apply)</b></label>
                        <div class="col-sm-10">
                            <select multiple name="seventeens[]" class="selectpicker form-control" data-width="100%" onchange='checkOtherSeventeen(this.value);'>
                                <option value="Directly sees patients">Directly sees patients</option>
                                <option  value="Involved in patient care">Involved in patient care</option>
                                <option  value="Remove patient blood">Remove patient blood</option>
                                <option  value="Test patient blood">Test patient blood</option>
                                <option value="Do patient follow up at community">Do patient follow up at community</option>
                                <option  value="Do patient triage">Do patient triage</option>
                                <option value="other">Other (Specify)</option>
                            </select>
                            <p></p><input id="seventeen" type="text" name="seventeen" class="form-control" style='display:none;'>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>18. If today, you come across a suspected Ebola patient then what will you do? (Check the best answer)</b></label>
                        <div class="col-sm-10">
                            <select multiple name="eighteens[]" class="selectpicker form-control" data-width="100%" onchange='checkOtherEighteen(this.value);'>
                                <option value="Treat the patient like other patients">Treat the patient like other patients</option>
                                <option  value="Run away because Ebola is highly infectious">Run away because Ebola is highly infectious</option>
                                <option  value="Call for help from other clinicians">Call for help from other clinicians</option>
                                <option  value="Call National level">Call National level</option>
                                <option value="Manage patient using extra infection prevention& control measures and notify incharge">Manage patient using extra infection prevention& control measures and notify incharge</option>
                                <option  value="Refer the patient">Refer the patient</option>
                                <option  value="Unknown">Don't Know</option>
                                <option value="other">Other (Specify)</option>
                            </select>
                            <p></p><input id="eighteen" type="text" name="eighteen" class="form-control" style='display:none;'>
                        </div>
                    </div>


                   
                    <button type="submit" class="btn btn-primary"> Next </button>
                </form>
            </div>
        </div>
    </body>
    <footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.11/js/bootstrap-select.min.js"></script>
        <script type="text/javascript">
            function checkOtherFive(val){
                var element=document.getElementById('five');
                if(val=='other')
                element.style.display='block';
                else  
                element.style.display='none';
            }
            function checkOtherSix(val){
                var element=document.getElementById('six');
                if(val=='other')
                element.style.display='block';
                else  
                element.style.display='none';
            }
            function checkOtherEight(val){
                var element=document.getElementById('eight');
                if(val=='other')
                element.style.display='block';
                else  
                element.style.display='none';
            }

            function checkOtherEleven(val){
                var element=document.getElementById('eleven');
                if(val=='other')
                element.style.display='block';
                else  
                element.style.display='none';
            }
            
            function checkOtherFifteen(val){
                var element=document.getElementById('fifteen');
                if(val=='other')
                element.style.display='block';
                else  
                element.style.display='none';
            }
            function checkOtherSeventeen(val){
                var element=document.getElementById('seventeen');
                if(val=='other')
                element.style.display='block';
                else  
                element.style.display='none';
            }
            function checkOtherEighteen(val){
                var element=document.getElementById('eighteen');
                if(val=='other')
                element.style.display='block';
                else  
                element.style.display='none';
            }

            function displayFive(val){
                var element=document.getElementById('numberFive');
                if(val=='Yes')
                element.style.display='block';
                else  
                element.style.display='none';
            }
            function displayEight(val){
                var element=document.getElementById('numberEight');
                if(val=='Yes')
                element.style.display='block';
                else  
                element.style.display='none';
            }
            function displayTen(val){
                var element=document.getElementById('numberTen');
                if(val=='Yes')
                element.style.display='block';
                else  
                element.style.display='none';
            }

            function displayFifteen(val){
                var element=document.getElementById('numberFifteen');
                if(val=='Yes')
                element.style.display='block';
                else  
                element.style.display='none';
            }

        </script> 
    </footer>
</html>
k