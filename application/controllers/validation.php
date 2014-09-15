<?php class Validation extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('newperformanceview');
	}

	public function validateDetails()
	{
		$discipline = $this->input->post('discipline');
		$disciplineInput = $this->input->post('disciplineinput');
		$unitOfMeasure = '';
		$hrs = $this->input->post('hrs');
		$mins = $this->input->post('mins');
		$secs = $this->input->post('secs');
		$eventName = $this->input->post('eventname');
		$eventLocation = $this->input->post('eventlocation');
		$eventDay = intval($this->input->post('day'));
		$eventMonth = intval($this->input->post('month'));
		$eventYear = intval($this->input->post('year'));

		//Value of $unitOfMeasure depends on value of $discipline
		switch($discipline)
		{
			case "Road":
			case "XC":
				$unitOfMeasure = $this->input->post('unitofmeasure');
				break;
			//Do nothing otherwise.
			case "Track":
			default:
				break;
		}

		//See comments above methods to check their functionality.
		validateDates($eventDay, $eventMonth, $eventYear);
		validateTextLengths();
		validateTextInputs();
	}


}