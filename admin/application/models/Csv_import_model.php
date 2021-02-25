<?php
class Csv_import_model extends CI_Model
{
	public function select()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('businessrate');
        return $query;
    }

	function insert_businessrate($data)
	{
		$this->db->insert_batch('businessrate', $data);
	}

	function insert_propertyrate($data)
	{
		$this->db->insert_batch('propertyrate', $data);
	}

	function insert_vehiclerate($data)
	{
		$this->db->insert_batch('vehiclerate', $data);
	}
}
