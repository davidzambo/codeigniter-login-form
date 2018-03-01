<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->load->database();      
      $this->load->model('user_model');
    }
    
    public function index()
    {
      $this->load->database();
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[64]|is_unique[user.username]',
            array('required' => 'A felhasználónév megadása kötelező.',
                  'min_length' => 'A felhasználónév legalább 3 karakter kell, hogy legyen.',
                  'max_length' => 'A felhasználónév maximum 64 karakter lehet.',
                  'is_unique' => 'A felhasználónév már létezik.' ));

      $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]|max_length[128]|valid_email|is_unique[user.email]',
            array('required' => 'Az e-mail cím megadása kötelező',
                  'min_length' => 'A e-mail cím legalább 3 karakter kell, hogy legyen.',
                  'max_length' => 'A e-mail cím maximum 128 karakter lehet.',
                  'valid_email' => 'Az e-mail cím nem valós.',
                  'is_unique' => 'Az e-mail cím már regisztrálva van.'));
      $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|callback_password_check',
                array('required' => 'A jelszó megadása kötelező',
                  'min_length' => 'A jelszó legalább 7 karakter kell, hogy legyen.',
                  'is_unique' => 'Az e-mail cím már regisztrálva van.'));
      $this->form_validation->set_message('password_check', 'A jelszó legalább 7 karakter, kisbetűt, nagybetűt és számot is tartalmaz.');
      $this->form_validation->set_rules('password_confirm', 'Password confirm', 'trim|required|matches[password]',
                array('required' => 'A jelszó megerősítése kötelező',
                  'matches' => 'A jelszó megerősítése nem egyezik a beírt jelszóval.'));
      
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><small>', '</small></div>');

      if (!$this->form_validation->run()){

        $this->load->view('registration_form');

      } else {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');

        $data = array(
          'username' => $this->input->post('username'),
          'email' => $this->input->post('email'),
          'password' => password_hash($this->input->post('email'), PASSWORD_BCRYPT),
        );
        $this->db->insert('user', $data);
        $query = $this->db->get('user');
        $config = array(
          'root' => 'root',
          'element' => 'element',
          'newline' => "\n",
          'tab' => "\t"
        );

        header('Content-type: text/xml');
        $xml = $this->dbutil->xml_from_result($query, $config);
        $filename = 'user_export.xml'; 
        write_file($filename, $xml);
        force_download($filename, $xml);
        $this->load->view('registration_form');
      }
    }


    public function check_username(){
      echo $this->db->where('username', $this->input->post('username'))->get('user')->num_rows();
    }


    public function check_email(){
      echo $this->db->where('email', $this->input->post('email'))->get('user')->num_rows();
    }


    public function password_check($str)
    {
      if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{7,}$/', $str)) {
        return true;
      }
      return false;
    }
}
