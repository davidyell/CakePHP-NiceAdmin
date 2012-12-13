<?php
/**
 * StatusLightsHelper is designed to swap out regular Status text with a nicer TwitterBootstrap compatible label
 *
 * @author david
 */
App::uses('AppHelper','View/Helper');

class StatusLightsHelper extends AppHelper{

/**
 * Will intepret a status and return a matching label
 * @param int $state The status_id
 * @return string Label
 */
    public function status($state){
        switch($state){
            case 1: // Live
                return "<span class='label label-success'>Live</span>";
                break;
            case 2: // Inactive
                return "<span class='label label-inverse'>Inactive</span>";
                break;
            case 3: // Deleted
                return "<span class='label'>Deleted</span>";
                break;
        }
    }

}

?>
