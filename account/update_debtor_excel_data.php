<?php
ob_start();
ini_set('max_execution_time', 50000);
include("../connection.php");


$query = select_query("select * from bill_pendings");
//echo "<pre>";print_r($query);die;

for($i=0;$i<count($query);$i++)
{
	$client_id = $query[$i]['client_id'];
	$customer_name = $query[$i]['customer_name'];
	$sales_manager = $query[$i]['sales_manager'];
	$collection_agent = $query[$i]['collection_agent'];
	
	//if($query[$i]['accessories'] != ''){$accessories = $query[$i]['accessories'];}else{$accessories = 0;}
	//if($query[$i]['yealy'] != ''){$yealy = $query[$i]['yealy'];}else{$yealy = 0;}
		
	if(!empty($query[$i]['D-06-2015']) && trim($query[$i]['D-06-2015'])!='')
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='06' and year='2015'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('device_amount_pending' => $query[$i]['D-06-2015']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 06, 'year' => 2015, 'device_amount_pending' => $query[$i]['D-06-2015'],
					'rent_amount_pending' =>  0, 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['D-09-2015']) && trim($query[$i]['D-09-2015'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='09' and year='2015'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('device_amount_pending' => $query[$i]['D-09-2015']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 09, 'year' => 2015, 'device_amount_pending' => $query[$i]['D-09-2015'],
					'rent_amount_pending' =>  0, 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['D-10-2015']) && trim($query[$i]['D-10-2015'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='10' and year='2015'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('device_amount_pending' => $query[$i]['D-10-2015']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 10, 'year' => 2015, 'device_amount_pending' => $query[$i]['D-10-2015'],
					'rent_amount_pending' =>  0, 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['D-01-2016']) && trim($query[$i]['D-01-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='01' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('device_amount_pending' => $query[$i]['D-01-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 01, 'year' => 2016, 'device_amount_pending' => $query[$i]['D-01-2016'],
					'rent_amount_pending' =>  0, 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['D-02-2016']) && trim($query[$i]['D-02-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='02' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('device_amount_pending' => $query[$i]['D-02-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 02, 'year' => 2016, 'device_amount_pending' => $query[$i]['D-02-2016'],
					'rent_amount_pending' =>  0, 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['D-03-2016']) && trim($query[$i]['D-03-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='03' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('device_amount_pending' => $query[$i]['D-03-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 03, 'year' => 2016, 'device_amount_pending' => $query[$i]['D-03-2016'],
					'rent_amount_pending' =>  0, 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['D-04-2016']) && trim($query[$i]['D-04-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='04' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('device_amount_pending' => $query[$i]['D-04-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 04, 'year' => 2016, 'device_amount_pending' => $query[$i]['D-04-2016'],
					'rent_amount_pending' =>  0, 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['D-05-2016']) && trim($query[$i]['D-05-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='05' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('device_amount_pending' => $query[$i]['D-05-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 05, 'year' => 2016, 'device_amount_pending' => $query[$i]['D-05-2016'],
					'rent_amount_pending' =>  0, 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['D-06-2016']) && trim($query[$i]['D-06-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='06' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('device_amount_pending' => $query[$i]['D-06-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 06, 'year' => 2016, 'device_amount_pending' => $query[$i]['D-06-2016'],
					'rent_amount_pending' =>  0, 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['D-07-2016']) && trim($query[$i]['D-07-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='07' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('device_amount_pending' => $query[$i]['D-07-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 07, 'year' => 2016, 'device_amount_pending' => $query[$i]['D-07-2016'],
					'rent_amount_pending' =>  0, 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['D-08-2016']) && trim($query[$i]['D-08-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='08' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('device_amount_pending' => $query[$i]['D-08-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 08, 'year' => 2016, 'device_amount_pending' => $query[$i]['D-08-2016'],
					'rent_amount_pending' =>  0, 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['D-09-2016']) && trim($query[$i]['D-09-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='09' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('device_amount_pending' => $query[$i]['D-09-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 09, 'year' => 2016, 'device_amount_pending' => $query[$i]['D-09-2016'],
					'rent_amount_pending' =>  0, 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['D-10-2016']) && trim($query[$i]['D-10-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='10' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('device_amount_pending' => $query[$i]['D-10-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 10, 'year' => 2016, 'device_amount_pending' => $query[$i]['D-10-2016'],
					'rent_amount_pending' =>  0, 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['D-11-2016']) && trim($query[$i]['D-11-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='11' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('device_amount_pending' => $query[$i]['D-11-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 11, 'year' => 2016, 'device_amount_pending' => $query[$i]['D-11-2016'],
					'rent_amount_pending' =>  0, 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['D-12-2016']) && trim($query[$i]['D-12-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='12' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('device_amount_pending' => $query[$i]['D-12-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 12, 'year' => 2016, 'device_amount_pending' => $query[$i]['D-12-2016'],
					'rent_amount_pending' =>  0, 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['D-01-2017']) && trim($query[$i]['D-01-2017'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='01' and year='2017'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('device_amount_pending' => $query[$i]['D-01-2017']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 01, 'year' => 2017, 'device_amount_pending' => $query[$i]['D-01-2017'],
					'rent_amount_pending' =>  0, 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['D-02-2017']) && trim($query[$i]['D-02-2017'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='02' and year='2017'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('device_amount_pending' => $query[$i]['D-02-2017']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 02, 'year' => 2017, 'device_amount_pending' => $query[$i]['D-02-2017'],
					'rent_amount_pending' =>  0, 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['D-03-2017']) && trim($query[$i]['D-03-2017'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='03' and year='2017'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('device_amount_pending' => $query[$i]['D-03-2017']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 03, 'year' => 2017, 'device_amount_pending' => $query[$i]['D-03-2017'],
					'rent_amount_pending' =>  0, 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['D-04-2017']) && trim($query[$i]['D-04-2017'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='04' and year='2017'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('device_amount_pending' => $query[$i]['D-04-2017']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 04, 'year' => 2017, 'device_amount_pending' => $query[$i]['D-04-2017'],
					'rent_amount_pending' =>  0, 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['D-05-2017']) && trim($query[$i]['D-05-2017'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='05' and year='2017'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('device_amount_pending' => $query[$i]['D-05-2017']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 05, 'year' => 2017, 'device_amount_pending' => $query[$i]['D-05-2017'],
					'rent_amount_pending' =>  0, 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['D-06-2017']) && trim($query[$i]['D-06-2017'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='06' and year='2017'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('device_amount_pending' => $query[$i]['D-06-2017']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 06, 'year' => 2017, 'device_amount_pending' => $query[$i]['D-06-2017'],
					'rent_amount_pending' =>  0, 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	
	if(!empty($query[$i]['R-02-2015']) && trim($query[$i]['R-02-2015'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='02' and year='2015'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-02-2015']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 02, 'year' => 2015, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-02-2015'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-03-2015']) && trim($query[$i]['R-03-2015'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='03' and year='2015'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-03-2015']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 03, 'year' => 2015, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-03-2015'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-04-2015']) && trim($query[$i]['R-04-2015'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='04' and year='2015'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-04-2015']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 04, 'year' => 2015, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-04-2015'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-05-2015']) && trim($query[$i]['R-05-2015'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='05' and year='2015'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-05-2015']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 05, 'year' => 2015, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-05-2015'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-06-2015']) && trim($query[$i]['R-06-2015'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='06' and year='2015'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-06-2015']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 06, 'year' => 2015, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-06-2015'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-07-2015']) && trim($query[$i]['R-07-2015'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='07' and year='2015'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-07-2015']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 07, 'year' => 2015, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-07-2015'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-08-2015']) && trim($query[$i]['R-08-2015'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='08' and year='2015'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-08-2015']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 08, 'year' => 2015, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-08-2015'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-09-2015']) && trim($query[$i]['R-09-2015'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='09' and year='2015'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-09-2015']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 09, 'year' => 2015, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-09-2015'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-10-2015']) && trim($query[$i]['R-10-2015'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='10' and year='2015'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-10-2015']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 10, 'year' => 2015, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-10-2015'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-11-2015']) && trim($query[$i]['R-11-2015'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='11' and year='2015'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-11-2015']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 11, 'year' => 2015, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-11-2015'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-12-2015']) && trim($query[$i]['R-12-2015'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='12' and year='2015'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-12-2015']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 12, 'year' => 2015, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-12-2015'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-01-2016']) && trim($query[$i]['R-01-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='01' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-01-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 01, 'year' => 2016, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-01-2016'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-02-2016']) && trim($query[$i]['R-02-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='02' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-02-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 02, 'year' => 2016, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-02-2016'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-03-2016']) && trim($query[$i]['R-03-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='03' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-03-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 03, 'year' => 2016, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-03-2016'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-04-2016']) && trim($query[$i]['R-04-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='04' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-04-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 04, 'year' => 2016, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-04-2016'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-05-2016']) && trim($query[$i]['R-05-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='05' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-05-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 05, 'year' => 2016, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-05-2016'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-06-2016']) && trim($query[$i]['R-06-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='06' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-06-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 06, 'year' => 2016, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-06-2016'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-07-2016']) && trim($query[$i]['R-07-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='07' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-07-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 07, 'year' => 2016, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-07-2016'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-08-2016']) && trim($query[$i]['R-08-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='08' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-08-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 08, 'year' => 2016, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-08-2016'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-09-2016']) && trim($query[$i]['R-09-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='09' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-09-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 09, 'year' => 2016, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-09-2016'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-10-2016']) && trim($query[$i]['R-10-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='10' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-10-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 10, 'year' => 2016, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-10-2016'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-11-2016']) && trim($query[$i]['R-11-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='11' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-11-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 11, 'year' => 2016, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-11-2016'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-12-2016']) && trim($query[$i]['R-12-2016'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='12' and year='2016'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-12-2016']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 12, 'year' => 2016, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-12-2016'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-01-2017']) && trim($query[$i]['R-01-2017'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='01' and year='2017'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-01-2017']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 01, 'year' => 2017, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-01-2017'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-02-2017']) && trim($query[$i]['R-02-2017'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='02' and year='2017'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-02-2017']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 02, 'year' => 2017, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-02-2017'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-03-2017']) && trim($query[$i]['R-03-2017'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='03' and year='2017'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-03-2017']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 03, 'year' => 2017, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-03-2017'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-04-2017']) && trim($query[$i]['R-04-2017'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='04' and year='2017'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-04-2017']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 04, 'year' => 2017, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-04-2017'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	if(!empty($query[$i]['R-05-2017']) && trim($query[$i]['R-05-2017'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='05' and year='2017'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('rent_amount_pending' => $query[$i]['R-05-2017']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 05, 'year' => 2017, 'device_amount_pending' => 0,
					'rent_amount_pending' => $query[$i]['R-05-2017'], 'accessory_amount_pending' => 0, 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	
	if(!empty($query[$i]['yealy']) && trim($query[$i]['yealy'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='05' and year='2017'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('yearly_rent' => $query[$i]['yealy']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 05, 'year' => 2017, 'device_amount_pending' => 0,
					'rent_amount_pending' => 0, 'accessory_amount_pending' => 0, 'yearly_rent' => $query[$i]['yealy'], 
					'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}
	
	if(!empty($query[$i]['accessories']) && trim($query[$i]['accessories'])!= "")
	{
		$chk_data = select_query("select * from debtor_pending_billing where client_id='".$client_id."' and month='05' and year='2017'");
		
		if(count($chk_data)>0)
		{
			$update_pending = array('accessory_amount_pending' => $query[$i]['accessories']);
			$condition2 = array('id' => $chk_data[0]['id']);
			update_query('internalsoftware.debtor_pending_billing', $update_pending, $condition2);
		}
		else
		{
			$debtor_history = array('client_id' => $client_id, 'company_name' => $customer_name, 'sales_manager' => $sales_manager, 
					'collection_agent' => $collection_agent, 'month' => 05, 'year' => 2017, 'device_amount_pending' => 0,
					'rent_amount_pending' => 0, 'accessory_amount_pending' => $query[$i]['yealy'], 'req_time' =>  date("Y-m-d H:i:s"));
			$insert_query = insert_query('internalsoftware.debtor_pending_billing', $debtor_history);
		}
	}	
	
	
	
}

echo "Successfully Insert Data";

?>