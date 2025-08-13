<?php

namespace App\Http\Controllers;

abstract class Controller
{
    /**
     * Unique Name Generator 
     */
    protected function uniqueFileName($file = null){

        if( $file ){
            $uniqueName =  md5(rand(100000,10000000) . '_' .time() . '_' . str_shuffle("qwertyuiopplkjhgfdsazxcvbnm")). "." . $file -> getClientOriginalExtension();
        }else {
            $uniqueName =  md5(rand(100000,10000000) . '_' .time() . '_' . str_shuffle("qwertyuiopplkjhgfdsazxcvbnm"));
        }

        return $uniqueName;
    }


    /**
     * File Upload Method
     */
    protected function fileUpload($file = null, $path = 'media'){

        if($file){
            // generate a unique filename 
            $fileName = $this->uniqueFileName($file);

            // upload file to path
            $file -> move(public_path($path), $fileName);

            // return file name
            return $fileName; 
        }

        return false;
    }


    /**
     * Time ago 
     */
    protected function timeAgo($timestamp){
  
    // Convert to integer if it's a string timestamp
    $timestamp = is_numeric($timestamp) ? $timestamp : strtotime($timestamp);

    $timeDiff = time() - $timestamp;

    if ($timeDiff < 1) {
        return 'just now';
    }

    $units = [
        31536000 => 'year',
        2592000  => 'month',
        604800   => 'week',
        86400    => 'day',
        3600     => 'hour',
        60       => 'minute',
        1        => 'second'
    ];

    foreach ($units as $seconds => $unit) {
        $value = floor($timeDiff / $seconds);

        if ($value >= 1) {
            return $value . ' ' . $unit . ($value > 1 ? 's' : '') . ' ago';
        }
    }
}

    }

