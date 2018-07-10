function addNewContact()
{
	var contact = {
		"name": $("#name").val(),
		"number": $("#number").val(),
		"type": $("#type").val(),
		"address": $("#address").val()
	};
	var url = "ajax.php?action=new"
	$.post(url, contact, function(result){
		alert(result);
		//addContactToTable(contact);
		loadContacts();
	});
}

function deleteContact(id){
	if(confirm('Rusel Doe?')) {
		var url = "ajax.php?action=delete&id=" + id;
		$.get(url, function(result){
			loadContacts();
		});
	}
}

function addContactToTable(contact){
	$("#contactList").append(
		'<tr data-id="' + contact.userid + '">' +
			'<td>' +
				'<button class="btn" type="button" onclick="deleteContact(' + contact.userid + ')"><i class="glyphicon glyphicon-trash"></i></button> ' +
				'<button class="btn edit" type="button" onclick="editContact(' + contact.userid + ',this)"><i class="glyphicon glyphicon-pencil"></i></button> ' +
				'<button class="btn hidden cancel" type="button" onclick="cancelEdit(' + contact.userid + ',this)"><i class="glyphicon glyphicon-floppy-remove"></i></button> ' +
			'</td>' +
			'<td class="id">' + contact.userid  + '</td>' +
			'<td class="fname">' + contact.userfname  + '</td>' +
			'<td class="mname">' + contact.usermname + '</td>' +
			'<td class="lname">' + contact.userlname + '</td>' +
			'<td class="dept">' + contact.userdept + '</td>' +	
			'<td class="position">' + contact.userposition + '</td>' +	
			"<td class='signature'>" + "<img src="+contact.usersignature+" "+"style='width:70px;height:70px;'"+">"+"</td>"+
			'<td class="uname">' + contact.username + '</td>' +
			'<td class="pword">' + contact.userpassword + '</td>' +
		'</tr>');	
	$('tr[data-id=' + contact.userid +']')[0].contact = contact;
}

function editContact(userid, button){
	var $button = $(button);
					//<button>	<td>     <tr>
	var $tr = $(button.parentNode.parentNode);
	var contact = $tr[0].contact;
	if($button.attr('mode') != 'edit')
	{
		//show the cancel edit button
		$tr.find('button.cancel').removeClass('hidden');

		var txtfname = '<input style="width:100" type="text" class="txtfname" value="' + contact.userfname + '" />';
		$tr.find('td.fname').html(txtfname).find('input').focus();
		
		var txtmname = '<input style="width:100" type="text" class="txtmname" value="' + contact.usermname + '" />';
		$tr.find('td.mname').html(txtmname);

		var txtlname = '<input style="width:100" type="text" class="txtlname" value="' + contact.userlname + '" />';
		$tr.find('td.lname').html(txtlname);

		var cboType = 
			' <select class="cboType">' + 
				'<option>'+contact.userdept+'</option>'
				+window.department1+
			'</select>';
		$tr.find('td.dept').html(cboType);

		var cboPosition = 
			' <select class="cboPosition">' + 
				'<option>'+contact.userposition+'</option>'
				+window.position1+
			'</select>';
		$tr.find('td.position').html(cboPosition);
		
		var txtsignature = '<input style="width:120" type="text" class="txtsignature" value="' + contact.usersignature + '" />';
		$tr.find('td.signature').html(txtsignature);

		var txtuname = '<input style="width:100" type="text" class="txtuname" value="' + contact.username + '" />';
		$tr.find('td.uname').html(txtuname);

		var txtpword = '<input style="width:100" type="text" class="txtpword" value="' + contact.userpassword + '" />';
		$tr.find('td.pword').html(txtpword);
		
		$button.attr('mode','edit').html('<i class="glyphicon glyphicon-floppy-disk"></i>');
	}
	else
	{
		//hide the cancel edit button
		$tr.find('button.cancel').addClass('hidden');
		
		$button.attr('mode','save').html('<i class="glyphicon glyphicon-pencil"></i>');	
		//get the update value from the edit controls
		var userupdated = {
			"userid" : userid,
			"userfname": $tr.find('input.txtfname').val(),
			"usermname": $tr.find('input.txtmname').val(),
			"userlname": $tr.find('input.txtlname').val(),
			"userdept": $tr.find('select.cboType').val(),
			"userposition": $tr.find('select.cboPosition').val(),
			"usersignature": $tr.find("input.txtsignature").val(),
			"username": $tr.find('input.txtuname').val(),
			"userpassword": $tr.find('input.txtpword').val()					
		};
		//reflect the changes to the td as read-only values
		$tr.find('td.fname').text(userupdated.userfname);
		$tr.find('td.mname').text(userupdated.usermname);
		$tr.find('td.lname').text(userupdated.userlname);
		$tr.find('td.dept').text(userupdated.userdept);
		$tr.find('td.position').text(userupdated.userposition);
		$tr.find('td.signature').text(userupdated.usersignature);
		$tr.find('td.uname').text(userupdated.username);
		$tr.find('td.pword').text(userupdated.userpassword);
		$tr[0].contact = userupdated;
		
		console.log(userupdated);
		var url = "ajax.php?action=update";
		$.post(url, userupdated, function(result){
			//show message
			console.log(result);
		});
	}
}

