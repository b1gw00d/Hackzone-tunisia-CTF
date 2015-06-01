var task ;
function openflag(id){
                document.getElementById('answer').disabled = false
				$.ajax({
    				url: 'taskinfo.php',
    				type: 'POST',
    				data:'id_task='+id,
    				dataType: 'json',
    				success: function(json) {
                         task = document.getElementById('task'+id) 
    				    if(json.reponse=="login")
    						alert('login Plz') ;
                        else if (json.reponse=="Game Is Over" || json.reponse=="Hackzone Not Yet Started" ) {
                            $('#flag_response').html(json.reponse);
                            document.getElementById('div_flag_response').style.display="block";

                        }
    					else if (json.reponse==1) {
    						$('#taskname').html(json.surname);
                            $('#taskscore').html("Score:"+json.score);
                            $('#taskmiss').html("Task:<br>"+json.miss);
                            $('#taskhint').html("Hint: "+json.hint);
    						$('#taskid').val(id);
                            $('#btn_flag').html('Submit');
                            $('#flag_response').html("");
                            document.getElementById('div_flag_response').style.display="none"
                            $('#answer').val("");
                            if(json.solv==1)
                              document.getElementById('answer').disabled = true;
                        }
    				}
    				
				});
			}

$(document).ready(function(){
    $('#form_flag').submit(function(id){
 
        //setup variables
        var form = $(this),
        formData = form.serialize(),
        formUrl = form.attr('action'),
        formMethod = form.attr('method')
        responseMsg = $('#flag_response')
		var button_submit=$('#btn_flag')
		button_submit.html('<img src="http://upload.wikimedia.org/wikipedia/commons/4/42/Loading.gif"> Please wait...');

        responseMsg.html("");
        document.getElementById('div_flag_response').style.display="none";
        var rep 
        $.ajax({
            url: formUrl,
            type: formMethod,
            data: formData,
            dataType: 'json',
            success:function(json){
                if(json.reponse=="login")
                  location.href = "index.php";
                else{
                 if(json.solv==1){
                    task.style.backgroundColor="#008000";}
                    responseMsg.html(json.reponse);
                    document.getElementById('div_flag_response').style.display="block";
                    button_submit.html('Submit');}
            }

              
        });
 
        return false;
    });
});
