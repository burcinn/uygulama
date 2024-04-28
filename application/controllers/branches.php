<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branches extends CI_Controller {


	public $viewFolder = "";

	public function __construct()
    {
        parent::__construct();
        
        $this-> viewFolder= "branches_v";  
		$this->load->model("branches_model");
 
    }
	public function index()
	{
		$this->load->model('branches_model');
		$items = $this->branches_model->getAll();

		

		$viewData = new stdClass();
        $viewData->viewFolder =$this->viewFolder;
        $viewData->subViewFolder="list";
		$viewData->items =$items;
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);		
		
	}
	public function new_form()
		{
		$viewData = new stdClass();
        $viewData->viewFolder =$this->viewFolder;
        $viewData->subViewFolder="add";
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);		
		
		}

		public function save(){
			//kutuphane yuklendı
			$this->load->library("form_validation");
	
			//kurallar
			$this->form_validation->set_rules("title", "Marka adı ","required|trim");
			$this->form_validation->set_rules("adress", "Adres ","required|trim");
			//mesajlar
			$this->form_validation->set_message(
				array(
				"required"=>"<b>{field}</b>  Alanı Doldurulmalıdır"
				)
			);
			//calıstırılnası
			$validate=$this->form_validation->run(); 
	
			if($validate){
				//echo "Kayıt başarılı";
				$data=array(
					"title"=>$this->input->post("title"),
					"adress"=>$this->input->post("adress")
				);
				$insert=$this->branches_model->add($data);
				if($insert){
					redirect(base_url("branches"));
				}
				else{
					echo "Kayıt sırasında hata";
				}
			}
			else {
			//echo "validasyon başarısız";
			$viewData = new stdClass();
			$viewData->viewFolder=$this->viewFolder;
			$viewData->subViewFolder="add";
			$viewData->formError=true;
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
			}
	
		}
		public function delete($id)
		{
			$data= array(
				"id"=>$id
			);
			$this->branches_model->delete($data);
			//100 alert sistemi entegre edilecektir..
			redirect(base_url("branches"));
		}
		
		public function update_Form($id)
		{
			$item=$this->branches_model->get(
			array(
				"id"=>$id
			)
			);
			$viewData = new stdClass();
			$viewData->item =$item;
			$viewData->viewFolder =$this->viewFolder;
			$viewData->subViewFolder="update";
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);	
			
		}

		public function update($id)
		{
			$this->load->library("form_validation");
	
			//kurallar
			$this->form_validation->set_rules("title", "Marka adı ","required|trim");
			$this->form_validation->set_rules("adress", "Adres ","required|trim");
			//mesajlar
			$this->form_validation->set_message(
				array(
				"required"=>"<b>{field}</b>  Alanı Doldurulmalıdır"
				)
			);
			//calıstırılnası
			$validate=$this->form_validation->run(); 
	
			if($validate){
				//echo "Kayıt başarılı";
				$data=array(
					"title"=>$this->input->post("title"),
					"adress"=>$this->input->post("adress")
				);
				$update=$this->branches_model->update(
					array(
						"id"=>$id
					),
					$data

				);
				if($update)
				{
					redirect(base_url("branches"));

				}
				else
				{
					echo "Kayıt başarısız";
				}
		
			}
		else{
			$item=$this->branches_model->get(
				array(
					"id"=>$id
				)
				);
				$viewData = new stdClass();
				$viewData->item =$item;
				$viewData->subViewFolder="update";
				$viewData->viewFolder =$this->viewFolder;
				$viewData->formError=true;
				$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);	
		}
	}
}