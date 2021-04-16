<?php

use REJ\Libs\User;
use REJ\System\Session;

class TalentacqController extends REJController {

	public function indexAction() {
		return $this->view(array());
	}

    public function addAction() {
        return $this->view(array());
    }

    public function getGenderList( $name = null ) {
		$db = $this->dbOpen();
		
		$edit_mode = (!empty($name)) ? $name : "";

		//$res = $db->execQuery("SELECT md5(id), type FROM " . $this->table_prefix . "course_types",array(),"num");
        $res = array(["Male"],["Female"]);

		$html = "";				
		$html .= (!empty($edit_mode)) ? "<option value=\"\">-- Select --</option>" : "<option value=\"\" selected>-- Select --</option>";

		foreach($res as $rows) {
			if(!empty($edit_mode)) {
				if($rows[0] == $edit_mode) {
					$html .= "<option value=\"" . $rows[0] . "\" selected>" . $rows[0] . "</option>";
				} else {
					$html .= "<option value=\"" . $rows[0] . "\">" . $rows[0] . "</option>";
				}
			} else {
				$html .= "<option value=\"" . $rows[0] . "\">" . $rows[0] . "</option>";
			}
		}

		return $html;
	}

    public function getCivilStatusList( $name = null ) {
		$db = $this->dbOpen();
		
		$edit_mode = (!empty($name)) ? $name : "";

		//$res = $db->execQuery("SELECT md5(id), type FROM " . $this->table_prefix . "course_types",array(),"num");
        $res = array(["Single"],["Married"],["Widowed"],["Divorced"],["Separated"]);

		$html = "";				
		$html .= (!empty($edit_mode)) ? "<option value=\"\">-- Select --</option>" : "<option value=\"\" selected>-- Select --</option>";

		foreach($res as $rows) {
			if(!empty($edit_mode)) {
				if($rows[0] == $edit_mode) {
					$html .= "<option value=\"" . $rows[0] . "\" selected>" . $rows[0] . "</option>";
				} else {
					$html .= "<option value=\"" . $rows[0] . "\">" . $rows[0] . "</option>";
				}
			} else {
				$html .= "<option value=\"" . $rows[0] . "\">" . $rows[0] . "</option>";
			}
		}

		return $html;
	}

}