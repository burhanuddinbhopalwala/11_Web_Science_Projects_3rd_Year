function check123()
	{
		var x=document.Edit_form.phno.value;
			if(x.length!=10)
			{
			alert("Phone Number not valid");
			return false;
			}
			
			else
			{
			return true;
			}		
	}
