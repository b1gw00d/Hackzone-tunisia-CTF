function del(id){
	$.ajax({
    				url: 'delete.php',
    				type: 'POST',
    				data:'id='+id,
    				dataType: 'json',
    				success: function(json) {
    					if(json=="login")
    						alert('login Plz') ;
    					else {
    						if(json!=0)
    						$('#deleteid'+id).html("");
    						

    					}
    					}
				});
}	

function del_user(id){
    $.ajax({
                    url: 'manageruser.php',
                    type: 'POST',
                    data:'id_delet='+id,
                    dataType: 'json',
                    success: function(json) {
                        if(json=="login")
                            alert('login Plz') ;
                        else {
                            if(json=="4")
                            //$('#deleteuser'+id).html("");
                            //user_delete_button.html('User deleted');
                            location.href = "admin.php";

                        }
                        }
                });
}
function status(id){
    $.ajax({
                    url: 'status.php',
                    type: 'POST',
                    data:'status='+id,
                    dataType: 'json',
                    success: function(json) {
                        if(json=="login")
                            alert('login Plz') ;
                        else {
                            if(json=="1")
                            location.href = "admin.php";

                        }
                        }
                });
}   
function sig(id){
    $.ajax({
                    url: 'status.php',
                    type: 'POST',
                    data:'signup='+id,
                    dataType: 'json',
                    success: function(json) {
                        if(json=="login")
                            alert('login Plz') ;
                        else {
                            if(json=="1")
                            location.href = "admin.php";

                        }
                        }
                });
} 
$('document').ready(function(){ 
$('#update_button').click(function(){
        $('#update_button').html('<img src="http://upload.wikimedia.org/wikipedia/commons/4/42/Loading.gif"> Please wait...');
            });
$('#add_button').click(function(){
        $('#add_button').html('<img src="http://upload.wikimedia.org/wikipedia/commons/4/42/Loading.gif"> Please wait...');
            });
 });