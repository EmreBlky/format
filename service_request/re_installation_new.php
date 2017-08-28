<?php
include("../connection.php");

include_once(__DOCUMENT_ROOT.'/include/header.inc.php');
//include_once(__DOCUMENT_ROOT.'/include/leftmenu_service.php');
?>
<link  href="<?php echo __SITE_URL;?>/css/auto_dropdown.css" rel="stylesheet" type="text/css" />
<link href="<?php echo __SITE_URL;?>/js/jquery.multiselect.css" rel="stylesheet" type="text/css">
<script src="<?php echo __SITE_URL;?>/js/jquery.min.js"></script>
<script src="<?php echo __SITE_URL;?>/js/jquery.multiselect.js"></script>
<script type="text/javascript">

var jq = $.noConflict();

jq(document).ready(function(){

  jq('#textB').change(function() {
    jq("#textA").html("");
    var number = $("#textB").val();

    if(number > 0){
      jq("#status").show();

      var user_id = $("#main_user_id").val();
      //alert(user_id)
      $.ajax({
        type:"GET",
        url:"userInfo.php?action=getImei",
        data:"userId="+user_id,
        success:function(msg){
         var deviceImei = JSON.parse(msg)
         var imeiNumber = [];
         //alert(deviceImei[0].imei)
         for(var i=0;i<deviceImei.length;i++){

          //alert(deviceImei[i].imei)

          imeiNumber.push(deviceImei[i].imei)
                
         }

         let num = String(imeiNumber).split(',')
         let option = ''
         for(let a = 0; a < num.length; a++) {
          option += "<option value='"+num[a]+"'>"+num[a]+"</option>"
         }
         for(var i =1; i <= number; i++){

           var age1 = `<tr><td><select name='imei[]' onchange="devicestatus(this.value,'txtDeviceStatus${i}')">${option}</select></td><td><input type='text' name='txtDeviceStatus1' id='txtDeviceStatus${i}'></td></tr>`;
            jq("#textA").append(age1);
          }
        }
      });


      
    }    
  });

  jq("#hide").click(function(){
      jq("#acn").hide();
  });
  jq("#show").click(function(){
      jq("#acn").show();
  });

});


function devicestatus(imei,setDivId){
  alert(setDivId)
 // if(imei > 0){
    jq.ajax({
      type:"GET",
      url:"userinfo.php?action=imeistatus",
      data:"imeiNo="+imei,
      success:function(msg){
        alert(msg)

        document.getElementById(setDivId).value = msg;
      }
    });
 //}
 // else{
  //  alert{"Imei not found inventory"}
 // }  
}

function vehicleType(radioValue)
{
  //alert(radioValue)
   if(radioValue=="Bus")
    {
        document.getElementById('standard').style.display = "block";
        document.getElementById('deviceMdl').style.display = "block";
        document.getElementById('MachineType').style.display = "none";
        document.getElementById('TruckType').style.display = "none";
    }
    else if(radioValue=="Car")
    {
        document.getElementById('standard').style.display = "none";
        document.getElementById('TruckType').style.display = "none";
        document.getElementById('deviceMdl').style.display = "block";
        document.getElementById('actype').style.display = "block";
    }
    else if(radioValue=="Tempo")
    {
        document.getElementById('standard').style.display = "none";
        document.getElementById('TruckType').style.display = "none";
        document.getElementById('TrailerType').style.display = "none";
        document.getElementById('MachineType').style.display = "none";    
    }
    else if(radioValue=="Truck")
    {
        document.getElementById('standard').style.display = "none";
        document.getElementById('TruckType').style.display = "block";
        document.getElementById('actype').style.display = "none";
    }
    else if(radioValue=="Trailer")
    {
        document.getElementById('standard').style.display = "none";
        document.getElementById('TruckType').style.display = "none";
        document.getElementById('TrailerType').style.display = "block";
    }
    else if(radioValue=="Machine")
    {
        document.getElementById('standard').style.display = "none";
        document.getElementById('TruckType').style.display = "none";
        document.getElementById('actype').style.display = "none";
        document.getElementById('MachineType').style.display = "block";
    }
    else if(radioValue=="Bike")
    {
        document.getElementById('standard').style.display = "none";
        document.getElementById('actype').style.display = "none";
        document.getElementById('MachineType').style.display = "none";
        document.getElementById('TruckType').style.display = "none";
        document.getElementById('TrailerType').style.display = "none";
    }
    else
    {
        document.getElementById('standard').style.display = "none";
        document.getElementById('TruckType').style.display = "none";
        document.getElementById('deviceMdl').style.display = "none";
        document.getElementById('MachineType').style.display = "none";
    }
   
}

