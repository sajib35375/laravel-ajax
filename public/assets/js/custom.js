(function ($){
    $(document).ready(function (){

    $('a#modal_show').click(function (e){
        e.preventDefault();
        $('#add_stu_modal').modal('show');
    });

    $(document).on('submit','form#stu_add_form',function (e){
        e.preventDefault();
        let name = $('form#stu_add_form input[name="name"]').val();
        let email = $('form#stu_add_form input[name="email"]').val();
        let cell = $('form#stu_add_form input[name="cell"]').val();
        let username = $('form#stu_add_form input[name="username"]').val();

        let email_check = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (name=='' || email=='' || cell=='' || username==''){
          $('.msg').html('<p class="alert alert-danger">All fields are required <button class="close" data-dismiss="alert">&times;</button></p>');
        }else if (email_check.test(email)==false){
            $('.msg').html('<p class="alert alert-danger">Invalid email address <button class="close" data-dismiss="alert">&times;</button></p>');
        }else {
            $.ajax({
                url : 'student/store',
                method : "POST",
                data : new FormData(this),
                contentType : false,
                processData : false,
                success : function (data){
                    allStudent();
                    $('form#stu_add_form')[0].reset();
                    $('.msg').html('<p class="alert alert-success">data insert successfully <button class="close" data-dismiss="alert">&times;</button></p>');
                }
            })
        }

    });

    // student show
        allStudent();
    function allStudent(){
        $.ajax({
           url : 'student/all',
           success : function (data){
              $('tbody#all_student').html(data);
           }
        });
    }
    $(document).on('click','a#student_view',function (e){
        e.preventDefault();
        $('#view_stu_modal').modal('show');
        let user_id = $(this).attr('view_id')

        $.ajax({
           url : 'student/show/' + user_id,
           // method : "POST",
           // data : { id : user_id },
            success : function (data){
                $('.profile img#image').attr('src','assets/media/img/'+data.photo);
                $('.profile h2').html(data.name);
                $('.profile table td#name').html(data.name);
                $('.profile table td#email').html(data.email);
                $('.profile table td#cell').html(data.cell);
                $('.profile table td#username').html(data.username);

            }


        });




    });

        $(document).on('click','a#student_delete',function (e){
            e.preventDefault();
            let delete_id = $(this).attr('del_id');

            $.ajax({
                url : 'student/delete/'+delete_id,
                success : function (data){
                    $('.del_msg').html('<p class="alert alert-success">data deleted successfully <button class="close" data-dismiss="alert">&times;</button></p>');
                    allStudent();
                }
            })
        });

        $(document).on('click','a#student_edit',function (e){
            e.preventDefault();

            let user_id = $(this).attr('edit_id');

            $.ajax({
               url : 'student/edit/'+user_id,
                // method: "POST",
                // data: { id:user_id },
               success : function (data){
                   $('#edit_stu_modal').modal('show');
                   $('form#stu_edit_form input[name="name"]').val(data.name);
                   $('form#stu_edit_form input[name="email"]').val(data.email);
                   $('form#stu_edit_form input[name="cell"]').val(data.cell);
                   $('form#stu_edit_form input[name="username"]').val(data.username);
                   $('form#stu_edit_form img#img').attr('src','assets/media/img/'+data.photo);


               }
            })

        });
        // $(document).on('submit','#stu_edit_form',function (e){
        //     e.preventDefault();
        //     let update_id = $(this).attr('edit_id');
        //     $.ajax({
        //        url : 'student/update/'+ update_id,
        //         success : function (data){
        //            $('.msg').html('data update successfuly');
        //         }
        //     });
        // });






    });
})(jQuery)
