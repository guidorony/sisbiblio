<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuario_model','usuario');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('usuario_view');
	}

	public function ajax_list()
	{
		$list = $this->usuario->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $usuario) {
			$no++;
			$row = array();
			$row[] = $usuario->usua_login;
			$row[] = $usuario->usua_password;
			$row[] = $usuario->usua_codigo;
			$row[] = $usuario->usua_nombres;
			$row[] = $usuario->usua_apellidos;
			$row[] = $usuario->usua_direccion;
			$row[] = $usuario->usua_email;
			$row[] = $usuario->usua_telefono;
			$row[] = $usuario->usua_esadmin;


			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_usuario('."'".$usuario->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_usuario('."'".$usuario->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->usuario->count_all(),
						"recordsFiltered" => $this->usuario->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->usuario->get_by_id($id);
		$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'usua_login' => $this->input->post('usua_login'),
				'usua_password' => $this->input->post('usua_password'),
				'usua_codigo' => $this->input->post('usua_codigo'),
				'usua_nombres' => $this->input->post('usua_nombres'),
				'usua_apellidos' => $this->input->post('usua_apellidos'),
				'usua_direccion' => $this->input->post('usua_direccion'),
				'usua_email' => $this->input->post('usua_email'),
				'usua_telefono' => $this->input->post('usua_telefono'),
				'usua_esadmin' => $this->input->post('usua_esadmin'),
			);
		$insert = $this->usuario->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'usua_login' => $this->input->post('usua_login'),
				'usua_password' => $this->input->post('usua_password'),
				'usua_codigo' => $this->input->post('usua_codigo'),
				'usua_nombres' => $this->input->post('usua_nombres'),
				'usua_apellidos' => $this->input->post('usua_apellidos'),
				'usua_direccion' => $this->input->post('usua_direccion'),
				'usua_email' => $this->input->post('usua_email'),
				'usua_telefono' => $this->input->post('usua_telefono'),
				'usua_esadmin' => $this->input->post('usua_esadmin'),
			);
		$this->person->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->usuario->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('usua_login') == '')
		{
			$data['inputerror'][] = 'usua_login';
			$data['error_string'][] = 'usua login is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('usua_password') == '')
		{
			$data['inputerror'][] = 'usua_password';
			$data['error_string'][] = 'password  is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('usua_codigo') == '')
		{
			$data['inputerror'][] = 'usua_codigo';
			$data['error_string'][] = 'tu codigo is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('usua_nombres') == '')
		{
			$data['inputerror'][] = 'usua_nombres';
			$data['error_string'][] = 'nombres is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('usua_apellidos') == '')
		{
			$data['inputerror'][] = 'usua_apellidos';
			$data['error_string'][] = 'Apellidos is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('usua_direccion') == '')
		{
			$data['inputerror'][] = 'usua_direccion';
			$data['error_string'][] = 'direccion is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('usua_email') == '')
		{
			$data['inputerror'][] = 'usua_email';
			$data['error_string'][] = 'email is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('usua_telefono') == '')
		{
			$data['inputerror'][] = 'usua_telefono';
			$data['error_string'][] = 'telefono is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('usua_esadmin') == '')
		{
			$data['inputerror'][] = 'usua_esadmin';
			$data['error_string'][] = '';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
