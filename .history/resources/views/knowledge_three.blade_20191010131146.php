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
                <form role="form" method="post" action="{{route('saveKnowledgeThree')}}" >
                    {{ csrf_field() }}
                    <input type="hidden" name="survey_id" class="form-control" value="none">
                    {{-- <input type="hidden" name="survey_id" class="form-control" value="{{$answer->survey_id}}"> --}}

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>32.	In the last 6 months have you heard of any Ebola outbreak in Africa?   </b></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="thirtytwo" name="thirtytwo" onChange='displayThirtyTwo(this.value);'>
                                <option>Select Answer</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="Unknown">Don't Know</option>
                            </select>                          
                        </div>
                    </div>

                    <div style="display: none;"  id="numberThirtyTwo" class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>33.	If yes, where? (Check all that apply)</b></label>
                        <div class="col-sm-10">
                            <select multiple name="thirtythrees" class=" selectpicker form-control" data-width="100%" data-live-search="true">
                                <option data-tokens="Uganda" value="Uganda">Uganda</option>
                                <option data-tokens="Democratic Republic of Congo" value="Democratic Republic of Congo">Democratic Republic of Congo</option>
                                <option data-tokens="South Sudan" value="South Sudan">South Sudan</option>
                                <option data-tokens="Liberia Sierra Leone" value="Liberia Sierra Leone">Liberia Sierra Leone</option>
                                <option data-tokens="Guinea" value="Guinea">Guinea</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>34.	Where did you learn of the current outbreak? (Check all that apply)</b></label>
                        <div class="col-sm-10">
                            <select multiple name="thirtyfours" class="selectpicker form-control" data-width="100% data-live-search="true">
                                <option data-tokens="Radio" value="Radio">Radio</option>
                                <option data-tokens="Television" value="Television">Television</option>
                                <option data-tokens="MOH circular" value="MOH circular">MOH circular. </option>
                                <option data-tokens="IEC materials" value="IEC materials">IEC materials</option>
                                <option data-tokens="Health worker sensitization" value="Health worker sensitization">Health worker sensitization</option>
                                <option data-tokens="Internet" value="Internet">Internet</option>
                                <option data-tokens="Social Media" value="Social Media">Social Media</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>35.	In the last 6 months, have you come across any Ebola educational materials (Check all that apply)</b></label>
                        <div class="col-sm-10">
                            <select multiple name="thirtyfives" class="selectpicker form-control" data-width="100% data-live-search="true">
                                <option data-tokens="Banner" value="Banner">Banner</option>
                                <option data-tokens="Posters" value="Posters">Posters</option>
                                <option data-tokens="Factsheet" value="Factsheet">Factsheet. </option>
                                <option data-tokens="Leaflet" value="Leaflet">Leaflet</option>
                                <option data-tokens="Bronchure" value="Bronchure">Bronchure</option>
                                <option data-tokens="Radio message" value="Radio message">Radio message</option>
                                <option data-tokens="Television" value="Television">Television</option>
                                <option data-tokens="Social Media" value="Social Media">Social Media</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>36. Are you satisfied with current Ebola message dissemination?</b></label>
                        <div class="col-sm-10">
                            <select multiple name="thirtysixes" class="selectpicker form-control" data-width="100% data-live-search="true" onchange='checkOtherThirtySix(this.value);'>
                                <option data-tokens="Very satisfied" value="Very satisfied">Very satisfied</option>
                                <option data-tokens="Satisfied" value="Satisfied">Satisfied</option>
                                <option data-tokens="Not Satisfied" value="Not Satisfied">Not Satisfied</option>
                                <option data-tokens="Very Dissatisfied" value="Very Dissatisfied">Very Dissatisfied</option>
                                <option data-tokens="Other" value="other">Other (Specify)</option>
                            </select>
                            <p></p><input id="thirtysix" type="text" name="thirtysix" class="form-control" style='display:none;'>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>37. What would you want to be done in creating awareness on Ebola? (Check all that apply)</b></label>
                        <div class="col-sm-10">
                            <select multiple name="thirtysevens" class="selectpicker form-control" data-width="100% data-live-search="true" onchange='checkOtherThirtySeven(this.value);'>
                                <option data-tokens="Conduct health worker sensitization" value="Conduct health worker sensitization">Conduct health worker sensitization</option>
                                <option data-tokens="Provide Ebola IEC materials" value="Provide Ebola IEC materials">Provide Ebola IEC materials</option>
                                <option data-tokens="Airing Radio messages" value="Airing Radio messages">Airing Radio messages</option>
                                <option data-tokens="Airing  Television messages" value="Airing  Television messages">Airing  Television messages</option>
                                <option data-tokens="All the above" value="All the above">All the above</option>
                                <option data-tokens="Other" value="other">Other (Specify)</option>
                            </select>
                            <p></p><input id="thirtyseven" type="text" name="thirtyseven" class="form-control" style='display:none;'>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>38. In this community do you think there are some behaviours that may put them at risk of Ebola? (Check all that apply)</b></label>
                        <div class="col-sm-10">
                            <select multiple name="thirtyeights" class="selectpicker form-control" data-width="100% data-live-search="true" onchange='checkOtherThirtyEight(this.value);'>
                                <option data-tokens="Residents like traditional medication" value="Residents like traditional medication">Residents like traditional medication</option>
                                <option data-tokens="Residents like wild animals like monkeys, antelopes" value="Residents like wild animals like monkeys, antelopes">Residents like wild animals like monkeys, antelopes</option>
                                <option data-tokens="Presence of refugees" value="Presence of refugees">Presence of refugees</option>
                                <option data-tokens="Working of dead body before burial" value="Working of dead body before burial">Working of dead body before burial</option>
                                <option data-tokens="Sleeping with dead bodies before burial" value="Sleeping with dead bodies before burial">Sleeping with dead bodies before burial</option>
                                <option data-tokens="None" value="None">None</option>
                                <option data-tokens="Other" value="other">Other (Specify)</option>
                            </select>
                            <p></p><input id="thirtyeight" type="text" name="thirtyeight" class="form-control" style='display:none;'>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>39.	In your opinion, are there any rumours and misconception about Ebola in this area?   </b></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="thirtynine" name="thirtynine" onChange='displayForty(this.value);'>
                                <option>Select Answer</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="Unknown">Don't Know</option>
                            </select>                          
                        </div>
                    </div>

                    <div style="display: none;"  id="numberForty" class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>40.	If No, why?</b></label>
                        <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" placeholder="Please provide reason" /><br /><br />
                        </div>
                    </div>

                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label" ><b>41.	In this community, what are the main sources of passing health messages? (Check all that apply)</b></label>
                            <div class="col-sm-10">
                                <select multiple name="fortyones" class="selectpicker form-control" data-width="100% data-live-search="true">
                                    <option data-tokens="Banner" value="Banner">Banner</option>
                                    <option data-tokens="Posters" value="Posters">Posters</option>
                                    <option data-tokens="Factsheet" value="Factsheet">Factsheet. </option>
                                    <option data-tokens="Leaflet" value="Leaflet">Leaflet</option>
                                    <option data-tokens="Bronchure" value="Bronchure">Bronchure</option>
                                    <option data-tokens="Radio message" value="Radio message">Radio message</option>
                                    <option data-tokens="Television" value="Television">Television</option>
                                    <option data-tokens="Social Media" value="Social Media">Social Media</option>
                                    <option data-tokens="Interpersonal communication" value="Interpersonal communication">Interpersonal communication</option>
                                </select>
                            </div>
                        </div>


                   
                        <input type="submit" name="submit" class="btn btn-primary" value="Add Working Hours" />
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
            function checkOtherThirtySix(val){
                var element=document.getElementById('thirtysix');
                if(val=='other')
                element.style.display='block';
                else  
                element.style.display='none';
            }

            function checkOtherThirtySeven(val){
                var element=document.getElementById('thirtyseven');
                if(val=='other')
                element.style.display='block';
                else  
                element.style.display='none';
            }

            function checkOtherThirtyEight(val){
                var element=document.getElementById('thirtyeight');
                if(val=='other')
                element.style.display='block';
                else  
                element.style.display='none';
            }

            function displayThirtyTwo(val){
                var element=document.getElementById('numberThirtyTwo');
                if(val=='Yes')
                element.style.display='block';
                else  
                element.style.display='none';
            }

            function displayForty(val){
                var element=document.getElementById('numberForty');
                if(val=='No')
                element.style.display='block';
                else  
                element.style.display='none';
            }

        </script> 
    </footer>
</html>
k