function standardType(radioValue){

  //alert(radioValue)
  if(radioValue=="Delux")
      {
          document.getElementById('actype').style.display = "block";
          document.getElementById('deviceMdl').style.display = "block";
          document.getElementById('TruckType').style.display = "none";
      }
      else if(radioValue=="Non-Delux")
      {
          document.getElementById('actype').style.display = "none";
          document.getElementById('deviceMdl').style.display = "block";
          document.getElementById('TruckType').style.display = "none";
      }
      else
      {
          document.getElementById('actype').style.display = "none";
          document.getElementById('deviceMdl').style.display = "none";
          document.getElementById('TruckType').style.display = "none";
      }


}

/*Start auto ajax value load code*/

$(document).ready(function(){
    $(document).click(function(){
        $("#ajax_response").fadeOut('slow');
    });
    $("#Zone_area").focus();
    var offset = $("#Zone_area").offset();
    var width = $("#Zone_area").width()-2;
    $("#ajax_response").css("left",offset);
    $("#ajax_response").css("width","15%");
    $("#ajax_response").css("z-index","1");
    $("#Zone_area").keyup(function(event){
         //alert(event.keyCode);
         var keyword = $("#Zone_area").val();
         if(keyword.length)
         {
             if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
             {
                 $("#loading").css("visibility","visible");
                 $.ajax({
                   type: "POST",
                   url: "load_zone_area.php",
                   data: "data="+keyword,
                   success: function(msg){   
                    if(msg != 0)
                      $("#ajax_response").fadeIn("slow").html(msg);
                    else
                    {
                      $("#ajax_response").fadeIn("slow");   
                      $("#ajax_response").html('<div style="text-align:left;">No Matches Found</div>');
                    }
                    $("#loading").css("visibility","hidden");
                   }
                 });
             }
             else
             {
                switch (event.keyCode)
                {
                 case 40:
                 {
                      found = 0;
                      $("li").each(function(){
                         if($(this).attr("class") == "selected")
                            found = 1;
                      });
                      if(found == 1)
                      {
                        var sel = $("li[class='selected']");
                        sel.next().addClass("selected");
                        sel.removeClass("selected");
                      }
                      else
                        $("li:first").addClass("selected");
                     }
                 break;
                 case 38:
                 {
                      found = 0;
                      $("li").each(function(){
                         if($(this).attr("class") == "selected")
                            found = 1;
                      });
                      if(found == 1)
                      {
                        var sel = $("li[class='selected']");
                        sel.prev().addClass("selected");
                        sel.removeClass("selected");
                      }
                      else
                        $("li:last").addClass("selected");
                 }
                 break;
                 case 13:
                    $("#ajax_response").fadeOut("slow");
                    $("#Zone_area").val($("li[class='selected'] a").text());
                 break;
                }
             }
         }
         else
            $("#ajax_response").fadeOut("slow");
    });
    $("#ajax_response").mouseover(function(){
        $(this).find("li a:first-child").mouseover(function () {
              $(this).addClass("selected");
        });
        $(this).find("li a:first-child").mouseout(function () {
              $(this).removeClass("selected");
        });
        $(this).find("li a:first-child").click(function () {
              $("#Zone_area").val($(this).text());
              $("#ajax_response").fadeOut("slow");
        });
    });
    // $('#accessories').multiselect({
    // columns: 1,
    // placeholder: 'Select Accessories',
    // search: true,
    // selectAll: true

    // });
    // $('#accessories').multiselect({
    // columns: 1,
    // placeholder: 'Select Accessories'
    // });

    $('#accessories').multiselect({
    columns: 1,
    placeholder: 'Select Accessories',
    search: true
    });

});
/* End auto ajax value load code*/
</script>
<?php
$Header="Re-Installation";
$date=date("Y-m-d H:i:s");
$account_manager=$_SESSION['username'];
?>

<div class="top-bar">
  <h1><?php echo $Header;?></h1>
</div>
<div class="table">

<?php


