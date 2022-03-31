$(document).ready(function(){
    $(".delete-anchor-nn").click(function(e){
        e.preventDefault();
       var contact_id = $(this).data("id");
       var status = confirm("Are you sure?");
       if(status == true){
        $.ajax({
                    type: "POST", 
                    url: 'delete.php', 
                    data: {contact_id:contact_id},
                    success: function (response) {
                    $("#customers").html(response); 
                    }
        });
       }
       
    });
  
});

