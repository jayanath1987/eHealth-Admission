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
Police hospital customization

Date : August 2015		ICT Agency of Sri Lanka (www.icta.lk), Colombo
Author : Laura Lucas
Programme Manager: Shriyananda Rathnayake
Supervisors : Jayanath Liyanage, Erandi Hettiarachchi
URL: http://www.govforge.icta.lk/gf/project/hhims/
----------------------------------------------------------------------------------
*/

	include("header.php");	///loads the html HEAD section (JS,CSS)
	//require 'header_for_adm_visit.php';
?>
<?php echo Modules::run('menu'); //runs the available menu option to that usergroup ?>
<div class="container" style="width:95%;">
	<div class="row" style="margin-top:55px;">
	
	<div class="col-md-12 " >
		<?php
			
		?>
		<div class="panel panel-default  "  style="padding:2px;margin-bottom:1px;" >
			<div class="panel-heading" ><b><CENTER>Ward Round</CENTER></b>
			</div>
			<div class="" style="margin-bottom:1px;padding-top:8px;">
				<?php 
					echo '<table class="table table-condensed table-hover" style="margin-bottom:0px;" border=0>';
						echo '<tr>';
							echo '<td width=50%>';
								echo '<div class="well well-sm">';
								echo '<div class="row">';
								  echo '<div class="col-md-5">';
									echo 'Hospital : <br><b >'.$this->session->userdata("Hospital").'</b>';
									echo '<br>Ward : <b >'.$admission_info["Ward"].'</b>';
								  echo '</div>';
								  echo '<div class="col-md-5">';
									echo 'Consultant : <br><b >'.$admission_info["Doctor"].'</b>';
									echo '<br>Height : <b ></b>'; //Laura a voir car relie a rien !!
									echo '<br>weight : <b ></b>';
								  echo '</div>';
								echo '</div>';
								
								echo '</div>';
							echo '</td>';
							echo '<td>';
							echo '<div class="well well-sm">';
									echo 'Patient : <b >';
									echo  $patient_info["Personal_Title"];
									echo  $patient_info["Personal_Used_Name"]."&nbsp;";
									echo  $patient_info["Full_Name_Registered"];
									echo '</b>';
									echo '<br>HIN : <b >'.$patient_info["HIN"].'</b>';
									echo '<br>Date of Birth : <b >';
									if ($patient_info["Age"]["years"]>0){
										echo  $patient_info["Age"]["years"]."Yrs&nbsp;";
									}
									echo  $patient_info["Age"]["months"]."Mths&nbsp;";
									echo  $patient_info["Age"]["days"]."Dys&nbsp;";
									echo '</b>';
									echo '<br>BHT : <b >'.$admission_info["BHT"].'</b>';
								echo '</div>';
							echo '</td>';
							echo '<td>';
						echo '</tr>';
						echo '<tr>';
						echo '<td width=50%>';
								echo '<div class="well well-sm">';
								echo '<div class="row">';
								  echo '<div class="col-md-5">';
									echo 'Symptoms : <b >';
									echo  $visit_info[0]["Complaint"];
									echo '<br>ICD: <b >';
									echo  $visit_info[0]["ICD_Text"];
									echo '</b>';
							echo '</div>';
							echo '</td>';
							echo '<td>';
						echo '</tr>';
					echo '</table>';	
					echo '<center><a href="'.site_url("admission/view/".$admission_info["ADMID"]).'" type="button" class="btn  btn-default btn"  >Back to admission</a></center>';
					echo '<center><h4><b>REMARKS</b></h4></center>';
					
						echo '<div class="well well-sm"><center>';
					echo $visit_info[0]["Remarks"];	
					echo '</center></div>';
					
					
					if (isset($visit_info)){ //Laura afficher un canvas depuis la bd
								
						echo '<div><center><canvas id="canvas_remark" name="canvas_remark"  width="700px" height="400px" onclick=\'$("#big_canvas_div").modal();\' style ="border: 1px solid #000000");" /></center></div>';
						echo'<script> $(document).ready(function(){ 
									var canvas = document.getElementById("canvas_remark");
									var context = canvas.getContext("2d");
								 	var drawing = new Image() ;
									drawing.src = "'.base_url().'index.php/admission/canvas?id='.$visit_info[0]["ADM_visit_ID"].'";
									drawing.onload = function(){
									 	 context.drawImage(drawing,0,0,700,400);
						    		 };
						});	
						</script>'; 
						echo '<center><a href="'.base_url()."index.php/form/create/admission_visit/".$admission_info["ADMID"]."/".$patient_info["PID"]."/".$visit_info[0]["ADM_visit_ID"]."?CONTINUE=admission/view/".$admission_info["ADMID"].'" type="button" class="btn  btn-default btn"  >Edit new visit from this remark</a></center>';
						
			echo '<div class="modal fade" id="big_canvas_div" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
		    echo '<div class="modal-dialo" >';
		      echo '<div class="modal-content style ="background-color: white " >';
		        echo '<div class="modal-header" >'; // window header
		          echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
		          echo '<h4 class="modal-title">Visit remarks</h4>'; // Window title
		        echo '</div>';
		            echo '<div class="modal-bod" id="remark_canvas"  >'; // windows content
				        echo '<center><canvas id="canvas_big" name="canvas_remark"  style ="border: 1px solid #000000");" /></center>';
				            
				            echo'  <script>   $(document).ready(function(){ 
				            
									var canvas = document.getElementById("canvas_big");
									canvas.width  = (window.innerWidth - 50);
									canvas.height = (window.innerHeight - 100);
									var context = canvas.getContext("2d");
								 	var drawing = new Image() ;
									drawing.src = "'.base_url().'index.php/admission/canvas?id='.$visit_info[0]["ADM_visit_ID"].'";
									drawing.onload = function(){
									 	 context.drawImage(drawing,0,0,window.innerWidth - 500,window.innerHeight - 100);
						    		 };	
						    		 
						});	</script>';
				            
			        echo '</div><!-- /.modal-bod -->'; 
			      echo '</div><!-- /.modal-content -->';
			    echo '</div><!-- /.modal-dialog -->';
			  echo '</div><!-- /.modal -->';
		  
		
			echo form_error($frm["name"]);
					}

				?>				

		</div>	
	</div>

	</div>
</div>