if(isset($_POST['submit']))
{ 
    $date=date("Y-m-d H:i:s");
    $account_manager=$_SESSION['username'];
    $sales_person=$_POST['sales_person'];
    $main_user_id=$_POST['main_user_id'];
    $company=$_POST['company'];
    $no_of_vehicals=$_POST['no_of_vehicals'];
    //$location=$_POST['location'];
    $model=$_POST['model'];
    $cnumber=$_POST['cnumber'];
    $designation=$_POST['designation'];
    $alt_cont_number=$_POST['acnumber'];
    $contact_person=$_POST['contact_person'];
    $atime_status=$_POST['atime_status'];
    $back_reason=$_POST['back_reason'];
    $branch_type = $_POST['inter_branch'];
    $instal_reinstall = $_POST['instal_reinstall'];
    $accessories_tollkit = $_POST['accessories'];
    $billing = $_POST['billing'];
    

    if($branch_type == "Samebranch" && $instal_reinstall == "installation")
    {
        $installation_status=8;
    }
    elseif($branch_type == "Interbranch" && $instal_reinstall == "installation")
    {
        $installation_status=8;
    }
   elseif($instal_reinstall == "re_install")
    {
        $installation_status=1;
    }
    else
    {
        $installation_status=8;
    }
    $veh_type=$_POST['veh_type'];
    $Zone_data = select_query("SELECT id,`name` FROM re_city_spr_1 WHERE `name`='".$_POST['Zone_area']."'");
    $zone_count = count($Zone_data);
    if($zone_count > 0)
    {
        $Area = $Zone_data[0]["id"];
        $errorMsg = "";
    }
    else
    {
        $errorMsg = "Please Select Type View Listed Area. Not Fill Your Self.";
    }
    if($branch_type == "Interbranch"){
        $city=$_POST['inter_branch_loc'];
        $location="";
    }else{
        $city=0;
        $location=$_POST['location'];
    }
    $required=$_POST['required'];
        if($required=="") { $required="normal"; }
       
        $datapullingtime=$_POST['datapullingtime'];
    if($errorMsg=="")   
    { 
    
  
      if($atime_status=="Till")
      {
      
              $time=$_POST['time'];  
              
              $sql="INSERT INTO installation_request(`req_date`, `request_by`,sales_person,`user_id`, `company_name`, no_of_vehicals, 
              location,model,time, contact_number, status, contact_person, veh_type,required,branch_id,installation_status, Zone_area,atime_status,`inter_branch`, branch_type, instal_reinstall,designation,device_type,alter_contact_no,billing) VALUES('".$date."','".$account_manager."','".$sales_person."', '".$main_user_id."', 
              '".$company."','".$no_of_vehicals."','".$location."','".$model."','".$time."','".$cnumber."',1,'".$contact_person."','".$veh_type."','".$required."',
              '".$_SESSION['BranchId']."','".$installation_status."','".$Area."','".$atime_status."','".$city."','".$branch_type."',
              '".$instal_reinstall."','".$designation."','".$deviceType."','".$alt_cont_number."','".$billing."')";
                 
      
               $execute=mysql_query($sql);
               $insert_id = mysql_insert_id();   
              if($installation_status == 1)
              {
                for($N=1;$N<=$no_of_vehicals;$N++)
                { 
                    $installation = "INSERT INTO installation(`inst_req_id`, `req_date`, `request_by`,sales_person,`user_id`, `company_name`, 
                    no_of_vehicals, location,model,time, contact_number,installed_date, status, contact_person, veh_type, required,branch_id,installation_status, Zone_area,atime_status,`inter_branch`, 
                    branch_type, instal_reinstall,designation,device_type,alter_contact_no,accessories_tollkit,billing) VALUES('".$insert_id."','".$date."',
                    '".$account_manager."','".$sales_person."', '".$main_user_id."', '".$company."','1','".$location."','".$model."','".$time."',
                    '".$cnumber."',now(),1,'".$contact_person."','".$veh_type."','".$required."','".$_SESSION['BranchId']."','".$installation_status."','".$Area."',
                    '".$atime_status."','".$city."','".$branch_type."','".$instal_reinstall."','".$designation."','".$deviceType."','".$alt_cont_number."','".$accessories_tollkit."','".$billing."')";

                     //echo $sql; die;
                   
                    $execute_inst=mysql_query($installation);
                }
             }
           
             header("location:installation.php");
      }
           
        if($atime_status=="Between")
        {
            $time=$_POST['time1'];
            $totime=$_POST['totime'];
           
                //1-New,2-assigned,3-newbacktoservice,4-backtoservice,5-close,6-callingclose
             $sql="INSERT INTO installation_request(`req_date`, `request_by`,sales_person,`user_id`, `company_name`, no_of_vehicals,location,model, 
             time,totime,contact_number, installed_date, status, contact_person, veh_type, 
             required,branch_id, installation_status,Zone_area, atime_status,`inter_branch`, branch_type, instal_reinstall,designation,device_type,alter_contact_no,billing) VALUES('".$date."','".$account_manager."','".$sales_person."', '".$main_user_id."', '".$company."',
             '".$no_of_vehicals."','".$location."','".$model."','".$time."','".$totime."','".$cnumber."',now(),1,'".$contact_person."',".$veh_type."','".$required."',
             '".$_SESSION['BranchId']."','".$installation_status."','".$Area."','".$atime_status."','".$city."','".$branch_type."',
             '".$instal_reinstall."','".$designation."','".$deviceType."','".$alt_cont_number."','".$billing."')";
             
                 
                   $execute=mysql_query($sql);
                   $insert_id = mysql_insert_id();   

                  if($installation_status == 1)
                  {

                      for($N=1;$N<=$no_of_vehicals;$N++)
                      {
                          $installation = "INSERT INTO installation(`inst_req_id`, `req_date`, `request_by`,sales_person,`user_id`, `company_name`, 
                          no_of_vehicals, location,model,time, totime,contact_number,installed_date, status, contact_person, veh_type,required,branch_id,installation_status, Zone_area,atime_status,`inter_branch`,
                           branch_type, instal_reinstall,designation,device_type,alter_contact_no,accessories_tollkit,billing) VALUES('".$insert_id."','".$date."',
                           '".$account_manager."','".$sales_person."', '".$main_user_id."', '".$company."','1','".$location."','".$model."','".$time."',
                           '".$totime."','".$cnumber."',now(),1,'".$contact_person."','".$veh_type."'  ,
                           ".$required."','".$_SESSION['BranchId']."',
                           '".$installation_status."','".$Area."','".$atime_status."','".$city."','".$branch_type."','".$instal_reinstall."','".$designation."','".$deviceType."','".$alt_cont_number."','".$accessories_tollkit."','".$billing."'
                           )";
                   
                          $execute_inst=mysql_query($installation);
                      }  
                      echo $installation; die;   
                }
             header("location:installation.php");
        }
  
    if($atime_status=="Till")
      {
        $time=$_POST['time'];
               //1-New,2-assigned,3-newbacktoservice,4-backtoservice,5-close,6-callingclose
              $sql="INSERT INTO installation_request(`req_date`, `request_by`,sales_person,`user_id`, `company_name`, no_of_vehicals, 
        location,model,time, contact_number,installed_date, status, contact_person,veh_type,required,branch_id,installation_status, Zone_area,atime_status,`inter_branch`, branch_type, instal_reinstall,designation,device_type,alter_contact_no,billing 
       ) VALUES('".$date."','".$account_manager."','".$sales_person."', '".$main_user_id."', 
        '".$company."','".$no_of_vehicals."','".$location."','".$model."','".$time."','".$cnumber."',now(),1,'".$contact_person."','".$veh_type."','".$required."','".$_SESSION['BranchId']."','".$installation_status."','".$Area."','".$atime_status."','".$city."','".$branch_type."',
        '".$instal_reinstall."','".$designation."','".$deviceType."','".$alt_cont_number."','".$billing."')";
             $execute=mysql_query($sql);
             $insert_id = mysql_insert_id();   
            if($installation_status == 1)
            {
                for($N=1;$N<=$no_of_vehicals;$N++)
                {
                    $installation = "INSERT INTO installation(`inst_req_id`, `req_date`, `request_by`,sales_person,`user_id`, `company_name`, 
          no_of_vehicals, location,model,time, contact_number,installed_date, status, contact_person, veh_type,required,branch_id,installation_status, Zone_area,atime_status,`inter_branch`, 
          branch_type, instal_reinstall,designation,device_type,alter_contact_no,accessories_tollkit,billing) VALUES('".$insert_id."','".$date."',
          '".$account_manager."','".$sales_person."', '".$main_user_id."', '".$company."','1','".$location."','".$model."','".$time."',
          '".$cnumber."',now(),1,'".$contact_person."','".$veh_type."',".$required."','".$_SESSION['BranchId']."','".$installation_status."','".$Area."',
          '".$atime_status."','".$city."','".$branch_type."','".$instal_reinstall."','".$designation."','".$deviceType."','".$alt_cont_number."','".$accessories_tollkit."','".$billing."')";
                     print_r($installation); 
                    $execute_inst=mysql_query($installation);
                }
            }
           
             header("location:installation.php");
        }
           
        if($atime_status=="Between")
        {
            $time=$_POST['time1'];
            $totime=$_POST['totime'];
               
            //1-New,2-assigned,3-newbacktoservice,4-backtoservice,5-close,6-callingclose
             $sql="INSERT INTO installation_request(`req_date`, `request_by`,sales_person,`user_id`, `company_name`, no_of_vehicals,location,model, 
       time,totime,contact_number, installed_date, status, contact_person, veh_type, 
       required,branch_id, installation_status,Zone_area, atime_status,`inter_branch`, branch_type, instal_reinstall,designation,device_type,alter_contact_no,billing) VALUES('".$date."','".$account_manager."','".$sales_person."', '".$main_user_id."', '".$company."',
       '".$no_of_vehicals."','".$location."','".$model."','".$time."','".$totime."','".$cnumber."',now(),1,'".$contact_person."','".$veh_type."',,'".$required."','".$_SESSION['BranchId']."','".$installation_status."','".$Area."','".$atime_status."','".$city."','".$branch_type."',
       '".$instal_reinstall."','".$designation."','".$deviceType."','".$alt_cont_number."','".$billing."')";
           
             $execute=mysql_query($sql);
             $insert_id = mysql_insert_id();   

            if($installation_status == 1)
            {

                for($N=1;$N<=$no_of_vehicals;$N++)
                {  
                    $installation = "INSERT INTO installation(`inst_req_id`, `req_date`, `request_by`,sales_person,`user_id`, `company_name`, 
          no_of_vehicals, location,model,time, totime,contact_number,installed_date, status, contact_person,veh_type,required,branch_id,installation_status, Zone_area,atime_status,`inter_branch`,
           branch_type, instal_reinstall,designation,device_type,alter_contact_no,accessories_tollkit,billing) VALUES('".$insert_id."','".$date."',
           '".$account_manager."','".$sales_person."', '".$main_user_id."', '".$company."','1','".$location."','".$model."','".$time."',
           '".$totime."','".$cnumber."',now(),1,'".$contact_person."','".$veh_type."','".$required."','".$_SESSION['BranchId']."',
           '".$installation_status."','".$Area."','".$atime_status."','".$city."','".$branch_type."','".$instal_reinstall."','".$designation."','".$deviceType."','".$alt_cont_number."','".$accessories_tollkit."','".$billing."')";
                   
                    $execute_inst=mysql_query($installation);
                }     
            }
             header("location:installation.php");
        }         
      }
}
?>

