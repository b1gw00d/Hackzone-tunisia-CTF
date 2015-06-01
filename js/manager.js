$(document).ready(function(){
    $('#signup').submit(function(){
 
        //setup variables
        var form = $(this),
        formData = form.serialize(),
        formUrl = form.attr('action'),
        formMethod = form.attr('method'), 
        responseMsg = $('#signup_response')
		var button_submit=$('#signup-button')
		button_submit.html('<img src="http://upload.wikimedia.org/wikipedia/commons/4/42/Loading.gif"> Please wait...');
        //send data to server
        $.ajax({
            url: formUrl,
            type: formMethod,
            data: formData,
            dataType: 'json',
            success:function(json){
				if(json=="login")
    			  location.href = "index.php";
    			else{
				responseMsg.html(json);
				document.getElementById('div_signup_response').style.display="block";
				button_submit.html('Sign Up');}
              }
        });
 
        //prevent form from submitting
        return false;
    });
});


$(document).ready(function(){
    $('#login').submit(function(){
 
        //setup variables
        var form = $(this),
        formData = form.serialize(),
        formUrl = form.attr('action'),
        formMethod = form.attr('method'), 
        responseMsg = $('#login_response')
		var button_submit=$('#login-button')
		button_submit.html('<img src="http://upload.wikimedia.org/wikipedia/commons/4/42/Loading.gif"> Please wait...');
        //send data to server
        $.ajax({
            url: formUrl,
            type: formMethod,
            data: formData,
            dataType: 'json',
            success:function(json){
				if(json=="login")
    			  location.href = "index.php";
    			else{
					if(json!="success"){
					responseMsg.html(json);
					button_submit.html('LogIn')
					document.getElementById('div_login_response').style.display="block";}
					else  window.location.replace("challenges.php");
				}
              }
        });
 
        //prevent form from submitting
        return false;
    });
});


$(document).ready(function(){
    $('#init').submit(function(){
 
        //setup variables
        var form = $(this),
        formData = form.serialize(),
        formUrl = form.attr('action'),
        formMethod = form.attr('method'), 
        responseMsg = $('#init_response')
		var button_submit=$('#init_button')
		button_submit.html('<img src="http://upload.wikimedia.org/wikipedia/commons/4/42/Loading.gif"> Please wait...');
        //send data to server
        $.ajax({
            url: formUrl,
            type: formMethod,
            data: formData,
            dataType: 'json',
            success:function(json){
				if(json=="login")
    				location.href = "index.php";
    			else{
				responseMsg.html(json);
				document.getElementById('div_init_response').style.display="block";
				button_submit.html('Find');}
              }
        });
 
        //prevent form from submitting
        return false;
    });
});

$(document).ready(function(){
    $('#reset').submit(function(){
 
        //setup variables
        var form = $(this),
        formData = form.serialize(),
        formUrl = form.attr('action'),
        formMethod = form.attr('method'), 
        responseMsg = $('#reset_response')
		var button_submit=$('#reset_button')
		button_submit.html('<img src="http://upload.wikimedia.org/wikipedia/commons/4/42/Loading.gif"> Please wait...');
		
        //send data to server
        $.ajax({
            url: formUrl,
            type: formMethod,
            data: formData,
            dataType: 'json',
            success:function(json){
				if(json=="login")
    				location.href = "index.php";
    			else{
				responseMsg.html(json);
				document.getElementById('div_init_response').style.display="block";
				button_submit.html('Reset');}
              }
        });
 
        //prevent form from submitting
        return false;
    });
});
$(document).ready(function(){
    $('#activate').submit(function(){
 
        //setup variables
        var form = $(this),
        formData = form.serialize(),
        formUrl = form.attr('action'),
        formMethod = form.attr('method'), 
        responseMsg = $('#activate_response')
		var button_submit=$('#activate_button')
		button_submit.html('<img src="http://upload.wikimedia.org/wikipedia/commons/4/42/Loading.gif"> Please wait...');
        //send data to server
        $.ajax({
            url: formUrl,
            type: formMethod,
            data: formData,
            dataType: 'json',
            success:function(json){
				if(json=="login")
    				location.href = "index.php";
    			else{
				responseMsg.html(json);
				document.getElementById('div_activate_response').style.display="block";
				button_submit.html('Activate');}
              }
        });
 
        //prevent form from submitting
        return false;
    });
});

