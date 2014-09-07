$(function()
{
	var discipline = $('#discipline');
	var distanceLabel = $('#distancelabel');
	var distanceInput = $('#distanceinput');
	var newElement;
	
	//Change label and form elements when discipline drop-down value changes.
	discipline.on('change', function()
	{
		switch(discipline.val())
		{
			case "Track":
				distanceLabel.text("Distance (metres)");
				newElement = $("<input/>",
				{
					type: "text",
					id: "disciplineinput"
				});
				distanceInput.append(newElement);
				break;	
		}
	});
});