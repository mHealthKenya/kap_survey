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
        @toastr_css
    </head>
    <body>
        <div class='content col-md-12'><br>
        <img src="{{ asset('images/healthcare.jpg') }}" alt="image" height="100" width="100">
            <h1><b>CHAK HCW SURVEY<b></h1>
            <h2> Knowledge, attitude and perceptions on Corona virus disease among health care workers in Kenya. </h2>
          
            <div class="col-md-12" style="margin-top:20px;">
            <!-- <h2><b> Section C: Knowledge & Attitude Questions</b> </h2> -->
            <!-- <h2><b> Part B: Indivudual Vaccine Acceptance</b> </h2> -->
                <form role="form" method="post" action="{{route('saveKnowledgeThree')}}" >
                    {{ csrf_field() }}
                    <input type="hidden" name="survey_id" class="form-control" value="{{$answer->survey_id}}">
                    {{-- <input type="hidden" name="survey_id" class="form-control" value="{{$answer->survey_id}}"> --}}

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>15. What type of materials would you need to help promote the vaccine among your clients?</b></label>
                        <div class="col-sm-10">
                            <select id="fifteenSelected" multiple name="fifteens" class=" selectpicker form-control" data-width="100%" data-live-search="true" onchange='loadFifteen();'>
                                <option value="Job aids for counseling">Job aids for counseling</option>
                                <option value="Frequently asked questions handouts">Frequently asked questions handouts </option>
                                <option value="Testimonials from others that received the vaccine">Testimonials from others that received the vaccine</option>
                                <option value="How many health care workers and population have been vaccinated to date">How many health care workers and population have been vaccinated to date</option>
                                <option value="List of common side effects and how to manage">List of common side effects and how to manage</option>
                            </select>
                            <p></p><input id="fifteen" type="text" name="fifteen" class="form-control" style='display:none;'>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                    <!-- <h2><b> Social Norms</b> </h2> -->
                        <label class="col-sm-2 col-form-label" ><b>16.	If a client comes to the clinic for a COVID-19 vaccine, would your co-workers provide the vaccine if available?   </b></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="sixteen" name="sixteen" onChange='displayThirtyTwo(this.value);'>
                                <option>Select Answer</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="Unknown">I Don't Know</option>
                            </select>                          
                        </div>
                        </div>
                        <div class="form-group row">
                        <!-- <h2><b> Individual Risk Perception</b> </h2> -->
                        <label class="col-sm-2 col-form-label" ><b>17. Do you feel you are at high risk for contracting COVID-19 in your facility where you work?   </b></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="seventeen" name="seventeens[]" onChange='displayThirtyTwo(this.value);'>
                                <option>Select Answer</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="Unknown">I Don't Know</option>
                            </select>                          
                    </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>18. Do you feel you are at high risk for contracting COVID-19 in your community where you live?   </b></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="eighteen" name="eighteens[]" onChange='displayThirtyTwo(this.value);'>
                                <option>Select Answer</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="Unknown">I Don't Know</option>
                            </select>                          
                    </div>
                    </div>

                        </div>


                   
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit Survey" />
                </form>
            </div>
        </div>
    </body>
    <footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.11/js/bootstrap-select.min.js"></script>
        <script type="text/javascript">

            function loadFifteen(){
                var element2 = document.getElementById('fifteen');
                element2.value = $('#fifteenSelected option:selected').toArray().map(item => item.text).join();
            }
            
            function checkOtherFifteen(val){
                var element=document.getElementById('fifteen');
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

            function displayEighteen(val){
                var element=document.getElementById('numberEighteen');
                if(val=='Yes')
                element.style.display='block';
                else  
                element.style.display='none';
            }

            function displayForty(val){
                var element=document.getElementById('numberForty');
                if(val=='Yes')
                element.style.display='block';
                else  
                element.style.display='none';
            }

        </script> 
    </footer>
    @toastr_js
    @toastr_render
</html>