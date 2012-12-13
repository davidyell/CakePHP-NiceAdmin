<?php
/**
 * Description of ActionsHelper
 *
 * @author david
 */
class ActionsHelper extends AppHelper{

    public $helpers = array('Html', 'Form');

    public function actionButtons($id){
        $html = '';
        $html .= $this->Html->link(__('View'), array('action' => 'view', $id), array('class'=>'btn btn-small'));
        $html .= $this->Html->link(__('Edit'), array('action' => 'edit', $id), array('class'=>'btn btn-small'));
        $html .= $this->Form->postLink(__('Delete'), array('action' => 'delete', $id), array('class'=>'btn btn-small btn-danger'), __('Are you sure you want to delete # %s?', $id));

        return $html;
    }

    public function actionIcons($id){
        $html = '';
        $html .= $this->Html->image('/action_buttons/img/view.png', array('url'=>array('action' => 'view', $id),'alt'=>'View','title'=>'View'));
        $html .= $this->Html->image('/action_buttons/img/edit.png', array('url'=>array('action' => 'edit', $id),'alt'=>'Edit','title'=>'Edit'));
        $html .= $this->Form->postLink($this->Html->image('/action_buttons/img/delete.png', array('alt'=>'Delete','title'=>'Delete')), array('action' => 'delete', $id), array('escape'=>false), __('Are you sure you want to delete # %s?', $id));

        return $html;
    }

}

?>
