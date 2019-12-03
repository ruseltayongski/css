<tr>
	<td><hr></td>
</tr>

<tr>
	<td>
		<?php if(isset($_SESSION['user']) or isset($_SESSION['admin'])) { ?>
			<button type="button" class="btn btn-info" onclick="location.href='user';"><p class="glyphicon glyphicon-arrow-left" style="color:black;"> BACK </p></button>
		<?php } elseif(!isset($_SESSION['user']) or !isset($_SESSION['admin']) ) { ?>
			<button type="button" class="btn btn-info" onclick="location.href='<?php echo base_url('css');?>';"><p class="glyphicon glyphicon-arrow-left" style="color:black;"> BACK </p></button>
		<?php } ?>
	</td>
</tr>

<tr>
	<td>
		<center><div style = "color:white;padding-top:10px"> In pursuit of the service excellence, we would like to get your comments/suggestions. <br> We will appreciate it if you can spend a moment to answer this survey. Thank you.</div></center>
	</td>
</tr>

<tr>
	<td><hr></td>
</tr>

<tr>
	<td style = "text-align:center;padding-bottom:20px;">
		<div style="position:absolute;margin-left:250px;">
			Are you a DOH employee?
			<input name = "cssstat" type = "radio" value="yes" onclick="stats();" required> Yes &nbsp;
			<input name = "cssstat" type = "radio" value="no" onclick="stats();"> No
		</div> 
		<p id="stats" style="color:red;margin-left:250px;padding-bottom:20px;"></p>
		</td>
