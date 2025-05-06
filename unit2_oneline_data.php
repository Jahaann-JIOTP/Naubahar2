<?php
error_reporting(0);
$conn = mysqli_connect("65.0.16.20", "jahaann", "Jahaann#321", 'status');
$result = $conn->query("SELECT id,status as status FROM unit_2");
while ($rows = $result->fetch_assoc()) {
    if ($rows['status'] == 'up') {

        $url = "http://13.234.241.103:1880/latestunit2";

        $json = file_get_contents($url);
        $msg = json_decode($json, true);
        //time
        $Time = 0;
        if (isset($msg["Time"]))
            $Time = $msg["Time"];
        date_default_timezone_set("Asia/Karachi");
        $start_time = date('Y-m-d H:i:s', (time() - 60 * 5));
        $end_time = date('Y-m-d H:i:s', (time()));
        //current avg
        $GW1_U8_Current_Avg_Amp = 0;
        $GW1_U25_Current_Avg_Amp = 0;
        $GW1_U26_Current_Avg_Amp = 0;
        $GW1_U2_Current_Avg_Amp = 0;
        $GW1_U3_Current_Avg_Amp = 0;
        $GW1_U4_Current_Avg_Amp = 0;
        $GW1_U5_Current_Avg_Amp = 0;
        $GW1_U6_Current_Avg_Amp = 0;
        $GW1_U7_Current_Avg_Amp = 0;
        $GW1_U14_Current_Avg_Amp = 0;
        $GW1_U15_Current_Avg_Amp = 0;
        $GW1_U16_Current_Avg_Amp = 0;
        $GW1_U17_Current_Avg_Amp = 0;
        $GW1_U18_Current_Avg_Amp = 0;
        $GW1_U19_Current_Avg_Amp = 0;
        $GW1_U20_Current_Avg_Amp = 0;
        $GW1_U21_Current_Avg_Amp = 0;
        $GW1_U22_Current_Avg_Amp = 0;
        $GW1_U23_Current_Avg_Amp = 0;
        $GW1_U24_Current_Avg_Amp = 0;

        $GW2_U9_Current_Avg_Amp = 0;
        $GW2_U10_Current_Avg_Amp = 0;
        $GW2_U8_Current_Avg_Amp = 0;
        $GW2_U2_Current_Avg_Amp = 0;
        $GW2_U3_Current_Avg_Amp = 0;
        $GW2_U4_Current_Avg_Amp = 0;
        $GW2_U11_Current_Avg_Amp = 0;
        $GW2_U12_Current_Avg_Amp = 0;
        $GW2_U13_Current_Avg_Amp = 0;
        $GW2_U14_Current_Avg_Amp = 0;
        $GW3_U2_Current_Avg_Amp = 0;
        $GW3_U3_Current_Avg_Amp = 0;
        $GW3_U4_Current_Avg_Amp = 0;
        $GW3_U5_Current_Avg_Amp = 0;
        $GW3_U6_Current_Avg_Amp = 0;

        if (isset($msg["GW1_U8_Current_Avg_Amp"]))
            $GW1_U8_Current_Avg_Amp = $msg["GW1_U8_Current_Avg_Amp"];
        if (isset($msg["GW1_U25_Current_Avg_Amp"]))
            $GW1_U25_Current_Avg_Amp = $msg["GW1_U25_Current_Avg_Amp"] / 10;
        if (isset($msg["GW1_U26_Current_Avg_Amp"]))
            $GW1_U26_Current_Avg_Amp = $msg["GW1_U26_Current_Avg_Amp"] / 10;
        if (isset($msg["GW1_U2_Current_Avg_Amp"]))
            $GW1_U2_Current_Avg_Amp = $msg["GW1_U2_Current_Avg_Amp"] / 10;
        if (isset($msg["GW1_U3_Current_Avg_Amp"]))
            $GW1_U3_Current_Avg_Amp = $msg["GW1_U3_Current_Avg_Amp"] / 10;
        if (isset($msg["GW1_U4_Current_Avg_Amp"]))
            $GW1_U4_Current_Avg_Amp = $msg["GW1_U4_Current_Avg_Amp"] / 10;
        if (isset($msg["GW1_U5_Current_Avg_Amp"]))
            $GW1_U5_Current_Avg_Amp = $msg["GW1_U5_Current_Avg_Amp"] / 10;
        if (isset($msg["GW1_U6_Current_Avg_Amp"]))
            $GW1_U6_Current_Avg_Amp = $msg["GW1_U6_Current_Avg_Amp"] / 10;
        if (isset($msg["GW1_U7_Current_Avg_Amp"]))
            $GW1_U7_Current_Avg_Amp = $msg["GW1_U7_Current_Avg_Amp"] / 10;
        if (isset($msg["GW1_U14_Current_Avg_Amp"]))
            $GW1_U14_Current_Avg_Amp = $msg["GW1_U14_Current_Avg_Amp"] / 10;
        if (isset($msg["GW1_U15_Current_Avg_Amp"]))
            $GW1_U15_Current_Avg_Amp = $msg["GW1_U15_Current_Avg_Amp"] / 10;
        if (isset($msg["GW1_U16_Current_Avg_Amp"]))
            $GW1_U16_Current_Avg_Amp = $msg["GW1_U16_Current_Avg_Amp"] / 10;
        if (isset($msg["GW1_U17_Current_Avg_Amp"]))
            $GW1_U17_Current_Avg_Amp = $msg["GW1_U17_Current_Avg_Amp"] / 10;
        if (isset($msg["GW1_U18_Current_Avg_Amp"]))
            $GW1_U18_Current_Avg_Amp = $msg["GW1_U18_Current_Avg_Amp"] / 10;
        if (isset($msg["GW1_U19_Current_Avg_Amp"]))
            $GW1_U19_Current_Avg_Amp = $msg["GW1_U19_Current_Avg_Amp"] / 10;
        if (isset($msg["GW1_U20_Current_Avg_Amp"]))
            $GW1_U20_Current_Avg_Amp = $msg["GW1_U20_Current_Avg_Amp"] / 10;
        if (isset($msg["GW1_U21_Current_Avg_Amp"]))
            $GW1_U21_Current_Avg_Amp = $msg["GW1_U21_Current_Avg_Amp"] / 10;
        if (isset($msg["GW1_U22_Current_Avg_Amp"]))
            $GW1_U22_Current_Avg_Amp = $msg["GW1_U22_Current_Avg_Amp"] / 10;
        if (isset($msg["GW1_U23_Current_Avg_Amp"]))
            $GW1_U23_Current_Avg_Amp = $msg["GW1_U23_Current_Avg_Amp"] / 10;
        if (isset($msg["GW1_U24_Current_Avg_Amp"]))
            $GW1_U24_Current_Avg_Amp = $msg["GW1_U24_Current_Avg_Amp"] / 10;
        if (isset($msg["GW2_U8_Current_Avg_Amp"]))
            $GW2_U8_Current_Avg_Amp = $msg["GW2_U8_Current_Avg_Amp"] / 10;
        if (isset($msg["GW2_U9_Current_Avg_Amp"]))
            $GW2_U9_Current_Avg_Amp = $msg["GW2_U9_Current_Avg_Amp"] / 10;
        if (isset($msg["GW2_U10_Current_Avg_Amp"]))
            $GW2_U10_Current_Avg_Amp = $msg["GW2_U10_Current_Avg_Amp"] / 10;
        if (isset($msg["GW2_U2_Current_Avg_Amp"]))
            $GW2_U2_Current_Avg_Amp = $msg["GW2_U2_Current_Avg_Amp"] / 10;
        if (isset($msg["GW2_U3_Current_Avg_Amp"]))
            $GW2_U3_Current_Avg_Amp = $msg["GW2_U3_Current_Avg_Amp"] / 10;
        if (isset($msg["GW2_U4_Current_Avg_Amp"]))
            $GW2_U4_Current_Avg_Amp = $msg["GW2_U4_Current_Avg_Amp"] / 10;
        if (isset($msg["GW2_U11_Current_Avg_Amp"]))
            $GW2_U11_Current_Avg_Amp = $msg["GW2_U11_Current_Avg_Amp"] / 10;
        if (isset($msg["GW2_U12_Current_Avg_Amp"]))
            $GW2_U12_Current_Avg_Amp = $msg["GW2_U12_Current_Avg_Amp"] / 10;
        if (isset($msg["GW2_U13_Current_Avg_Amp"]))
            $GW2_U13_Current_Avg_Amp = $msg["GW2_U13_Current_Avg_Amp"] / 10;
        if (isset($msg["GW2_U14_Current_Avg_Amp"]))
            $GW2_U14_Current_Avg_Amp = $msg["GW2_U14_Current_Avg_Amp"] / 10;
        if (isset($msg["GW3_U2_Current_Avg_Amp"]))
            $GW3_U2_Current_Avg_Amp = $msg["GW3_U2_Current_Avg_Amp"] / 10;
        if (isset($msg["GW3_U3_Current_Avg_Amp"]))
            $GW3_U3_Current_Avg_Amp = $msg["GW3_U3_Current_Avg_Amp"] / 10;
        if (isset($msg["GW3_U4_Current_Avg_Amp"]))
            $GW3_U4_Current_Avg_Amp = $msg["GW3_U4_Current_Avg_Amp"] / 10;
        if (isset($msg["GW3_U5_Current_Avg_Amp"]))
            $GW3_U5_Current_Avg_Amp = $msg["GW3_U5_Current_Avg_Amp"] / 10;
        if (isset($msg["GW3_U6_Current_Avg_Amp"]))
            $GW3_U6_Current_Avg_Amp = $msg["GW3_U6_Current_Avg_Amp"] / 10;
        //voltage avg
        $GW1_U8_Voltage_LL_V = 0;
        $GW1_U25_Voltage_LL_V = 0;
        $GW1_U26_Voltage_LL_V = 0;
        $GW1_U2_Voltage_LL_V = 0;
        $GW1_U3_Voltage_LL_V = 0;
        $GW1_U4_Voltage_LL_V = 0;
        $GW1_U5_Voltage_LL_V = 0;
        $GW1_U6_Voltage_LL_V = 0;
        $GW1_U7_Voltage_LL_V = 0;
        $GW1_U14_Voltage_LL_V = 0;
        $GW1_U15_Voltage_LL_V = 0;
        $GW1_U16_Voltage_LL_V = 0;
        $GW1_U17_Voltage_LL_V = 0;
        $GW1_U18_Voltage_LL_V = 0;
        $GW1_U19_Voltage_LL_V = 0;
        $GW1_U20_Voltage_LL_V = 0;
        $GW1_U21_Voltage_LL_V = 0;
        $GW1_U22_Voltage_LL_V = 0;
        $GW1_U23_Voltage_LL_V = 0;
        $GW1_U24_Voltage_LL_V = 0;
        $GW2_U8_Voltage_LL_V = 0;
        $GW2_U9_Voltage_LL_V = 0;
        $GW2_U10_Voltage_LL_V = 0;
        $GW2_U2_Voltage_LL_V = 0;
        $GW2_U3_Voltage_LL_V = 0;
        $GW2_U4_Voltage_LL_V = 0;
        $GW2_U11_Voltage_LL_V = 0;
        $GW2_U12_Voltage_LL_V = 0;
        $GW2_U13_Voltage_LL_V = 0;
        $GW2_U14_Voltage_LL_V = 0;
        $GW3_U2_Voltage_LL_V = 0;
        $GW3_U3_Voltage_LL_V = 0;
        $GW3_U4_Voltage_LL_V = 0;
        $GW3_U5_Voltage_LL_V = 0;
        $GW3_U6_Voltage_LL_V = 0;

        if (isset($msg["GW1_U8_Voltage_LL_V"]))
            $GW1_U8_Voltage_LL_V = $msg["GW1_U8_Voltage_LL_V"];
        if (isset($msg["GW1_U25_Voltage_LL_V"]))
            $GW1_U25_Voltage_LL_V = $msg["GW1_U25_Voltage_LL_V"];
        if (isset($msg["GW1_U26_Voltage_LL_V"]))
            $GW1_U26_Voltage_LL_V = $msg["GW1_U26_Voltage_LL_V"];
        if (isset($msg["GW1_U2_Voltage_LL_V"]))
            $GW1_U2_Voltage_LL_V = $msg["GW1_U2_Voltage_LL_V"] / 10;
        if (isset($msg["GW1_U3_Voltage_LL_V"]))
            $GW1_U3_Voltage_LL_V = $msg["GW1_U3_Voltage_LL_V"] / 10;
        if (isset($msg["GW1_U4_Voltage_LL_V"]))
            $GW1_U4_Voltage_LL_V = $msg["GW1_U4_Voltage_LL_V"] / 10;
        if (isset($msg["GW1_U5_Voltage_LL_V"]))
            $GW1_U5_Voltage_LL_V = $msg["GW1_U5_Voltage_LL_V"] / 10;
        if (isset($msg["GW1_U6_Voltage_LL_V"]))
            $GW1_U6_Voltage_LL_V = $msg["GW1_U6_Voltage_LL_V"] / 10;
        if (isset($msg["GW1_U7_Voltage_LL_V"]))
            $GW1_U7_Voltage_LL_V = $msg["GW1_U7_Voltage_LL_V"] / 10;
        if (isset($msg["GW1_U14_Voltage_LL_V"]))
            $GW1_U14_Voltage_LL_V = $msg["GW1_U14_Voltage_LL_V"] / 10;
        if (isset($msg["GW1_U15_Voltage_LL_V"]))
            $GW1_U15_Voltage_LL_V = $msg["GW1_U15_Voltage_LL_V"] / 10;
        if (isset($msg["GW1_U16_Voltage_LL_V"]))
            $GW1_U16_Voltage_LL_V = $msg["GW1_U16_Voltage_LL_V"] / 10;
        if (isset($msg["GW1_U17_Voltage_LL_V"]))
            $GW1_U17_Voltage_LL_V = $msg["GW1_U17_Voltage_LL_V"] / 10;
        if (isset($msg["GW1_U18_Voltage_LL_V"]))
            $GW1_U18_Voltage_LL_V = $msg["GW1_U18_Voltage_LL_V"] / 10;
        if (isset($msg["GW1_U19_Voltage_LL_V"]))
            $GW1_U19_Voltage_LL_V = $msg["GW1_U19_Voltage_LL_V"] / 10;
        if (isset($msg["GW1_U20_Voltage_LL_V"]))
            $GW1_U20_Voltage_LL_V = $msg["GW1_U20_Voltage_LL_V"] / 10;
        if (isset($msg["GW1_U21_Voltage_LL_V"]))
            $GW1_U21_Voltage_LL_V = $msg["GW1_U21_Voltage_LL_V"] / 10;
        if (isset($msg["GW1_U22_Voltage_LL_V"]))
            $GW1_U22_Voltage_LL_V = $msg["GW1_U22_Voltage_LL_V"] / 10;
        if (isset($msg["GW1_U23_Voltage_LL_V"]))
            $GW1_U23_Voltage_LL_V = $msg["GW1_U23_Voltage_LL_V"] / 10;
        if (isset($msg["GW1_U24_Voltage_LL_V"]))
            $GW1_U24_Voltage_LL_V = $msg["GW1_U24_Voltage_LL_V"] / 10;
        if (isset($msg["GW2_U8_Voltage_LL_V"]))
            $GW2_U8_Voltage_LL_V = $msg["GW2_U8_Voltage_LL_V"] / 10;
        if (isset($msg["GW2_U9_Voltage_LL_V"]))
            $GW2_U9_Voltage_LL_V = $msg["GW2_U9_Voltage_LL_V"] / 10;
        if (isset($msg["GW2_U10_Voltage_LL_V"]))
            $GW2_U10_Voltage_LL_V = $msg["GW2_U10_Voltage_LL_V"] / 10;
        if (isset($msg["GW2_U2_Voltage_LL_V"]))
            $GW2_U2_Voltage_LL_V = $msg["GW2_U2_Voltage_LL_V"] / 10;
        if (isset($msg["GW2_U3_Voltage_LL_V"]))
            $GW2_U3_Voltage_LL_V = $msg["GW2_U3_Voltage_LL_V"] / 10;
        if (isset($msg["GW2_U4_Voltage_LL_V"]))
            $GW2_U4_Voltage_LL_V = $msg["GW2_U4_Voltage_LL_V"] / 10;
        if (isset($msg["GW2_U11_Voltage_LL_V"]))
            $GW2_U11_Voltage_LL_V = $msg["GW2_U11_Voltage_LL_V"] / 10;
        if (isset($msg["GW2_U12_Voltage_LL_V"]))
            $GW2_U12_Voltage_LL_V = $msg["GW2_U12_Voltage_LL_V"] / 10;
        if (isset($msg["GW2_U13_Voltage_LL_V"]))
            $GW2_U13_Voltage_LL_V = $msg["GW2_U13_Voltage_LL_V"] / 10;
        if (isset($msg["GW2_U14_Voltage_LL_V"]))
            $GW2_U14_Voltage_LL_V = $msg["GW2_U14_Voltage_LL_V"] / 10;

        if (isset($msg["GW3_U2_Voltage_LL_V"]))
            $GW3_U2_Voltage_LL_V = $msg["GW3_U2_Voltage_LL_V"] / 10;
        if (isset($msg["GW3_U3_Voltage_LL_V"]))
            $GW3_U3_Voltage_LL_V = $msg["GW3_U3_Voltage_LL_V"] / 10;
        if (isset($msg["GW3_U4_Voltage_LL_V"]))
            $GW3_U4_Voltage_LL_V = $msg["GW3_U4_Voltage_LL_V"] / 10;
        if (isset($msg["GW3_U5_Voltage_LL_V"]))
            $GW3_U5_Voltage_LL_V = $msg["GW3_U5_Voltage_LL_V"] / 10;
        if (isset($msg["GW3_U6_Voltage_LL_V"]))
            $GW3_U6_Voltage_LL_V = $msg["GW3_U6_Voltage_LL_V"] / 10;

        //avtive power
        $GW1_U8_ActivePower_Total_kW = 0;
        $GW1_U25_ActivePower_Total_kW = 0;
        $GW1_U26_ActivePower_Total_kW = 0;
        $GW1_U2_ActivePower_Total_kW = 0;
        $GW1_U3_ActivePower_Total_kW = 0;
        $GW1_U4_ActivePower_Total_kW = 0;
        $GW1_U5_ActivePower_Total_kW = 0;
        $GW1_U6_ActivePower_Total_kW = 0;
        $GW1_U7_ActivePower_Total_kW = 0;
        $GW1_U14_ActivePower_Total_kW = 0;
        $GW1_U15_ActivePower_Total_kW = 0;
        $GW1_U16_ActivePower_Total_kW = 0;
        $GW1_U17_ActivePower_Total_kW = 0;
        $GW1_U18_ActivePower_Total_kW = 0;
        $GW1_U19_ActivePower_Total_kW = 0;
        $GW1_U20_ActivePower_Total_kW = 0;
        $GW1_U21_ActivePower_Total_kW = 0;
        $GW1_U22_ActivePower_Total_kW = 0;
        $GW1_U23_ActivePower_Total_kW = 0;
        $GW1_U24_ActivePower_Total_kW = 0;

        $GW2_U9_ActivePower_Total_kW = 0;
        $GW2_U10_ActivePower_Total_kW = 0;
        $GW2_U8_ActivePower_Total_kW = 0;
        $GW2_U2_ActivePower_Total_kW = 0;
        $GW2_U11_ActivePower_Total_kW = 0;
        $GW2_U12_ActivePower_Total_kW = 0;
        $GW2_U13_ActivePower_Total_kW = 0;
        $GW2_U14_ActivePower_Total_kW = 0;
        $GW2_U3_ActivePower_Total_kW = 0;
        $GW2_U4_ActivePower_Total_kW = 0;
        $GW2_U2_ActivePower_Total_kW = 0;
        $GW2_U11_ActivePower_Total_kW = 0;
        $GW2_U12_ActivePower_Total_kW = 0;
        $GW2_U13_ActivePower_Total_kW = 0;
        $GW2_U14_ActivePower_Total_kW = 0;
        $GW3_U2_ActivePower_Total_kW = 0;
        $GW3_U3_ActivePower_Total_kW = 0;
        $GW3_U4_ActivePower_Total_kW = 0;
        $GW3_U5_ActivePower_Total_kW = 0;
        $GW3_U6_ActivePower_Total_kW = 0;

        if (isset($msg["GW1_U8_ActivePower_Total_kW"]))
            $GW1_U8_ActivePower_Total_kW = $msg["GW1_U8_ActivePower_Total_kW"];
        if (isset($msg["GW1_U25_ActivePower_Total_kW"]))
            $GW1_U25_ActivePower_Total_kW = $msg["GW1_U25_ActivePower_Total_kW"];
        if (isset($msg["GW1_U26_ActivePower_Total_kW"]))
            $GW1_U26_ActivePower_Total_kW = $msg["GW1_U26_ActivePower_Total_kW"];
        if (isset($msg["GW1_U2_ActivePower_Total_kW"]))
            $GW1_U2_ActivePower_Total_kW = $msg["GW1_U2_ActivePower_Total_kW"];
        if (isset($msg["GW1_U3_ActivePower_Total_kW"]))
            $GW1_U3_ActivePower_Total_kW = $msg["GW1_U3_ActivePower_Total_kW"];
        if (isset($msg["GW1_U4_ActivePower_Total_kW"]))
            $GW1_U4_ActivePower_Total_kW = $msg["GW1_U4_ActivePower_Total_kW"];
        if (isset($msg["GW1_U5_ActivePower_Total_kW"]))
            $GW1_U5_ActivePower_Total_kW = $msg["GW1_U5_ActivePower_Total_kW"];
        if (isset($msg["GW1_U6_ActivePower_Total_kW"]))
            $GW1_U6_ActivePower_Total_kW = $msg["GW1_U6_ActivePower_Total_kW"];
        if (isset($msg["GW1_U7_ActivePower_Total_kW"]))
            $GW1_U7_ActivePower_Total_kW = $msg["GW1_U7_ActivePower_Total_kW"];
        if (isset($msg["GW1_U14_ActivePower_Total_kW"]))
            $GW1_U14_ActivePower_Total_kW = $msg["GW1_U14_ActivePower_Total_kW"];
        if (isset($msg["GW1_U15_ActivePower_Total_kW"]))
            $GW1_U15_ActivePower_Total_kW = $msg["GW1_U15_ActivePower_Total_kW"];
        if (isset($msg["GW1_U16_ActivePower_Total_kW"]))
            $GW1_U16_ActivePower_Total_kW = $msg["GW1_U16_ActivePower_Total_kW"];
        if (isset($msg["GW1_U17_ActivePower_Total_kW"]))
            $GW1_U17_ActivePower_Total_kW = $msg["GW1_U17_ActivePower_Total_kW"];
        if (isset($msg["GW1_U18_ActivePower_Total_kW"]))
            $GW1_U18_ActivePower_Total_kW = $msg["GW1_U18_ActivePower_Total_kW"];
        if (isset($msg["GW1_U19_ActivePower_Total_kW"]))
            $GW1_U19_ActivePower_Total_kW = $msg["GW1_U19_ActivePower_Total_kW"];
        if (isset($msg["GW1_U20_ActivePower_Total_kW"]))
            $GW1_U20_ActivePower_Total_kW = $msg["GW1_U20_ActivePower_Total_kW"];
        if (isset($msg["GW1_U21_ActivePower_Total_kW"]))
            $GW1_U21_ActivePower_Total_kW = $msg["GW1_U21_ActivePower_Total_kW"];
        if (isset($msg["GW1_U22_ActivePower_Total_kW"]))
            $GW1_U22_ActivePower_Total_kW = $msg["GW1_U22_ActivePower_Total_kW"];
        if (isset($msg["GW1_U23_ActivePower_Total_kW"]))
            $GW1_U23_ActivePower_Total_kW = $msg["GW1_U23_ActivePower_Total_kW"];
        if (isset($msg["GW1_U24_ActivePower_Total_kW"]))
            $GW1_U24_ActivePower_Total_kW = $msg["GW1_U24_ActivePower_Total_kW"];
        if (isset($msg["GW2_U9_ActivePower_Total_kW"]))
            $GW2_U9_ActivePower_Total_kW = $msg["GW2_U9_ActivePower_Total_kW"];
        if (isset($msg["GW2_U10_ActivePower_Total_kW"]))
            $GW2_U10_ActivePower_Total_kW = $msg["GW2_U10_ActivePower_Total_kW"];
        if (isset($msg["GW2_U8_ActivePower_Total_kW"]))
            $GW2_U8_ActivePower_Total_kW = $msg["GW2_U8_ActivePower_Total_kW"];
        if (isset($msg["GW2_U2_ActivePower_Total_kW"]))
            $GW2_U2_ActivePower_Total_kW = $msg["GW2_U2_ActivePower_Total_kW"];
        if (isset($msg["GW2_U11_ActivePower_Total_kW"]))
            $GW2_U11_ActivePower_Total_kW = $msg["GW2_U11_ActivePower_Total_kW"];
        if (isset($msg["GW2_U12_ActivePower_Total_kW"]))
            $GW2_U12_ActivePower_Total_kW = $msg["GW2_U12_ActivePower_Total_kW"];
        if (isset($msg["GW2_U13_ActivePower_Total_kW"]))
            $GW2_U13_ActivePower_Total_kW = $msg["GW2_U13_ActivePower_Total_kW"];
        if (isset($msg["GW2_U14_ActivePower_Total_kW"]))
            $GW2_U14_ActivePower_Total_kW = $msg["GW2_U14_ActivePower_Total_kW"];
        if (isset($msg["GW2_U3_ActivePower_Total_kW"]))
            $GW2_U3_ActivePower_Total_kW = $msg["GW2_U3_ActivePower_Total_kW"];
        if (isset($msg["GW2_U4_ActivePower_Total_kW"]))
            $GW2_U4_ActivePower_Total_kW = $msg["GW2_U4_ActivePower_Total_kW"];
        if (isset($msg["GW2_U2_ActivePower_Total_kW"]))
            $GW2_U2_ActivePower_Total_kW = $msg["GW2_U2_ActivePower_Total_kW"];
        if (isset($msg["GW2_U11_ActivePower_Total_kW"]))
            $GW2_U11_ActivePower_Total_kW = $msg["GW2_U11_ActivePower_Total_kW"];
        if (isset($msg["GW2_U12_ActivePower_Total_kW"]))
            $GW2_U12_ActivePower_Total_kW = $msg["GW2_U12_ActivePower_Total_kW"];
        if (isset($msg["GW2_U13_ActivePower_Total_kW"]))
            $GW2_U13_ActivePower_Total_kW = $msg["GW2_U13_ActivePower_Total_kW"];
        if (isset($msg["GW2_U14_ActivePower_Total_kW"]))
            $GW2_U14_ActivePower_Total_kW = $msg["GW2_U14_ActivePower_Total_kW"];
        if (isset($msg["GW3_U2_ActivePower_Total_kW"]))
            $GW3_U2_ActivePower_Total_kW = $msg["GW3_U2_ActivePower_Total_kW"];
        if (isset($msg["GW3_U3_ActivePower_Total_kW"]))
            $GW3_U3_ActivePower_Total_kW = $msg["GW3_U3_ActivePower_Total_kW"];
        if (isset($msg["GW3_U4_ActivePower_Total_kW"]))
            $GW3_U4_ActivePower_Total_kW = $msg["GW3_U4_ActivePower_Total_kW"];
        if (isset($msg["GW3_U5_ActivePower_Total_kW"]))
            $GW3_U5_ActivePower_Total_kW = $msg["GW3_U5_ActivePower_Total_kW"];
        if (isset($msg["GW3_U6_ActivePower_Total_kW"]))
            $GW3_U6_ActivePower_Total_kW = $msg["GW3_U6_ActivePower_Total_kW"];
    } else {
        $GW1_U8_ActivePower_Total_kW = 0;
        $GW1_U25_ActivePower_Total_kW = 0;
        $GW1_U26_ActivePower_Total_kW = 0;
        $GW1_U2_ActivePower_Total_kW = 0;
        $GW1_U3_ActivePower_Total_kW = 0;
        $GW1_U4_ActivePower_Total_kW = 0;
        $GW1_U5_ActivePower_Total_kW = 0;
        $GW1_U6_ActivePower_Total_kW = 0;
        $GW1_U7_ActivePower_Total_kW = 0;
        $GW1_U14_ActivePower_Total_kW = 0;
        $GW1_U15_ActivePower_Total_kW = 0;
        $GW1_U16_ActivePower_Total_kW = 0;
        $GW1_U17_ActivePower_Total_kW = 0;
        $GW1_U18_ActivePower_Total_kW = 0;
        $GW1_U19_ActivePower_Total_kW = 0;
        $GW1_U20_ActivePower_Total_kW = 0;
        $GW1_U21_ActivePower_Total_kW = 0;
        $GW1_U22_ActivePower_Total_kW = 0;
        $GW1_U23_ActivePower_Total_kW = 0;
        $GW1_U24_ActivePower_Total_kW = 0;

        $GW2_U9_ActivePower_Total_kW = 0;
        $GW2_U10_ActivePower_Total_kW = 0;
        $GW2_U8_ActivePower_Total_kW = 0;
        $GW2_U2_ActivePower_Total_kW = 0;
        $GW2_U11_ActivePower_Total_kW = 0;
        $GW2_U12_ActivePower_Total_kW = 0;
        $GW2_U13_ActivePower_Total_kW = 0;
        $GW2_U14_ActivePower_Total_kW = 0;
        $GW2_U3_ActivePower_Total_kW = 0;
        $GW2_U4_ActivePower_Total_kW = 0;
        $GW2_U2_ActivePower_Total_kW = 0;
        $GW2_U11_ActivePower_Total_kW = 0;
        $GW2_U12_ActivePower_Total_kW = 0;
        $GW2_U13_ActivePower_Total_kW = 0;
        $GW2_U14_ActivePower_Total_kW = 0;
        $GW3_U2_ActivePower_Total_kW = 0;
        $GW3_U3_ActivePower_Total_kW = 0;
        $GW3_U4_ActivePower_Total_kW = 0;
        $GW3_U5_ActivePower_Total_kW = 0;
        $GW3_U6_ActivePower_Total_kW = 0;
        $GW1_U8_Voltage_LL_V = 0;
        $GW1_U25_Voltage_LL_V = 0;
        $GW1_U26_Voltage_LL_V = 0;
        $GW1_U2_Voltage_LL_V = 0;
        $GW1_U3_Voltage_LL_V = 0;
        $GW1_U4_Voltage_LL_V = 0;
        $GW1_U5_Voltage_LL_V = 0;
        $GW1_U6_Voltage_LL_V = 0;
        $GW1_U7_Voltage_LL_V = 0;
        $GW1_U14_Voltage_LL_V = 0;
        $GW1_U15_Voltage_LL_V = 0;
        $GW1_U16_Voltage_LL_V = 0;
        $GW1_U17_Voltage_LL_V = 0;
        $GW1_U18_Voltage_LL_V = 0;
        $GW1_U19_Voltage_LL_V = 0;
        $GW1_U20_Voltage_LL_V = 0;
        $GW1_U21_Voltage_LL_V = 0;
        $GW1_U22_Voltage_LL_V = 0;
        $GW1_U23_Voltage_LL_V = 0;
        $GW1_U24_Voltage_LL_V = 0;
        $GW2_U8_Voltage_LL_V = 0;
        $GW2_U9_Voltage_LL_V = 0;
        $GW2_U10_Voltage_LL_V = 0;
        $GW2_U2_Voltage_LL_V = 0;
        $GW2_U3_Voltage_LL_V = 0;
        $GW2_U4_Voltage_LL_V = 0;
        $GW2_U11_Voltage_LL_V = 0;
        $GW2_U12_Voltage_LL_V = 0;
        $GW2_U13_Voltage_LL_V = 0;
        $GW2_U14_Voltage_LL_V = 0;
        $GW3_U2_Voltage_LL_V = 0;
        $GW3_U3_Voltage_LL_V = 0;
        $GW3_U4_Voltage_LL_V = 0;
        $GW3_U5_Voltage_LL_V = 0;
        $GW3_U6_Voltage_LL_V = 0;
        $GW1_U8_Current_Avg_Amp = 0;
        $GW1_U25_Current_Avg_Amp = 0;
        $GW1_U26_Current_Avg_Amp = 0;
        $GW1_U2_Current_Avg_Amp = 0;
        $GW1_U3_Current_Avg_Amp = 0;
        $GW1_U4_Current_Avg_Amp = 0;
        $GW1_U5_Current_Avg_Amp = 0;
        $GW1_U6_Current_Avg_Amp = 0;
        $GW1_U7_Current_Avg_Amp = 0;
        $GW1_U14_Current_Avg_Amp = 0;
        $GW1_U15_Current_Avg_Amp = 0;
        $GW1_U16_Current_Avg_Amp = 0;
        $GW1_U17_Current_Avg_Amp = 0;
        $GW1_U18_Current_Avg_Amp = 0;
        $GW1_U19_Current_Avg_Amp = 0;
        $GW1_U20_Current_Avg_Amp = 0;
        $GW1_U21_Current_Avg_Amp = 0;
        $GW1_U22_Current_Avg_Amp = 0;
        $GW1_U23_Current_Avg_Amp = 0;
        $GW1_U24_Current_Avg_Amp = 0;

        $GW2_U9_Current_Avg_Amp = 0;
        $GW2_U10_Current_Avg_Amp = 0;
        $GW2_U8_Current_Avg_Amp = 0;
        $GW2_U2_Current_Avg_Amp = 0;
        $GW2_U3_Current_Avg_Amp = 0;
        $GW2_U4_Current_Avg_Amp = 0;
        $GW2_U11_Current_Avg_Amp = 0;
        $GW2_U12_Current_Avg_Amp = 0;
        $GW2_U13_Current_Avg_Amp = 0;
        $GW2_U14_Current_Avg_Amp = 0;
        $GW3_U2_Current_Avg_Amp = 0;
        $GW3_U3_Current_Avg_Amp = 0;
        $GW3_U4_Current_Avg_Amp = 0;
        $GW3_U5_Current_Avg_Amp = 0;
        $GW3_U6_Current_Avg_Amp = 0;
    }
}

