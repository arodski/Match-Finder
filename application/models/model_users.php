<?php
	class Model_users extends CI_Model {
		/**
		 * Ensure that email and password combination exists in database.
		 *
		 * @access 		public
		 * @return 		Boolean
		 */
		public function can_log_in() {
			$this->db->where('email', $this->input->post('email'));				
			$this->db->where('password', md5($this->input->post('password')));
			$query = $this->db->get('users');

			if($query->num_rows() == 1) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}

		/**
		 * Inserts temporary user account and key to database until account is verified.
		 *
		 * @access 		public
		 * @param 		Integer
		 * @return 		Boolean
		 */
		public function add_temp_user($key) {
			$data = array(
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'key' => $key
			);
			$query = $this->db->insert('temp_users', $data);
			
			if ($query) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}

		/**
		 * Checks to see if a key exists in the temporary user database to identify a particular account.
		 *
		 * @access  	public
		 * @param 		Integer
		 * @return 		Boolean
		 */
		public function is_key_valid($key) {
			$this->db->where('key', $key);
			$query = $this->db->get('temp_users');

			if($query->num_rows() == 1) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}

		/**
		 * Checks if the email exists in the active user database, 
		 * 
		 * @access 		public
		 * @param 		String
		 * @return 		Boolean
		 */
		public function is_valid_email($email) {
			$this->db->where('email', $email);
			$query = $this->db->get('users');

			if($query->num_rows() == 1) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}

		/**
		 * Removes account from temporary database and adds it to the active accounts
		 * database. A special key is used to identify the user's email.
		 *
		 * @access 		public
		 * @param 		Integer
		 * @return 		String or Booleam
		 */
		public function add_user($key) {
			$this->db->where('key', $key);
			$temp_user = $this->db->get('temp_users');

			if($temp_user) {
				$row = $temp_user->row();
				$data = array(
					'email' => $row->email,
					'password' => $row->password,
				);

				$did_add_user = $this->db->insert('users', $data);
			}

			if($did_add_user) {
				$this->db->where('email', $data['email']);
				$this->db->delete('temp_users');
				$this->db->insert('favoriteTeams', array('email' => $data['email']));
				return $data['email'];
			}

			return FALSE;
		} 

		/** 
		 * Deletes active user's account from the database.
		 *
		 * @access 		public
		 */
		public function delete_user() {
			$query = $this->db->where('email', $this->session->userdata('email'));
			$this->db->delete('users');
			$query = $this->db->where('email', $this->session->userdata('email'));
			$this->db->delete('favoriteTeams');
		}
	}

/* End of file model_users.php */