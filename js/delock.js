/**
 * Created by Hussein on 10-10-2017.
 */
 var create_newUser_Url="api/index.php?action=0";  // create new delock user
 var authUser_Url="api/index.php?action=1";        //authentication user login credentials
 var retrieveUser_Url="api/index.php?action=2";    //retrieve user login credentials
 var resp=0;
 
 var phoneMakeVal="";
 var idx="";
 var phoneModelList="";
 var countryid="";



 /*$(document).ready(function() {

	$('#log').keydown(function(e){
		if(e.keyCode == 13){
			Auth_();
		}
	})

}); */


 //user account creation
function create_(){
    var fullname=$('#fullname').val();
    var mobile_numb=$('#mobile_numb').val();
    var email_id=$('#email_id').val();
    var pword=$('#pword').val();
	var re_pword=$('#re_pword').val();
    var err="";
    //validate user input
    if(fullname == '' || email_id == '' || pword == '' || re_pword == '' || mobile_numb == ''){
        err += 'Please fill out  all fields<br>';
    }
	if(pword != re_pword){      //Password
        err += '* Password mismatch, kindly correct and try again<br>';
    }
    if(err != ""){
        document.all.error.innerHTML=err;
        $('#error').css("color","red");
        $('#error').show();
    }
    else if(err == ""){
        document.all.error.innerHTML="";
        //0 -- create new delock user
        var datastring="fullname="+fullname+"&email_id="+email_id+"&pword="+pword+"&mobile_numb="+mobile_numb;
		
        $.ajax({
            type: 'POST',
            url: create_newUser_Url,
            data:datastring,
            dataType:"json",
            //async:false,
            success:function(xml){
                resp = xml.success;
                create_action(resp);
            }
        }); 

		
    }

    function create_action(resp){
		//document.all.error.innerHTML="Your registration was successful..."+resp;

        switch(resp){
            case 0:
				document.getElementById('fullname').value="";
				document.getElementById('pword').value="";
				document.getElementById('re_pword').value="";
				document.getElementById('email_id').value="";
				document.getElementById('mobile_numb').value="";
                //document.all.error.innerHTML="<i class='fa fa-check'></i> Successful registration.";
			     $('#error').css("color","#4DB849"); 
				 $('#error').show();
				alert("Successful registration...you may now proceed to login");
				window.location = "login.html";
                break;
            case 1:
				 document.all.error.innerHTML="Oops, Failed!, Email Address already exists";
				 $('#error').css("color","red");
				 $('#error').show();
                break;
            case 2:
			    document.all.error.innerHTML="Oops, Please enter valid e-mail!";
				 $('#error').css("color","red");
				 $('#error').show();
                break;
			case 3:
			    document.all.error.innerHTML="Oops, Unable to create account, please try again later!";
				 $('#error').css("color","red");
				 $('#error').show();
                break;
        } 
    }



}

//login authentication
function Auth_(){
    var email_id=$('#email').val();
    var pword=$('#pword').val();
    var err="";
    //validate user input
    if(email_id == '' || pword == ''){
        err += 'Please fill out  all fields<br>';
    }
    if(err != ""){
        document.all.error.innerHTML=err;
        $('#error').css("color","red");
        $('#error').show();
    }else if(err == "") {
        document.all.error.innerHTML=err;
        //document.getElementById('log').innerHTML = '<img src="img/loading.gif" /> ';
        var datastring="email_id="+email_id+"&pword="+pword+"&channel_id=w";

        $.ajax({
            type: 'POST',
            url: authUser_Url,
            data:datastring,
            dataType:"json",
            //async:false,
            success:function(xml){
                resp_ = xml.success;
                session_id = xml.sessionID;
                Auth_action(resp_,email_id,pword,session_id);
            }
        });
    }
}


