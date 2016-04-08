<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('image_lib');
        
    }
    public function text()
    {
        $config['source_image']     = './upload/contoh.jpg'; //The image path,which you would like to watermarking
        $config['wm_text']          = 'Agit Naeta';
        $config['wm_type']          = 'text';
        $config['wm_font_path']     = './assets/fonts/lato/Lato-Regular.ttf';
        $config['wm_font_size']     = 16;
        $config['wm_font_color']    = 'ffffff';
        $config['wm_vrt_alignment'] = 'middle';
        $config['wm_hor_alignment'] = 'center';
        $config['wm_padding']       = '20';
        $this->image_lib->initialize($config);
        
        if (!$this->image_lib->watermark()) {
            echo $this->image_lib->display_errors();
        }
        
    }
    public function overlay()
    {
        $config['image_library']    = 'gd2';
        $config['source_image']     = './upload/web-hosting.png';
        $config['wm_type']          = 'overlay';
        $config['wm_overlay_path']  = './assets/img/bg.png'; //the overlay image
        $config['wm_opacity']       = 50;
        $config['wm_vrt_alignment'] = 'middle';
        $config['wm_hor_alignment'] = 'right';
        
        $this->image_lib->initialize($config);
        
        if (!$this->image_lib->watermark()) {
            echo $this->image_lib->display_errors();
        }
        
    }
    public function resize()
    {
        //$this->load->library('image_lib');
        $config['image_library'] = 'gd2';
         $config['source_image']     = './upload/bukber_369.jpg';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']    = 75;
        $config['height']   = 50;
        $config['overwrite'] = TRUE;

        $this->load->library('image_lib',$config); 
        $this->image_lib->initialize($config);

        if (!$this->image_lib->resize()) 
        {
            echo $this->image_lib->display_errors();

        }
        else
        {
            echo "<img src='".base_url()."upload/contoh.jpg'>";
        }
    }
    
}
 