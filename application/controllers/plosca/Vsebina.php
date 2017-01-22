<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vsebina extends CI_Controller {
	public $log;
	private $l;

	public function __construct(){
		parent::__construct();

		/*$this->load->library('form_validation');
		$this->load->library('table');
		$this->load->model('administrator/product_model');*/
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->database();
		
		$this->l = $this->config->item('logged_var');
		if($this->session->userdata($this->l) != 1){			
			redirect('prijava');
		}
		
  }

	public function index(){
		if($this->session->userdata($this->l) == 1){
			redirect('plosca/seznam');
		}
		else{
			redirect('prijava');
		}
	}
	
	public function seznam(){		
		//$content = $this->load->view("plosca/seznam", array("data" => $data), true );
		$content = $this->load->view("plosca/seznam", array("user" => $this->session->userdata("username")));		
		//$this->render($content);
	}
	
	public function novo(){
		
		$this->form_validation->set_rules('naslov', 'Naslov', 'required');
		$this->form_validation->set_rules('kategorija', 'Kategorija', 'required');		
		$this->form_validation->set_rules('cas', 'Datum zapadlosti', 'required');
		$this->form_validation->set_rules('opis', 'Opis', 'required');
		$this->load->model('task_model');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("plosca/novo", array("errors" => validation_errors(), "user" => $this->session->userdata("username")));			
		}
		else
		{
			//vpis v db
			//var_dump($this->input->post());
			//var_dump($this->session->userdata());
			//die();
			
			$dataToSave["name"] = $this->input->post("naslov");
			$dataToSave["date"] = $this->input->post("cas");
			$dataToSave["taskDesc"] = $this->input->post("opis");
			$dataToSave["user_id"] = $this->session->userdata("id");
			$dataToSave["cat_id"] = $this->input->post("kategorija");			
			
			
			//$result = $this->register_model->regUser($dataToSave, "todo_users");
			$result = $this->task_model->form_insert($dataToSave, "todo_task");
			
			if($result > 0){
				//pass and username are correct
				$this->session->set_flashdata("error" , "Opravilo shranjeno!");
				redirect('plosca/novo');
			}else{
				//reload page - username and password are incorrect				
				$this->session->set_flashdata("error" , "Napaka pri vpisu!");
				redirect('plosca/novo');
			}
		}
		//$content = $this->load->view("plosca/novo", array("user" => $this->session->userdata("username")));
	}
	
	public function opravljeno(){
		$content = $this->load->view("plosca/opravljeno", array("user" => $this->session->userdata("username")));		
	}
	
	public function opomniki(){
		$content = $this->load->view("plosca/opomniki", array("user" => $this->session->userdata("username")));		
	}
	
	public function uporabnik(){
		$content = $this->load->view("plosca/uporabnik", array("user" => $this->session->userdata("username")));		
	}
	
	

	/*public function dodajanjeVsebine($errors=null){
		$this->load->model('administrator/content_model');
		$options = $this->content_model->getContentTypes();
		$templates = $this->content_model->getTemplates();
		$products = $this->product_model->getAllProducts();

		$selected = 1;

		if( $this->input->post('submit') ){
		
			if ( !self::contentValidation() ){
				//validation errors
				$err = array("errors" => validation_errors() );
				$selected = $this->input->post('content_type_id');
				$content = $this->load->view("administrator/dodajanje-vsebine", 
										array(
											"postData" => $this->input->post(),
											"options" => $options, 
											"selected" => $selected,
											'errors' => $err, 
											"img" => "",
											'products' => $products,
											"templates" => $templates
										), 
										true);
				$this->render($content);

			}else{

				$rel_products = "";
        if ($this->input->post('rel_products')){
	        foreach ($this->input->post('rel_products') as $key => $product_id) {
	            $rel_products .= $product_id.",";
	        }
        }
        unset($_POST['rel_products']);
        $_POST['related_products'] =  substr($rel_products, 0, -1); 

				foreach ($this->input->post() as $key => $value) {
					if($key != "submit" && $key != "userfile"){
						$dataToSave[$key] = $value;
					}	
				}
				$dataToSave['alias'] = $this->stringURLSafe($dataToSave['title']);
				
				//Pogledamo, če se je vsebina uspešno shranila v bazo
				if( $this->db->affected_rows() > 0 ){
					$this->log[] = "Vsebina je bila uspešno shranjena!";
				}
				$dataToSave['language']	= $this->session->userData('lang');

				//transfering data to model
				$this->load->model('administrator/insert_model');
				$id = $this->insert_model->form_insert($dataToSave, "tauria_content");

				//Uploadamo sliko, če obstaja
				if( !empty($_FILES['userfile']['name']) ){
					$file = self::do_upload();
					// $this->content_model->saveImage($file['file_name'], $id, $file['file_path'] );
					//Če je bil slika uspešno naložena, jo shranimo v bazo
					if( !empty($file) ){
						$this->log[] = "Slika je bila uspešno naložena";
						$this->content_model->saveImage($file['file_name'], $id, $file['file_path'] );
					}
					$this->session->set_flashdata('log', $this->log);
				}

				redirect('administrator/vsebina');				
			}
		}else{
			$content = $this->load->view("administrator/dodajanje-vsebine", 
										array(
											"options" => $options,
											"selected" => $selected,
											"templates" => $templates,
											'products' => $products,
											), 
										true);
			$this->render($content);
		}	
	}

	public function urejanjeVsebine($id=0){
		$this->load->model('administrator/content_model');
		$options 	= $this->content_model->getContentTypes();
		$data 		= $this->content_model->getContentById($id);
		$img 		= $this->content_model->getImageOfContent($id);
		$templates 	= $this->content_model->getTemplates();
		$products = $this->product_model->getAllProducts();
					
		if ( $this->input->post() ){
			// post request je poslan
			$id = $this->input->post('id');
							
			if ( !self::contentValidation() ){
				//validation errors
				$err = array("errors" => validation_errors() );
				// $this->errors[] = $err['errors'];

				$content = $this->load->view(
									"administrator/urejanje-vsebine", 
									array(
										"postData" => $this->input->post(),
										"options" => $options, 
										'errors' => $err, 
										"img" => $img, 
										'products' => $products,
										"templates" => $templates
									), 
									true
									);
				$this->render($content);

			}else{
				//update content
				$rel_products = "";
        if ($this->input->post('rel_products')){
	        foreach ($this->input->post('rel_products') as $key => $product_id) {
	            $rel_products .= $product_id.",";
	        }
        }
        unset($_POST['rel_products']);
        $_POST['related_products'] =  substr($rel_products, 0, -1); 

				foreach ($this->input->post() as $key => $value) {
					if($key != "submit" && $key != "userfile"){
						$dataToUpdate[$key] = $value;
					}	
				}
				$dataToUpdate['alias'] = $this->stringURLSafe($dataToUpdate['title']);
				$this->db->where('id', $id);
				$this->db->update('tauria_content', $dataToUpdate);

				//Pogledamo, če se je vsebina uspešno shranila v bazo
				if( $this->db->affected_rows() > 0 ){
					$this->log[] = "Vsebina je bila uspešno shranjena!";
				}

				//Uploadamo sliko, če obstaja
				if( !empty($_FILES['userfile']['name']) ){
					$file = self::do_upload();

					//Če je bil slika uspešno naložena, jo shranimo v bazo
					if( !empty($file) ){
						$this->log[] = "Slika je bila uspešno naložena";
						$this->content_model->saveImage($file['file_name'], $id, $file['file_path'] );
						
					}
				}
				$this->session->set_flashdata('log', $this->log);
				redirect('administrator/vsebina/urejanjeVsebine/' . $id);
			}
		}else{
			$content = $this->load->view("administrator/urejanje-vsebine", 
										array(
											"data" => $data, 
											"options" => $options, 
											"img" => $img,
											'products' => $products,
											"templates" => $templates
										), 
										true);
			$this->render($content);
		}
		
	}

	public function shraniVsebino(){
		$this->load->model('administrator/content_model');
		
		$this->form_validation->set_rules('title', 'Naslov', 'required');
		$this->form_validation->set_rules('full_text', 'Vsebina', 'required');

		if($this->form_validation->run() == FALSE ){
			redirect('administrator/dodajanjeVsebine', array("errors" => validation_errors()));
		}else{
			foreach ($this->input->post() as $key => $value) {
				if($key != "submit" && $key != "userfile"){
					$data[$key] = $value;
				}	
			}
			// $data['content_type_id'] 	= 1;
			$data['language']			= $this->sessions->userData('lang');

			//transfering data to model
			$this->load->model('administrator/insert_model');
			$this->insert_model->form_insert($data);

			//Uploadamo sliko, če obstaja
			if( !empty($_FILES['userfile']['name']) ){
				$file = self::do_upload();
				$this->content_model->saveImage($file['file_name'], $id, $file['file_path'] );
			}
			//loading view
			$content = $this->load->view("administrator/vsebina", true);
			$this->render($content);
		}
	}

	public function deleteContent($id){
		$this->load->model('administrator/content_model');
		$this->content_model->deleteContent($id);
		redirect('administrator/vsebina');
	}

	

	public function contentValidation(){
		
		$this->form_validation->set_rules('title', 'Naslov', 'required');
		$this->form_validation->set_rules('full_text', 'Vsebina', 'required');

		if($this->form_validation->run() == FALSE ){
			return false;
		}else{
			return true;
		}
	}

	public function do_upload(){
		$config['upload_path'] = './media/images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload() )
		{
			$error = array('error' => $this->upload->display_errors());
			$this->errors[] = $error['error'];
			$this->session->set_flashdata('error', $error['error']);
		}
		else
		{
			$data = $this->upload->data();

			//naredimo thumbnail
			$image = $data;
			$this->load->library('image_lib');
			$thumbnail = 'thumb_' . $image['file_name'];
		
			$config = array(
				'image_library' 	=> 'gd2',
			    'source_image'      => $image['full_path'],
			    'new_image'			=> $thumbnail,
			    'maintain_ratio'    => true,
			    'width'             => $this->config->item('thumb_width'),
			    'height'            => $this->config->item('thumb_height'),
		    );
		    $this->image_lib->initialize($config);
		    $this->image_lib->resize();

		    if(($image['image_width'] / $image['image_height']) > $this->config->item('thumb_ratio')){
	        	$config['master_dim'] = 'height';
	    	}else{
	        	$config['master_dim'] = 'width';
	    	}

	    	$this->image_lib->initialize($config);
		    $this->image_lib->resize();
		    $this->image_lib->clear();

		    // croping image
		    unset($config);
		    $sourceImage = $image['file_path'] . $thumbnail;
			
			if ( $img_dim = getimagesize($sourceImage) ){
				list($thumb_width, $thumb_height) = $img_dim;
			}

		    $config = array(
				'image_library' 	=> 'gd2',
			    'source_image'      => $sourceImage,
			    'maintain_ratio'    => false,
			    'width'             => $this->config->item('thumb_width'),
			    'height'            => $this->config->item('thumb_height')
		    );

		    $x1 = ($thumb_width - $this->config->item('thumb_width')) / 2;
	    	$y1 = ($thumb_height - $this->config->item('thumb_height')) / 2;
	    	$config['x_axis'] = $x1;
			$config['y_axis'] = $y1;
		    
		    $this->image_lib->initialize($config);
		    $this->image_lib->crop();

			// $this->session->set_flashdata('log', "Slika je bila uspešno naložena");
			return $data;
		}
	}

	public function izbrisiSliko($id){
		$this->load->model('administrator/content_model');
		$this->content_model->deleteImgFromContent($id);
		redirect('administrator/vsebina/urejanjeVsebine/' . $id);
	}

	function copyContent($from, $to){
		$tmp = $this->db->query("SELECT * from tauria_content WHERE language=?", array($from));

		if( $tmp->num_rows() > 0){
			foreach ($tmp->result() as $key => $row):
				$row->language  = $to;
				$row->id 		= "";
				$this->db->insert('tauria_content', $row);
			endforeach;
		}else{
			echo "FALSE";
		}
		echo "OK";
	}*/
}

?>