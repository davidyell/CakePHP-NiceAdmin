<?php

/**
 * Helper for the output of boolean values as ticks and crosses
 *
 * @author David Yell
 */
class BooleanHelper extends AppHelper {

/**
 * Include the helpers that we need to create output
 * @var array
 */
    public $helpers = array('Html');

/**
 * A set of default options for the helper. These can be overridden when you are instantiating the helper
 * @var array
 */
    public $settings = array(
        1 => array(
            'class' => 'badge badge-success',
            'display' => '&#10004;'
        ),
        0 => array(
            'class' => 'badge badge-important',
            'display' => '&#10008;'
        )
    );

/**
 * Build the helper and overwrites the default options with any user passed options into the helper
 * @param View $view
 * @param array $settings
 */
    public function __construct(View $view, $settings = array()) {
        parent::__construct($view, $settings);

        if (!empty($settings)) {
            $this->settings = $settings;
        }
    }

/**
 * Output the tag
 * 
 * @param boolean $value The boolean value of the item
 * @return html Returns a formatted HTML tag
 */
    public function display($value) {
        if ($value === true || $value == 1) {
            $return = $this->Html->tag('span', $this->settings[1]['display'], array('class' => $this->settings[1]['class']));
        } else {
            $return = $this->Html->tag('span', $this->settings[0]['display'], array('class' => $this->settings[0]['class']));
        }

        return $return;
    }

}