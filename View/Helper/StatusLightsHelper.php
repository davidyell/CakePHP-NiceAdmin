<?php
/**
 * StatusLightsHelper is designed to swap out regular Status text with a nicer TwitterBootstrap compatible label
 *
 * @author David Yell
 */
App::uses('AppHelper','View/Helper');

class StatusLightsHelper extends AppHelper{

/**
 * Include the helpers we'll need to create our output
 * @var array
 */
    public $helpers = array('Html');

/**
 * Settings for the helper. Consists of id => array(label, class). Id of the item, label to be displayed, and the class to use
 * @var array
 */
    private $settings = array(
        1 => array(
            'label'=>'Live',
            'class'=>'label label-success'
        ),
        2 => array(
            'label'=>'Inactive',
            'class'=>'label label-inverse'
        ),
        3 => array(
            'label'=>'Deleted',
            'class'=>'label'
        )
    );

/**
 * Construct the helper and assign the passed settings
 * @param View $view
 * @param array $settings
 */
    public function __construct(View $view, $settings = array()){
        parent::__construct($view, $settings);

        if(!empty($settings)){
            $this->settings = $settings;
        }
    }

/**
 * Will intepret a status and return a matching label
 * @param int $id The status_id
 * @return string Html label
 */
    public function status($id){
        return $this->Html->tag('span', $this->settings[$id]['label'], array('class'=>$this->settings[$id]['class']));
    }

}

?>
