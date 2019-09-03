<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class User_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */


    function FetchAllUserListData(){
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.createdDtm,BaseTbl.updatedDtm, BaseTbl.status, BaseTbl.is_emailVerify,BaseTbl.is_mobileVerify, Role.role');
        $this->db->from('users as BaseTbl');
        $this->db->join('user_roles as Role', 'Role.roleId = BaseTbl.roleId','left');

        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId !=', 1);
        $this->db->order_by('BaseTbl.userId', 'DESC');
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }  







//-----------FetchAllListData by where 1------------------------------------------
    function FetchAllListData($tableName,$Orderby,$AscDesc){
        $query = $this->db->query("Select * from $tableName where 1  order by  $Orderby $AscDesc   ");
        $totalRowsUnique = $query->num_rows();
        if($totalRowsUnique > 0)
        {
          return $query->result_array();
      }

  }




    //======================delete all data id in====================


  public function deleteAll($tableName,$fieldName,$fieldValue){
     $sql="delete from $tableName  where  $fieldName in ( $fieldValue) ";
     $query = $this->db->query($sql);
     if($query){
         return true;
     }else{
         return false;
     }
 }

 public function active_or_deactiveAll($tableName,$fieldName,$fieldValue,$fieldName2,$fieldValue2){
    $sql = "update  $tableName  set  $fieldName = '".$fieldValue."'  where $fieldName2 in ( $fieldValue2) ";
        //die();
    $query = $this->db->query($sql);
    if($query){
     return true;
 }else{
     return false;
 }
}

/*======== exact one row data fetch===============*/
function FetchOneRowDataByOneField($tableName,$fieldName,$fieldValue)
{
    $query = $this->db->query("Select * from $tableName where $fieldName='".$fieldValue."'");
    $totalRowsUnique = $query->num_rows();
    if($totalRowsUnique > 0)
    {
      return $query->row();
  }
  
}
/*======== exact one row data fetch===============*/
function FetchOneRowDataByTwoField($tableName,$fieldName,$fieldValue,$fieldName2,$fieldValue2)
{
    $query = $this->db->query("Select * from $tableName where $fieldName='".$fieldValue."' and  $fieldName2='".$fieldValue2."' ");
    $totalRowsUnique = $query->num_rows();
    if($totalRowsUnique > 0)
    {
      return $query->row();
  }
  
}
/*========one field culumn data fetch===============*/
function FetchDataByOneField($tableName,$fieldName,$fieldValue)
{
    $query = $this->db->query("Select * from $tableName where $fieldName='".$fieldValue."'");
    $totalRowsUnique = $query->num_rows();
    if($totalRowsUnique > 0)
    {
      return $query->result_array();
  }
  
}
/*========Two field culumn data fetch===============*/
function FetchDataByTwoField($tableName,$fieldName,$fieldValue,$fieldName2,$fieldValue2)
{
    $query = $this->db->query("Select * from $tableName where $fieldName='".$fieldValue."'  and  $fieldName2='".$fieldValue2."' ");
    $totalRowsUnique = $query->num_rows();
    if($totalRowsUnique > 0)
    {
      return $query->result_array();
  }
  
}

/*========Three field culumn data fetch===============*/
function FetchDataByThreeField($tableName,$fieldName,$fieldValue,$fieldName2,$fieldValue2,$fieldName3,$fieldValue3)
{
    $query = $this->db->query("Select * from $tableName where $fieldName='".$fieldValue."'  and  $fieldName2='".$fieldValue2."' and  $fieldName3='".$fieldValue3."' ");
    $totalRowsUnique = $query->num_rows();
    if($totalRowsUnique > 0)
    {
      return $query->result_array();
  }
  
}

/*========Four field culumn data fetch===============*/
function FetchDataByFourField($tableName,$fieldName,$fieldValue,$fieldName2,$fieldValue2,$fieldName3,$fieldValue3,$fieldName4,$fieldValue4)
{
    $query = $this->db->query("Select * from $tableName where $fieldName='".$fieldValue."'  and  $fieldName2='".$fieldValue2."' and  $fieldName3='".$fieldValue3."' and  $fieldName4='".$fieldValue4."'");
    $totalRowsUnique = $query->num_rows();
    if($totalRowsUnique > 0)
    {
      return $query->result_array();
  }
  
}



/*##############################################
Use : Returns true if varchar-field is already present in table,false otherwise.
Arguments : none
###############################################*/
function checkUniquenessOfString($tableName,$fieldName,$fieldValue)
{
    $query = $this->db->query("Select $fieldName from $tableName where $fieldName='".$fieldValue."'");
    $totalRowsUnique = $query->num_rows();
    if($totalRowsUnique!=0)
    {

        return true;
    }
    else
    {

        return false; 
    }
}

