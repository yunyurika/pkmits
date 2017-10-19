<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class page_test extends TestCase
{
        public function test_index() 
        {
                $output = $this->request('GET', 'page/index');
                $this->assertContains('Masuk', $output);
        }
    
	public function test_mahasiswa()
	{
                $_SESSION['username'] = 'username';
                $_SESSION['status'] = 'login';
                $_SESSION['role'] = 'mahasiswa';
		$output = $this->request('GET', 'page/home');
		$this->assertContains('Form Pengisian PKM', $output);
	}
       /* public function test_dosen() {
                $_SESSION['username'] = 'username';
                $_SESSION['status'] = 'login';
                $_SESSION['role'] = 'dosen';
                $output = $this->request('GET', 'page/home_dosen');
                $this->assertContains('Form Pengisian PKM', $output);
        } */
        
	public function test_method_404()
	{
		$this->request('GET', 'welcome/method_not_exist');
		$this->assertResponseCode(404);
	}

	public function test_APPPATH()
	{
		$actual = realpath(APPPATH);
		$expected = realpath(__DIR__ . '/../..');
		$this->assertEquals(
			$expected,
			$actual,
			'Your APPPATH seems to be wrong. Check your $application_folder in tests/Bootstrap.php'
		);
	}
        
        
}
