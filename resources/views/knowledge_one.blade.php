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
            <h2><b> Part C: Demographic data</b> </h2>
                <form role="form" method="post" action="{{route('addKnowledgeOne')}}" >
                    {{ csrf_field() }}
                    <input type="hidden" name="survey_id" class="form-control" value="{{$answer->survey_id}}">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>6. Have you previously contracted COVID 19?  </b></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="six" name="six" >
                                <option>Select Answer</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <!-- <option value="Unknown">Don't Know</option> -->
                            </select>                          
                        </div>
                    </div>

                    
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>7. Have any of your friends/family contracted COVID 19? </b></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="seven" name="seven" >
                                <option>Select Answer</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <!-- <option value="Unknown">Don't Know</option> -->
                            </select>                          
                        </div>
                    </div>

                    <h2><b> Knowledge/Awareness</b> </h2>
                    <div class="form-group row"> 
                        <label class="col-sm-2 col-form-label" ><b>8. Have you received training on adminstering any of the COVID-19 vaccines? </b></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="eight" name="eight" onChange='displayNine(this.value);'>
                                <option>Select Answer</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="Unknown">Don't Know</option>
                            </select>                          
                        </div>
                    </div>
                    
                    <div style = "display: none;" id="numberNine" class="form-group row">
                    <h2><b> Sources of Information</b> </h2>
                        <label class="col-sm-2 col-form-label" ><b>9.  If you did not receive training, where would you prefer to receive this training on administering any of the COVID-19 vaccines? </b></label>
                        <div class="col-sm-10">
                            <select id="nineSelected" multiple name="nines[]" class="selectpicker form-control" data-width="100%" data-live-search="true" onchange='loadNine();'>
                                <option value="Professional bodies">Professional Bodies</option>
                                <option value="Facility training">Facility Training</option>
                                <option value="Website">Website</option>
                                <option value="Whatsapp">WhatsApp</option>
                                <option value="Newspaper">Newspaper</option>
                                <option value="Flyer">Flyer</option>
                                <option value="Poster">Poster</option>
                                <option value="other">Other</option>
                            </select>  
                            <input id = "nine" type="text" name = "nine" class="form-control" style='display:none;' > 
                        </div>
                    </div>
                    <small style = 'color:red;'> You may skip Question 10 if your response was 'No' in Question 8.</small>
                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label" ><b>10. Where did you receive your information regarding the COVID-19 vaccines?</b></label>
                            <div class="col-sm-10">
                                <select id="tenSelected" multiple name="tens[]" class="selectpicker form-control" data-width="100%" data-live-search="true" onchange='loadTen();'>
                                    <!-- <option disabled>Select Answer</option> -->
                                    <option value="Professional bodies">Professional Bodies</option>
                                    <option value="Facility training">Facility Training</option>
                                    <option value="Website">website</option>
                                    <option value="Whatsapp">WhatsApp</option>
                                    <option value="Newspaper">Newspaper</option>
                                    <option value="Flyer">Flyer</option>
                                    <option value="Poster">Poster</option>
                                    <option value="Other">Other</option>
                                </select>  
                                <input id="ten" type="text" name="ten" class="form-control" style='display:none;'>
                            </div>
                        </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>11. What sources of information do you trust regarding the COVID-19 vaccine?</b></label>
                        <div class="col-sm-10">
                            <select id="elevenSelected" multiple name="elevens[]" class="selectpicker form-control" data-width="100%" data-live-search="true" onchange='loadEleven();'>
                                <!-- <option>Select Answer</option> -->
                                <option data-tokens="Media(TV)" value="Media(TV)">Media(TV)</option>
                                <option data-tokens="Radio" value="Radio">Radio</option>
                                <option data-tokens="Website" value="website">Website</option>
                                <option data-tokens="Twitter" value="Twitter">Twitter</option>
                                <option data-tokens="Facebook" value="Facebook">Facebook</option>
                                <option data-tokens="Whatsapp" value="Whatsapp">Whatsapp</option>
                                <option data-tokens="Newspaper" value="Newspaper">Newspaper</option>
                                <option data-tokens="Flyer" value="Flyer">Flyer</option>
                                <option data-tokens="Poster" value="Poster">Poster</option>
                                <option data-tokens="Village leader" value="Village leader">Village Leader</option>
                                <option data-tokens="Professional bodies" value="Professional bodies">Professional Bodies</option>
                                <option data-tokens="Religious leaders" value="Religious leaders">Religious Leaders</option>
                                <option data-tokens="Peer Health Workers" value="Peer Health Workers">Peer Health Workers</option>
                                <option data-tokens="Other" value="other">Other</option>

                            </select>
                            <p></p><input id="eleven" type="text" name="eleven" class="form-control" style='display:none;'>

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

            //function loadNine loads all the selected text and joins them
            function loadNine(){
                //initialize the hidden input with id nine as element2
                var element2 = document.getElementById('nine');
                //set the value of the hidden input to the joined selected text
                element2.value = $('#nineSelected option:selected').toArray().map(item => item.text).join();

            }

            //same as loadNine
            function loadTen(){
               
               var element2 = document.getElementById('ten');
               element2.value = $('#tenSelected option:selected').toArray().map(item => item.text).join();

           }

           function loadEleven(){
               
               var element2 = document.getElementById('eleven');
               element2.value = $('#elevenSelected option:selected').toArray().map(item => item.text).join();

           }

            function checkOtherSix(val){
                var element=document.getElementById('six');
                if(val=='other')
                element.style.display='block';
                else  
                element.style.display='none';
            }
            function checkOtherSeven(val){
                var element=document.getElementById('seven');
                if(val=='other')
                element.style.display='block';
                else  
                element.style.display='none';
            }
           
            
            function checkOtherTen(val){
                var element=document.getElementById('ten');
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

           

            function displaySix(val){
                var element=document.getElementById('numberSix');
                if(val=='Yes')
                element.style.display='block';
                else  
                element.style.display='none';
            }
            function displayNine(val){
                var element=document.getElementById('numberNine');
                if(val=='No')
                element.style.display='block';
                else  
                element.style.display='none';
            }
            
        

        </script> 
    </footer>
    @toastr_js
    @toastr_render
</html>
