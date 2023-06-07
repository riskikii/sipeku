<?php

class CustomDateFormatter
{
    function indonesian($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $spr = explode('-', $tanggal);

        return $spr[2] . ' ' . $bulan[(int)$spr[1]] . ' ' . $spr[0];
    }
}