/*##############################################
Use : Returns true if varchar-field is already present in table,false otherwise.
Arguments : none
###############################################*/

function checkUniquenessOfString1($tableName,$fieldName,$fieldValue,$fieldName1,$fieldValue1)
{

   $query = $this->db->query("Select $fieldName from $tableName where $fieldName='$fieldValue' and $fieldName1!='$fieldValue1'");
   $totalRowsUnique =$query->num_rows();
   if($totalRowsUnique!=0)
   {            
      return true;
  }
  else
  {           
      return false;
  }
}   





function userListingCount($searchText = '')
{
    $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.createdDtm, Role.role');
    $this->db->from('users as BaseTbl');
    $this->db->join('user_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
    if(!empty($searchText)) {
        $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
        OR  BaseTbl.name  LIKE '%".$searchText."%'
        OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
        $this->db->where($likeCriteria);
    }
    $this->db->where('BaseTbl.isDeleted', 0);
    $this->db->where('BaseTbl.roleId !=', 1);
    $query = $this->db->get();

    return $query->num_rows();
}

    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function userListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.createdDtm, Role.role');
        $this->db->from('users as BaseTbl');
        $this->db->join('user_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
            OR  BaseTbl.name  LIKE '%".$searchText."%'
            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.roleId !=', 1);
        $this->db->order_by('BaseTbl.userId', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    /**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    function getUserRoles()
    {
        $this->db->select('roleId, role');
        $this->db->from('user_roles');
        $this->db->where('roleId !=', 1);
        $query = $this->db->get();
        
        return $query->result();
    }

    /**
     * This function is used to check whether email id is already exist or not
     * @param {string} $email : This is email id
     * @param {number} $userId : This is user id
     * @return {mixed} $result : This is searched result
     */
    function checkEmailExists($email, $userId = 0)
    {
        $this->db->select("email");
        $this->db->from("users");
        $this->db->where("email", $email);   
        $this->db->where("isDeleted", 0);
        if($userId != 0){
            $this->db->where("userId !=", $userId);
        }
        $query = $this->db->get();

        return $query->result();
    }
    
    
    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewUser($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('users', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getUserInfo($userId)
    {
        $this->db->select('userId, name, email, mobile, roleId');
        $this->db->from('users');
        $this->db->where('isDeleted', 0);
        $this->db->where('roleId !=', 1);
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    
    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editUser($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('users', $userInfo);
        
        return TRUE;
    }
    
    
    
    /**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->update('users', $userInfo);
        
        return $this->db->affected_rows();
    }


    /**
     * This function is used to match users password for change password
     * @param number $userId : This is user id
     */
    function matchOldPassword($userId, $oldPassword)
    {
        $this->db->select('userId, password');
        $this->db->where('userId', $userId);        
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('users');
        
        $user = $query->result();

        if(!empty($user)){
            if(verifyHashedPassword($oldPassword, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
    
    /**
     * This function is used to change users password
     * @param number $userId : This is user id
     * @param array $userInfo : This is user updation info
     */
    function changePassword($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $this->db->update('users', $userInfo);
        
        return $this->db->affected_rows();
    }


    /**
     * This function is used to get user login history
     * @param number $userId : This is user id
     */
    function loginHistoryCount($userId, $searchText, $fromDate, $toDate)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.sessionData LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        if(!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
            $this->db->where($likeCriteria);
        }
        if($userId >= 1){
            $this->db->where('BaseTbl.userId', $userId);
        }
        $this->db->from('user_last_login as BaseTbl');
        $query = $this->db->get();
        
        return $query->num_rows();
    }

    /**
     * This function is used to get user login history
     * @param number $userId : This is user id
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function loginHistory($userId, $searchText='', $fromDate='', $toDate='')
    {
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        $this->db->from('user_last_login as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.sessionData  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        if(!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria); 
        }
        if(!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
            $this->db->where($likeCriteria);
        }
        if($userId >= 1){
            $this->db->where('BaseTbl.userId', $userId);
        }
        $this->db->order_by('BaseTbl.id', 'DESC');
       // $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getUserInfoById($userId)
    {
        $this->db->select('userId, name, email, mobile, roleId');
        $this->db->from('users');
        $this->db->where('isDeleted', 0);
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        
        return $query->row();
    }

    /**
     * This function used to get user information by id with role
     * @param number $userId : This is user id
     * @return aray $result : This is user information
     */
    function getUserInfoWithRole($userId)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.roleId, Roles.role');
        $this->db->from('users as BaseTbl');
        $this->db->join('user_roles as Roles','Roles.roleId = BaseTbl.roleId');
        $this->db->where('BaseTbl.userId', $userId);
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();
        
        return $query->row();
    }

}

