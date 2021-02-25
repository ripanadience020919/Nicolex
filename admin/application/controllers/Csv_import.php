<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csv_import extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('csv_import_model');
		$this->load->library('csvimport');
	}

	function index()
	{
		$this->load->view('csv_import');
	}

	public function load_data()
	{
		$result = $this->csv_import_model->select();
		$output = '
                                        <table id="datatable-buttons"
                                            class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Category</th>
                                                    <th>bidenticationfee (NGN)</th>
                                                    <th>hselevy (NGN)</th>
                                                    <th>professionallevy (NGN)</th>
                                                    <th>refusedisposal (NGN)</th>
                                                    <th>billboard (NGN)</th>
                                                    <th>fire (NGN)</th>
                                                    <th>privateenterprise (NGN)</th>
                                                    <th>evssanitation (NGN)</th>
                                                    <th>total (NGN)</th>
                                                    <th>State</th>
                                                    <th>Government</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
		';
		$count = 0;
		if($result->num_rows() > 0)
		{
			foreach($result->result() as $row)
			{
				$count = $count + 1;
				$output .= '<tbody>
				<tr>
					<td>'.$count.'</td>
					<td>'.$row->first_name.'</td>
					<td>'.$row->last_name.'</td>
					<td>'.$row->phone.'</td>
					<td>'.$row->email.'</td>
				</tr></tbody>
				';
			}
		}
		else
		{
			$output .= '
			<tr>
	    		<td colspan="5" align="center">Data not Available</td>
	    	</tr>
			';
		}
		$output .= '</table></div>';
		echo $output;
	}

	function import_bus_rate_csv()
	{
		$file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
		foreach($file_data as $row)
		{
			$data[] = array(
				'bid'	=>	$row["bid"],
        		'category'		=>	$row["category"],
        		'bidenticationfee'	=>	$row["bidenticationfee"],
        		'hselevy'			=>	$row["hselevy"],
        		'professionallevy'			=>	$row["professionallevy"],
        		'refusedisposal'			=>	$row["refusedisposal"],
        		'billboard'			=>	$row["billboard"],
        		'fire'			=>	$row["fire"],
        		'privateenterprise'			=>	$row["privateenterprise"],
        		'evssanitation'			=>	$row["evssanitation"],
        		'total'			=>	$row["total"],
        		'state'			=>	$row["state"],
        		'government'			=>	$row["government"]
			);
		}
		$this->csv_import_model->insert_businessrate($data);
		redirect(base_url() . 'home/business_rate');
	}

	function import_pro_rate_csv()
	{
		// echo '<pre>';print_r($_FILES);die();
		$file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
		foreach($file_data as $row)
		{
			// echo '<pre>';print_r($row);die();
			$data[] = array(
				'type'	=>	$row["﻿type"],
        		'identification'		=>	$row["identification"],
        		'landuse'	=>	$row["landuse"],
        		'wastesystem'			=>	$row["wastesystem"],
        		'radiationfee'			=>	$row["radiationfee"],
        		'infrastructre'			=>	$row["infrastructre"],
        		'polution'			=>	$row["polution"],
        		'total'			=>	$row["total"],
        		'state'			=>	$row["state"],
        		'government'			=>	$row["government"]
			);
		}
		$this->csv_import_model->insert_propertyrate($data);
		redirect(base_url() . 'home/property_rate');
	}

	function import_veh_rate_csv()
	{
		// echo '<pre>';print_r($_FILES);die();
		$file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
		foreach($file_data as $row)
		{
			// echo '<pre>';print_r($row);die();
			$data[] = array(
				'type'	=>	$row["﻿type"],
        		'rate'			=>	$row["rate"],
        		'state'			=>	$row["state"],
        		'government'			=>	$row["government"]
			);
		}
		$this->csv_import_model->insert_vehiclerate($data);
		redirect(base_url() . 'home/vehicle_rate');
	}	
}
