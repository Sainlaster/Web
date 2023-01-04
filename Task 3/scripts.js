const table = document.createElement("table");
let line=0;
function createtable(){
if(document.getElementById('table')!=null){
	alert("Table exist!");
}
else{
	table.innerHTML="<table><tr>"+
	"<th>" +line+"</th><td>check</td>" +
	"</tr>"
	"</table>"
	document.body.append(table);
	table.setAttribute('id','table');
	line++;
	document.getElementById("add").disabled=false;
	document.getElementById("delete").disabled=false;
}
}
function addt(){
	let tbr = table.insertRow();
	tbr.insertCell().append(line);
	tbr.insertCell().append("check");
	line++;
}
function deletet(){
if (document.getElementById('n').value=="") {
	alert("Enter column number");
    }
    num = document.getElementById('n').value;
    try {
        table.deleteRow(num);
    }
    catch (DOMexcepion){
        alert("Column doesnt exist")
    }

}
