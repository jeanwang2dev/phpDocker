"use strict";

var crud = {}

crud.init = function(){
	if(document.getElementById('addName')){
		document.getElementById('addName').addEventListener('click', crud.addName, false);
	}
	if(document.getElementById('updateDeleteList')){
		document.getElementById('updateDeleteList').addEventListener('click',crud.updateDeleteList, false);
	}
}

crud.addName = function(){
	var inputs, i, data = {}, res, name = '';
	inputs = document.querySelectorAll('input[type="text"]');
	i = 0;
	data.flag = 'addName';
	while(i < inputs.length){
		name = inputs[i].name;
		if(name == 'state'){
			data[name] = inputs[i].value.toUpperCase();
		}
		else{
			data[name] = inputs[i].value.charAt(0).toUpperCase() + inputs[i].value.slice(1);;
		}
		
		i++;
	}
	data = JSON.stringify(data);
	crud.sendRequest(data);
}

crud.updateDeleteList = function(e){
	var id, data = {}, i, node;
	if(e.target.value == 'Delete'){
		data.id = e.target.id.substr(1);
		data.flag = 'delete';
		data = JSON.stringify(data);

		/*I ADDED THE EXTRA DELETE STRING HERE BECAUSE I HAVE A COMMONE SEND REQUEST FUNCTION AND I WANTED TO DO SOMETHING DIFFERENT WITH THE DELETE */
		crud.sendRequest(data, 'delete');

	}
	else if(e.target.value == 'Update'){
		data.id = e.target.id.substr(1);
		data.flag = 'update';
		node = e.target.parentNode.previousElementSibling;
		i = 0;
		while(i < 5){
			data[node.firstElementChild.name] = node.firstElementChild.value;
			node = node.previousElementSibling;
			i++;
		}
		data = JSON.stringify(data);						
		crud.sendRequest(data);
	}
}

crud.sendRequest = function(data, specificAction){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			
			/*IF THE DELETE BUTTON RETURNS SUCCESSFUL THE PAGE IS RELOADED THE AND TABLE WILL UPDATE. THIS IS A CLUNKY WAY OF UPDATING THE PAGE AS I COULD HAVE SENT ANOTHER AJAX REQUEST TO HAVE DONE THAT OR DELETED THE TABLE ROW WITH JAVASCRIPT.*/
			if(specificAction == 'delete'){
				window.location.reload();
				//console.log(this.responseText); 
			}
			else{
				document.getElementById('result').innerHTML = this.responseText;
			}
			
		}
	};
	xhttp.open("POST", "../xhr/switch.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("data=" + data);
}

crud.init();
