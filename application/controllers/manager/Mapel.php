<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mapel extends Member_Controller {

	private $kode_menu = 'mata-pelajaran';
	private $kelompok = 'e-learning';
	private $url = 'manager/mapel_nama';
	public function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model("mapel_model");
		$this->load->library("form_validation");
	}

	public function index()
	{
		# code...
		$data['kode_menu'] = $this->kode_menu;
        $data['url'] = $this->url;
		$data["mapel"] = $this->mapel_model->getAll();
		 $this->template->display_admin($this->kelompok.'/list_view', 'Mata Pelajaran', $data);
	}

	public function add()
	{
		# code...
	}

}