</tr>
<tr>
    <td style = "text-align:center;padding-bottom:20px">
        <div style="position:absolute;margin-left:30px;">
            Office Visited:<select id="field" name="section" style="border-radius:5px; width:200px;height:30px;" onchange="visit();" required>
                <option value="" >Select Section</option>
                <?php foreach($sectionAll as $row)
                {
                    ?>
                    <option value="<?php echo $row['section'];?>"><?php echo $row['section'];?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div style="position:absolute;margin-left:330px;">
            <p id="visited" style="color:red;"></p>
        </div>
        <div style="position:absolute;margin-left:410px;">
            Staff who rendered service:<input id = "rendered" name = "rendered" type = "text" style = "border-radius:5px;color:black;" onkeyup="services();" required>
        </div>
        <p id="service" style="color:red;margin-left:730px;padding-bottom:20px;"></p>
    </td>
</tr>
<tr><td></td></tr>

<tr>
	<td>
		<div style="margin-left:10px;">
			<?php if(isset($_SESSION['user'])){ ?>
			Year:<select id="year" name="year" style="color:black;width:70px;height:30px;font-size:15px;" required>
					<?php
						for($i = date('Y'); $i >= 2014 ; $i--){
							echo '<option value="'.$i.'">'.$i.'</option>';
						}
					?>
		 		</select>
			Month:<select id="month" name="month" onchange="clearMonth();" style="color:black;width:100px;height:30px;font-size:15px;" required>
                    <option value="11">December</option>
                    <!--
					<option value="0">January</option>
					<option value="1">Febuary</option>
					<option value="2">March</option>
					<option value="3">April</option>
					<option value="4">May</option>
					<option value="5">June</option> 
					<option value="6">July</option>
					<option value="7">August</option>
					<option value="8">September</option>
					<option value="9">October</option>
					<option value="10">November</option>
					<option value="11">December</option> -->	
					</select>
			Day:<?php } ?><input id = "day" name = "day" type='<?php if(isset($_SESSION['user'])) echo "text"; else echo "hidden";?>' size = "2" maxlength="2" style = "border-radius:5px;color:black;height:30px;" onkeyup="dateChecked(event)" required>
			<?php if(isset($_SESSION['user'])){ echo "<p id = 'dateErr' style = 'color:red;display:inline'></p>"; } else { echo "<input type='hidden' id = 'dateErr'>"; }?>
				<br><br>(DATE ON CSS FORM)
		</div>
	</td>
</tr>

<tr>
	<td style = "padding:10px">
		1.What is the purpose of your visit/transaction? <p id = "transaction" style = "color:red; display:inline"></p>
	</td>
</tr>

<tr>
	<td style = "padding-left:50px"><input id = "purpose1" type = "checkbox" name = "purpose1" value="1" onchange="selectfalse()">
		 Submit report/documents
	</td>
</tr>

<tr>
	<td style = "padding-left:50px"><input id = "purpose2" type = "checkbox" name = "purpose2" value="1" onchange="selectfalse()"> Attend Meeting</td>
</tr>

<tr>
	<td style = "padding-left:50px"><input id = "purpose3" type = "checkbox" name = "purpose3" value="1" onchange="selectfalse()"> Inquire, request data, request document</td>
</tr>

<tr>
	<td style = "padding-left:50px">
		<input id = "purpose4" type = "checkbox" name = "purpose4" value="1" onchange="selectfalse()"> Seek Assistance:
		<input id = "assistant1" type = "checkbox" name = "assistant1" value="Technical" onchange="selectfalse()" disabled> Technical
		<input id = "assistant2" type = "checkbox" name = "assistant2" value="Legal" onchange="selectfalse()" disabled> Legal
		<input id = "assistant3" type = "checkbox" name = "assistant3" value="Medical" onchange="selectfalse()" disabled> Medical
		<p id = "assistant" style = "color:red; display:inline"></p>
	</td>
</tr>

<tr>
	<td style = "padding-left:50px"><input id = "purpose5" type = "checkbox" name = "purpose5" value="1" onchange="selectfalse()"> Interview, Research</td>
</tr>

<tr>
	<td style = "padding-left:50px"><input id = "purpose6" type = "checkbox" name = "purpose6" value="1" onchange="selectfalse()"> Follow-up documents</td>
</tr>

<tr>
	<td style = "padding-left:50px"><input id = "purpose7" type = "checkbox" name = "purpose7" value="1" onchange="selectfalse()"> Apply for:
		<input id = "apply1" type = "checkbox" name = "apply1" value="License" onchange="selectfalse()" disabled> License
		<input id = "apply2" type = "checkbox" name = "apply2" value="Accreditation" onchange="selectfalse()" disabled> Accreditation
		<input id = "apply3" type = "checkbox" name = "apply3" value="Certification" onchange="selectfalse()" disabled> Certification
		<input id = "apply4" type = "checkbox" name = "apply4" value="Registration" onchange="selectfalse()" disabled> Registration
		<input id = "apply5" type = "checkbox" name = "apply5" value="Authentication" onchange="selectfalse()" disabled> Authentication
		<p id = "apply" style = "color:red; display:inline"></p>
	</td>
</tr>

<tr>
	<td style = "padding-left:50px"><input id = "purpose8" type = "checkbox" name="purpose8" value="1" onchange="selectfalse()"> Others (please specify) <input id = "others" type ="text" name="others" style = "border-radius:5px;color:black;" onkeyup="selectfalse();" disabled="disabled">
	<p id = "otherstext" style = "color:red; display:inline;"></p>
	</td>
</tr>

<tr>
	<td><hr id = "1" class="hr-styl1"></td>
</tr>

<tr>
	<td style="padding-left:10px;padding-top:20px">
		2. How long did you wait before you accomplish the purpose of your visit/transaction?
		<input id = "hours" name = "hours" type = "text" size="1" maxlength="1" style = "text-align:center;border-radius:5px;color:black;" onkeypress='return event.charCode <= 57' onkeyup="hourstrapping();" >Hours(optional)								
		<input id = "minute" name = "minute" type = "text" size = "2" maxlength="2" style ="text-align:center;border-radius:5px;color:black;" onkeyup="minuteValidate(event,$(this));"> Minutes
		<p id = "err2" style = "color:red;display:inline;"></p>
  </td>
</tr>

<tr>
	<td><hr id = "3" class="hr-styl3"></td>
</tr>

<tr>
	<td style = "padding:10px;padding-top:20px">
		3. Please select your choice and respone using the rating scale.
			<p id = "rating" style = "color:red; display:inline"></p>
	</td>
</tr>

<tr>
	<td style = "padding-left:50px;">
		<!--A table inside the Main table, this holds the rating scale-->
		<table border = "1" style = "border:1px solid white;padding-left:20px;color:white;">	
			<tr>
				<th style = "padding:3px;text-align:center">Statement</th>
				<th style = "padding:3px;text-align:center">Strongly Agree</th>
				<th style = "padding:3px;text-align:center">Agree</th>
				<th style = "padding:3px;text-align:center">Disagree</th>
				<th style = "padding:3px;text-align:center">Strongly disagree</th>
			</tr>
			
			<tr>
				<td>Received the appropriate services needed</td>
				<td style = "text-align:center"><input id="rating1" type = "radio" name = "rating1" value="1" onclick="radio();" required></td>
				<td style = "text-align:center"><input id="rating1" type = "radio" name = "rating1" value="2" onclick="radio();"></td>
				<td style = "text-align:center"><input id="rating1" type = "radio" name = "rating1" value="3" onclick="radio();"></td>
				<td style = "text-align:center"><input id="rating1" type = "radio" name = "rating1" value="4" onclick="radio();"></td>
			</tr>

			<tr>
				<td>Timely response was given</td>
				<td style = "text-align:center"><input id="rating2" type = "radio" name = "rating2" value="1" onclick="radio();" required></td>
				<td style = "text-align:center"><input id="rating2" type = "radio" name = "rating2" value="2" onclick="radio();"></td>
				<td style = "text-align:center"><input id="rating2" type = "radio" name = "rating2" value="3" onclick="radio();"></td>
				<td style = "text-align:center"><input id="rating2" type = "radio" name = "rating2" value="4" onclick="radio();"></td>
			</tr>
			
			<tr>
				<td>The staff was well-informed</td>
				<td style = "text-align:center"><input id="rating3" type = "radio" name = "rating3" value="1" onclick="radio();" required></td>
				<td style = "text-align:center"><input id="rating3" type = "radio" name = "rating3" value="2" onclick="radio();"></td>
				<td style = "text-align:center"><input id="rating3" type = "radio" name = "rating3" value="3" onclick="radio();"></td>
				<td style = "text-align:center"><input id="rating3" type = "radio" name = "rating3" value="4" onclick="radio();"></td>
			</tr>
			
			<tr>
				<td>The staff was courteous and approachable</td>
				<td style = "text-align:center"><input id="rating4" type = "radio" name = "rating4" value="1" onclick="radio();" required></td>
				<td style = "text-align:center"><input id="rating4" type = "radio" name = "rating4" value="2" onclick="radio();"></td>
				<td style = "text-align:center"><input id="rating4" type = "radio" name = "rating4" value="3" onclick="radio();"></td>
				<td style = "text-align:center"><input id="rating4" type = "radio" name = "rating4" value="4" onclick="radio();"></td>
			</tr>
			
			<tr>
				<td>The service rendered were just, honest and fair</td>
				<td style = "text-align:center"><input id="rating5" type = "radio" name = "rating5" value="1" onclick="radio();" required></td>
				<td style = "text-align:center"><input id="rating5" type = "radio" name = "rating5" value="2" onclick="radio();"></td>
				<td style = "text-align:center"><input id="rating5" type = "radio" name = "rating5" value="3" onclick="radio();"></td>
				<td style = "text-align:center"><input id="rating5" type = "radio" name = "rating5" value="4" onclick="radio();"></td>
			</tr>
			
			<tr>
				<td>The workplace was clean and organized</td>
				<td style = "text-align:center"><input id="rating6" type = "radio" name = "rating6" value="1" onclick="radio();" required></td>
				<td style = "text-align:center"><input id="rating6" type = "radio" name = "rating6" value="2" onclick="radio();"></td>
				<td style = "text-align:center"><input id="rating6" type = "radio" name = "rating6" value="3" onclick="radio();"></td>
				<td style = "text-align:center"><input id="rating6" type = "radio" name = "rating6" value="4" onclick="radio();"></td>
			</tr>
		</table>
		<!--End of sub table-->
	</td>
</tr>
<tr>
	<td><hr id = "3" class="hr-styl3"></td>
</tr>
<tr>
	<td style = "padding-left:10px;padding-top:20px">
		4. As a whole, are you satisfied with the services provided/received?
			<input id="satisfied1" type="radio" name="satisfied" value="yes" onclick="satisfieds();" required> Yes &nbsp;
			<input id="satisfied1" type="radio" name="satisfied" value="no" onclick="satisfieds();" required> No <p id = "satisfied" style = "color:red; display:inline"></p>
	</td>
</tr>

<tr>
	<td style = "padding-left:10px;padding-top:20px">5. Comments/Suggestions/Recommendations: <i>(Optional)</i></td>
</tr>

<tr>
	<td style ="padding-left:50px;padding-top:10px"><textarea name = "suggestion" placeholder = "Type here .." class = "form-control" col = "500" rows = "4" style = "height:auto;width:50rem;resize:none"></textarea></td>
</tr>

<tr>
	<td style = "padding-left:10px;padding-top:20px">6. <b>For Immediate concern/feedback,</b> kindly approach the concerned the office's Customer Help Desk.</td>
</tr>

<tr>
	<td style = "padding-left:25px">Thank you very much. <i>Contact Information (Optional)</i></td>
</tr>

<tr>
	<td style = "padding-left:50px;padding-top:20px" colspan = "2">
		<!--Another table inside  Main table, this holds ththee personal information-->
		<table>
			<tr>
				<td style = "padding:5px;padding-left:15rem"><input class = "form-control" type = "text" name = "cname" size = "45" placeholder = "NAME"></td><td><p id = "e-name" style = "color:red;display:inline;"></p></td>
			</tr>
			
			<tr>
				<td style = "padding:5px;padding-left:15rem"><input class = "form-control" type = "text" name = "coffice" size = "45" placeholder = "OFFICE"></td>
			</tr>

			<tr>
				<td style = "padding:5px;padding-left:15rem"><input class = "form-control" type = "text" name = "ccno" size = "45" placeholder = "TELEPHONE NUMBER"></td><td><p id = "e-telno" style = "color:red; display:inline"></p></td>
			</tr>

			<tr>
				<td style = "padding:5px;padding-left:15rem"><input class = "form-control" type = "email" name = "cemail" size = "45" placeholder = "EMAIL ADDRESS"></td><td><p id = "e-mail" style = "color:red; display:inline"></p></td>
			</tr>
		</table>
		<!--End of sub table-->
	</td>
</tr>

<tr>
	<td><br>
		<center>
		<button class="btn btn-primary glyphicon glyphicon-send" style="width:30%;" id="generates" type='submit' name="generate" onclick="selectrequired();"> Submit </button>
		</center><br>
	</td>
</tr>