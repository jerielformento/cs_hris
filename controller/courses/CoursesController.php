<?php

use REJ\Libs\User;
use REJ\Libs\LDAP;
use REJ\System\Session;
use REJ\Model\CoursesModel;

class CoursesController extends REJController {
	
	public function indexAction() {
		return $this->view(array());
	}
    
    public function fetchCourseListAction() {
        $db = $this->dbOpen();
        
        $key = ($this->setreq('key') && $this->post('key')) ? $this->post('key') : '';

		$addFilter = (!empty($key)) ? "WHERE c.course_id LIKE '%" . $key . "%'" : "";
        
		$lst = (int) $this->post('start');
		$len = 15;

		$count_list = $db->execQuery("SELECT count(id) FROM " . $this->table_prefix . "courses",array(),"num");

		$courses = $db->execQuery("SELECT 
									MD5(c.id) id,
									c.course_id,
                                    ct.type,
                                    CONCAT(c.date_from,' to ',c.date_to) date_range,
                                    CONCAT(TIME_FORMAT(c.time_from,'%h:%i%p'),'-',TIME_FORMAT(c.time_to,'%h:%i%p')) time,
									c.date_created
								FROM " . $this->table_prefix . "courses c 
                                LEFT JOIN " . $this->table_prefix . "course_types ct ON ct.id=c.course_type
                                " . $addFilter . "
                                ORDER BY c.date_created DESC LIMIT " . $lst . "," . $len. ";",array(),"rows");
        
		$pagination = array();
		$count_pagi = $count_list[0][0];
		$pagination['pages'] = ceil($count_pagi / 15);
		$pagination['count'] = $count_pagi;

		$this->view(array(
			'courselist' => $courses,
			'limit' => $pagination
		),'json');
    }
    
    public function addAction() {
        $db = $this->dbOpen();
        
        if($this->setreq('submit')) {
            $model = new CoursesModel();
            $request = $this->getBody( $model->fields );

            if(count($request['errors']) === 0) {
                $course_id = $request['data']['course_id'];
                $course_type = $request['data']['course_type'];
                $date_from = date("Y-m-d", strtotime($request['data']['date_from']));
                $date_to = date("Y-m-d", strtotime($request['data']['date_to']));
                $time_from = date("H:i:s", strtotime($request['data']['time_from']));
                $time_to = date("H:i:s", strtotime($request['data']['time_to']));
                $tuition_fee = $request['data']['tuition_fee'];
                $downpayment = $request['data']['downpayment'];
                $handout = $request['data']['handout'];

                $get_course_type = $db->execQuery("SELECT id, type FROM " . $this->table_prefix . "course_types WHERE MD5(id)=:id LIMIT 1",array(':id'=>$course_type),"rows");

                if(count($get_course_type) > 0) {
                    $check_exist = $db->execQuery("SELECT id FROM " . $this->table_prefix . "courses WHERE course_id=:id",array(':id'=>$course_id),"rows");

                    if(count($check_exist) === 0) {
                        $ins_course = $db->execQuery("INSERT INTO " . $this->table_prefix . "courses
                                                    (course_id, user_id, course_type, date_from, date_to, time_from, time_to, tuition_fee, downpayment, handout, date_created)
                                           VALUES
                                           (:cid,:uid,:ctype,:dfrom,:dto,:tfrom,:tto,:tuition,:dp,:handout,:date)", 
                                           array(
                                               ':cid'=>$course_id,
                                               ':uid'=>$this->getLoginId(),
                                               ':ctype'=>$get_course_type[0]['id'],
                                               ':dfrom'=>$date_from,
                                               ':dto'=>$date_to,
                                               ':tfrom'=>$time_from,
                                               ':tto'=>$time_to,
                                               ':tuition'=>$tuition_fee,
                                               ':dp'=>$downpayment,
                                               ':handout'=>$handout,
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
                        $request['errors']['username'] = "Username is already exist";

                        return $this->view(array('data'=>$request['data'], 'errors'=>$request['errors']));
                    }
                } else {
                    $request['errors']['course_type'] = "Invalid option";

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
            $model = new CoursesModel();
            $request = $this->getBody( $model->fields );
            
            if(count($request['errors']) == 0) {
                $id = $this->post('id');
                $course_id = $request['data']['course_id'];
                $course_type = $request['data']['course_type'];
                $date_from = date("Y-m-d", strtotime($request['data']['date_from']));
                $date_to = date("Y-m-d", strtotime($request['data']['date_to']));
                $time_from = date("H:i:s", strtotime($request['data']['time_from']));
                $time_to = date("H:i:s", strtotime($request['data']['time_to']));
                $tuition_fee = $request['data']['tuition_fee'];
                $downpayment = $request['data']['downpayment'];
                $handout = $request['data']['handout'];
                
                $get_type = $db->execQuery("SELECT id, type FROM " . $this->table_prefix . "course_types WHERE MD5(id)=:type LIMIT 1",array(':type'=>$course_type),"rows");

                if(count($get_type) > 0) {
                    $check_exist = $db->execQuery("SELECT id FROM " . $this->table_prefix . "courses WHERE id=:id",array(':id'=>$id),"rows");

                    if(count($check_exist) === 0) {

                        $update = $db->execQuery("UPDATE " . $this->table_prefix . "courses
                                            SET
                                            user_id=:uid,
                                            course_type=:type,
                                            date_from=:dfrom,
                                            date_to=:dto,
                                            time_from=:tfrom,
                                            time_to=:tto,
                                            tuition_fee=:tfee,
                                            downpayment=:dp,
                                            handout=:handout
                                            WHERE MD5(id)=:id", 
                                            array(
                                                ':id'=>$id,
                                                ':uid'=>$this->getLoginId(),
                                                ':type'=>$get_type[0]['id'],
                                                ':dfrom'=>$date_from,
                                                ':dto'=>$date_to,
                                                ':tfrom'=>$time_from,
                                                ':tto'=>$time_to,
                                                ':tfee'=>$tuition_fee,
                                                ':dp'=>$downpayment,
                                                ':handout'=>$handout
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
                        $request['errors']['header'][1] = "Course not found!";
                    
                        return $this->view(array('data'=>$request['data'], 'errors'=>$request['errors']));
                    }
                } else {
                    $request['errors']['privilege'] = "Invalid option";
                    
                    return $this->view(array('data'=>$request['data'], 'errors'=>$request['errors']));
                }  
            }
            
            return $this->view(array('data'=>$request['data'], 'errors'=>$request['errors']));
        } else {
            if($this->setreq('id')) {
                $id = $this->get('id');

                $course = $db->execQuery("SELECT 
                                        MD5(c.id) id,
                                        c.course_id,
                                        MD5(c.course_type) course_type,
                                        DATE_FORMAT(c.date_from, '%m/%d/%Y') date_from,
                                        DATE_FORMAT(c.date_to, '%m/%d/%Y') date_to,
                                        TIME_FORMAT(c.time_from,'%h:%i%p') time_from,
                                        TIME_FORMAT(c.time_to,'%h:%i%p') time_to,
                                        c.tuition_fee,
                                        c.downpayment,
                                        c.handout
                                    FROM " . $this->table_prefix . "courses c 
                                    LEFT JOIN " . $this->table_prefix . "course_types ct ON ct.id=c.course_type
                                    WHERE md5(c.id)=:id",array(':id'=>$id),"rows");

                
                $course[0]['id'] = $id;
                return $this->view(array('data'=>$course[0]));
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

			$delu = $db->execQuery("DELETE FROM " . $this->table_prefix . "courses WHERE MD5(id)=:id",array(':id'=>$id),"delete");

			if($delu) {
				$return = array('message'=>array('success','<strong>Success!</strong> Course has been deleted!'));
			} else {
				$return = array('message'=>array('danger','<strong>Error!</strong> Deleting course has been failed!'));	
			}
		} else {
			$return = array('message'=>array('danger','<strong>Error!</strong> Permission denied!'));
		}

		$this->view($return, 'json');
    }

    public function getCourseTypesList( $id = null ) {
		$db = $this->dbOpen();
		
		$edit_mode = (!empty($id)) ? $id : "";

		$res = $db->execQuery("SELECT md5(id), type FROM " . $this->table_prefix . "course_types",array(),"num");

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