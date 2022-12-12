function Voterssearch(pForm) {

	const method = pForm.method;
	const key = pForm.searchtxt.value;
	const url = pForm.action + "?searchtxt=" + key;
	let xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		// document.getElementsByTagName("tbody").innerHTML = this.responseText;
		var table_rows = "";
		var response = this.responseText;
		if(response != null && response != "" && response != "[]")
		{
			var vagents = JSON.parse(response);
			for(i=0; i < vagents.length; i++)
			{
				var row = vagents[i];
				var id = row['VoterID'];
				var fname = row['FirstName'];
				var lname = row['LastName'];
				var gender = row['Gender'];
				var email = row['Email'];
				var address = row['Address'];
				var status = row['Status'];
				table_rows += '<tr>';
		      	table_rows += '<td>' + fname + '</td>';
			    table_rows += '<td>' + lname + '</td>';
			    table_rows += '<td>' + address + '</td>';
			    table_rows += '<td>' + gender + '</td>';
			    table_rows += '<td>' + email + '</td>';
			    table_rows += '<td>';
			           
			          if(status == 1){
			            table_rows +='<form  method="post" action="../View/VoterEdit.php">';

			            table_rows +='<input type="hidden" name="VoterID" value="' + id + '">';
			            table_rows +='<input type="submit" value="Edit">';
			            table_rows +='</form>';
			          }       
		      	table_rows += '</td>';
				table_rows += '</tr>';
			}
		}
		else 
		{
			table_rows = 'No Voter(s) found';
		}

		document.getElementById("V_tbody").innerHTML = table_rows;
	}
	xhttp.open(method, url);
	xhttp.send();

	return false;

}