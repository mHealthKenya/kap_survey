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

                    <!-- <div style="display: none;"  id="numbersix" class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>6.	If yes, from whom did you hear of Ebola? (Check all that apply)</b></label>
                        <div class="col-sm-10">
                            <select multiple name="sixes[]" class=" selectpicker form-control" data-width="100%" data-live-search="true" onchange='checkOtherFive(this.value);'>
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
                    </div> -->

                    <!-- <div class="form-group row"> -->
                        <!-- <label class="col-sm-2 col-form-label" ><b>6.	What is Corona virus disease? (Check the best answer)</b></label>
                        <div class="col-sm-10">
                            <select multiple name="sixes[]" class="selectpicker form-control" data-width="100% data-live-search="true" onchange='checkOtherSix(this.value);'>
                                <option data-tokens="It is a severe and often deadly disease caused by Ebola virus" value="It is a severe and often deadly disease caused by Ebola virus">It is a severe and often deadly disease caused by Ebola virus</option>
                                <option data-tokens="It is a severe disease caused by a protozoann" value="It is a severe disease caused by a protozoann">It is a severe disease caused by a protozoann</option>
                                <option data-tokens="Disease only found among people eating monkeys in Congo and West Africa. " value="Disease only found among people eating monkeys in Congo and West Africa. ">Disease only found among people eating monkeys in Congo and West Africa. </option>
                                <option data-tokens="Don’t know" value="Don’t know">Don’t know</option>
                                <option data-tokens="Other" value="other">Other (Specify)</option>
                            </select>
                            <p></p><input id="six" type="text" name="six" class="form-control" style='display:none;'>
                        </div> -->
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
                                <option>Select Answer</option>
                                <option value="Professional bodies">Professional Bodies</option>
                                <option value="Facility training">Facility Training</option>
                                <option value="Website">Website</option>
                                <option value="Whatsapp">WhatsApp</option>
                                <option value="Newspaper">Newspaper</option>
                                <option value="Flyer">Flyer</option>
                                <option value="Poster">Poster</option>
                                <option value="other">Other</option>
                            </select>  
                            <input id="nine" type="text" name="nine" class="form-control" style='display:none;' > 
                        </div>
                    </div>
                    <small style = 'color:red;'> You may skip Question 10 if your response was 'No' in Question 8.</small>
                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label" ><b>10. Where did you receive your information regarding the COVID-19 vaccines?</b></label>
                            <div class="col-sm-10">
                                <select id="tenSelected" multiple name="tens[]" class="selectpicker form-control" data-width="100%" data-live-search="true" onchange='loadTen();'>
                                    <!-- <option>Select answer if you choose "No" in 11</option> -->
                                    <option disabled>Select Answer</option>
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
                            <select multiple name="elevens[]" id="eleven" class="selectpicker form-control" data-width="100%" data-live-search="true" onchange='checkOtherEleven(this.value);'>
                                <option>Select Answer</option>
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
                    <!-- <div class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>11. Where did you receive your information regarding the COVID-19 vaccines?</b></label>
                        <div class="col-sm-10">
                            <select  name="elevens[]" class=" selectpicker form-control" data-width="100%" onchange='checkOtherEleven(this.value);'>
                                <option>Select Answer</option>
                                <option value="Professional bodies">Professional Bodies</option>
                                <option  value="facility training,">Facility Training</option>
                                <option  value="website,">website</option>
                                <option  value="whatsapp,">WhatsApp</option>
                                <option  value="newspaper,,">Newspaper</option>
                                <option  value="flyer,,">Flyer</option>
                                <option  value="poster,">Poster</option>
                                <option  value="Professional bodies">Professional Bodies</option>
                                <option value="other">Other (Specify)</option>
                            </select>
                            <p></p><input id="eleven" type="text" name="eleven" class="form-control" style='display:none;'>
                        </div>
                    </div> -->

                    

                    <!-- <div class="form-group row">
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
                            <select class="form-control" id="fourteen" name="fourteen" onChange='displayFifteen(this.value);'>
                                <option>Select Answer</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="Unknown">Don't Know</option>
                            </select>                          
                        </div>
                    </div>

                    <div style="display:none;" id="numberFifteen" class="form-group row">
                        <label class="col-sm-2 col-form-label" ><b>15. If yes, through which animals? (Check all that apply)</b></label>
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
                    </div> -->


                   
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

            
            // function checkOtherFifteen(val){
            //     var element=document.getElementById('fifteen');
            //     if(val=='other')
            //     element.style.display='block';
            //     else  
            //     element.style.display='none';
            // }
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
            
            // function displayTen(val){
            //     var element=document.getElementById('numberTen');
            //     if(val=='Yes')
            //     element.style.display='block';
            //     else  
            //     element.style.display='none';
            // }

            // function displayFifteen(val){
            //     var element=document.getElementById('numberFifteen');
            //     if(val=='Yes')
            //     element.style.display='block';
            //     else  
            //     element.style.display='none';
            // }

        </script> 
    </footer>
    @toastr_js
    @toastr_render
</html>
