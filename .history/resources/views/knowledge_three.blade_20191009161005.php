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
                <form role="form" method="post" action="{{route('moreDemographics')}}" >
                    {{ csrf_field() }}
                    <input type="hidden" name="survey_id" class="form-control" value="none">

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
                            <select multiple name="fives" class=" selectpicker form-control" data-width="100%" data-live-search="true">
                                <option data-tokens="Uganda" value="Uganda">Uganda</option>
                                <option data-tokens="Democratic Republic of Congo" value="Democratic Republic of Congo">Democratic Republic of Congo</option>
                                <option data-tokens="South Sudan" value="South Sudan">South Sudan</option>
                                <option data-tokens="Liberia Sierra Leone" value="Liberia Sierra Leone">Liberia Sierra Leone</option>
                                <option data-tokens="Guinea" value="Guinea">Guinea</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>34.	Where did you learn of the current outbreak? (Check the best answer)</b></label>
                        <div class="col-sm-10">
                            <select multiple name="sixes" class="selectpicker form-control" data-width="100% data-live-search="true">
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

            function displayThirtyTwo(val){
                var element=document.getElementById('numberThirtyTwo');
                if(val=='Yes')
                element.style.display='block';
                else  
                element.style.display='none';
            }

        </script> 
    </footer>
</html>
k