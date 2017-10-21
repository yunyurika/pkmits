<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class Welcome_test extends TestCase
{
        public function test_index() 
        {
                $output = $this->request('GET', 'page/index');
                $this->assertContains('Masuk', $output);
        }
        
        public function test_indexwelcome() 
        {
                $output = $this->request('GET', 'Welcome/index');
                $this->assertContains('Register', $output);
                $this->assertContains('Masuk', $output);
        }
        
        public function test_register(){
                $output = $this->request('GET', 'page/register');
                $this->assertContains('Register', $output);
        }

	public function test_mahasiswa()
	{
                $_SESSION['username'] = 'username';
                $_SESSION['status'] = 'login';
                $_SESSION['role'] = 'mahasiswa';
		$output = $this->request('GET', 'page/home');
		$this->assertContains('Form Pengisian PKM', $output);
	}
        
        public function test_add_register(){
                $output = $this->request('POST','controller/add_register',
                ['nim'=>'11111', 'nama'=>'11111', 'email'=>'11111', 'password'=>'11111']);
                //$this->assertContains('Masuk', $output);
                $where = 'test';
        }
        
        public function test_update_anggota(){
                $output = $this->request('POST','controller/update_anggota',
                ['judulpkm'=>'aaaaa', 'ketua'=>'aaaaa', 'aaaaa'=>'aaaaa', 'anggota2'=>'aaaaa', 'anggota3'=>'aaaaa', 'anggota4'=>'aaaaa']);
                //$this->assertContains('Masuk', $output);
                $where = 'aaaaa';
            
        }
        
        public function test_login_dosen_sukses(){
            $output = $this->request('POST',['controller', 'login'],
                ['username'=>'22222', 'password'=>'22222']);
            $this->assertEquals('22222', $_SESSION['username']);
        }
        
        public function test_login_mahasiswa_sukses(){
            $output = $this->request('POST',['controller', 'login'],
                ['username'=>'cccc', 'password'=>'cccc']);
            $this->assertEquals('cccc', $_SESSION['username']);
        }
        
        public function test_login_gagal(){
            $output = $this->request('POST',['controller', 'login'],
                ['username'=>'tae', 'password'=>'tae']);
            $this->assertContains('error', $output);
            $this->assertRedirect(base_url());
        }
        
        public function test_logout(){
            $_SESSION['username'] = "cccc";
            $_SESSION['status'] = "login";
            $this->request('GET', 'controller/logout');
            $this->assertRedirect(base_url());
            //$this->assertFalse( isset($_SESSION['username']) );
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