function Auth_action(resp,e,p,session_id){
    switch(resp){
        case 0: //valid credential
		    $('#error').css("color","#4DB849"); 
		    $('#error').show();
            //document.all.error.innerHTML="success";
			//document.body.innerHTML += "<form method='POST' action='u/?"+session_id+"' id='dynForm'><input type='hidden' name='email_id__' id='email_id__' value='"+e+"'> <input type='hidden' name = 'pword__' id='pword__' value='"+p+"'> <input type='hidden' name = 'sessionid__' id='sessionid__' value='"+session_id+"'>";
            //document.body.innerHTML += "<form method='POST' action='u/?"+session_id+"' id='dynForm'>";
			/*document.body.innerHTML += "<form method='POST' action='u/?s="+session_id+"' id='dynForm'>";
			document.getElementById("dynForm").submit();*/
			window.location = "u/?s="+session_id;

            break;
        case 1: //invalid credential
			 $('#error').css("color","red");
			 $('#error').show();
            document.all.error.innerHTML="Oops, Invalid login credentials!";
            break;
        case 2: //suspended account
			 $('#error').css("color","red");
             $('#error').show();
             document.all.error.innerHTML="Oops, your account is suspended. kindly contact system administrator!";
            break;
		case 3: //Invalid email
			 $('#error').css("color","red");
             $('#error').show();
             document.all.error.innerHTML="Oops, Please enter valid e-mail!";
            break;
		case 4: //delock administrator
			window.location = "a/?s="+session_id;
		break;
    }
}

//retrieve credentials
function retrieve(){
    var email_id=$('#email').val();
    var err="";
    //validate user input
    if(email_id == ''){
        err += 'Please fill out  all fields<br>';
    }
    if(err != ""){
        document.all.error.innerHTML=err;
        $('#error').css("color","red");
        $('#error').show();
    }else if(err == "") {
        document.all.error.innerHTML=err;
        var datastring="email_id="+email_id;

        $.ajax({
            type: 'POST',
            url: retrieveUser_Url,
            data:datastring,
            dataType:"json",
            //async:false,
            success:function(xml){
                resp_ = xml.success;
                retrieve_action(resp_);
            }
        });
    }
}

function retrieve_action(resp){
    switch(resp){
        case 0: //valid email, mail sent to box
		    $('#error').css("color","#4DB849"); 
		    $('#error').show();
            document.all.error.innerHTML="<i class='fa fa-check'></i> Proceed to your mailbox to access your credentials.";
            break;
        case 1: //invalid credential
			 $('#error').css("color","red");
			 $('#error').show();
            document.all.error.innerHTML="Oops, account does not exist!";
            break;
		case 2: //Invalid email
			 $('#error').css("color","red");
             $('#error').show();
             document.all.error.innerHTML="Oops, Please enter valid e-mail!";
            break;
    }
}

 function phoneModelChange(selectObj) {
	document.all.phoneModel.innerHTML="<option>loading phone models...</option>";
	idx = selectObj.selectedIndex; 
	phoneMakeVal = selectObj.options[idx].value;
	var datastring="?action=3&phonemakeval="+phoneMakeVal;
	$.get("../api/index.php"+datastring, function(data){
		 $('#phoneModel').empty().append(data);
		 //alert(data);
	}); 

 }  

