<?php

/**
 * Helper to replace the actions cell links in the admin baked index pages.
 *
 * @author David Yell
 */
class ActionsHelper extends AppHelper {

/**
 * Include some core system helpers so we can output
 * @var array
 */
    public $helpers = array('Html', 'Form');

/**
 * Output the links
 * @param int $id The id of the item
 * @param array $options array of v, e and/or d representing which button(s) to output
 * @param string $type 'buttons' or 'icons' The type of links to generate
 * @return type
 */
    public function actions($id, $options = array('v', 'e', 'd'), $controller = '', $type = 'buttons') {
        
        $html = '';

        // View button
        if (in_array('v', $options)) {
            // Build the url
            if(isset($controller) && !empty($controller)){
                $url = array('controller' => $controller, 'action' => 'view', $id);
            }else{
                $url = array('action' => 'view', $id);
            }
            
            if ($type == 'icons') {
                $html .= $this->Html->image('/nice_admin/img/view.png', array('url' => $url, 'alt' => 'View', 'title' => 'View'));
            } else {
                $html .= $this->Html->link(__('View'), $url, array('class' => 'btn btn-small'));
            }
        }

        // Edit button
        if (in_array('e', $options)) {
            // Build the url
            if(isset($controller) && !empty($controller)){
                $url = array('controller' => $controller, 'action' => 'edit', $id);
            }else{
                $url = array('action' => 'edit', $id);
            }
            
            if ($type == 'icons') {
                $html .= $this->Html->image('/nice_admin/img/edit.png', array('url' => $url, 'alt' => 'Edit', 'title' => 'Edit'));
            } else {
                $html .= $this->Html->link(__('Edit'), $url, array('class' => 'btn btn-small'));
            }
        }

        // Delete button
        if (in_array('d', $options)) {
            // Build the url
            if(isset($controller) && !empty($controller)){
                $url = array('controller' => $controller, 'action' => 'delete', $id);
            }else{
                $url = array('action' => 'delete', $id);
            }
            
            if ($type == 'icons') {
                $html .= $this->Form->postLink($this->Html->image('/nice_admin/img/delete.png', array('alt' => 'Delete', 'title' => 'Delete')), $url, array('escape' => false), __('Are you sure you want to delete # %s?', $id));
            } else {
                $html .= $this->Form->postLink(__('Delete'), $url, array('class' => 'btn btn-small btn-danger'), __('Are you sure you want to delete # %s?', $id));
            }
        }

        return $html;
    }

}