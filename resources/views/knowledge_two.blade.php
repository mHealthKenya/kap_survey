<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CHAK SURVEY</title>

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
            <!-- <h2><b> Part A: Individual Vaccine Acceptance</b> </h2> -->
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
                                <!-- <option>Select Answer</option> -->
                                    <option value="Not safe ">Not safe</option>
                                    <option value="Not effective">Not effective</option>
                                    <option value="Feel protected because had COVID-19 already">Feel protected because had COVID-19 already</option>
                                    <option value="Fear of side effects">Fear of side effects</option>
                                    <option value="Not sure of long term protection">Not sure of long term protection</option>
                                    <option value="Feel protected by current PPE">Feel protected by current PPE</option>
                                    <option value="It will kill me">It will kill me</option>
                                    <option value="No fears">No fears</option>
                                    <option value="Will give me COVID-19">Will give me COVID-19</option>
                                    <option value="Other">Other</option>
                                </select>
                                <p></p><input id="thirteen" type="text" name="thirteen" class="form-control" style='display:none;'>
                            </div>
                        </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>14. What else would you need to feel more confident about accepting the COVID-19 vaccine?</b></label>
                        <div class="col-sm-10">
                                <select id="fourteenSelected" multiple name="fourteens[]" class=" selectpicker form-control" data-width="100%" data-live-search="true" onchange='loadFourteen();'>
                                <!-- <option>Select Answer</option> -->
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

                    
                    </div>

                    <!-- <button> <a href="" class="previous"> &laquo;previous</a></button> -->
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
            function loadFourteen(){
                var element2 = document.getElementById('fourteen');
                element2.value = $('#fourteenSelected option:selected').toArray().map(item => item.text).join();
            }

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
