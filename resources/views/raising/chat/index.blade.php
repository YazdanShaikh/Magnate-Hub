@include('raising.attachments.header')
<link href="/emoji/lib/css/emoji.css" rel="stylesheet">

<style>
    .emoji-menu{
        bottom: 50px;
        width: 500px;
        right: auto !important;
        left: 0px !important;
    }

    .fa-smile-o{
        color: rgb(255, 255, 255) !important;
        font-size: 30px !important;
    }
    .chat-box .chat-right-aside .chat .chat-message .text-box i {
        left: 0px !important;
        top: 0px !important;
        width: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 50px;
        background: #5f25d4 !important;
    }
    .chat-box .chat-right-aside .chat .chat-message .text-box .input-txt-bx{
        padding-left: 60px !important;
        font-size: 20px; !important
    }
    @media (max-width: 1199px) {
        .emoji-menu{
            width: 100%;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card py-2 px-3 mb-3">
                <div class="row pt-2 pb-2 align-items-center">
                    <div class="col-8">
                        <h4 class="page-title mb-0">Chats</h4>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-end">

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col call-chat-sidebar">
                    <div class="card">
                        <div class="card-body chat-body">
                            <div class="chat-box">
                                <!-- Chat left side Start-->
                                <div class="chat-left-aside">
                                    <div class="media">
                                        @if(session()->get("profile") == null)
                                            <img class="rounded-circle user-image" src="/user/assets/profile.png" alt="">
                                        @else
                                            <img class="rounded-circle user-image" src="{{ asset('/uploads/raising/profile/' . session()->get("profile")) }}" style="object-fit: cover;">
                                        @endif
                                        <div class="media-body">
                                            <div class="about">
                                                <div class="name f-w-600">{{ session()->get("name") }}</div>
                                                <div class="status">{{ session()->get("email") }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="people-list" id="people-list">
                                        <div class="search">
                                            <form class="theme-form">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" id="project_search" placeholder="Search"><i class="fa fa-search"></i>
                                                </div>
                                            </form>
                                        </div>
                                        <ul class="list custom-scrollbar">

                                            {{-- <li class="clearfix">
                                                <div class="media"><img class="rounded-circle user-image" src="/user/assets/images/user/1.jpg" alt="">
                                                    <div class="status-circle away"></div>
                                                    <div class="media-body">
                                                        <div class="about">
                                                            <div class="name">Vincent Porter</div>
                                                            <div class="status">Digital Elliptical</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li> --}}

                                        </ul>
                                    </div>
                                </div>
                                <!-- Chat left side Ends-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col call-chat-body">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="row chat-box">
                                <!-- Chat right side start-->
                                <div class="col chat-right-aside">
                                    <!-- chat start-->
                                    <div class="chat">
                                        <!-- chat-header start-->
                                        <div class="media chat-header clearfix">
                                            <img class="rounded-circle" id="user_profile" src="/user/assets/profile.png"  id="card" style="width : 50px; height : 50px; object-fit : cover;">
                                            <div class="media-body">
                                                <div class="about">
                                                    <div class="name" id="project"></div>
                                                    <div class="status digits"><a href="#" id="raising_name"></a></div>
                                                </div>
                                            </div>
                                            <ul class="list-inline float-start float-sm-end chat-menu-icons">
                                                <li class="list-inline-item d-flex align-items-center">
                                                    <input type="text" class="form-control" style="display: none;" placeholder="Search..." id="Search_Chat" visibility="0">
                                                    <a href="javascript:void(0)" class="mx-3">
                                                        <i class="icon-search" onclick="Search_Toggle()"></i>
                                                        <i class="icon-close" style="display: none;" onclick="Search_Toggle()"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- chat-header end-->
                                        <div class="chat-history chat-msg-box custom-scrollbar">

                                            <ul id="Chat">
                                                <div class="row" id="chat_start_img">
                                                    <div class="col-12 text-center">
                                                        <img style="height:500px; object-fit:contain;" src="/raising/assets/chat.png">
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                        <!-- end chat-history-->
                                        <div class="chat-message clearfix">
                                            <div class="row">
                                                <form onsubmit="Insert(event)">
                                                    <div class="col-xl-12 d-flex">
                                                        <div class="input-group text-box lead emoji-picker-container">
                                                            <input class="form-control input-txt-bx" name="message" id="message" type="text" placeholder="Type a message......" data-emojiable="true">
                                                        </div>
                                                        <button class="btn btn-primary Send_Button" disabled>Send</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- end chat-message-->
                                        <!-- chat end-->
                                        <!-- Chat right side ends-->
                                    </div>
                                </div>
                                <div class="col chat-menu">
                                    <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" id="info-home-tab" data-bs-toggle="tab" href="#info-home" role="tab" aria-selected="true">CALL</a>
                                            <div class="material-border"></div>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" id="profile-info-tab" data-bs-toggle="tab" href="#info-profile" role="tab" aria-selected="false">STATUS</a>
                                            <div class="material-border"></div>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" id="contact-info-tab" data-bs-toggle="tab" href="#info-contact" role="tab" aria-selected="false">PROFILE</a>
                                            <div class="material-border"></div>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="info-tabContent">
                                        <div class="tab-pane fade show active" id="info-home" role="tabpanel" aria-labelledby="info-home-tab">
                                            <div class="people-list">
                                                <ul class="list digits custom-scrollbar">
                                                    <li class="clearfix">
                                                        <div class="media"><img class="rounded-circle user-image" src="/user/assets/images/user/4.jpg" alt="">
                                                            <div class="media-body">
                                                                <div class="about">
                                                                    <div class="name">Erica Hughes</div>
                                                                    <div class="status"><i class="fa fa-share font-success"></i>  5 May, 4:40 PM</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="media"><img class="rounded-circle user-image mt-0" src="/user/assets/images/user/1.jpg" alt="">
                                                            <div class="media-body">
                                                                <div class="about">
                                                                    <div class="name">Vincent Porter
                                                                        <div class="status"><i class="fa fa-reply font-danger"></i>  5 May, 5:30 PM</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="media"><img class="rounded-circle user-image" src="/user/assets/images/user/8.jpg" alt="">
                                                            <div class="media-body">
                                                                <div class="about">
                                                                    <div class="name">Kori Thomas</div>
                                                                    <div class="status"><i class="fa fa-share font-success"></i>  1 Feb, 6:56 PM</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="media"><img class="rounded-circle user-image" src="/user/assets/images/user/2.png" alt="">
                                                            <div class="media-body">
                                                                <div class="about">
                                                                    <div class="name">Aiden Chavez</div>
                                                                    <div class="status"><i class="fa fa-reply font-danger"></i>  3 June, 1:22 PM</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="media"><img class="rounded-circle user-image" src="/user/assets/images/user/4.jpg" alt="">
                                                            <div class="media-body">
                                                                <div class="about">
                                                                    <div class="name">Erica Hughes</div>
                                                                    <div class="status"><i class="fa fa-share font-success"></i>  5 May, 4:40 PM</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="media"><img class="rounded-circle user-image mt-0" src="/user/assets/images/user/1.jpg" alt="">
                                                            <div class="media-body">
                                                                <div class="about">
                                                                    <div class="name">Vincent Porter</div>
                                                                    <div class="status"><i class="fa fa-share font-success"></i>  5 May, 5:30 PM</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="media"><img class="rounded-circle user-image" src="/user/assets/images/user/8.jpg" alt="">
                                                            <div class="media-body">
                                                                <div class="about">
                                                                    <div class="name">Kori Thomas</div>
                                                                    <div class="status"><i class="fa fa-reply font-danger"></i>   1 Feb, 6:56 PM</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="media"><img class="rounded-circle user-image" src="/user/assets/images/user/4.jpg" alt="">
                                                            <div class="media-body">
                                                                <div class="about">
                                                                    <div class="name">Erica Hughes</div>
                                                                    <div class="status"><i class="fa fa-share font-success"></i>  5 May, 4:40 PM</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="info-profile" role="tabpanel" aria-labelledby="profile-info-tab">
                                            <div class="people-list">
                                                <div class="search">
                                                    <form class="theme-form">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text" placeholder="Write Status..."><i class="fa fa-pencil"></i>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="status">
                                                <p class="font-primary f-w-600">Active</p>
                                                <hr>
                                                <p>
                                                    Established fact that a reader will be distracted  <i class="icofont icofont-emo-heart-eyes font-danger f-20"></i><i class="icofont icofont-emo-heart-eyes font-danger f-20 m-l-5"></i>
                                                </p>
                                                <hr>
                                                <p>Dolore magna aliqua  <i class="icofont icofont-emo-rolling-eyes font-success f-20"></i></p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="info-contact" role="tabpanel" aria-labelledby="contact-info-tab">
                                            <div class="user-profile">
                                                <div class="image">
                                                    <div class="avatar text-center"><img alt="" src="/user/assets/images/user/2.png"></div>
                                                    <div class="icon-wrapper"><i class="icofont icofont-pencil-alt-5"></i></div>
                                                </div>
                                                <div class="user-content text-center">
                                                    <h5 class="text-uppercase">mark jenco</h5>
                                                    <div class="social-list">
                                                        <ul>
                                                            <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                                                            <li><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li>
                                                            <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                                                            <li><a href="javascript:void(0)"><i class="fa fa-instagram"></i></a></li>
                                                            <li><a href="javascript:void(0)"><i class="fa fa-rss"> </i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="follow text-center">
                                                        <div class="row">
                                                            <div class="col border-right"><span>Following</span>
                                                                <div class="follow-num">236k</div>
                                                            </div>
                                                            <div class="col"><span>Follower</span>
                                                                <div class="follow-num">3691k </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center digits">
                                                        <p>Mark.jecno23@gmail.com</p>
                                                        <p>+91 365 - 658 - 1236</p>
                                                        <p>Fax: 123-4560</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<input type="hidden" id="message_count" value="0">
<input type="hidden" id="project_id" value="0">
<input type="hidden" id="user_id" value="0">
@csrf
@include('raising.attachments.footer')
{{-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> --}}
<!-- Begin emoji-picker JavaScript -->
<script src="/emoji/lib/js/config.min.js"></script>
<script src="/emoji/lib/js/util.min.js"></script>
<script src="/emoji/lib/js/jquery.emojiarea.min.js"></script>
<script src="/emoji/lib/js/emoji-picker.min.js"></script>

<script>
    $(function() {
        window.emojiPicker = new EmojiPicker({
        emojiable_selector: '[data-emojiable=true]',
        assetsPath: '/emoji/lib/img/',
        popupButtonClasses: 'fa fa-smile-o'
        });
        window.emojiPicker.discover();
    });
</script>
<script>
    List();
    setInterval(List, 30000);
    function Insert(event){
        event.preventDefault();
        if ($("#message").val() == '') {
            Notification('Warning','Message Is Null','danger');
        }else{
            $("#message_count").val(parseInt($("#message_count").val()) + 1);
            var fd = new FormData();
            fd.append('_token', $("input[name=_token]").val());
            fd.append('message', $("#message").val());
            fd.append('project_id', $("#project_id").val());
            fd.append('user_id', $("#user_id").val());
            $.ajax({
                method: "POST",
                url: '/Raising/Chat/Insert',
                processData: false,
                contentType: false,
                data: fd,
                beforeSend: function() {
                    $("#message").val(null);
                    $(".emoji-wysiwyg-editor img").remove();
                    $(".emoji-wysiwyg-editor").text('');
                    $(".Send_Button").attr('disabled','disabled');
                },
            }).done(function(response) {
                if (response.error == true) {
                    location.assign("/dashboard/login");
                }else{
                    View_Chat($("#project_id").val(),$("#user_id").val());
                    $(".Send_Button").removeAttr('disabled');
                }
            });
        }
    }

    function List(){
        var fd = new FormData();
        fd.append('_token', $("input[name=_token]").val());
        $.ajax({
            method: "POST",
            url: '/Raising/Chat/List',
            processData: false,
            contentType: false,
            data: fd
        }).done(function(response) {
            if (response.error == true) {
                location.assign("/dashboard/login");
            }else{
                $(".list").html('').append(response);
                var project_id = '<?php echo $project_id ?>';
                var user_id = '<?php echo $user_id ?>';
                if (project_id != 0 && user_id != 0) {
                    View_Chat(project_id,user_id);
                }
            }
        });
    }
    setInterval(Check_Chat, 5000);
    function Check_Chat(){
        if ($("#project_id").val() != 0) {
            var fd = new FormData();
            fd.append('_token', $("input[name=_token]").val());
            fd.append('project_id', $("#project_id").val());
            fd.append('user_id', $("#user_id").val());
            $.ajax({
                method: "POST",
                url: '/Raising/Chat/Check',
                processData: false,
                contentType: false,
                data: fd
            }).done(function(response) {
                if (response.error == true) {
                    location.assign("/dashboard/login");
                }else{
                    if (response.Chat > $("#message_count").val()) { $(".chat-history .down_arrow").remove();
                        var take = response.Chat - parseInt($("#message_count").val());
                        $("#message_count").val(response.Chat);
                        if ($("#message_count").val() > 8) {
                            $(".chat-history").append(`<div class="down_arrow">
                                <div class="child_down" onclick="Scroll_Down()">
                                    <i class="fa fa-arrow-down"></i>
                                </div>
                            </div>`);
                        }
                        Get_UnRead_Chat(take);
                    }

                    
                }
            });
        }
    }

    function Scroll_Down(){
        $(".chat-history").scrollTop($(".chat-history").height() * 100);
        $(".chat-history .down_arrow").remove();
    }

    $(function() {
        var div = $('.chat-history').offset().top;
        $('.chat-history').scroll(function() {
            var scrollTop = $(this).scrollTop();
            $('.chat-history').each(function(){
                if (scrollTop >= div) {
                    $(".chat-history .down_arrow").remove();
                    //$("a.btn:first-child").remove();
                }
            });
        });
    });

    function Get_UnRead_Chat(take){
        var fd = new FormData();
        fd.append('_token', $("input[name=_token]").val());
        fd.append('project_id', $("#project_id").val());
        fd.append('user_id', $("#user_id").val());
        fd.append('take', take);
        $.ajax({
            method: "POST",
            url: '/Raising/Chat/UnRead',
            processData: false,
            contentType: false,
            data: fd

        }).done(function(response) {
            if (response.error == true) {
                location.assign("/dashboard/login");
            }else{
                if ($("#message_count").val() == 2){ $("#Chat").html(''); }
                $("#Chat").append(response);
                if ($("#message_count").val() <= 8) {
                    $(".chat-history").scrollTop($(".chat-history").height() * 100);
                }
                
            }
        });
    }


</script>
<script>
    function Search_Toggle(){
        if ($("#Search_Chat").attr('visibility') == 0) {
            $("#Search_Chat").show(300);
            $(".icon-search").hide(300);
            $(".icon-close").show(300);
            $("#Search_Chat").attr('visibility',1);
        }else{
            $(".icon-close").hide(300);
            $(".icon-search").show(300);
            $("#Search_Chat").hide(300);
            $("#Search_Chat").attr('visibility',0);
            $("#Search_Chat").val(null).keyup();
        }
    }
    $("#Search_Chat").keyup(function () {
        var value = this.value.toLowerCase().trim();
        $("#Chat .message").each(function (index) {
            if (!index) return;
            $(this).find(".message_span").each(function () {
                var id = $(this).text().toLowerCase().trim();
                var not_found = (id.indexOf(value) == -1);
                $(this).closest('#Chat .message').toggle(!not_found);
                return not_found;
            });
        });
    });

    $("#project_search").keyup(function () {
        var value = this.value.toLowerCase().trim();
        $(".Project_List").each(function (index) {
            if (!index) return;
            $(this).find(".project_name").each(function () {
                var id = $(this).text().toLowerCase().trim();
                var not_found = (id.indexOf(value) == -1);
                $(this).closest('.Project_List').toggle(!not_found);
                return not_found;
            });
        });
    });
</script>
