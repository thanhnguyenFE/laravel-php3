<?php
namespace App\Helpers;

function formatDate($date, $format = 'd/m/Y'){
    return \Carbon\Carbon::parse($date)->format($format);
}

function getDate($date, $type){
    switch ($type) {
        case 'day':
            return \Carbon\Carbon::parse($date)->format('d');
        case 'month':
            return \Carbon\Carbon::parse($date)->format('m');
        case 'rank':
            $daysOfWeek = ["Chủ Nhật", "Thứ Hai", "Thứ Ba", "Thứ Tư", "Thứ Năm", "Thứ Sáu", "Thứ Bảy"];
            $dayOfWeekNumber = \Carbon\Carbon::parse($date)->format('w');
            return $daysOfWeek[$dayOfWeekNumber];
        default:
            return $date;
    }
}
