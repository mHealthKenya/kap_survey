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
            <h2><b> Section D: Ebola virus prevention</b> </h2>
                <form role="form" method="post" action="{{route('addKnowledgeTwo')}}" >
                    {{ csrf_field() }}
                    <input type="hidden" name="survey_id" class="form-control" value="{{$answer->survey_id}}">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>19. Do you know how Ebola virus disease can be prevented? (If No, skip Q.20)</b></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="nineteen" name="nineteen" onChange='displayTwenty(this.value);'>
                                <option>Select Answer</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="Unknown">Don't Know</option>
                            </select>                          
                        </div>
                    </div>

                    <div style="display: none;"  id="numberTwenty" class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>20. If yes, from whom did you hear of Ebola? (Check all that apply)</b></label>
                        <div class="col-sm-10">
                            <select multiple name="twentys[]" class=" selectpicker form-control" data-width="100%" data-live-search="true" onchange='checkOtherTwenty(this.value);'>
                                <option value="Preventable by avoiding contact with body fluids of infected persons">Preventable by avoiding contact with body fluids of infected persons</option>
                                <option value="Preventable by avoiding contact with corpse of persons who die from Ebola ">Preventable by avoiding contact with corpse of persons who die from Ebola </option>
                                <option value="Immediate treatment in health facility increases chance of survival">Immediate treatment in health facility increases chance of survival</option>
                                <option value="Immediate treatment in health facility reduces chance of Ebola spread">Immediate treatment in health facility reduces chance of Ebola spread</option>
                                <option value="Male survivors should use condoms for at least 3 months to prevent sexual transmission">Male survivors should use condoms for at least 3 months to prevent sexual transmission</option>
                                <option value="Wash hands with soap and water more often ">Wash hands with soap and water more often </option>
                                <option value="Avoid all physical contact with those suspected of having Ebola ">Avoid all physical contact with those suspected of having Ebola </option>
                                <option value="Avoid crowded places ">Avoid crowded places</option>
                                <option value="By getting vaccinated">By getting vaccinated</option>
                                <option value="By getting the experimental Ebola drugs">By getting the experimental Ebola drugs</option>
                                <option value="All the above">All the above</option>
                                <option value="other">Other(specify)</option>
                            </select>
                            <p></p><input id="twenty" type="text" name="twenty" class="form-control" style='display:none;'>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>21. How do you think Ebola virus disease can best be healed or treated? (Check the best answer)</b></label>
                        <div class="col-sm-10">
                            <select  name="twentyones" class=" selectpicker form-control" data-width="100%" data-live-search="true" onchange='checkOtherTwentyone(this.value);'>
                                    <option>Select Answer</option>
                                <option value="traditional medicine">traditional medicine</option>
                                <option value="spiritual healing">spiritual healing</option>
                                <option value="Modern medicine">Modern medicine</option>
                                <option value="No treatment">No treatment</option>
                                <option value="other">Other(specify)</option>
                            </select>
                            <p></p><input id="twentyone" type="text" name="twentyone" class="form-control" style='display:none;'>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>22. Have you had any Ebola training or sensitization? (If No, skip Q.23&24 to 25)</b></label>
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
                            <label class="col-sm-2 col-form-label" ><b>24. How do you think Ebola virus disease can best be healed or treated? (Check the best answer)</b></label>
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
                            <label class="col-sm-2 col-form-label" ><b>25. If No, which topics would you wish to be trained on?</b></label>
                            <div class="col-sm-10">
                                <select  name="twentyfives" class="selectpicker form-control" data-width="100%" data-live-search="true" onchange='checkOtherTwentyfive(this.value);'>
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
            function displayTwenty(val){
                var element=document.getElementById('numberTwenty');
                if(val=='Yes')
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
            function checkOtherTwenty(val){
                var element=document.getElementById('twenty');
                if(val=='other')
                element.style.display='block';
                else  
                element.style.display='none';
            }
            function checkOtherTwentyone(val){
                var element=document.getElementById('twentyone');
                if(val=='other')
                element.style.display='block';
                else  
                element.style.display='none';
            }
            function checkOtherTwentyfour(val){
                var element=document.getElementById('twentyfour');
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
k