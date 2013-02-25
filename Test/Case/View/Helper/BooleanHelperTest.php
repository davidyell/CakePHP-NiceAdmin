<?php
/**
 * Description of BooleanHelperTest
 *
 * @author David Yell (neon1024@gmail.com)
 */

App::uses('Controller', 'Controller');
App::uses('View', 'View');
App::uses('BooleanHelper', 'NiceAdmin.View/Helper');

class BooleanHelperTest extends CakeTestCase {
    
/**
 * Setup the test, instantiate anything we need
 */
    public function setUp() {
        parent::setUp();
        
        $Controller = new Controller();
        $View = new View($Controller);
        $this->Boolean = new BooleanHelper($View);
    }
    
/**
 * Teardown the test, clean up
 */
    public function tearDown() {
        parent::tearDown();
    }
    
    public function displayProvider() {
        return array(
            array(
                array(
                    1 => array(
                        'class' => 'badge badge-success',
                        'display' => '&#10004;'
                    ),
                ),
                '<span class="badge badge-success">&#10004;</span>',
                'Expected matching markup'
            ),
            array(
                array(
                    0 => array(
                        'class' => 'badge badge-important',
                        'display' => '&#10008;'
                    ),
                ),
                '<span class="badge badge-important">&#10008;</span>',
                'Expected matching markup'
            ),
        );
    }
    
/**
 * 
 * @param type $input
 * @param type $result
 * @param type $message
 * 
 * @dataProvider displayProvider
 */
    public function testDisplay($input, $expected, $message) {
        $val = array_keys($input);
        $result = $this->Boolean->display($val[0]);
        $this->assertEqual($result, $expected, $message);
    }
    
}