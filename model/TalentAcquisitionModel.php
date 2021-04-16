<?php 
namespace REJ\Model;

class TalentAcquisitionModel {
	
	public $fields = array(
        'id' => array(
            'field'=>'', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'applicant_code' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>2, 
            'max'=>20
        ),
        'date_applied' => array(
            'field'=>'require', 
            'validate'=>'date', 
            'format'=>'m/d/Y',
            'min'=>10, 
            'max'=>10
        ),
        'first_name' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>2, 
            'max'=>30
        ),
        'middle_name' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>30
        ),
        'last_name' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>2, 
            'max'=>30
        ),
        'gender' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>10, 
            'max'=>10
        ),
        'civil_status' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>10, 
            'max'=>10
        ),
        'school' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'birthdate' => array(
            'field'=>'require', 
            'validate'=>'date', 
            'format'=>'m/d/Y',
            'min'=>10, 
            'max'=>10
        ),
        'age' => array(
            'field'=>'', 
            'validate'=>'int', 
            'min'=>0, 
            'max'=>0
        ),
        'mobile_number' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>11, 
            'max'=>13
        ),
        'landline' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>13
        ),
        'email_address' => array(
            'field'=>'require', 
            'validate'=>'email', 
            'min'=>0, 
            'max'=>45
        ),
        'emergency_person' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'emergency_relationship' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'emergency_contact' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'emergency_email' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'emergency_relationship' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'current_address' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>1, 
            'max'=>250
        ),
        'permanent_address' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>1, 
            'max'=>250
        ),
        'educational_attainment' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>1, 
            'max'=>100
        ),
        'work_length_experience' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'recruitment_channel' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'referred_by' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'employee_code_referee' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'employment_status_referee' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'market_segment' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'applied_position' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'initial_interviewer' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'initial_interview' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'encoded_by' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),

        /* Online Examination Result fields */
        'csu_username' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'exam_grammar' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'exam_math' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'exam_spelling' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'exam_computer' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'exam_call' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'exam_personality_assessment' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'exam_average' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'typing_gross_speed' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'typing_accuracy' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'typing_net_speed' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'ms_proficiency_test' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'other_skill_test' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'exam_encoded_by' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'hr_interviewer' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'hr_interview_result' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'ops_interviewer' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'ops_interview_result' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'ops_special_instruction' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'final_interviewer' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'final_interview_result' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'final_special_instruction' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'profiled_position' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'campaign_assigned' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'training_start' => array(
            'field'=>'require', 
            'validate'=>'date', 
            'format'=>'m/d/Y',
            'min'=>10, 
            'max'=>10
        ),
        'trainee_id' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'training_conducted_by' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'training_date' => array(
            'field'=>'require', 
            'validate'=>'date', 
            'format'=>'m/d/Y',
            'min'=>10, 
            'max'=>10
        ),
        'job_offer' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'job_offer_date' => array(
            'field'=>'require', 
            'validate'=>'date', 
            'format'=>'m/d/Y',
            'min'=>10, 
            'max'=>10
        ),
        'req_birthcert' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'req_nbi' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'req_sss' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'req_pagibig' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'req_philhealth' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'req_tin' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'req_health_cert' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'req_occ_permit' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'req_med_health_alert' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'req_picture' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'req_coe' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'req_tor' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'req_diploma' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'req_marriage_contract' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'req_dependent_birthcert' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
        'is_scanned' => array(
            'field'=>'require', 
            'validate'=>'text', 
            'min'=>0, 
            'max'=>0
        ),
    );
	
}