?>

<style type="text/css">
    @import url('http://fonts.cdnfonts.com/css/bagator');

    .font-features {
        color: #62000b;
        font-family: 'Bagator', sans-serif;
        font-weight: 700;
        font-size: 18px;
    }

    p.font-features {
        width: 46.72;
        height: 17px;
    }

    .rectangle {
        height: auto;
        width: 90px;
        margin-left: -5px;
        /*border-radius: 10px; */
        /* animation: blinkingBackground 10s infinite;*/
    }
</style>
<div class="text" style="left: 477pt !important;top: 17pt;">
    <div>
        <?php if ($GW1_U25_ActivePower_Total_kW == 0 && $GW1_U25_Current_Avg_Amp == 0 && $GW1_U25_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW1_U25_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 472pt !important;top: 38pt;"><a href="meter_diagram_unit2.php?id=T_1&&meter=GW1_U25"><img
            src="assets/images/meter.png" alt="" width="107px" height="101px"></a></div>
<div class="text" style="left: 554pt !important;top: 29pt;">
    <div>
        <div class="rectangle" style="margin-bottom:15px;">
            <!-- <p class="font-features" style="font-size: 20px;width: 140px;color:black"><?php //echo 'Transformer-2' 
                                                                                            ?></p> -->
        </div>
        <div class="rectangle" style="margin-bottom:15px;">
            <p class="font-features" style="font-size: 18px;width: 130px;"><?php echo round($GW1_U25_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:15px;">
            <p class="font-features" style="font-size: 18px;width: 130px;"><?php echo round($GW1_U25_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:15px;">
            <p class="font-features" style="font-size: 18px;width: 130px;"><?php echo round($GW1_U25_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<div class="text" style="left: 870pt !important;top: 17pt;">
    <div>
        <?php if ($GW1_U26_ActivePower_Total_kW == 0 && $GW1_U26_Current_Avg_Amp == 0 && $GW1_U26_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW1_U26_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 864pt !important;top: 38pt;"><a href="meter_diagram_unit2.php?id=T_1&&meter=GW1_U26"><img
            src="assets/images/meter.png" alt="" width="107px" height="101px"></a></div>
<div class="text" style="left: 944pt !important;top: 29pt;">
    <div>
        <div class="rectangle" style="margin-bottom:15px;">
            <!-- <p class="font-features" style="font-size: 20px;width: 140px;color:black"><?php //echo 'Transformer-2' 
                                                                                            ?></p> -->
        </div>
        <div class="rectangle" style="margin-bottom:15px;">
            <p class="font-features" style="font-size: 18px;width: 130px;"><?php echo round($GW1_U26_Voltage_LL_V / 10, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:15px;">
            <p class="font-features" style="font-size: 18px;width: 130px;"><?php echo round($GW1_U26_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:15px;">
            <p class="font-features" style="font-size: 18px;width: 130px;"><?php echo round($GW1_U26_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- virtual meter -->
<div class="text" style="left: 675pt !important;top: 17pt;">
    <div>
        <?php if ($GW1_U8_ActivePower_Total_kW == 0 && $GW1_U8_Current_Avg_Amp == 0 && $GW1_U8_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW1_U8_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 670pt !important;top: 38pt;"><a href="meter_diagram_unit2.php?id=T_1&&meter=GW1_U8"><img
            src="assets/images/meter.png" alt="" width="107px" height="101px"></a></div>
<div class="text" style="left: 751pt !important;top: 29pt;">
    <div>
        <div class="rectangle" style="margin-bottom:15px;">
            <!-- <p class="font-features" style="font-size: 20px;width: 140px;color:black"><?php //echo 'Transformer-2' 
                                                                                            ?></p> -->
        </div>
        <div class="rectangle" style="margin-bottom:15px;">
            <p class="font-features" style="font-size: 18px;width: 130px;"><?php echo round($GW1_U8_Voltage_LL_V / 10, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:15px;">
            <p class="font-features" style="font-size: 18px;width: 130px;"><?php echo round($GW1_U8_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:15px;">
            <p class="font-features" style="font-size: 18px;width: 130px;"><?php echo round($GW1_U8_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>

<!-- RO4 -->
<div class="text" style="left: 995pt !important;top: 272pt;">
    <div>
        <?php if ($GW2_U8_ActivePower_Total_kW == 0 && $GW2_U8_Current_Avg_Amp == 0 && $GW2_U8_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW2_U8_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 988pt !important;top: 290pt;"><a href="meter_diagram_unit2.php?id=T_1&&meter=GW2_U8"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 1073pt !important;top: 289pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW2_U8_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW2_U8_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW2_U8_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- RO3 -->
<div class="text" style="left: 796pt !important;top: 272pt;">
    <div>
        <?php if ($GW1_U22_ActivePower_Total_kW == 0 && $GW1_U22_Current_Avg_Amp == 0 && $GW1_U22_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW1_U22_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 790pt !important;top: 290pt;"><a href="meter_diagram_unit2.php?id=T_1&&meter=GW1_U22"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left:876pt !important;top: 289pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U22_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW1_U22_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW1_U22_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- RO2 -->
<div class="text" style="left: 596pt !important;top: 272pt;">
    <div>
        <?php if ($GW2_U10_ActivePower_Total_kW == 0 && $GW2_U10_Current_Avg_Amp == 0 && $GW2_U10_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW2_U10_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left:590pt !important;top: 290pt;"><a href="meter_diagram_unit2.php?id=T_1&&meter=GW2_U10"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left:675pt !important;top: 289pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW2_U10_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW2_U10_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW2_U10_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- RO1 -->
<div class="text" style="left: 396pt !important;top: 272pt;">
    <div>
        <?php if ($GW2_U9_ActivePower_Total_kW == 0 && $GW2_U9_Current_Avg_Amp == 0 && $GW2_U9_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW2_U9_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left:390pt !important;top: 290pt;"><a href="meter_diagram_unit2.php?id=T_1&&meter=GW2_U9"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 475pt !important;top: 289pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW2_U9_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW2_U9_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW2_U9_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- GR7 -->
<div class="text" style="left: 1405pt !important;top: 421pt;">
    <div>
        <?php if ($GW1_U21_ActivePower_Total_kW == 0 && $GW1_U21_Current_Avg_Amp == 0 && $GW1_U21_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW1_U21_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 1397Pt !important;top: 439pt;"><a href="meter_diagram_unit2.php?id=T_2&&meter=GW1_U21"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 1485pt !important;top: 437pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U21_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U21_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW1_U21_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- GR5 -->
<div class="text" style="left: 959pt !important;top: 421pt;">
    <div>
        <?php if ($GW1_U15_ActivePower_Total_kW == 0 && $GW1_U15_Current_Avg_Amp == 0 && $GW1_U15_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW1_U15_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 953Pt !important;top: 439pt;"><a href="meter_diagram_unit2.php?id=T_2&&meter=GW1_U15"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 1040pt !important;top: 437pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U15_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U15_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW1_U15_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- GR4 -->
<div class="text" style="left: 743pt !important;top: 421pt;">
    <div>
        <?php if ($GW1_U16_ActivePower_Total_kW == 0 && $GW1_U16_Current_Avg_Amp == 0 && $GW1_U16_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW1_U16_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 735Pt !important;top: 439pt;"><a href="meter_diagram_unit2.php?id=T_2&&meter=GW1_U16"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 819Pt !important;top: 437pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U16_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U16_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW1_U16_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- GR2 -->
<div class="text" style="left: 302pt !important;top: 421pt;">
    <div>
        <?php if ($GW1_U18_ActivePower_Total_kW == 0 && $GW1_U18_Current_Avg_Amp == 0 && $GW1_U18_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW1_U18_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 296Pt !important;top: 439pt;"><a href="meter_diagram_unit2.php?id=T_2&&meter=GW1_U18"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 380Pt !important;top: 437pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U18_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U18_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW1_U18_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- GR1 -->
<div class="text" style="left: 86pt !important;top: 421pt;">
    <div>
        <?php if ($GW1_U19_ActivePower_Total_kW == 0 && $GW1_U19_Current_Avg_Amp == 0 && $GW1_U19_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW1_U19_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 77Pt !important;top: 439pt;"><a href="meter_diagram_unit2.php?id=T_2&&meter=GW1_U19"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 160Pt !important;top: 437pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U19_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U19_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW1_U19_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- GR3 -->
<div class="text" style="left: 528pt !important;top: 421pt;">
    <div>
        <?php if ($GW1_U17_ActivePower_Total_kW == 0 && $GW1_U17_Current_Avg_Amp == 0 && $GW1_U17_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW1_U17_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 519Pt !important;top: 439pt;"><a href="meter_diagram_unit2.php?id=T_2&&meter=GW1_U17"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 605Pt !important;top: 437pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U17_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U17_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW1_U17_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- GR6 -->
<div class="text" style="left: 1182pt !important;top: 421pt;">
    <div>
        <?php if ($GW1_U20_ActivePower_Total_kW == 0 && $GW1_U20_Current_Avg_Amp == 0 && $GW1_U20_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW1_U20_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 1176Pt !important;top: 439pt;"><a href="meter_diagram_unit2.php?id=T_2&&meter=GW1_U20"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 1261Pt !important;top: 437pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U20_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U20_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW1_U20_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>


<!-- Line 1 -->
<div class="text" style="left: 80pt !important;top: 575pt;">
    <div>
        <?php if ($GW1_U6_ActivePower_Total_kW == 0 && $GW1_U6_Current_Avg_Amp == 0 && $GW1_U6_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW1_U6_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 75Pt !important;top: 593pt;"><a href="meter_diagram_unit2.php?id=T_4&&meter=GW1_U6"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 160Pt !important;top: 592pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U6_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U6_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW1_U6_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- Line 2 -->
<div class="text" style="left: 299pt !important;top: 575pt;">
    <div>
        <?php if ($GW1_U7_ActivePower_Total_kW == 0 && $GW1_U7_Current_Avg_Amp == 0 && $GW1_U7_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW1_U7_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 293Pt !important;top: 593pt;"><a href="meter_diagram_unit2.php?id=T_4&&meter=GW1_U7"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 378Pt !important;top: 592pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U7_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U7_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW1_U7_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>

<!-- line 4 --->
<div class="text" style="left: 736pt !important;top: 575pt;">
    <div>
       
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        
    </div>
</div>
<div class="text" style="left: 730Pt !important;top: 593pt;"><a href="#"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 811Pt !important;top: 592pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo '0' //round($GW2_U2_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo '0' //round($GW2_U2_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo '0' //round($GW2_U2_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- Line 3 --->
<div class="text" style="left: 518pt !important;top: 575pt;">
    <div>
        <?php if ($GW1_U23_ActivePower_Total_kW == 0 && $GW1_U23_Current_Avg_Amp == 0 && $GW1_U23_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW1_U23_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 511Pt !important;top: 593pt;"><a href="meter_diagram_unit2.php?id=T_4&&meter=GW1_U23"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 588Pt !important;top: 592pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round(($GW1_U23_Voltage_LL_V), 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U23_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW1_U23_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- Line 6 --->
<div class="text" style="left: 1182pt !important;top: 575pt;">
    <div>
        <?php if ($GW1_U24_ActivePower_Total_kW == 0 && $GW1_U24_Current_Avg_Amp == 0 && $GW1_U24_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW1_U24_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 1177Pt !important;top: 593pt;"><a href="meter_diagram_unit2.php?id=T_4&&meter=GW1_U24"><img
            src="assets/images/meter.png" alt="" width="90px" height="85px"></a></div>
<div class="text" style="left: 1259Pt !important;top: 592pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round(($GW1_U24_Voltage_LL_V * 10), 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U24_Current_Avg_Amp * 10, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW1_U24_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- Shrink Tunnel -->
<!-- <div class="text" style="left: 537pt !important;top: 443pt">
  <div>
    <img src="assets/images/red.png" style="height: 24px; width: 24px;">
  </div>
</div>
<div class="text" style="left: 591Pt !important;top: 457pt;">
  <div>
    <div class="rectangle" style="margin-bottom:10px;"><p class="font-features">NA V</p></div>
    <div class="rectangle" style="margin-bottom:10px;"><p class="font-features">NA A</p></div>
    <div class="rectangle" style="margin-bottom:10px"><p class="font-features">NA kW</p></div>
  </div>
</div> -->


<!-- Line 5 -->
<div class="text" style="left: 959pt !important;top: 575pt;">
    <div>
        <?php if ($GW3_U2_ActivePower_Total_kW == 0 && $GW3_U2_Current_Avg_Amp == 0 && $GW3_U2_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW3_U2_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 951Pt !important;top: 593pt;"><a href="meter_diagram_unit2.php?id=T_4&&meter=GW3_U2"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 1036Pt !important;top: 592pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW3_U2_Voltage_LL_V * 10, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW3_U2_Current_Avg_Amp * 10, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW3_U2_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- Line 8 -->
<div class="text" style="left: 1401pt !important;top: 575pt;">
    <div>
        <?php if ($GW3_U6_ActivePower_Total_kW == 0 && $GW3_U6_Current_Avg_Amp == 0 && $GW3_U6_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW3_U6_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 1393pt !important;top: 593pt;"><a href="meter_diagram_unit2.php?id=T_4&&meter=GW3_U6"><img
            src="assets/images/meter.png" alt="" width="90px" height="85px"></a></div>
<div class="text" style="left: 1477Pt !important;top: 571pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;width:120px;">
            <p class="font-features" style="font-size:16px"><?php //echo "(Out of Order)"
                                                            ?></p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW3_U6_Voltage_LL_V * 10, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW3_U6_Current_Avg_Amp * 10, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW3_U6_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- Hpac 2 -->
<div class="text" style="left: 1186pt !important;top: 729pt;">
    <div>
        <?php if ($GW2_U4_ActivePower_Total_kW == 0 && $GW2_U4_Current_Avg_Amp == 0 && $GW2_U4_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW2_U4_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 1177Pt !important;top: 747pt;"><a href="meter_diagram_unit2.php?id=T_6&&meter=GW2_U4"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 1261Pt !important;top: 745pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW2_U4_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW2_U4_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW2_U4_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>

<!-- HPAC 1 --->
<div class="text" style="left: 958pt !important;top: 729pt;">
    <div>
        <?php if ($GW2_U3_ActivePower_Total_kW == 0 && $GW2_U3_Current_Avg_Amp == 0 && $GW2_U3_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW2_U3_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 951Pt !important;top: 747pt;"><a href="meter_diagram_unit2.php?id=T_6&&meter=GW2_U3"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 1035Pt !important;top: 745pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW2_U3_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW2_U3_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW2_U3_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- HPAC3 --->
<div class="text" style="left: 1402pt !important;top: 729pt;">
    <div>
    <?php if ($GW2_U2_ActivePower_Total_kW == 0 && $GW2_U2_Current_Avg_Amp == 0 && $GW2_U2_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW2_U2_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 1393Pt !important;top: 747pt;"><a href="meter_diagram_unit2.php?id=T_4&&meter=GW2_U2"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 1480Pt !important;top: 745pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW2_U2_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW2_U2_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW2_U2_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>

<!-- LPAC 1 -->
<div class="text" style="left: 81pt !important;top: 729pt;">
    <div>
        <?php if ($GW2_U12_ActivePower_Total_kW == 0 && $GW2_U12_Current_Avg_Amp == 0 && $GW2_U12_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW2_U12_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 76Pt !important;top: 747pt;"><a href="meter_diagram_unit2.php?id=T_5&&meter=GW2_U12"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 160Pt !important;top: 745pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW2_U12_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:12px;">
            <p class="font-features"><?php echo round($GW2_U12_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW2_U12_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- LPAC 2 -->
<div class="text" style="left: 302pt !important;top: 729pt;">
    <div>
        <?php if ($GW2_U11_ActivePower_Total_kW == 0 && $GW2_U11_Current_Avg_Amp == 0 && $GW2_U11_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW2_U11_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 293Pt !important;top: 747pt;"><a href="meter_diagram_unit2.php?id=T_5&&meter=GW2_U11"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 377Pt !important;top: 745pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW2_U11_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:12px;">
            <p class="font-features"><?php echo round($GW2_U11_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW2_U11_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- LPAC 3 -->
<div class="text" style="left: 519pt !important;top: 729pt;">
    <div>
        <?php if ($GW2_U14_ActivePower_Total_kW == 0 && $GW2_U14_Current_Avg_Amp == 0 && $GW2_U14_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW2_U14_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 512Pt !important;top: 747pt;"><a href="meter_diagram_unit2.php?id=T_5&&meter=GW2_U14"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 598Pt !important;top: 745pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW2_U14_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:12px;">
            <p class="font-features"><?php echo round($GW2_U14_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW2_U14_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- LPAC 4 -->
<div class="text" style="left: 737pt !important;top: 729pt;">
    <div>
        <?php if ($GW2_U13_ActivePower_Total_kW == 0 && $GW2_U13_Current_Avg_Amp == 0 && $GW2_U13_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW2_U13_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 730Pt !important;top: 747pt;"><a href="meter_diagram_unit2.php?id=T_5&&meter=GW2_U13"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 814Pt !important;top: 745pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW2_U13_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:12px;">
            <p class="font-features"><?php echo round($GW2_U13_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW2_U13_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>


<!-- syrup room l4-->
<div class="text" style="left: 302pt !important;top: 888pt;">
    <div>
        <?php if ($GW1_U2_ActivePower_Total_kW == 0 && $GW1_U2_Current_Avg_Amp == 0 && $GW1_U2_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW1_U2_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 294Pt !important;top: 906pt;"><a href="meter_diagram_unit2.php?id=T_3&&meter=GW1_U2"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 378pt !important;top: 904pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U2_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U2_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW1_U2_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- juice room l3 -->
<div class="text" style="left: 519pt !important;top: 888pt;">
    <div>
        <?php if ($GW1_U3_ActivePower_Total_kW == 0 && $GW1_U3_Current_Avg_Amp == 0 && $GW1_U3_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW1_U3_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 513Pt !important;top: 906pt;"><a href="meter_diagram_unit2.php?id=T_3&&meter=GW1_U3"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 598Pt !important;top: 904pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U3_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U3_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW1_U3_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- new boiler -->
<div class="text" style="left: 81pt !important;top: 888pt;">
    <div>
        <?php if ($GW1_U4_ActivePower_Total_kW == 0 && $GW1_U4_Current_Avg_Amp == 0 && $GW1_U4_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW1_U4_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 77Pt !important;top: 906pt;"><a href="meter_diagram_unit2.php?id=T_3&&meter=GW1_U4"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 164pt !important;top: 904pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U4_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U4_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW1_U4_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- Sugar room -->
<div class="text" style="left: 727pt !important;top: 888pt;">
    <div>
        <?php if ($GW1_U5_ActivePower_Total_kW == 0 && $GW1_U5_Current_Avg_Amp == 0 && $GW1_U5_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW1_U5_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 730Pt !important;top: 906pt;"><a href="meter_diagram_unit2.php?id=T_3&&meter=GW1_U5"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 814Pt !important;top: 904pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U5_Voltage_LL_V, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW1_U5_Current_Avg_Amp, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW1_U5_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- Syrup room -->
<div class="text" style="left: 960pt !important;top: 888pt;">
    <div>
        <?php if ($GW3_U3_ActivePower_Total_kW == 0 && $GW3_U3_Current_Avg_Amp == 0 && $GW3_U3_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW3_U3_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 952Pt !important;top: 905pt;"><a href="meter_diagram_unit2.php?id=T_3&&meter=GW3_U3"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 1034Pt !important;top: 904pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW3_U3_Voltage_LL_V * 10, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW3_U3_Current_Avg_Amp * 10, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW3_U3_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- Sugar dissolving -->
<div class="text" style="left: 1175pt !important;top: 888pt;">
    <div>
        <?php if ($GW3_U4_ActivePower_Total_kW == 0 && $GW3_U4_Current_Avg_Amp == 0 && $GW3_U4_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW3_U4_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 1178Pt !important;top: 906pt;"><a href="meter_diagram_unit2.php?id=T_3&&meter=GW3_U4"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 1258Pt !important;top: 904pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW3_U4_Voltage_LL_V * 10, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW3_U4_Current_Avg_Amp * 10, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW3_U4_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>
<!-- Shrink tunnel -->
<div class="text" style="left: 1402pt !important;top: 888pt;">
    <div>
        <?php if ($GW3_U5_ActivePower_Total_kW == 0 && $GW3_U5_Current_Avg_Amp == 0 && $GW3_U5_Voltage_LL_V == 0) { ?>
            <img src="assets/images/red.png" style="height: 24px; width: 24px;">
        <?php } elseif ($GW3_U5_ActivePower_Total_kW == 0) { ?>
            <img src="assets/images/yell.png" style="height: 24px; width: 24px;">
        <?php } else { ?>
            <img src="assets/images/green.png" style="height: 24px; width: 24px;">
        <?php } ?>
    </div>
</div>
<div class="text" style="left: 1393Pt !important;top: 906pt;"><a href="meter_diagram_unit2.php?id=T_3&&meter=GW3_U5"><img
            src="assets/images/meter.png" alt=""></a></div>
<div class="text" style="left: 1480Pt !important;top: 904pt;">
    <div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW3_U5_Voltage_LL_V * 10, 2); ?> V</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px;">
            <p class="font-features"><?php echo round($GW3_U5_Current_Avg_Amp * 10, 2); ?> A</p>
        </div>
        <div class="rectangle" style="margin-bottom:10px">
            <p class="font-features"><?php echo round($GW3_U5_ActivePower_Total_kW, 2); ?> kW</p>
        </div>
    </div>
</div>