<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_user_login_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 * @keterangan : Model untuk manajemen user login
	 **/
	 
	public function cekUserLogin($data)
	{
		$cek['username'] 	= mysql_real_escape_string($data['username']);
		$cek['pwd'] 	= md5(mysql_real_escape_string($data['password']).$GLOBALS['key_login']);
		$q_cek_login = $this->db->get_where('MstPengguna', $cek);
		
		if(count($q_cek_login->result())>0)
		{
			foreach($q_cek_login->result() as $qad)
			{
				$sess_data['logged_in'] = 'yesGetMeLoginBaby';
				$sess_data['nama_user_login'] = $qad->NamaPengguna;
				$sess_data['id_pengguna'] = $qad->IdPengguna;
				//$sess_data['kode_user'] = $qad->role_id;
				$sess_data['username'] = $qad->username;
				$sess_data['level'] = $qad->JabatanPengguna;
				$this->session->set_userdata($sess_data);
			}
				redirect("dashboard");
		}
		else
		{
			echo "<script>
			alert('Maaf, Username Anda Salah. Silahkan Coba Lagi');
			window.location.href='login';
			</script>";
			//redirect("login");
		}
		
	}
}

/* End of file app_user_login_model.php */
/* Location: ./application/models/app_user_login_model.php */