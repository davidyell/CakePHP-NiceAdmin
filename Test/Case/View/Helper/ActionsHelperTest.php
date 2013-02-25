<?php
/**
 * Actions Helper Test
 * 
 * @author David Yell (neon1024@gmail.com)
 */

App::uses('Controller', 'Controller');
App::uses('View', 'View');
App::uses('ActionsHelper', 'NiceAdmin.View/Helper');

class ActionsHelperTest extends CakeTestCase {
    
/**
 * Setup the test, instantiate anything we need
 */
    public function setUp() {
        parent::setUp();
        
        $Controller = new Controller();
        $View = new View($Controller);
        $this->Actions = new ActionsHelper($View);
    }
    
/**
 * Teardown the test, clean up
 */
    public function tearDown() {
        parent::tearDown();
    }
    
/**
 * Test actions method to ensure we are returning correct html
 */
    public function testActions() {
        $result = $this->Actions->actions(1, array('v','e','d'), 'controller', 'buttons');
        $this->assertTextContains("controller/view/1", $result, "Expect to see a view button");
        $this->assertTextContains("controller/edit/1", $result, "Expect to see an edit button");
        $this->assertTextContains("controller/delete/1", $result, "Expect to see a delete button");
    }
    
}