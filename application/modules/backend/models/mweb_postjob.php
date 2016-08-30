<?php
class Mweb_postjob extends MY_Model{
    protected $_table = 'post_jobs';
    protected $_pk = 'id';

    public function __construct(){
        parent::__construct();
    }

    public function upload_image_com($id){
    	$file = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/public/backend/images/company/';
    	if( !is_dir($file) ){
    		mkdir($file);
    	}
        $config['upload_path'] = $file;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '10240';
        $config['overwrite'] = TRUE;

		$this->load->library('upload', $config);
        
        // Nếu upload thành công
		if ($this->upload->do_upload('company_logo'))
		{
            $data = $this->upload->data();
            $image = $file.$id.'_'.rand(1000, 1000000).$data['file_ext'];
            $savename = str_replace($file, 'public/backend/images/company/', $image);
            rename($data['full_path'], $image );
            $this->update(array('company_logo' => $savename), "id = $id");
            
            // Đóng dấu bản quyền
            /*$this->load->library('image_lib');
            
            $config['source_image']	= FCPATH.'/'.$image;
            $config['wm_text'] = ' ';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = FCPATH .'/public/fonts/arial.ttf';
            $config['wm_font_size']	= '28';
            $config['wm_font_color'] = '000000';
            $config['wm_vrt_alignment'] = 'top';
            $config['wm_hor_alignment'] = 'right';
            $config['wm_padding'] = '20';
            $config['wm_opacity'] = 10;
            
            $this->image_lib->initialize($config); 
            
            $this->image_lib->watermark();
            
            $this->image_lib->clear();*/
            
            /*$thumb = $file .'/'.$savename;
            copy($image, $file.'/'.$thumb);
            $this->image_lib->initialize(array(
                'source_image'	=> FCPATH.'/'.$file.'/'.$thumb,
                'create_thumb' => false,
                'maintain_ratio' => false,
                'width'	=> 150,
                'height' => 220
            )); 
            
            $this->image_lib->resize();*/
            
		} else{
            return false;
        }
    }

}