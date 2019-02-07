<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_makanan extends CI_Model {
    public function tampil()
    {
        $tm_makanan=$this->db
                      ->join('kategori','kategori.id_kategori=makanan.id_kategori')
                      ->get('makanan')
                      ->result();
        return $tm_makanan;
    }
    public function data_kategori()
    {
        return $this->db->get('kategori')
                        ->result();
    }
    public function simpan_makanan($file_cover)
    {
        if ($file_cover=="") {
             $object = array(
                'id_makanan' => $this->input->post('id_makanan'), 
                'nama_makanan' => $this->input->post('nama_makanan'),  
                'id_kategori' => $this->input->post('id_kategori'), 
                'harga' => $this->input->post('harga'),
                'koki' => $this->input->post('koki'),  
                'stok' => $this->input->post('stok')
             );
        }else{
            $object = array(
                'id_makanan' => $this->input->post('id_makanan'), 
                'nama_makanan' => $this->input->post('nama_makanan'), 
                'id_kategori' => $this->input->post('id_kategori'), 
                'harga' => $this->input->post('harga'),
                'koki' => $this->input->post('koki'),  
                'stok' => $this->input->post('stok'),
                'foto_cover' => $file_cover
             );
        }
        return $this->db->insert('makanan', $object);
    }
    public function detail($a)
    {
        $tm_makanan=$this->db
                      ->join('kategori', 'kategori.id_kategori=makanan.id_kategori')
                      ->where('id_makanan', $a)
                      ->get('makanan')
                      ->row();
        return $tm_makanan;
    }
    public function edit_makanan()
    {
        $data = array(
                'id_makanan' => $this->input->post('id_makanan'), 
                'nama_makanan' => $this->input->post('nama_makanan'), 
                'id_kategori' => $this->input->post('id_kategori'), 
                'stok' => $this->input->post('stok'), 
                'harga' => $this->input->post('harga'),  
                'koki' => $this->input->post('koki')

            );

        return $this->db->where('id_makanan', $this->input->post('id_makanan_lama'))
                        ->update('makanan', $data);
    }
    public function edit_makanan_dengan_foto($file_cover)
    {
        $data = array(
                'id_makanan' => $this->input->post('id_makanan'), 
                'nama_makanan' => $this->input->post('nama_makanan'),  
                'id_kategori' => $this->input->post('id_kategori'), 
                'stok' => $this->input->post('stok'), 
                'harga' => $this->input->post('harga'), 
                'koki' => $this->input->post('koki'),
                'foto_cover' => $file_cover

            );

        return $this->db->where('id_makanan', $this->input->post('id_makanan_lama'))
                        ->update('makanan', $data);
    }
    public function hapus_makanan($id_makanan='')
    {
        return $this->db->where('id_makanan', $id_makanan)
                    ->delete('makanan');
    }
    

}

/* End of file M_makanan.php */
/* Location: ./application/models/M_makanan.php */