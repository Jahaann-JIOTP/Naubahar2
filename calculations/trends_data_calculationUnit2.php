<?php
session_start();
//error_reporting(E_ALL);
error_reporting(E_ERROR | E_PARSE);
include('mongodb_conn.php');
$collection = $db->naubahar_unit2;
$start_date = date('Y-n-j G:i');
$end_date = date('Y-n-j G:i');
$start_date = $_GET["start_date"];
$end_date = $_GET["end_date"];
$start_date = date('Y-n-j', strtotime($start_date));
$end_date = date('Y-n-j', strtotime($end_date . ' +0 day'));
$g = $_GET["tag"];
$location = $_GET["location"];
$meter = $_GET["meter"];
$Tag = $meter . $g;
$units = "";
if ($meter == 'GW1_U8') {
    $units = 'TF-2';
} elseif ($meter == 'GW1_U26') {
    $units = 'TF-3';
} elseif ($meter == 'GW1_U25') {
    $units = 'TF-1';
}
elseif ($meter == 'GW2_U9') {
    $units = 'RO-1';
} elseif ($meter == 'GW2_U10') {
    $units = 'RO-2';
} elseif ($meter == 'GW1_U22') {
    $units = 'RO-3';
} elseif ($meter == 'GW2_U8') {
    $units = 'RO-4';
} elseif ($meter == 'GW1_U19') {
    $units = 'GR-1';
} elseif ($meter == 'GW1_U18') {
    $units = 'GR-2';
} elseif ($meter == 'GW1_U17') {
    $units = 'GR-3';
} elseif ($meter == 'GW1_U16') {
    $units = 'GR-4';
} elseif ($meter == 'GW1_U15') {
    $units = 'GR-5';
} elseif ($meter == 'GW1_U20') {
    $units = 'GR-6';
} elseif ($meter == 'GW1_U21') {
    $units = 'GR-7';
} elseif ($meter == 'GW3_U3') {
    $units = 'Syrup Room';
} elseif ($meter == 'GW3_U4') {
    $units = 'Sugar Dissolving';
} elseif ($meter == 'GW3_U5') {
    $units = 'Shrink Tunnel';
} elseif ($meter == 'GW1_U4') {
    $units = 'New Boiler';
} elseif ($meter == 'GW1_U2') {
    $units = 'Old Boiler';
} elseif ($meter == 'GW1_U5') {
    $units = 'Sugar Room';
} elseif ($meter == 'GW1_U3') {
    $units = 'Juice Room';
} elseif ($meter == 'GW1_U6') {
    $units = 'Line-1';
} elseif ($meter == 'GW1_U7') {
    $units = 'Line-2';
} elseif ($meter == 'GW1_U23') {
    $units = 'Line-3';
} elseif ($meter == 'GW2_U2') {
    $units = 'Line-4';
} elseif ($meter == 'GW3_U2') {
    $units = 'Line-5';
} elseif ($meter == 'GW1_U24') {
    $units = 'Line-6';
} elseif ($meter == 'GW3_U6') {
    $units = 'Line-8';
} elseif ($meter == 'GW2_U12') {
    $units = 'LPAC-1';
} elseif ($meter == 'GW2_U11') {
    $units = 'LPAC-2';
} elseif ($meter == 'GW2_U14') {
    $units = 'LPAC-3';
} elseif ($meter == 'GW2_U13') {
    $units = 'LPAC-4';
} elseif ($meter == 'GW2_U3') {
    $units = 'HPAC-1';
} elseif ($meter == 'GW2_U4') {
    $units = 'HPAC-2';
}
$array = array();
$array['cols'][] = array('type' => 'datetime');
$array['cols'][] = array('type' => 'number', 'label' => $units);
$mongotime1 = new MongoDB\BSON\UTCDateTime(strtotime($start_date . 'T00:00:00+05:00'));
$val1 = json_decode(json_encode($mongotime1), true);
foreach ($val1 as $key => $value) {
    foreach ($value as $sub_key => $sub_value) {
        $a1 = $sub_value;
    }
}
$start_date1 = intval($a1);
$mongotime2 = new MongoDB\BSON\UTCDateTime(strtotime($end_date . 'T23:59:18+05:00'));
$val2 = json_decode(json_encode($mongotime2), true);
foreach ($val2 as $key => $value) {
    foreach ($value as $sub_key => $sub_value2) {
        $a2 = $sub_value2;
    }
}
$new_end1 = intval($a2);
$where = array(
    'UNIXtimestamp' =>  array('$gte' => $start_date1, '$lte' => $new_end1)
);
$select_fields = array(
    $Tag => 1,
    'PLC_Date_Time' => 1,
    'UNIXtimestamp' => 1
);
$options = array(
    'projection' => $select_fields
);
$cursor = $collection->find($where, $options);   //This is the main line
$docs = $cursor->toArray();
$index = 0;
foreach ($docs as $document) {
    json_encode($document);
    foreach ($document as $key => $value) {
        $term[$index][$key] = $value;
    }
    $index++;
}
for ($i = 0; $i < $index; $i++) {
    $t = $term[$i]['UNIXtimestamp'];
    //print_r($t);
    // echo '</br>';

    $t = gmdate("Y-n-j H:i", $t);
    $t = date('Y-n-j H:i', strtotime($t . ' + 5 hours'));
    //print_r($t);
    //echo '</br>';
    $y = date('Y', strtotime($t));
    $m = date('n', strtotime($t)) - 1;
    //print_r($m);
    $d = date('j', strtotime($t));
    $location = date('G', strtotime($t));
    $im = date('i', strtotime($t));

    $start_date = 'Date(' . $y . ',' . $m . ',' . $d . ',' . $location . ',' . $im . ')';
    // print_r($start_date);
    if ($meter == 'GW3_U2' || $meter == 'GW3_U3' || $meter == 'GW3_U4' || $meter == 'GW3_U5' || $meter == 'GW3_U6' || $meter == 'GW1_U23' || $meter == 'GW1_U8' || $meter == 'GW1_U25'|| $meter == 'GW1_U26' || $meter == 'GW1_U24') {
        $array['rows'][] = array('c' => array(array('v' => $start_date), array('v' => round($term[$i][$Tag], 4))));
    } elseif ($meter == 'GW2_U9' || $meter == 'GW2_U10' || $meter == 'GW1_U21' || $meter == 'GW2_U8' || $meter == 'GW1_U19' || $meter == 'GW1_U18' || $meter == 'GW1_U17' || $meter == 'GW1_U16' || $meter == 'GW1_U15' || $meter == 'GW1_U20' || $meter == 'GW1_U21' || $meter == 'GW2_U14' || $meter == 'GW1_U6' || $meter == 'GW1_U7' || $meter == 'GW2_U2' || $meter == 'GW2_U3' || $meter == 'GW2_U4' ||  $meter == 'GW2_U12' || $meter == 'GW2_U11'  || $meter == 'GW2_U13' || $meter == 'GW1_U4' || $meter == 'GW1_U2' || $meter == 'GW1_U3' || $meter == 'GW1_U5' || $meter == 'GW1_U22') {
        if ($g == '_Frequency_Hz' || $g == '_PowerFactor_Total' || $g == '_PowerFactor_A' || $g == '_PowerFactor_B' || $g == '_PowerFactor_C') {
            $array['rows'][] = array('c' => array(array('v' => $start_date), array('v' => round($term[$i][$Tag] / 100, 4))));
        } elseif ($g == '_Voltage_LL_V' || $g == '_Voltage_LN_V' || $g == '_Voltage_AN_V' || $g == '_Voltage_BN_V' || $g == '_Voltage_CN_V' || $g == '_Voltage_AB_V' || $g == '_Voltage_BC_V' || $g == '_Voltage_CA_V' || $g == '_Current_AN_Amp' || $g == '_Current_BN_Amp' || $g == '_Current_CN_Amp' || $g == '_Current_Avg_Amp' || $g == '_Harmonics_I1_THD' || $g == '_Harmonics_I2_THD' || $g == '_Harmonics_I3_THD' || $g == '_Harmonics_V1_THD' || $g == '_Harmonics_V2_THD' || $g == '_Harmonics_V3_THD') {
            $array['rows'][] = array('c' => array(array('v' => $start_date), array('v' => round($term[$i][$Tag] / 10, 4))));
        } else {
            $array['rows'][] = array('c' => array(array('v' => $start_date), array('v' => round($term[$i][$Tag], 4))));
        }
    }
}
$data = json_encode($array);
echo $data;
