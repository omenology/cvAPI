<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Cv extends CI_Controller {
	
	use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }

	function __construct(){
		parent::__construct();
        $this->__resTraitConstruct();

        $this->load->model('Cv_model');
	}

	public function profile_get(){
		$data = $this->Cv_model->getProfile();
		if($data){
			$this->response([
	            'status' => true,
	            'data' => $data
	        ], 200);
		}else{
			$this->response([
                'status' => false,
                'message' => 'tidak ada data yang ditemukan'
            ], 204);
		}
	}

	public function profile_put(){
		$data = [
			'nama' => $this->put('nama'),
			'lahir' => $this->put('lahir'),
			'deskripsi' => $this->put('deskripsi'),
			'alamat' => $this->put('alamat')
		];

		if($this->Cv_model->updateProfile($data) > 0){
			$this->response([
                'status' => true,
                'message' => 'Data berhasil diubah'
            ], 200);
		}else{
			$this->response([
                'status' => false,
                'message' => 'Data gagal diubah'
            ], 304);
		}
	}

	public function kemampuan_get(){
		$data = $this->Cv_model->getKemampuan();
		if($data){
			$this->response([
	            'status' => true,
	            'data' => $data
	        ], 200);
		}else{
			$this->response([
                'status' => false,
                'message' => 'tidak ada data yang ditemukan'
            ], 204);
		}
	}

	public function kemampuan_post(){
		$data = $this->input->post(['nama','value','jenis'],true);
	
		if(in_array(null,$data) || in_array('',$data)){
			$this->response([
                'status' => false,
                'message' => 'Data yang dimasukan tidak valid'
            ], 400);
		}else{
			if($this->Cv_model->insertKemampuan($data) > 0){
				$this->response([
	                'status' => true,
	                'message' => 'Data berhasil dimasukan'
	            ], 200);	
			}else{
				$this->response([
	                'status' => false,
	                'message' => 'Data gagal ditambakan'
	            ], 404);
			}
		}
	}

	public function kemampuan_put(){
		$id = $this->put('id');
		$data = [
			'nama' => $this->put('nama'),
			'value' => $this->put('value'),
			'jenis' => $this->put('jenis')
		];

		if($id){
			if(in_array(null,$data) || in_array('',$data)){
				$this->response([
	                'status' => false,
	                'message' => 'Data yang dimasukan tidak valid'
	            ], 400);
	        }else{
	        	if($this->Cv_model->updateKemampuan($id,$data) > 0){
	        		$this->response([
	        			'status' => true,
	        			'message' => 'data berhasil diubah'
	        		],200);
	        	}else{
	        		$this->response([
	        			'status' => false,
	        			'message' => 'data gagal diubah'
	        		],200);
	        	}
	        }
		}else{
			$this->response([
                'status' => false,
                'message' => 'ID dibutuhkan'
            ], 400);
		}
	}

	public function kemampuan_delete(){
		$id = $this->delete('id');
		 if($id){
		 	if($this->Cv_model->deleteKemampuan($id) > 0){
		 		$this->response([
        			'status' => true,
        			'message' => 'data berhasil dihapus'
        		],200);
		 	}else{
		 		$this->response([
	                'status' => false,
	                'message' => 'id tidak ditemukan'
	            ], 400);	
		 	}
		 }else{
		 	$this->response([
                'status' => false,
                'message' => 'ID dibutuhkan'
            ], 400);	
		 }
	}

	public function pendidikan_get(){
		$data = $this->Cv_model->getPendidikan();
		if($data){
			$this->response([
	            'status' => true,
	            'data' => $data
	        ], 200);
		}else{
			$this->response([
                'status' => false,
                'message' => 'tidak ada data yang ditemukan'
            ], 204);
		}
	}

	public function pendidikan_post(){
		$data = $this->input->post(['intansi','tahun','deskripsi','gambar'],true);
	
		if(in_array(null,$data) || in_array('',$data)){
			$this->response([
                'status' => false,
                'message' => 'Data yang dimasukan tidak valid'
            ], 400);
		}else{
			if($this->Cv_model->insertPendidikan($data) > 0){
				$this->response([
	                'status' => true,
	                'message' => 'Data berhasil dimasukan'
	            ], 200);	
			}else{
				$this->response([
	                'status' => false,
	                'message' => 'Data gagal ditambakan'
	            ], 404);
			}
		}	
	}

	public function pendidikan_put(){
		$id = $this->put('id');
		$data = [
			'intansi' => $this->put('intansi'),
			'tahun' => $this->put('tahun'),
			'deskripsi' => $this->put('deskripsi'),
			'gambar' => $this->put('gambar')
		];

		if($id){
			if(in_array(null,$data) || in_array('',$data)){
				$this->response([
	                'status' => false,
	                'message' => 'Data yang dimasukan tidak valid'
	            ], 400);
	        }else{
	        	if($this->Cv_model->updatePendidikan($id,$data) > 0){
	        		$this->response([
	        			'status' => true,
	        			'message' => 'data berhasil diubah'
	        		],200);
	        	}else{
	        		$this->response([
	        			'status' => false,
	        			'message' => 'data gagal diubah'
	        		],200);
	        	}
	        }
		}else{
			$this->response([
                'status' => false,
                'message' => 'ID dibutuhkan'
            ], 400);
		}	
	}

	public function project_get(){
		$data = $this->Cv_model->getProject();
		if($data){
			$this->response([
	            'status' => true,
	            'data' => $data
	        ], 200);
		}else{
			$this->response([
                'status' => false,
                'message' => 'tidak ada data yang ditemukan'
            ], 204);
		}
	}

	public function project_post(){
		$data = $this->input->post(['nama','deskripsi','gambar','link'],true);
		if(in_array(null,$data) || in_array('',$data)){
			$this->response([
                'status' => false,
                'message' => 'Data yang dimasukan tidak valid'
            ], 400);
		}else{
			if($this->Cv_model->insertProject($data) > 0){
				$this->response([
	                'status' => true,
	                'message' => 'Data berhasil dimasukan'
	            ], 200);	
			}else{
				$this->response([
	                'status' => false,
	                'message' => 'Data gagal ditambakan'
	            ], 404);
			}
		}
	}

	public function kontak_get(){
		$data = $this->Cv_model->getKontak();
		if($data){
			$this->response([
	            'status' => true,
	            'data' => $data
	        ], 200);
		}else{
			$this->response([
                'status' => false,
                'message' => 'tidak ada data yang ditemukan'
            ], 204);
		}	
	}

	public function kontak_post(){
		$data = $this->input->post(['nama','isi','logo','jenis'],true);
		if(in_array(null,$data) || in_array('',$data)){
			$this->response([
                'status' => false,
                'message' => 'Data yang dimasukan tidak valid'
            ], 400);
		}else{
			if($this->Cv_model->insertKontak($data) > 0){
				$this->response([
	                'status' => true,
	                'message' => 'Data berhasil dimasukan'
	            ], 200);	
			}else{
				$this->response([
	                'status' => false,
	                'message' => 'Data gagal ditambakan'
	            ], 404);
			}
		}	
	}
}