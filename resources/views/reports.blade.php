<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CHAK SURVEY REPORT</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.11/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
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
            
.hiddenRow {
  padding: 0 !important;
  &:before {
    display: none;
  }
  table {
    margin-bottom: 0;
  }
}

@media only screen and (max-width: 767px) {
	
  /* Taken from elvery.net/demo/responsive-tables */
  
	/* Force table to not be like tables anymore */
	#no-more-tables > table, 
	#no-more-tables > table > thead, 
	#no-more-tables > table > tbody, 
	#no-more-tables > table > thead > tr > th, 
	#no-more-tables > table > tbody > tr > td, 
	#no-more-tables > table > tbody > tr { 
		display: block; 
	}
 
	/* Hide table headers (but not display: none;, for accessibility) */
	#no-more-tables > table > thead > tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
 
	#no-more-tables > table > tbody > tr { border: 1px solid #ccc; }
 
	#no-more-tables > table > tbody > tr > td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 36.1%; 
		white-space: normal;
		text-align:left;
	}
 
	#no-more-tables > table > tbody > tr > td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 0;
		left: 0;
		width: 33.33333333%; 
		padding-right: 10px; 
		white-space: nowrap;
		text-align:left;
		font-weight: bold;
    background-color: #f5f5f5;
    padding: 8px;
	}
 
	/*
	Label the data
	*/
	#no-more-tables td:before { content: attr(data-title); }
  
  .table-nested,
  .table-nested tbody,
  .table-nested td,
  .table-nested tr,
  .table-nested th,
  .table-nested tr > td {
      width: 100%;
      display: block;
  }
}
        </style>
        @toastr_css
    </head>
    <body>
        <div class='content col-md-12'><br>
        <img src="{{ asset('images/healthcare.jpg') }}" alt="image" height="100" width="100">
        <h1><b>CHAK HCW SURVEY REPORT<b></h1>
            <h2> Knowledge, attitude and perceptions on Corona virus disease among health care workers in Kenya. </h2>
            <h4><b> Reports generated from the survey </b> </h4>
            
            <div class="container" id="reports">
                <p>&nbsp;</p>
                <table id="report" class="table table-hover">
                    <thead>
                        <tr class="active">
                            <th><strong>No.</strong></th>
                            <th><strong>Date</strong></th>
                            <th><strong>County</strong></th>
                            <th><strong>Sub-County</strong></th>
                            <th><strong>Facility</strong></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                            <tr role="button" data-toggle="collapse" href="#answer{{$report->survey_id}}" aria-expanded="false" aria-controls="answer{{$report->survey_id}}">
                                <td>{{ $loop->iteration }} </td>
                                <td style='text-align: left;'>{{ $report->created_at }} </td>
                                <td style='text-align: left;'>{{ $report->county }} </td>
                                <td style='text-align: left;'>{{ $report->sub_county }} </td>
                                <td style='text-align: left;'>{{ $report->facility }} </td>
                            </tr>
                            <tr>
                                <td colspan="12" class="hiddenRow">
                                    <div class="collapse" id="answer{{$report->survey_id}}">
                                        <table class="table table-nested">
                                            <tbody>
                                                @foreach($report->answers as $answer)
                                                    <tr>
                                                        <td>{{ $loop->iteration }} </td>
                                                        <td class="col-xs-4 col-sm-2 active"><strong>{{$answer->questions}}</strong></td>
                                                        <td>{{$answer->answers}}</td>
                                                    </tr>   
                                                @endforeach                                          
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                                <td style="display:none;"></td>
                                <td style="display:none;"></td>
                                <td style="display:none;"></td>
                                <td style="display:none;"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a type="button" href="{{route('export')}}"class="btn btn-success left">Download Excel</a>
            </div>
        </div>
    </body>
    <footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.11/js/bootstrap-select.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#report').DataTable({
                    "ordering": false,
                    "searching": false,
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
                });
            } );
        </script>
        @toastr_js
        @toastr_render
    </footer>
</html>
