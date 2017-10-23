<?php /**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class Welcome_test extends TestCase
{
    
        public function setUp()
        {
                $this->resetInstance();
                $this->CI->load->model('Mymodel');
		$this->objek = $this->CI->Mymodel;
           }
        public function test_index() 
        {
                $output = $this->request('GET', 'page/index');
                $this->assertContains('Masuk', $output);
        }
        
        public function test_register(){
                $output = $this->request('GET', 'page/register');
                $this->assertContains('Register', $output);
        }
        
        public function test_add_register(){
                $awal = $this->objek->getCurrentRow();  
                $output = $this->request('POST','controller/add_register',
                           ['nim'=>'5215118078', 
                            'nama'=>'ian', 
                            'email'=>'hanum@gmail.com', 
                            'password'=>'123']);
                   $akhir = $this->objek->getCurrentRow();
                    $result = $akhir - $awal;
                     $expected = 1;
                  $this->assertEquals($expected,$result);
                  $output = $this->request('POST', 'controller/add_register');    
            
        }
        public function test_add_register_kosong(){
                $mula = $this->objek->getCurrentRow();
                $output = $this->request('POST','controller/add_register',
                           ['nim'=>'11111', 
                            'nama'=>'11111', 
                            'email'=>'', 
                            'password'=>'11111']);
                //$this->assertContains('Masuk', $output);
                
                $akhir = $this->objek->getCurrentRow();
                $expected = $akhir - $mula;
                $this->assertEquals(0, $expected);
        }
        public function test_add_nimsudahada(){
      
		$mula = $this->objek->getCurrentRow();
		$this->request(
			'POST',
			['controller/add_register'],
			[
			'nim' => 'baba',
                        'nama' => 'baba',
                        'email' => 'baba',
                        'password'  => '123'
			]
			);
		$akhir = $this->objek->getCurrentRow();
                $expected = $akhir - $mula;
                $this->assertEquals(0, $expected);
        
	}
        public function test_mahasiswa()
	{
                $_SESSION['username'] = 'username';
                $_SESSION['status'] = 'login';
                $_SESSION['role'] = 'mahasiswa';
		$output = $this->request('GET', 'page/home');
		$this->assertContains('Form Pengisian PKM', $output);
	}
        
        public function test_login_dosen_sukses(){
            $output = $this->request('POST',['controller', 'login'],
                ['username'=>'5215100', 'password'=>'123']);
            $this->assertEquals('5215100', $_SESSION['username']);
        }
        
        public function test_login_mahasiswa_sukses(){
            $output = $this->request('POST',['controller', 'login'],
                ['username'=>'ada', 'password'=>'123']);
            $this->assertEquals('ada', $_SESSION['username']);
        }
        
         public function test_masuk_nokatasandi(){
        $this->request('POST', 'controller/login',
            [
                'username' => 'ada',
                'password' => '',
            ]);
        $this->assertRedirect(base_url());
        $this->assertFalse(isset($_SESSION['username']) );
        }
         public function test_masuk_nousername(){
        $this->request('POST', 'controller/login',
            [
                'username' => '',
                'password' => '123',
            ]);
        $this->assertRedirect(base_url());
        $this->assertFalse( isset($_SESSION['username']) );
        }
    
        public function test_submit_masuk_unmatch(){
        $this->request('POST', 'controller/login',
            [
                'username' => 'ada',
                'password' => 'unmatch',
            ]);
        $this->assertRedirect(base_url());
        $this->assertFalse( isset($_SESSION['username']) );
        }
    
        public function test_submit_masuk_kosong(){
        $this->request('POST', 'controller/login',
            [
                'username' => '',
                'password' => '',
            ]);
        $this->assertRedirect(base_url());
        $this->assertFalse( isset($_SESSION['username']) );
        }
        
      public function test_update_anggota(){
                $_SESSION['username'] = 'baba';
                $_SESSION['status'] = 'login';
                $_SESSION['role'] = 'mahasiswa'; 
                $output = $this->request('POST','controller/update_anggota',
                ['judul'=>'aab', 'ketua'=>'ab', 'anggota1'=>'aaaaa', 'anggota2'=>'aaaaa', 'anggota3'=>'aaaaa', 'anggota4'=>'aaaaa']);
                //$this->assertContains('Masuk', $output);
                $where = 'baba';
            
        } 
        
         public function test_updatepencet_nosession(){
             $output = $this->request('POST','controller/update_anggota',
                ['judul'=>'anu','ketua'=> 'dia', 'anggota1'=>'aaaaa', 'anggota2'=>'aaaaa', 'anggota3'=>'aaaaa', 'anggota4'=>'aaaaa']);
               $this->assertRedirect(base_url());
               $this->assertFalse(isset($_SESSION['username']));
         }
        public function test_update_nosession() {
            $output = $this->request('GET', 'page/index');
            $this->assertContains('Masuk', $output);
        }
        
        
        public function test_logout(){
            $_SESSION['username'] = "ada";
            $_SESSION['status'] = "login";
            $this->request('GET', 'controller/logout');
            $this->assertRedirect(base_url());
            //$this->assertFalse( isset($_SESSION['username']) );
        }
       /*public function test_dosen() {
                $_SESSION['username'] = 'username';
                $_SESSION['status'] = 'login';
                $_SESSION['role'] = 'dosen';
                $output = $this->request('GET', 'page/home_dosen');
                $this->assertContains('Form Pengisian PKM', $output);
        } */
        
         public function test_login_dosen_lihat() {
                $_SESSION['username'] = '5215100';
                $_SESSION['status'] = 'login';
                $_SESSION['role'] = 'dosen';
                
                $output = $this->request('POST', 'page/urutan');
                $this->assertContains('<th>NIM</th>', $output);
        }
        
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