function getSpecificTools(){
	document.all.tools.innerHTML="<option>loading phone tools ...</option>";
	var phoneMakeName=$('#phoneMake').find('option:selected').text();
	var datastring="?action=7&phoneMakeName="+phoneMakeName;
	//alert(phoneMakeName);
	$.get("../api/index.php"+datastring, function(data){
		 $('#tools').empty().append(data);
		 //alert(data);
	}); 
}

 function countryChange(selectObj) {
	document.all.phoneNetwork.innerHTML="<option>loading country networks...</option>";
	idx = selectObj.selectedIndex; 
	countryid = selectObj.options[idx].value;
	var datastring="?action=4&countryid="+countryid;
	$.get("../api/index.php"+datastring, function(data){
		 $('#phoneNetwork').empty().append(data);
		 //alert(data);
	}); 
 }

 function track_it(dl_id,session_id){
	var orderid=$('#order_id').val();
	document.all.error.innerHTML="verifying order...";
	var datastring="?action=6&dl_id="+dl_id+"&session_id="+session_id+"&order_id="+orderid;
	$.get("../api/index.php"+datastring, function(data){
		 //alert(data);
		 document.all.error.innerHTML=data;
	}); 
	
 }
 
 function validateIMEI(){
    document.all.validateimei.innerHTML="validating...";
	var imei=$('#imei').val();
	//alert(imei);
	var datastring="?action=5&imei="+imei;
	$.get("../api/index.php"+datastring, function(data){
		 //alert(data);
		 if(data == 1){
			$('#validateimei').css("color","red"); 
			resp = "IMEI is Invalid, please provide a valid one";
		 }else if (data == 11)
		 {
			$('#validateimei').css("color","#4DB849"); 
			 resp = "<i class='fa fa-check'></i> IMEI is valid";
		 }
		 $('#validateimei').empty().append(resp);
	}); 
 }


function validateIMEI_(){
    document.all.validateimei.innerHTML="validating...";
	var imei=$('#imei').val();
	var datastring="?action=5&imei="+imei;
	$.get("api/index.php"+datastring, function(data){
		 //alert(data);
		 if(data == 1){
			$('#validateimei').css("color","red"); 
			resp = "IMEI is Invalid, please provide a valid one";
		 }else if (data == 11)
		 {
			$('#validateimei').css("color","#4DB849"); 
			 resp = "<i class='fa fa-check'></i> IMEI is valid";
		 }
		 $('#validateimei').empty().append(resp);
	}); 
 }


function kSend(url,data,callback)
{
    if(url==undefined){
        url= "";
        alert("url not defined");
    }
    if(data==undefined) {
        data="";
        alert("data is not set");
    }
    if(callback==undefined){
        callback= "";
        alert("callback not defined");
    }
    var ajaxRequest;  // The variable that makes Ajax possible!
    try{
        // Opera 8.0+, Firefox, Safari
        ajaxRequest = new XMLHttpRequest();
    } catch (e){
        // Internet Explorer Browsers
        try{
            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try{
                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e){
                // Something went wrong
                alert("Your browser broke!");
                return false;
            }
        }
    }
    // Create a function that will receive data sent from the server
    ajaxRequest.onreadystatechange = function(){
        if(ajaxRequest.readyState == 4){

            if(ajaxRequest.status == 200)
            {
                var ajaxDisplay = document.getElementById(callback);
                ajaxDisplay.innerHTML = ajaxRequest.responseText;
            }
        }
        else
        {
            document.getElementById(callback).innerHTML = '<div style="text-align:center; float:center; margin-top: 30%;"><h3>loading...</h3><img src="../images/loading.gif" /></div>';
        }
    }
    var url2=url+"?"+data;
    ajaxRequest.open("GET", url2, true);
    ajaxRequest.send(null);
}

function order_unlock(action,dl_id,session_id){
    var datastring="action="+action+"&dl_id="+dl_id+"&session_id="+session_id; //action 0 place order
    kSend('switch.php',datastring,'left_pane');
	//alert(dl_id);
}

function complete_order(action,dl_id,session_id,order_id){
    var datastring="action="+action+"&dl_id="+dl_id+"&session_id="+session_id+"&order_id="+order_id; //action 21 complete order 25/11/2017
    kSend('switch.php',datastring,'left_pane');
	//alert(dl_id);
}

function profile(action,dl_id,session_id){
	var datastring="action="+action+"&dl_id="+dl_id+"&session_id="+session_id; //action 5 profile module
    kSend('switch.php',datastring,'right_pane');
}

