<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IGS Display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
   <link href="https://cdn.datatables.net/autofill/2.5.3/css/autoFill.bootstrap5.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.6.2/css/colReorder.bootstrap5.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.2.2/css/fixedColumns.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.3.2/css/fixedHeader.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.3.1/css/rowGroup.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.3.3/css/rowReorder.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.1.1/css/scroller.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.4.1/css/searchBuilder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/1.3.1/css/searchPanes.dataTables.min.css">
  </head>
  <body>
<nav class="navbar bg-info">
  <div class="container">
    <a href="{{ route('dashboard') }}" class="text-white fw-bolder">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                        {{__('IGS AFRICA')}}
                    </a>
    
  </div>
</nav>
<div class="container-fluid bg-dark" style="height: 100%;">
  <div class="row">
    <div class="col-md-11 my-3 m-auto">
      <div class="card">
        <div class="card-header">
            @if (session('success'))
       <div class="alert alert-success" role="alert">
        {{ session('success') }}y
            </div>
        @endif

            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
          <h3>Station Table
            <a href="{{ route('station.index') }}" class="btn btn-sm btn-warning add-btn">add +</a>
          </h3>
        </div>
        <div class="card-body">
        <div class="container-fluid responsive">
        <table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>X Axis</th>
                    <th>Y Axis</th>
                    <th>Z Axis</th>
                    <th>Latitude</th>
                    <th>Height</th>
                    <th>Receiver Name</th>
                    <th>Receiver Satellite System</th>
                    <th>Receiver Serial Number</th>
                    <th>Receiver Firmware Version</th>
                    <th>Receiver Date Installed</th>
                    <th>Antenna Name</th>
                    <th>Antenna Radome</th>
                    <th>Antenna Serial Number</th>
                    <th>Antenna ARP</th>
                    <th>Antenna Marker North</th>
                    <th>Antenna Marker East</th>
                    <th>Antenna Date Installed</th>
                    <th>Clock Type</th>
                    <th>Clock Input Frequency</th>
                    <th>Longitude</th>
                    <th>Receiver Elevation Cutoff</th>
                    <th>Antenna Marker Up</th>
                    <th>Clock Effective Dates</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($stations as $station)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $station->name }}</td>
                    <td>{{ $station->x_axis }}</td>
                    <td>{{ $station->y_axis }}</td>
                    <td>{{ $station->z_axis }}</td>
                    <td>{{ $station->latitude }}</td>
                    <td>{{ $station->height }}</td>
                    <td>{{ $station->receiver_name }}</td>
                    <td>{{ $station->receiver_satellite_system }}</td>
                    <td>{{ $station->receiver_serial_number }}</td>
                    <td>{{ $station->receiver_firmware_version }}</td>
                    <td>{{ $station->receiver_date_installed }}</td>
                    <td>{{ $station->antenna_name }}</td>
                    <td>{{ $station->antenna_radome }}</td>
                    <td>{{ $station->antenna_serial_number }}</td>
                    <td>{{ $station->antenna_arp }}</td>
                    <td>{{ $station->antenna_marker_north }}</td>
                    <td>{{ $station->antenna_marker_east }}</td>
                    <td>{{ $station->antenna_date_installed }}</td>
                    <td>{{ $station->clock_type }}</td>
                    <td>{{ $station->clock_input_frequency }}</td>
                    <td>{{ $station->longitude }}</td>
                    <td>{{ $station->receiver_elevation_cutoff }}</td>
                    <td>{{ $station->antenna_marker_up }}</td>
                    <td>{{ $station->clock_effective_dates }}</td>
                </tr>
                @endforeach
                <!-- Add more rows here -->
            </tbody>
        </table>
    </div>

            
        </div>
      </div>
    </div>
  </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/autofill/2.5.3/js/dataTables.autoFill.min.js"></script>
<script src="https://cdn.datatables.net/autofill/2.5.3/js/autoFill.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/colreorder/1.6.2/js/dataTables.colReorder.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.3.2/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/keytable/2.8.2/js/dataTables.keyTable.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.3.1/js/dataTables.rowGroup.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.3.3/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/scroller/2.1.1/js/dataTables.scroller.min.js"></script>
<script src="https://cdn.datatables.net/searchbuilder/1.4.1/js/dataTables.searchBuilder.min.js"></script>
<script src="https://cdn.datatables.net/searchpanes/2.1.2/js/dataTables.searchPanes.min.js"></script>
<script src="https://cdn.datatables.net/select/1.6.2/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/staterestore/1.2.2/js/dataTables.stateRestore.min.js"></script>


<script>
$(document).ready( function () {
    $('#myTable').DataTable(
        {
            "scrollX": true,
            // "scrollY": 800,
            "responsive": false,
            "scrollCollapse": true,
            "paging": true,
            "searching": true,
            "info": true,
            "ordering": true,
            "fixedColumns":   {
                "leftColumns": 2,

            },
            "columnDefs": [
                { "width": "100px", "targets": 0 }
            ],
            "dom": 'Bfrtip',
            "buttons": [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "language": {
                "lengthMenu": "Display _MENU_ records per page",
                "zeroRecords": "Nothing found - sorry",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)"
            },


        }
    );

} );
</script>
  </body>
</html>