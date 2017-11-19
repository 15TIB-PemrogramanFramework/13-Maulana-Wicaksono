<?php 

/**
* 
*/
class hewan extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Hewan_model');
        $this->load->model('Titip_model');
        $this->load->model('Adopsi_model');
        $this->load->model('Member_model');
    }

    function hewan()
    {
        $data['hewan']=$this->Hewan_model->ambil_datahewan();
        $this->load->view('Hewan',$data);

    }

    function tambahhewan() {
        $this->load->view('Tambahhewan');
    }

    function tambahhewanaksi() {
      $this->load->library('upload');
        $nmfile = "".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '3072'; //maksimum besar file 3M
        $config['max_width']  = '5000'; //lebar maksimum 5000 px
        $config['max_height']  = '5000'; //tinggi maksimu 5000 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $config['width'] = 75;
        $xonfig['height'] = 50;

        $this->upload->initialize($config);
        
        if($_FILES['gambar_hewan']['name'])
        {
            if ($this->upload->do_upload('gambar_hewan'))
            {
                $gbr = $this->upload->data();
                $data = array(
                'gambar_hewan'                =>$gbr['file_name'],
                'kode_hewan'                    => $this->input->post('kode_hewan'),
                'jenis_hewan'            => $this->input->post('jenis_hewan'),
                'umur_hewan'                 => $this->input->post('umur_hewan'),
                'status_hewan'                  => 'Not Adopted'
                );
                $this->Hewan_model->tambah_data($data); //akses model untuk menyimpan ke database

                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Insert data berhasil !!</div></div>");
                redirect('Hewan/adopsiadmin'); //jika berhasil maka akan ditampilkan view upload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Insert data gagal !!</div></div>");
                redirect('Hewan/tambahhewan'); //jika gagal maka akan ditampilkan form upload
            }
    }
}

    function adopsiadmin() 
    {
        $data['adopsi']=$this->Adopsi_model->ambil_dataadopsi();
        $this->load->view('Adopsiadmin',$data);
    }

    function adopsii(){

        $data=array(
            'username_member' => $this->Member_model->get_option(),
            'kode_hewan' => $this->Hewan_model->get_option(),
            'jenis_hewan'=> set_value('jenis_hewan'),
            'status_adopsi'=> 'On Process'
            );
        $data['hewan']=$this->Hewan_model->ambil_datahewan();
        $this->load->view('Hewan',$data);
    }

    function adopsi()
    {
        $data=array(
            
            'username_member' => $this->session->userdata('username'),
            'kode_hewan' => $this->input->post('kode_hewan'),
            'jenis_hewan'=> $this->input->post('jenis_hewan'),
            'status_adopsi'=> 'On Process'
            );
        
        $data1=array(
            'status_hewan'=> 'On Process'
            );

        $id = $this->input->post('kode_hewan');
        $this->Hewan_model->edit_data($id,$data1);

        $this->Adopsi_model->tambah_data($data);
        redirect(site_url('Hewan/hewan'));

    }

    function deleteadopsi($id)
    {
        $this->Adopsi_model->hapus_data($id);
        redirect(site_url('Hewan/adopsiadmin'));
    }

    function updateadopsi($id,$id1)
    {
        $data1=array(
            'status_hewan'=> 'Adopted'
            );

        $data=array(
            'status_adopsi'=> 'Adopted'
            );

        $this->Hewan_model->edit_data($id1,$data1);

        $this->Adopsi_model->edit_data($id,$data);
        redirect(site_url('Hewan/adopsiadmin'));   
    }

}


?>