<?php 

/**
* 
*/
class titip extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Titip_model');
        $this->load->model('Pelayan_model');
        $this->load->model('Member_model');
        $this->load->model('Hewan_model');
        $this->load->model('Adopsi_model');
    }

    function titip()
    {
        $data['titip']=$this->Titip_model->ambil_datatitip();
        $this->load->view('Titipadmin',$data);

    }

    function titipp(){
        $data=array(
            //'kode_titip' => set_value('kode_titip'),
            'username_member' => $this->Member_model->get_option(),
            'id_pelayan' => $this->Pelayan_model->get_option(),
            'jenis_hewan'=> set_value('jenis_hewan'),
            'status'=> set_value('On Going')
            );
        $data['titip']=$this->Pelayan_model->ambil_datapelayan();
        $this->load->view('Titip',$data);
    }

    function deletetitip($id){
        $this->Titip_model->hapus_data($id);
        redirect(site_url('/Titip/titip'));
    }

    function updatetitip($id){

        $data=array(
            'status'=> 'Completed'
            );
        $this->Titip_model->edit_data($id,$data);
        redirect(site_url('Titip/titip'));
    }

    function tambahh() {
        $data=array(
            //'kode_titip' => $this->input->post('kode_titip'),
            'username_member' => $this->input->post('username_member'),
            'id_pelayan' => $this->input->post('id_pelayan'),
            'jenis_hewan'=> $this->input->post('jenis_hewan'),
            'status'=> $this->input->post('status')
            );
        $this->Titip_model->tambah_data($data);
        redirect(site_url('Titip/titipp'));
    }
}


 ?>