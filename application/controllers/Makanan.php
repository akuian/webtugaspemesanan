<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class makanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login')!=TRUE) {
			redirect('admin/login','refresh');
		}
		$this->load->model('m_makanan','makanan');
	}

	public function index()
	{
		$data['tampil_makanan']=$this->makanan->tampil();
		$data['kategori']=$this->makanan->data_kategori();
		$data['konten']="v_makanan";
		$data['nama']="Daftar makanan";
		$this->load->view('template', $data);
	}
	public function restauran()
	{
		$data['tampil_makanan']=$this->makanan->tampil();
		$data['kategori']=$this->makanan->data_kategori();
		$data['konten']="restauran";
		$data['nama']="Restauran ALL YOU CAN EAT";
		$this->load->view('template', $data);
	}
	public function tambah()
	{
		$this->form_validation->set_rules('nama_makanan', 'nama_makanan', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('koki', 'koki', 'trim|required');
		$this->form_validation->set_rules('stok', 'stok', 'trim|required');
		if ($this->form_validation->run()==TRUE) {
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '1000';
			$config['max_width']  = '5000';
			$config['max_height']  = '5000';
			if ($_FILES['foto_cover']['name']!="") {
				$this->load->library('upload', $config);

				if (! $this->upload->do_upload('foto_cover')) {
					$this->session->set_flashdata('pesan', $this->upload->display_errors());
				}else {
					if ($this->makanan->simpan_makanan($this->upload->data('file_name'))) {
						$this->session->set_flashdata('pesan', 'Sukses menambah ');
					}else{
						$this->session->set_flashdata('pesan', 'Gagal menambah');
					}
					redirect('makanan','refresh');
				}
			}else{
				if ($this->makanan->simpan_makanan('')) {
					$this->session->set_flashdata('pesan', 'Sukses menambah');
				}else{
					$this->session->set_flashdata('pesan', 'Gagal menambah');
				}
				redirect('makanan','refresh');
			}
			
		}else{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('makanan','refresh');
		}
	}
	public function edit_makanan($id)
	{
		$data=$this->makanan->detail($id);
		echo json_encode($data);
	}
	public function makanan_update()
	{
		if($this->input->post('edit')){
			if($_FILES['foto_cover']['name']==""){
				if($this->makanan->edit_makanan()){
					$this->session->set_flashdata('pesan', 'Sukses update');
					redirect('makanan');
				} else {
					$this->session->set_flashdata('pesan', 'Gagal update');
					redirect('makanan');
				}
			} else {
				$config['upload_path'] = './assets/img/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']  = '20000';
				$config['max_width']  = '5024';
				$config['max_height']  = '5768';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('foto_cover')){
					$this->session->set_flashdata('pesan', 'Gagal Upload');
					redirect('makanan');
				}
				else{
					if($this->makanan->edit_makanan_dengan_foto($this->upload->data('file_name'))){
						$this->session->set_flashdata('pesan', 'Sukses update');
						redirect('makanan');
					} else {
						$this->session->set_flashdata('pesan', 'Gagal update');
						redirect('makanan');
					}
				}
			}
			
		}

	}
	public function hapus($id_makanan='')
	{
		if ($this->makanan->hapus_makanan($id_makanan)) {
			$this->session->set_flashdata('pesan', 'Sukses Hapus makanan');
			redirect('makanan','refresh');
		}else{
			$this->session->set_flashdata('pesan', 'Gagal Hapus makanan');
			redirect('makanan','refresh');
		}
	}

}

/* End of file makanan.php */
/* Location: ./application/controllers/makanan.php */