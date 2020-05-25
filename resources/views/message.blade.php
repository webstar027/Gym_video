@extends('layouts.app')
@section('content')
<link href="{{ asset('css/message.css') }}" rel="stylesheet">
<input type="hidden" name="userId" id="userId" value="{{ $user->id }}">


</style>
<section class="bg-trans">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="gym-name-stats mb-3">
                    <nav class="nav nav-pills">
                        <a class="nav-link rounded-0 border border-primary"  href="{{ route('student_account') }}" aria-selected="true">Subscriptions</a>
                        <a class="nav-link rounded-0 border border-primary active"  href="{{ route('message') }}">Messages<span class="badge badge-danger ml-2 p-1" id="totalUnread">{{ $totalUnread==0?"":$totalUnread }}</span></a>
                        <a class="nav-link rounded-0 border border-primary"  href="{{ route('student_details') }}">Account Details</a>
                        <a class="nav-link rounded-0 border border-primary" href="#">Favorite Videos</a>
                    </nav>
                </div>
                <div class="message" id="message">
                    <p><a href="{{ route('student_account') }}">My Account</a> <i class="fas fa-angle-right"></i> Messages</p>
                    <h2 class="page-sub-title">Messages</h2>
                    <div class="meesage-container">
                        {{-- <button class="btn btn-primary btn-md mb-2" id="btn_new_meesage">New Message</button>
                        <div class="row d-none mb-2" id="search-box">
                            <div class=" col-xs-12 col-sm-6 ">
                                <input type="text" class="form-control" name="search_user" id="search-user-input"  placeholder="Search by Member Name" />
                                <div class="search-result">
                                    <div class="loading"></div>
                                    <ul class="list-group" id="search_result">
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6"><button class="btn btn-success btn-md" id="btn_start_message">Start Messaging</button></div> --}}
                        </div>
                        <div class="messaging mt-2">
                            @csrf
                            <div class="inbox_msg">
                                <div class="inbox_people">
                                    <div class="headind_srch">
                                        <div class="recent_heading"><h4>Recent</h4></div>
                                        <div class="srch_bar">
                                            <div class="stylish-input-group">
                                                <input type="text" class="search-bar" placeholder="Search" id="search-user-input">
                                                <span class="input-group-addon">
                                                    <button type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                                </span>
                                            </div>
                                            <div class="search-result">
                                                <div class="loading"></div>
                                                <ul class="list-group" id="search_result">
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inbox_chat">
                                        @foreach ($userHistory as $key=>$one )
                                        <div class='chat_list'  data-id="{{ $one['id'] }}" id="chat_list_{{ $one['id'] }}">
                                            <div class="chat_people">
                                                <div class="chat_img">
                                                    <img src="https://ptetutorials.com/images/user-profile.png">
                                                </div>
                                                <div class="chat_ib">
                                                    <h5>{{ ucfirst($one['first_name']) }} {{ ucfirst($one['last_name']) }}
                                                        <span class="unread">{{ $userHistory[$key]['unread']!=0?"(".$userHistory[$key]['unread'].")":"" }}</span>
                                                    </h5>
                                                    <p>{{ $one['lastUpdate'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mesgs">
                                    <div class="msg_history" id="msg_history">
                                        
                                    </div>
                                    <div class="type_msg">
                                        <div class="input_msg_write">
                                            <div contenteditable="true" class="write_msg" placeholder="Type a Message">
                                                <span class="placeholder">Type a message</span>
                                            </div>
                                            <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>

        </div><!-- //.row -->

    </div><!-- //.container -->
</section>

<script>
    jQuery(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('[name=_token]').val()
            }
        });

        $("#btn_new_meesage").on("click", function(){
            $("#search-box").removeClass("d-none");
        })

        $("#btn_start_message").on("click", function(){
            $("#search-box").addClass("d-none");
        })

        $(".chat_list").on("click", function(){
            $(this).parents(".inbox_chat").find(".active_chat").removeClass("active_chat");
            $(this).addClass("active_chat");
            var clientId = $(this).data("id");
            $.get("/message/get_history/{{ $user->id}}/"+clientId, function(res){
                const history = res.history;
                const userId = $("#userId").val();
                $(".msg_history").html("");
                history.forEach(function(element, index){
                    if(element.sender == userId){
                        var $msg = $('<div class="outgoing_msg"><div class="sent_msg"><p>' + element.msg+ '</p><span class="time_date">'+ element.created_at+'</span></div></div>');
                        $(".msg_history").append($msg).animate({"scrollTop":document.getElementById("msg_history").scrollHeight}, 0);
                    }
                    else{
                        var $msg = $('<div class="incoming_msg"><div class="incoming_msg_img"><img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"></div><div class="received_msg"><div class="received_withd_msg"><p>' + element.msg+ '</p><span class="time_date">' + element.created_at+'</span></div></div></div>');
                        $(".msg_history").append($msg).animate({"scrollTop":document.getElementById("msg_history").scrollHeight}, 0);
                    }
                });
            });
        });

        $("#search-user-input").on("input", function(){
            var value = $(this).val();
            if(value == "") return;
            var userId = $("#userId").val();
            $.get("/message/search/"+userId+"/"+value, function(res){
                $("#search_result").html("");
                res.forEach((element, index)=>{
                    var $li = $("<li class='list-group-item search-item' data-clientId=" + element.id + " data-firstname=" + element.first_name+" data-lastname="+element.last_name+"><img src='https://ptetutorials.com/images/user-profile.png' width='30' > &nbsp; "+ element.first_name+"&nbsp;"+ element.last_name + "</li>");
                    $("#search_result").append($li);
                });
                $(".search-item").unbind("click").on("click", function(){
                    var clientId = $(this).data("clientid");
                    var firstname = $(this).data("firstname");
                    var lastname = $(this).data("lastname");
                    $.get("/message/check_user/"+clientId, function(res){
                        if(!res.check){ //new user
                            var $item = $('<div class="chat_list" data-id='+clientId+' id="chat_list_'+clientId+'"></div>');
                            var $name = $("<h5>" + firstname + " " + lastname +  "<span class='chat_date'></span></h5>");
                            var $chat_ib = $("<div class='chat_ib'></div>");
                            $chat_ib.append($name);
                            var $chat_img = $('<div class="chat_img"><img src="https://ptetutorials.com/images/user-profile.png"></div>');
                            var $chat_people = $("<div class='chat_people'></div>");
                            $chat_people.append($chat_img).append($chat_ib);
                            $item.append($chat_people);
                            $(".inbox_chat").prepend($item);
                            $.ajax({
                                type:"POST",
                                url:"/message/send",
                                dataType:"json",
                                data:{
                                    sender: $("#userId").val(),
                                    receiver: clientId,
                                    msg : "Hi"
                                },
                                success:function(res){
                                    var $msg = $('<div class="outgoing_msg"><div class="sent_msg"><p>' + "Hi" +'</p><span class="time_date">' + res.date + '</span> </div></div>');
                                    $(".msg_history").append($msg).animate({"scrollTop":document.getElementById("msg_history").scrollHeight}, 100);
                                    $(".write_msg").html("");
                                }
                            })
                            $(".chat_list").unbind("click").on("click", function(){
                                $(this).parents(".inbox_chat").find(".active_chat").removeClass("active_chat");
                                $(this).addClass("active_chat");
                                var clientId = $(this).data("id");
                                $.get("/message/get_history/{{ $user->id}}/"+clientId, function(res){
                                    const history = res.history;
                                    const userId = $("#userId").val();
                                    $(".msg_history").html("");
                                    history.forEach(function(element, index){
                                        if(element.sender == userId){
                                            var $msg = $('<div class="outgoing_msg"><div class="sent_msg"><p>' + element.msg+ '</p><span class="time_date">'+ element.created_at+'</span></div></div>');
                                            $(".msg_history").append($msg).animate({"scrollTop":document.getElementById("msg_history").scrollHeight}, 100);
                                        }
                                        else{
                                            var $msg = $('<div class="incoming_msg"><div class="incoming_msg_img"><img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"></div><div class="received_msg"><div class="received_withd_msg"><p>' + element.msg+ '</p><span class="time_date">' + element.created_at+'</span></div></div></div>');
                                            $(".msg_history").append($msg).animate({"scrollTop":document.getElementById("msg_history").scrollHeight}, 100);
                                        }
                                    });
                                });
                            });
                        }
                        $("#chat_list_"+clientId).trigger("click");
                    });
                
                });
            });
            $(".search-result").show();
           
        });
        $(".msg_send_btn").on("click", function(res){
            let msg = $(".write_msg").html();
            if(msg == "") return;
            
            $.ajax({
                type:"POST",
                url:"/message/send",
                dataType:"json",
                data:{
                    sender: $("#userId").val(),
                    receiver: $(".inbox_chat").find(".active_chat").data("id"),
                    msg : msg
                },
                success:function(res){
                    var $msg = $('<div class="outgoing_msg"><div class="sent_msg"><p>' + msg +'</p><span class="time_date">' + res.date + '</span> </div></div>');
                    $(".msg_history").append($msg).animate({"scrollTop":document.getElementById("msg_history").scrollHeight}, 100);
                    $(".write_msg").html("");
                }
            })
           
        });
        $(".write_msg").on("keypress", function(e){
            if(e.keyCode != 13) return;
            else if(e.shiftKey) { return;}
            else{
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                $(".msg_send_btn").trigger("click");
            }
        });
        $(".write_msg").on("focus", function(){
            $(this).find(".placeholder").remove();
        });
        $(".write_msg").on("blur", function(){
            var html = $(this).html().replace(/\s/g, '');
            if( html == ""){ $(this).append($('<span class="placeholder">Type a message</span>')); }
        });
        $(".mesgs").on("click", function(){
            var selected_userId = $(".inbox_chat").find(".active_chat").data("id");
            if(selected_userId == null ) return;
            $.ajax({
                type:"POST",
                dataType:"json",
                url:"/message/read_all",
                data:{
                    clientId : selected_userId
                },
                success:function(res){
                    $(".inbox_chat").find(".active_chat").find(".unread").text("");
                    var count = res.count;
                    if(count == 0) return;
                    var total_unread = parseInt($("#totalUnread").text());
                    if(isNaN(total_unread)) return;
                    var unread = total_unread-count;
                    if(unread < 1) unread = "";
                    $("#totalUnread").text(unread);
                }
            })
        })
        $(document).on("click", function(){
            $(".search-result").hide();
        });

        function realtimeUpdate(){
            var clientId = $(".inbox_chat").find(".active_chat").data("id");
            if(clientId == null ) clientId = 0;
            $.get("/message/get_all_realtime/"+clientId, function(res){
                var userHistory = res.userHistory;
                currentSelectedUserId = $(".inbox_chat").find(".active_chat").data("id");
                $(".inbox_chat").html("");
                userHistory.forEach(function(element){
                    var $item = $('<div class="chat_list '+(currentSelectedUserId == element.id?"active_chat":"")+ '" data-id='+element.id+' id="chat_list_'+element.id+'"></div>');
                    var $name = $("<h5>" + element.first_name + " " + element.last_name +  "<span class='unread'>" + (element.unread==0?"":element.unread)+"</span></h5>");
                    var $chat_ib = $("<div class='chat_ib'></div>");
                    $chat_ib.append($name);
                    var $lastUpdate = $("<p>" + element.lastUpdate+"</p>");
                    $chat_ib.append($lastUpdate); 
                    var $chat_img = $('<div class="chat_img"><img src="https://ptetutorials.com/images/user-profile.png"></div>');
                    var $chat_people = $("<div class='chat_people'></div>");
                    $chat_people.append($chat_img).append($chat_ib);
                    $item.append($chat_people);
                    $(".inbox_chat").prepend($item);
                    $(".chat_list").unbind("click").on("click", function(){
                        $(this).parents(".inbox_chat").find(".active_chat").removeClass("active_chat");
                        $(this).addClass("active_chat");
                        var clientId = $(this).data("id");
                        $.get("/message/get_history/{{ $user->id}}/"+clientId, function(res){
                            const history = res.history;
                            const userId = $("#userId").val();
                            $(".msg_history").html("");
                            history.forEach(function(element, index){
                                if(element.sender == userId){
                                    var $msg = $('<div class="outgoing_msg"><div class="sent_msg"><p>' + element.msg+ '</p><span class="time_date">'+ element.created_at+'</span></div></div>');
                                    $(".msg_history").append($msg).animate({"scrollTop":document.getElementById("msg_history").scrollHeight}, 0);
                                }
                                else{
                                    var $msg = $('<div class="incoming_msg"><div class="incoming_msg_img"><img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"></div><div class="received_msg"><div class="received_withd_msg"><p>' + element.msg+ '</p><span class="time_date">' + element.created_at+'</span></div></div></div>');
                                    $(".msg_history").append($msg).animate({"scrollTop":document.getElementById("msg_history").scrollHeight}, 0);
                                }
                            });
                        });
                        
                    });
                });
                if(clientId !=0 ){
                    $("#msg_history").html("");
                    const history = res.currentHistory;
                    const userId = $("#userId").val();
                    $(".msg_history").html("");
                    history.forEach(function(chatelement, index){
                        if(chatelement.sender == userId){
                            var $msg = $('<div class="outgoing_msg"><div class="sent_msg"><p>' + chatelement.msg+ '</p><span class="time_date">'+ chatelement.created_at+'</span></div></div>');
                            $(".msg_history").append($msg).animate({"scrollTop":document.getElementById("msg_history").scrollHeight}, 0);
                        }
                        else{
                            var $msg = $('<div class="incoming_msg"><div class="incoming_msg_img"><img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"></div><div class="received_msg"><div class="received_withd_msg"><p>' + chatelement.msg+ '</p><span class="time_date">' + chatelement.created_at+'</span></div></div></div>');
                            $(".msg_history").append($msg).animate({"scrollTop":document.getElementById("msg_history").scrollHeight}, 0);
                        }
                    });
                }
                var totalUnread = res.totalUnread;
                $("#totalUnread").text(totalUnread==0?"":totalUnread);
            })
        }
        setInterval(function(){
            realtimeUpdate();
        }, 30000);
    })
</script>

@endsection