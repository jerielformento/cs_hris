<?php

use REJ\Libs\User;
use REJ\Libs\LDAP;
use REJ\System\Session;
use REJ\Model\StudentsModel;

class StudentsController extends REJController {
	
    protected $file_ext = ["jpg","png"];

	public function indexAction() {
		return $this->view(array());
	}
     
    public function fetchStudentListAction() {
        $db = $this->dbOpen();
        
        $key = ($this->setreq('key') && $this->post('key')) ? $this->post('key') : '';

		$addFilter = (!empty($key)) ? "WHERE s.first_name LIKE '%" . $key . "%' OR s.last_name LIKE '%" . $key . "%'" : "";
        
		$lst = (int) $this->post('start');
		$len = 15;

		$count_list = $db->execQuery("SELECT count(id) FROM " . $this->table_prefix . "students",array(),"num");

		$students = $db->execQuery("SELECT 
									MD5(s.id) id,
									s.nickname, 
                                    CONCAT(s.last_name,', ',s.first_name,' ',s.middle_name) full_name,
                                    sc.name school, 
                                    s.birthdate, 
                                    s.mobile_number, 
                                    s.email_address, 
                                    s.current_address, 
                                    s.status, 
                                    s.photo_path, 
                                    s.date_created
								FROM " . $this->table_prefix . "students s
                                LEFT JOIN " . $this->table_prefix . "schools sc ON sc.id=s.school_id
                                " . $addFilter . "
                                ORDER BY s.date_created DESC LIMIT " . $lst . "," . $len. ";",array(),"rows");
        
		$pagination = array();
		$count_pagi = $count_list[0][0];
		$pagination['pages'] = ceil($count_pagi / 15);
		$pagination['count'] = $count_pagi;

		$this->view(array(
			'studentlist' => $students,
			'limit' => $pagination
		),'json');
    }
    
    public function addAction() {
        $db = $this->dbOpen();
        
        if($this->setreq('submit')) {
            $model = new StudentsModel();
            $request = $this->getBody( $model->fields );
            $has_upload = 0;
            //print_r($_FILES); die();

            if(count($request['errors']) === 0) {
                $nickname = $request['data']['nickname'];
                $first_name = $request['data']['first_name'];
                $middle_name = $request['data']['middle_name'];
                $last_name = $request['data']['last_name'];
                $school = $request['data']['school'];
                $birthdate = date("Y-m-d", strtotime($request['data']['birthdate']));
                $mobile_number = $request['data']['mobile_number'];
                $email_address = $request['data']['email_address'];
                $current_address = $request['data']['current_address'];
                $filename = "";

                if($this->fileset($_FILES)) {
                    $has_upload = 1;
    
                    $target_dir = "uploads/student_photos/";
                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                    $upload_status = 1;
                    $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
    
                    if(in_array($file_type, $this->file_ext)) {
                        // Check if image file is a actual image or fake image
                        $temp = explode(".", $_FILES["file"]["name"]);
                        $filename = round(microtime(true)) . '.' . end($temp);
                        $new_filename = $target_dir . $filename;
    
                        if(getimagesize($_FILES["file"]["tmp_name"]) !== false) {
                            //echo "File is an image - " . $check["mime"] . ".";
                            if(move_uploaded_file($_FILES['file']['tmp_name'], $new_filename)) {
                                $upload_status = 1;
                            } else {
                                $upload_status = 0;
                            }
                        } else {
                            //echo "File is not an image.";
                            $upload_status = 0;
                        }
                    }
                }

                $get_school_attended = $db->execQuery("SELECT id, name FROM " . $this->table_prefix . "schools WHERE MD5(id)=:id LIMIT 1",array(':id'=>$school),"rows");

                if(count($get_school_attended) > 0) {
                    $ins_course = $db->execQuery("INSERT INTO " . $this->table_prefix . "students
                                                (user_id, nickname, first_name, middle_name, last_name, school_id, birthdate, mobile_number, email_address, current_address, status, photo_path, date_created)
                                        VALUES
                                        (:uid,:nname,:fname,:mname,:lname,:sid,:bdate,:mobile,:email,:address,:status,:photo,:date)", 
                                        array(
                                            ':uid'=>$this->getLoginId(),
                                            ':nname'=>$nickname,
                                            ':fname'=>$first_name,
                                            ':mname'=>$middle_name,
                                            ':lname'=>$last_name,
                                            ':sid'=>$get_school_attended[0]['id'],
                                            ':bdate'=>$birthdate,
                                            ':mobile'=>$mobile_number,
                                            ':email'=>$email_address,
                                            ':address'=>$current_address,
                                            ':status'=>1,
                                            ':photo'=>$filename,
                                            ':date'=>date("Y-m-d H:i:s")
                                        ), "insert");

                    if($ins_course) {
                        $request['errors']['header'][0] = "success";
                        $request['errors']['header'][1] = "Data has been saved!";

                        return $this->view(array('data'=>[], 'errors'=>$request['errors']));
                    } else {
                        $request['errors']['header'][0] = "danger";
                        $request['errors']['header'][1] = "Saving record has been failed!";

                        return $this->view(array('data'=>$request['data'], 'errors'=>$request['errors']));
                    }   
                } else {
                    $request['errors']['school'] = "Invalid option";

                    return $this->view(array('data'=>$request['data'], 'errors'=>$request['errors']));
                }
            }
            
            return $this->view(array('data'=>$request['data'], 'errors'=>$request['errors']));
        } else {
            return $this->view(array());   
        }
    }

    public function editAction() {
        $db = $this->dbOpen();
        
        if($this->setreq('submit')) {
            $model = new StudentsModel();
            $request = $this->getBody( $model->fields );
            if(count($request['errors']) == 0) {
                $id = $this->post('id');
                $nickname = $request['data']['nickname'];
                $first_name = $request['data']['first_name'];
                $middle_name = $request['data']['middle_name'];
                $last_name = $request['data']['last_name'];
                $school = $request['data']['school'];
                $birthdate = date("Y-m-d", strtotime($request['data']['birthdate']));
                $mobile_number = $request['data']['mobile_number'];
                $email_address = $request['data']['email_address'];
                $current_address = $request['data']['current_address'];
                $filename = "";
                $upload_status = 0;

                if($this->fileset($_FILES)) {
                    $has_upload = 1;
    
                    $target_dir = "uploads/student_photos/";
                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                    $upload_status = 1;
                    $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
    
                    if(in_array($file_type, $this->file_ext)) {
                        // Check if image file is a actual image or fake image
                        $temp = explode(".", $_FILES["file"]["name"]);
                        $filename = round(microtime(true)) . '.' . end($temp);
                        $new_filename = $target_dir . $filename;
    
                        if(getimagesize($_FILES["file"]["tmp_name"]) !== false) {
                            //echo "File is an image - " . $check["mime"] . ".";
                            if(move_uploaded_file($_FILES['file']['tmp_name'], $new_filename)) {
                                $request['data']['photo_path'] = $filename;
                                $upload_status = 1;
                            } else {
                                $upload_status = 0;
                            }
                        } else {
                            //echo "File is not an image.";
                            $upload_status = 0;
                        }
                    }
                }
                
                $get_school_attended = $db->execQuery("SELECT id, name FROM " . $this->table_prefix . "schools WHERE MD5(id)=:id LIMIT 1",array(':id'=>$school),"rows");

                if(count($get_school_attended) > 0) {
                    $check_exist = $db->execQuery("SELECT id, photo_path FROM " . $this->table_prefix . "students WHERE MD5(id)=:id",array(':id'=>$id),"rows");

                    if(count($check_exist) === 1) {
                        $photo_update = "";

                        if($upload_status == 1) {
                            $request['data']['photo_path'] = $filename;
                            $photo_update = ",photo_path='" . $filename . "'";
                        } else {
                            $request['data']['photo_path'] = $check_exist[0]['photo_path'];
                        }

                        $update = $db->execQuery("UPDATE " . $this->table_prefix . "students
                                            SET
                                            nickname=:nname,
                                            first_name=:fname,
                                            middle_name=:mname,
                                            last_name=:lname,
                                            school_id=:sid,
                                            birthdate=:bdate,
                                            mobile_number=:mobile,
                                            email_address=:email,
                                            current_address=:address,
                                            user_id=:uid
                                            " . $photo_update . "
                                            WHERE MD5(id)=:id", 
                                            array(
                                                ':id'=>$id,
                                                ':nname'=>$nickname,
                                                ':fname'=>$first_name,
                                                ':mname'=>$middle_name,
                                                ':lname'=>$last_name,
                                                ':sid'=>$get_school_attended[0]['id'],
                                                ':bdate'=>$birthdate,
                                                ':mobile'=>$mobile_number,
                                                ':email'=>$email_address,
                                                ':address'=>$current_address,
                                                ':uid'=>$this->getLoginId()
                                            ), "update");
    

                        if($update) {
                            $request['errors']['header'][0] = "success";
                            $request['errors']['header'][1] = "Data has been updated!";
                            
                            return $this->view(array('data'=>$request['data'], 'errors'=>$request['errors']));
                        } else {
                            $request['errors']['header'][0] = "danger";
                            $request['errors']['header'][1] = "Saving record has been failed!";
                            
                            return $this->view(array('data'=>$request['data'], 'errors'=>$request['errors']));
                        }   
                    } else {
                        $request['errors']['header'][0] = "danger";
                        $request['errors']['header'][1] = "Request not found!";

                        return $this->view(array('data'=>$request['data'], 'errors'=>$request['errors']));
                    }
                } else {
                    $request['errors']['school'] = "Invalid option";
                    
                    return $this->view(array('data'=>$request['data'], 'errors'=>$request['errors']));
                }  
            }
            
            return $this->view(array('data'=>$request['data'], 'errors'=>$request['errors']));
        } else {
            if($this->setreq('id')) {
                $id = $this->get('id');

                $student = $db->execQuery("SELECT 
                                        MD5(id) id,
                                        nickname, 
                                        last_name,
                                        first_name,
                                        middle_name,
                                        MD5(school_id) school, 
                                        DATE_FORMAT(birthdate, '%m/%d/%Y') birthdate, 
                                        mobile_number, 
                                        email_address, 
                                        current_address, 
                                        status, 
                                        photo_path, 
                                        date_created
								FROM " . $this->table_prefix . "students
                                WHERE MD5(id)=:id",array(':id'=>$id),"rows");

                $student[0]['id'] = $id;
                return $this->view(array('data'=>$student[0]));
            }
        }
        
        return $this->view(array());
    }

    public function viewAction() {
        $db = $this->dbOpen();

        if($this->setreq('id')) {
            $id = $this->get('id');

            $course = $db->execQuery("SELECT 
                                    MD5(c.id) id,
                                    c.course_id,
                                    ct.type course_type,
                                    CONCAT(c.date_from,' to ',c.date_to) date_range,
                                    CONCAT(TIME_FORMAT(c.time_from,'%h:%i%p'),'-',TIME_FORMAT(c.time_to,'%h:%i%p')) time,
                                    FORMAT(c.tuition_fee,0) tuition_fee,
                                    FORMAT(c.downpayment,0) downpayment,
                                    FORMAT(c.handout,0) handout,
                                    c.date_created
                                FROM " . $this->table_prefix . "courses c 
                                LEFT JOIN " . $this->table_prefix . "course_types ct ON ct.id=c.course_type
                                WHERE MD5(c.id)=:id",array(':id'=>$id),"rows");

            

            return $this->view(array('data'=>$course[0]));
        }
    }
   
    public function deleteAction() {
        $db = $this->dbOpen();

		if($this->setreq('id') && !empty($this->post('id'))) {
			$id = $this->post('id');

			$delu = $db->execQuery("DELETE FROM " . $this->table_prefix . "students WHERE MD5(id)=:id",array(':id'=>$id),"delete");

			if($delu) {
				$return = array('message'=>array('success','<strong>Success!</strong> Student has been deleted!'));
			} else {
				$return = array('message'=>array('danger','<strong>Error!</strong> Deleting student has been failed!'));	
			}
		} else {
			$return = array('message'=>array('danger','<strong>Error!</strong> Permission denied!'));
		}

		$this->view($return, 'json');
    }

    public function getSchoolList( $id = null ) {
		$db = $this->dbOpen();
		
		$edit_mode = (!empty($id)) ? $id : "";

		$res = $db->execQuery("SELECT md5(id), name FROM " . $this->table_prefix . "schools",array(),"num");

		$html = "";				
		$html .= (!empty($edit_mode)) ? "<option value=\"\">-- Select --</option>" : "<option value=\"\" selected>-- Select --</option>";

		foreach($res as $rows) {
			if(!empty($edit_mode)) {
				if($rows[0] == $edit_mode) {
					$html .= "<option value=\"" . $rows[0] . "\" selected>" . $rows[1] . "</option>";
				} else {
					$html .= "<option value=\"" . $rows[0] . "\">" . $rows[1] . "</option>";
				}
			} else {
				$html .= "<option value=\"" . $rows[0] . "\">" . $rows[1] . "</option>";
			}
		}

		return $html;
	}
    
    public function timeAction() {
        echo date("g:ia",strtotime("12:30am"));
    }
    
}