function track_order(action,dl_id,session_id){
    var datastring="action="+action+"&dl_id="+dl_id+"&session_id="+session_id; //action 1 track order
    kSend('switch.php',datastring,'left_pane');
	//alert(dl_id);
}

function my_orders(action,dl_id,session_id){
    var datastring="action="+action+"&dl_id="+dl_id+"&session_id="+session_id; //action 7 my orders
    kSend('switch.php',datastring,'left_pane');
	//alert(dl_id);
}


function check_imei(action,dl_id,session_id){
    var datastring="action="+action+"&dl_id="+dl_id+"&session_id="+session_id; //action 15 clean IMEI CHECK
    kSend('switch.php',datastring,'left_pane');
	//alert(dl_id);
}



function my_imeicheck_orders(action,dl_id,session_id){
    var datastring="action="+action+"&dl_id="+dl_id+"&session_id="+session_id; //action 18  IMEI CHECK orders
    kSend('switch.php',datastring,'left_pane');
	//alert(dl_id);
}

function wallet(action,dl_id,session_id){
    var datastring="action="+action+"&dl_id="+dl_id+"&session_id="+session_id; //action 12 my wallet
    kSend('switch.php',datastring,'left_pane');
	//alert(dl_id);
}

 function proceed(action,dl_id,session_id){
    var phoneMake=$('#phoneMake').val();
    var phoneModel=$('#phoneModel').val();
    var country=$('#country').val();
	var phoneNetwork=$('#phoneNetwork').val();
    var email_id=$('#email_id').val();
	var imei=$('#imei').val();
    //var tools_=$('#tools').val();
	var phoneMakeName=$('#phoneMake').find('option:selected').text();
	var phoneModelName=$('#phoneModel').find('option:selected').text();
	var countryName=$('#country').find('option:selected').text();
	var phoneNetworkName=$('#phoneNetwork').find('option:selected').text();
    var tools_val=$('#tools').val();
	var tools=tools_val.substr(0,tools_val.indexOf("|"));
	var tools_amt=tools_val.substr(tools_val.indexOf("|")+1);


	var err="";
	 // alert(tools);
    //validate user input
    if(phoneMake == '0' || phoneModel == '0' || country == '0' || phoneNetwork == '0' || imei == '' || tools_val == '0'){
        err += 'Please fill out  all fields<br>';
    }
    if(err != ""){
        document.all.error.innerHTML=err;
        $('#error').css("color","red");
        $('#error').show();
    }
    else if(err == ""){
        document.all.error.innerHTML="";
		var datastring="action="+action+"&dl_id="+dl_id+"&session_id="+session_id+"&phoneMake="+phoneMake+"&phoneModel="+phoneModel+"&country="+country+"&phoneNetwork="+phoneNetwork+"&email_id="+email_id+"&imei="+imei+"&tools="+tools+"&phoneMakeName="+phoneMakeName+"&phoneModelName="+phoneModelName+"&countryName="+countryName+"&phoneNetworkName="+phoneNetworkName+
			"&tools_amt="+tools_amt; //action 2 proceed order
		kSend('switch.php',datastring,'left_pane');
	} 
 }