function cancelEdit(id, button)
{
	var $button = $(button);
	var $tr = $(button.parentNode.parentNode);
	var contact = $tr[0].contact;
	$tr.find('td.fname').text(contact.userfname);
	$tr.find('td.mname').text(contact.usermname);
	$tr.find('td.lname').text(contact.userlname);
	$tr.find('td.dept').text(contact.userdept);
	$tr.find('td.position').text(contact.userposition);
	$tr.find('td.signature').text(contact.usersignature);
	$tr.find('td.uname').text(contact.username);
	$tr.find('td.pword').text(contact.userpassword);
	//hide the cancel edit button
	$tr.find('button.cancel').addClass('hidden');	
	$tr.find('button.edit').attr('mode','save').html('<i class="glyphicon glyphicon-pencil"></i>');
	console.log($tr[0].contact);
}

function loadContacts()
{
	var url = "ajax.php?action=list";
	$.getJSON(url, function(result){
		$("#contactList").empty();
		for(var i=0;i<result.length;i++){
			var c = result[i];
			addContactToTable(c);
		}
	});
}

function department()
{	
	var url = "ajax.php?action=department";
	$.getJSON(url, function(result){
		$("#deptlist").empty();
		for(var j=0;j<=result.length;j++)
		{
			var d = result[j];
			addDepartmentTable(d);
			console.log(d);
		}
	});
}

function addNewDepartment()
{
	var department = {
		"deptsec": $("#deptsection").val(),
		"deptdiv": $("#deptdivision").val()
	};
	console.log(department);
	var url = "ajax.php?action=addDepartment"
	$.post(url, department, function(result){
		alert(result);
	    url = "ajax.php?action=department";
	    $.getJSON(url, function(result){
		$("#deptlist").empty();
		for(var j=0;j<=result.length;j++)
		{
			var d = result[j];
			addDepartmentTable(d);
			console.log(d);
		}
	});
	});
}

function addDepartmentTable(department){
	$("#deptlist").append(
		'<tr data-id="' + department.deptid + '">' +
			'<td>' +
				'<button class="btn" type="button" onclick="deleteDepartment(' + department.deptid + ')"><i class="glyphicon glyphicon-trash"></i></button> ' +
			'</td>' +
			'<td class="sections">' + department.section  + '</td>' +
			'<td class="divisions">' + department.division  + '</td>' +
			'<td class="stat">' + department.deptstat + '</td>' +
		'</tr>');	
	$('tr[data-id=' + department.deptid +']')[0].department = department;
}

