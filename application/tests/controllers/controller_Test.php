<?php

/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class controller_Test extends TestCase
{
        protected $backupGlobalsBlacklist = array( '_SESSION' );
        public function setUp(){
        if ( isset( $_SESSION ) ) $_SESSION = array( );
        $this->resetInstance();
        $this->CI->load->model('Mymodel');
        $this->CI->load->library('session');
        $this->obj1 = $this->CI->Mymodel;
        }

        public function test_add_register(){
        $output = $this->request('POST','controller/add_register',
        				['nim'=>'55555', 'nama'=>'55555', 'email'=>'test@gmail.com', 'password'=>'55555']);
        $this->assertContains('Masuk', $output);
        }

        public function test_method_404(){
			$this->request('GET', 'welcome/method_not_exist');
			$this->assertResponseCode(404);
		  }

		    public function test_APPPATH(){
			  $actual = realpath(APPPATH);
			  $expected = realpath(__DIR__ . '/../..');
			  $this->assertEquals(
				$expected,
				$actual,
				'Your APPPATH seems to be wrong. Check your $application_folder in tests/Bootstrap.php'
			);
		}
}