function proceed3(action,dl_id,session_id,order_id){ //25/11/2017
    var phoneMake=$('#phoneMake').val();
    var phoneModel=$('#phoneModel').val();
    var country=$('#country').val();
	var phoneNetwork=$('#phoneNetwork').val();
    var email_id=$('#email_id').val();
	var imei=$('#imei').val();
    //var tools_=$('#tools').val();
	var phoneMakeName=$('#phoneMake').find('option:selected').text();
	var phoneModelName=$('#phoneModel').find('option:selected').text();
	var countryName=$('#country').find('option:selected').text();
	var phoneNetworkName=$('#phoneNetwork').find('option:selected').text();
    var tools_val=$('#tools').val();
	var tools=tools_val.substr(0,tools_val.indexOf("|"));
	var tools_amt=tools_val.substr(tools_val.indexOf("|")+1);


	var err="";
	 // alert(tools);
    //validate user input
    if(phoneMake == '0' || phoneModel == '0' || country == '0' || phoneNetwork == '0' || imei == '' || tools_val == '0'){
        err += 'Please fill out  all fields<br>';
    }
    if(err != ""){
        document.all.error.innerHTML=err;
        $('#error').css("color","red");
        $('#error').show();
    }
    else if(err == ""){
        document.all.error.innerHTML="";
		var datastring="action="+action+"&dl_id="+dl_id+"&session_id="+session_id+"&phoneMake="+phoneMake+"&phoneModel="+phoneModel+"&country="+country+"&phoneNetwork="+phoneNetwork+"&email_id="+email_id+"&imei="+imei+"&tools="+tools+"&phoneMakeName="+phoneMakeName+"&phoneModelName="+phoneModelName+"&countryName="+countryName+"&phoneNetworkName="+phoneNetworkName+
			"&tools_amt="+tools_amt+"&order_id="+order_id; //action 22 complete order
		kSend('switch.php',datastring,'left_pane');
	} 
 }

  function proceed2(action,dl_id,session_id){
	var imei=$('#imei').val();
	var email_id=$('#email_id').val();
	var comment=$('#comment').val();
	var price=$('#price').val();
	var err="";

    //validate user input
    if(imei == '' || email_id == ''){
        err += 'Please fill out  all fields<br>';
    }
    if(err != ""){
        document.all.error.innerHTML=err;
        $('#error').css("color","red");
        $('#error').show();
    }
    else if(err == ""){
        document.all.error.innerHTML="";
		var datastring="action="+action+"&dl_id="+dl_id+"&session_id="+session_id+"&email_id="+email_id+"&imei="+imei+"&comment="+comment+"&price="+price; //action 16 proceed imei check order
		kSend('switch.php',datastring,'left_pane');
	} 
 }

 function payWithPaystack(email_id,amt,order_id,session_id,dl_id,channel){
    var handler = PaystackPop.setup({
      key: 'pk_test_5e24c900d07755db5fb9054aadea3d9d30a3abb0',
      email: email_id,
      amount: amt*100, //amt in kobo
      ref: order_id, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){ //success
          //alert('success. transaction ref is ' + response.reference);
		  document.all.right_pane.innerHTML = '<div class="profile" style="float: left; width: 80%; height: 350px; padding-left: 40px; padding-right: 40px;"><div style="float: left; width: 100%; height: auto;  opacity: 0.7; margin-top: 0px; margin-bottom: 10px; padding-left: 10px; padding-right: 10px; padding-top: 15px; color:#f39c12;"><h2>Received!</h2></div> <i>Payment on order ID:'+order_id+' was successfully deducted from your card</i></div>';
		  
		  var pay_ref=$.trim(response.reference);
		  if(channel == 'U'){
			//fulfill unlockbase order
			confirm_order(3,dl_id,order_id,session_id,'C',pay_ref);	
		  }else if (channel == 'C'){
			//fulfill imei check order
			//alert('i got here');
			confirm_order2(17,dl_id,order_id,session_id,'C',pay_ref);	
		  }
      },
      onClose: function(){
          //alert('window closed');
      }
    });
    handler.openIframe();
  }

  function payWithWallet(action,order_id,session_id,dl_id,amt,channel){
		var datastring="?action="+action+"&dl_id="+dl_id+"&session_id="+session_id+"&order_id="+order_id+"&amt="+amt+"&channel="+channel;
		//kSend('switch.php',datastring,'right_pane');

		$.get("switch.php"+datastring, function(data){
		 //alert(data);
		 if(data == 1){ //failed payment
			document.all.right_pane.innerHTML = '<div class="profile" style="float: left; width: 80%; height: 350px; padding-left: 40px; padding-right: 40px;"><div style="float: left; width: 100%; height: auto;  opacity: 0.7; margin-top: 0px; margin-bottom: 10px; padding-left: 10px; padding-right: 10px; padding-top: 15px; color:red;"><h2>Insufficient Balance</h2></div> <i>Payment on order ID:'+order_id+' as failed. <br/><br/>kindly click on confirm order to make payment via card<br/> or <br/>fund your wallet to proceed.</i></div>';
		 }
		 else if(data == 0){ //succesful payment
			document.all.right_pane.innerHTML = '<div class="profile" style="float: left; width: 80%; height: 350px; padding-left: 40px; padding-right: 40px;"><div style="float: left; width: 100%; height: auto;  opacity: 0.7; margin-top: 0px; margin-bottom: 10px; padding-left: 10px; padding-right: 10px; padding-top: 15px; color:#f39c12;"><h2>Received!</h2></div> <i>Payment on order ID:'+order_id+' was successfully deducted from your wallet</i></div>';
			
			if(channel == 'U'){
				//fulfill unlockbase api
				confirm_order(3,dl_id,order_id,session_id,'W','Debit from Wallet');
			}else if(channel == 'C'){
				//fullfill imei check order
				//alert('got here');
				confirm_order2(17,dl_id,order_id,session_id,'W','Debit from Wallet');
			}
		 }
		}); 
  }

 function confirm_order(action,dl_id,order_id,session_id,mode,pay_ref){

		//get all variables
		var mobile=$('#mobile').val();
		var network=$('#network').val();
		var provider=$('#provider').val();
		var pin=$('#pin').val();
		var type=$('#type').val();
		var kbh=$('#kbh').val();
		var mep=$('#mep').val();
		var prd=$('#prd').val();
		var locks=$('#locks').val();
		var sn=$('#sn').val();
		var secro=$('#secro').val();
		var sms=$('#sms').val();

		
		var del_min=$('#del_min').val();
		var del_max=$('#del_max').val();
		var del_unit=$('#del_unit').val();


		var datastring="action="+action+"&dl_id="+dl_id+"&session_id="+session_id+"&order_id="+order_id+"&mobile="+mobile+"&network="+network+"&provider="+provider+"&pin="+pin+"&type="+type+"&kbh="+kbh+"&mep="+mep+"&prd="+prd+"&locks="+locks+"&sn="+sn+"&secro="+secro+"&sms="+sms+"&del_min="+del_min+"&del_max="+del_max+"&del_unit="+del_unit+"&mode="+mode+"&pay_ref="+pay_ref; //action 2 proceed order
		kSend('switch.php',datastring,'left_pane');
 }

 function confirm_order2(action,dl_id,order_id,session_id,mode,pay_ref){
		//get all variables
		var datastring="action="+action+"&dl_id="+dl_id+"&session_id="+session_id+"&order_id="+order_id+"&mode="+mode+"&pay_ref="+pay_ref; //action 17 proceed imei check order
		kSend('switch.php',datastring,'left_pane');
 }

 function call_payment(action,dl_id,order_id,session_id,channel){
		var datastring="action="+action+"&dl_id="+dl_id+"&session_id="+session_id+"&order_id="+order_id+"&channel="+channel;
		kSend('switch.php',datastring,'right_pane');
 }
 function call_payment2(action,dl_id,order_id,session_id){
		var datastring="action="+action+"&dl_id="+dl_id+"&session_id="+session_id+"&order_id="+order_id;
		kSend('switch.php',datastring,'right_pane');
 }
