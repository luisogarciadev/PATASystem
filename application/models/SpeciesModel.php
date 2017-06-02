<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SpeciesModel extends CI_Model {
	var $id;
	var $name;

	function __construct()
    {
        parent::__construct();
    }

    function select() {
        $query = $this->db->get('species');
        return $query->result();
    }
}