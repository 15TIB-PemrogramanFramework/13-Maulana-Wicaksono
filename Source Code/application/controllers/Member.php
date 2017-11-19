<?php 

/**
* 
*/
class Member extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
        $this->load->model('User');
    }

    function register(){
        

        $data=array(
            'username_member' => $this->input->post('username_member'),
            'password_member' => $this->input->post('password_member'),
            'nama_member' => $this->input->post('nama_member'),
            'alamat_member'=> $this->input->post('alamat_member'),
            'noHP_member'=> $this->input->post('noHP_member')
            );
        $this->User->regis($data);
        redirect(site_url('Welcome/awalmember'));
    }

    function member()
    {
        $data['member']=$this->Member_model->ambil_data();
        $this->load->view('Memberadmin',$data);

    }

    function update($id)
    {
        $member = $this->Member_model->ambil_data_id($id);
        $data = array(
            'aksi'                  => site_url('Member/update_aksi'),
            'username_member'                    => set_value('username_member',$member->username_member),
            'password_member'            => set_value('password_member',$member->password_member),
            'nama_member'                 => set_value('nama_member',$member->nama_member),
            'alamat_member'                  => set_value('alamat_member',$member->alamat_member),
            'noHP_member'                  => set_value('noHP_member',$member->noHP_member),
            'button'                => 'Update'
            );
        $this->load->view('Updatememberadmin',$data);      
    }

    function update_aksi()
    {
        $data = array(
            'username_member'         => $this->input->post('username_member'),
            'password_member'         => $this->input->post('password_member'),
            'nama_member'         => $this->input->post('nama_member'),
            'alamat_member'       => $this->input->post('alamat_member'),
            'noHP_member'       => $this->input->post('noHP_member')        
             );  
        $id = $this->input->post('username_member');
        $this->Member_model->edit_data($id,$data);
        redirect(site_url('Member/member'));
    }
}


 ?>