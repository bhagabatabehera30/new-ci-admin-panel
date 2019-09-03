<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class User extends BaseController
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
        $this->global['pageTitle'] = MYAPP_NAME.' : Dashboard';
        
        $this->loadViews("admin/dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the user list
     */
    function userListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            //$searchText = $this->security->xss_clean($this->input->post('searchText'));
            //$data['searchText'] = $searchText;

            //$this->load->library('pagination');

            //$count = $this->user_model->userListingCount($searchText);

            //$returns = $this->paginationCompress ( "userListing/", $count, 10 );

            $data['userRecords'] = $this->user_model->FetchAllUserListData();

            
            $this->global['pageTitle'] = MYAPP_NAME.' : User Listing';
            
            $this->loadViews("admin/users", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addNewUser()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('user_model');
            $data['roles'] = $this->user_model->getUserRoles();
            
            $this->global['pageTitle'] = MYAPP_NAME.' : Add New User';

            $this->loadViews("admin/addNewUser", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to check whether email already exist or not
     */
    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if(empty($userId)){  
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }
    
    /**
     * This function is used to add new user to the system
     */
    function addingNewUser()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            //$this->load->library('form_validation');

            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password','Password','required|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNewUser();
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                //$this->load->model('user_model');
                $duplicate_email_check=$this->user_model->checkUniquenessOfString('users','email',$email);
                if($duplicate_email_check){
                    $this->session->set_flashdata('error', 'This email id exists in our database.Use other email id to create your account.');
                    redirect(ADMIN_PANEL.'addNewUser'); 
                }else{

                    $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId, 'name'=> $name,
                        'mobile'=>$mobile, 'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));


                    $result = $this->user_model->addNewUser($userInfo);

                    if($result > 0)
                    {
                        $sess_msg="New User created successfully.";  

                        $_SESSION['sessionMsg']=$sess_msg; 
                   // $this->session->set_flashdata('success', 'New User created successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'User creation failed');
                    }

                    redirect(ADMIN_PANEL.'userListing'); 
                } 
            }
        }
    }


    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editUser($userId = NULL)
    {
        if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect(ADMIN_PANEL.'userListing');
            }
            
            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);
            
            $this->global['pageTitle'] = MYAPP_NAME.' : Edit User';
            
            $this->loadViews("admin/editUser", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the user information
     */
    function editingUser()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password','Password','matches[cpassword]|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editUser($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                
                $userInfo = array();

                $duplicate_email_check=$this->user_model->checkUniquenessOfString1('users','email',$email,'userId',$userId);
                if($duplicate_email_check){
                    $this->session->set_flashdata('error', 'This email id belongs to other user account.Use other email id to update your account.');
                    // redirect(ADMIN_PANEL.'addNewUser'); 
                    $this->editUser($userId);
                }else{
                    if(empty($password))
                    {
                        $userInfo = array('email'=>$email, 'roleId'=>$roleId, 'name'=>$name,
                            'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                    }
                    else
                    {
                        $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId,
                            'name'=>ucwords($name), 'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 
                            'updatedDtm'=>date('Y-m-d H:i:s'));
                    }

                    $result = $this->user_model->editUser($userInfo, $userId);

                    if($result == true)
                    {
                        $sess_msg="Records has been updated successfully.";  

                        $_SESSION['sessionMsg']=$sess_msg; 
                       // $this->session->set_flashdata('success', 'User updated successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'User updation failed');
                    }

                    redirect(ADMIN_PANEL.'userListing');
                }

            }
        }
    }

    function active_deactive_delete_all_users(){
     if($this->isAdmin() == TRUE)
     {
        $this->loadThis();
    }
    else
    { 



        if(is_post_back()) {
    $arr_adm_ids=$this->input->post('arr_cat_ids');  //print_r($arr_adm_ids);
    $Delete=$this->input->post('Delete');
    $Activate=$this->input->post('Activate');
    $Deactivate=$this->input->post('Deactivate');
    if(is_array($arr_adm_ids)) { 
        $str_adm_ids = implode(',', $arr_adm_ids);  
        if($Delete!='') {

            $this->user_model->deleteAll('users','userId',$str_adm_ids);  
            $sess_msg="Records Deleted Successfully";;

            $_SESSION['sessionMsg']=$sess_msg; 

        } else if($Activate!='') {

           $this->user_model->active_or_deactiveAll('users','status','1','userId',$str_adm_ids);  
           $sess_msg="Records have Activated Successfully";

           $_SESSION['sessionMsg']=$sess_msg;

       } else if($Deactivate!='') {

        $this->user_model->active_or_deactiveAll('users','status','0','userId',$str_adm_ids);  
        $sess_msg="Records have deactivated/inactivated Successfully";  

        $_SESSION['sessionMsg']=$sess_msg; 
    }
}

}
redirect(ADMIN_PANEL.'userListing');



}

}

    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->user_model->deleteUser($userId, $userInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    
    /**
     * Page not found : error 404
     */
    function pageNotFound()
    {
        $this->global['pageTitle'] = MYAPP_NAME.' : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }

    /**
     * This function used to show login history
     * @param number $userId : This is user id
     */
    function loginHistoy($userId = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $userId = ($userId == NULL ? 0 : $userId);

            //echo  $userId;


            $searchText = $this->input->post('searchText');
            $fromDate = $this->input->post('fromDate');
            $toDate = $this->input->post('toDate');

            $data["userInfo"] = $this->user_model->getUserInfoById($userId);

            $data['searchText'] = $searchText;
            $data['fromDate'] = $fromDate;
            $data['toDate'] = $toDate;
            
            //$this->load->library('pagination');
            
            $count = $this->user_model->loginHistoryCount($userId, $searchText, $fromDate, $toDate);
            //die();
            //$returns = $this->paginationCompress ( "login-history/".$userId."/", $count, 10, 3);

            $data['userRecords'] = $this->user_model->loginHistory($userId, $searchText, $fromDate, $toDate); 
            
            $this->global['pageTitle'] = MYAPP_NAME.' : User Login History';
            
            $this->loadViews("admin/loginHistory", $this->global, $data, NULL);
        }        
    }

    /**
     * This function is used to show users profile
     */
    function profile($active = "details")
    {
        $data["userInfo"] = $this->user_model->getUserInfoWithRole($this->vendorId);
        $data["active"] = $active;
        
        $this->global['pageTitle'] = $active == "details" ? MYAPP_NAME.' : My Profile' : MYAPP_NAME.' : Change Password';
        $this->loadViews("admin/profile", $this->global, $data, NULL);
    }

    /**
     * This function is used to update the user details
     * @param text $active : This is flag to set the active tab
     */
    function profileUpdate($active = "details")
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
        $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]|callback_emailExists');        
        
        if($this->form_validation->run() == FALSE)
        {
            $this->profile($active);
        }
        else
        {
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            
            $userInfo = array('name'=>$name, 'email'=>$email, 'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->user_model->editUser($userInfo, $this->vendorId);
            
            if($result == true)
            {
                $this->session->set_userdata('name', $name);
                $this->session->set_flashdata('success', 'Profile updated successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Profile updation failed');
            }

            redirect(ADMIN_PANEL.'profile/'.$active);
        }
    }

    /**
     * This function is used to change the password of the user
     * @param text $active : This is flag to set the active tab
     */
    function changePassword($active = "changepass")
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
        $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->profile($active);
        }
        else
        {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            
            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);
            
            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password is not correct');
                redirect(ADMIN_PANEL.'profile/'.$active);
            }
            else
            {
                $usersData = array('password'=>getHashedPassword($newPassword), 'updatedBy'=>$this->vendorId,
                    'updatedDtm'=>date('Y-m-d H:i:s'));
                
                $result = $this->user_model->changePassword($this->vendorId, $usersData);
                
                if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
                else { $this->session->set_flashdata('error', 'Password updation failed'); }
                
                redirect(ADMIN_PANEL.'profile/'.$active);
            }
        }
    }

    /**
     * This function is used to check whether email already exist or not
     * @param {string} $email : This is users email
     */
    function emailExists($email)
    {
        $userId = $this->vendorId;
        $return = false;

        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ $return = true; }
        else {
            $this->form_validation->set_message('emailExists', 'The {field} already taken');
            $return = false;
        }

        return $return;
    }
}

?>