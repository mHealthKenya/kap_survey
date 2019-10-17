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
        <div class='content col-md-12'>
            <h1> KAPS SURVEY</h1>
            <h2> Knowledge, attitude and perceptions on Ebola virus disease among health care workers in Kenya. </h2>
            <h4><b> Hello, Ministry of Health, Kenya in collaboration with partners is conducting a survey on Ebola Virus Disease (EVD)
            to better understand knowledge, attitudes and perceptions among Health Care Workers. 
            Your participation in this survey is voluntary and all information you give will be kept confidential. 
            The survey will be used to guide review of Ebola health education materials as well as ascertain training needs. 
            Kindly note your honest opinion is crucial for strengthening Ebola Virus Disease preparedness and response in our country.</b> </h4>
            
            <div class="col-md-12" style="margin-top:20px;">
            <h2><b> Section A: Identification data </b> </h2>
                <form role="form" method="post" action="{{route('addSurvey')}}" >
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="exampleInputEmail1"><b>County </b></label>
                        <div class="col-sm-10">
                            <select id="county" required name="county_id" class="selectpicker form-control" data-live-search="true">
                                @foreach( $counties as $county)
                                    <option data-tokens="{{$county->name}}" value="{{$county->id}}">{{ ucwords ($county->name)}}</option>
                                @endforeach
                            </select>
                          </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="exampleInputEmail1"><b>Sub - County </b></label>
                        <div class="col-sm-10">
                            <select required id="sub_county" name="sub_county_id" class="form-control" data-width="100%">
                            <option value='300'>Not Applicable</option>
                            </select>
                          </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="exampleInputEmail1"><b>Facility </b></label>
                        <div class="col-sm-10">
                            <select required id="facility" name="mfl_code" class=" selectpicker form-control" data-width="100%" data-live-search="true">
                            <option data-token="Not Applicable" value='55555'>Not Applicable</option>
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
            $('#county').change(function () {

                $("#sub_county").empty();

                var x = $(this).val();
                $.ajax({
                    type: "POST",
                    url: '/get_subcounties',
                    data: {
                    "county_id": x, "_token": "{{csrf_token()}}"
                    },
                    dataType: "json",
                    success: function (data) {
                       
                        for (var i = 0; i < data.length; i++) {
                            var select = document.getElementById("sub_county"),
                            opt = document.createElement("option");

                            opt.value = data[i].id;
                            opt.textContent = data[i].name;
                            select.appendChild(opt);
                        }
                        $('#sub_county').append("<option value='300'>Not Applicable</option>")


                    }
                });
            });

            $('#sub_county').change(function () {

                $("#facility").empty();

                var x = $(this).val();
                $.ajax({
                    type: "POST",
                    url: '/get_facilities',
                    data: {
                    "sub_county_id": x, "_token": "{{csrf_token()}}"
                    },
                    dataType: "json",
                    success: function (data) {
                    
                        for (var i = 0; i < data.length; i++) {
                            var select = document.getElementById("facility"),
                            opt = document.createElement("option");

                            opt.value = data[i].code;
                            opt.textContent = data[i].name;
                            opt['data-tokens'] = data[i].name;
                            select.appendChild(opt);
                            

                        }
                        $('#facility').append("<option data-token='Not Applicable' value='55555'>Not Applicable</option>");
                        $('#facility').selectpicker('refresh');
                    }
                });
            });

        </script>
        @toastr_js
        @toastr_render
    </footer>
</html>