function show_vend(uid){
    $('#'+uid).show();
}
function hide_vend(uid){
    $('#'+uid).hide();
}

function edit_profile(action,dl_id){
	//alert(dl_id);
	var datastring="action="+action+"&dl_id="+dl_id;
	kSend('switch.php',datastring,'right_pane');
}

function update_profile_(action,dl_id){
	var fullname=$('#fname').val();
	var mobile_numb=$('#mobile_numb').val();
	var err="";
    //validate user input
    if(fullname == '' || mobile_numb == ''){
        err += 'Please fill out  all fields<br>';
    }
    if(err != ""){
		document.all.error2.innerHTML=err;
        $('#error2').css("color","red");
        $('#error2').show();
	}else if(err == "") {
		var datastring="action="+action+"&dl_id="+dl_id+"&fullname="+fullname+"&mobile_numb="+mobile_numb;
		kSend('switch.php',datastring,'right_pane');
	}
	
}


function edit_pword(action,dl_id){
	//alert(dl_id);
	var datastring="action="+action+"&dl_id="+dl_id;
	kSend('switch.php',datastring,'right_pane');
}

function update_pword(action,dl_id){
	var cpword=$('#cpword').val();
	var npword=$('#npword').val();
	var rnpword=$('#rnpword').val();
	var err="";
    //validate user input
    if(cpword == '' || npword == '' || rnpword == ''){
        err += 'Please fill out  all fields<br>';
    }
	if(npword != rnpword){      //Password
        err += 'Password mismatch, kindly correct and try again<br />';
    }
    if(err != ""){
		document.all.error2.innerHTML=err;
        $('#error2').css("color","red");
        $('#error2').show();
	}else if(err == "") {
		var datastring="action="+action+"&dl_id="+dl_id+"&cpword="+cpword+"&npword="+npword;
		kSend('switch.php',datastring,'right_pane');
	}
	
}

