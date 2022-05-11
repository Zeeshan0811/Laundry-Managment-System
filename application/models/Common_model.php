<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common_model extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function tableRow($table, $column, $columnValue)
    {
        return $this->db->get_where($table, array($column => $columnValue))->row();
    }

    function tableSingleRow($table)
    {
        return $this->db->get($table)->row();
    }

    function existing_check($table, $where)
    {
        return $this->db->select('*')->where($where)->get($table)->row();
    }


    // add new data into a database table
    function insert_data($table_name, $data)
    {
        $this->db->insert($table_name, $data);
        return $this->db->insert_id();
    }

    // Insert Multiple data at once in a database table 
    function insert_batch($table_name, $data)
    {
        $this->db->insert_batch($table_name, $data);
        return $this->db->affected_rows();
    }


    // update data by id of a database table
    function update_data($table_name, $data, $column_name, $column_value)
    {
        $this->db->where($column_name, $column_value);
        $this->db->update($table_name, $data);
        return $this->db->affected_rows();
    }

    // delete data by id of a database table
    function delete_data($table_name, $column_name, $column_value)
    {
        $this->db->where($column_name, $column_value);
        $this->db->delete($table_name);
        return $this->db->affected_rows();
    }

    // delete data by id of a database table
    function delete_data_by_multi_columns($table_name, $where)
    {
        $this->db->where($where);
        $this->db->delete($table_name);
        return $this->db->affected_rows();
    }


    // get data list by single column of a database table
    function get_data_list_by_single_column($table_name, $column_name, $column_value, $order_column_name = NULL, $order = NULL, $start_limit = NULL, $per_page = NULL)
    {
        if (isset($order_column_name) && isset($order))
            $this->db->order_by($order_column_name, $order);
        if (isset($start_limit))
            $this->db->limit($per_page, $start_limit);
        $this->db->where($column_name, $column_value);
        return $this->db->get($table_name)->result();
    }

    // get data data by same column but different values of a database table
    function get_data_list_by_single_in_column($table_name, $column_name, $column_value, $order_column_name = NULL, $order = NULL, $start_limit = NULL, $per_page = NULL)
    {
        if (isset($order_column_name) && isset($order))
            $this->db->order_by($order_column_name, $order);
        if (isset($start_limit))
            $this->db->limit($per_page, $start_limit);
        $this->db->where_in($column_name, $column_value);
        return $this->db->get($table_name)->result();
    }

    // get data list by Multiple column of a database tabl
    function get_data_list_by_multiple_columns($table_name, $select_columns, $where, $order_column_name = NULL, $order = NULL)
    {
        $this->db->select($select_columns);
        $this->db->from($table_name);
        $this->db->where($where);
        if (isset($order_column_name) && isset($order))
            $this->db->order_by($order_column_name, $order);
        return $this->db->get()->result();
    }


    // get all data list of a database table
    function get_data_list($table_name, $order_column_name = NULL, $order = NULL, $start_limit = NULL, $per_page = NULL, $where = NULL, $sorting = NULL)
    {
        if (isset($order_column_name) && isset($order))
            $this->db->order_by($order_column_name, $order);
        if (isset($where))
            $this->db->where($where);
        if (isset($start_limit))
            $this->db->limit($per_page, $start_limit);
        if (!empty($sorting))
            $this->db->order_by($sorting['field'], $sorting['type']);

        return $this->db->get($table_name)->result();
    }


    // Get Single row 
    function table_info($table, $column_name, $column_value)
    {
        $query = $this->db->get_where($table, array($column_name => $column_value));
        return $query->row();
    }

    // Get Single cell 
    function get_single_cell_by_single_column($select, $table, $column_name, $column_value)
    {
        $query = $this->db->select($select)->get_where($table, array($column_name => $column_value));
        return $query;
    }




    // Get data list with joining table 
    function get_data_list_with_join($table_name, $join_to, $field_name, $match_to, $sortingField = NULL, $sortingType = NULL, $groupBy = null, $where = null)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->join($join_to, $join_to . '.' . $field_name . '=' . $table_name . '.' . $match_to);
        if (!empty($sortingType)) {
            $this->db->order_by($sortingField, $sortingType);
        }
        if (isset($groupBy))
            $this->db->group_by($groupBy);
        if (isset($where))
            $this->db->where($where);
        return $this->db->get()->result();
    }

    // get single data by single column of a database table
    function get_single_data_by_single_column($table_name, $column_name, $column_value)
    {
        $this->db->where($column_name, $column_value);
        return $this->db->get($table_name)->row();
    }

    // get single data by many columns of a database table
    function get_data_list_by_many_columns($table_name, $column_array, $order_column_name = NULL, $order = NULL, $start_limit = NULL, $per_page = NULL)
    {
        $this->db->where($column_array);
        if (isset($order_column_name) && isset($order))
            $this->db->order_by($order_column_name, $order);
        if (isset($start_limit))
            $this->db->limit($per_page, $start_limit);
        return $this->db->get($table_name)->result();
    }



    // get single data by many columns of a database table
    function get_single_data_by_many_columns($table_name, $column_array)
    {
        $this->db->where($column_array);
        return $this->db->get($table_name)->row();
    }

    // Get data list of single Column
    function get_data_list_of_single_column($table_name, $column_Name, $group_by = Null)
    {
        $this->db->select($column_Name);
        $this->db->from($table_name);
        if (isset($group_by))
            $this->db->group_by($group_by);
        return $this->db->get()->result();
    }


    //Get Last Row ID from a database table 
    function get_last_row_id($table_name, $id)
    {
        $result = $this->db->select($id)->order_by($id, "desc")->limit(1)->get($table_name)->row();
        return $result;
    }

    // get number of rows of a database table
    function count_all_data($table_name)
    {
        return $this->db->count_all($table_name);
    }

    function convertNumber($num = false)
    {
        $num = str_replace(array(',', ''), '', trim($num));
        if (!$num) {
            return false;
        }
        $num = (int) $num;
        $words = array();
        $list1 = array(
            '', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
            'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
        );
        $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
        $list3 = array(
            '', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
            'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
            'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
        );
        $num_length = strlen($num);
        $levels = (int) (($num_length + 2) / 3);
        $max_length = $levels * 3;
        $num = substr('00' . $num, -$max_length);
        $num_levels = str_split($num, 3);
        for ($i = 0; $i < count($num_levels); $i++) {
            $levels--;
            $hundreds = (int) ($num_levels[$i] / 100);
            $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ($hundreds == 1 ? '' : '') . ' ' : '');
            $tens = (int) ($num_levels[$i] % 100);
            $singles = '';
            if ($tens < 20) {
                $tens = ($tens ? ' and ' . $list1[$tens] . ' ' : '');
            } elseif ($tens >= 20) {
                $tens = (int) ($tens / 10);
                $tens = ' and ' . $list2[$tens] . ' ';
                $singles = (int) ($num_levels[$i] % 10);
                $singles = ' ' . $list1[$singles] . ' ';
            }
            $words[] = $hundreds . $tens . $singles . (($levels && (int) ($num_levels[$i])) ? ' ' . $list3[$levels] . ' ' : '');
        } //end for loop
        $commas = count($words);
        if ($commas > 1) {
            $commas = $commas - 1;
        }
        $words = implode(' ',  $words);
        $words = preg_replace('/^\s\b(and)/', '', $words);
        $words = trim($words);
        $words = ucfirst($words);
        $words = $words . ".";
        return $words;
    }


    // Get Bangladeshi Currency
    // function getCurrency(float $number)
    function getCurrency($number)
    {
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(
            0 => '', 1 => 'one', 2 => 'two',
            3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
            7 => 'seven', 8 => 'eight', 9 => 'nine',
            10 => 'ten', 11 => 'eleven', 12 => 'twelve',
            13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
            16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
            19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
            40 => 'forty', 50 => 'fifty', 60 => 'sixty',
            70 => 'seventy', 80 => 'eighty', 90 => 'ninety'
        );
        $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
        while ($i < $digits_length) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str[] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
            } else $str[] = null;
        }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal > 0) ? ". " . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Poisa' : '';
        return ($Rupees ? $Rupees . 'Taka ' : '') . $paise;
    }

    // Transelate number into word
    function translate_to_words($number)
    {
        // zero is a special case, it cause problems even with typecasting if we don't deal with it here
        $max_size = pow(10, 18);
        if (!$number)
            return "zero";
        if (is_int($number) && $number < abs($max_size)) {
            $prefix = '';
            $suffix = '';
            switch ($number) {
                    // setup up some rules for converting digits to words
                case $number < 0:
                    $prefix = "negative";
                    $suffix = $this->translate_to_words(-1 * $number);
                    $string = $prefix . " " . $suffix;
                    break;
                case 1:
                    $string = "one";
                    break;
                case 2:
                    $string = "two";
                    break;
                case 3:
                    $string = "three";
                    break;
                case 4:
                    $string = "four";
                    break;
                case 5:
                    $string = "five";
                    break;
                case 6:
                    $string = "six";
                    break;
                case 7:
                    $string = "seven";
                    break;
                case 8:
                    $string = "eight";
                    break;
                case 9:
                    $string = "nine";
                    break;
                case 10:
                    $string = "ten";
                    break;
                case 11:
                    $string = "eleven";
                    break;
                case 12:
                    $string = "twelve";
                    break;
                case 13:
                    $string = "thirteen";
                    break;
                    // fourteen handled later
                case 15:
                    $string = "fifteen";
                    break;
                case $number < 20:
                    $string = $this->translate_to_words($number % 10);
                    // eighteen only has one "t"
                    if ($number == 18) {
                        $suffix = "een";
                    } else {
                        $suffix = "teen";
                    }
                    $string .= $suffix;
                    break;
                case 20:
                    $string = "twenty";
                    break;
                case 30:
                    $string = "thirty";
                    break;
                case 40:
                    $string = "forty";
                    break;
                case 50:
                    $string = "fifty";
                    break;
                case 60:
                    $string = "sixty";
                    break;
                case 70:
                    $string = "seventy";
                    break;
                case 80:
                    $string = "eighty";
                    break;
                case 90:
                    $string = "ninety";
                    break;
                case $number < 100:
                    $prefix = $this->translate_to_words($number - $number % 10);
                    $suffix = $this->translate_to_words($number % 10);
                    //$string = $prefix . "-" . $suffix;
                    $string = $prefix . " " . $suffix;
                    break;
                    // handles all number 100 to 999
                case $number < pow(10, 3):
                    // floor return a float not an integer
                    $prefix = $this->translate_to_words(intval(floor($number / pow(10, 2)))) . " hundred";
                    if ($number % pow(10, 2))
                        $suffix = " and " . $this->translate_to_words($number % pow(10, 2));
                    $string = $prefix . $suffix;
                    break;
                case $number < pow(10, 6):
                    // floor return a float not an integer
                    $prefix = $this->translate_to_words(intval(floor($number / pow(10, 3)))) . " thousand";
                    if ($number % pow(10, 3))
                        $suffix = $this->translate_to_words($number % pow(10, 3));
                    $string = $prefix . " " . $suffix;
                    break;
            }
        } else {
            echo "ERROR with - $number Number must be an integer between -" . number_format($max_size, 0, ".", ",") . " and " . number_format($max_size, 0, ".", ",") . " exclussive.";
        }
        return $string;
    }

    public function update($table, $data, $id)
    {
        $this->db->update($table, $data, $id);
    }

    public function destroy($table, $where)
    {
        $this->db->delete($table, $where);
    }


    public function countAll($table, $where = array())
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->count_all_results();
    }

    function get_data_list_by_single_columns($table_name, $column_name, $column_value, $order_column_name = NULL, $order = NULL, $start_limit = NULL, $per_page = NULL)
    {
        if (isset($order_column_name) && isset($order))
            $this->db->order_by($order_column_name, $order);
        if (isset($start_limit))
            $this->db->limit($per_page, $start_limit);
        $this->db->where($column_name, $column_value);
        return $this->db->get($table_name)->row();
    }

    function get_data_lists($table_name, $order_column_name = NULL, $order = NULL, $start_limit = NULL, $per_page = NULL)
    {
        if (isset($order_column_name) && isset($order))
            $this->db->order_by($order_column_name, $order);
        if (isset($start_limit))
            $this->db->limit($per_page, $start_limit);
        // if (!empty($sorting))
        // $this->db->order_by($sorting['field'], $sorting['type']);

        return $this->db->get($table_name)->row();
    }



    // Schedule Check
    function get_schedule_check($property_id, $date_starting, $date_end)
    {

        $this->db->select('*');
        $this->db->from('nso_pricing');
        $this->db->where('property_id', $property_id);
        $this->db->where('status', 1);
        $this->db->where('date_starting <=', $date_starting);
        $this->db->where('date_end >= ', $date_end);

        return $this->db->get()->row();
        // return $this->db->last_query();
    }

    function get_product($pro_id = null, $productId = null, $uri = null, $where = null, $order_column_name = NULL, $order = NULL, $limit = null)
    {

        if (isset($pro_id)) {
            $column_name = 'pro_id';
            $column_value = $pro_id;
            $where[$column_name] = $column_value;
        }

        if (isset($productId)) {
            $column_name = 'productId';
            $column_value = $productId;
            $where[$column_name] = $column_value;
        }

        if (isset($uri)) {
            $column_name = ' nso_product.uri';
            $column_value = $uri;
            $where[$column_name] = $column_value;
        }


        // $this->db->select('*');
        $selected_columns =
            'pro_id, 
            pro_category, 
            nso_product.uri as uri, 
            productId, 
            brandName, 
            pro_weight, 
            salesPrice, 
            discount, 
            cardPrice,
            type.title as typeTitle, 
            category.title as categoryTitle, 
            formulation.title as formulationTitle , 
            generic.title as genericTitle, 
            company.title as companyTitle,

            type.uri as typeUri,
            category.uri as categoryUri,
            formulation.uri as formulationUri,
            generic.uri as genericUri,
            company.uri as companyUri,

            visiblity, 
            availability, 
            pro_information,
            pro_instruction,
            meta_keywords, 
            meta_description';

        $this->db->select($selected_columns);
        $this->db->from('nso_product');
        if (isset($where))
            $this->db->where($where);
        $this->db->join('nso_allsetup type', 'type.unitId = nso_product.pro_type', 'left');
        $this->db->join('nso_allsetup category', 'category.unitId = nso_product.pro_category', 'left');
        $this->db->join('nso_allsetup formulation', 'formulation.unitId = nso_product.formulationId', 'left');
        $this->db->join('nso_allsetup generic', 'generic.unitId = nso_product.pro_genericId', 'left');
        $this->db->join('nso_allsetup company', 'company.unitId = nso_product.pro_company', 'left');

        if (isset($limit))
            $this->db->limit($limit);

        if (isset($order_column_name) && isset($order)) {
            $this->db->order_by($order_column_name, $order);
            return $this->db->get()->result();
        } else {
            $product = $this->db->get()->row();
            $product->productTitle = $product->formulationTitle . ' ' . $product->brandName . ' ' . $product->pro_weight;

            $this->db->select('*');
            $this->db->from('nso_images');
            $this->db->where('reference_id', $product->pro_id);
            $this->db->order_by('image_order', 'ASC');

            $product->imageList = $this->db->get()->result();

            return $product;
        }
    }



    public function get_single_product_image($pro_id)
    {
        $this->db->select('*');
        $this->db->from('nso_images');
        $this->db->where('reference_id', $pro_id);
        $this->db->order_by('image_order', 'ASC');

        return $this->db->get()->result();
    }
}
