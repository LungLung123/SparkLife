<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('user_page');
	}
	public function getResult()
	{
    if($this->input->method() === 'post')
    {
	$data = [];
	$data['age'] = '-';
	$data['gender'] = '-';
	$data['area'] = '-';
	$data['lat'] = '-35.275373';
	$data['lng'] = '149.130814';//default CBR

	if(sizeof($_POST) == 5){//all data filled
	$data['lat'] = $this->input->post('lat');
	$data['lng'] = $this->input->post('lng');
        $area        = $this->input->post('area');
        $gender   = $this->input->post('gender');
        $age      = $this->input->post('age');
       	 if($age==0){//3-5 yo
	  $data['age'] = '3-5 years old';
	  $data['recommendation'] = array('at least 180 minutes a day in a variety of physical activities, of which 60 minutes is energetic play such as running, jumping and kicking and throwing, spread throughout the day - noting more is better');
	}
	else if($age==1){//6-12
	  $data['age'] = '6-12 years old';
	  $data['recommendation'] = array('For health benefits, children aged 6–12 years should accumulate at least 60 minutes of moderate to vigorous intensity physical activity every day.','Children’s physical activity should include a variety of aerobic activities, including some vigorous intensity activity.','On at least three days per week, children should engage in activities that strengthen muscle and bone.', 'To achieve additional health benefits, children should engage in more activity – up to several hours per day.');
	}
	else if($age==2){//13-17
	  $data['age'] = '13-17 years old';
	  $data['recommendation'] = array('For health benefits, young people aged 13–17 years should accumulate at least 60 minutes of moderate to vigorous intensity physical activity every day.','Young peoples’ physical activity should include a variety of aerobic activities, including some vigorous intensity activity.','On at least three days per week, young people should engage in activities that strengthen muscle and bone.', 'To achieve additional health benefits, young people should engage in more activity – up to several hours per day.');


	}
	else if($age==3){//18-30
	  $data['recommendation'] = array('For health benefits, young people aged 18-30 years should accumulate at least 40 minutes of moderate to vigorous intensity physical activity every day.','Adult peoples’ physical activity should include a variety of aerobic activities, including some vigorous intensity activity.','On at least three days per week, young people should engage in activities that strengthen muscle and bone.', 'To achieve additional health benefits, young people should engage in more activity – up to several hours per day.');
	}
	else if($age==4){//31-50
	  $data['age'] = '31-50 years old';
	  $data['recommendation'] = array('Doing any physical activity is better than doing none. If you currently do no physical activity, start by doing some, and gradually build up to the recommended amount.', 'Be active on most, preferably all, days every week.','Accumulate 150 to 300 minutes (2 ½ to 5 hours) of moderate intensity physical activity or 75 to 150 minutes (1 ¼ to 2 ½ hours) of vigorous intensity physical activity, or an equivalent combination of both moderate and vigorous activities, each week.', 'Do muscle strengthening activities on at least 2 days each week.');
	}
	else if($age==4){//51-65
	  $data['age'] = '51-65 years old';
	  $data['recommendation'] = array('Doing any physical activity is better than doing none but have to be careful injury especially about backache related to Spinal cord. If you currently do no physical activity, start by doing some, and gradually build up to the recommended amount.', 'Be active on most, preferably all, days every week.','Accumulate 150 to 300 minutes (2 ½ to 5 hours) of mild intensity physical activity or 75 to 150 minutes (1 ¼ to 2 ½ hours) of vigorous intensity physical activity, or an equivalent combination of both moderate and vigorous activities, each week.', 'Do muscle strengthening activities on at least 2 days each week.');
	}
	else{//65++
	$data['age'] = 'more than 65 years old';
	$data['recommendation'] = array('Being physically active for 30 minutes every day is achievable and even a slight increase in activity can make a difference to your health and wellbeing.');
	
}
	if($gender==0){
	$data['gender'] = 'Male';
	}
	else if($gender==1){
	$data['gender'] = 'Female';
	}
	else
	$data['gender'] = 'Other';

	if(!empty($area))
	$data['area'] = $area;
		$this->load->view('result_page', $data);
	}
	else{

	}
	}
	else{
		echo "Don't do this!"; 
	}
}
public function profile($user){
	$data['user'] = $user;
	$data['age'] = '13-17 years old';
	  $data['recommendation'] = array('For health benefits, young people aged 13–17 years should accumulate at least 60 minutes of moderate to vigorous intensity physical activity every day.','Young peoples’ physical activity should include a variety of aerobic activities, including some vigorous intensity activity.','On at least three days per week, young people should engage in activities that strengthen muscle and bone.', 'To achieve additional health benefits, young people should engage in more activity – up to several hours per day.');
	$data['gender'] = 'Male';
	$data['area'] = 'Belconnen';
	$data['lat'] = '-35.240509';
	$data['lng'] = '149.065874';//default CBR
		$this->load->view('profile_page', $data);
	
}
}
