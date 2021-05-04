<?php 
class addpaymentcustomer_model extends CI_Model {
	public $table_name = 'tbl_addmetercustomer';
    public $table_customername = 'tbl_addcustomer';
	public $table_amount = 'tbl_amountrate';
	public $table_customers = 'tbl_addcustomer';
	public $table_address = 'tbl_web_settings';
	public $table_monthly = 'tbl_monthlycustomer';
	public $table_expenses = 'tbl_addexpenses';
	public $table_payrol = 'tbl_payrols';
	public $table_customer = 'tbl_addcustomer';
	public $table_ledger ='tbl_ledgers';
	public $table_transactions ='tbl_transactions';
	// Autoloading a system library usin constructor method
	public function __construct() {
        parent::__construct();
    }
	    // to get all ledgers
	public function fetchLedger(){
		$this->db->select("*");
		$this->db->from($this->table_ledger);
		//$this->db->where('id','1');
		//$this->db->where('account_id','5');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
    }	
	/** In Function Get all records from select table **/
    
	 public function get_all_records() {
        $this->db->select("*,(Select first_name from ".$this->table_customername." where ".$this->table_customername.".customer_id = ".$this->table_name.".customer_id) as names,
   ");
		$this->db->from($this->table_name);
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		//echo $this->db->last_query();
		$result = $query->result_array();
		return $result;
    }
	
	 public function get_amountrate() {
        $this->db->select("*");
		$this->db->from($this->table_amount);
		$this->db->order_by('id','desc');
		$this->db->where('id','1');
		$query = $this->db->get();
		//echo $this->db->last_query();
		$result = $query->row_array();
		return $result;
    }

    public function get_unitvalue() {
        $this->db->select("*");
		$this->db->from($this->table_amount);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
    }	
	public function addaccount($data)
	{
		$result = $this->db->insert('tbl_account', $data); 
		return $result;
	}
	 public function get_address() {
        $this->db->select("*");
		$this->db->from($this->table_address);
		$this->db->where('id','1');
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
    }		
	
	public function get_addcustomer() {
        $this->db->select("*");
		$this->db->from($this->table_customername);
		$this->db->order_by('id','desc');
		$this->db->where("customer_type",'metercustomer');
		$query = $this->db->get();
		//echo $this->db->last_query();
		$result = $query->result_array();
		return $result;
    }	
	public function select_getoldmeter($id) {
		
        /*$this->db->select("*");
		$this->db->from($this->table_name);
		$this->db->order_by('id','desc');
		$this->db->where("customer_id",$id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
		*/
		$sql = "SELECT ac.id as addcustomer_id, ac.customer_id, ac.mobile1, ac.mobile2, ac.email_id, am.id as addmetercustomer_id,
		        am.customer_id, am.oldmeter, am.aftermeter, am.consumedunits, am.per_unit, am.amount, am.balance, am.pay_amount, 
				am.total, am.status as addmetercustomer_status, am.date 
		        FROM `tbl_addmetercustomer` am 
				LEFT JOIN `tbl_addcustomer` ac ON ac.customer_id = am.customer_id
				WHERE ac.customer_id = '$id' OR ac.mobile1 = '$id' OR ac.mobile2 = '$id' OR ac.email_id = '$id'
				ORDER BY addmetercustomer_id DESC LIMIT 1
				";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
		
		/*$this->db->select('tbl_addmetercustomer.* , tbl_addcustomer.id as tbid , tbl_addmetercustomer.status as newstatus');
		$this->db->join('tbl_addcustomer', 'tbl_addcustomer.customer_id = tbl_addmetercustomer.customer_id');
		$this->db->get('tbl_addmetercustomer');
		$this->db->order_by('tbl_addmetercustomer.id','desc');
		$this->db->or_where("tbl_addcustomer.customer_id",$id);
		$this->db->or_where("tbl_addcustomer.mobile1",$id);
		$this->db->or_where("tbl_addcustomer.mobile2",$id);
		$this->db->or_where("tbl_addcustomer.email_id",$id);
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
		*/
		
    }	
	public function check_customer_id($id){
		$this->db->select("*");
		$this->db->from($this->table_name);
		$this->db->where('customer_id',$id);
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	
	public function get_addcustomer_add_all_records($id){
		$sql = "SELECT ac.id AS addcustomer_id, ac.customer_id, ac.first_name, ac.middle_name, ac.last_name, 
		        ac.mobile1, ac.mobile2, ac.email_id, ac.address, am.id AS addmetercustomer_id, am.customer_id, 
				am.oldmeter, am.aftermeter, am.consumedunits, am.per_unit, am.amount, am.balance, am.pay_amount,
				am.total, am.status AS addmetercustomer_status, am.date, am.month, am.year, tac.customer_id, tac.month, 
				tac.reading, tac.year
				FROM  `tbl_addmetercustomer` am
				LEFT JOIN  `tbl_addcustomer` ac ON ac.customer_id = am.customer_id
				LEFT JOIN  `tbl_addcustomer_reading` tac ON am.customer_id = tac.customer_id
				WHERE  ac.customer_id = '$id' OR ac.mobile1 = '$id' OR ac.mobile2 = '$id' 
				OR ac.email_id = '$id'
                ORDER BY addmetercustomer_id DESC LIMIT 0,1
				";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function get_addcustomer_count_all_records($id, $mon_id){
		$sql = "SELECT ac.id AS addcustomer_id, ac.customer_id, ac.first_name, ac.middle_name, ac.last_name, 
		        ac.mobile1, ac.mobile2, ac.email_id, ac.address, am.id AS addmetercustomer_id, am.customer_id, 
				am.oldmeter, am.aftermeter, am.consumedunits, am.per_unit, am.amount, am.balance, am.pay_amount,
				am.total, am.status AS addmetercustomer_status, am.date, am.month, am.year, tac.customer_id, tac.month, 
				tac.reading, tac.year
				FROM  `tbl_addmetercustomer` am
				LEFT JOIN  `tbl_addcustomer` ac ON ac.customer_id = am.customer_id
				LEFT JOIN  `tbl_addcustomer_reading` tac ON am.customer_id = tac.customer_id
				WHERE  am.month = '$mon_id' AND ac.customer_id = '$id' OR ac.mobile1 = '$id' OR ac.mobile2 = '$id' 
				OR ac.email_id = '$id'
                ORDER BY tac.month DESC LIMIT 0,1
				";
		$query = $this->db->query($sql);
		$result = $query->num_rows();
		return $result;
	}
	
	public function get_addcustomer_show_all_records($id, $mon_id){
		$sql = "SELECT ac.id AS addcustomer_id, ac.customer_id, ac.first_name, ac.middle_name, ac.last_name, 
		        ac.mobile1, ac.mobile2, ac.email_id, ac.address, am.id AS addmetercustomer_id, am.customer_id, 
				am.oldmeter, am.aftermeter, am.consumedunits, am.per_unit, am.amount, am.balance, am.pay_amount,
				am.total, am.status AS addmetercustomer_status, am.date, am.month, am.year, tac.customer_id, tac.month, 
				tac.reading, tac.year
				FROM  `tbl_addmetercustomer` am
				LEFT JOIN  `tbl_addcustomer` ac ON ac.customer_id = am.customer_id
				LEFT JOIN  `tbl_addcustomer_reading` tac ON am.customer_id = tac.customer_id
				WHERE  am.month = '$mon_id' AND ac.customer_id = '$id' OR ac.mobile1 = '$id' OR ac.mobile2 = '$id' 
				OR ac.email_id = '$id'
                ORDER BY tac.month DESC LIMIT 0,1
				";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	
	public function get_meter_reading_all_records($id){
		$sql = "SELECT ac.id AS meter_id, ac.customer_id, ac.reading, ac.month, ac.year, ac.date,ac.amount,am.customer_id, 
		        am.mobile1, am.mobile2, am.email_id, tm.month_name, am.status, ac.previous_reading,ac.consumed,am.status
				FROM  `tbl_addcustomer_reading` ac
				LEFT JOIN  `tbl_addcustomer` am ON ac.customer_id = am.customer_id
				LEFT JOIN  `tbl_months` tm ON ac.month = tm.month_id
				WHERE ac.month = tm.month_id
                AND  am.customer_id = '$id' OR am.mobile1 = '$id' OR am.mobile2 = '$id' 
				OR am.email_id = '$id' 
				ORDER BY meter_id ASC LIMIT 0,10
				";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function get_second_meter($id){
		$sql = "SELECT ac.id AS meter_id, ac.customer_id, ac.reading, ac.month, ac.year, ac.date, am.customer_id, 
		        am.mobile1, am.mobile2, am.email_id, tm.month_name
				FROM  `tbl_addcustomer_reading` ac
				LEFT JOIN  `tbl_addcustomer` am ON ac.customer_id = am.customer_id
				LEFT JOIN  `tbl_months` tm ON ac.month = tm.month_id
				WHERE ac.month = tm.month_id
                AND  am.customer_id = '$id' OR am.mobile1 = '$id' OR am.mobile2 = '$id' 
				OR am.email_id = '$id'
				ORDER BY ac.id DESC LIMIT 1,1
				";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	
	public function collectinfo($id){
		$sql = "SELECT ac.id AS meter_id, ac.customer_id, ac.reading, ac.month, ac.year, ac.date, am.customer_id, 
		        am.mobile1, am.mobile2, am.email_id, tm.month_name, tm.month_id
				FROM  `tbl_addcustomer_reading` ac
				LEFT JOIN  `tbl_addcustomer` am ON ac.customer_id = am.customer_id
				LEFT JOIN  `tbl_months` tm ON ac.month = tm.month_id
				WHERE ac.month = tm.month_id
                AND  am.customer_id = '$id' OR am.mobile1 = '$id' OR am.mobile2 = '$id' 
				OR am.email_id = '$id'
				ORDER BY meter_id DESC LIMIT 0,1
				";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	
	public function month_collectinfo($id){
		$sql = "SELECT ac.id AS meter_id, ac.customer_id, ac.reading, ac.month, ac.year, ac.date, am.customer_id, 
		        am.mobile1, am.mobile2, am.email_id, tm.month_name
				FROM  `tbl_addcustomer_reading` ac
				LEFT JOIN  `tbl_addcustomer` am ON ac.customer_id = am.customer_id
				LEFT JOIN  `tbl_months` tm ON ac.month = tm.month_id
				WHERE  am.customer_id = '$id' OR am.mobile1 = '$id' OR am.mobile2 = '$id' 
				OR am.email_id = '$id'
				ORDER BY meter_id DESC LIMIT 0,1 
				";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	
	public function get_metercustomer_add_all_records($id,$mon_id){
		$sql = "SELECT ac.id AS addcustomer_id, ac.customer_id, am.id AS addmetercustomer_id, am.customer_id, 
		        am.date, am.month, am.year, ac.mobile1, ac.mobile2, ac.email_id
				FROM  `tbl_addmetercustomer` am
				LEFT JOIN  `tbl_addcustomer` ac ON ac.customer_id = am.customer_id
                WHERE am.month = '$mon_id' AND ac.customer_id = '$id' OR ac.mobile1 = '$id' OR ac.mobile2 = '$id' 
				OR ac.email_id = '$id'";
		$query = $this->db->query($sql);
		$result = $query->num_rows();
		return $result;
	}
	
	public function select_getoldmeter_count($id) {
        $this->db->select("*");
		$this->db->from($this->table_name);
		$this->db->order_by('id','desc');
		$this->db->where("customer_id",$id);
		$this->db->limit(1);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$result = $query->num_rows();
		return $result;
    }	
	
	
	
 	/** In Function Get single records for edit view purpose from select table **/
    public function get_single_record($id='') {
        $this->db->select("*");
		$this->db->from($this->table_name);
		if($id != ''){
			$this->db->where("id",$id);
			$query = $this->db->get();
			//echo $this->db->last_query();
			$result = $query->row_array();
		}
		return $result;
    }
  	/** In Function Add Check Exits records for select table **/
	public function exit_details($exit_data) {
        $this->db->select("*");
		$this->db->from($this->table_name);
		$this->db->where($exit_data);
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
    }
	
  	/** In Function Edit Check Exits records  for select table**/
	public function exit_id($exit_data,$local_id) {
        $this->db->select("*");
		$this->db->from($this->table_name);
		$this->db->where($exit_data);
		$query = $this->db->get();
		$result = $query->num_rows();
		if($result > 0){
			$this->db->select("*");
			$this->db->from($this->table_name);
			$this->db->where($exit_data);
			$query = $this->db->get();
			$result = $query->row_array();
			if($result['id'] == $local_id){
				$result ='0';
			}
		}else{
			$result =1;
		}
		return $result;
    }
	
	public function get_dollar_value() {
        $this->db->select("*");
		$this->db->from($this->table_amount);
		$this->db->where('id',1);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
    }
	
	public function get_lastdata($id) {
        $this->db->select("*");
		$this->db->from($this->table_name);
		$this->db->order_by('id','desc');
		$this->db->where("customer_id",$id);
		$this->db->limit(1);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$result = $query->result_array();
		return $result;
    }	
	
  	/** In Function Add records for select table **/
	public function add_record(){  //print_r($this->input->post);exit;
		$id = $this->input->post('name');
		$getData=$this->my_model->select_getoldmeter($id);
		
		if(!empty($getData)){
			if($getData[0]['status']=='1'){
		        $balance = $getData[0]['balance'];
			}else{
			//$balance = $getData[0]['total'];
			   $balance = $getData[0]['balance'];
            
			} 
			
		}
		if(empty($getData)){
		
			$balance = 0;
		}		
			
	$meterdollar = $this->get_dollar_value();
	$consumedunits=$this->input->post('current_reading')-$this->input->post('oldmeter');
	$amount=$meterdollar['per_unit']*$consumedunits;
	$total_amount = $amount + $balance;
	$total_balance = $total_amount - mysql_real_escape_string($this->input->post('pay_amount'));
    $total=$amount+$total_balance-$this->input->post('pay_amount');
	
	$allamount = $this->input->post('paid_total_amount');
	$payamount = $this->input->post('pay_amount');
	$minusamount = $allamount - $payamount;
	
	$final_total_amount = $this->input->post('final_total_amount');
	$pay_amount = $this->input->post('pay_amount');
	$remaining = $allamount - $pay_amount;
	
	    $set_data = array(
						'customer_id' => $this->input->post('customer_id'),
						'ledger_id' => $this->input->post('ledger_id'),
						'invoice_id' => $this->input->post('time_format'),
						'name' => mysql_real_escape_string($this->input->post('first_name')),
						'oldmeter' => mysql_real_escape_string($this->input->post('oldmeter')),
						'aftermeter' => mysql_real_escape_string($this->input->post('current_reading')),
						'per_unit' => $meterdollar['per_unit'],
						'consumedunits' => $consumedunits,
						'amount' => mysql_real_escape_string($this->input->post('paid_total_amount')),
					    'balance' => $remaining,
					    'total' => $allamount,
						'pay_amount' => mysql_real_escape_string($this->input->post('pay_amount')),
						'currency' => mysql_real_escape_string($this->input->post('currency')),
						'month' => mysql_real_escape_string($this->input->post('month')),
						'year' => mysql_real_escape_string($this->input->post('year')),
						'status' => mysql_real_escape_string($this->input->post('status_id')),
						'date' => date('Y-m-d'),
						'create_date_time' => date('Y-m-d H:i:s'),
					);
		$result = $this->db->insert($this->table_name, $set_data); //print_r($result1); exit;
		// save data(first entry) on transaction table
		$lastId = $this->db->insert_id(); 
		$set_data2 = array(
						'tableName' => 'addmetercustomer',
						'transaction_id' => $lastId,
						'ledger_id' => $this->input->post('tab_id'),
						'ledger_id_for' => 'customer_id',
						'debit' => mysql_real_escape_string($this->input->post('pay_amount')),//$allamount,
					    'date' => date('Y-m-d',strtotime($this->input->post('date'))),
					    'create_date_time' => date('Y-m-d H:i:s'),
					    'update_date_time' => date('Y-m-d H:i:s'),
					);
		$result2 = $this->db->insert($this->table_transactions, $set_data2); //print_r($result2); //exit;
		// save data(second entry) on transaction table
		/*$set_data3 = array(
						'tableName' => 'addmetercustomer',
						'transaction_id' => $lastId,
						'ledger_id' => $this->input->post('ledger_id'),
						'ledger_id_for' => 'ledger_id',
		                'credit' => mysql_real_escape_string($this->input->post('pay_amount')),//$allamount,
					    'date' => date('Y-m-d',strtotime($this->input->post('date'))),
					    'create_date_time' => date('Y-m-d H:i:s'),
					    'update_date_time' => date('Y-m-d H:i:s'),
					);
		$result3 = $this->db->insert($this->table_transactions, $set_data3); //print_r($result3); exit;*/
		//print_r($result3);
		return $result2;
	}
	
	/** In Function Add records for select table **/
	public function add_record_multiple($id){
		
		        //$del_id = $_POST['checkbox'][$id];
				//print_r($del_id);
				$customer_id = $_POST['cusomer_id_next'];
				$name = $_POST['first_name'];
				$oldmeter = $_POST['previousreading_'.$id];
				//print_r($oldmeter);
				$aftermeter = $_POST['reading_'.$id];
				$consumedunits = $_POST['consumedunit_'.$id];
				$per_unit = $_POST['unit_d'];
				$amount = $_POST['prsentamount_'.$id];
				$balance = '0';
				$pay_amount = $_POST['prsentamount_'.$id];
				$total = $_POST['prsentamount_'.$id];
				$currency = $_POST['currency'];
				$month = $_POST['monthid_'.$id];
				$year =  $_POST['year_'.$id];
				$status = $_POST['status_'.$id];
				$date = date('Y-m-d');
				$create_date_time = date('Y-m-d H:i:s');
				$update_date_time = date('Y-m-d H:i:s');
				
				 
			
			$set_data = array(
						'customer_id' => $customer_id,
						'ledger_id'  => $this->input->post('ledger_id'),
						'invoice_id' => $this->input->post('time_format'),
						'name' => $name,
						'oldmeter' => $oldmeter,
						'aftermeter' => $aftermeter,
						'consumedunits' => $consumedunits,
						'per_unit' => $per_unit,
						'amount' => $amount,
					    'balance' => $balance,
						'pay_amount' => $pay_amount,
					    'total' => $total,
						'currency' => $currency,
						'month' => $month,
						'year' => $year,
						'status' => $status,
						'date' => $date,
						'create_date_time' => $create_date_time,
						'update_date_time' => $update_date_time,
					); //print_r($set_data); exit;
		$result = $this->db->insert($this->table_name, $set_data); 
		$lastId = $this->db->insert_id(); 
		$set_data2 = array(
						'tableName' => 'addmetercustomer',
						'transaction_id' => $lastId,
						'ledger_id' => $this->input->post('tab_id'),//$customer_id,
						'ledger_id_for' => 'customer_id',
						'debit' => $pay_amount,//mysql_real_escape_string($this->input->post('pay_amount')),//$allamount,
					    'create_date_time' => date('Y-m-d H:i:s'),
					    'update_date_time' => date('Y-m-d H:i:s'),
					);
		$result2 = $this->db->insert($this->table_transactions, $set_data2); //print_r($result2); //exit;
		// save data(second entry) on transaction table
		/*$set_data3 = array(
						'tableName' => 'addmetercustomer',
						'transaction_id' => $lastId,
						'ledger_id' => $this->input->post('ledger_id'),
		                'ledger_id_for' => 'ledger_id',
		                'credit' => $pay_amount,//mysql_real_escape_string($this->input->post('pay_amount')),//$allamount,
					    'create_date_time' => date('Y-m-d H:i:s'),
					    'update_date_time' => date('Y-m-d H:i:s'),
					);
		$result3 = $this->db->insert($this->table_transactions, $set_data3); //print_r($result3); exit;*/
		//print_r($result);
		return $result3;
		
	}
	/** In Function Add records for transaction table **/
	public function add_transaction($id){
		
		        // save data(first entry) on transaction table
		$sql = "SELECT * FROM tbl_addmetercustomer WHERE id =(SELECT MAX(id) FROM tbl_addmetercustomer)";
		$query = $this->db->query($sql);
		$result = $query->result_array();  //print_r($result[0]['id']);exit;
		$lastId = $result[0]['id'];
		//$lastId = $this->db->insert_id(); 
		$set_data2 = array(
						'tableName' => 'addmetercustomer',
						'transaction_id' => $lastId,
						'ledger_id' => $this->input->post('customer_id'),
						'ledger_id_for' => 'customer_id',
						'debit' => mysql_real_escape_string($this->input->post('pay_amount')),//$allamount,
					    'create_date_time' => date('Y-m-d H:i:s'),
					    'update_date_time' => date('Y-m-d H:i:s'),
					);
		$result2 = $this->db->insert($this->table_transactions, $set_data2); //print_r($result2); //exit;
		// save data(second entry) on transaction table
	/*	$set_data3 = array(
						'tableName' => 'addmetercustomer',
						'transaction_id' => $lastId,
						'ledger_id' => $this->input->post('ledger_id'),
						'ledger_id_for' => 'ledger_id',
		                'credit' => mysql_real_escape_string($this->input->post('pay_amount')),//$allamount,
					    'create_date_time' => date('Y-m-d H:i:s'),
					    'update_date_time' => date('Y-m-d H:i:s'),
					);
		$result3 = $this->db->insert($this->table_transactions, $set_data3); //print_r($result3); exit;*/
		return $result;
		
	}
	
  	/** In Function Update records for select table **/
	public function update_record($id){
		
		$ids = $this->input->post('name');
		$getData=$this->my_model->select_getoldmeter($ids);
		//echo'<pre>';print_r($getData);exit;
		if(!empty($getData)){
			if($getData[0]['status']=='1'){
		$balance = 0;
			}else{
			$balance = $getData[0]['total'];
            
			}
			
		}if(empty($getData)){
		
			$balance = 0;
		}	
    $meterdollar=$this->get_dollar_value();
    $consumedunits=$this->input->post('aftermeter')-$this->input->post('oldmeter');
	$amount=$meterdollar['amountrate']*$consumedunits;
    $total=$amount+$balance;
	///echo'<pre>';print_r($consumedunits);
	//echo'<pre>';print_r($amount);
	//echo'<pre>';print_r($balance);
	//echo'<pre>';print_r($total);exit;
		$set_data = array(
						'customer_id' => $this->input->post('name'),
						'name' => mysql_real_escape_string($this->input->post('name')),
						'oldmeter' => mysql_real_escape_string($this->input->post('oldmeter')),
						'aftermeter' => mysql_real_escape_string($this->input->post('aftermeter')),
						'consumedunits' => $consumedunits,
					    'amount' => $amount,
					    'balance' =>$balance,
					    'total' =>$total,
						'status' => 0,
						
						
					);
				//echo'<pre>';print_r($set_data);exit;	
		$this->db->where('id',$id);
		$result = $this->db->update($this->table_name, $set_data); 
		return $result;
	}
	
	public function update_balance($id,$amount){
        $set_data = array(
                          'balance' => $amount,
                    );
		$this->db->where('id',$id);
		$result = $this->db->update($this->table_name, $set_data); 
		return $result;
	}	
	
  	/** In Function Delete records for select table **/
	public function delete_record($id){
		$this->db->where('id',$id);
		$result = $this->db->delete($this->table_name); 
		return $result;
	}
	
  	/** In Function Status Update records for select table **/
	public function status_record($id,$balance,$customer_id){
		$sts = ($balance == 0 ? 1 : 0);
		$set_data = array(
						'balance' => '0',
						'date' => date('Y-m-d'),
					);
		$this->db->where('id',$id);
		$result = $this->db->update($this->table_name, $set_data); 
		if($result){
			$set_data1 = array(
				'paid_status' => $sts
			);
			$this->db->where('customer_id',$customer_id);
			$result = $this->db->update($this->table_customers, $set_data1);
		}
		return $result;
	}
	
	public function get_name($id) {
        //$this->db->select("first_name,middle_name,last_name");
		$this->db->select('*');
		$this->db->from($this->table_customername);
		//$this->db->where('customer_id',$id);
		$this->db->or_where('customer_id',$id);
		$this->db->or_where('mobile1',$id);
		$this->db->or_where('mobile2',$id);
		$this->db->or_where('email_id',$id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
    }
    
	function getReceiptData($customer, $month, $year){
		$this->db->select('tbl_months.month_id as monthid, tbl_months.month_name as monthname,tbl_addmetercustomer.id as ine_id,tbl_addmetercustomer.invoice_id as invoice_ids,tbl_addmetercustomer.date as tdate, tbl_addmetercustomer.*');				   
		$this->db->from('tbl_addmetercustomer');
		$this->db->join('tbl_months','tbl_addmetercustomer.month = tbl_months.month_id');
		$this->db->where('customer_id',$customer);
		$this->db->where('month',$month);
		$this->db->where('year',$year);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	function customer_deatils($customer){
		$this->db->select('*');
		$this->db->from($this->table_customername);
		$this->db->or_where('customer_id',$customer);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	public function get_income_metercustomer(){
		$this->db->select('SUM(pay_amount) as total1');
		$this->db->from($this->table_name);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	public function get_income_monthlycustomer(){
		$this->db->select('SUM(paidamount) as total2');
		$this->db->from($this->table_monthly);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	public function get_outcome_expenses(){
		$this->db->select('SUM(total) as extotal1');
		$this->db->from($this->table_expenses);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	public function get_outcome_payroll(){
		$this->db->select('SUM(total) as extotal2');
		$this->db->from($this->table_payrol);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	public function total_customer(){
		$this->db->select('COUNT(id) as count_id');
		$this->db->from($this->table_customer);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	
	
}
?>