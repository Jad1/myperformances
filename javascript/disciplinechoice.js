$(function()
{
	var discipline = $('#discipline');
	var distanceLabel = $('#distancelabel');
	var distanceInput = $('#distanceinput');
	var newInput;
	var newOptionValue;
	var nonBreakingSpace = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	
	//Change label and form elements when discipline drop down value changes.
	discipline.on('change', function()
	{
		//Always empty cells when the drop down value changes first.
		distanceLabel.empty();
		distanceInput.empty();

		switch(discipline.val())
		{
			case "Track":
				distanceLabel.text("Distance (metres)");
				newInput = $("<input/>",
				{
					type: "text",
					id: "distanceinput",
					value: "tracktest"
				});
				distanceInput.append(newInput);
				break;	
			case "Road":
			case "XC":
				distanceLabel.text("Distance");
				newInput = $("<input/>",
				{
					type: "text",
					id: "distanceinput",
					value: "roadtest"
				});
				distanceInput.append(newInput);
				distanceInput.append(nonBreakingSpace);
				
				newDropDown = $("<select/>",
				{
					id: "unitofmeasure",
				});

				distanceInput.append(newDropDown);

				newOptionValue = $("<option />",
				{
					value: "K",
					text: "Kilometres"
				});

				newDropDown.append(newOptionValue);

				newOptionValue = $("<option />",
				{
					value: "M",
					text: "Miles"
				});

				newDropDown.append(newOptionValue);	
				break;	
			default:
				break;			
		}
	});
});