<script type="text/javascript">
var mode;

function deviceStatus(device){
  if(device > 0){
    document.getElementById("status").style.display="block";
  }
}
function req_info()
{
  
  var instal_reinstall=document.forms["form1"]["instal_reinstall"].value;
  if (instal_reinstall==null || instal_reinstall=="")
  {
	alert("Please Select Job") ;
	return false;
  }

  if(document.form1.sales_person.value=="")
  {
	alert("Please Select Sales Person Name") ;
	document.form1.sales_person.focus();
	return false;
  }
 
  if(document.form1.main_user_id.value=="")
  {
	alert("Please Select Client Name") ;
	document.form1.main_user_id.focus();
	return false;
  }
  
  if(document.form1.no_of_vehicals.value=="")
  {
	alert("Please Select No Of Installation") ;
	document.form1.no_of_vehicals.focus();
	return false;
  }
 if(document.form1.Zone_area.value=="")
  {
  alert("Please Select Area") ;
  document.form1.Zone_area.focus();
  return false;
  }
 
    var barnch=document.forms["form1"]["inter_branch"].value;
    if (barnch==null || barnch=="")
    {
        alert("Please Select Branch") ;
        return false;
    }
  
    var location=document.forms["form1"]["location"].value;
    if ((location==null || location=="") && barnch=="Samebranch")
    {
        alert("Please Enter location");
        document.form1.location.focus();
        return false;
    }
    var interbranch=document.forms["form1"]["inter_branch_loc"].value;
    if ((interbranch==null || interbranch=="") && barnch=="Interbranch")
    {
        alert("Please select branch location");
        document.form1.inter_branch_loc.focus();
        return false;
    }

    if(document.form1.model.value=="")
      {
      alert("Please Enter Model") ;
      document.form1.model.focus();
      return false;
      }
                
    var timestatus=document.forms["form1"]["atime_status"].value;
    if (timestatus==null || timestatus=="")
      {
          alert("Please select Availbale Time");
          document.form1.atime_status.focus();
          return false;
      }
 
    var tilltime=document.forms["form1"]["datetimepicker"].value;
    if(timestatus == "Till" && (tilltime==null || tilltime==""))
    {
        alert("Please select Time");
        document.form1.datetimepicker.focus();
        return false;
    }
  
    var betweentime=document.forms["form1"]["datetimepicker1"].value;
    var betweentime2=document.forms["form1"]["datetimepicker2"].value;
    if(timestatus == "Between" && (betweentime==null || betweentime==""))
    {
        alert("Please select From Time");
        document.form1.datetimepicker1.focus();
        return false;
    }
  
    if(timestatus == "Between" && (betweentime2==null || betweentime2==""))
    {
        alert("Please select To Time");
        document.form1.datetimepicker2.focus();
        return false;
    }
  
    if(document.form1.cnumber.value=="")
    {
    alert("Please Enter Contact No.") ;
    document.form1.cnumber.focus();
    return false;
    }
    var cnumber=document.form1.cnumber.value;
    if(cnumber!="")
        {
    var lenth=cnumber.length;
  
        if(lenth < 10 || lenth > 12 || cnumber.search(/[^0-9\-()+]/g) != -1 )
        {
        alert('Please enter valid mobile number');
        document.form1.cnumber.focus();
        document.form1.cnumber.value="";
        return false;
        }
     }
    if(document.form1.contact_person.value=="")
    {
        alert("Please Enter Contact Persion") ;
        document.form1.contact_person.focus();
        return false;
    }
  
    if(document.form1.veh_type.value=="")
    {
        alert("Please Select Vehicle Type") ;
        document.form1.veh_type.focus();
        return false;instal_reinstall
    }
  
}
   
