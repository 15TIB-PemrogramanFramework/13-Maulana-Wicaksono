<?php 

/**
* 
*/
class pelayan extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pelayan_model');
    }

    function pelayan()
    {
        $data['pelayan']=$this->Pelayan_model->ambil_datapelayan();
        $this->load->view('Pelayanadmin',$data);

    }


    function update($id)
    {
        $pelayan = $this->Pelayan_model->ambil_data_id($id);
        $data = array(
            'aksi'                  => site_url('Pelayan/update_aksi'),
            'id_pelayan'                    => set_value('id_pelayan',$pelayan->id_pelayan),
            'nama_pelayan'            => set_value('nama_pelayan',$pelayan->nama_pelayan),
            'umur_pelayan'                 => set_value('umur_pelayan',$pelayan->umur_pelayan),
            'button'                => 'Update'
            );
        $this->load->view('Updatepelayanadmin',$data);      
    }

    function update_aksi()
    {
        $data = array(
            'id_pelayan'          => set_value('id_pelayan',$pelayan->id_pelayan),
            'nama_pelayan'        => set_value('nama_pelayan',$pelayan->nama_pelayan),
            'umur_pelayan'        => set_value('umur_pelayan',$pelayan->umur_pelayan)       
             );  

        $id = $this->input->post('id_pelayan');
        $this->Pelayan_model->edit_data($id,$data);
        redirect(site_url('Pelayan/pelayan'));
    }
}


 ?>