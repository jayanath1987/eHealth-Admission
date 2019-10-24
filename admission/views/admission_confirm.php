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
echo "\n<title>".$this->config->item('title')."</title>";
echo "\n<link rel='icon' type='". base_url()."image/ico' href='images/mds-icon.png'>";
echo "\n<link rel='shortcut icon' href='". base_url()."images/mds-icon.png'>";
echo "\n<link href='". base_url()."/css/mdstheme_navy.css' rel='stylesheet' type='text/css'>";
echo "\n<script type='text/javascript' src='". base_url()."js/jquery.js'></script>";
echo "\n    <script type='text/javascript' src='".base_url()."js/bootstrap/js/bootstrap.min.js' ></script>";
echo "\n    <link href='". base_url()."js/bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css' />";
echo "\n    <link href='". base_url()."js/bootstrap/css/bootstrap-theme.min.css' rel='stylesheet' type='text/css' />";  
echo "\n<script type='text/javascript' src='". base_url()."/js/mdsCore.js'></script> ";
echo "\n<script type='text/javascript' src='". base_url()."/js/jquery.hotkeys-0.7.9.min.js'></script>";
echo "\n</head>";
?>
<?php echo Modules::run('menu'); //runs the available menu option to that usergroup ?>
<div class="container" style="width:95%;">
	<div class="row" style="margin-top:55px;">
	  <div class="col-md-2 ">
		
	  </div>
	  <div class="col-md-10 " >
	   <div class="panel panel-default"  style="margin-bottom:0px;">
			<div class="panel-heading"><b>Admission overview </b>
			</div>
		</div>
		<?php echo Modules::run('patient/banner_full',$admission_info["PID"]); ?>
			<?php 
			//print_r($opd_visits_info); 
			//print_r($this->session)?>
			<?php
			echo '<div class="panel ';
			if ($admission_info["OutCome"]){
				echo 'panel-default' ;
			}
			else{
				echo 'panel-success';
			}
			echo ' "  style="padding:2px;margin-bottom:1px;" >';
				
				echo '<div class="panel-heading" ><b>Initial admission details &nbsp;&nbsp;&nbsp;';
				if ($admission_info["OutCome"]){
					echo '[DISCHARGED]';
				}
				echo '</b></div>';
					
						echo '<table class="table table-condensed"  style="font-size:0.95em;margin-bottom:0px;">';
							echo '<tr>';
								echo '<td>';
									echo 'BHT: <b>'.$admission_info["BHT"].'</b>';
								echo '</td>';
								echo '<td>';
									echo 'Date & Time of admission: '.$admission_info["AdmissionDate"];
								echo '</td>';
								echo '<td>';
									echo 'Onset Date: '.$admission_info["OnSetDate"];
								echo '</td>';
								echo '<td>';
									echo 'Admitted Doctor: '.$admission_info["Doctor"];
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
							echo '</tr>';
							echo '<tr>';
								echo '<td colspan=3>';
									echo 'Complaint: <b>'.$admission_info["Complaint"].'</b>';
								echo '</td>';
								echo '<td>';
									echo 'Ward: ';
									//print_r($admission_info);
									echo '<a href="'.site_url("ward/view/".$admission_info["WID"]).'">'.$admission_info["Ward"].'</a>';
								echo '</td>';
								
							echo '</tr>';
							if ($admission_info["OutCome"]){							
								echo '<tr>';
									echo '<td colspan=1>';
										echo 'Discharge Date: <b>'.$admission_info["DischargeDate"].'</b>';
									echo '</td>';
									echo '<td colspan=2>';
										echo 'Refer To: <b>'.$admission_info["ReferTo"].'</b>';
									echo '</td>';
									echo '<td colspan=1>';
										echo 'OutCome: <b>'.$admission_info["OutCome"].'</b>';
									echo '</td>';
									
								echo '</tr>';	
							}
							echo '<tr>';
								echo '<td colspan=2>';
									echo 'Remarks: '.$admission_info["Remarks"];
								echo '</td>';
								echo '<td >';
									echo 'CreatedBy: '.character_limiter($admission_info["CreateUser"],20);
								echo '</td>';
								echo '<td >';
									if ($admission_info["LastUpDateUser"] !=""){
										echo 'Last Access By: '.character_limiter($admission_info["LastUpDateUser"],20);
									}
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
                        
                        			<div class="panel panel-default"  style="padding:2px;margin-bottom:1px;" >
				<div class="panel-heading" ><b>Ward admission information</b></div>
					<?php
						echo '<form action="'.site_url("admission/save_confirm").'" method="POST">';
							echo '<table class="table table-condensed"  style="font-size:0.95em;margin-bottom:0px;">';
								echo '<tr>';
									echo '<td>';
										echo 'Date & Time of Admission*: <input type="text" readonly class="form-control input-sm" style="width:150px;" name ="WardAdmissionDate" value="'.date("Y-m-d H:i:s").'">';
									echo '</td>';
									
								echo '</tr>';
								echo '<input type="hidden" readonly  name ="ADMID" value="'.$admission_info["ADMID"].'">';
                                                                echo '<input type="hidden" readonly  name ="WID" value="'.$admission_info["WID"].'">';
						
							echo '</table><br>';
							echo '<button type="submit" class="btn btn-primary btn-lg btn-block">Confirm & Admit</button>';
						echo '</form>';
					?>
			</div>	<!-- END OPD INFO-->

			<!-- END TREATMENT-->
			
		</div>
	</div>
</div>
