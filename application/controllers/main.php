<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Main extends CI_Controller {
		
		public function index() {
			$this->home();
		}
	
		public function home() {
			$this->load->model('model_teams'); 
			$data = $this->model_teams->get_team_countries();

			$this->load->view('header', $data);	
			$this->load->view('welcome');
			$this->load->view('footer');		
		}

		public function account() {
			if($this->session->userdata('is_logged_in')) {
				$this->load->model('model_teams'); 
				$data = $this->model_teams->get_team_countries();
				$fav_teams = $this->model_teams->get_favorite_teams();

				$this->load->view('header', $data);	
				$this->load->view('account', $fav_teams);
				$this->load->view('footer');
			}
			else {
				redirect('main/restricted');
			}
		}

		public function restricted() {
			$this->load->model('model_teams'); 
			$data = $this->model_teams->get_team_countries();
			
			$this->load->view('header', $data);	
			$this->load->view('restricted');
			$this->load->view('footer');
		}

		public function login() {
			$this->load->model('model_teams'); 
			$data = $this->model_teams->get_team_countries();

			$this->load->view('header', $data);
			$this->load->view('login');
			$this->load->view('footer');
		}

		public function signup() {
			$this->load->model('model_teams'); 
			$data = $this->model_teams->get_team_countries();

			$this->load->view('header', $data);
			$this->load->view('signup');
			$this->load->view('footer');
		}

		public function finder() {
			$this->load->model('model_teams'); 
			$data = $this->model_teams->get_team_countries();

			$selected_team_ratings = $this->model_teams->get_team_ratings();
			$similar_teams = $this->model_teams->search_similar_teams($selected_team_ratings);

			$this->load->view('header', $data);
			$this->load->view('finder', array('similar_teams' => $similar_teams));
			$this->load->view('footer');
		}

		public function teams() {
			if($this->session->userdata('is_logged_in')) {
				$this->load->model('model_teams'); 
				$data = $this->model_teams->get_team_countries();
				$teamRatings = $this->model_teams->get_team_ratings();

				$this->load->view('header', $data);
				$this->load->view('teams', $teamRatings);
				$this->load->view('footer');
			}
			else {
				redirect('main/restricted');
			}
		}

		public function result() {
			$this->load->model('model_teams'); 
			$data = $this->model_teams->get_team_countries();
			
			$this->load->view('header', $data);	
			$this->load->view('score');
			$this->load->view('footer');
		}

		public function find_match() {
			if($this->session->userdata('is_logged_in')) {
				$this->load->model('model_teams'); 
				$data = $this->model_teams->get_team_countries();
				$favTeams = $this->model_teams->get_favorite_teams();

				if(!$this->input->post('attack_min') AND !$this->input->post('attack_max') AND !$this->input->post('midfield_min')
					AND !$this->input->post('midfield_max') AND !$this->input->post('defense_min') AND !$this->input->post('defense_max')) {
					$teams = FALSE;
				}
				else {
					$search_ratings = array(
						'attack_min' => $this->input->post('attack_min'),
						'attack_max' => $this->input->post('attack_max'),
						'midfield_min' => $this->input->post('midfield_min'),
						'midfield_max' => $this->input->post('midfield_max'),
						'defense_min' => $this->input->post('defense_min'),
						'defense_max' => $this->input->post('defense_max')
					);

					if(empty($search_ratings['attack_max'])) {
						$search_ratings['attack_max'] = 100;
					}
					if(empty($search_ratings['midfield_max'])) {
						$search_ratings['midfield_max'] = 100;
					}
					if(empty($search_ratings['defense_max'])) {
						$search_ratings['defense_max'] = 100;
					}

					$teams = $this->model_teams->filter_teams($search_ratings);
				}

				$teamData = array(
					'favTeams' => $favTeams,
					'teams_filtered' => $teams
				);
				
				$this->load->view('header', $data);	
				$this->load->view('match', $teamData);
				$this->load->view('footer');
			}
			else {
				redirect('main/restricted');
			}
		}

		public function selected_team($team_name) {
			$team_name = str_replace('_', ' ', $team_name);
			$team_name = str_replace('~', "'", $team_name);
			$teamData['team'] = $team_name;
			$this->session->set_userdata($teamData);
			redirect('main/teams');
		}

		public function find_similar_team($team_name) {
			$team_name = str_replace("_", " ", $team_name);
			$team_name = str_replace('~', "'", $team_name);
			$teamData['team'] = $team_name;
			$this->session->set_userdata($teamData);
			redirect('main/finder');
		}

		

		public function match_result($team_name) {
			$team_name = str_replace("_", " ", $team_name);
			$team_name = str_replace('~', "'", $team_name);
			$teamData['opponent'] = $team_name;
			$this->session->set_userdata($teamData);
			redirect('main/result');
		}

		public function save_match_record() {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('opponent_email', 'Opponent_Email', 'required|trim|xss_clean|valid_email|callback_validate_email');
			$this->form_validation->set_rules('user_score', 'User_Score', 'required|trim|xss_clean|numeric');
			$this->form_validation->set_rules('opponent_score', 'Opponent_Score', 'required|trim|xss_clean|numeric');

			if($this->form_validation->run()) {
				$data = array(
					'opponent_email' => $this->input->post('opponent_email'),
					'user_score' => $this->input->post('user_score'),
					'opponent_score' => $this->input->post('opponent_score')
				);
				$this->session->set_userdata($data);

				$user_email = $this->session->userdata('email');
				$opponent_email = $this->session->userdata('opponent_email');
				$team = $this->session->userdata('team');
				$opponent = $this->session->userdata('opponent');
				$user_score = $this->session->userdata('user_score');
				$opponent_score = $this->session->userdata('opponent_score');

				$this->load->model('model_matches');
				$this->model_matches->save_match_entry($user_email, $opponent_email, $team, $opponent, $user_score, $opponent_score);
				$this->model_matches->save_match_entry($opponent_email, $user_email, $opponent, $team, $opponent_score, $user_score);
				redirect('main/post');
			}
			else {
				redirect('main/result');
			}
		}

		public function post() {
			$this->load->model('model_teams'); 
			$data = $this->model_teams->get_team_countries();

			$match_results = array(
				'user_email' => $this->session->userdata('email'),
				'opponent_email' => $this->session->userdata('opponent_email'),
				'team' => $this->session->userdata('team'),
				'opponent' => $this->session->userdata('opponent'),
				'user_score' => $this->session->userdata('user_score'),
				'opponent_score' => $this->session->userdata('opponent_score')
			);

			$this->load->view('header', $data);	
			$this->load->view('post', $match_results);
			$this->load->view('footer');	
		}

		public function history() {
			if($this->session->userdata('is_logged_in')) {
				$this->load->model('model_teams');
				$this->load->model('model_matches');
				$data = $this->model_teams->get_team_countries();
				$match_records = $this->model_matches->list_previous_matches();
				
				$this->load->view('header', $data);	
				$this->load->view('history', array('match_records' => $match_records));
				$this->load->view('footer');
			}
			else {
				redirect('main/restricted');
			}
		}

		public function team_ratings() {
			$data = array(
				'attack' => $this->input->post('edit_attack'),
				'midfield' => $this->input->post('edit_midfield'),
				'defense' => $this->input->post('edit_defense')
			);

			$this->load->model('model_teams');
			$this->model_teams->update_team_ratings($data);

			redirect('main/teams');
		}

		public function add_fav_team() {
			$this->load->model('model_teams');
			$favTeamFields  = $this->model_teams->get_favorite_teams();

			if($favTeamFields['favTeam1'] == '') {
				$this->model_teams->insert_favorite_team('favoriteTeam1');
			}
			else if($favTeamFields['favTeam2'] == '') {
				$this->model_teams->insert_favorite_team('favoriteTeam2');
			}
			else if($favTeamFields['favTeam3'] == '') {
				$this->model_teams->insert_favorite_team('favoriteTeam3');
			}

			redirect('main/account');
		}

		public function delete_account() {
			$this->load->model('model_users');
			$query = $this->model_users->delete_user();
			$this->session->sess_destroy();
			redirect('main/home');
		}

		public function login_validation() {
			$this->load->library('form_validation');

			$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_credentials');
			$this->form_validation->set_rules('password', 'Password', 'required|md5|trim|min_length[8]');
			
			if($this->form_validation->run()) {
				$data = array(
					'email' => $this->input->post('email'),
					'is_logged_in' => '1'
				);
				$this->session->set_userdata($data);
				redirect('main/home');
			} 
			else {
				redirect('main/login');
			}
		}

		public function signup_validation() {
			$this->load->library('form_validation');

			$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('password', 'Password', 'required|trim');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
			
			$this->form_validation->set_message('is_unique', 'That email address already exists.');

			if($this->form_validation->run()) {
				$key = md5(uniqid());

				$this->load->library('email', array('mailtype' => 'html'));
				$this->load->model('model_users');

				$this->email->from('me@matchfinder.com', "Admin");
				$this->email->to($this->input->post('email'));
				$this->email->subject('Confirm your account');

				$message = "<p>Thank you for signing up!</p>";
				$message .= "<p><a href='" . base_url() . "main/register_user/$key'>Click here</a> to confirm your account</p>";
				
				$this->email->message($message);

				// send and email to the user
				if ($this->model_users->add_temp_user($key)) {
					if ($this->email->send()) {
						redirect('main/signup');
					}
					else {
						echo "Could not send the email.";
					}
				}
				else {
					echo "Problem adding to database";
				}
			}
			else {
				redirect('main/signup');
			}
		}

		/* Validation has been completed and didn't return an error */
		public function validate_credentials() {
			$this->load->model('model_users');

			if($this->model_users->can_log_in()) {
				return true;
			}
			else {
				$this->form_validation->set_message('validate_credentials', 'Incorrect username/password.');
			}

			return false;
		}

		public function validate_email($email) {
			$this->load->model('model_users');

			if($this->model_users->is_valid_email($email)) {
				return true;
			}

			return false;
		}

		public function logout() {
			$this->session->sess_destroy();
			redirect('main/home');
		}

		public function register_user($key) {
			$this->load->model('model_users');

			if($this->model_users->is_key_valid($key)) {
				if($newEmail = $this->model_users->add_user($key)) {
					
					$data = array(
						'email' => $newEmail,
						'is_logged_in' => 1
					);

					$this->session->set_userdata($data);
					redirect('main/home');
				}
				else {
					echo "failed to add user, please try again";
				}
			}
			else {
				echo 'invalid key';
			}
		}

		public function change_password() {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('password', 'Password', 'required|md5|trim');
			
			$data = array(
				'password' => md5($this->input->post('password'))
			);
			if($this->form_validation->run()) {
				$this->db->where('email', $this->session->userdata('email'));
				$this->db->update('users', $data);
				redirect('main/account');
			}
			else {
				redirect('main/account');
			}
		}
	}

/* End of file main.php */