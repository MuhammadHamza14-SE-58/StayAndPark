$(function(){

    $("form").on("submit",function(e){
e.preventDefault();
        $.ajax({
            url:"/login",
            type:"get",
            data:{app_username:"hamza",app_password:"password",email:$("#email").val(),password:$("#password").val()},
            success:function(data){

                // if(data.code==200){

                    alert(data.message);
                // }else{
                //     alert("something went wrong ");

                // }
            }

        });

    })

})