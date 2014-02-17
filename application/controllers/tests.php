<script src="../scripts/loadContent.js"></script>

<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Tests extends CI_Controller {
		
		public function index()
		{
			$this->unitTests();
		}

		public function unitTests() {
			$this->load->model('model_users');
			$did_log_in = $this->model_users->can_log_in();
			$expect_res = false;
			$test_na = 'Did user log in? No';
			echo $this->unit->run($did_log_in, $expect_res, $test_na);

			$this->user_deleted();
		}

		public function user_deleted() {
			$this->load->model('model_users');
			$did_log_in = $this->model_users->delete_user();
			$expect_res = false;
			$test_na = 'User deleted?';
			echo $this->unit->run($did_log_in, $expect_res, $test_na);

			$this->log_in_success();
		}

		public function log_in_success() {
			$this->load->model('model_users');
			$did_log_in = $this->model_users->can_log_in();
			$expect_res = true;
			$test_na = 'Success log in!';
			echo $this->unit->run($did_log_in, $expect_res, $test_na);

			$this->all_teams_inserted();
		}

		public function all_teams_inserted() {
			$this->db->select('team');
			$query = $this->db->get('teams');
			$empty_fields = 0;

			foreach($query->result() as $row) {
				if(empty($row->team)) {
					$empty_fields++;
				}
			}

			$expect_res = 0;
			$test_na = 'No empty team fields';
			echo $this->unit->run($empty_fields, $expect_res, $test_na);

			$this->all_leagues_inserted();
		}

		public function all_leagues_inserted() {
			$this->db->select('league');
			$query = $this->db->get('teams');
			$empty_fields = 0;

			foreach($query->result() as $row) {
				if(empty($row->league)) {
					$empty_fields++;
				}
			}

			$expect_res = 0;
			$test_na = 'No empty team fields';
			echo $this->unit->run($empty_fields, $expect_res, $test_na);

			$this->all_attacks_inserted();
		}

		public function all_attacks_inserted() {
			$this->db->select('attack');
			$query = $this->db->get('teams');
			$empty_fields = 0;

			foreach($query->result() as $row) {
				if(empty($row->attack)) {
					$empty_fields++;
				}
			}

			$expect_res = 0;
			$test_na = 'No empty team fields';
			echo $this->unit->run($empty_fields, $expect_res, $test_na);

			$this->all_midfields_inserted();
		}

		public function all_midfields_inserted() {
			$this->db->select('midfield');
			$query = $this->db->get('teams');
			$empty_fields = 0;

			foreach($query->result() as $row) {
				if(empty($row->midfield)) {
					$empty_fields++;
				}
			}

			$expect_res = 0;
			$test_na = 'No empty team fields';
			echo $this->unit->run($empty_fields, $expect_res, $test_na);

			$this->all_defenses_inserted();
		}

			public function all_defenses_inserted() {
			$this->db->select('defense');
			$query = $this->db->get('teams');
			$empty_fields = 0;

			foreach($query->result() as $row) {
				if(empty($row->defense)) {
					$empty_fields++;
				}
			}

			$expect_res = 0;
			$test_na = 'No empty team fields';
			echo $this->unit->run($empty_fields, $expect_res, $test_na);
		}
	}

/* End of file tests.php */