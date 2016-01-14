<?php
/**
 * Description of BooleanHelperTest
 *
 * @author David Yell (neon1024@gmail.com)
 */

App::uses('Controller', 'Controller');
App::uses('View', 'View');
App::uses('StatusLightsHelper', 'NiceAdmin.View/Helper');

class StatusLightsHelperTest extends CakeTestCase {
    
/**
 * Setup the test, instantiate anything we need
 */
    public function setUp() {
        parent::setUp();
        
        $Controller = new Controller();
        $View = new View($Controller);
        $this->StatusLights = new StatusLightsHelper($View);
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
                        'label' => 'Live',
                        'class' => 'label label-success'
                    ),
                ),
                '<span class="label label-success">Live</span>',
                'Expected matching markup'
            ),
            array(
                array(
                    2 => array(
                        'label' => 'Inactive',
                        'class' => 'label label-inverse'
                    ),
                ),
                '<span class="label label-inverse">Inactive</span>',
                'Expected matching markup'
            ),
            array(
                array(
                    3 => array(
                        'label' => 'Deleted',
                        'class' => 'label'
                    )
                ),
                '<span class="label">Deleted</span>',
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
    public function testStatus($input, $expected, $message) {
        $val = array_keys($input);
        $result = $this->StatusLights->status($val[0]);
        $this->assertEqual($result, $expected, $message);
    }
    
}