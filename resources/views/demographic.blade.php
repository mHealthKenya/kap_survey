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
            <h1>CHAK HCW SURVEY</h1>
            <h2> Knowledge, attitude and perceptions on Corona virus disease among health care workers in Kenya. </h2>
          
            <div class="col-md-12" style="margin-top:20px;">
            <h2><b> Part B: Demographic data </b> </h2>
                <form role="form" method="post" action="{{route('addDemographics')}}" >
                    {{ csrf_field() }}
                    <input type="hidden" name="survey_id" class="form-control" value="{{$survey->id}}">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>1. Age in years: </b></label>
                        <div class="col-sm-10">
                            <input min='18' type="number" name="age" class="form-control" id="age" required>
                          </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>2. Gender </b></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="gender" name="gender" required>
                                <option>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>                          
                        </div>


                        </div>

                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>3. Phone Number: </b></label>
                        <div class="col-sm-10">
                            <input min='18' type="number" name="phone" class="form-control" id="phone">
                          </div>
                        
                        </div>

                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>4. Experience (in years): </b></label>
                        <div class="col-sm-10">
                            <input min='0' type="number" name="experience" class="form-control" id="experience" required>
                          </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>5.	Cadre of Health care worker </b></label>
                        <div class="col-sm-10">
                            <select name="cadres" class=" selectpicker form-control" data-width="100%" data-live-search="true" required onchange='checkOther(this.value);'>
                                <option data-tokens="Student" value="Student">Student</option>
                                <option data-tokens="Nurse" value="Nurse">Nurse</option>
                                <option data-tokens="Clinical Officer" value="Clinical Officer">Clinical Officer</option>
                                <option data-tokens="PHO" value="PHO">PHO</option>
                                <option data-tokens="Lab Tech" value="Lab Tech">Lab Tech</option>
                                <option data-tokens="Medical Officer" value="Medical Officer">Medical Officer</option>
                                <option data-tokens="Consultant" value="Consultant">Consultant</option>
                                <option data-tokens="HRIO" value="HRIO">HRIO</option>
                                <option data-tokens="Pharm Tech" value="Pharm Tech">Pharm Tech</option>
                                <option data-tokens="Pharmacist" value="Pharmacist">Pharmacist</option>
                                <option data-tokens="Nutritionist" value="Nutritionist">Nutritionist</option>
                                <option data-tokens="CHEW" value="CHEW">CHEW</option>
                                <option data-tokens="Other" value="other">Other (Specify)</option>
                            </select>
                            <p></p><input id="cadre" type="text" name="cadre" class="form-control" style='display:none;'>
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
            function checkOther(val){
            var element=document.getElementById('cadre');
            if(val=='other')
            element.style.display='block';
            else  
            element.style.display='none';
            }

        </script> 
    </footer>
</html>
