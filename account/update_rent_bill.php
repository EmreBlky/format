<?php
ini_set('max_execution_time', 150);

include("../connection.php");
include_once(__DOCUMENT_ROOT.'/include/header.php');
include_once(__DOCUMENT_ROOT.'/include/leftmenu_account.php');


$action=$_GET['action'];
$id=$_GET['id'];

if($action=='edit')
    {
		
		$Bill_data = select_query("SELECT * FROM service_tax_invoice_bill where id='".$id."' "); 
		
    }

//echo "<pre>";print_r($user_result);die; 

?> 

<div class="top-bar">
    <h1>Rent Bill Details Update </h1>
</div>
<div class="table"> 
 

<?php

if(isset($_POST["submit"]))
{ 
	//echo "<pre>";print_r($_POST);die;
	
    $row_id = $_POST['row_id'];
    $company_name = $_POST["company_name"];
    $address = $_POST["address"];
	$total_device = $_POST["total_device"];
	
	$rent_amount = $_POST["rent_amount"];
	$service_tax = $_POST["service_tax"];
	$sbc_tax = $_POST["sbc_tax"];
	$kkc_tax = $_POST["kkc_tax"];
	
	$final_amount = $_POST["final_amount"];
	
	$amount = $rent_amount + $service_tax + $sbc_tax + $kkc_tax;
	$point2val = number_format($amount, 2);
	$get_point_val = substr($point2val, -2);
	  
	if($get_point_val == 00)
	{
	 $roundoff = ''; 
	 $totalValue = round($rent_amount + $service_tax + $sbc_tax + $kkc_tax);
	}
	else if($get_point_val > 00 && $get_point_val < 50)
	{
	  $roundoff = "(-)0.".$get_point_val;
	  $subtractval = "0.".$get_point_val;
	  $totalValue = $rent_amount + $service_tax + $sbc_tax + $kkc_tax - $subtractval;
	}
	else
	{
	  $addpointval = 100 - $get_point_val;
	  
	  if($addpointval < 10)
	  {
		$mergeval =  "0".$addpointval;
	  }
	  else
	  {
		  $mergeval =  $addpointval;
	  }
	  
	  $roundoff = "0.".$mergeval;
	  $totalValue = $rent_amount + $service_tax + $sbc_tax + $kkc_tax + $roundoff;
	  
	}
	
	
    $Update_bill = array('company_name' => $company_name, 'address' =>  $address, 'rent_amount' => $rent_amount, 'service_tax' => $service_tax, 
	'sbc_tax' => $sbc_tax, 'kkc_tax' => $kkc_tax, 'round_off' =>  $roundoff, 'rent_total_amount' => $totalValue, 'final_amount' => $totalValue, 
	'no_of_device_rent' => $total_device, 'total_device' => $total_device, 'update_action' => 'DataChange');
	$condition = array('id' => $row_id);		
	
	update_query('internalsoftware.service_tax_invoice_bill', $Update_bill, $condition);
	
	 echo "<script>alert('Data Update Successfully.');</script>";
	 echo "<script>window.close();</script>";
   

}
?>

 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>

function validateForm()
{
	var companyname = document.myForm.company_name.value;
	var address = document.myForm.address.value;
	var rentamount = document.myForm.rent_amount.value;
	var finalamount = document.myForm.final_amount.value;
	var totaldevice = document.myForm.total_device.value;
	
	if(companyname == "")
	{
	  alert("Please Enter Company Name.") ;
	  document.myForm.company_name.focus();
	  return false;
	}
	
	if(address == "")
	{
	  alert("Please Enter Address.") ;
	  document.myForm.address.focus();
	  return false;
	}
	
	if(totaldevice == "")
	{
	  alert("Please Enter Total No of Device.") ;
	  document.myForm.total_device.focus();
	  return false;
	}
	
	if(rentamount == "")
	{
	  alert("Please Enter Rent Amount.") ;
	  document.myForm.rent_amount.focus();
	  return false;
	}
	
	/*if(finalamount == "")
	{
	  alert("Please Enter Final Amount.") ;
	  document.myForm.final_amount.focus();
	  return false;
	}*/
	
		
}


function calculaterent(price)
{
    var ser_tax = 14;
	var sbc_tax = 0.5;
	var kkc_tax = 0.5;
   
    document.getElementById('service_tax').value= parseInt(price * ser_tax / 100);
	document.getElementById('sbc_tax').value= price * sbc_tax / 100;
	document.getElementById('kkc_tax').value= price * kkc_tax / 100; 
	 	
	
    document.getElementById('final_amount').value=Math.round(parseInt(price) + parseInt(price * ser_tax / 100) + (price * sbc_tax / 100) + (price * kkc_tax / 100));
    //alert(result);

}

</script>
    
 <form name="myForm" action="" onsubmit="return validateForm()" method="post">
 

   <table style="padding-left:100px;width:500px;" cellspacing="5" cellpadding="5">

         <tr>
            <td>User Name </td>
            <td><input type="text" value="<?=$Bill_data[0]['client_name'];?>" readonly="readonly"/>
                <input type="hidden" name="row_id" id="row_id" value="<?=$Bill_data[0]['id'];?>"  /></td>
        </tr>
        <tr>
            <td>Company Name</td>
            <td><input type="text" name="company_name" id="company_name" value="<?=$Bill_data[0]['company_name'];?>" /></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><textarea name="address" id="address"><?=$Bill_data[0]['address'];?></textarea></td>
        </tr>
        <tr>
            <td>Unit Price</td>
            <td><input type="text" value="<?=$Bill_data[0]['unit_price'];?>" readonly="readonly"/></td>
        </tr>
        <tr>
            <td>Total Vehicle</td>
            <td><input type="text" name="total_device" id="total_device" value="<?=$Bill_data[0]['no_of_device_rent'];?>" /></td>
        </tr>        
        <tr>
            <td>Rent Amount</td>
            <td><input type="text" name="rent_amount" id="rent_amount" value="<?=$Bill_data[0]['rent_amount'];?>" onblur="calculaterent(this.value);" /></td>
        </tr>
        
        <tr>
          <td>Service Tax(14%)</td>
          <td><input type="value" name="service_tax" id="service_tax" value="<?=$Bill_data[0]['service_tax'];?>" readonly /></td>
        </tr>
        <tr>
          <td>SBC Tax (0.5%)</td>
          <td><input type="value" name="sbc_tax" id="sbc_tax" value="<?=$Bill_data[0]['sbc_tax'];?>" readonly /></td>
        </tr>           
        <tr>
          <td>KKC Tax (0.5%)</td>
          <td><input type="value" name="kkc_tax" id="kkc_tax" value="<?=$Bill_data[0]['kkc_tax'];?>" readonly /></td>
        </tr>
        <tr>
            <td>Final Amount</td>
            <td><input type="text" name="final_amount" id="final_amount" value="<?=$Bill_data[0]['final_amount'];?>" /></td>
        </tr>
        
        <tr><td colspan="2" align="center"> <input type="submit" name="submit" value="submit"  />
             <input type="button" name="Cancel" value="Cancel" onClick="window.location = 'list_rent_bill.php' " /></td>

        </tr>

     </table>
     
    </form>
   
  </div>
 
<?php
include("../include/footer.php"); ?>

