function deleteContact(id){
	if(confirm('Are you sure you want to delete?')) {
		var url = "ajax?action=delete&id=" + id;
		$.get(url, function(result){
			loadContacts();
		});
	}
}

function addContactToTable(contact){
	
	var userLevel = '';
	if(contact.usertype == 1){
		userLevel = "ADMIN";
	} else
		userLevel = "USER";

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
			'<td class="dept">' + contact.usersection + '</td>' +	
			'<td class="pos">' + contact.userposition + '</td>' +
			'<td class="uname">' + contact.username + '</td>' +
			'<td class="pword">' + contact.userpassword + '</td>' +
			'<td class="level">' + userLevel + '</td>' +
		'</tr>');	
	$('tr[data-id=' + contact.userid +']')[0].contact = contact;
}

function editContact(userid, button){
	
	var $button = $(button);
					//<button>	<td>     <tr>
	var $tr = $(button.parentNode.parentNode);
	var contact = $tr[0].contact;
	
	var userLevel = '';
	if(contact.usertype == 1){
		userLevel = "ADMIN";
	} else
		userLevel = "USER";
	
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

		var cboDept = 
			' <select class="cboDept">' + 
				'<option>'+contact.usersection+'</option>'
				+window.department1+
			'</select>';
		$tr.find('td.dept').html(cboDept);

		var txtpos="<input type='text' class='txtpos' style='width:150;' value="+contact.userposition+">";
		$tr.find("td.pos").html(txtpos);

		var txtuname = '<input style="width:100" type="text" class="txtuname" value="' + contact.username + '" />';
		$tr.find('td.uname').html(txtuname);

		var txtpword = '<input style="width:100" type="text" class="txtpword" value="' + contact.userpassword + '" />';
		$tr.find('td.pword').html(txtpword);

		var cboLevel = 
			' <select class="cboLevel" style="width:150">' + 
				'<option value='+userLevel+'>'+"Select UserLevel"+'</option>'+
				'<option value="ADMIN">'+'ADMIN'+'</option>'+
				'<option value="USER">'+'USER'+'</option>'+
			'</select>';
		$tr.find('td.level').html(cboLevel);

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
			"usersection": $tr.find('select.cboDept').val(),
			"userposition": $tr.find('input.txtpos').val(),
			"username": $tr.find('input.txtuname').val(),
			"userpassword": $tr.find('input.txtpword').val(),
			"userlevel": $tr.find('select.cboLevel').val()					
		};
		//reflect the changes to the td as read-only values
		$tr.find('td.fname').text(userupdated.userfname);
		$tr.find('td.mname').text(userupdated.usermname);
		$tr.find('td.lname').text(userupdated.userlname);
		$tr.find('td.dept').text(userupdated.usersection);
		$tr.find('td.pos').text(userupdated.userposition);
		$tr.find('td.uname').text(userupdated.username);
		$tr.find('td.pword').text(userupdated.userpassword);
		$tr.find('td.level').text(userupdated.userlevel);
		$tr[0].contact = userupdated;
		
		console.log(userupdated);
		var url = "ajax?action=update";
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

	var userLevel = '';
	if(contact.usertype == 1){
		userLevel = "ADMIN";
	} else
		userLevel = "USER";

	$tr.find('td.fname').text(contact.userfname);
	$tr.find('td.mname').text(contact.usermname);
	$tr.find('td.lname').text(contact.userlname);
	$tr.find('td.dept').text(contact.usersection);
	$tr.find('td.pos').text(contact.userposition);
	$tr.find('td.uname').text(contact.username);
	$tr.find('td.pword').text(contact.userpassword);
	$tr.find('td.level').text(userLevel);
	//hide the cancel edit button
	$tr.find('button.cancel').addClass('hidden');	
	$tr.find('button.edit').attr('mode','save').html('<i class="glyphicon glyphicon-pencil"></i>');
	console.log($tr[0].contact);
}

function loadContacts()
{
	var url = "ajax?action=list";
	$.getJSON(url, function(result){
		$("#contactList").empty();
		for(var i=0;i<result.length;i++){
			var c = result[i];
			addContactToTable(c);
		}
	});
}

function addNewUser(){
	var user = {
		"firstname": $("#fname").val(),
		"middlename": $("#mname").val(),
		"lastname" : $("#lname").val(),
		"department" : $("#dept").val(),
		"position" : $("#pos").val(),
		"username" : $("#uname").val(),
		"password" : $("#pword").val()
	};
	console.log(user);
	var url = "ajax?action=addNewUser"
	$.post(url, user, function(result){
		alert(result);
		loadContacts();
	});
}

function department()
{	
	var url = "ajax?action=department";
	$.getJSON(url, function(result){
		$("#deptlist").empty();
		for(var j=0;j<result.length;j++)
		{
			var d = result[j];
			addDepartmentTable(d);
			//console.log(d);
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
	var url = "ajax?action=addDepartment"
	$.post(url, department, function(result){
		alert(result);
		//REFRESH TBODY
	    url = "ajax?action=department";
	    $.getJSON(url, function(result){
		    $("#deptlist").empty();
		    for(var j=0;j<result.length;j++){
			  var d = result[j];
			  addDepartmentTable(d);
			  console.log(d);		    
		    }	    
	    });
	});
	$("#closeDepartmentModal").attr("data-dismiss","modal");
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
		var url = "ajax?action=deleteDepartment&id=" + id;
		$.get(url, function(result){
		   alert(result);
		   //REFRESH TBODY
		   url = "ajax?action=department";
	       $.getJSON(url, function(result){
		      $("#deptlist").empty();
		      for(var j=0;j<result.length;j++){
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
	var url = "ajax?action=selectDepartment";
	$.getJSON(url, function(result){
		for(var b=0;b<result.length;b++)
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
    //console.log(window.department);
}

$(document).ready(function(){
	$("#back").click(function(){
		window.location="admin";
	})
});

/*$(document).ready(function(){
	$("#menu").hover(function(){
		$("#sub").show();
	},function(){
		$("#sub").hide();
	});
});*/

 window.onload = function(){
 	loadContacts();
	department();
	selectDepartment();
 }
