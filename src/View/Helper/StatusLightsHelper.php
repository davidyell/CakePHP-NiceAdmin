<?php

/**
 * StatusLightsHelper is designed to swap out regular Status text with a nicer TwitterBootstrap compatible label
 *
 * @author David Yell
 */
namespace NiceAdmin\View\Helper;

use Cake\View\Helper;

class StatusLightsHelper extends Helper
{

    /**
     * Include the helpers we'll need to create our output
     *
     * @var array
     */
    public $helpers = ['Html'];

    /**
     * Settings for the helper. Consists of id => array(label, class). Id of the item, label to be displayed,
     * and the class to use
     *
     * @var array
     */
    protected $_defaultConfig = [
        1 => [
            'label' => 'Live',
            'class' => 'label label-success'
        ],
        2 => [
            'label' => 'Inactive',
            'class' => 'label label-inverse'
        ],
        3 => [
            'label' => 'Deleted',
            'class' => 'label'
        ]
    ];

    /**
     * Will intepret a status and return a matching label
     *
     * @param int $id The status_id
     *
     * @return string Html label
     */
    public function status($id)
    {
        return $this->Html->tag('span', $this->config($id)['label'], ['class' => $this->config($id)['class']]);
    }
}
