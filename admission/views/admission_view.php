<?php
/*
  --------------------------------------------------------------------------------
  HHIMS - Hospital Health Information Management System
  Copyright (c) 2011 Information and Communication Technology Agency of Sri Lanka
  <http: www.hhims.org/>
  ----------------------------------------------------------------------------------
  This program is free software: you can redistribute it and/or modify it under the
  terms of the GNU Affero General Public License as published by the Free Software
  Foundation, either version 3 of the License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful,but WITHOUT ANY
  WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
  A PARTICULAR PURPOSE. See the GNU Affero General Public License for more details.

  You should have received a copy of the GNU Affero General Public License along
  with this program. If not, see <http://www.gnu.org/licenses/>
  ----------------------------------------------------------------------------------
  Date : June 2016
  Author: Mr. Jayanath Liyanage   jayanathl@icta.lk

  Programme Manager: Shriyananda Rathnayake
  URL: http://www.govforge.icta.lk/gf/project/hhims/
  __________________________________________________________________________________
  Police hospital customization :

  Date : August 2015		ICT Agency of Sri Lanka (www.icta.lk), Colombo
  Author : Laura Lucas
  Programme Manager: Shriyananda Rathnayake
  Supervisors : Jayanath Liyanage, Erandi Hettiarachchi
  URL: http://www.govforge.icta.lk/gf/project/hhims/
  ----------------------------------------------------------------------------------
 */
echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>";
echo "\n<html xmlns='http://www.w3.org/1999/xhtml'>";
echo "\n<head>";
echo "\n<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>";
echo "\n<meta http-equiv='refresh' content='70' > ";
echo "\n<title>" . $this->config->item('title') . "</title>";
echo "\n<link rel='icon' type='" . base_url() . "image/ico' href='images/mds-icon.png'>";
echo "\n<link rel='shortcut icon' href='" . base_url() . "images/mds-icon.png'>";
echo "\n<link href='" . base_url() . "/css/mdstheme_navy.css' rel='stylesheet' type='text/css'>";
echo "\n<script type='text/javascript' src='" . base_url() . "js/jquery.js'></script>";
echo "\n    <script type='text/javascript' src='" . base_url() . "js/bootstrap/js/bootstrap.min.js' ></script>";
echo "\n    <link href='" . base_url() . "js/bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css' />";
echo "\n    <link href='" . base_url() . "js/bootstrap/css/bootstrap-theme.min.css' rel='stylesheet' type='text/css' />";
echo "\n<script type='text/javascript' src='" . base_url() . "/js/mdsCore.js'></script> ";
echo "\n<script type='text/javascript' src='" . base_url() . "/js/jquery.hotkeys-0.7.9.min.js'></script>";
echo "\n</head>";
?>
<?php echo Modules::run('menu'); //runs the available menu option to that usergroup  ?>
<div class="container" style="width: 99%;">
    <div class="row" style="margin-top: 55px; padding-bottom: 10px; padding-top: 15px;">
        
                    <table border="0" width="100%" >
                    <tr >
                        <td valign="top" class="leftmaintable">

            <?php echo Modules::run('leftmenu/admission', $admission_info, $patient_info, $admission_drug_order, $admission_questionnaire_list, $admission_soap_questionnaire_list); //runs the available left menu for preferance ?>
                        </td>
                        <td valign="top" class="rightmaintable">
            <div class="panel panel-default"  style="margin-bottom:0px;">
                <div class="panel-heading"><b>Admission overview </b>
                </div>
            </div>
            <?php echo Modules::run('patient/banner_full', $admission_info["PID"]); ?>
            <?php
            //print_r($opd_visits_info); 
            //print_r($this->session)
            ?>
            <?php
            echo '<div class="panel ';
            if ($admission_info["OutCome"]) {
                echo 'panel-default';
            } else {
                echo 'panel-success';
            }
            echo ' "  style="padding:2px;margin-bottom:1px;" >';

            echo '<div class="panel-heading" ><b>Initial admission details &nbsp;&nbsp;&nbsp;';
            if ($admission_info["OutCome"]) {
                echo '[DISCHARGED]';
            }
            echo '</b></div>';

            echo '<table class="table table-condensed"  style="font-size:0.95em;margin-bottom:0px;">';
            echo '<tr>';
            echo '<td>';
            echo 'BHT: <b>' . $admission_info["BHT"] . '</b>';
            echo '</td>';
            echo '<td>';
            echo 'Date & Time of admission: ' . $admission_info["AdmissionDate"];
            echo '</td>';
            echo '<td>';
            echo 'Onset Date: ' . $admission_info["OnSetDate"];
            echo '</td>';
            echo '<td>';
            echo ' Admitted Doctor: ' . $admission_info["Doctor"];
            if ($admission_info["OutCome"] == "" && $this->session->userdata('UserGroup') == "Programmer") {
                //echo "<input type='button' class='btn btn-xs btn-warning pull-right' onclick=self.document.location='" . site_url('form/edit/admission/' . $admission_info["ADMID"]) . "' value='Edit'>";
            }
            echo '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td colspan=3>';
            echo 'Complaint: <b>' . $admission_info["Complaint"] . '</b>';
            echo '</td>';
            echo '<td>';
            echo 'Ward: ';
            //print_r($admission_info);
            echo '<a href="' . site_url("ward/view/" . $admission_info["WID"]) . '">' . $admission_info["Ward"] . '</a>';
            echo '</td>';

            echo '</tr>';
            echo '<tr>';
            echo '<td colspan=3>';
            echo 'Guardian Name: <b>' . $admission_info["adm_guardian_name"] . '</b>';
            echo '</td>';
            echo '<td>';
            echo 'Guardian Relationship: <b>' . $admission_info["adm_guardian_relationship"] . '</b>';
            echo '</td>';


            echo '</tr>';
            echo '<tr>';
            echo '<td colspan=3>';
            echo 'Guardian Contact: <b>' . $admission_info["adm_guardian_contact"] . '</b>';
            echo '</td>';
            
            echo '<td colspan=2>';
            echo 'Guardian Address: <b>' . $admission_info["adm_guardian_address"] . '</b>';
            echo '</td>';



            echo '</tr>';
            if ($admission_info["OutCome"]) {
                echo '<tr>';
                echo '<td colspan=1>';
                echo 'Discharge Date: <b>' . $admission_info["DischargeDate"] . '</b>';
                echo '</td>';
                echo '<td colspan=2>';
                echo 'Refer To: <b>' . $admission_info["ReferTo"] . '</b>';
                echo '</td>';
                echo '<td colspan=1>';
                echo 'OutCome: <b>' . $admission_info["OutCome"] . '</b>';
                echo '</td>';

                echo '</tr>';
            }
            echo '<tr>';

            echo '<td>';
            echo 'Initial Severity:  <b>' . $admission_info["Severity"] . '</b>';
            echo '</td>';
            
            echo '<td >';
            echo 'CreatedBy: ' . character_limiter($admission_info["CreateUser"], 20);
            echo '</td>';
            echo '<td >';
            if ($admission_info["LastUpDateUser"] != "") {
                echo 'Last Access By: ' . character_limiter($admission_info["LastUpDateUser"], 20);
            }
            echo '</td>';
            echo '</tr>';
            echo '<tr>';

            echo '<td colspan=2>';
            echo 'Remarks: ' . $admission_info["Remarks"];
            echo '</td>';

            echo '</tr>';
            echo '<tr>';
								echo '<td colspan=2>';
									echo 'History: '.$admission_info["History"];
								echo '</td>';
                                                                  echo '<td >';
									echo 'Consultant Name: '.character_limiter($admission_info["Consultant_Name"],20);
								echo '</td>';
								
							echo '</tr>';
                                                        echo '<tr>';
								echo '<td colspan=2>';
									echo 'Examination: '.$admission_info["Examination"];
								echo '</td>';
								
							echo '</tr>';
                                                        echo '<tr>';
								echo '<td colspan=2>';
									echo 'Investigation: '.$admission_info["Investigation"];
								echo '</td>';
								
							echo '</tr>';
                                                              echo '<tr>';
								echo '<td colspan=2>';
									echo 'Management Plan: '.$admission_info["Management_Plan"];
								echo '</td>';
								
							echo '</tr>';
            echo '</table>';
            ?>
        </div>	<!-- END ADM INFO-->
        <?php
        if (!empty($admission_diagnosis)) {
            echo '<div class="panel panel"  style="padding:2px;margin-bottom:1px;"  >';
            echo '<div class="panel-heading" style="background:#ffffff;"><b>Diagnosis</b></div>';


            echo '<table class="table table-condensed table-hover" style="margin-bottom:0px;" >';
            echo '<tr style="background:#e2e2e2;"><th width=150 nowrap>Date</th><th>Diagnosis</th>';

            echo '<th>By</th>';

            echo '</tr>';
            for ($i = 0; $i < count($admission_diagnosis);  ++$i) {
                echo '<tr ';
                echo '>';

                echo '<td>';
                if ($admission_info["OutCome"] == "") {
                    echo '<a href="' . site_url("form/edit/admission_diagnosis/" . $admission_diagnosis[$i]["ADMDIAGNOSISID"] . "?CONTINUE=admission/view/" . $admission_info["ADMID"]) . '">' . $admission_diagnosis[$i]["DiagnosisDate"] . '</a>';
                } else {
                    echo $admission_diagnosis[$i]["DiagnosisDate"];
                }
                echo '</td>';
                echo '<td>';
                //echo $admission_diagnosis[$i]["SNOMED_Text"];
                echo '</td>';
                echo '<td>';
                echo character_limiter($admission_diagnosis[$i]["CreateUser"], 20);
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';

            echo '</div>';
        }
        
           if (!empty($admission_diagnosis_ticket)) {
            echo '<div class="panel panel"  style="padding:2px;margin-bottom:1px;"  >';
            echo '<div class="panel-heading" style="background:#ffffff;"><b>Diagnosis Ticket</b></div>';


            echo '<table class="table table-condensed table-hover" style="margin-bottom:0px;" >';
            echo '<tr style="background:#e2e2e2;"><th width=150 nowrap>Date</th><th>Diagnosis Ticket</th>';

            echo '<th>By</th>';

            echo '</tr>';
            for ($i = 0; $i < count($admission_diagnosis_ticket);  ++$i) {
                echo '<tr ';
                echo '>';

                echo '<td>';
               // if ($admission_info["OutCome"] == "") {
                     echo '<a href="' . site_url("form/edit/admission_diagnosis_ticket/" . $admission_diagnosis_ticket[$i]["ADMDIAGNOSISTKTID"] . "?CONTINUE=admission/view/" . $admission_info["ADMID"]) . '">' . $admission_diagnosis_ticket[$i]["OnSetDate"] . '</a>';
                 //$menu .="<a href='".base_url()."index.php/form/create/admission_diagnosis_ticket/".$admid."/".$pid."/?CONTINUE=admission/view/".$admid."' class='list-group-item'><span class='glyphicon glyphicon-pencil'></span>&nbsp;Write Diagnosis Ticket</a>";
               /// } else {
                   // echo $admission_diagnosis_ticket[$i]["OnSetDate"];
               // }
                echo '</td>';
                echo '<td>';
                //echo $admission_diagnosis[$i]["SNOMED_Text"];
                echo '</td>';
                echo '<td>';
                echo character_limiter($admission_diagnosis_ticket[$i]["CreateUser"], 20);
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';

            echo '</div>';
        }
        ?>
        <?php echo Modules::run('questionnaire/get_answer_list', $admission_info["PID"], 'admission', $admission_info); ?>
        <?php echo Modules::run('questionnaire/get_SOAP_answer_list', $admission_info["ADMID"], 'admission', $admission_info); ?>
        <?php echo Modules::run('questionnaire/get_notes_answer_list', $admission_info["ADMID"], 'admission', $admission_info); ?>
        <!-- PAST HISTORY-->
        <?php echo Modules::run('admission/get_nursing_notes', $admission_info["ADMID"], 'admission/view/' . $admission_info["ADMID"], "HTML"); ?>

        <!-- END PAST HISTORY-->
        <!-- PAST HISTORY-->
        <?php echo Modules::run('patient/get_previous_history', $patient_info["PID"], 'admission/view/' . $admission_info["ADMID"], "HTML"); ?>

        <!-- END PAST HISTORY-->

        <!-- ALLERGY-->
        <!-- END ALLERGY-->
        <?php echo Modules::run('patient/get_previous_allergy', $patient_info["PID"], 'admission/view/' . $admission_info["ADMID"], "HTML"); ?>

        <!-- EXAMINATION-->
        <?php echo Modules::run('patient/get_previous_exams', $patient_info["PID"], 'admission/view/' . $admission_info["ADMID"], "HTML"); ?>
        <!-- END EXAMINATION-->

        <!-- BHT visits -->
        <div class="panel panel-default"  style="padding:2px;margin-bottom:1px;"  >
            <div class="panel-heading"  ><b>Ward Round for this admission</b></div>
            <?php
            if (isset($admission_visit_list)) {
                echo '<table class="table table-condensed table-hover" style="margin-bottom:0px;" >';
                echo '<tr style="background:#e2e2e2;"><th>#</th><th width=150 nowrap>Date</th><th>Symptoms</th><th>ICD</th><th>Remarks</th><th width=102>Doctor</th>';

                echo '</tr>';
                for ($i = 0; $i < count($admission_visit_list);  ++$i) {


                    echo '<td>';
                    echo ($i + 1);
                    echo '</td>';
                    echo '<td>';
                    echo $admission_visit_list[$i]["DateTimeOfVisit"];
                    echo '</td>';
                    echo '<td>';
                    echo $admission_visit_list[$i]["Complaint"];
                    echo '</td>';
                    echo '<td>';
                    echo $admission_visit_list[$i]["ICD_Text"];
                    echo '</td>';
                    echo '<td>';
                    if ($admission_visit_list[$i]["Remarks"] != "" || $admission_visit_list[$i]["Visit_canvas"] != NULL) {
                        echo '<a href="' . site_url("admission/view_remark/" . $admission_visit_list[$i]["ADM_visit_ID"]) . "/" . $admission_visit_list[$i]["ADMID"] . '" class="glyphicon glyphicon-eye-open"></a>';
                    } else {
                        echo 'None';
                    }
                    echo '</td>';
                    echo '<td>';
                    if (isset($admission_visit_list[$i]["DoctorName"])) {
                        echo $admission_visit_list[$i]["DoctorName"];
                    }

                    echo '</td>';

                    echo '</tr>';
                }
                echo '</table>';
            }
            ?>
        </div>	
        <!-- END new BHT visits-->

        <!-- LAB-->
        <?php echo Modules::run('patient/get_previous_lab', $patient_info["PID"], 'admission/view/' . $admission_info["ADMID"], "HTML"); ?>

        <!-- END LAB-->				

        <?php echo Modules::run('patient/get_previous_injection', $patient_info["PID"], 'admission/view/' . $admission_info["ADMID"], "HTML"); ?>


        <!-- PRESCRIPTION-->
        <?php
        if (!empty($admission_drug_list)) {
            echo '<div class="panel panel"  style="padding:2px;margin-bottom:1px;"  >';
            echo '<div class="panel-heading" style="background:#ffffff;"><b>Drugs ordered for this admission</b></div>';


            echo '<table class="table table-condensed table-hover" style="margin-bottom:0px;" >';
            echo '<tr style="background:#e2e2e2;"><th>#</th><th width=150 nowrap>Date</th><th>Name</th><th>Dose</th><th>Frequency</th><th width=102>Type</th>';

            echo '<th>Status</th>';

            echo '</tr>';
            for ($i = 0; $i < count($admission_drug_list);  ++$i) {
                echo '<tr ';
                if ($admission_drug_list[$i]["Status"] == "Discontinue") {
                    echo ' style="text-decoration:line-through" ';
                }
                echo '>';

                echo '<td>';
                echo ($i + 1);
                echo '</td>';
                echo '<td>';
                echo $admission_drug_list[$i]["CreateDate"];
                echo '</td>';
                echo '<td>';
                echo $admission_drug_list[$i]["name"];
                echo '</td>';
                echo '<td>';
                echo $admission_drug_list[$i]["Dosage"];
                echo '</td>';
                echo '<td>';
                echo $admission_drug_list[$i]["Frequency"];
                echo '</td>';
                echo '<td>';
                if ($admission_drug_list[$i]["type"] == "Once only") {
                    echo '<span class="label label-danger">' . $admission_drug_list[$i]["type"] . '</span>';
                    if ($admission_drug_list[$i]["is_given"] == 1) {
                        echo '<a href="' . site_url("admission/drug_chart/" . $admission_drug_order["admission_prescription_id"] . "/Once%20only") . '" class="glyphicon glyphicon-ok"></a>';
                    }
                } else if ($admission_drug_list[$i]["type"] == "Regular") {
                    echo '<span class="label label-success">' . $admission_drug_list[$i]["type"] . '</span>';
                    echo '<a href="' . site_url("admission/drug_chart/" . $admission_drug_order["admission_prescription_id"] . "/regular") . '" class="glyphicon glyphicon-eye-open"></a>';
                } else {
                    echo '<span class="label label-warning">' . $admission_drug_list[$i]["type"] . '</span>';
                    echo '<a href="' . site_url("admission/drug_chart/" . $admission_drug_order["admission_prescription_id"] . "/As-Needed") . '" class="glyphicon glyphicon-eye-open"></a>';
                }
                echo '</td>';
                echo '<td width=102px>';
                //echo '<button type="button" class="btn btn-default btn-xs" title=" Remove this item" onclick=delete_record("'.$admission_drug_list[$i]["prescribe_items_id"].'"); >
                //<span class="glyphicon glyphicon-remove-circle"></span>
                //</button>';
                echo $admission_drug_list[$i]["Status"];
                /*
                  echo 	'<select style="width:100px;" onchange=update_status(this.value,"'.$admission_drug_list[$i]["prescribe_items_id"].'"); >';
                  echo '<option></option>';
                  echo 	'<option value="Discontinue" ';
                  if ($admission_drug_list[$i]["Status"] == "Discontinue"){
                  echo ' selected ';
                  }
                  echo 	'>';
                  echo 	'Discontinue';
                  echo 	'</option>';
                  echo 	'<option value="Continue" ';
                  if ($admission_drug_list[$i]["Status"] == "Continue"){
                  echo ' selected ';
                  }
                  echo 	'>';
                  echo 	'Continue';
                  echo 	'</option>';
                  echo 	'</select>';
                 */
                ;
                ;

                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';

            echo '</div>';
        }
        ?>
        <!-- END PRESCRIPTION-->		

        <!-- TREATMENT-->
<?php
if (!empty($admission_treatments)) {
    echo '<div class="panel panel-default"  style="padding:2px;margin-bottom:1px;" >';
    echo '<div class="panel-heading" ><b>Treatments</b></div>';

    echo '<table class="table table-condensed table-hover" style="margin-bottom:0px;" >';
    for ($i = 0; $i < count($admission_treatments);  ++$i) {
        //print_r($prescribe_items_list[$i]);
        echo '<tr ';
        echo '>';
        echo '<td>';
        echo $admission_treatments[$i]["CreateDate"];
        echo '</td>';
        echo '<td>';
        echo $admission_treatments[$i]["Treatment"];
        echo '</td>';

        echo '</tr>';
    }
    echo '</table>';

    echo '</div>';
}
?>
        <!-- END TREATMENT-->

		</td>
                </tr>
                </table>   
</div>
</div>
