<!-- latest jquery-->
<script src="/user/assets/js/jquery-3.5.1.min.js"></script>
<!-- feather icon js-->
<script src="/user/assets/js/icons/feather-icon/feather.min.js"></script>
<script src="/user/assets/js/icons/feather-icon/feather-icon.js"></script>
<!-- Sidebar jquery-->
<script src="/user/assets/js/sidebar-menu.js"></script>
<script src="/user/assets/js/config.js"></script>
<!-- Bootstrap js-->
<script src="/user/assets/js/bootstrap/popper.min.js"></script>
<script src="/user/assets/js/bootstrap/bootstrap.min.js"></script>
<!-- Plugins JS start-->
<script src="/user/assets/js/editor/ckeditor/ckeditor.js"></script>
<script src="/user/assets/js/editor/ckeditor/adapters/jquery.js"></script>
<script src="/user/assets/js/dropzone/dropzone.js"></script>
<script src="/user/assets/js/dropzone/dropzone-script.js"></script>
<script src="/user/assets/js/select2/select2.full.min.js"></script>
<script src="/user/assets/js/select2/select2-custom.js"></script>
<script src="/user/assets/js/email-app.js"></script>
<script src="/user/assets/js/form-validation-custom.js"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="/user/assets/js/script.js"></script>
<script src="/user/assets/js/theme-customizer/customizer.js"></script>
<!-- login js-->
<!-- Plugin used-->
<script src="/user/assets/js/notify/index.js"></script>
<script src="/user/assets/js/notify/bootstrap-notify.min.js"></script>
</body>

</html>
<script>$(".custom-scrollbar .link-nav").removeClass('active');</script>
<script>
    function Click(id){ document.getElementById(id).click(); }
    function Filter_Box_Toggle(){
        var visi =  $(".filter_Box").attr('visibility');
        if(visi == 0){
            $("#filter_button").html(' ').append(`<i aria-hidden="true" class="fa fa-times-circle fa-2x"></i>`);
            $(".filter_Box").show(300).attr('visibility',1);
        }else{
            $("#filter_button").html(' ').append(`<i aria-hidden="true" class="fa fa-filter fa-2x"></i>`);
            $(".filter_Box").hide(300).attr('visibility',0);
        }
    }

    function Notification(Content,Task,Theme){
        var notify = $.notify(
        '<i class="fa fa-check"></i><strong>'+Content+'</strong> '+Task, {
            type: Theme,
            allow_dismiss: true,
            delay: 2000,
            showProgressbar: true,
            timer: 2000,
        });
    }
    Chat_Notification();
    setInterval(Chat_Notification, 10000);
    function Chat_Notification(){
        $.ajax({
            method: "GET",
            url: '/User/Chat/Notification',
        }).done(function(response) {
            if (response.error == true) {
                location.assign("/user/login");
            }else{
                $("#chat_notification").html('').append(response);
            }
        });
    }
</script>
