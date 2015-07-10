<?php
/**
 * Helper to replace the actions cell links in the admin baked index pages.
 *
 * @author David Yell (neon1024@gmail.com)
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
 * @param bool $inForm Are the links inside another form?
 * @return string
 */
    public function actions($recordId, $options = array('v', 'e', 'd'), $controller = '', $type = 'buttons', $inForm = false) {
        
        $html = '';

        // View button
        if (in_array('v', $options)) {
            $url = $this->buildUrl($controller, 'view', $recordId);
            
            if ($type == 'icons') {
                $html .= $this->Html->image('/nice_admin/img/view.png', array('url' => $url, 'alt' => 'View', 'title' => 'View'));
            } else {
                $html .= $this->Html->link(__('View'), $url, array('class' => 'btn btn-small'));
            }
        }

        // Edit button
        if (in_array('e', $options)) {
            $url = $this->buildUrl($controller, 'edit', $recordId);
            
            if ($type == 'icons') {
                $html .= $this->Html->image('/nice_admin/img/edit.png', array('url' => $url, 'alt' => 'Edit', 'title' => 'Edit'));
            } else {
                $html .= $this->Html->link(__('Edit'), $url, array('class' => 'btn btn-small'));
            }
        }

        // Delete button
        if (in_array('d', $options)) {
            $url = $this->buildUrl($controller, 'delete', $recordId);

            if (!$inForm) {
                if ($type == 'icons') {
                    $html .= $this->Form->postLink($this->Html->image('/nice_admin/img/delete.png', array('alt' => 'Delete', 'title' => 'Delete')), $url, array('escape' => false), __('Are you sure you want to delete # %s?', $recordId));
                } else {
                    $html .= $this->Form->postLink(__('Delete'), $url, array('class' => 'btn btn-sm btn-small btn-danger'), __('Are you sure you want to delete # %s?', $recordId));
                }
            } else {
                $html .= $this->Html->link(__('Delete'), $url, ['class' => 'btn btn-sm btn-small btn-danger', 'onclick' => 'return confirm("Are you sure you want to delete?")']);
            }
        }

        return $html;
    }
    
/**
 * Take a controller and build a url array string
 * 
 * @param int The id of the record
 * @param string Controller to use in url
 * @return array Cake url array
 */
    private function buildUrl($controller, $action, $recordId) {
        if (!empty($controller)) {
            $url = ['controller' => $controller, 'action' => $action, $recordId];
        } else {
            $url = ['action' => $action, $recordId];
        }
        
        return $url;
    }

}