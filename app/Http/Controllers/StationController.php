<?php

namespace App\Http\Controllers;
use App\Models\Station;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use illuminate\Validation\Rules;

/**
 * Summary of StationController
 */
class StationController extends Controller
{
    //
    public function index():View
    {
        return view('station.index');
    }

    /**
     * Summary of store
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'x_axis' => ['numeric','required', 'max:255'],
            'y_axis' => ['numeric','required', 'max:255'],
            'z_axis' => ['numeric','required', 'max:255'],
            'latitude' => ['numeric','required', 'max:255'],
            'height' => ['numeric','required', 'max:255'],
            'receiver_name' => ['required', 'max:255'],
            'receiver_satellite_system' => ['required', 'max:255'],
            'receiver_serial_number' => ['required', 'max:255'],
            'receiver_firmware_version' => ['required', 'max:255'],
            'receiver_date_installed' => ['required', 'max:255'],
            'antenna_name' => ['required', 'max:255'],
            'antenna_radome' => ['string', 'max:255'],
            'antenna_serial_number' => ['required', 'max:255'],
            'antenna_arp' => ['string', 'max:255'],
            'antenna_marker_north' => ['numeric','required', 'max:255'],
            'antenna_marker_east' => ['numeric','required', 'max:255'],
            'antenna_date_installed' => ['required', 'max:255'],
            'clock_type' => ['required', 'max:255'],
            'clock_input_frequency' => ['numeric'],
            'longitude' => ['numeric','required', 'max:255'],
            'receiver_elevation_cutoff' => ['numeric'],
            'antenna_marker_up' => ['numeric','required', 'max:255'],
            'clock_effective_dates' => ['string', 'max:255'],

        ]);
        

        $station = Station::create($validated);
        if($station){
            return Redirect::route('dashboard')->with('success', 'Station created successfully');
        }else{
            return Redirect::route('dashboard')->with('error', 'Station not created');
        }
        

    }

    private function checkKeysExists($value, $keys_array = null)
    {

        $required = $keys_array == null ? array(
            'name',
            'x_axis',
            'y_axis',
            'z_axis',
            'latitude',
            'height',
            'receiver_name',
            'receiver_satellite_system',
            'receiver_serial_number',
            'receiver_firmware_version',
            'receiver_date_installed',
            'antenna_name',
            'antenna_radome',
            'antenna_serial_number',
            'antenna_arp',
            'antenna_marker_north',
            'antenna_marker_east',
            'antenna_date_installed',
            'clock_type',
            'clock_input_frequency',
            'longitude',
            'receiver_elevation_cutoff',
            'antenna_marker_up',
            'clock_effective_dates') : $keys_array;
        $data = array_change_key_case(array_shift($value), CASE_LOWER);
        $keys = str_replace(' ', '_', array_keys($data));
        $results = array_combine($keys, array_values($data));

        if (count(array_intersect_key(array_flip($required), $results)) === count($required)) {
            //All required keys exist!
            $status = 1;
        } else {
            $missing = array_intersect_key(array_flip($required), $results);
            $data_miss = array_diff(array_flip($required), $missing);
            $status = ' Column with title "' . implode(', ', array_keys($data_miss)) . '"  miss from Excel file. Please make sure file is in the same format as a sample file';
        }

        return $status;
    }

    public function getDataBySheet($objPHPExcel, $sheet_id)
    {
        $sheet = $objPHPExcel->getSheet($sheet_id);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $headings = $sheet->rangeToArray('A1:' . $highestColumn . 1, NULL, TRUE, FALSE);
        $data = array();
        for ($row = 2; $row <= $highestRow; $row++) {
            //  Read a row of data into an array
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            $rowData[0] = array_combine($headings[0], $rowData[0]);
            $data = array_merge_recursive($data, $rowData);
        }
        return $data;
    }

  

    public function uploadExcel($sheet_name = null)
    {
        
        try {
            $folder = "storage/uploads/media/";
            if (!is_dir($folder)) {
                mkdir($folder, 0777, true);
            }
            $file = request()->file('file');
            if (!$file) {
                return json_encode(['error' => 'No  file uploaded']);
            }
            $name = time() . rand(4343, 31243434) . '.' . $file->guessClientExtension();
            $move = $file->move($folder, $name);
            $path = $folder . $name;
            if (!$move) {
                die('upload Error');
            } else {
                $objPHPExcel = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
            }
        } catch (Exception $e) {
            $this->resp->success = FALSE;
            $this->resp->msg = 'Error Uploading file';
            echo json_encode($this->resp);
        }
        $sheets = $objPHPExcel->getSheetNames();
        if ($sheet_name == null) {
            return $this->getDataBySheet($objPHPExcel, 0);
        } else {
            $data = [];
            foreach ($sheets as $key => $value) {
                $data[$value] = [];
            }
            foreach ($sheets as $key => $value) {
                $excel_data = $this->getDataBySheet($objPHPExcel, $key);
                count($excel_data) > 0 ? array_push($data[$value], $excel_data) : '';
            }
            return $data;
        }
        unlink($path);
    }

    public function uploadByExcel(): RedirectResponse
     {
        ini_set('max_execution_time', 300);
        $data = $this->uploadExcel();
        $status = $this->checkKeysExists($data, array(
            'name',
            'x_axis',
            'y_axis',
            'z_axis',
            'latitude',
            'height',
            'receiver_name',
            'receiver_satellite_system',
            'receiver_serial_number',
            'receiver_firmware_version',
            'receiver_date_installed',
            'antenna_name',
            'antenna_radome',
            'antenna_serial_number',
            'antenna_arp',
            'antenna_marker_north',
            'antenna_marker_east',
            'antenna_date_installed',
            'clock_type',
            'clock_input_frequency',
            'longitude',
            'receiver_elevation_cutoff',
            'antenna_marker_up',
            'clock_effective_dates'
        )
        );
        if($status==1){
            // validate
            $stations = [];
            foreach ($data as $element) {
                $stations[] = $element['name'];
            }
           
            $invalidNames = [];
            $count_invalid = 0;
            foreach ($stations as $index => $name) {
                $trimed_stations = trim($name);
                $station = Station::where('name', $trimed_stations)->first();

                if (!empty($station)) {
                    $invalidNames[] = $index;
                    $count_invalid++;
                }
            }
            if (count($invalidNames) > 0) {
                $invalidNamesStr = implode(', ', array_map(function ($index) use ($stations) {
                    return '"' . $stations[$index] . '", at row ' . ($index + 2);
                }, $invalidNames));

                if (count($invalidNames) == 1) {
                    $errorMessage = "In Your Uploaded Sheet you have " . $count_invalid . " Stations which  EXIST in your system it have value" . $invalidNamesStr . " , of your Uploaded Excel sheet , make sure you Upload new Stations which does not Exists in your System";
                } else {
                    $errorMessage = "In Your Uploaded Sheet you have " . $count_invalid . " Stations which  EXIST in your system they have values of " . $invalidNamesStr . " , of your Uploaded Excel sheet ,  make sure you Upload new Stations which does not Exists in your System";
                }

                
                return Redirect::route('station.excel')->with('error', $errorMessage);
                exit;
            }

            // end validate
            $station_count = 0;
            foreach ($data as  $value) {
                Station::create($value);
                $station_count++;

            }
        }else{
            return Redirect::route('station.excel')->with('error', $status);
        }
        if($station_count > 0){
            return Redirect::route('dashboard')->with('success', ''.$station_count.' Station(s) added successfully');
        }else{
            return Redirect::route('dashboard')->with('error', 'No Station added');
        }

    }


    public function excel(): View
    {
        return view('station.excel');
    }

    public function getsample()
    {
        $file_name = request()->segment(3) . '.xlsx';
        return response()->download('storage/uploads/samples/' . $file_name, $file_name, array('Content-Type: application/excel'));
    }

    public function display()
    {
        $stations = Station::all();
        return view('station.display', compact('stations'));
    }
}
