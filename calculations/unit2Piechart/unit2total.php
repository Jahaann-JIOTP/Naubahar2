<?php
$value = $_GET['value'];
session_start();
error_reporting(E_ERROR | E_PARSE);
function fetchData($start_date, $end_date)
{
    include('mongodb_conn.php');
    $collection = $db->naubaharunit2_activetags;
    $array = array();
    $array['cols'][] = array('type' => 'string');
    $array['cols'][] = array('type' => 'number', 'label' => 'RO-1');
    $array['cols'][] = array('type' => 'number', 'label' => 'RO-2');
    $array['cols'][] = array('type' => 'number', 'label' => 'RO-3');
    $array['cols'][] = array('type' => 'number', 'label' => 'RO-4');
    $where = array(
        'UNIXtimestamp' =>  array('$gt' => $start_date, '$lte' => $end_date)
    );
    $select_fields = array(
        // 'GW1_U8_ActiveEnergy_Delivered_kWh' => 1,
        'GW2_U9_ActiveEnergy_Delivered_kWh' => 1,
        'GW2_U10_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U22_ActiveEnergy_Delivered_kWh' => 1,
        'GW2_U8_ActiveEnergy_Delivered_kWh' => 1,

        'GW1_U19_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U18_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U17_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U16_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U15_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U20_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U21_ActiveEnergy_Delivered_kWh' => 1,

        'GW1_U6_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U7_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U23_ActiveEnergy_Delivered_kWh' => 1,
        'GW2_U2_ActiveEnergy_Delivered_kWh' => 1,
        'GW3_U2_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U24_ActiveEnergy_Delivered_kWh' => 1,
        'GW3_U6_ActiveEnergy_Delivered_kWh' => 1,

        'GW2_U3_ActiveEnergy_Delivered_kWh' => 1,
        'GW2_U4_ActiveEnergy_Delivered_kWh' => 1,

        'GW2_U12_ActiveEnergy_Delivered_kWh' => 1,
        'GW2_U11_ActiveEnergy_Delivered_kWh' => 1,
        'GW2_U14_ActiveEnergy_Delivered_kWh' => 1,
        'GW2_U13_ActiveEnergy_Delivered_kWh' => 1,

        'GW1_U4_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U2_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U3_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U5_ActiveEnergy_Delivered_kWh' => 1,
        'GW3_U3_ActiveEnergy_Delivered_kWh' => 1,
        'GW3_U4_ActiveEnergy_Delivered_kWh' => 1,
        'GW3_U5_ActiveEnergy_Delivered_kWh' => 1,
        'PLC_Date_Time' => 1,
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
            //  if (!empty($document['GW1_U8_ActiveEnergy_Delivered_kWh'])) {
            //     $arr[] = $document['GW1_U8_ActiveEnergy_Delivered_kWh'];
            // }
            //RO
            if (!empty($document['GW2_U9_ActiveEnergy_Delivered_kWh'])) {
                $arr1[] = $document['GW2_U9_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW2_U10_ActiveEnergy_Delivered_kWh'])) {
                $arr2[] = $document['GW2_U10_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U22_ActiveEnergy_Delivered_kWh'])) {
                $arr3[] = $document['GW1_U22_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW2_U8_ActiveEnergy_Delivered_kWh'])) {
                $arr4[] = $document['GW2_U8_ActiveEnergy_Delivered_kWh'];
            }
            //GRASSO
            if (!empty($document['GW1_U19_ActiveEnergy_Delivered_kWh'])) {
                $arr5[] = $document['GW1_U19_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U18_ActiveEnergy_Delivered_kWh'])) {
                $arr6[] = $document['GW1_U18_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U17_ActiveEnergy_Delivered_kWh'])) {
                $arr7[] = $document['GW1_U17_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U16_ActiveEnergy_Delivered_kWh'])) {
                $arr8[] = $document['GW1_U16_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U15_ActiveEnergy_Delivered_kWh'])) {
                $arr9[] = $document['GW1_U15_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U20_ActiveEnergy_Delivered_kWh'])) {
                $arr10[] = $document['GW1_U20_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U21_ActiveEnergy_Delivered_kWh'])) {
                $arr11[] = $document['GW1_U21_ActiveEnergy_Delivered_kWh'];
            }
            //LINES
            if (!empty($document['GW1_U6_ActiveEnergy_Delivered_kWh'])) {
                $arr12[] = $document['GW1_U6_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U7_ActiveEnergy_Delivered_kWh'])) {
                $arr13[] = $document['GW1_U7_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U23_ActiveEnergy_Delivered_kWh'])) {
                $arr14[] = $document['GW1_U23_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW2_U2_ActiveEnergy_Delivered_kWh'])) {
                $arr15[] = $document['GW2_U2_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW3_U2_ActiveEnergy_Delivered_kWh'])) {
                $arr16[] = $document['GW3_U2_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U24_ActiveEnergy_Delivered_kWh'])) {
                $arr17[] = $document['GW1_U24_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW3_U6_ActiveEnergy_Delivered_kWh'])) {
                $arr18[] = $document['GW3_U6_ActiveEnergy_Delivered_kWh'];
            }

            //lpac
            if (!empty($document['GW2_U12_ActiveEnergy_Delivered_kWh'])) {
                $arr19[] = $document['GW2_U12_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW2_U11_ActiveEnergy_Delivered_kWh'])) {
                $arr20[] = $document['GW2_U11_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW2_U14_ActiveEnergy_Delivered_kWh'])) {
                $arr21[] = $document['GW2_U14_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW2_U13_ActiveEnergy_Delivered_kWh'])) {
                $arr22[] = $document['GW2_U13_ActiveEnergy_Delivered_kWh'];
            }

            //ECR
            if (!empty($document['GW1_U4_ActiveEnergy_Delivered_kWh'])) {
                $arr23[] = $document['GW1_U4_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U2_ActiveEnergy_Delivered_kWh'])) {
                $arr24[] = $document['GW1_U2_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U3_ActiveEnergy_Delivered_kWh'])) {
                $arr25[] = $document['GW1_U3_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U5_ActiveEnergy_Delivered_kWh'])) {
                $arr26[] = $document['GW1_U5_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW3_U3_ActiveEnergy_Delivered_kWh'])) {
                $arr27[] = $document['GW3_U3_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW3_U4_ActiveEnergy_Delivered_kWh'])) {
                $arr28[] = $document['GW3_U4_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW3_U5_ActiveEnergy_Delivered_kWh'])) {
                $arr29[] = $document['GW3_U5_ActiveEnergy_Delivered_kWh'];
            }
            //hpac
            if (!empty($document['GW2_U3_ActiveEnergy_Delivered_kWh'])) {
                $arr30[] = $document['GW2_U3_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW2_U4_ActiveEnergy_Delivered_kWh'])) {
                $arr31[] = $document['GW2_U4_ActiveEnergy_Delivered_kWh'];
            }
        }
        $index++;
    }
    // print_r($arr6);
    // if (!empty($arr)) {
    //     $first_index = key($arr);
    //     $first = $arr[$first_index + 1];
    //     $end = end($arr);
    //     $U_1 = $end - $first;
    // } else {
    //     $U_1 = 0;
    // }
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
    if (!empty($arr17)) {
        $first_index = key($arr17);
        $first = $arr17[$first_index + 1];
        $end = end($arr17);
        $U_18 = $end - $first;
    } else {
        $U_18 = 0;
    }
    if (!empty($arr18)) {
        $first_index = key($arr18);
        $first = $arr18[$first_index + 1];
        $end = end($arr18);
        $U_19 = $end - $first;
    } else {
        $U_19 = 0;
    }
    if (!empty($arr19)) {
        $first_index = key($arr19);
        $first = $arr19[$first_index + 1];
        $end = end($arr19);
        $U_20 = $end - $first;
    } else {
        $U_20 = 0;
    }
    if (!empty($arr20)) {
        $first_index = key($arr20);
        $first = $arr20[$first_index + 1];
        $end = end($arr20);
        $U_21 = $end - $first;
    } else {
        $U_21 = 0;
    }
    if (!empty($arr21)) {
        $first_index = key($arr21);
        $first = $arr21[$first_index + 1];
        $end = end($arr21);
        $U_22 = $end - $first;
    } else {
        $U_22 = 0;
    }
    if (!empty($arr22)) {
        $first_index = key($arr22);
        $first = $arr22[$first_index + 1];
        $end = end($arr22);
        $U_23 = $end - $first;
    } else {
        $U_23 = 0;
    }
    if (!empty($arr23)) {
        $first_index = key($arr23);
        $first = $arr23[$first_index + 1];
        $end = end($arr23);
        $U_24 = $end - $first;
    } else {
        $U_24 = 0;
    }
    if (!empty($arr24)) {
        $first_index = key($arr24);
        $first = $arr24[$first_index + 1];
        $end = end($arr24);
        $U_25 = $end - $first;
    } else {
        $U_25 = 0;
    }
    if (!empty($arr25)) {
        $first_index = key($arr25);
        $first = $arr25[$first_index + 1];
        $end = end($arr25);
        $U_26 = $end - $first;
    } else {
        $U_26 = 0;
    }

    if (!empty($arr26)) {
        $first_index = key($arr26);
        $first = $arr26[$first_index + 1];
        $end = end($arr26);
        $U_27 = $end - $first;
    } else {
        $U_27 = 0;
    }
    if (!empty($arr27)) {
        $first_index = key($arr27);
        $first = $arr27[$first_index + 1];
        $end = end($arr27);
        $U_28 = $end - $first;
    } else {
        $U_28 = 0;
    }
    if (!empty($arr28)) {
        $first_index = key($arr28);
        $first = $arr28[$first_index + 1];
        $end = end($arr28);
        $U_29 = $end - $first;
    } else {
        $U_29 = 0;
    }
    if (!empty($arr29)) {
        $first_index = key($arr29);
        $first = $arr29[$first_index + 1];
        $end = end($arr29);
        $U_30 = $end - $first;
    } else {
        $U_30 = 0;
    }
    if (!empty($arr30)) {
        $first_index = key($arr30);
        $first = $arr30[$first_index + 1];
        $end = end($arr30);
        $U_31 = $end - $first;
    } else {
        $U_31 = 0;
    }
    if (!empty($arr31)) {
        $first_index = key($arr31);
        $first = $arr31[$first_index + 1];
        $end = end($arr31);
        $U_32 = $end - $first;
    } else {
        $U_32 = 0;
    }

    $count1 = $U_2 + $U_3 + $U_4 + $U_5;
    $count2 = $U_6 + $U_7 + $U_8 + $U_9 + $U_10 + $U_11 + $U_12;
    $count3 = $U_13 + $U_14 + $U_15 + $U_16 + $U_17 + $U_18+ $U_19;
    $count4 = $U_20 + $U_21 + $U_22 + $U_23;
    $count5 = $U_24 + $U_25 + $U_26 + $U_27 + $U_28 + $U_29 + $U_30;
    $count6 = $U_31 + $U_32;

    if ($count1 < 0) {
        $count1 = 0;
    } else {
        $count1 = $count1;
    }
    if ($count2 < 0) {
        $count2 = 0;
    } else {
        $count2 = $count2;
    }
    if ($count3 < 0) {
        $count3 = 0;
    } else {
        $count3 = $count3;
    }
    if ($count4 < 0) {
        $count4 = 0;
    } else {
        $count4 = $count4;
    }
    if ($count5 < 0) {
        $count5 = 0;
    } else {
        $count5 = $count5;
    }
    if ($count6 < 0) {
        $count6 = 0;
    } else {
        $count6 = $count6;
    }

    $array1[] = array(
        'meter' => 'RO Section',
        'value' => (int)$count1
    );
    $array1[] = array(
        'meter' => 'Grasso Section',
        'value' => (int)$count2
    );
    $array1[] = array(
        'meter' => 'Line Section',
        'value' => (int)$count3
    );
    $array1[] = array(
        'meter' => 'LPAC Section',
        'value' => (int)$count4
    );
    $array1[] = array(
        'meter' => 'ECR Section',
        'value' => (int)$count5
    );
    $array1[] = array(
        'meter' => 'HPAC Section',
        'value' => (int)$count6
    );

    $data = json_encode($array1);
    echo $data;
}
//exclude the line 8 function 
function fetchDataexclude($start_date, $end_date)
{
    include('mongodb_conn.php');
    $collection = $db->naubaharunit2_activetags;
    $array = array();
    $array['cols'][] = array('type' => 'string');
    $array['cols'][] = array('type' => 'number', 'label' => 'RO-1');
    $array['cols'][] = array('type' => 'number', 'label' => 'RO-2');
    $array['cols'][] = array('type' => 'number', 'label' => 'RO-3');
    $array['cols'][] = array('type' => 'number', 'label' => 'RO-4');
    $where = array(
        'UNIXtimestamp' =>  array('$gt' => $start_date, '$lte' => $end_date)
    );
    $select_fields = array(
        // 'GW1_U8_ActiveEnergy_Delivered_kWh' => 1,
        'GW2_U9_ActiveEnergy_Delivered_kWh' => 1,
        'GW2_U10_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U22_ActiveEnergy_Delivered_kWh' => 1,
        'GW2_U8_ActiveEnergy_Delivered_kWh' => 1,

        'GW1_U19_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U18_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U17_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U16_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U15_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U20_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U21_ActiveEnergy_Delivered_kWh' => 1,

        'GW1_U6_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U7_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U23_ActiveEnergy_Delivered_kWh' => 1,
        'GW2_U2_ActiveEnergy_Delivered_kWh' => 1,
        'GW3_U2_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U24_ActiveEnergy_Delivered_kWh' => 1,
        'GW3_U6_ActiveEnergy_Delivered_kWh' => 1,

        'GW2_U3_ActiveEnergy_Delivered_kWh' => 1,
        'GW2_U4_ActiveEnergy_Delivered_kWh' => 1,

        'GW2_U12_ActiveEnergy_Delivered_kWh' => 1,
        'GW2_U11_ActiveEnergy_Delivered_kWh' => 1,
        'GW2_U14_ActiveEnergy_Delivered_kWh' => 1,
        'GW2_U13_ActiveEnergy_Delivered_kWh' => 1,

        'GW1_U4_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U2_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U3_ActiveEnergy_Delivered_kWh' => 1,
        'GW1_U5_ActiveEnergy_Delivered_kWh' => 1,
        'GW3_U3_ActiveEnergy_Delivered_kWh' => 1,
        'GW3_U4_ActiveEnergy_Delivered_kWh' => 1,
        'GW3_U5_ActiveEnergy_Delivered_kWh' => 1,
        'PLC_Date_Time' => 1,
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
            //  if (!empty($document['GW1_U8_ActiveEnergy_Delivered_kWh'])) {
            //     $arr[] = $document['GW1_U8_ActiveEnergy_Delivered_kWh'];
            // }
            //RO
            if (!empty($document['GW2_U9_ActiveEnergy_Delivered_kWh'])) {
                $arr1[] = $document['GW2_U9_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW2_U10_ActiveEnergy_Delivered_kWh'])) {
                $arr2[] = $document['GW2_U10_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U22_ActiveEnergy_Delivered_kWh'])) {
                $arr3[] = $document['GW1_U22_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW2_U8_ActiveEnergy_Delivered_kWh'])) {
                $arr4[] = $document['GW2_U8_ActiveEnergy_Delivered_kWh'];
            }
            //GRASSO
            if (!empty($document['GW1_U19_ActiveEnergy_Delivered_kWh'])) {
                $arr5[] = $document['GW1_U19_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U18_ActiveEnergy_Delivered_kWh'])) {
                $arr6[] = $document['GW1_U18_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U17_ActiveEnergy_Delivered_kWh'])) {
                $arr7[] = $document['GW1_U17_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U16_ActiveEnergy_Delivered_kWh'])) {
                $arr8[] = $document['GW1_U16_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U15_ActiveEnergy_Delivered_kWh'])) {
                $arr9[] = $document['GW1_U15_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U20_ActiveEnergy_Delivered_kWh'])) {
                $arr10[] = $document['GW1_U20_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U21_ActiveEnergy_Delivered_kWh'])) {
                $arr11[] = $document['GW1_U21_ActiveEnergy_Delivered_kWh'];
            }
            //LINES
            if (!empty($document['GW1_U6_ActiveEnergy_Delivered_kWh'])) {
                $arr12[] = $document['GW1_U6_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U7_ActiveEnergy_Delivered_kWh'])) {
                $arr13[] = $document['GW1_U7_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U23_ActiveEnergy_Delivered_kWh'])) {
                $arr14[] = $document['GW1_U23_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW2_U2_ActiveEnergy_Delivered_kWh'])) {
                $arr15[] = $document['GW2_U2_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW3_U2_ActiveEnergy_Delivered_kWh'])) {
                $arr16[] = $document['GW3_U2_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U24_ActiveEnergy_Delivered_kWh'])) {
                $arr17[] = $document['GW1_U24_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW3_U6_ActiveEnergy_Delivered_kWh'])) {
                $arr18[] = $document['GW3_U6_ActiveEnergy_Delivered_kWh'];
            }

            //lpac
            if (!empty($document['GW2_U12_ActiveEnergy_Delivered_kWh'])) {
                $arr19[] = $document['GW2_U12_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW2_U11_ActiveEnergy_Delivered_kWh'])) {
                $arr20[] = $document['GW2_U11_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW2_U14_ActiveEnergy_Delivered_kWh'])) {
                $arr21[] = $document['GW2_U14_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW2_U13_ActiveEnergy_Delivered_kWh'])) {
                $arr22[] = $document['GW2_U13_ActiveEnergy_Delivered_kWh'];
            }

            //ECR
            if (!empty($document['GW1_U4_ActiveEnergy_Delivered_kWh'])) {
                $arr23[] = $document['GW1_U4_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U2_ActiveEnergy_Delivered_kWh'])) {
                $arr24[] = $document['GW1_U2_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U3_ActiveEnergy_Delivered_kWh'])) {
                $arr25[] = $document['GW1_U3_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW1_U5_ActiveEnergy_Delivered_kWh'])) {
                $arr26[] = $document['GW1_U5_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW3_U3_ActiveEnergy_Delivered_kWh'])) {
                $arr27[] = $document['GW3_U3_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW3_U4_ActiveEnergy_Delivered_kWh'])) {
                $arr28[] = $document['GW3_U4_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW3_U5_ActiveEnergy_Delivered_kWh'])) {
                $arr29[] = $document['GW3_U5_ActiveEnergy_Delivered_kWh'];
            }
            //hpac
            if (!empty($document['GW2_U3_ActiveEnergy_Delivered_kWh'])) {
                $arr30[] = $document['GW2_U3_ActiveEnergy_Delivered_kWh'];
            }
            if (!empty($document['GW2_U4_ActiveEnergy_Delivered_kWh'])) {
                $arr31[] = $document['GW2_U4_ActiveEnergy_Delivered_kWh'];
            }
        }
        $index++;
    }
    // print_r($arr6);
    // if (!empty($arr)) {
    //     $first_index = key($arr);
    //     $first = $arr[$first_index + 1];
    //     $end = end($arr);
    //     $U_1 = $end - $first;
    // } else {
    //     $U_1 = 0;
    // }
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
    if (!empty($arr17)) {
        $first_index = key($arr17);
        $first = $arr17[$first_index + 1];
        $end = end($arr17);
        $U_18 = $end - $first;
    } else {
        $U_18 = 0;
    }
    if (!empty($arr18)) {
        $first_index = key($arr18);
        $first = $arr18[$first_index + 1];
        $end = end($arr18);
        $U_19 = $end - $first;
    } else {
        $U_19 = 0;
    }
    if (!empty($arr19)) {
        $first_index = key($arr19);
        $first = $arr19[$first_index + 1];
        $end = end($arr19);
        $U_20 = $end - $first;
    } else {
        $U_20 = 0;
    }
    if (!empty($arr20)) {
        $first_index = key($arr20);
        $first = $arr20[$first_index + 1];
        $end = end($arr20);
        $U_21 = $end - $first;
    } else {
        $U_21 = 0;
    }
    if (!empty($arr21)) {
        $first_index = key($arr21);
        $first = $arr21[$first_index + 1];
        $end = end($arr21);
        $U_22 = $end - $first;
    } else {
        $U_22 = 0;
    }
    if (!empty($arr22)) {
        $first_index = key($arr22);
        $first = $arr22[$first_index + 1];
        $end = end($arr22);
        $U_23 = $end - $first;
    } else {
        $U_23 = 0;
    }
    if (!empty($arr23)) {
        $first_index = key($arr23);
        $first = $arr23[$first_index + 1];
        $end = end($arr23);
        $U_24 = $end - $first;
    } else {
        $U_24 = 0;
    }
    if (!empty($arr24)) {
        $first_index = key($arr24);
        $first = $arr24[$first_index + 1];
        $end = end($arr24);
        $U_25 = $end - $first;
    } else {
        $U_25 = 0;
    }
    if (!empty($arr25)) {
        $first_index = key($arr25);
        $first = $arr25[$first_index + 1];
        $end = end($arr25);
        $U_26 = $end - $first;
    } else {
        $U_26 = 0;
    }

    if (!empty($arr26)) {
        $first_index = key($arr26);
        $first = $arr26[$first_index + 1];
        $end = end($arr26);
        $U_27 = $end - $first;
    } else {
        $U_27 = 0;
    }
    if (!empty($arr27)) {
        $first_index = key($arr27);
        $first = $arr27[$first_index + 1];
        $end = end($arr27);
        $U_28 = $end - $first;
    } else {
        $U_28 = 0;
    }
    if (!empty($arr28)) {
        $first_index = key($arr28);
        $first = $arr28[$first_index + 1];
        $end = end($arr28);
        $U_29 = $end - $first;
    } else {
        $U_29 = 0;
    }
    if (!empty($arr29)) {
        $first_index = key($arr29);
        $first = $arr29[$first_index + 1];
        $end = end($arr29);
        $U_30 = $end - $first;
    } else {
        $U_30 = 0;
    }
    if (!empty($arr30)) {
        $first_index = key($arr30);
        $first = $arr30[$first_index + 1];
        $end = end($arr30);
        $U_31 = $end - $first;
    } else {
        $U_31 = 0;
    }
    if (!empty($arr31)) {
        $first_index = key($arr31);
        $first = $arr31[$first_index + 1];
        $end = end($arr31);
        $U_32 = $end - $first;
    } else {
        $U_32 = 0;
    }

    $count1 = $U_2 + $U_3 + $U_4 + $U_5;
    $count2 = $U_6 + $U_7 + $U_8 + $U_9 + $U_10 + $U_11 + $U_12;
    $count3 = $U_13 + $U_14 + $U_15 + $U_16 + $U_17 + $U_18;
    $count4 = $U_20 + $U_21 + $U_22 + $U_23;
    $count5 = $U_24 + $U_25 + $U_26 + $U_27 + $U_28 + $U_29 + $U_30;
    $count6 = $U_31 + $U_32;

    if ($count1 < 0) {
        $count1 = 0;
    } else {
        $count1 = $count1;
    }
    if ($count2 < 0) {
        $count2 = 0;
    } else {
        $count2 = $count2;
    }
    if ($count3 < 0) {
        $count3 = 0;
    } else {
        $count3 = $count3;
    }
    if ($count4 < 0) {
        $count4 = 0;
    } else {
        $count4 = $count4;
    }
    if ($count5 < 0) {
        $count5 = 0;
    } else {
        $count5 = $count5;
    }
    if ($count6 < 0) {
        $count6 = 0;
    } else {
        $count6 = $count6;
    }

    $array1[] = array(
        'meter' => 'RO Section',
        'value' => (int)$count1
    );
    $array1[] = array(
        'meter' => 'Grasso Section',
        'value' => (int)$count2
    );
    $array1[] = array(
        'meter' => 'Line Section',
        'value' => (int)$count3
    );
    $array1[] = array(
        'meter' => 'LPAC Section',
        'value' => (int)$count4
    );
    $array1[] = array(
        'meter' => 'ECR Section',
        'value' => (int)$count5
    );
    $array1[] = array(
        'meter' => 'HPAC Section',
        'value' => (int)$count6
    );

    $data = json_encode($array1);
    echo $data;
}
$current_date = date("Y-n-j");
if ($value == 'Last 7 Days') {
    $start_date = date('Y-n-j', strtotime($current_date . ' -7 day'));
    $end_date = date('Y-n-j', strtotime($current_date . ' -1 day'));
    $mongotime1 = new MongoDB\BSON\UTCDateTime(strtotime($start_date . 'T00:00:18+05:00'));
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
    fetchDataexclude($start_date, $end_date);
}
if ($value == 'Today') {
    $start_date = date('Y-n-j', strtotime($current_date));
    $end_date = date('Y-n-j', strtotime($current_date));
    $mongotime1 = new MongoDB\BSON\UTCDateTime(strtotime($start_date . 'T00:00:18+05:00'));
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
    fetchData($start_date, $end_date);
} elseif ($value == 'This Week') {
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
    $end_date = date('Y-n-j', strtotime($current_date . ' +2 day'));
    $mongotime1 = new MongoDB\BSON\UTCDateTime(strtotime($start_date . 'T00:00:18+05:00'));
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

    fetchData($start_date, $end_date);
} elseif ($value == 'This Month') {
    $start_date = date('Y', strtotime($current_date)) . '-' . date('n', strtotime($current_date)) . '-01';
    //echo $start_date;
    $end_date = date('Y-n-j', strtotime($current_date));
    //echo $end_date;
    $mongotime1 = new MongoDB\BSON\UTCDateTime(strtotime($start_date . 'T00:00:18+05:00'));
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
    fetchDataexclude($start_date, $end_date);
} elseif ($value == 'This Year') {
    $start_date = date('Y', strtotime($current_date)) . '-01-01';

    //echo $start_date;
    $end_date = date('Y-n-j', strtotime($current_date));
    //echo $end_date;
    $mongotime1 = new MongoDB\BSON\UTCDateTime(strtotime($start_date . 'T00:00:18+05:00'));
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
    fetchDataexclude($start_date, $end_date);
} elseif ($value == 'Last 30 Days') {
    $start_date = date('Y-n-j', strtotime($current_date . ' -30 day'));
    $end_date = date('Y-n-j', strtotime($current_date . ' -1 day'));
    $mongotime1 = new MongoDB\BSON\UTCDateTime(strtotime($start_date . 'T00:00:18+05:00'));
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
    fetchDataexclude($start_date, $end_date);
} elseif ($value == 'Yesterday') {
    $start_date = date('Y-n-j', strtotime($current_date . '-1 day'));
    $end_date = date('Y-n-j', strtotime($current_date  . '-1 day'));
    $mongotime1 = new MongoDB\BSON\UTCDateTime(strtotime($start_date . 'T00:00:18+05:00'));
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
    fetchData($start_date, $end_date);
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
    $mongotime1 = new MongoDB\BSON\UTCDateTime(strtotime($start_date . 'T00:00:18+05:00'));
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
    fetchDataexclude($start_date, $end_date);
}