function deleteDepartment(id){
	if(confirm('are you sure to delete department?')) {
		var url = "ajax.php?action=deleteDepartment&id=" + id;
		$.get(url, function(result){
		   alert(result);
		   url = "ajax.php?action=department";
	       $.getJSON(url, function(result){
		     $("#deptlist").empty();
		     for(var j=0;j<=result.length;j++)
		     {
			    var d = result[j];
			    addDepartmentTable(d);
			    console.log(d);
		     }
	       });
		});
	}
}

function selectDepartment()
{	
	var url = "ajax.php?action=selectDepartment";
	$.getJSON(url, function(result){
		for(var b=0;b<=result.length;b++)
		{
			var w = result[b];
			addSelectDepartment(w);
			//console.log(w);
		}
	});
}

function addSelectDepartment(select)
{
    //$('#optionlist').append($("<option>"+contact.deptdesc+"</option>"));
    window.department="<option>"+select.section+"</option>";
    window.department1=window.department1+window.department;
    console.log(window.department1);
}

function position()
{
	var url="ajax.php?action=position";
	$.getJSON(url,function(result)
	{
		$("#poslist").empty();
		console.log("tidert");
		for(var a=0; a<=result.length;a++)
		{
			var p=result[a];
			addPositionTable(p);
			console.log(p);
		}
	});
}

function addPositionTable(position){
	$("#poslist").append(
		'<tr data-id="' + position.posId + '">' +
			'<td>' +
				'<button class="btn" type="button" onclick="deletePosition(' + position.posId + ')"><i class="glyphicon glyphicon-trash"></i></button> ' +
			'</td>' +
			'<td class="id">' + position.posId  + '</td>' +
			'<td class="posdesc">' + position.posDesc  + '</td>' +
			'<td class="posstat">' + position.posStat + '</td>' +
		'</tr>');	
	$('tr[data-id=' + position.posId +']')[0].position = position;
}

function addNewPosition()
{
	var position = {
		"posnames": $("#posname").val()
	};
	console.log(position);
	var url = "ajax.php?action=addPosition"
	$.post(url, position, function(result){
		alert(result);
		//position();
		$("#posname").val("");
	    url="ajax.php?action=position";
		$.getJSON(url,function(result)
		{
			$("#poslist").empty();

			console.log("tidert");
			for(var a=0; a<=result.length;a++)
			{
				var p=result[a];
				addPositionTable(p);
				console.log(p);
			}
		});
	});
	$("#closePosition").attr("data-dismiss","modal");
}

function deletePosition(id){
	if(confirm('are you sure you want to delete position?')) {
		var url = "ajax.php?action=deletePosition&id=" + id;
		$.get(url, function(result){
			alert(result);
		    url="ajax.php?action=position";
			 $.getJSON(url,function(result)
			 {
				$("#poslist").empty();
				console.log("tidert");
				for(var a=0; a<=result.length;a++)
				{
					var p=result[a];
					addPositionTable(p);
					console.log(p);
				}
			});	
		});
	}
}

function selectPosition()
{	
	var url = "ajax.php?action=position";
	$.getJSON(url, function(result){
		for(var b=0;b<=result.length;b++)
		{
			var w = result[b];
			addSelectPosition(w);
			//console.log(w);
		}
	});
}

function addSelectPosition(position)
{
	window.position="<option>"+position.posDesc+"</option>";
	window.position1=window.position1+window.position;
	//console.log(window.position1);
}

$(document).ready(function(){
	$("#back").click(function(){
		window.location="generate_v2.php";
	})
});

$(document).ready(function(){
	$("#menu").hover(function(){
		$("#sub").show();
	},function(){
		$("#sub").hide();
	});
});

    loadContacts();
	department();
	selectDepartment();
    position();
    selectPosition();

// window.onload = function(){
// 	loadContacts();
// 	department();
// 	selectDepartment();
//     position();
// }

