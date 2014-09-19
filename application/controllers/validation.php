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
		$distanceInput = $this->input->post('distanceinput');
		$unitOfMeasure = '';
		$hrs = $this->input->post('hrs');
		$mins = $this->input->post('mins');
		$secs = $this->input->post('secs');
		$eventName = $this->input->post('eventname');
		$eventLocation = $this->input->post('eventlocation');
		$eventDay = intval($this->input->post('day'));
		$eventMonth = intval($this->input->post('month'));
		$eventYear = intval($this->input->post('year'));
		$message = array('dateerror'=> '', 'textlengtherror' => '', 'textinputerror' => '');

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

		//See comments inside methods to check their functionality.
		$message['dateerror'] = $this->validateDate($eventDay, $eventMonth, $eventYear);
		$message['textlengtherror'] = $this->validateTextLengths($distanceInput, $hrs, $eventName, $eventLocation);
		//validateTextInputs();

		$this->load->view('newperformanceview', $message);
	}

	public function validateDate($eventDay, $eventMonth, $eventYear)
	{
		$todaysDate = date("Y-n-j");
		$enteredDate = "$eventYear-$eventMonth-$eventDay";

		//Check that the entered date is not in the future.
		if(strtotime($enteredDate) > strtotime($todaysDate))
		{
			return "Entered date ($enteredDate) must not be in the future";
		}

		switch($eventMonth)
		{
			case 2:
				//Check if year is a leap year then act accordingly.
				if(($this->isLeapYear($eventYear)) && ($eventDay > 29))
				{
					return "Date is invalid (29 days for February in leap year)";
				}

				else if(!($this->isLeapYear($eventYear)) && ($eventDay > 28))
				{
					return "Date is invalid ($eventYear is not a leap year)";	
				}
				break;
			case 1:
			case 3:
			case 5:
			case 7:
			case 8:
			case 10:
			case 12:
				//Months with 31 days. Do nothing as drop down only goes up to 31.
				break;
			case 4:
			case 6:
			case 9:
			case 11:
				//Months with 30 days
				if($eventDay > 30)
				{
					return "Date is invalid (This month only has 30 days)";
				}
				break;
			default:
				break;			
		}

		return "$enteredDate is OK";
	}


	public function validateTextLengths($distanceInput, $hrs, $eventName, $eventLocation)
	{
		if((strlen($distanceInput) < 2) || (strlen($distanceInput) > 5))
		{
			return "Distance input must be between 2 and 5 characters";
		}

		if((strlen($hrs) < 1) || (strlen($hrs) > 2))
		{
			return "hours input must be 1 or 2 characters";
		}		

		if((strlen($eventName) < 3) || (strlen($eventName) > 40) 
			|| (strlen($eventLocation) < 3) || (strlen($eventLocation) > 40))
		{
			return "Event name and location must be between 3 and 40 characters";
		}		
	}

	//Given a year, checks if it is a leap year.
	public function isLeapYear($year)
	{
		/*Year is a leap year if:
		  1. Year is divisble by 4 but not 100 or 400.
		  2. Year is divisible by 4, 100 and 400.*/
		if((($year % 4 == 0) && ($year % 100 == 0) && ($year % 400 == 0)) 
			|| (($year % 4 == 0) && ($year % 100 != 0) && ($year % 400 != 0)))
		{
			return true;
		}
		else
		{
			return false;
		}		
	}	
}