function setVisibility(id, visibility)
{
    document.getElementById(id).style.display = visibility;
}

function TillBetweenTime(radioValue)
{
 if(radioValue=="Till")
    {
    document.getElementById('TillTime').style.display = "block";
    document.getElementById('BetweenTime').style.display = "none";
    }
    else if(radioValue=="Between")
    {
    document.getElementById('TillTime').style.display = "none";
    document.getElementById('BetweenTime').style.display = "block";
    }
    else
    {
    document.getElementById('TillTime').style.display = "none";
    document.getElementById('BetweenTime').style.display = "none";
    }
   
}

function TillBetweenTime12(radioValue)
{
 if(radioValue=="Till")
    {
    document.getElementById('TillTime').style.display = "block";
    document.getElementById('BetweenTime').style.display = "none";
    }
    else if(radioValue=="Between")
    {
    document.getElementById('TillTime').style.display = "none";
    document.getElementById('BetweenTime').style.display = "block";
    }
    else
    {
    document.getElementById('TillTime').style.display = "none";
    document.getElementById('BetweenTime').style.display = "none";
    }
   
}

function StatusBranch(radioValue)
{
  //alert(radioValue)
   if(radioValue=="Interbranch")
    {
        document.getElementById('branchlocation').style.display = "block";
    }
    else if(radioValue=="Samebranch")
    {
        document.getElementById('branchlocation').style.display = "none";
    }
    else
    {
        document.getElementById('branchlocation').style.display = "none";
    }
   
} 

