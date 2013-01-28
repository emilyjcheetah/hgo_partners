function setlocale(vv)
{

	$.get("/HGO/public/Setlang?lang="+vv , function (data)
			
	{
	alert(data);	
	//window.location.replace('http://localhost/umar_test/emily_project/ProjectFunding/public/index');
	//$("#continer").load('http://localhost/umar_test/emily_project/ProjectFunding/public/UserRegistration/list');
	location.reload(true);
	}
	);
	
	
	
	alert(vv);

}