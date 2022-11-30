<?php


namespace App\Helpers;


class Helper
{
   public function  fillter_array($arr)
   {
      $new_arr = array ();
      foreach ($arr as  $item) {
         foreach ($item as $i) {
            if (!is_null($i->tile) && $i->tile !== '')
            {
               $new_arr[] = $item;
            }
         }
      }
      return  $new_arr;
   }
}