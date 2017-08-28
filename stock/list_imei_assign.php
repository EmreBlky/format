<?php
include("../connection.php");
include_once(__DOCUMENT_ROOT.'/include/header.php');
include_once(__DOCUMENT_ROOT.'/include/leftmenu_stock.php');
?>
<script>




function doneImeiAssign(row_id)
{
  if (confirm('Are you sure you want to close?')) {
    $.ajax({
      type:"GET",
      url:"userInfo.php?action=stockImeiAssign",
      data:"row_id="+row_id,
      success:function(msg){
        //alert(msg)
        location.reload(true);    
      }
    });
    return true;
} else {
   return false;
}
  
    
}

function addComment(row_id,retVal)
{
	//alert(user_id);
	//return false;
$.ajax({
		type:"GET",
		url:"userInfo.php?action=devicechangeComment",
 		 
		 data:"row_id="+row_id+"&comment="+retVal,
		success:function(msg){
			 alert(msg);
			 
		 
		location.reload(true);		
		}
	});
}
</script>

<div class="top-bar">
  <div align="center">
    <form name="myformlisting" method="post" action="">
      <select name="Showrequest" id="Showrequest" onchange="form.submit();" >
        <option value="0" <? if($_POST['Showrequest']==0){ echo 'Selected'; }?>>Select</option>
        <option value=3 <?if($_POST['Showrequest']==3){ echo "Selected"; }?>>Admin Approved</option>
        <option value="" <?if($_POST['Showrequest']==''){ echo "Selected"; }?>>Pending</option>
        <option value="1" <?if($_POST['Showrequest']==1){ echo "Selected"; }?>>Closed</option>
        <option value="4" <?if($_POST['Showrequest']==4){ echo "Selected"; }?>>Billing Changes</option>
        <option value="2" <?if($_POST['Showrequest']==2){ echo "Selected" ;}?>>All</option>
      </select>
    </form>
  </div>
  <h1>IMEI Assign List</h1>
</div>
<div class="top-bar">
  <div style="float:right";><font style="color:#B6B6B4;font-weight:bold;">Grey:</font> Approved</div>
  <br/>
  <div style="float:right";><font style="color:#68C5CA;font-weight:bold;">Blue:</font> Back from support</div>
  <br/>
  <div style="float:right";><font style="color:#F2F5A9;font-weight:bold;">Yellow:</font> Back from Admin</div>
  <br/>
  <div style="float:right";><font style="color:#99FF66;font-weight:bold;">Green:</font> Completed your requsest.</div>
  <div class="table">
  <?php
 
  
    $query = select_query("SELECT * FROM installation WHERE installation_status='2'  order by id desc LIMIT 5");
    //echo "<pre>";print_r($query);die;

  ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
      <thead>
        <tr>
          <th>SL.No</th>
          <th>Reqeust Date</th>
          <th>Cleint Name</th>
          <th>Company Name</th>
          <th>Installer Name</th>
          <th>Device Model</th>
          <th>Device_Type</th>
          <th>Device IMEI</th>
          <th>View Detail</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 

//while($row=mysql_fetch_array($query))

for($i=0;$i<count($query);$i++)
{
?>
        <tr align="center" <? if( $query[$i]["support_comment"]!="" && $query[$i]["final_status"]!=1 ){ echo 'style="background-color:#68C5CA"';} elseif($query[$i]["final_status"]==1){ echo 'style="background-color:#99FF66"';}elseif($query[$i]["approve_status"]==1){ echo 'style="background-color:#B6B6B4"';}elseif( $query[$i]["admin_comment"]!="" && $query[$i]["final_status"]!=1 ){ echo 'style="background-color:#F2F5A9"';}?> >
          <td><?php echo $i+1;?></td>
          <td><?php echo $query[$i]["req_date"];?></td>
          <td>
            <?php $sql = select_query("select UserName as clientName from internalsoftware.installation LEFT JOIN addclient ON installation.user_id=addclient.Userid where Userid=".$query[$i]["user_id"]." LIMIT 1"); 
              echo $sql[0]['clientName'];
            ?>
          </td>
          <td><?php echo $query[$i]["company_name"];?></td>
          <td><?php echo $query[$i]["inst_name"];?></td>
          <td><?php echo $query[$i]["imei_device_model"];?></td>
          <td><?php echo $query[$i]["imei_device_type"];?></td>
          <td><?php echo $query[$i]["device_imei"];?></td>
          <td><a href="#" onClick="Show_record(<?php echo $query[$i]["id"];?>,'imei_assign','popup1'); " class="topopup">View Detail</a></td>
          <td><?php if( $_POST["Showrequest"]!=1 && $_POST["Showrequest"]!=2 ){?>
            <a href="#" onclick="return backComment(<?php echo $query[$i]["id"];?>);"  >Back/</a>
            <a href="#" onclick="return doneImeiAssign(<?php echo $query[$i]["id"];?>);"  >Done</a>
            <?php }?></td>
        </tr>
        <?php }?>
    </table>
    <div id="toPopup">
      <div class="close">close</div>
      <span class="ecs_tooltip">Press Esc to close <span class="arrow"></span></span>
      <div id="popup1"> <!--your content start--> 
        
      </div>
      <!--your content end--> 
      
    </div>
    <!--toPopup end-->
    
    <div class="loader"></div>
    <div id="backgroundPopup"></div>
  </div>
  <?php
include("../include/footer.php"); ?>