function fund(dl_id,order_id,amt,pay_ref){
	    var datastring="?action=14&dl_id="+dl_id+"&amt="+amt+"&order_id="+order_id+"&pay_ref="+pay_ref;
		$.get("switch.php"+datastring, function(data){});
}

function FundWalletWithPaystack(email_id,amt,order_id,dl_id){
    var handler = PaystackPop.setup({
      key: 'pk_test_5e24c900d07755db5fb9054aadea3d9d30a3abb0',
      email: email_id,
      amount: amt*100, //amt in kobo
      ref: order_id, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){ //success
          //alert('success. transaction ref is ' + response.reference);
		    $('#error').css("color","#4DB849"); 
		    $('#error').show();
            document.all.error.innerHTML="<i class='fa fa-check'></i> wallet funded successfully.";
		  
			//fund wallet
			var pay_ref=$.trim(response.reference);
			fund(dl_id,order_id,amt,pay_ref);	
      },
      onClose: function(){
          //alert('window closed');
      }
    });
    handler.openIframe();
  }

function fund_wallet(action,dl_id,email_id){
	var amt=$('#amt').val();
	var err="";
    //validate user input
    if(amt == ''){
        err += 'supply an amount<br>';
    }
    if(err != ""){
		document.all.error.innerHTML=err;
        $('#error').css("color","red");
        $('#error').show();
	}else if(err == "") {
		document.all.error.innerHTML=err;
		var datastring="?action="+action+"&dl_id="+dl_id+"&amt="+amt;
		$.get("switch.php"+datastring, function(data){
				 var order_id=$.trim(data);
				//initiate the paystack payment api call
				 FundWalletWithPaystack(email_id,amt,order_id,dl_id);
			});
	
	}
}



function logout(action,dl_id,session_id){
    //logout
    var datastring="?action="+action+"&dl_id="+dl_id+"&session_id="+session_id;
    $.get("switch.php"+datastring, function(data){
			window.location = "../login.html";
            
    });

}

/*admin functions begin*/
function search_user(){
		var search=$('#search_user').val();
		var datastring="search="+search;
		kSend('users/search_users.php',datastring,'main_cont');
}

function search_order(){
		var search=$('#search_order').val();
		var sort=$('#sort_type').val();
		var status=$('#status_type').val();
		var datastring="search="+search+"&sort="+sort+"&status="+status;
		kSend('orders/search_orders.php',datastring,'main_cont');
}

