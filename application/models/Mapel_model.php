<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mapel_model extends CI_Model{
	private $_table = 'cbt_topik';
	
    public $topik_id;
    public $topik_modul_id = 9;
    public $topik_nama;
    public $topik_detail;
    public $topik_image;
    public $topik_aktif;

    public function rules()
    {
        # code...
        return [
            ['field' => 'topik_nama',
            'label' => 'Nama Mapel',
            'rules' => 'required'],

            ['field' => 'topik_detail',
            'label' => 'Deskripsi singkat',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table, ["topik_modul_id" => $this->topik_modul_id])->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["topik_id" => $id])->row();
    }

    public function save()
    {
        # code...
        $post = $this->input->post();
        $this->topik_modul_id = $post['topik_modul_id'];
        $this->topik_nama = $post['topik_nama'];
        $this->topik_detail = $post['topik_detail'];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        # code...
        $post = $this->input->post();
        $this->topik_id = $post['topik_id'];
        $this->topik_modul_id = $post['topik_modul_id'];
        $this->topik_nama = $post['topik_nama'];
        $this->topik_detail = $post['topik_detail'];
        return $this->db->update($this->_table, $this, array('topik_id' => $post['topik_id']));
    }

    public function delete($id)
    {
        # code...
        return $this->db->delete($this->_table, array('topik_id' => $id));
    }
}