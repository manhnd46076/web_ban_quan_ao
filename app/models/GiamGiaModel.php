<?php

function getAllGiamGia()
{
    $sql = "SELECT * FROM giam_gia";
    return getData($sql);
}
function getGiamGiaID($ma_giam_gia)
{
 $sql= "SELECT * FROM giam_gia WHERE ma_giam_gia =$ma_giam_gia  ";
 return getData($sql,false);

}