function del_acc(dl_id,id){
	var r=confirm("Are you sure you want to delete account reference no "+dl_id);
	//if yes, proceed to delete
	if(r ==true){
		var datastring="dl_id="+dl_id;
		kSend('users/delete_users.php',datastring,id);
	}
}

function susp_acc(dl_id,id){
	var r=confirm("Are you sure you want to suspend account reference no "+dl_id);
	//if yes, proceed to suspend
	if(r ==true){
		var datastring="dl_id="+dl_id;
		kSend('users/suspend_users.php',datastring,id);
	}
}

function act_acc(dl_id,id){
	var r=confirm("Are you sure you want to active account reference no "+dl_id);
	//if yes, proceed to suspend
	if(r ==true){
		var datastring="dl_id="+dl_id;
		kSend('users/act_users.php',datastring,id);
	}
}

function edit_acc(dl_id){
	   var datastring="dl_id="+dl_id;
		kSend('users/edit_users.php',datastring,'main_cont');
}

function update_profile(dl_id){
    var fullname=$('#fullname').val();
    var mobile_numb=$('#mobile_numb').val();
    var email_id=$('#email_id').val();
	var datastring="dl_id="+dl_id+"&fullname="+fullname+"&mobile_numb="+mobile_numb+"&email_id="+email_id;
	kSend('users/update_users.php',datastring,'error');
}

function update_price(){
    var unlock_price=$('#unlock_price').val();
    var imei_price=$('#imei_price').val();
	var datastring="unlock_price="+unlock_price+"&imei_price="+imei_price;
	kSend('settings/set_.php',datastring,'error');
}

function view_order_dtls(order_id,type){
	 $('#fader').show();
     $('#wrapper').fadeIn(800);
	 var datastring="order_id="+order_id+"&type="+type;
	 kSend('orders/view_order_dtls.php',datastring,'wrapper');
}

function view_order_dtls_(order_id,type){
	 $('#fader').show();
     $('#wrapper').fadeIn(800);
	 var datastring="order_id="+order_id+"&type="+type;
	 kSend('order/view_order_dtls.php',datastring,'wrapper');
}

function search_wallet(){
		var search=$('#search_wallet').val();
		var datastring="search="+search;
		kSend('wallets/search_wallets.php',datastring,'main_cont');
}

function fund_hist(dl_id){
	 $('#fader').show();
     $('#wrapper').fadeIn(800);
	 var datastring="dl_id="+dl_id;
	 kSend('wallets/fund_hist.php',datastring,'wrapper');
}


function fund_wallet_admin(dl_id){
	 $('#fader').show();
     $('#wrapper').fadeIn(800);
	 var datastring="dl_id="+dl_id;
	 kSend('wallets/fund_wallet.php',datastring,'wrapper');
}
function fund_wallet_admin2(action,dl_id,email_id){
	var amt=$('#amt').val();
	var err="";
    //validate user input
    if(amt == ''){
        err += 'supply an amount<br>';
    }
    if(err != ""){
		document.all.error.innerHTML=err;
        $('#error').css("color","red");
        $('#error').show();
	}else if(err == "") {
		$('#error').css("color","green");
		document.all.error.innerHTML=err;
		var datastring="?action="+action+"&dl_id="+dl_id+"&amt="+amt;
		$.get("../u/switch.php"+datastring, function(data){
				document.all.error.innerHTML="<b>wallet funded successfully.</b>";
			});
	
	}
}


function view_orders(dl_id){
	 $('#fader').show();
     $('#wrapper').fadeIn(800);
	 var datastring="dl_id="+dl_id;
	 kSend('users/view_orders.php',datastring,'wrapper');
}

function close_(){
    $('#fader').hide();
    $('#wrapper').fadeOut(800);
    //alert("Oops, operation aborted");
}
/*admin functions end*/
