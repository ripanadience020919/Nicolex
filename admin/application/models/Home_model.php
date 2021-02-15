<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function getlogindata($username, $password)
    {
        $data = $this->db->where('email', $username)->where('opassword', $password)->get('admins')->num_rows();
        return $data;
    }

    public function getsuperadmin($username, $password)
    {
        $data = $this->db->where('email', $username)->where('opassword', $password)->get('admins')->row_array();
        return $data;
    }

    public function businessexemptions()
    {
        $data = $this->db->get('business_exemptions')->result_array();
        return $data;
    }

    public function propertyexemptions()
    {
        $data = $this->db->get('property_exemption')->result_array();
        return $data;
    }

    public function vrpexemptions()
    {
        $data = $this->db->get('vehicle_exemption')->result_array();
        return $data;
    }

    public function approved_b_exem($retid,$formArray)
    {
        $this->db->where('id', $retid)->update('business_exemptions',$formArray);
    }

    public function approved_p_exem($retid,$formArray)
    {
        $this->db->where('id', $retid)->update('property_exemption',$formArray);
    }

    public function approved_vrp_exem($retid,$formArray)
    {
        $this->db->where('id', $retid)->update('vehicle_exemption',$formArray);
    }

    public function deny_b_exem($retid,$formArray)
    {
        $this->db->where('id', $retid)->update('business_exemptions',$formArray);
    }

    public function deny_p_exem($retid,$formArray)
    {
        $this->db->where('id', $retid)->update('property_exemption',$formArray);
    }

    public function deny_vrp_exem($retid,$formArray)
    {
        $this->db->where('id', $retid)->update('vehicle_exemption',$formArray);
    }

    public function faqlist_db()
    {
        $data = $this->db->get('faq')->result_array();
        return $data;
    }

    public function insfaq($data)
    {
        $this->db->insert('faq', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function faqlist_db_by_id($retid)
    {
        $data=$this->db->where('id', $retid)->get('faq')->row();
        return $data;
    }

    public function updfaq($formArray,$id)
    {
        $this->db->where('id', $id)->update('faq', $formArray);
        return true;
    }

    public function infolist_db()
    {
        $data = $this->db->get('info')->result_array();
        return $data;
    }
    
    public function querylist_db()
    {
        $data = $this->db->get('support')->result_array();
        return $data;
    }

    public function insinfo($data)
    {
        $this->db->insert('info', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function insuser_add($data)
    {
        $this->db->insert('user', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function infolist_db_by_id($retid)
    {
        $data=$this->db->where('id', $retid)->get('info')->row();
        return $data;
    }

    public function updinfo($formArray,$id)
    {
        $this->db->where('id', $id)->update('info', $formArray);
        return true;
    }

    public function userlist_db()
    {
        $data = $this->db->get('user')->result_array();
        return $data;
    }

    public function userlist_db_by_id($retid)
    {
        $data=$this->db->where('id', $retid)->get('user')->row();
        return $data;
    }

    public function insuser_edit($formArray,$id)
    {
        $this->db->where('id', $id)->update('user', $formArray);
        return true;
    }

    public function user_payment_history_business_bill_db($retid)
    {
        $data=$this->db->where('userid', $retid)->get('business')->result_array();
        return $data;
    }

    public function user_payment_history_property_bill_db($retid)
    {
        $data=$this->db->where('userid', $retid)->get('property')->result_array();
        return $data;
    }

    public function user_payment_history_vehicle_bill_db($retid)
    {
        $data=$this->db->where('userid', $retid)->get('vehicle')->result_array();
        return $data;
    }
    public function payment_analysis_vehicle_dtl_db($start_data,$end_date){
        $query = $this->db->query("SELECT IFNULL(SUM(`amount`),'0') as 'amount',
            'Vehicle' as 'name_trn'
            FROM `vehicle_bill` 
            WHERE DATE_FORMAT(`createat`,'%Y-%m-%d') BETWEEN '$start_data' AND '$end_date'
        ");
        if($query->num_rows()>0){
            // return $query->result();
            return $query->row();;
        }
    }
    public function payment_analysis_business_dtl_db($start_data,$end_date){
        $query = $this->db->query("SELECT IFNULL(SUM(`amount`),'0') as 'amount',
            'Vehicle' as 'name_trn'
            FROM `business_bill` 
            WHERE DATE_FORMAT(`createat`,'%Y-%m-%d') BETWEEN '$start_data' AND '$end_date'
        ");
        if($query->num_rows()>0){
            // return $query->result();
            return $query->row();;
        }
    }
    public function payment_analysis_property_dtl_db($start_data,$end_date){
        $query = $this->db->query("SELECT IFNULL(SUM(`amount`),'0') as 'amount',
            'Vehicle' as 'name_trn'
            FROM `property_bill` 
            WHERE DATE_FORMAT(`createat`,'%Y-%m-%d') BETWEEN '$start_data' AND '$end_date'
        ");
        if($query->num_rows()>0){
            // return $query->result();
            return $query->row();;
        }
    }

    public function updateorderstatus($status,$order_id)
    {
        $this->db->set('status', $status)->where('id', $order_id)->update('support');
    }

    public function get_total_bus($frm_date,$to_date){
        $this->db->select_sum('trans_amount','tbus')
        ->from('business')
        ->where('paymentdate >=',$frm_date)
        ->where('paymentdate <=',$to_date);
        // ->where('userid =',$this->session->userdata('registerid'));
        return $user = $this->db->get()->row_array();
    }

    public function get_total_bus_state($frm_date,$to_date,$state){
        $this->db->select_sum('trans_amount','tbus')
        ->from('business')
        ->where('state',$state)
        ->where('paymentdate >=',$frm_date)
        ->where('paymentdate <=',$to_date);
        // ->where('userid =',$this->session->userdata('registerid'));
        return $user = $this->db->get()->row_array();
    }

    public function get_total_bus_gov($frm_date,$to_date,$gov){
        $this->db->select_sum('trans_amount','tbus')
        ->from('business')
        ->where('government',$gov)
        ->where('paymentdate >=',$frm_date)
        ->where('paymentdate <=',$to_date);
        // ->where('userid =',$this->session->userdata('registerid'));
        return $user = $this->db->get()->row_array();
    }

    public function get_total_bus_state_gov($frm_date,$to_date,$state,$gov){
        $this->db->select_sum('trans_amount','tbus')
        ->from('business')
        ->where('state',$state)
        ->where('government',$gov)
        ->where('paymentdate >=',$frm_date)
        ->where('paymentdate <=',$to_date);
        // ->where('userid =',$this->session->userdata('registerid'));
        return $user = $this->db->get()->row_array();
    }

    public function get_total_pro($frm_date,$to_date){
        $this->db->select_sum('trans_amount','tpro')
        ->from('property')
        ->where('paymentdate >=',$frm_date)
        ->where('paymentdate <=',$to_date);
        // ->where('userid =',$this->session->userdata('registerid'));
        return $user = $this->db->get()->row_array();
    }

    public function get_total_pro_state($frm_date,$to_date,$state){
        $this->db->select_sum('trans_amount','tpro')
        ->from('property')
        ->where('state',$state)
        ->where('paymentdate >=',$frm_date)
        ->where('paymentdate <=',$to_date);
        // ->where('userid =',$this->session->userdata('registerid'));
        return $user = $this->db->get()->row_array();
    }

    public function get_total_pro_gov($frm_date,$to_date,$gov){
        $this->db->select_sum('trans_amount','tpro')
        ->from('property')
        ->where('government',$gov)
        ->where('paymentdate >=',$frm_date)
        ->where('paymentdate <=',$to_date);
        // ->where('userid =',$this->session->userdata('registerid'));
        return $user = $this->db->get()->row_array();
    }

    public function get_total_pro_state_gov($frm_date,$to_date,$state,$gov){
        $this->db->select_sum('trans_amount','tpro')
        ->from('property')
        ->where('state',$state)
        ->where('government',$gov)
        ->where('paymentdate >=',$frm_date)
        ->where('paymentdate <=',$to_date);
        // ->where('userid =',$this->session->userdata('registerid'));
        return $user = $this->db->get()->row_array();
    }

    public function get_total_vehi($frm_date,$to_date){
        $this->db->select_sum('trans_amount','tvehi')
        ->from('vehicle')
        ->where('paymentdate >=',$frm_date)
        ->where('paymentdate <=',$to_date);
        // ->where('userid =',$this->session->userdata('registerid'));
        return $user = $this->db->get()->row_array();
    }

    public function get_total_vehi_state($frm_date,$to_date,$state){
        $this->db->select_sum('trans_amount','tvehi')
        ->from('vehicle')
        ->where('state',$state)
        ->where('paymentdate >=',$frm_date)
        ->where('paymentdate <=',$to_date);
        // ->where('userid =',$this->session->userdata('registerid'));
        return $user = $this->db->get()->row_array();
    }

    public function get_total_vehi_gov($frm_date,$to_date,$gov){
        $this->db->select_sum('trans_amount','tvehi')
        ->from('vehicle')
        ->where('government',$gov)
        ->where('paymentdate >=',$frm_date)
        ->where('paymentdate <=',$to_date);
        // ->where('userid =',$this->session->userdata('registerid'));
        return $user = $this->db->get()->row_array();
    }

    public function get_total_vehi_state_gov($frm_date,$to_date,$state,$gov){
        $this->db->select_sum('trans_amount','tvehi')
        ->from('vehicle')
        ->where('state',$state)
        ->where('government',$gov)
        ->where('paymentdate >=',$frm_date)
        ->where('paymentdate <=',$to_date);
        return $user = $this->db->get()->row_array();
    }

    public function get_total_years_rev_business($curr_year){
        $this->db->select_sum('trans_amount','trans_amount')
        ->from('business')
        ->where('YEAR(paymentdate)',$curr_year);
        return $user = $this->db->get()->row_array();
    }

    public function get_total_months_rev_business($curr_year,$curr_month){
        $this->db->select_sum('trans_amount','trans_amount')
        ->from('business')
        ->where('YEAR(paymentdate)',$curr_year)
        ->where('MONTH(paymentdate)',$curr_month);
        return $user = $this->db->get()->row_array();
    }

    public function get_total_days_rev_business($curr_day){
        $this->db->select_sum('trans_amount','trans_amount')
        ->from('business')
        ->where('paymentdate',$curr_day);
        return $user = $this->db->get()->row_array();
    }

    public function get_total_weeks_rev_business($week_start,$week_end){
        $this->db->select_sum('trans_amount','trans_amount')
        ->from('business')
        ->where('paymentdate >=',$week_start)
        ->where('paymentdate <',$week_end);
        return $user = $this->db->get()->row_array();
    }

    public function get_total_years_rev_property($curr_year){
        $this->db->select_sum('trans_amount','trans_amount')
        ->from('property')
        ->where('YEAR(paymentdate)',$curr_year);
        return $user = $this->db->get()->row_array();
    }

    public function get_total_months_rev_property($curr_year,$curr_month){
        $this->db->select_sum('trans_amount','trans_amount')
        ->from('property')
        ->where('YEAR(paymentdate)',$curr_year)
        ->where('MONTH(paymentdate)',$curr_month);
        return $user = $this->db->get()->row_array();
    }

    public function get_total_days_rev_property($curr_day){
        $this->db->select_sum('trans_amount','trans_amount')
        ->from('property')
        ->where('paymentdate',$curr_day);
        return $user = $this->db->get()->row_array();
    }

    public function get_total_weeks_rev_property($week_start,$week_end){
        $this->db->select_sum('trans_amount','trans_amount')
        ->from('property')
        ->where('paymentdate >=',$week_start)
        ->where('paymentdate <',$week_end);
        return $user = $this->db->get()->row_array();
    }

    public function get_total_years_rev_vehicle($curr_year){
        $this->db->select_sum('trans_amount','trans_amount')
        ->from('vehicle')
        ->where('YEAR(paymentdate)',$curr_year);
        return $user = $this->db->get()->row_array();
    }

    public function get_total_months_rev_vehicle($curr_year,$curr_month){
        $this->db->select_sum('trans_amount','trans_amount')
        ->from('vehicle')
        ->where('YEAR(paymentdate)',$curr_year)
        ->where('MONTH(paymentdate)',$curr_month);
        return $user = $this->db->get()->row_array();
    }

    public function get_total_days_rev_vehicle($curr_day){
        $this->db->select_sum('trans_amount','trans_amount')
        ->from('vehicle')
        ->where('paymentdate',$curr_day);
        return $user = $this->db->get()->row_array();
    }

    public function get_total_weeks_rev_vehicle($week_start,$week_end){
        $this->db->select_sum('trans_amount','trans_amount')
        ->from('vehicle')
        ->where('paymentdate >=',$week_start)
        ->where('paymentdate <',$week_end);
        return $user = $this->db->get()->row_array();
    }

    public function get_total_LGs_rev(){
        $query = $this->db->query('SELECT alt.government,
                SUM(alt.trans_amount) as trans_amount
                FROM (SELECT `government`,`trans_amount` FROM `business`
                UNION
                SELECT `government`,`trans_amount` FROM `property`
                UNION 
                SELECT `government`,`trans_amount` FROM `vehicle`) alt
                GROUP BY alt.government
                ORDER BY 2 DESC');
        return $query->result_array();
    }

    public function insbustype($data)
    {
        $this->db->insert('typeofbusiness', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function bus_type_list_db()
    {
        $data = $this->db->order_by('id','DESC')->get('typeofbusiness')->result_array();
        return $data;
    }

    public function specific_bus_type($id)
    {
        $data = $this->db->where('id',$id)->get('typeofbusiness')->row_array();
        return $data;
    }

    public function update_bus_type($retid,$formArray)
    {
        $this->db->where('id', $retid)->update('typeofbusiness',$formArray);
    }

    public function insbussize($data)
    {
        $this->db->insert('sizeofbusiness', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function bus_size_list_db()
    {
        $data = $this->db->order_by('id','DESC')->get('sizeofbusiness')->result_array();
        return $data;
    }

    public function specific_bus_size($id)
    {
        $data = $this->db->where('id',$id)->get('sizeofbusiness')->row_array();
        return $data;
    }

    public function update_bus_size($retid,$formArray)
    {
        $this->db->where('id', $retid)->update('sizeofbusiness',$formArray);
    }

    public function insstate_with_gov($data)
    {
        $this->db->insert('statewithgovernment', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function state_with_gov_list_db()
    {
        $data = $this->db->order_by('id','DESC')->get('statewithgovernment')->result_array();
        return $data;
    }

    public function specific_state_with_gov($id)
    {
        $data = $this->db->where('id',$id)->get('statewithgovernment')->row_array();
        return $data;
    }

    public function update_state_with_gov($retid,$formArray)
    {
        $this->db->where('id', $retid)->update('statewithgovernment',$formArray);
    }
}