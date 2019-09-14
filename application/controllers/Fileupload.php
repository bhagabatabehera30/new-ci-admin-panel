<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : FileUpload (FileUploadController)
 * User Class to control all user related operations.
 * @author : Bhagabat Behera
 * @version : 1.1
 * @since : 2019
 */
class Fileupload extends BaseController  
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();  

        if((($this->router->method) == "dashboard")  )
        {
           define('css_for_dashboard','Y');
           define('js_for_dashboard','Y');        
       }else{  define('css_for_dashboard','N');
       define('js_for_dashboard','N');      
   } 

// --------load extra css and js  for specific list pages/methods------------------- 
   if(($this->router->method == "userListing")) 
   {
     define('css_for_list_pages','Y');
     define('js_for_list_pages','Y');       
 }else{  define('css_for_list_pages','N');
 define('js_for_list_pages','N');    }

         // --------load extra css and js  for specific ad/edit pages/methods------------------- CategoryCreate
 if(($this->router->method == "addNewUser") || ($this->router->method == "editUser") || ($this->router->method == "editingUser")) 
 {
     define('css_for_add_edit_pages','Y');
     define('js_for_add_edit_pages','Y');       
 }else{  define('css_for_add_edit_pages','N');
 define('js_for_add_edit_pages','N');    }


}

    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = MYAPP_NAME.' : File Upload';
        
        $this->loadViews("admin/fileUpload", $this->global, NULL , NULL);  
    }
    


    function UploadFile()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {

            //print_r($_FILES);

            $data=[];

            if($_FILES['s_file']['name']!=''){      
                $config['upload_path']   = './test_upload/'; 
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size']      = 2048; // 2MB 
                $config['file_name']    = time()."-".$_FILES['s_file']['name'];
                $this->load->library('upload', $config);





                if ($this->upload->do_upload('s_file'))
                { 
                    $gallery = $this->upload->data();
                    echo $user_image=$gallery['file_name'];

                }
            }

            if(!empty($_FILES['m_file']['name'])){
                $filesCount = count($_FILES['m_file']['name']);
                for($i = 0; $i < $filesCount; $i++){
                    $_FILES['file']['name']     = $_FILES['m_file']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['m_file']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['m_file']['tmp_name'][$i];
                    $_FILES['file']['error']     = $_FILES['m_file']['error'][$i];
                    $_FILES['file']['size']     = $_FILES['m_file']['size'][$i];

                // File upload configuration
                    $uploadPath = './test_upload/product/'; 
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size']      = 2048; // 2MB 
                    $config['file_name']    = time()."-".$_FILES['m_file']['name'][$i];  

                // Load and initialize upload library
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                // Upload file to server
                    if($this->upload->do_upload('file')){
                    // Uploaded file data
                        $fileData = $this->upload->data();
                        $uploadData[$i]['file_name'] = $fileData['file_name'];
                        $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                    }
                }

                print_r($uploadData);

            }

            $this->global['pageTitle'] = MYAPP_NAME.' : Add New User';
            die();
            redirect(ADMIN_PANEL.'fileupload');   
        }
    }


    

}

?>