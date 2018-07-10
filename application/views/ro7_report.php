<?php
require_once('pdf/tcpdf/examples/tcpdf_include.php');

$month = array('January','Febuary','March','April','May','June','July','August','September','October','November','December');
$division = array('msd','lhsd','rled','rd-ard');
$status = array('internal','external','total');
$value = array(array('January','Febuary','March','April','May','June','July','August','September','October','November','December'),array('msd','lhsd','rled','rd-ard'),array('internal','external','total'));
$msd_count = 0;
$lhsd_count = 0;
$rled_count = 0;
$rd_ard_count = 0;
$total_count = 0;
    foreach($_SESSION['css_report'] as $row){
        $total_count++;
        if($row['division'] == 'MSD') {
            $msd_count++;
            if ($row['month'] == 'January') {
                if ($row['cssstat'] == 'yes') {
                    $value['January']['msd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['January']['msd']['external']++;
                }
                $value['January']['msd']['total']++;
            }
            elseif ($row['month'] == 'Febuary') {
                if ($row['cssstat'] == 'yes') {
                    $value['Febuary']['msd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['Febuary']['msd']['external']++;
                }
                $value['Febuary']['msd']['total']++;
            }
            elseif ($row['month'] == 'March') {
                if ($row['cssstat'] == 'yes') {
                    $value['March']['msd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['March']['msd']['external']++;
                }

                $value['March']['msd']['total']++;
            }
            else if ($row['month'] == 'April') {
                if ($row['cssstat'] == 'yes') {
                    $value['April']['msd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['April']['msd']['external']++;
                }

                $value['April']['msd']['total']++;
            }
            else if ($row['month'] == 'May') {
                if ($row['cssstat'] == 'yes') {
                    $value['May']['msd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['May']['msd']['external']++;
                }
                $value['May']['msd']['total']++;
            }
            else if ($row['month'] == 'June') {
                if ($row['cssstat'] == 'yes') {
                    $value['June']['msd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['June']['msd']['external']++;
                }

                $value['June']['msd']['total']++;
            }
            else if ($row['month'] == 'July') {
                if ($row['cssstat'] == 'yes') {
                    $value['July']['msd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['July']['msd']['external']++;
                }

                $value['July']['msd']['total']++;
            }
            else if ($row['month'] == 'August') {
                if ($row['cssstat'] == 'yes') {
                    $value['August']['msd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['August']['msd']['external']++;
                }
                $value['August']['msd']['total']++;
            }
            else if ($row['month'] == 'September') {
                if ($row['cssstat'] == 'yes') {
                    $value['September']['msd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['September']['msd']['external']++;
                }

                $value['September']['msd']['total']++;
            }
            else if ($row['month'] == 'October') {
                if ($row['cssstat'] == 'yes') {
                    $value['October']['msd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['October']['msd']['external']++;
                }

                $value['October']['msd']['total']++;
            }
            else if ($row['month'] == 'November') {
                if ($row['cssstat'] == 'yes') {
                    $value['November']['msd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['November']['msd']['external']++;
                }

                $value['November']['msd']['total']++;
            }
            else if ($row['month'] == 'December') {
                if ($row['cssstat'] == 'yes') {
                    $value['December']['msd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['December']['msd']['external']++;
                }
                $value['December']['msd']['total']++;
            }
        }

        elseif($row['division'] == 'LHSD') {
            $lhsd_count++;
            if ($row['month'] == 'January') {
                if ($row['cssstat'] == 'yes') {
                    $value['January']['lhsd']['internal']++;
                }
                if (!isset($value['January']['lhsd']['internal']))
                    $value['January']['lhsd']['internal'] = 0;

                if ($row['cssstat'] == 'no') {
                    $value['January']['lhsd']['external']++;
                }
                if (!isset($value['January']['lhsd']['external']))
                    $value['January']['lhsd']['external'] = 0;

                if (!isset($value['January']['lhsd']['total']))
                    $value['January']['lhsd']['total'] = 0;

                $value['January']['lhsd']['total']++;
            }
            elseif ($row['month'] == 'Febuary') {
                if ($row['cssstat'] == 'yes') {
                    $value['Febuary']['lhsd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['Febuary']['lhsd']['external']++;
                }

                $value['Febuary']['lhsd']['total']++;
            }
            elseif ($row['month'] == 'March') {
                if ($row['cssstat'] == 'yes') {
                    $value['March']['lhsd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['March']['lhsd']['external']++;
                }

                $value['March']['lhsd']['total']++;
            }
            else if ($row['month'] == 'April') {
                if ($row['cssstat'] == 'yes') {
                    $value['April']['lhsd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['April']['lhsd']['external']++;
                }

                $value['April']['lhsd']['total']++;
            }
            else if ($row['month'] == 'May') {
                if ($row['cssstat'] == 'yes') {
                    $value['May']['lhsd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['May']['lhsd']['external']++;
                }

                $value['May']['lhsd']['total']++;
            }
            else if ($row['month'] == 'June') {
                if ($row['cssstat'] == 'yes') {
                    $value['June']['lhsd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['June']['lhsd']['external']++;
                }

                $value['June']['lhsd']['total']++;
            }
            else if ($row['month'] == 'July') {
                if ($row['cssstat'] == 'yes') {
                    $value['July']['lhsd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['July']['lhsd']['external']++;
                }

                $value['July']['lhsd']['total']++;
            }
            else if ($row['month'] == 'August') {
                if ($row['cssstat'] == 'yes') {
                    $value['August']['lhsd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['August']['lhsd']['external']++;
                }

                $value['August']['lhsd']['total']++;
            }
            else if ($row['month'] == 'September') {
                if ($row['cssstat'] == 'yes') {
                    $value['September']['lhsd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['September']['lhsd']['external']++;
                }
                $value['September']['lhsd']['total']++;
            }
            else if ($row['month'] == 'October') {
                if ($row['cssstat'] == 'yes') {
                    $value['October']['lhsd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['October']['lhsd']['external']++;
                }

                $value['October']['lhsd']['total']++;
            }
            else if ($row['month'] == 'November') {
                if ($row['cssstat'] == 'yes') {
                    $value['November']['lhsd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['November']['lhsd']['external']++;
                }

                $value['November']['lhsd']['total']++;
            }
            else if ($row['month'] == 'December') {
                if ($row['cssstat'] == 'yes') {
                    $value['December']['lhsd']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['December']['lhsd']['external']++;
                }

                $value['December']['lhsd']['total']++;
            }
        }

        elseif($row['division'] == 'RLED') {
            $rled_count++;
            if ($row['month'] == 'January') {
                if ($row['cssstat'] == 'yes') {
                    $value['January']['rled']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['January']['rled']['external']++;
                }
                $value['January']['rled']['total']++;
            }
            elseif ($row['month'] == 'Febuary') {
                if ($row['cssstat'] == 'yes') {
                    $value['Febuary']['rled']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['Febuary']['rled']['external']++;
                }
                $value['Febuary']['rled']['total']++;
            }
            elseif ($row['month'] == 'March') {
                if ($row['cssstat'] == 'yes') {
                    $value['March']['rled']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['March']['rled']['external']++;
                }

                $value['March']['rled']['total']++;
            }
            else if ($row['month'] == 'April') {
                if ($row['cssstat'] == 'yes') {
                    $value['April']['rled']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['April']['rled']['external']++;
                }

                $value['April']['rled']['total']++;
            }
            else if ($row['month'] == 'May') {
                if ($row['cssstat'] == 'yes') {
                    $value['May']['rled']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['May']['rled']['external']++;
                }

                $value['May']['rled']['total']++;
            }
            else if ($row['month'] == 'June') {
                if ($row['cssstat'] == 'yes') {
                    $value['June']['rled']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['June']['rled']['external']++;
                }

                $value['June']['rled']['total']++;
            }
            else if ($row['month'] == 'July') {
                if ($row['cssstat'] == 'yes') {
                    $value['July']['rled']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['July']['rled']['external']++;
                }

                $value['July']['rled']['total']++;
            }
            else if ($row['month'] == 'August') {
                if ($row['cssstat'] == 'yes') {
                    $value['August']['rled']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['August']['rled']['external']++;
                }

                $value['August']['rled']['total']++;
            }
            else if ($row['month'] == 'September') {
                if ($row['cssstat'] == 'yes') {
                    $value['September']['rled']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['September']['rled']['external']++;
                }
                $value['September']['rled']['total']++;
            }
            else if ($row['month'] == 'October') {
                if ($row['cssstat'] == 'yes') {
                    $value['October']['rled']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['October']['rled']['external']++;
                }

                $value['October']['rled']['total']++;
            }
            else if ($row['month'] == 'November') {
                if ($row['cssstat'] == 'yes') {
                    $value['November']['rled']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['November']['rled']['external']++;
                }

                $value['November']['rled']['total']++;
            }
            else if ($row['month'] == 'December') {
                if ($row['cssstat'] == 'yes') {
                    $value['December']['rled']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['December']['rled']['external']++;
                }

                $value['December']['rled']['total']++;
            }
        }


        elseif($row['division'] == 'RD-ARD') {
            $rd_ard_count++;
            if ($row['month'] == 'January') {
                if ($row['cssstat'] == 'yes') {
                    $value['January']['rd-ard']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['January']['rd-ard']['external']++;
                }
                $value['January']['rd-ard']['total']++;
            }
            elseif ($row['month'] == 'Febuary') {
                if ($row['cssstat'] == 'yes') {
                    $value['Febuary']['rd-ard']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['Febuary']['rd-ard']['external']++;
                }
                $value['Febuary']['rd-ard']['total']++;
            }
            elseif ($row['month'] == 'March') {
                if ($row['cssstat'] == 'yes') {
                    $value['March']['rd-ard']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['March']['rd-ard']['external']++;
                }
                $value['March']['rd-ard']['total']++;
            }
            else if ($row['month'] == 'April') {
                if ($row['cssstat'] == 'yes') {
                    $value['April']['rd-ard']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['April']['rd-ard']['external']++;
                }

                $value['April']['rd-ard']['total']++;
            }
            else if ($row['month'] == 'May') {
                if ($row['cssstat'] == 'yes') {
                    $value['May']['rd-ard']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['May']['rd-ard']['external']++;
                }
                $value['May']['rd-ard']['total']++;
            }
            else if ($row['month'] == 'June') {
                if ($row['cssstat'] == 'yes') {
                    $value['June']['rd-ard']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['June']['rd-ard']['external']++;
                }

                $value['June']['rd-ard']['total']++;
            }
            else if ($row['month'] == 'July') {
                if ($row['cssstat'] == 'yes') {
                    $value['July']['rd-ard']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['July']['rd-ard']['external']++;
                }

                $value['July']['rd-ard']['total']++;
            }
            else if ($row['month'] == 'August') {
                if ($row['cssstat'] == 'yes') {
                    $value['August']['rd-ard']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['August']['rd-ard']['external']++;
                }
                $value['August']['rd-ard']['total']++;
            }
            else if ($row['month'] == 'September') {
                if ($row['cssstat'] == 'yes') {
                    $value['September']['rd-ard']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['September']['rd-ard']['external']++;
                }

                $value['September']['rd-ard']['total']++;
            }
            else if ($row['month'] == 'October') {
                if ($row['cssstat'] == 'yes') {
                    $value['October']['rd-ard']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['October']['rd-ard']['external']++;
                }
                $value['October']['rd-ard']['total']++;
            }
            else if ($row['month'] == 'November') {
                if ($row['cssstat'] == 'yes') {
                    $value['November']['rd-ard']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['November']['rd-ard']['external']++;
                }
                $value['November']['rd-ard']['total']++;
            }
            else if ($row['month'] == 'December') {
                if ($row['cssstat'] == 'yes') {
                    $value['December']['rd-ard']['internal']++;
                }
                if ($row['cssstat'] == 'no') {
                    $value['December']['rd-ard']['external']++;
                }

                $value['December']['rd-ard']['total']++;
            }
        }
    }

    if (!isset($value['January']['msd']['internal']))
        $value['January']['msd']['internal'] = 0;
    if (!isset($value['January']['msd']['external']))
        $value['January']['msd']['external'] = 0;
    if (!isset($value['January']['msd']['total']))
        $value['January']['msd']['total'] = 0;
    if (!isset($value['Febuary']['msd']['internal']))
        $value['Febuary']['msd']['internal'] = 0;
    if (!isset($value['Febuary']['msd']['external']))
        $value['Febuary']['msd']['external'] = 0;
    if (!isset($value['Febuary']['msd']['total']))
        $value['Febuary']['msd']['total'] = 0;
    if (!isset($value['March']['msd']['internal']))
        $value['March']['msd']['internal'] = 0;
    if (!isset($value['March']['msd']['external']))
        $value['March']['msd']['external'] = 0;
    if (!isset($value['March']['msd']['total']))
        $value['March']['msd']['total'] = 0;
    if (!isset($value['April']['msd']['internal']))
        $value['April']['msd']['internal'] = 0;
    if (!isset($value['April']['msd']['external']))
        $value['April']['msd']['external'] = 0;
    if (!isset($value['April']['msd']['total']))
        $value['April']['msd']['total'] = 0;
    if (!isset($value['May']['msd']['internal']))
        $value['May']['msd']['internal'] = 0;
    if (!isset($value['May']['msd']['external']))
        $value['May']['msd']['external'] = 0;
    if (!isset($value['May']['msd']['total']))
        $value['May']['msd']['total'] = 0;
    if (!isset($value['June']['msd']['internal']))
        $value['June']['msd']['internal'] = 0;
    if (!isset($value['June']['msd']['external']))
        $value['June']['msd']['external'] = 0;
    if (!isset($value['June']['msd']['total']))
        $value['June']['msd']['total'] = 0;
    if (!isset($value['July']['msd']['internal']))
        $value['July']['msd']['internal'] = 0;
    if (!isset($value['July']['msd']['external']))
        $value['July']['msd']['external'] = 0;
    if (!isset($value['July']['msd']['total']))
        $value['July']['msd']['total'] = 0;
    if (!isset($value['August']['msd']['internal']))
        $value['August']['msd']['internal'] = 0;
    if (!isset($value['August']['msd']['external']))
        $value['August']['msd']['external'] = 0;
    if (!isset($value['August']['msd']['total']))
        $value['August']['msd']['total'] = 0;
    if (!isset($value['September']['msd']['internal']))
        $value['September']['msd']['internal'] = 0;
    if (!isset($value['September']['msd']['external']))
        $value['September']['msd']['external'] = 0;
    if (!isset($value['September']['msd']['total']))
        $value['September']['msd']['total'] = 0;
    if (!isset($value['October']['msd']['internal']))
        $value['October']['msd']['internal'] = 0;
    if (!isset($value['October']['msd']['external']))
        $value['October']['msd']['external'] = 0;
    if (!isset($value['October']['msd']['total']))
        $value['October']['msd']['total'] = 0;
    if (!isset($value['November']['msd']['internal']))
        $value['November']['msd']['internal'] = 0;
    if (!isset($value['November']['msd']['external']))
        $value['November']['msd']['external'] = 0;
    if (!isset($value['November']['msd']['total']))
        $value['November']['msd']['total'] = 0;
    if (!isset($value['December']['msd']['internal']))
        $value['December']['msd']['internal'] = 0;
    if (!isset($value['December']['msd']['external']))
        $value['December']['msd']['external'] = 0;
    if (!isset($value['December']['msd']['total']))
        $value['December']['msd']['total'] = 0;


    if (!isset($value['Febuary']['lhsd']['internal']))
        $value['Febuary']['lhsd']['internal'] = 0;
    if (!isset($value['Febuary']['lhsd']['external']))
        $value['Febuary']['lhsd']['external'] = 0;
    if (!isset($value['Febuary']['lhsd']['total']))
        $value['Febuary']['lhsd']['total'] = 0;
    if (!isset($value['March']['lhsd']['internal']))
        $value['March']['lhsd']['internal'] = 0;
    if (!isset($value['March']['lhsd']['external']))
        $value['March']['lhsd']['external'] = 0;
    if (!isset($value['March']['lhsd']['total']))
        $value['March']['lhsd']['total'] = 0;
    if (!isset($value['April']['lhsd']['internal']))
        $value['April']['lhsd']['internal'] = 0;
    if (!isset($value['April']['lhsd']['external']))
        $value['April']['lhsd']['external'] = 0;
    if (!isset($value['April']['lhsd']['total']))
        $value['April']['lhsd']['total'] = 0;
    if (!isset($value['May']['lhsd']['internal']))
        $value['May']['lhsd']['internal'] = 0;
    if (!isset($value['May']['lhsd']['external']))
        $value['May']['lhsd']['external'] = 0;
    if (!isset($value['May']['lhsd']['total']))
        $value['May']['lhsd']['total'] = 0;
    if (!isset($value['June']['lhsd']['internal']))
        $value['June']['lhsd']['internal'] = 0;
    if (!isset($value['June']['lhsd']['external']))
        $value['June']['lhsd']['external'] = 0;
    if (!isset($value['June']['lhsd']['total']))
        $value['June']['lhsd']['total'] = 0;
    if (!isset($value['July']['lhsd']['internal']))
        $value['July']['lhsd']['internal'] = 0;
    if (!isset($value['July']['lhsd']['external']))
        $value['July']['lhsd']['external'] = 0;
    if (!isset($value['July']['lhsd']['total']))
        $value['July']['lhsd']['total'] = 0;
    if (!isset($value['August']['lhsd']['internal']))
        $value['August']['lhsd']['internal'] = 0;
    if (!isset($value['August']['lhsd']['external']))
        $value['August']['lhsd']['external'] = 0;
    if (!isset($value['August']['lhsd']['total']))
        $value['August']['lhsd']['total'] = 0;
    if (!isset($value['September']['lhsd']['internal']))
        $value['September']['lhsd']['internal'] = 0;
    if (!isset($value['September']['lhsd']['external']))
        $value['September']['lhsd']['external'] = 0;
    if (!isset($value['September']['lhsd']['total']))
        $value['September']['lhsd']['total'] = 0;
    if (!isset($value['October']['lhsd']['internal']))
        $value['October']['lhsd']['internal'] = 0;
    if (!isset($value['October']['lhsd']['external']))
        $value['October']['lhsd']['external'] = 0;
    if (!isset($value['October']['lhsd']['total']))
        $value['October']['lhsd']['total'] = 0;
    if (!isset($value['November']['lhsd']['internal']))
        $value['November']['lhsd']['internal'] = 0;
    if (!isset($value['November']['lhsd']['external']))
        $value['November']['lhsd']['external'] = 0;
    if (!isset($value['November']['lhsd']['total']))
        $value['November']['lhsd']['total'] = 0;
    if (!isset($value['December']['lhsd']['internal']))
        $value['December']['lhsd']['internal'] = 0;
    if (!isset($value['December']['lhsd']['external']))
        $value['December']['lhsd']['external'] = 0;
    if (!isset($value['December']['lhsd']['total']))
        $value['December']['lhsd']['total'] = 0;


    if (!isset($value['January']['rled']['internal']))
        $value['January']['rled']['internal'] = 0;
    if (!isset($value['January']['rled']['external']))
        $value['January']['rled']['external'] = 0;
    if (!isset($value['January']['rled']['total']))
        $value['January']['rled']['total'] = 0;
    if (!isset($value['Febuary']['rled']['internal']))
        $value['Febuary']['rled']['internal'] = 0;
    if (!isset($value['Febuary']['rled']['external']))
        $value['Febuary']['rled']['external'] = 0;
    if (!isset($value['Febuary']['rled']['total']))
        $value['Febuary']['rled']['total'] = 0;
    if (!isset($value['March']['rled']['internal']))
        $value['March']['rled']['internal'] = 0;
    if (!isset($value['March']['rled']['external']))
        $value['March']['rled']['external'] = 0;
    if (!isset($value['March']['rled']['total']))
        $value['March']['rled']['total'] = 0;
    if (!isset($value['April']['rled']['internal']))
        $value['April']['rled']['internal'] = 0;
    if (!isset($value['April']['rled']['external']))
        $value['April']['rled']['external'] = 0;
    if (!isset($value['April']['rled']['total']))
        $value['April']['rled']['total'] = 0;
    if (!isset($value['May']['rled']['internal']))
        $value['May']['rled']['internal'] = 0;
    if (!isset($value['May']['rled']['external']))
        $value['May']['rled']['external'] = 0;
    if (!isset($value['May']['rled']['total']))
        $value['May']['rled']['total'] = 0;
    if (!isset($value['June']['rled']['internal']))
        $value['June']['rled']['internal'] = 0;
    if (!isset($value['June']['rled']['external']))
        $value['June']['rled']['external'] = 0;
    if (!isset($value['June']['rled']['total']))
        $value['June']['rled']['total'] = 0;
    if (!isset($value['July']['rled']['internal']))
        $value['July']['rled']['internal'] = 0;
    if (!isset($value['July']['rled']['external']))
        $value['July']['rled']['external'] = 0;
    if (!isset($value['July']['rled']['total']))
        $value['July']['rled']['total'] = 0;
    if (!isset($value['August']['rled']['internal']))
        $value['August']['rled']['internal'] = 0;
    if (!isset($value['August']['rled']['external']))
        $value['August']['rled']['external'] = 0;
    if (!isset($value['August']['rled']['total']))
        $value['August']['rled']['total'] = 0;
    if (!isset($value['September']['rled']['internal']))
        $value['September']['rled']['internal'] = 0;
    if (!isset($value['September']['rled']['external']))
        $value['September']['rled']['external'] = 0;
    if (!isset($value['September']['rled']['total']))
        $value['September']['rled']['total'] = 0;
    if (!isset($value['October']['rled']['internal']))
        $value['October']['rled']['internal'] = 0;
    if (!isset($value['October']['rled']['external']))
        $value['October']['rled']['external'] = 0;
    if (!isset($value['October']['rled']['total']))
        $value['October']['rled']['total'] = 0;
    if (!isset($value['November']['rled']['internal']))
        $value['November']['rled']['internal'] = 0;
    if (!isset($value['November']['rled']['external']))
        $value['November']['rled']['external'] = 0;
    if (!isset($value['November']['rled']['total']))
        $value['November']['rled']['total'] = 0;
    if (!isset($value['December']['rled']['internal']))
        $value['December']['rled']['internal'] = 0;
    if (!isset($value['December']['rled']['external']))
        $value['December']['rled']['external'] = 0;
    if (!isset($value['December']['rled']['total']))
        $value['December']['rled']['total'] = 0;

    if (!isset($value['January']['rd-ard']['internal']))
        $value['January']['rd-ard']['internal'] = 0;
    if (!isset($value['January']['rd-ard']['external']))
        $value['January']['rd-ard']['external'] = 0;
    if (!isset($value['January']['rd-ard']['total']))
        $value['January']['rd-ard']['total'] = 0;
    if (!isset($value['Febuary']['rd-ard']['internal']))
        $value['Febuary']['rd-ard']['internal'] = 0;
    if (!isset($value['Febuary']['rd-ard']['external']))
        $value['Febuary']['rd-ard']['external'] = 0;
    if (!isset($value['Febuary']['rd-ard']['total']))
        $value['Febuary']['rd-ard']['total'] = 0;
    if (!isset($value['March']['rd-ard']['internal']))
        $value['March']['rd-ard']['internal'] = 0;
    if (!isset($value['March']['rd-ard']['external']))
        $value['March']['rd-ard']['external'] = 0;
    if (!isset($value['March']['rd-ard']['total']))
        $value['March']['rd-ard']['total'] = 0;
    if (!isset($value['April']['rd-ard']['internal']))
        $value['April']['rd-ard']['internal'] = 0;
    if (!isset($value['April']['rd-ard']['external']))
        $value['April']['rd-ard']['external'] = 0;
    if (!isset($value['April']['rd-ard']['total']))
        $value['April']['rd-ard']['total'] = 0;
    if (!isset($value['May']['rd-ard']['internal']))
        $value['May']['rd-ard']['internal'] = 0;
    if (!isset($value['May']['rd-ard']['external']))
        $value['May']['rd-ard']['external'] = 0;
    if (!isset($value['May']['rd-ard']['total']))
        $value['May']['rd-ard']['total'] = 0;
    if (!isset($value['June']['rd-ard']['internal']))
        $value['June']['rd-ard']['internal'] = 0;
    if (!isset($value['June']['rd-ard']['external']))
        $value['June']['rd-ard']['external'] = 0;
    if (!isset($value['June']['rd-ard']['total']))
        $value['June']['rd-ard']['total'] = 0;
    if (!isset($value['July']['rd-ard']['internal']))
        $value['July']['rd-ard']['internal'] = 0;
    if (!isset($value['July']['rd-ard']['external']))
        $value['July']['rd-ard']['external'] = 0;
    if (!isset($value['July']['rd-ard']['total']))
        $value['July']['rd-ard']['total'] = 0;
    if (!isset($value['August']['rd-ard']['internal']))
        $value['August']['rd-ard']['internal'] = 0;
    if (!isset($value['August']['rd-ard']['external']))
        $value['August']['rd-ard']['external'] = 0;
    if (!isset($value['August']['rd-ard']['total']))
        $value['August']['rd-ard']['total'] = 0;
    if (!isset($value['September']['rd-ard']['internal']))
        $value['September']['rd-ard']['internal'] = 0;
    if (!isset($value['September']['rd-ard']['external']))
        $value['September']['rd-ard']['external'] = 0;
    if (!isset($value['September']['rd-ard']['total']))
        $value['September']['rd-ard']['total'] = 0;
    if (!isset($value['October']['rd-ard']['internal']))
        $value['October']['rd-ard']['internal'] = 0;
    if (!isset($value['October']['rd-ard']['external']))
        $value['October']['rd-ard']['external'] = 0;
    if (!isset($value['October']['rd-ard']['total']))
        $value['October']['rd-ard']['total'] = 0;
    if (!isset($value['November']['rd-ard']['internal']))
        $value['November']['rd-ard']['internal'] = 0;
    if (!isset($value['November']['rd-ard']['external']))
        $value['November']['rd-ard']['external'] = 0;
    if (!isset($value['November']['rd-ard']['total']))
        $value['November']['rd-ard']['total'] = 0;
    if (!isset($value['December']['rd-ard']['internal']))
        $value['December']['rd-ard']['internal'] = 0;
    if (!isset($value['December']['rd-ard']['external']))
        $value['December']['rd-ard']['external'] = 0;
    if (!isset($value['December']['rd-ard']['total']))
        $value['December']['rd-ard']['total'] = 0;


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Customer Satisfactory Survey');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,PDF_HEADER_TITLE.' Regional Office VII', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 12);

// add a page
$pdf->AddPage();
$year = $_SESSION['year'];
$title = <<<EOD
    <table cellspacing="0" cellpadding="1" border="0">
        <tr>
            <td align="center">
                DOH RO7 CSS REPORT FOR CY - $year<br>
                (Number of Respondent)
            </td>
        </tr>
    </table>
EOD;
$pdf->writeHTML($title, true, false, false, false, '');

$pdf->SetFont('helvetica', '', 8);
// -----------------------------------------------------------------------------
$table =
    '
    <style>
        td {
            text-align: center;
        }
    </style>
    <table cellspacing="1" cellpadding="5" border="1">
        <tr>
            <td style="background-color:lightgreen" rowspan="2" align="center" width="9%"><b>Montht</b></td>
            <td colspan="3" style="background-color:pink"><b>MSD</b></td>
            <td colspan="3" style="background-color:lightblue"><b>LHSD</b></td>
            <td colspan="3" style="background-color:lightyellow"><b>RLED</b></td>
            <td colspan="3" style="background-color:orange"><b>RD-ARD</b></td>
        </tr>
        <tr>
            <td>Internal</td>
            <td>External</td>
            <td style="background-color:pink">Total</td>
            <td>Internal</td>
            <td>External</td>
            <td style="background-color:lightblue">Total</td>
            <td>Internal</td>
            <td>External</td>
            <td style="background-color:lightyellow">Total</td>
            <td>Internal</td>
            <td>External</td>
            <td style="background-color:orange">Total</td>
        </tr>
        <tr>
            <td align="left">January</td>
            <td>'.$value['January']['msd']['internal'].'</td>
            <td>'.$value['January']['msd']['external'].'</td>
            <td style="background-color:pink">'.$value['January']['msd']['total'].'</td>
            <td>'.$value['January']['lhsd']['internal'].'</td>
            <td>'.$value['January']['lhsd']['external'].'</td>
            <td style="background-color:lightblue">'.$value['January']['lhsd']['total'].'</td>
            <td>'.$value['January']['rled']['internal'].'</td>
            <td>'.$value['January']['rled']['external'].'</td>
            <td style="background-color:lightyellow">'.$value['January']['rled']['total'].'</td>
            <td>'.$value['January']['rd-ard']['internal'].'</td>
            <td>'.$value['January']['rd-ard']['external'].'</td>
            <td style="background-color:orange">'.$value['January']['rd-ard']['total'].'</td>
        </tr>
        <tr>
            <td align="left">February</td>
            <td>'.$value['Febuary']['msd']['internal'].'</td>
            <td>'.$value['Febuary']['msd']['external'].'</td>
            <td style="background-color:pink">'.$value['Febuary']['msd']['total'].'</td>
            <td>'.$value['Febuary']['lhsd']['internal'].'</td>
            <td>'.$value['Febuary']['lhsd']['external'].'</td>
            <td style="background-color:lightblue">'.$value['Febuary']['lhsd']['total'].'</td>
            <td>'.$value['Febuary']['rled']['internal'].'</td>
            <td>'.$value['Febuary']['rled']['external'].'</td>
            <td style="background-color:lightyellow">'.$value['Febuary']['rled']['total'].'</td>
            <td>'.$value['Febuary']['rd-ard']['internal'].'</td>
            <td>'.$value['Febuary']['rd-ard']['external'].'</td>
            <td style="background-color:orange">'.$value['Febuary']['rd-ard']['total'].'</td>
        </tr>
        <tr>
            <td align="left">March</td>
            <td>'.$value['March']['msd']['internal'].'</td>
            <td>'.$value['March']['msd']['external'].'</td>
            <td style="background-color:pink">'.$value['March']['msd']['total'].'</td>
            <td>'.$value['March']['lhsd']['internal'].'</td>
            <td>'.$value['March']['lhsd']['external'].'</td>
            <td style="background-color:lightblue">'.$value['March']['lhsd']['total'].'</td>
            <td>'.$value['March']['rled']['internal'].'</td>
            <td>'.$value['March']['rled']['external'].'</td>
            <td style="background-color:lightyellow">'.$value['March']['rled']['total'].'</td>
            <td>'.$value['March']['rd-ard']['internal'].'</td>
            <td>'.$value['March']['rd-ard']['external'].'</td>
            <td style="background-color:orange">'.$value['March']['rd-ard']['total'].'</td>
        </tr>
        <tr>
            <td align="left">April</td>
            <td>'.$value['April']['msd']['internal'].'</td>
            <td>'.$value['April']['msd']['external'].'</td>
            <td style="background-color:pink">'.$value['April']['msd']['total'].'</td>
            <td>'.$value['April']['lhsd']['internal'].'</td>
            <td>'.$value['April']['lhsd']['external'].'</td>
            <td style="background-color:lightblue">'.$value['April']['lhsd']['total'].'</td>
            <td>'.$value['April']['rled']['internal'].'</td>
            <td>'.$value['April']['rled']['external'].'</td>
            <td style="background-color:lightyellow">'.$value['April']['rled']['total'].'</td>
            <td>'.$value['April']['rd-ard']['internal'].'</td>
            <td>'.$value['April']['rd-ard']['external'].'</td>
            <td style="background-color:orange">'.$value['April']['rd-ard']['total'].'</td>
        </tr>
        <tr>
            <td align="left">May</td>
            <td>'.$value['May']['msd']['internal'].'</td>
            <td>'.$value['May']['msd']['external'].'</td>
            <td style="background-color:pink">'.$value['May']['msd']['total'].'</td>
            <td>'.$value['May']['lhsd']['internal'].'</td>
            <td>'.$value['May']['lhsd']['external'].'</td>
            <td style="background-color:lightblue">'.$value['May']['lhsd']['total'].'</td>
            <td>'.$value['May']['rled']['internal'].'</td>
            <td>'.$value['May']['rled']['external'].'</td>
            <td style="background-color:lightyellow">'.$value['May']['rled']['total'].'</td>
            <td>'.$value['May']['rd-ard']['internal'].'</td>
            <td>'.$value['May']['rd-ard']['external'].'</td>
            <td style="background-color:orange">'.$value['May']['rd-ard']['total'].'</td>
        </tr>
        <tr>
            <td align="left">June</td>
            <td>'.$value['June']['msd']['internal'].'</td>
            <td>'.$value['June']['msd']['external'].'</td>
            <td style="background-color:pink">'.$value['June']['msd']['total'].'</td>
            <td>'.$value['June']['lhsd']['internal'].'</td>
            <td>'.$value['June']['lhsd']['external'].'</td>
            <td style="background-color:lightblue">'.$value['June']['lhsd']['total'].'</td>
            <td>'.$value['June']['rled']['internal'].'</td>
            <td>'.$value['June']['rled']['external'].'</td>
            <td style="background-color:lightyellow">'.$value['June']['rled']['total'].'</td>
            <td>'.$value['June']['rd-ard']['internal'].'</td>
            <td>'.$value['June']['rd-ard']['external'].'</td>
            <td style="background-color:orange">'.$value['June']['rd-ard']['total'].'</td>
        </tr>
        <tr>
            <td align="left">July</td>
            <td>'.$value['July']['msd']['internal'].'</td>
            <td>'.$value['July']['msd']['external'].'</td>
            <td style="background-color:pink">'.$value['July']['msd']['total'].'</td>
            <td>'.$value['July']['lhsd']['internal'].'</td>
            <td>'.$value['July']['lhsd']['external'].'</td>
            <td style="background-color:lightblue">'.$value['July']['lhsd']['total'].'</td>
            <td>'.$value['July']['rled']['internal'].'</td>
            <td>'.$value['July']['rled']['external'].'</td>
            <td style="background-color:lightyellow">'.$value['July']['rled']['total'].'</td>
            <td>'.$value['July']['rd-ard']['internal'].'</td>
            <td>'.$value['July']['rd-ard']['external'].'</td>
            <td style="background-color:orange">'.$value['July']['rd-ard']['total'].'</td>
        </tr>
        <tr>
            <td align="left">August</td>
            <td>'.$value['August']['msd']['internal'].'</td>
            <td>'.$value['August']['msd']['external'].'</td>
            <td style="background-color:pink">'.$value['August']['msd']['total'].'</td>
            <td>'.$value['August']['lhsd']['internal'].'</td>
            <td>'.$value['August']['lhsd']['external'].'</td>
            <td style="background-color:lightblue">'.$value['August']['rled']['total'].'</td>
            <td>'.$value['August']['rled']['internal'].'</td>
            <td>'.$value['August']['rled']['external'].'</td>
            <td style="background-color:lightyellow">'.$value['August']['rled']['total'].'</td>
            <td>'.$value['August']['rd-ard']['internal'].'</td>
            <td>'.$value['August']['rd-ard']['external'].'</td>
            <td style="background-color:orange">'.$value['August']['rd-ard']['total'].'</td>
        </tr>
        <tr>
            <td align="left">September</td>
            <td>'.$value['September']['msd']['internal'].'</td>
            <td>'.$value['September']['msd']['external'].'</td>
            <td style="background-color:pink">'.$value['September']['msd']['total'].'</td>
            <td>'.$value['September']['lhsd']['internal'].'</td>
            <td>'.$value['September']['lhsd']['external'].'</td>
            <td style="background-color:lightblue">'.$value['September']['lhsd']['total'].'</td>
            <td>'.$value['September']['rled']['internal'].'</td>
            <td>'.$value['September']['rled']['external'].'</td>
            <td style="background-color:lightyellow">'.$value['September']['rled']['total'].'</td>
            <td>'.$value['September']['rd-ard']['internal'].'</td>
            <td>'.$value['September']['rd-ard']['external'].'</td>
            <td style="background-color:orange">'.$value['September']['rd-ard']['total'].'</td>
        </tr>
        <tr>
            <td align="left">October</td>
            <td>'.$value['October']['msd']['internal'].'</td>
            <td>'.$value['October']['msd']['external'].'</td>
            <td style="background-color:pink">'.$value['October']['msd']['total'].'</td>
            <td>'.$value['October']['lhsd']['internal'].'</td>
            <td>'.$value['October']['lhsd']['external'].'</td>
            <td style="background-color:lightblue">'.$value['October']['lhsd']['total'].'</td>
            <td>'.$value['October']['rled']['internal'].'</td>
            <td>'.$value['October']['rled']['external'].'</td>
            <td style="background-color:lightyellow">'.$value['October']['rled']['total'].'</td>
            <td>'.$value['October']['rd-ard']['internal'].'</td>
            <td>'.$value['October']['rd-ard']['external'].'</td>
            <td style="background-color:orange">'.$value['October']['rd-ard']['total'].'</td>
        </tr>
        <tr>
            <td align="left">November</td>
            <td>'.$value['November']['msd']['internal'].'</td>
            <td>'.$value['November']['msd']['external'].'</td>
            <td style="background-color:pink">'.$value['November']['msd']['total'].'</td>
            <td>'.$value['November']['lhsd']['internal'].'</td>
            <td>'.$value['November']['lhsd']['external'].'</td>
            <td style="background-color:lightblue">'.$value['November']['lhsd']['total'].'</td>
            <td>'.$value['November']['rled']['internal'].'</td>
            <td>'.$value['November']['rled']['external'].'</td>
            <td style="background-color:lightyellow">'.$value['November']['rled']['total'].'</td>
            <td>'.$value['November']['rd-ard']['internal'].'</td>
            <td>'.$value['November']['rd-ard']['external'].'</td>
            <td style="background-color:orange">'.$value['November']['rd-ard']['total'].'</td>
        </tr>
        <tr>
            <td align="left">December</td>
            <td>'.$value['December']['msd']['internal'].'</td>
            <td>'.$value['December']['msd']['external'].'</td>
            <td style="background-color:pink">'.$value['December']['msd']['total'].'</td>
            <td>'.$value['December']['lhsd']['internal'].'</td>
            <td>'.$value['December']['lhsd']['external'].'</td>
            <td style="background-color:lightblue">'.$value['December']['lhsd']['total'].'</td>
            <td>'.$value['December']['rled']['internal'].'</td>
            <td>'.$value['December']['rled']['external'].'</td>
            <td style="background-color:lightyellow">'.$value['December']['rled']['total'].'</td>
            <td>'.$value['December']['rd-ard']['internal'].'</td>
            <td>'.$value['December']['rd-ard']['external'].'</td>
            <td style="background-color:orange">'.$value['December']['rd-ard']['total'].'</td>
        </tr>
        <tr>
            <td style="border:none;"></td>
            <td colspan="2" align="left" style="border-left:none;">Total of MSD: </td>
            <td style="background-color:pink">'.$msd_count.'</td>
            <td colspan="2" align="left">Total of LHSD: </td>
            <td style="background-color:lightblue">'.$lhsd_count.'</td>
            <td colspan="2" align="left">Total of RLED: </td>
            <td style="background-color:lightyellow">'.$rled_count.'</td>
            <td colspan="2" align="left">Total of RD-ARD: </td>
            <td style="background-color:orange">'.$rd_ard_count.'</td>
        </tr>
        <tr>
            <td colspan="4" align="right">Total of all respondents:</td>
            <td colspan="9" align="left"><p style="color:red;">'.$total_count.'</p></td>
        </tr>
    </table>';
$tbl = <<<EOD
    $table
EOD;
$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

$pdf->Output("ConsolidatedReport.pdf","i");
//============================================================+
// END OF FILE
//============================================================+
