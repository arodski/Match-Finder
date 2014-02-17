<?php
	class Model_matches extends CI_Model {
		/** 
		 * Inserts to database the information for a particular previously played match.
		 *
		 * @access 		public
		 * @param 		string		
		 */
		public function save_match_entry($user_email, $opponent_email, $team, $opponent, $user_score, $opponent_score) {
			date_default_timezone_set('America/Chicago');
   			$datestring = "%Y-%m-%d %h:%i:%s";
			$time = time();

			$match_data = array(
				'email' => $user_email,
	   			'opponent_email' => $opponent_email,
	   			'user_team' => $team,
	   			'opponent_team' => $opponent,
				'user_score' => $user_score,
				'opponent_score' => $opponent_score,
	   			'date_posted' => mdate($datestring, $time)
			);

			$this->db->insert('match_history', $match_data); 
		}

		/**
		 * If user account has a match history, get a list of all the matches' information.
		 *
		 * @access 		public
		 * @return 		array	
		 */
		public function list_previous_matches() {
			$this->db->select('user_team, opponent_team, user_score, opponent_score, date_posted');
			$this->db->where('email', $this->session->userdata('email')); 
			$query = $this->db->get('match_history');

			if($query->num_rows() > 0) {
				$i=0;
				foreach($query->result() as $row) {
					$match_records[$i] = array(
						'user_team' => $row->user_team,
						'opponent_team' => $row->opponent_team,
						'user_score' => $row->user_score,
						'opponent_score' => $row->opponent_score,
						'date_posted' => $row->date_posted
					);
					$i++;
				}

				return $match_records;
			}
		}
	}

/* End of file model_matches.php */