function showAccess(radioValue)
{
  //alert(radioValue)
   if(radioValue=="yes")
    {
        document.getElementById('accessTable').style.display = "block";
    }
    else if(radioValue=="no")
    {
        document.getElementById('accessTable').style.display = "none";
    }
    else
    {
        document.getElementById('accessTable').style.display = "none";
    }
   
}
          

function StatusBranch12(radioValue)
{
  //alert(radioValue)
   if(radioValue=="Interbranch")
    {
        document.getElementById('branchlocation1').style.display = "block";
    }
    else if(radioValue=="Samebranch")
    {
        document.getElementById('branchlocation').style.display = "none";
    }
    else
    {
        document.getElementById('branchlocation').style.display = "none";
        document.getElementById('samebranchid').style.display = "none";
    }
   
}  

</script> 
  <script type="text/javascript">

        $(function () {
             
            $("#datetimepicker").datetimepicker({});
            $("#datetimepicker1").datetimepicker({});
            $("#datetimepicker2").datetimepicker({});
            $("#datetimepicker3").datetimepicker({});
        });

    </script> 

<?php echo "<p align='left' style='padding-left: 250px;width: 500px;' class='message'>" .$errorMsg. "</p>" ; ?>
  
<style type="text/css" >
.errorMsg{border:1px solid red; }
.message{color: red; font-weight:bold; }
</style>
<style>
body { font-family:'Open Sans' Arial, Helvetica, sans-serif}
ul,li { margin:0; padding:0; list-style:none;}
.label { color:#000; font-size:16px;}
td {border:1px solid #000;}
</style>

 <form method="post" action="" name="form1" onSubmit="return req_info();">
    <table style="padding-left: 100px;width: 600px;border:1px solid #000;" cellspacing="5" cellpadding="5">
      <tr>
        <td align="right"> Client User Name:* </td>
        <td colspan="2">
          <select style="width:150px;" name="main_user_id" id="main_user_id"  onchange="showUser(this.value,'ajaxdata'); getCompanyName(this.value,'TxtCompany');
         getClientPrice(this.value,'mode_of_payment','device_price_client','rent_client','ModePay','AccPrice','AccRent');getSalesPersonName(this.value,'TxtSalesPersonName'); getdevicetype(this.value,'deviceType');getNoInstallation(this.value,noInstallation)"  />
            <option value="" >-- Select One --</option>
            <?php

              $main_user_iddata=select_query("SELECT Userid AS user_id,UserName AS `name` FROM addclient WHERE sys_active=1 ORDER BY `name` asc");
              
              for($u=0;$u<count($main_user_iddata);$u++)
              {
                if($main_user_iddata[$u]['user_id']==$result['user_id'])
                {
                  $selected="selected";
                }
                else
                {
                  $selected="";
                }
            ?>
            <option value ="<?php echo $main_user_iddata[$u]['user_id'] ?>"  <?php echo $selected;?>> <?php echo $main_user_iddata[$u]['name']; ?> </option>
            <?php
              }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td align="right">Billing:</td>
        <td colspan="2">
          <input type='radio' Name ='billing' id='bill_no' value='no' checked="checked" />No 
        </td>
      </tr>
      <tr>
        <td  align="right">Sales Person:*</td>
        <td colspan="2"><input type="text" name="company" id="TxtSalesPersonName" readonly value="<?=$result['company_name']?>"/></td>
      </tr>
      <tr>
        <td  align="right">Company Name:</td>
        <td colspan="2"><input type="text" name="company" id="TxtCompany" readonly value="<?=$result['company_name']?>"/></td>
      </tr>
      
      <tr>
        <td height="32" align="right">No. Of Installation:*</td>
        <td>
          <table>
            <tr>
              <td>
                <select name="no_of_vehicals" id="textB" style="width:150px">
                    <option value="" disabled>Select Installation</option>
                  <?php for($jk=1;$jk<11;$jk++){ ?>
                    <option value="<?php echo $jk; ?>"><?php echo $jk; ?></option>
                  <?php } ?>
                </select>
              </td>
              <td>
                <select name="model" id="status" style="width:150px;display:none">
                  <option value="">Deleted</option>
                  <option value="">Spare</option>
                </select>
              </td>
            </tr>
            <tbody id="textA"></tbody>
          </table>
        </td>
      </tr>

    <tr id="deviceTyp">
        <td height="32" align="right">Device Type:*</td>
        <td colspan="2">
          <select name="deviceType" id="deviceType" style="width:150px" onchange="getModelName(this.value,'modelName');">
          
          </select>
        </td>
      </tr>

      <tr>
        <td height="32" align="right">Model:*</td>
        <td colspan="2">
          <select name="model" id="modelName" style="width:150px">

          </select>
        </td>
      </tr>

    <tr>
        <td  align="right">Accessories: </td>
        <td colspan="2"><?php $branch_data = select_query("select * from tbl_city_name where branch_id='".$_SESSION['BranchId']."'"); ?>
          <input type='radio' Name ='no' id='acc_yes' value= 'yes' <?php //if($result['branch_type']=='Samebranch'){echo "checked=\"checked\""; }?> onchange="showAccess(this.value);">
          Yes
          <Input type='radio' Name ='no' id='acc_no' value= 'no' <?php// if($result['branch_type']=='Interbranch'){echo "checked=\"checked\""; }?>
          onchange="showAccess(this.value);">
          No 
        </td>
    </tr>
    <tr>
      <td colspan="2">
        <table  id="accessTable"  align="right"  style="width: 100%;display:none;margin-left:-6px;" cellspacing="5" cellpadding="5">
          <tr>
            <td height="32" align="right"></td>
            <td>
              <select name="accessories[]" multiple id="accessories" style="width:200px" onchange="();" >
                <option value="">Select Accessories</option>
                <?php
                  $accessory_data=select_query("SELECT id,items AS `access_name` FROM toolkit_access   ORDER BY `access_name` asc");
                  for($v=0;$v<count($accessory_data);$v++)
                  {
                ?>
                <option value="<?=$accessory_data[$v]['id']?>" ><?=$accessory_data[$v]['access_name']?>
                </option>
                <?php } ?>
              </select>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td  align="right">Branch:* </td>
      <td><?php $branch_data = select_query("select * from tbl_city_name where branch_id='".$_SESSION['BranchId']."'"); ?>
        <input type='radio' Name ='inter_branch' id='inter_branch' value= 'Samebranch' <?php if($result['branch_type']=='Samebranch'){echo "checked=\"checked\""; }?> onchange="StatusBranch(this.value);">
        <?php echo $branch_data[0]["city"];?>
        <Input type='radio' Name ='inter_branch' id='inter_branch' value= 'Interbranch' <?php if($result['branch_type']=='Interbranch'){echo "checked=\"checked\""; }?>
      onchange="StatusBranch(this.value);">
        Inter Branch 
      </td>
    </tr>

      <tr>
        <td colspan="2">
          <table  id="branchlocation"  align="right"  style="width: 100%;display:none;margin-left:-6px;" cellspacing="5" cellpadding="5">
            <tr>
              <td align="right" style="width: 18%;margin-right:-1px;">Branch Location:*</td>
              <td><select name="inter_branch_loc" id="inter_branch_loc" style="width:150px;">
                  <option value="" >-- Select One --</option>
                  <?php
                      $city1=select_query("select * from tbl_city_name where branch_id!='".$_SESSION['BranchId']."'");
                      //while($data=mysql_fetch_assoc($city1))
                      for($i=0;$i<count($city1);$i++)
                      {
                          if($city1[$i]['branch_id']==$result['inter_branch'])
                          {
                              $selected="selected";
                          }
                          else
                          {
                              $selected="";
                          }
                      ?>
                      <option value ="<?php echo $city1[$i]['branch_id'] ?>"  <?echo $selected;?>> <?php echo $city1[$i]['city']; ?> </option>
                      <?php
                      }
                      ?>
                </select>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td  align="right"> Area:*</td>
        <td><input type="text" name="Zone_area" id="Zone_area" value="<?php echo $area["name"];?>" />
          <div id="ajax_response"></div>
        </td>
      </tr>
      
     <tr>
        <td align="right"> LandMark:*</td>
        <td><input type="text" name="location"  id="location" value="<?=$result['location']?>"/></td>
    </tr> 
      
      <tr>
        <td align="right">Availbale Time status:*</td>
        <td><select name="atime_status" id="atime_status" style="width:150px" onchange="TillBetweenTime(this.value)">
            <option value="">Select Status</option>
            <option value="Till" <?php if($result['atime_status']=='Till') {?> selected="selected" <?php } ?> >Till</option>
            <option value="Between" <?php if($result['atime_status']=='Between') {?> selected="selected" <?php } ?> >Between</option>
          </select>
        </td>
      </tr>
      
      <tr>
        <td colspan="2">
          <table  id="TillTime" align="left" style="width:100%;display:none;margin-left:110px;"  cellspacing="5" cellpadding="5">
            <tr>
              <td height="32" align="right">Time:*</td>
              <td><input type="text" name="time" id="datetimepicker" value="<?=$result['time']?>" style="width:147px"/></td>
            </tr>
          </table>
          <table  id="BetweenTime" align="left" style="width:100%;display:none;margin-left:85px;"  cellspacing="5" cellpadding="5">
            <tr>
              <td height="32" align="right">From Time:*</td>
              <td><input type="text" name="time1" id="datetimepicker1" value="<?=$result['time']?>" style="width:147px"/></td>
            </tr>
            <tr>
              <td height="32" align="right">To Time:*</td>
              <td><input type="text" name="totime" id="datetimepicker2" value="<?=$result['totime']?>" style="width:147px"/></td>
            </tr>
          </table></td>
      </tr>
      <tr>
        <td align="right">Designation</td>
        <td><select name="designation" id="designation" style="width:150px" >
            <option value="">--Select--</option>
            <option value="Driver" >Driver</option>
            <option value="Supervisor" >Supervisor</option>
            <option value="Manager" >Manager</option>
            <option value="Senior Manager" >Senior Manager</option>
            <option value="Owner" >Owner</option>
             <option value="Owner" >Sales Person</option>
           
          </select>
        </td>
      </tr>
      <tr>
        <td height="32" align="right">Contact Person:*</td>
        <td><input type="text" name="contact_person" value="<?=$result['contact_person']?>" style="width:147px"/></td>
      </tr>
      <tr>
        <td height="32" align="right">Contact No.:*</td>
        <td>
          <input type="text" name="cnumber" value="<?=$result['contact_number']?>" style="width:147px"/>
          <a href="javascript:void(0)" id="hide">REMOVE</a> || 
          <a href="javascript:void(0)" id="show">ADD</a>
        </td>
      </tr>
      
      <tr id="acn" style="display:none">
        <td height="32" align="right">Alternative Contact No.:</td>
        <td><input type="text" name="acnumber" value="<?=$result['alt_contact_number']?>" style="width:147px"/></div></td>
      </tr>
      
      <tr>
        <td height="32" align="right">Vehicle Type:*</td>
        <td>
          <select name="veh_type" id="veh_type" style="width:150px" onchange="vehicleType(this.value,'standard');" >
            <option value="" disabled selected>Select your option</option>
            <option value="Car">Car</option>
            <option value="Bus">Bus</option>
            <option value="Truck">Truck</option>
            <option value="Bike">Bike</option>
            <option value="Trailer">Trailer</option>
            <option value="Tempo">Tempo</option>
            <option value="Machine">Machine</option>
          </select>
        </td>
      
      </tr>
      <tr>
        <td height="32" align="right"><input type="submit" name="submit" id="button1" value="submit" align="right" /></td>
        <td><input type="button" name="Cancel" value="Cancel" onClick="window.location = 'installation.php' " /></td>
      </tr>
      
    </table>

      <!-- <tr>
        <td height="32" align="right">Alternative Contact No.:</td>
        <td><input type="text" name="acnumber" value="<?=$result['alt_contact_number']?>" style="width:147px"/></td>
      </tr>
      
      <tr>
        <td height="32" align="right">Vehicle Type:*</td>
        <td><select name="veh_type" id="veh_type" style="width:150px" onchange="checkbox_lease();" >
            <option value="">Select Vehicle Type:*</option>
            <?
            $query1=select_query("select * from veh_type");
            //while($data=mysql_fetch_array($query)) 
			for($v=0;$v<count($query1);$v++)
			{
             ?>
            <option value="<?=$query1[$v]['veh_type']?>" <? if($result['veh_type']==$query1[$v]['veh_type']) {?> selected="selected" <? } ?> >
            <?=$query1[$v]['veh_type']?>
            </option>
            <? } ?>
          </select></td>
      </tr>
      
    

      
      <tr>
        <td height="32" align="right"><input type="submit" name="submit" id="button1" value="submit" align="right" /></td>
        <td><input type="button" name="Cancel" value="Cancel" onClick="window.location = 'installation.php' " /></td>
      </tr>
      
    </table>
 -->  </form>
</div>
<?
include("../include/footer.php");

?>
<script>StatusBranch12("<?=$result['branch_type'];?>");TillBetweenTime12("<?=$result['atime_status'];?>");</script>
<script type="text/javascript">
var jw = $.noConflict();
jw(document).ready(function(){
  
});
</script>
</script>
