<?php
	class Model_teams extends CI_Model {
		/**
		 * Get all the different countries in the Fifa 14 game. 
		 *
		 * @access 		public
		 * @return 		array
		 */
		public function get_team_countries() {
			$queryCountry = $this->db->query("SELECT DISTINCT country FROM leagues ORDER BY country DESC");
			$data = array('queryCountry' => $queryCountry);

          	return $data;
		}

		/**
		 * Search database to find the ratings for the user selected team.
		 *
		 * @access  	public
		 * @return 		array
		 */
		public function get_team_ratings() {
			$this->db->select('attack, midfield, defense, updated_email, updated_date');
			$this->db->where('team', $this->session->userdata('team')); 
			$query = $this->db->get('teams');

			$row = $query->row();
			$ratings = array(
				'attack' => $row->attack,
				'midfield' => $row->midfield,
				'defense' => $row->defense,
				'updated_email' => $row->updated_email,
				'updated_date' => $row->updated_date
			);

			return $ratings;
		}

		/**
		 * Adds the email linked to the account and date to the array holding 
		 * the newly updated ratings. Database is then updated for the corresponding team.
		 *
		 * @access 		public
		 * @param 		array
		 */
		public function update_team_ratings($team_info) {
			date_default_timezone_set('America/Chicago');
			$datestring = "%Y-%m-%d %h:%i:%s";
			$time = time();

			$team_info['updated_email'] = $this->session->userdata('email');
			$team_info['updated_date'] = mdate($datestring, $time);

			$this->db->where('team', $this->session->userdata('team')); 
			$this->db->update('teams', $team_info);
		}

		/**
		 * Queries database to get the three favorite team fields allowed for a user account. 
		 * 
		 * @access 		public
		 * @return 		array
		 */
		public function get_favorite_teams() {
			$this->db->select('favoriteTeam1, favoriteTeam2, favoriteTeam3');
			$this->db->where('email', $this->session->userdata('email')); 
			$query = $this->db->get('favoriteTeams');

			$row = $query->row();
			$fav_teams = array(
				'fav_team1' => $row->favoriteTeam1,
				'fav_team2' => $row->favoriteTeam2,
				'fav_team3' => $row->favoriteTeam3,
			);

			return $fav_teams;			
		}

		/**
		 * Inserts user selected team into the user's list of favorite teams if fields are available.
		 *
		 * @access 		public
		 * @param 		String
		 */
		public function insert_favorite_team($favTeamField) {
			$data[$favTeamField] = $this->session->userdata('team');
			$this->db->where('email', $this->session->userdata('email')); 
			$this->db->update('favoriteTeams', $data);
		}

		/**
		 * Searches for teams that fit the criteria inserted by the user in the six input search fields.
		 * Binding allows values to be automatically escaped, producing safer queries. 
		 *
		 * @access 		public
		 * @param 		array
		 * @return 		array
		 */
		public function filter_teams($search_input) {
			$attack_min = $search_input['attack_min'];
			$attack_max = $search_input['attack_max'];
			$midfield_min = $search_input['midfield_min'];
			$midfield_max = $search_input['midfield_max'];
			$defense_min = $search_input['defense_min'];
			$defense_max = $search_input['defense_max'];
			$teams_fit_criteria = array();

			$sql = "SELECT * FROM teams WHERE ((attack BETWEEN ? AND ?) AND 
						(midfield BETWEEN ? AND ?) AND (defense BETWEEN ? AND ?))";
			$bind_values = array($attack_min, $attack_max, $midfield_min, $midfield_max, $defense_min, $defense_max);
			$query = $this->db->query($sql, $bind_values);

			if($query->num_rows() > 0) {
				$i=0;
				foreach($query->result() as $row) {
					$teams_fit_criteria[$i] = array(
						'name' => $row->team,
						'attack' => $row->attack,
						'midfield' => $row->midfield,
						'defense' => $row->defense
					);
					$i++;
				}
				return $teams_fit_criteria;
			}
		}

		/**
		 * Given a particular team, queries database for teams that are +/- 2 from its ratings.
		 *
		 * @access 		public
		 * @param 		array
		 * @return 		array
		 */
		public function search_similar_teams($selected_team_ratings) {
			$attack = $selected_team_ratings['attack'];
			$midfield = $selected_team_ratings['midfield'];
			$defense = $selected_team_ratings['defense'];
			$teams_rated_similar = array();
			$get_league = $this->db->query("SELECT league FROM teams WHERE team = '" . $this->session->userdata('team') . "'");
			$get_country = $this->db->query("SELECT country FROM leagues WHERE league = (SELECT league FROM teams WHERE team = '" . $this->session->userdata('team') . "')");

			$this->db->select('*');
			$this->db->from('teams');
			$this->db->join('leagues', 'leagues.league = teams.league');
			$this->db->where('teams.league', $get_league->row()->league);
			$this->db->where('attack <', $attack + 10);
			$this->db->where('attack >', $attack - 10);
			$this->db->where('midfield <', $midfield + 10);
			$this->db->where('midfield >', $midfield - 10);
			$this->db->where('defense <', $defense + 10);
			$this->db->where('defense >', $defense - 10);
			$query = $this->db->get();

			if($query->num_rows() < 10) {
				$prev_query = $this->db->last_query();
				$query1 = " OR ((country = ";
				$query2 = "(SELECT country FROM leagues WHERE league = (SELECT league FROM teams WHERE team = '" . $this->session->userdata('team') . "')))";
				$query3 = "AND ((attack BETWEEN (? - 5) AND (? + 5)) AND 
						(midfield BETWEEN (? - 5) AND (? + 5)) AND (defense BETWEEN (? - 5) AND (? + 5)))) ORDER BY teams.league";
				$bind_values = array($attack, $attack, $midfield, $midfield, $defense, $defense);
				$query = $prev_query . $query1 . $query2 . $query3;
				$query = $this->db->query($query, $bind_values);
			}

			if($query->num_rows() > 0) {
				$i=0;
				foreach($query->result() as $row) {
					$teams_rated_similar[$i] = array(
						'league' => $row->league,
						'name' => $row->team,
						'attack' => $row->attack,
						'midfield' => $row->midfield,
						'defense' => $row->defense
					);
					$i++;
				}
				return $teams_rated_similar;
			}
		}
	}

/* End of file model_teams.php */