<?php

include('mongodb_conn.php');
ini_set('display_errors', 0);
$value = $_GET['value'];
// echo $value;
$collection = $db->naubahar_activetags;
$current_date = date("Y-n-j");
// echo $current_date;
if ($value == 'Today') {
    $start_date = date('Y-n-j', strtotime($current_date));
    $end_date = date('Y-n-j', strtotime($current_date));
    $mongotime1 = new MongoDB\BSON\UTCDateTime(strtotime($start_date . 'T0:7:18+05:00'));
    $mongotime2 = new MongoDB\BSON\UTCDateTime(strtotime($end_date . '+1 day'));
    $val1 = json_decode(json_encode($mongotime1), true);
    $val2 = json_decode(json_encode($mongotime2), true);
    foreach ($val1 as $key => $value) {
        foreach ($value as $sub_key => $sub_value) {
            $a1 = $sub_value;
        }
    }
    $start_date = intval($a1);
    foreach ($val2 as $key => $value) {
        foreach ($value as $sub_key => $sub_value2) {
            $a2 = $sub_value2;
        }
    }
    $end_date = intval($a2);
    $where = array(
        'UNIXtimestamp' =>  array('$gt' => $start_date, '$lte' => $end_date)
    );
    $select_fields = array(
        'U_1_ActiveEnergy_Delivered_kWh' => 1,
        'PLC_Date_Time' => 1,
    );
    $options = array(
        'projection' => $select_fields
    );
    $cursor = $collection->find($where, $options);
    $docs = $cursor->toArray();
    // var_dump($docs);
    $index = 0;
    foreach ($docs as $document) {
        json_encode($document);
        // var_dump($document);
        foreach ($document as $key => $value) {
            $term[$index][$key] = $value;
            if (!empty($document['U_1_ActiveEnergy_Delivered_kWh'])) {
                $arr[] = $document['U_1_ActiveEnergy_Delivered_kWh'];
            }
        }
        $index++;
    }
    if (!empty($arr)) {
        $first_index = key($arr);
        $first = $arr[$first_index + 1];
        $end = end($arr);
        $U_1 = $end - $first;
    } else {
        $U_1 = 0;
    }
    $data = $U_1;
    $data = number_format($data, 0, '', ',');
} elseif ($value == 'This Week') {
    $current_day = date("l");
    // print_r($current_day);
    if ($current_day == 'Monday') {
        $start_date = date("Y-n-j");
    } elseif ($current_day == 'Tuesday') {
        $start_date = date('Y-n-j', strtotime($current_date . ' -1 day'));
    } elseif ($current_day == 'Wednesday') {
        $start_date = date('Y-n-j', strtotime($current_date . ' -2 day'));
    } elseif ($current_day == 'Thursday') {
        $start_date = date('Y-n-j', strtotime($current_date . ' -3 day'));
    } elseif ($current_day == 'Friday') {
        $start_date = date('Y-n-j', strtotime($current_date . ' -4 day'));
    } elseif ($current_day == 'Saturday') {
        $start_date = date('Y-n-j', strtotime($current_date . ' -5 day'));
    } elseif ($current_day == 'Sunday') {
        $start_date = date('Y-n-j', strtotime($current_date . ' -6 day'));
    }
    $end_date = date('Y-n-j', strtotime($current_date . ' +2 day'));

    $mongotime1 = new MongoDB\BSON\UTCDateTime(strtotime($start_date . 'T0:7:18+05:00'));
    // print_r($mongotime1);
    $mongotime2 = new MongoDB\BSON\UTCDateTime(strtotime($end_date . '+1 day'));
    $val1 = json_decode(json_encode($mongotime1), true);
    $val2 = json_decode(json_encode($mongotime2), true);
    foreach ($val1 as $key => $value) {
        foreach ($value as $sub_key => $sub_value) {
            $a1 = $sub_value;
        }
    }
    $start_date = intval($a1);
    // print_r($start_date);
    foreach ($val2 as $key => $value) {
        foreach ($value as $sub_key => $sub_value2) {
            $a2 = $sub_value2;
        }
    }
    $end_date = intval($a2);
    $where = array(
        'UNIXtimestamp' =>  array('$gt' => $start_date, '$lte' => $end_date)
    );
    $select_fields = array(
        'U_1_ActiveEnergy_Delivered_kWh' => 1,
        'Time' => 1
    );
    $options = array(
        'projection' => $select_fields
    );
    $cursor = $collection->find($where, $options);
    $docs = $cursor->toArray();
    $index = 0;
    foreach ($docs as $document) {
        json_encode($document);
        foreach ($document as $key => $value) {
            $term[$index][$key] = $value;
            if (!empty($document['U_1_ActiveEnergy_Delivered_kWh'])) {
                $arr[] = $document['U_1_ActiveEnergy_Delivered_kWh'];
            }
        }
        $index++;
    }
    if (!empty($arr)) {
        $first_index = key($arr);
        $first = $arr[$first_index + 1];
        $end = end($arr);
        $U_1 = $end - $first;
    } else {
        $U_1 = 0;
    }
    $data = $U_1;
    $data = number_format($data, 0, '', ',');
} elseif ($value == 'This Month') {
    $start_date = date('Y', strtotime($current_date)) . '-' . date('n', strtotime($current_date)) . '-01';
    //echo $start_date;
    $end_date = date('Y-n-j', strtotime($current_date));
    //echo $end_date;
    $mongotime1 = new MongoDB\BSON\UTCDateTime(strtotime($start_date . 'T0:7:18+05:00'));
    // print_r($mongotime1);
    $mongotime2 = new MongoDB\BSON\UTCDateTime(strtotime($end_date . '+1 day'));
    // print_r($mongotime2);
    $val1 = json_decode(json_encode($mongotime1), true);
    $val2 = json_decode(json_encode($mongotime2), true);
    foreach ($val1 as $key => $value) {
        foreach ($value as $sub_key => $sub_value) {
            $a1 = $sub_value;
        }
    }
    $start_date = intval($a1);
    //print_r($start_date);

    foreach ($val2 as $key => $value) {
        foreach ($value as $sub_key => $sub_value2) {
            $a2 = $sub_value2;
        }
    }
    $end_date = intval($a2);
    //echo $end_date;
    $where = array(
        'UNIXtimestamp' =>  array('$gt' => $start_date, '$lte' => $end_date)
    );
    $select_fields = array(
        'U_1_ActiveEnergy_Delivered_kWh' => 1,
        'timestamp' => 1,
        'PLC_Date_Time' => 1
    );
    $options = array(
        'projection' => $select_fields
    );
    $cursor = $collection->find($where, $options);
    $docs = $cursor->toArray();
    $index = 0;
    foreach ($docs as $document) {
        json_encode($document);
        // var_dump($document);
        //   echo'</br>';
        foreach ($document as $key => $value) {
            $term[$index][$key] = $value;
            if (!empty($document['U_1_ActiveEnergy_Delivered_kWh'])) {
                $arr[] = $document['U_1_ActiveEnergy_Delivered_kWh'];
            }
        }
        $index++;
    }
    if (!empty($arr)) {
        $first_index = key($arr);
        $first = $arr[$first_index + 1];
        $end = end($arr);
        $U_1 = $end - $first;
    } else {
        $U_1 = 0;
    }
    $data = $U_1;
    $data = number_format($data, 0, '', ',');
} elseif ($value == 'This Year') {
    $start_date = date('Y', strtotime($current_date)) . '-01-01';

    //echo $start_date;
    $end_date = date('Y-n-j', strtotime($current_date));
    //echo $end_date;
    $mongotime1 = new MongoDB\BSON\UTCDateTime(strtotime($start_date . 'T0:7:18+05:00'));
    // print_r($mongotime1);
    $mongotime2 = new MongoDB\BSON\UTCDateTime(strtotime($end_date . '+1 day'));
    // print_r($mongotime2);
    $val1 = json_decode(json_encode($mongotime1), true);
    $val2 = json_decode(json_encode($mongotime2), true);
    foreach ($val1 as $key => $value) {
        foreach ($value as $sub_key => $sub_value) {
            $a1 = $sub_value;
        }
    }
    $start_date = intval($a1);
    //print_r($start_date);
    //echo '<br>';
    foreach ($val2 as $key => $value) {
        foreach ($value as $sub_key => $sub_value2) {
            $a2 = $sub_value2;
        }
    }
    $end_date = intval($a2);
    //echo $end_date;
    //echo '<br>';
    $where = array(
        'UNIXtimestamp' =>  array('$gt' => $start_date, '$lte' => $end_date)
    );
    $select_fields = array(
        'U_1_ActiveEnergy_Delivered_kWh' => 1,
        'timestamp' => 1
    );
    $options = array(
        'projection' => $select_fields
    );
    $cursor = $collection->find($where, $options);
    $docs = $cursor->toArray();
    $index = 0;
    foreach ($docs as $document) {
        json_encode($document);
        //print_r($document);
        //echo '<br>';
        foreach ($document as $key => $value) {
            $term[$index][$key] = $value;
            if (!empty($document['U_1_ActiveEnergy_Delivered_kWh'])) {
                $arr[] = $document['U_1_ActiveEnergy_Delivered_kWh'];
            }
        }
        $index++;
    }
    if (!empty($arr)) {
        $first_index = key($arr);
        $first = $arr[$first_index + 1];
        $end = end($arr);
        $U_1 = $end - $first;
    } else {
        $U_1 = 0;
    }
    $data = $U_1;
    $data = number_format($data, 0, '', ',');
} elseif ($value == 'Last 7 Days') {
    $start_date = date('Y-n-j', strtotime($current_date . ' -7 day'));
    $end_date = date('Y-n-j', strtotime($current_date . ' -1 day'));
    $mongotime1 = new MongoDB\BSON\UTCDateTime(strtotime($start_date . 'T5:7:18+05:00'));
    // print_r($mongotime1);
    $mongotime2 = new MongoDB\BSON\UTCDateTime(strtotime($end_date . 'T23:7:18+05:00'));
    $val1 = json_decode(json_encode($mongotime1), true);
    $val2 = json_decode(json_encode($mongotime2), true);
    foreach ($val1 as $key => $value) {
        foreach ($value as $sub_key => $sub_value) {
            $a1 = $sub_value;
        }
    }
    $start_date = intval($a1);
    // print_r($start_date);
    foreach ($val2 as $key => $value) {
        foreach ($value as $sub_key => $sub_value2) {
            $a2 = $sub_value2;
        }
    }
    $end_date = intval($a2);
    //echo $start_date;
    $where = array(
        'UNIXtimestamp' =>  array('$gt' => $start_date, '$lte' => $end_date)
    );
    $select_fields = array(
        'U_1_ActiveEnergy_Delivered_kWh' => 1,
        'U_2_ActiveEnergy_Delivered_kWh' => 1,
        'U_3_ActiveEnergy_Delivered_kWh' => 1,
        'U_4_ActiveEnergy_Delivered_kWh' => 1,
        'U_5_ActiveEnergy_Delivered_kWh' => 1,
        'U_6_ActiveEnergy_Delivered_kWh' => 1,
        'U_7_ActiveEnergy_Delivered_kWh' => 1,
        'U_8_ActiveEnergy_Delivered_kWh' => 1,
        'U_9_ActiveEnergy_Delivered_kWh' => 1,
        'U_10_ActiveEnergy_Delivered_kWh' => 1,
        'U_11_ActiveEnergy_Delivered_kWh' => 1,
        'U_12_ActiveEnergy_Delivered_kWh' => 1,
        'U_13_ActiveEnergy_Delivered_kWh' => 1,
        'U_14_ActiveEnergy_Delivered_kWh' => 1,
        'U_15_ActiveEnergy_Delivered_kWh' => 1,
        'U_16_ActiveEnergy_Delivered_kWh' => 1,
        'U_17_ActiveEnergy_Delivered_kWh' => 1,
    );
    $options = array(
        'projection' => $select_fields
    );
    $cursor = $collection->find($where, $options);
    $docs = $cursor->toArray();
    $index = 0;
    foreach ($docs as $document) {
        json_encode($document);
        foreach ($document as $key => $value) {
            $term[$index][$key] = $value;
            if (!empty($document['U_1_ActiveEnergy_Delivered_kWh'])) {
                $arr[] = $document['U_1_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_2_ActiveEnergy_Delivered_kWh'])) {
                $arr1[] = $document['U_2_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_3_ActiveEnergy_Delivered_kWh'])) {
                $arr2[] = $document['U_3_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_4_ActiveEnergy_Delivered_kWh'])) {
                $arr3[] = $document['U_4_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_5_ActiveEnergy_Delivered_kWh'])) {
                $arr4[] = $document['U_5_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_6_ActiveEnergy_Delivered_kWh'])) {
                $arr5[] = $document['U_6_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_7_ActiveEnergy_Delivered_kWh'])) {
                $arr6[] = $document['U_7_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_8_ActiveEnergy_Delivered_kWh'])) {
                $arr7[] = $document['U_8_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_9_ActiveEnergy_Delivered_kWh'])) {
                $arr8[] = $document['U_9_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_10_ActiveEnergy_Delivered_kWh'])) {
                $arr9[] = $document['U_10_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_11_ActiveEnergy_Delivered_kWh'])) {
                $arr10[] = $document['U_11_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_12_ActiveEnergy_Delivered_kWh'])) {
                $arr11[] = $document['U_12_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_13_ActiveEnergy_Delivered_kWh'])) {
                $arr12[] = $document['U_13_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_14_ActiveEnergy_Delivered_kWh'])) {
                $arr13[] = $document['U_14_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_15_ActiveEnergy_Delivered_kWh'])) {
                $arr14[] = $document['U_15_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_16_ActiveEnergy_Delivered_kWh'])) {
                $arr15[] = $document['U_16_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_17_ActiveEnergy_Delivered_kWh'])) {
                $arr16[] = $document['U_17_ActiveEnergy_Delivered_kWh'];
            }
        }
        $index++;
    }
    if (!empty($arr)) {
        $first_index = key($arr);
        $first = $arr[$first_index + 1];
        $end = end($arr);
        $U_1 = $end - $first;
    } else {
        $U_1 = 0;
    }
    // print_r($arr6);
    if (!empty($arr1)) {
        $first_index = key($arr1);
        $first = $arr1[$first_index + 1];
        $end = end($arr1);
        $U_2 = $end - $first;
    } else {
        $U_2 = 0;
    }
    if (!empty($arr2)) {
        $first_index = key($arr2);
        $first = $arr2[$first_index + 1];
        $end = end($arr2);
        $U_3 = $end - $first;
    } else {
        $U_3 = 0;
    }
    if (!empty($arr3)) {
        $first_index = key($arr3);
        $first = $arr3[$first_index + 1];
        $end = end($arr3);
        $U_4 = $end - $first;
    } else {
        $U_4 = 0;
    }
    if (!empty($arr4)) {
        $first_index = key($arr4);
        $first = $arr4[$first_index + 1];
        $end = end($arr4);
        $U_5 = $end - $first;
    } else {
        $U_5 = 0;
    }
    if (!empty($arr5)) {
        $first_index = key($arr5);
        $first = $arr5[$first_index + 1];
        $end = end($arr5);
        $U_6 = $end - $first;
    } else {
        $U_6 = 0;
    }
    if (!empty($arr6)) {
        $first_index = key($arr6);
        $first = $arr6[$first_index + 1];
        $end = end($arr6);
        $U_7 = $end - $first;
    } else {
        $U_7 = 0;
    }
    if (!empty($arr7)) {
        $first_index = key($arr7);
        $first = $arr7[$first_index + 1];
        $end = end($arr7);
        $U_8 = $end - $first;
    } else {
        $U_8 = 0;
    }
    if (!empty($arr8)) {
        $first_index = key($arr8);
        $first = $arr8[$first_index + 1];
        $end = end($arr8);
        $U_9 = $end - $first;
    } else {
        $U_9 = 0;
    }
    if (!empty($arr9)) {
        $first_index = key($arr9);
        $first = $arr9[$first_index + 1];
        $end = end($arr9);
        $U_10 = $end - $first;
    } else {
        $U_10 = 0;
    }
    if (!empty($arr10)) {
        $first_index = key($arr10);
        $first = $arr10[$first_index + 1];
        $end = end($arr10);
        $U_11 = $end - $first;
    } else {
        $U_11 = 0;
    }
    if (!empty($arr11)) {
        $first_index = key($arr11);
        $first = $arr11[$first_index + 1];
        $end = end($arr11);
        $U_12 = $end - $first;
    } else {
        $U_12 = 0;
    }
    if (!empty($arr12)) {
        $first_index = key($arr12);
        $first = $arr12[$first_index + 1];
        $end = end($arr12);
        $U_13 = $end - $first;
    } else {
        $U_13 = 0;
    }
    if (!empty($arr13)) {
        $first_index = key($arr13);
        $first = $arr13[$first_index + 1];
        $end = end($arr13);
        $U_14 = $end - $first;
    } else {
        $U_14 = 0;
    }
    if (!empty($arr14)) {
        $first_index = key($arr14);
        $first = $arr14[$first_index + 1];
        $end = end($arr14);
        $U_15 = $end - $first;
    } else {
        $U_15 = 0;
    }
    if (!empty($arr15)) {
        $first_index = key($arr15);
        $first = $arr15[$first_index + 1];
        $end = end($arr15);
        $U_16 = $end - $first;
    } else {
        $U_16 = 0;
    }
    if (!empty($arr16)) {
        $first_index = key($arr16);
        $first = $arr16[$first_index + 1];
        $end = end($arr16);
        $U_17 = $end - $first;
    } else {
        $U_17 = 0;
    }
    $data = $U_1 + $U_2 + $U_3 + $U_4 + $U_5 + $U_6 + $U_7 + $U_8 + $U_9 + $U_10 + $U_11 + $U_12 + $U_13 + $U_14 + $U_15 + $U_16 + $U_17;
    $data = number_format($data, 0, '', ',');
} elseif ($value == 'Last 30 Days') {
    $start_date = date('Y-n-j', strtotime($current_date . ' -30 day'));
    $end_date = date('Y-n-j', strtotime($current_date));
    $mongotime1 = new MongoDB\BSON\UTCDateTime(strtotime($start_date . 'T5:7:18+05:00'));
    // print_r($mongotime1);
    $mongotime2 = new MongoDB\BSON\UTCDateTime(strtotime($end_date . 'T23:7:18+05:00'));
    $val1 = json_decode(json_encode($mongotime1), true);
    $val2 = json_decode(json_encode($mongotime2), true);
    foreach ($val1 as $key => $value) {
        foreach ($value as $sub_key => $sub_value) {
            $a1 = $sub_value;
        }
    }
    $start_date = intval($a1);
    // print_r($start_date);
    foreach ($val2 as $key => $value) {
        foreach ($value as $sub_key => $sub_value2) {
            $a2 = $sub_value2;
        }
    }
    $end_date = intval($a2);
    //echo $start_date;
    $where = array(
        'UNIXtimestamp' =>  array('$gt' => $start_date, '$lte' => $end_date)
    );
    $select_fields = array(
        'U_1_ActiveEnergy_Delivered_kWh' => 1,
        'U_2_ActiveEnergy_Delivered_kWh' => 1,
        'U_3_ActiveEnergy_Delivered_kWh' => 1,
        'U_4_ActiveEnergy_Delivered_kWh' => 1,
        'U_5_ActiveEnergy_Delivered_kWh' => 1,
        'U_6_ActiveEnergy_Delivered_kWh' => 1,
        'U_7_ActiveEnergy_Delivered_kWh' => 1,
        'U_8_ActiveEnergy_Delivered_kWh' => 1,
        'U_9_ActiveEnergy_Delivered_kWh' => 1,
        'U_10_ActiveEnergy_Delivered_kWh' => 1,
        'U_11_ActiveEnergy_Delivered_kWh' => 1,
        'U_12_ActiveEnergy_Delivered_kWh' => 1,
        'U_13_ActiveEnergy_Delivered_kWh' => 1,
        'U_14_ActiveEnergy_Delivered_kWh' => 1,
        'U_15_ActiveEnergy_Delivered_kWh' => 1,
        'U_16_ActiveEnergy_Delivered_kWh' => 1,
        'U_17_ActiveEnergy_Delivered_kWh' => 1,
        'Time' => 1
    );
    $options = array(
        'projection' => $select_fields
    );
    $cursor = $collection->find($where, $options);
    $docs = $cursor->toArray();
    $index = 0;
    foreach ($docs as $document) {
        json_encode($document);
        // var_dump($document);
        foreach ($document as $key => $value) {
            $term[$index][$key] = $value;
            if (!empty($document['U_1_ActiveEnergy_Delivered_kWh'])) {
                $arr[] = $document['U_1_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_2_ActiveEnergy_Delivered_kWh'])) {
                $arr1[] = $document['U_2_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_3_ActiveEnergy_Delivered_kWh'])) {
                $arr2[] = $document['U_3_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_4_ActiveEnergy_Delivered_kWh'])) {
                $arr3[] = $document['U_4_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_5_ActiveEnergy_Delivered_kWh'])) {
                $arr4[] = $document['U_5_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_6_ActiveEnergy_Delivered_kWh'])) {
                $arr5[] = $document['U_6_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_7_ActiveEnergy_Delivered_kWh'])) {
                $arr6[] = $document['U_7_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_8_ActiveEnergy_Delivered_kWh'])) {
                $arr7[] = $document['U_8_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_9_ActiveEnergy_Delivered_kWh'])) {
                $arr8[] = $document['U_9_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_10_ActiveEnergy_Delivered_kWh'])) {
                $arr9[] = $document['U_10_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_11_ActiveEnergy_Delivered_kWh'])) {
                $arr10[] = $document['U_11_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_12_ActiveEnergy_Delivered_kWh'])) {
                $arr11[] = $document['U_12_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_13_ActiveEnergy_Delivered_kWh'])) {
                $arr12[] = $document['U_13_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_14_ActiveEnergy_Delivered_kWh'])) {
                $arr13[] = $document['U_14_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_15_ActiveEnergy_Delivered_kWh'])) {
                $arr14[] = $document['U_15_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_16_ActiveEnergy_Delivered_kWh'])) {
                $arr15[] = $document['U_16_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_17_ActiveEnergy_Delivered_kWh'])) {
                $arr16[] = $document['U_17_ActiveEnergy_Delivered_kWh'];
            }
        }
        $index++;
    }
    if (!empty($arr)) {
        $first_index = key($arr);
        $first = $arr[$first_index + 1];
        $end = end($arr);
        $U_1 = $end - $first;
    } else {
        $U_1 = 0;
    }
    // print_r($arr6);
    if (!empty($arr1)) {
        $first_index = key($arr1);
        $first = $arr1[$first_index + 1];
        $end = end($arr1);
        $U_2 = $end - $first;
    } else {
        $U_2 = 0;
    }
    if (!empty($arr2)) {
        $first_index = key($arr2);
        $first = $arr2[$first_index + 1];
        $end = end($arr2);
        $U_3 = $end - $first;
    } else {
        $U_3 = 0;
    }
    if (!empty($arr3)) {
        $first_index = key($arr3);
        $first = $arr3[$first_index + 1];
        $end = end($arr3);
        $U_4 = $end - $first;
    } else {
        $U_4 = 0;
    }
    if (!empty($arr4)) {
        $first_index = key($arr4);
        $first = $arr4[$first_index + 1];
        $end = end($arr4);
        $U_5 = $end - $first;
    } else {
        $U_5 = 0;
    }
    if (!empty($arr5)) {
        $first_index = key($arr5);
        $first = $arr5[$first_index + 1];
        $end = end($arr5);
        $U_6 = $end - $first;
    } else {
        $U_6 = 0;
    }
    if (!empty($arr6)) {
        $first_index = key($arr6);
        $first = $arr6[$first_index + 1];
        $end = end($arr6);
        $U_7 = $end - $first;
    } else {
        $U_7 = 0;
    }
    if (!empty($arr7)) {
        $first_index = key($arr7);
        $first = $arr7[$first_index + 1];
        $end = end($arr7);
        $U_8 = $end - $first;
    } else {
        $U_8 = 0;
    }
    if (!empty($arr8)) {
        $first_index = key($arr8);
        $first = $arr8[$first_index + 1];
        $end = end($arr8);
        $U_9 = $end - $first;
    } else {
        $U_9 = 0;
    }
    if (!empty($arr9)) {
        $first_index = key($arr9);
        $first = $arr9[$first_index + 1];
        $end = end($arr9);
        $U_10 = $end - $first;
    } else {
        $U_10 = 0;
    }
    if (!empty($arr10)) {
        $first_index = key($arr10);
        $first = $arr10[$first_index + 1];
        $end = end($arr10);
        $U_11 = $end - $first;
    } else {
        $U_11 = 0;
    }
    if (!empty($arr11)) {
        $first_index = key($arr11);
        $first = $arr11[$first_index + 1];
        $end = end($arr11);
        $U_12 = $end - $first;
    } else {
        $U_12 = 0;
    }
    if (!empty($arr12)) {
        $first_index = key($arr12);
        $first = $arr12[$first_index + 1];
        $end = end($arr12);
        $U_13 = $end - $first;
    } else {
        $U_13 = 0;
    }
    if (!empty($arr13)) {
        $first_index = key($arr13);
        $first = $arr13[$first_index + 1];
        $end = end($arr13);
        $U_14 = $end - $first;
    } else {
        $U_14 = 0;
    }
    if (!empty($arr14)) {
        $first_index = key($arr14);
        $first = $arr14[$first_index + 1];
        $end = end($arr14);
        $U_15 = $end - $first;
    } else {
        $U_15 = 0;
    }
    if (!empty($arr15)) {
        $first_index = key($arr15);
        $first = $arr15[$first_index + 1];
        $end = end($arr15);
        $U_16 = $end - $first;
    } else {
        $U_16 = 0;
    }
    if (!empty($arr16)) {
        $first_index = key($arr16);
        $first = $arr16[$first_index + 1];
        $end = end($arr16);
        $U_17 = $end - $first;
    } else {
        $U_17 = 0;
    }
    $data = $U_1 + $U_2 + $U_3 + $U_4 + $U_5 + $U_6 + $U_7 + $U_8 + $U_9 + $U_10 + $U_11 + $U_12 + $U_13 + $U_14 + $U_15 + $U_16 + $U_17;
    $data = number_format($data, 0, '', ',');
} elseif ($value == 'Yesterday') {
    $start_date = date('Y-n-j', strtotime($current_date . '-1 day'));
    $end_date = date('Y-n-j', strtotime($current_date  . '-1 day'));
    $mongotime1 = new MongoDB\BSON\UTCDateTime(strtotime($start_date . 'T5:00:00+05:00'));
    // print_r($mongotime1);
    $mongotime2 = new MongoDB\BSON\UTCDateTime(strtotime($end_date . 'T24:00:00+05:00'));
    $val1 = json_decode(json_encode($mongotime1), true);
    $val2 = json_decode(json_encode($mongotime2), true);
    foreach ($val1 as $key => $value) {
        foreach ($value as $sub_key => $sub_value) {
            $a1 = $sub_value;
        }
    }
    $start_date = intval($a1);
    // print_r($start_date);
    foreach ($val2 as $key => $value) {
        foreach ($value as $sub_key => $sub_value2) {
            $a2 = $sub_value2;
        }
    }
    $end_date = intval($a2);
    // echo $end_date;
    $where = array(
        'UNIXtimestamp' =>  array('$gt' => $start_date, '$lte' => $end_date)
    );
    $select_fields = array(
        'U_1_ActiveEnergy_Delivered_kWh' => 1,
        'U_2_ActiveEnergy_Delivered_kWh' => 1,
        'U_3_ActiveEnergy_Delivered_kWh' => 1,
        'U_4_ActiveEnergy_Delivered_kWh' => 1,
        'U_5_ActiveEnergy_Delivered_kWh' => 1,
        'U_6_ActiveEnergy_Delivered_kWh' => 1,
        'U_7_ActiveEnergy_Delivered_kWh' => 1,
        'U_8_ActiveEnergy_Delivered_kWh' => 1,
        'U_9_ActiveEnergy_Delivered_kWh' => 1,
        'U_10_ActiveEnergy_Delivered_kWh' => 1,
        'U_11_ActiveEnergy_Delivered_kWh' => 1,
        'U_12_ActiveEnergy_Delivered_kWh' => 1,
        'U_13_ActiveEnergy_Delivered_kWh' => 1,
        'U_14_ActiveEnergy_Delivered_kWh' => 1,
        'U_15_ActiveEnergy_Delivered_kWh' => 1,
        'U_16_ActiveEnergy_Delivered_kWh' => 1,
        'U_17_ActiveEnergy_Delivered_kWh' => 1,
        'Time' => 1
    );
    $options = array(
        'projection' => $select_fields
    );
    $cursor = $collection->find($where, $options);
    $docs = $cursor->toArray();
    $index = 0;
    foreach ($docs as $document) {
        json_encode($document);
        foreach ($document as $key => $value) {
            $term[$index][$key] = $value;
            if (!empty($document['U_1_ActiveEnergy_Delivered_kWh'])) {
                $arr[] = $document['U_1_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_2_ActiveEnergy_Delivered_kWh'])) {
                $arr1[] = $document['U_2_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_3_ActiveEnergy_Delivered_kWh'])) {
                $arr2[] = $document['U_3_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_4_ActiveEnergy_Delivered_kWh'])) {
                $arr3[] = $document['U_4_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_5_ActiveEnergy_Delivered_kWh'])) {
                $arr4[] = $document['U_5_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_6_ActiveEnergy_Delivered_kWh'])) {
                $arr5[] = $document['U_6_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_7_ActiveEnergy_Delivered_kWh'])) {
                $arr6[] = $document['U_7_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_8_ActiveEnergy_Delivered_kWh'])) {
                $arr7[] = $document['U_8_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_9_ActiveEnergy_Delivered_kWh'])) {
                $arr8[] = $document['U_9_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_10_ActiveEnergy_Delivered_kWh'])) {
                $arr9[] = $document['U_10_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_11_ActiveEnergy_Delivered_kWh'])) {
                $arr10[] = $document['U_11_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_12_ActiveEnergy_Delivered_kWh'])) {
                $arr11[] = $document['U_12_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_13_ActiveEnergy_Delivered_kWh'])) {
                $arr12[] = $document['U_13_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_14_ActiveEnergy_Delivered_kWh'])) {
                $arr13[] = $document['U_14_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_15_ActiveEnergy_Delivered_kWh'])) {
                $arr14[] = $document['U_15_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_16_ActiveEnergy_Delivered_kWh'])) {
                $arr15[] = $document['U_16_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_17_ActiveEnergy_Delivered_kWh'])) {
                $arr16[] = $document['U_17_ActiveEnergy_Delivered_kWh'];
            }
        }
        $index++;
    }
    if (!empty($arr)) {
        $first_index = key($arr);
        $first = $arr[$first_index + 1];
        $end = end($arr);
        $U_1 = $end - $first;
    } else {
        $U_1 = 0;
    }
    // print_r($arr6);
    if (!empty($arr1)) {
        $first_index = key($arr1);
        $first = $arr1[$first_index + 1];
        $end = end($arr1);
        $U_2 = $end - $first;
    } else {
        $U_2 = 0;
    }
    if (!empty($arr2)) {
        $first_index = key($arr2);
        $first = $arr2[$first_index + 1];
        $end = end($arr2);
        $U_3 = $end - $first;
    } else {
        $U_3 = 0;
    }
    if (!empty($arr3)) {
        $first_index = key($arr3);
        $first = $arr3[$first_index + 1];
        $end = end($arr3);
        $U_4 = $end - $first;
    } else {
        $U_4 = 0;
    }
    if (!empty($arr4)) {
        $first_index = key($arr4);
        $first = $arr4[$first_index + 1];
        $end = end($arr4);
        $U_5 = $end - $first;
    } else {
        $U_5 = 0;
    }
    if (!empty($arr5)) {
        $first_index = key($arr5);
        $first = $arr5[$first_index + 1];
        $end = end($arr5);
        $U_6 = $end - $first;
    } else {
        $U_6 = 0;
    }
    if (!empty($arr6)) {
        $first_index = key($arr6);
        $first = $arr6[$first_index + 1];
        $end = end($arr6);
        $U_7 = $end - $first;
    } else {
        $U_7 = 0;
    }
    if (!empty($arr7)) {
        $first_index = key($arr7);
        $first = $arr7[$first_index + 1];
        $end = end($arr7);
        $U_8 = $end - $first;
    } else {
        $U_8 = 0;
    }
    if (!empty($arr8)) {
        $first_index = key($arr8);
        $first = $arr8[$first_index + 1];
        $end = end($arr8);
        $U_9 = $end - $first;
    } else {
        $U_9 = 0;
    }
    if (!empty($arr9)) {
        $first_index = key($arr9);
        $first = $arr9[$first_index + 1];
        $end = end($arr9);
        $U_10 = $end - $first;
    } else {
        $U_10 = 0;
    }
    if (!empty($arr10)) {
        $first_index = key($arr10);
        $first = $arr10[$first_index + 1];
        $end = end($arr10);
        $U_11 = $end - $first;
    } else {
        $U_11 = 0;
    }
    if (!empty($arr11)) {
        $first_index = key($arr11);
        $first = $arr11[$first_index + 1];
        $end = end($arr11);
        $U_12 = $end - $first;
    } else {
        $U_12 = 0;
    }
    if (!empty($arr12)) {
        $first_index = key($arr12);
        $first = $arr12[$first_index + 1];
        $end = end($arr12);
        $U_13 = $end - $first;
    } else {
        $U_13 = 0;
    }
    if (!empty($arr13)) {
        $first_index = key($arr13);
        $first = $arr13[$first_index + 1];
        $end = end($arr13);
        $U_14 = $end - $first;
    } else {
        $U_14 = 0;
    }
    if (!empty($arr14)) {
        $first_index = key($arr14);
        $first = $arr14[$first_index + 1];
        $end = end($arr14);
        $U_15 = $end - $first;
    } else {
        $U_15 = 0;
    }
    if (!empty($arr15)) {
        $first_index = key($arr15);
        $first = $arr15[$first_index + 1];
        $end = end($arr15);
        $U_16 = $end - $first;
    } else {
        $U_16 = 0;
    }
    if (!empty($arr16)) {
        $first_index = key($arr16);
        $first = $arr16[$first_index + 1];
        $end = end($arr16);
        $U_17 = $end - $first;
    } else {
        $U_17 = 0;
    }
    $data = $U_1 + $U_2 + $U_3 + $U_4 + $U_5 + $U_6 + $U_7 + $U_8 + $U_9 + $U_10 + $U_11 + $U_12 + $U_13 + $U_14 + $U_15 + $U_16 + $U_17;
    $data = number_format($data, 0, '', ',');
} elseif ($value == 'Last Week') {
    $current_day = date("l");
    if ($current_day == 'Monday') {
        $start_date = date("Y-n-j");
    } elseif ($current_day == 'Tuesday') {
        $start_date = date('Y-n-j', strtotime($current_date . ' -1 day'));
    } elseif ($current_day == 'Wednesday') {
        $start_date = date('Y-n-j', strtotime($current_date . ' -2 day'));
    } elseif ($current_day == 'Thursday') {
        $start_date = date('Y-n-j', strtotime($current_date . ' -3 day'));
    } elseif ($current_day == 'Friday') {
        $start_date = date('Y-n-j', strtotime($current_date . ' -4 day'));
    } elseif ($current_day == 'Saturday') {
        $start_date = date('Y-n-j', strtotime($current_date . ' -5 day'));
    } elseif ($current_day == 'Sunday') {
        $start_date = date('Y-n-j', strtotime($current_date . ' -6 day'));
    }
    $start_date = date('Y-n-j', strtotime($start_date . ' -7 day'));
    $end_date = date('Y-n-j', strtotime($start_date . ' +6 day'));
    $mongotime1 = new MongoDB\BSON\UTCDateTime(strtotime($start_date . 'T5:7:18+05:00'));
    // print_r($mongotime1);
    $mongotime2 = new MongoDB\BSON\UTCDateTime(strtotime($end_date . '+1 day'));
    $val1 = json_decode(json_encode($mongotime1), true);
    $val2 = json_decode(json_encode($mongotime2), true);
    foreach ($val1 as $key => $value) {
        foreach ($value as $sub_key => $sub_value) {
            $a1 = $sub_value;
        }
    }
    $start_date = intval($a1);
    // print_r($start_date);
    foreach ($val2 as $key => $value) {
        foreach ($value as $sub_key => $sub_value2) {
            $a2 = $sub_value2;
        }
    }
    $end_date = intval($a2);
    $where = array(
        'UNIXtimestamp' =>  array('$gt' => $start_date, '$lte' => $end_date)
    );
    $select_fields = array(
        'U_1_ActiveEnergy_Delivered_kWh' => 1,
        'U_2_ActiveEnergy_Delivered_kWh' => 1,
        'U_3_ActiveEnergy_Delivered_kWh' => 1,
        'U_4_ActiveEnergy_Delivered_kWh' => 1,
        'U_5_ActiveEnergy_Delivered_kWh' => 1,
        'U_6_ActiveEnergy_Delivered_kWh' => 1,
        'U_7_ActiveEnergy_Delivered_kWh' => 1,
        'U_8_ActiveEnergy_Delivered_kWh' => 1,
        'U_9_ActiveEnergy_Delivered_kWh' => 1,
        'U_10_ActiveEnergy_Delivered_kWh' => 1,
        'U_11_ActiveEnergy_Delivered_kWh' => 1,
        'U_12_ActiveEnergy_Delivered_kWh' => 1,
        'U_13_ActiveEnergy_Delivered_kWh' => 1,
        'U_14_ActiveEnergy_Delivered_kWh' => 1,
        'U_15_ActiveEnergy_Delivered_kWh' => 1,
        'U_16_ActiveEnergy_Delivered_kWh' => 1,
        'U_17_ActiveEnergy_Delivered_kWh' => 1,
        'Time' => 1
    );
    $options = array(
        'projection' => $select_fields
    );
    $cursor = $collection->find($where, $options);
    $docs = $cursor->toArray();
    $index = 0;
    foreach ($docs as $document) {
        json_encode($document);
        // var_dump($document);
        foreach ($document as $key => $value) {
            $term[$index][$key] = $value;
            if (!empty($document['U_1_ActiveEnergy_Delivered_kWh'])) {
                $arr[] = $document['U_1_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_2_ActiveEnergy_Delivered_kWh'])) {
                $arr1[] = $document['U_2_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_3_ActiveEnergy_Delivered_kWh'])) {
                $arr2[] = $document['U_3_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_4_ActiveEnergy_Delivered_kWh'])) {
                $arr3[] = $document['U_4_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_5_ActiveEnergy_Delivered_kWh'])) {
                $arr4[] = $document['U_5_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_6_ActiveEnergy_Delivered_kWh'])) {
                $arr5[] = $document['U_6_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_7_ActiveEnergy_Delivered_kWh'])) {
                $arr6[] = $document['U_7_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_8_ActiveEnergy_Delivered_kWh'])) {
                $arr7[] = $document['U_8_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_9_ActiveEnergy_Delivered_kWh'])) {
                $arr8[] = $document['U_9_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_10_ActiveEnergy_Delivered_kWh'])) {
                $arr9[] = $document['U_10_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_11_ActiveEnergy_Delivered_kWh'])) {
                $arr10[] = $document['U_11_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_12_ActiveEnergy_Delivered_kWh'])) {
                $arr11[] = $document['U_12_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_13_ActiveEnergy_Delivered_kWh'])) {
                $arr12[] = $document['U_13_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_14_ActiveEnergy_Delivered_kWh'])) {
                $arr13[] = $document['U_14_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_15_ActiveEnergy_Delivered_kWh'])) {
                $arr14[] = $document['U_15_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_16_ActiveEnergy_Delivered_kWh'])) {
                $arr15[] = $document['U_16_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['U_17_ActiveEnergy_Delivered_kWh'])) {
                $arr16[] = $document['U_17_ActiveEnergy_Delivered_kWh'];
            }
        }
        $index++;
    }
    if (!empty($arr)) {
        $first_index = key($arr);
        $first = $arr[$first_index + 1];
        $end = end($arr);
        $U_1 = $end - $first;
    } else {
        $U_1 = 0;
    }
    // print_r($arr6);
    if (!empty($arr1)) {
        $first_index = key($arr1);
        $first = $arr1[$first_index + 1];
        $end = end($arr1);
        $U_2 = $end - $first;
    } else {
        $U_2 = 0;
    }
    if (!empty($arr2)) {
        $first_index = key($arr2);
        $first = $arr2[$first_index + 1];
        $end = end($arr2);
        $U_3 = $end - $first;
    } else {
        $U_3 = 0;
    }
    if (!empty($arr3)) {
        $first_index = key($arr3);
        $first = $arr3[$first_index + 1];
        $end = end($arr3);
        $U_4 = $end - $first;
    } else {
        $U_4 = 0;
    }
    if (!empty($arr4)) {
        $first_index = key($arr4);
        $first = $arr4[$first_index + 1];
        $end = end($arr4);
        $U_5 = $end - $first;
    } else {
        $U_5 = 0;
    }
    if (!empty($arr5)) {
        $first_index = key($arr5);
        $first = $arr5[$first_index + 1];
        $end = end($arr5);
        $U_6 = $end - $first;
    } else {
        $U_6 = 0;
    }
    if (!empty($arr6)) {
        $first_index = key($arr6);
        $first = $arr6[$first_index + 1];
        $end = end($arr6);
        $U_7 = $end - $first;
    } else {
        $U_7 = 0;
    }
    if (!empty($arr7)) {
        $first_index = key($arr7);
        $first = $arr7[$first_index + 1];
        $end = end($arr7);
        $U_8 = $end - $first;
    } else {
        $U_8 = 0;
    }
    if (!empty($arr8)) {
        $first_index = key($arr8);
        $first = $arr8[$first_index + 1];
        $end = end($arr8);
        $U_9 = $end - $first;
    } else {
        $U_9 = 0;
    }
    if (!empty($arr9)) {
        $first_index = key($arr9);
        $first = $arr9[$first_index + 1];
        $end = end($arr9);
        $U_10 = $end - $first;
    } else {
        $U_10 = 0;
    }
    if (!empty($arr10)) {
        $first_index = key($arr10);
        $first = $arr10[$first_index + 1];
        $end = end($arr10);
        $U_11 = $end - $first;
    } else {
        $U_11 = 0;
    }
    if (!empty($arr11)) {
        $first_index = key($arr11);
        $first = $arr11[$first_index + 1];
        $end = end($arr11);
        $U_12 = $end - $first;
    } else {
        $U_12 = 0;
    }
    if (!empty($arr12)) {
        $first_index = key($arr12);
        $first = $arr12[$first_index + 1];
        $end = end($arr12);
        $U_13 = $end - $first;
    } else {
        $U_13 = 0;
    }
    if (!empty($arr13)) {
        $first_index = key($arr13);
        $first = $arr13[$first_index + 1];
        $end = end($arr13);
        $U_14 = $end - $first;
    } else {
        $U_14 = 0;
    }
    if (!empty($arr14)) {
        $first_index = key($arr14);
        $first = $arr14[$first_index + 1];
        $end = end($arr14);
        $U_15 = $end - $first;
    } else {
        $U_15 = 0;
    }
    if (!empty($arr15)) {
        $first_index = key($arr15);
        $first = $arr15[$first_index + 1];
        $end = end($arr15);
        $U_16 = $end - $first;
    } else {
        $U_16 = 0;
    }
    if (!empty($arr16)) {
        $first_index = key($arr16);
        $first = $arr16[$first_index + 1];
        $end = end($arr16);
        $U_17 = $end - $first;
    } else {
        $U_17 = 0;
    }
    $data = $U_1 + $U_2 + $U_3 + $U_4 + $U_5 + $U_6 + $U_7 + $U_8 + $U_9 + $U_10 + $U_11 + $U_12 + $U_13 + $U_14 + $U_15 + $U_16 + $U_17;
    $data = number_format($data, 0, '', ',');
}
echo $data;