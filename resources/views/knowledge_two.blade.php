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
        <div class='content col-md-12'><br>
        <img src="{{ asset('images/healthcare.jpg') }}" alt="image" height="100" width="100">
            <h1><b>CHAK HCW SURVEY<b></h1>
            <h2> Knowledge, attitude and perceptions on Corona virus disease among health care workers in Kenya. </h2>
          
            <div class="col-md-12" style="margin-top:20px;">
            <h2><b> Part A: Indivudual Vaccine Acceptance</b> </h2>
                <form role="form" method="post" action="{{route('addKnowledgeTwo')}}" >
                    {{ csrf_field() }}
                    <input type="hidden" name="survey_id" class="form-control" value="{{$answer->survey_id}}">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>12. If you were offered the COVID-19 vaccine now, would you accept it? (If No move to 13)</b></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="twelve" name="twelve" onChange='displayThirteen(this.value);'>
                                <option>Select Answer</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="Unknown">I Don't Know</option>
                                <option value="I want to wait until others receive it">I want to wait until others receive it</option>
                                <option value="I want to see what happens in the longer term among those who receive it">I want to see what happens in the longer term among those who receive it</option>
                            </select>                          
                        </div>
                    </div>


                    <div style="display: none;"  id="numberThirteen" class="form-group row">
                            <label class="col-sm-2 col-form-label" ><b>13. If No, what are your concerns regading the COVID-19 vaccine?</b></label>
                            <div class="col-sm-10">
                                <select  multiple name="thirteens[]" class="selectpicker form-control" data-width="100%" data-live-search="true" onchange='checkOtherThirteen(this.value);'>
                                <option>Select Answer</option>
                                    <option value="Not safe ">Not safe</option>
                                    <option value="Not effective">Not effective</option>
                                    <option value="Feel protected because had COVID-19 already">Feel protected because had COVID-19 already</option>
                                    <option value="Fear of side effects">Fear of side effects</option>
                                    <option value="Not sure of long term protection">Not sure of long term protection</option>
                                    <option value="Feel protected by current PPE">Feel protected by current PPE</option>
                                    <option value="It will kill me">It will kill me</option>
                                    <option value="No fears">No fears</option>
                                    <option value="Other">Other</option>
                                </select>
                                <p></p><input id="thirteen" type="text" name="thirteen" class="form-control" style='display:none;'>
                            </div>
                        </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>14. What else would you need to feel more confident about accepting the COVID-19 vaccine?</b></label>
                        <div class="col-sm-10">
                            <select multiple name="fourteens" class=" selectpicker form-control" data-width="100%" data-live-search="true" onchange='checkOtherFourteen(this.value);'>
                                <option>Select Answer</option>
                                <option value="More information about effectiveness">More information about effectiveness</option>
                                <option value="Seeing other peers get vaccine">seeing other peers get vaccine</option>
                                <option value="Compensation for time off work">compensation for time off work</option>
                                <option value="Information from other countries that it is reducing COVID-19 deaths and hospitalizations">information from other countries that it is reducing COVID-19 deaths and hospitalizations</option>
                                <option value="Approved by supervisor">Approved by supervisor</option>
                                <option value="Promoted by the government">Promoted by the government</option>                                
                            </select>
                            <p></p><input id="fourteen" type="text" name="fourteen" class="form-control" style='display:none;'>
                        </div>
                    </div>

                    <!-- <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>22. Have you had any Ebola training or sensitization? (If No, skip Q.23&24, check all that apply)</b></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="twentytwo" name="twentytwo" onChange='displayTwentythree(this.value);'>
                                <option>Select Answer</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="Unknown">Don't Know</option>
                            </select>                          
                        </div>
                    </div>
                    <div style="display: none;"  id="numberTwentythreegrp">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" ><b>23. If yes, when?</b></label>
                            <div class="col-sm-10">
                                <select class="form-control" id="twentythree" name="twentythree" >
                                    <option>Select Answer</option>
                                    <option value="Within the last 6 months">Within the last 6 months</option>
                                    <option value="Between 6 months to 12 months">Between 6 months to 12 months</option>
                                    <option value="12 to 24 months">12 to 24 months</option>
                                    <option value="over 24 months">over 24 months</option>
                                </select>                          
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" ><b>24. Which topics would you like to be trained on? (Check the best answer)</b></label>
                            <div class="col-sm-10">
                                <select   name="twentyfours" class="selectpicker form-control" data-width="100%" data-live-search="true" onchange='checkOtherTwentyfour(this.value);'>
                                    <option value="Surveillance ">Surveillance</option>
                                    <option value="case management">case management</option>
                                    <option value="infection prevention and control">infection prevention and control</option>
                                    <option value="Sample collection">Sample collection</option>
                                    <option value="Risk communication">Risk communication</option>
                                    <option value="other">Other(specify)</option>
                                </select>
                                <p></p><input id="twentyfour" type="text" name="twentyfour" class="form-control" style='display:none;'>
                            </div>
                        </div>

                    </div>

                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label" ><b>25. If No, which topics would you wish to be trained on?(check all that apply)</b></label>
                            <div class="col-sm-10">
                                <select multiple name="twentyfives[]" class="selectpicker form-control" data-width="100%" data-live-search="true" onchange='checkOtherTwentyfive(this.value);'>
                                    <option value="Surveillance ">Surveillance</option>
                                    <option value="case management">case management</option>
                                    <option value="infection prevention and control">infection prevention and control</option>
                                    <option value="Sample collection">Sample collection</option>
                                    <option value="Risk communication">Risk communication</option>
                                    <option value="other">Other(specify)</option>
                                </select>
                                <p></p><input id="twentyfive" type="text" name="twentyfive" class="form-control" style='display:none;'>
                            </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>26. In the event Ebola outbreak is reported in the Country, would you work in Ebola Treatment Centre? (If Yes skip Q.27)</b></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="twentysix" name="twentysix" onChange='displayTwentyseven(this.value);'>
                                <option>Select Answer</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="Unknown">Don't Know</option>
                            </select>                          
                        </div>
                    </div>

                    <div style="display: none;"  id="numberTwentyseven" class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>27. If no, why?</b></label>
                        <div class="col-sm-10"><input id="twentyseven" type="textarea" name="twentyseven" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>28. In the event of Ebola virus disease in the country, would you be willing to be vaccinated against Ebola using experimental vaccine? (If Yes skip Q.29)</b></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="twentyeight" name="twentyeight" onChange='displayTwentynine(this.value);'>
                                <option>Select Answer</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="Unknown">Don't Know</option>
                            </select>                          
                        </div>
                    </div>

                    <div style="display: none;"  id="numberTwentynine" class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>29. If no, why?</b></label>
                        <div class="col-sm-10"><input id="twentynine" type="textarea" name="twentynine" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>30. In the event of Ebola virus disease outbreak in the country and you become infected, would you be willing to receive the Ebola experimental drugs? (If Yes skip Q.31)</b></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="thirty" name="thirty" onChange='displayThirtyone(this.value);'>
                                <option>Select Answer</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="Unknown">Don't Know</option>
                            </select>                          
                        </div>
                    </div>

                    <div style="display: none;"  id="numberThirtyone" class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>31. If no, why?</b></label>
                        <div class="col-sm-10"><input id="thirtyone" type="textarea" name="thirtyone" class="form-control" >
                        </div> -->
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
            // function displayTwelve(val){
            //     var element=document.getElementById('numberTwelve')
            //     if(val=='No')
            //     element.style.display='block';
            //     else  
            //     element.style.display='none';
            // }

            function displayThirteen(val){
                var element=document.getElementById('numberThirteen');
                if(val=='No')
                element.style.display='block';
                else  
                element.style.display='none';
            }
            function displayTwentythree(val){
                var element=document.getElementById('numberTwentythreegrp');
                if(val=='Yes')
                element.style.display='block';
                else  
                element.style.display='none';
            }
            function displayTwentyseven(val){
                var element=document.getElementById('numberTwentyseven');
                if(val=='No')
                element.style.display='block';
                else  
                element.style.display='none';
            }
            function displayTwentynine(val){
                var element=document.getElementById('numberTwentynine');
                if(val=='No')
                element.style.display='block';
                else  
                element.style.display='none';
            }
            function displayThirtyone(val){
                var element=document.getElementById('numberThirtyone');
                if(val=='No')
                element.style.display='block';
                else  
                element.style.display='none';
            }
            function checkOtherTwelve(val){
                var element=document.getElementById('twelve');
                if(val=='other')
                element.style.display='block';
                else  
                element.style.display='none';
            }
            function checkOtherThirteen(val){
                var element=document.getElementById('thirteen');
                if(val=='other')
                element.style.display='block';
                else  
                element.style.display='none';
            }
            
            function checkOtherFourteen(val){
                var element=document.getElementById('fourteen');
                if(val=='other')
                element.style.display='block';
                else  
                element.style.display='none';
            }
            function checkOtherTwentyfive(val){
                var element=document.getElementById('twentyfive');
                if(val=='other')
                element.style.display='block';
                else  
                element.style.display='none';
            }

        </script> 
    </footer>
</html>
