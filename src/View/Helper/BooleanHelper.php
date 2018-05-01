<?php

/**
 * Helper for the output of boolean values as ticks and crosses
 *
 * @author David Yell
 */
namespace NiceAdmin\View\Helper;

use Cake\View\Helper;

class BooleanHelper extends Helper
{

    /**
     * Include the helpers that we need to create output
     *
     * @var array
     */
    public $helpers = ['Html'];

    /**
     * A set of default options for the helper. These can be overridden when you are instantiating the helper
     *
     * @var array
     */
    protected $_defaultConfig = [
        1 => [
            'class' => 'badge badge-success',
            'display' => '&#10004;'
        ],
        0 => [
            'class' => 'badge badge-important',
            'display' => '&#10008;'
        ]
    ];

    /**
     * Output the tag
     *
     * @param bool $value The boolean value of the item
     *
     * @return string Returns a formatted HTML tag
     */
    public function display($value)
    {
        if ($value === true || $value == 1) {
            $return = $this->Html->tag('span', $this->getConfig('1.display'), ['class' => $this->getConfig('1.class')]);
        } else {
            $return = $this->Html->tag('span', $this->getConfig('0.display'), ['class' => $this->getConfig('0.class')]);
        }

        return $return;
    }
}
