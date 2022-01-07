

<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />


<!DOCTYPE html>
<html class=''>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script
      src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'>
</script>
    <meta charset='UTF-8'>
    <meta name="robots" content="noindex">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon"
        href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
    <link rel="mask-icon" type=""
        href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg"
        color="#111" />
    <link rel="canonical" href="https://codepen.io/emilcarlsson/pen/ZOQZaV?limit=all&page=74&q=contact+" />
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet'
        type='text/css'>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://use.typekit.net/hoy3lrg.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//js.pusher.com/3.0/pusher.min.js"></script>
    <script>
        try {
            Typekit.load({
                async: true
            });
        } catch (e) {}
    </script>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
    <link rel='stylesheet prefetch'
        href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
    <style class="cp-pen-styles">
        .hide {
  display: none;
}
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: #fcfdfc;
            font-family: "proxima-nova", "Source Sans Pro", sans-serif;
            font-size: 1em;
            letter-spacing: 0.1px;
            color: #32465a;
            text-rendering: optimizeLegibility;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
            -webkit-font-smoothing: antialiased;
        }

        #frame {
            width: 100%;
            background: #E6EAEA;
        }

        @media screen and (max-width: 360px) {
            #frame {
                width: 100%;
                height: 100vh;
            }
        }

        #frame #sidepanel {
            float: left;
            min-width: 280px;
            max-width: 340px;
            width: 40%;
            height: 100%;
            background: #2c3e50;
            color: #f5f5f5;
            overflow: hidden;
            position: relative;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel {
                width: 58px;
                min-width: 58px;
            }
        }

        #frame #sidepanel #profile {
            width: 80%;
            margin: 25px auto;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile {
                width: 100%;
                margin: 0 auto;
                padding: 5px 0 0 0;
                background: #32465a;
            }
        }

        #frame #sidepanel #profile.expanded .wrap {
            height: 210px;
            line-height: initial;
        }

        #frame #sidepanel #profile.expanded .wrap p {
            margin-top: 20px;
        }

        #frame #sidepanel #profile.expanded .wrap i.expand-button {
            -moz-transform: scaleY(-1);
            -o-transform: scaleY(-1);
            -webkit-transform: scaleY(-1);
            transform: scaleY(-1);
            filter: FlipH;
            -ms-filter: "FlipH";
        }

        #frame #sidepanel #profile .wrap {
            height: 60px;
            line-height: 60px;
            overflow: hidden;
            -moz-transition: 0.3s height ease;
            -o-transition: 0.3s height ease;
            -webkit-transition: 0.3s height ease;
            transition: 0.3s height ease;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile .wrap {
                height: 55px;
            }
        }

        #frame #sidepanel #profile .wrap img {
            width: 50px;
            border-radius: 50%;
            padding: 3px;
            border: 2px solid #e74c3c;
            height: auto;
            float: left;
            cursor: pointer;
            -moz-transition: 0.3s border ease;
            -o-transition: 0.3s border ease;
            -webkit-transition: 0.3s border ease;
            transition: 0.3s border ease;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile .wrap img {
                width: 40px;
                margin-left: 4px;
            }
        }

        #frame #sidepanel #profile .wrap img.online {
            border: 2px solid #2ecc71;
        }

        #frame #sidepanel #profile .wrap img.away {
            border: 2px solid #f1c40f;
        }

        #frame #sidepanel #profile .wrap img.busy {
            border: 2px solid #e74c3c;
        }

        #frame #sidepanel #profile .wrap img.offline {
            border: 2px solid #95a5a6;
        }

        #frame #sidepanel #profile .wrap p {
            float: left;
            margin-left: 15px;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile .wrap p {
                display: none;
            }
        }

        #frame #sidepanel #profile .wrap i.expand-button {
            float: right;
            margin-top: 23px;
            font-size: 0.8em;
            cursor: pointer;
            color: #435f7a;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile .wrap i.expand-button {
                display: none;
            }
        }

        #frame #sidepanel #profile .wrap #status-options {
            position: absolute;
            opacity: 0;
            visibility: hidden;
            width: 150px;
            margin: 70px 0 0 0;
            border-radius: 6px;
            z-index: 99;
            line-height: initial;
            background: #435f7a;
            -moz-transition: 0.3s all ease;
            -o-transition: 0.3s all ease;
            -webkit-transition: 0.3s all ease;
            transition: 0.3s all ease;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile .wrap #status-options {
                width: 58px;
                margin-top: 57px;
            }
        }

        #frame #sidepanel #profile .wrap #status-options.active {
            opacity: 1;
            visibility: visible;
            margin: 75px 0 0 0;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile .wrap #status-options.active {
                margin-top: 62px;
            }
        }

        #frame #sidepanel #profile .wrap #status-options:before {
            content: '';
            position: absolute;
            width: 0;
            height: 0;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-bottom: 8px solid #435f7a;
            margin: -8px 0 0 24px;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile .wrap #status-options:before {
                margin-left: 23px;
            }
        }

        #frame #sidepanel #profile .wrap #status-options ul {
            overflow: hidden;
            border-radius: 6px;
        }

        #frame #sidepanel #profile .wrap #status-options ul li {
            padding: 15px 0 30px 18px;
            display: block;
            cursor: pointer;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile .wrap #status-options ul li {
                padding: 15px 0 35px 22px;
            }
        }

        #frame #sidepanel #profile .wrap #status-options ul li:hover {
            background: #496886;
        }

        #frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
            position: absolute;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin: 5px 0 0 0;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
                width: 14px;
                height: 14px;
            }
        }

        #frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
            content: '';
            position: absolute;
            width: 14px;
            height: 14px;
            margin: -3px 0 0 -3px;
            background: transparent;
            border-radius: 50%;
            z-index: 0;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
                height: 18px;
                width: 18px;
            }
        }

        #frame #sidepanel #profile .wrap #status-options ul li p {
            padding-left: 12px;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #profile .wrap #status-options ul li p {
                display: none;
            }
        }

        #frame #sidepanel #profile .wrap #status-options ul li#status-online span.status-circle {
            background: #2ecc71;
        }

        #frame #sidepanel #profile .wrap #status-options ul li#status-online.active span.status-circle:before {
            border: 1px solid #2ecc71;
        }

        #frame #sidepanel #profile .wrap #status-options ul li#status-away span.status-circle {
            background: #f1c40f;
        }

        #frame #sidepanel #profile .wrap #status-options ul li#status-away.active span.status-circle:before {
            border: 1px solid #f1c40f;
        }

        #frame #sidepanel #profile .wrap #status-options ul li#status-busy span.status-circle {
            background: #e74c3c;
        }

        #frame #sidepanel #profile .wrap #status-options ul li#status-busy.active span.status-circle:before {
            border: 1px solid #e74c3c;
        }

        #frame #sidepanel #profile .wrap #status-options ul li#status-offline span.status-circle {
            background: #95a5a6;
        }

        #frame #sidepanel #profile .wrap #status-options ul li#status-offline.active span.status-circle:before {
            border: 1px solid #95a5a6;
        }

        #frame #sidepanel #profile .wrap #expanded {
            padding: 100px 0 0 0;
            display: block;
            line-height: initial !important;
        }

        #frame #sidepanel #profile .wrap #expanded label {
            float: left;
            clear: both;
            margin: 0 8px 5px 0;
            padding: 5px 0;
        }

        #frame #sidepanel #profile .wrap #expanded input {
            border: none;
            margin-bottom: 6px;
            background: #32465a;
            border-radius: 3px;
            color: #f5f5f5;
            padding: 7px;
            width: calc(100% - 43px);
        }

        #frame #sidepanel #profile .wrap #expanded input:focus {
            outline: none;
            background: #435f7a;
        }

        #frame #sidepanel #search {
            border-top: 1px solid #32465a;
            border-bottom: 1px solid #32465a;
            font-weight: 300;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #search {
                display: none;
            }
        }

        #frame #sidepanel #search label {
            position: absolute;
            margin: 10px 0 0 20px;
        }

        #frame #sidepanel #search input {
            font-family: "proxima-nova", "Source Sans Pro", sans-serif;
            padding: 10px 0 10px 46px;
            width: calc(100% - 25px);
            border: none;
            background: #32465a;
            color: #f5f5f5;
        }

        #frame #sidepanel #search input:focus {
            outline: none;
            background: #435f7a;
        }

        #frame #sidepanel #search input::-webkit-input-placeholder {
            color: #f5f5f5;
        }

        #frame #sidepanel #search input::-moz-placeholder {
            color: #f5f5f5;
        }

        #frame #sidepanel #search input:-ms-input-placeholder {
            color: #f5f5f5;
        }

        #frame #sidepanel #search input:-moz-placeholder {
            color: #f5f5f5;
        }

        #frame #sidepanel #contacts {
            height: calc(100% - 177px);
            overflow-y: scroll;
            overflow-x: hidden;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #contacts {
                height: calc(100% - 149px);
                overflow-y: scroll;
                overflow-x: hidden;
            }

            #frame #sidepanel #contacts::-webkit-scrollbar {
                display: none;
            }
        }

        #frame #sidepanel #contacts.expanded {
            height: calc(100% - 334px);
        }

        #frame #sidepanel #contacts::-webkit-scrollbar {
            width: 8px;
            background: #2c3e50;
        }

        #frame #sidepanel #contacts::-webkit-scrollbar-thumb {
            background-color: #243140;
        }

        #frame #sidepanel #contacts ul li.contact {
            position: relative;
            padding: 10px 0 15px 0;
            font-size: 0.9em;
            cursor: pointer;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #contacts ul li.contact {
                padding: 6px 0 46px 8px;
            }
        }

        #frame #sidepanel #contacts ul li.contact:hover {
            background: #32465a;
        }

        #frame #sidepanel #contacts ul li.contact.active {
            background: #32465a;
            border-right: 5px solid #435f7a;
        }

        #frame #sidepanel #contacts ul li.contact.active span.contact-status {
            border: 2px solid #32465a !important;
        }

        #frame #sidepanel #contacts ul li.contact .wrap {
            width: 88%;
            margin: 0 auto;
            position: relative;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #contacts ul li.contact .wrap {
                width: 100%;
            }
        }

        #frame #sidepanel #contacts ul li.contact .wrap span {
            position: absolute;
            left: 0;
            margin: -2px 0 0 -2px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            border: 2px solid #2c3e50;
            background: #95a5a6;
        }

        #frame #sidepanel #contacts ul li.contact .wrap span.online {
            background: #2ecc71;
        }

        #frame #sidepanel #contacts ul li.contact .wrap span.away {
            background: #f1c40f;
        }

        #frame #sidepanel #contacts ul li.contact .wrap span.busy {
            background: #e74c3c;
        }

        #frame #sidepanel #contacts ul li.contact .wrap img {
            width: 40px;
            border-radius: 50%;
            float: left;
            margin-right: 10px;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #contacts ul li.contact .wrap img {
                margin-right: 0px;
            }
        }

        #frame #sidepanel #contacts ul li.contact .wrap .meta {
            padding: 5px 0 0 0;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #contacts ul li.contact .wrap .meta {
                display: none;
            }
        }

        #frame #sidepanel #contacts ul li.contact .wrap .meta .name {
            font-weight: 600;
        }

        #frame #sidepanel #contacts ul li.contact .wrap .meta .preview {
            margin: 5px 0 0 0;
            padding: 0 0 1px;
            font-weight: 400;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            -moz-transition: 1s all ease;
            -o-transition: 1s all ease;
            -webkit-transition: 1s all ease;
            transition: 1s all ease;
        }

        #frame #sidepanel #contacts ul li.contact .wrap .meta .preview span {
            position: initial;
            border-radius: initial;
            background: none;
            border: none;
            padding: 0 2px 0 0;
            margin: 0 0 0 1px;
            opacity: .5;
        }

        #frame #sidepanel #bottom-bar {
            position: absolute;
            width: 100%;
            bottom: 0;
        }

        #frame #sidepanel #bottom-bar button {
            float: left;
            border: none;
            width: 50%;
            padding: 10px 0;
            background: #32465a;
            color: #f5f5f5;
            cursor: pointer;
            font-size: 0.85em;
            font-family: "proxima-nova", "Source Sans Pro", sans-serif;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #bottom-bar button {
                float: none;
                width: 100%;
                padding: 15px 0;
            }
        }

        #frame #sidepanel #bottom-bar button:focus {
            outline: none;
        }

        #frame #sidepanel #bottom-bar button:nth-child(1) {
            border-right: 1px solid #2c3e50;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #bottom-bar button:nth-child(1) {
                border-right: none;
                border-bottom: 1px solid #2c3e50;
            }
        }

        #frame #sidepanel #bottom-bar button:hover {
            background: #435f7a;
        }

        #frame #sidepanel #bottom-bar button i {
            margin-right: 3px;
            font-size: 1em;
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #bottom-bar button i {
                font-size: 1.3em;
            }
        }

        @media screen and (max-width: 735px) {
            #frame #sidepanel #bottom-bar button span {
                display: none;
            }
        }

        #frame .content {
            float: right;
            width: 60%;
            height: 100%;
            overflow: hidden;
            position: relative;
        }

        @media screen and (max-width: 735px) {
            #frame .content {
                width: calc(100% - 58px);
                min-width: 300px !important;
            }
        }

        @media screen and (min-width: 900px) {
            #frame .content {
                width: calc(100% - 340px);
            }
        }

        #frame .content .contact-profile {
            width: 100%;
            height: 60px;
            line-height: 60px;
            background: #f5f5f5;
        }

        #frame .content .contact-profile img {
            width: 40px;
            border-radius: 50%;
            float: left;
            margin: 9px 12px 0 9px;
        }

        #frame .content .contact-profile p {
            float: left;
        }

        #frame .content .contact-profile .social-media {
            float: right;
        }

        #frame .content .contact-profile .social-media i {
            margin-left: 14px;
            cursor: pointer;
        }

        #frame .content .contact-profile .social-media i:nth-last-child(1) {
            margin-right: 20px;
        }

        #frame .content .contact-profile .social-media i:hover {
            color: #435f7a;
        }

        #frame .content .messages {
    height: auto;
    min-height: calc(100% - 60px);
    max-height: calc(100% - 60px);
    overflow-y: scroll;
    overflow-x: hidden;
}

        @media screen and (max-width: 735px) {
            #frame .content .messages {
                max-height: calc(100% - 60px);
            }
        }

        #frame .content .messages::-webkit-scrollbar {
            width: 8px;
            background: transparent;
        }

        #frame .content .messages::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, 0.3);
        }

        #frame .content .messages ul li {
            display: inline-block;
            clear: both;
            float: left;
            margin: 15px 15px 5px 15px;
            width: calc(100% - 25px);
            font-size: 0.9em;
        }

        #frame .content .messages ul li:nth-last-child(1) {
            margin-bottom: 20px;
        }

        #frame .content .messages ul li.sent img {
            margin: 0 0 0 0;
        }

        #frame .content .messages ul li.sent p {
            background: #435f7a;
            color: #f5f5f5;
        }

        #frame .content .messages ul li.replies img {
            float: right;
            margin: 0 0 0 0;
        }

        #frame .content .messages ul li.replies p {
            background: #f5f5f5;
            float: right;
        }

        #frame .content .messages ul li img {
            width: 22px;
            border-radius: 50%;
            float: left;
        }

        #frame .content .messages ul li p {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 20px;
            max-width: 205px;
            line-height: 130%;
        }

        @media screen and (min-width: 735px) {
            #frame .content .messages ul li p {
                max-width: 300px;
            }
        }

        #frame .content .message-input {
            position: absolute;
            bottom: 0;
            width: 100%;
            z-index: 99;
        }

        #frame .content .message-input .wrap {
            position: relative;
        }

        #frame .content .message-input .wrap input {
            font-family: "proxima-nova", "Source Sans Pro", sans-serif;
            float: left;
            border: none;
            width: calc(100% - 90px);
            padding: 11px 32px 10px 8px;
            font-size: 0.8em;
            color: #32465a;
        }

        @media screen and (max-width: 735px) {
            #frame .content .message-input .wrap input {
                padding: 15px 32px 16px 8px;
            }
        }

        #frame .content .message-input .wrap input:focus {
            outline: none;
        }

        #frame .content .message-input .wrap .attachment {
            position: absolute;
            right: 60px;
            z-index: 4;
            margin-top: 10px;
            font-size: 1.1em;
            color: #435f7a;
            opacity: .5;
            cursor: pointer;
        }

        @media screen and (max-width: 735px) {
            #frame .content .message-input .wrap .attachment {
                margin-top: 17px;
                right: 65px;
            }
        }

        #frame .content .message-input .wrap .attachment:hover {
            opacity: 1;
        }

        #frame .content .message-input .wrap button {
            float: right;
            border: none;
            width: 50px;
            padding: 12px 0;
            cursor: pointer;
            background: #32465a;
            color: #f5f5f5;
        }

        @media screen and (max-width: 735px) {
            #frame .content .message-input .wrap button {
                padding: 16px 0;
            }
        }

        #frame .content .message-input .wrap button:hover {
            background: #435f7a;
        }

        #frame .content .message-input .wrap button:focus {
            outline: none;
        }

        small{
            
            color: rgb(54, 26, 26);
            border-radius: 5px;
            font-size: 10px;
            right: 10px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

    </style>
</head>

<body>
    <!--

A concept for a chat interface.

Try writing a new message! :)


Follow me here:
Twitter: https://twitter.com/thatguyemil
Codepen: https://codepen.io/emilcarlsson/
Website: http://emilcarlsson.se/

-->

    <div id="frame">
        <div id="sidepanel">
            <div id="profile">
                <div class="wrap">
                    <img id="profile-img" src="{{url($ProPic)}}" class="online"
                        alt="" />
                        
                    <p>{{ $Name }}</p>
                    <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
                    <div id="status-options">
                        <ul>
                            <li id="status-online" class="active"><span class="status-circle"></span>
                                <p>Online</p>
                            </li>
                            <li id="status-away"><span class="status-circle"></span>
                                <p>Away</p>
                            </li>
                            <li id="status-busy"><span class="status-circle"></span>
                                <p>Busy</p>
                            </li>
                            <li id="status-offline"><span class="status-circle"></span>
                                <p>Offline</p>
                            </li>
                        </ul>
                    </div>
                    <div id="expanded">
                        <a type="button" class="btn btn-primary" style="text-decoration: none; color: white;" href="{{route(session()->get('role')==2 ?  'doctor_dashboard' : 'patient_dashboard')}}"><i class="fa fa-dashboard"></i> Back to dashboard </a>
                    </div>
                </div>
            </div>
            <div id="search">
                <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
                <input type="text" id = "name" placeholder="Search contacts..." onkeyup = "searchContact()"/>
            </div>
            <div id="contacts">
                <ul id="bodyData">

                    <div class="card-body">
                        <form enctype="multipart/form-data">
            <div class="scroll scroll-pull message-scroll" data-mobile-height="350">
              <div class="messages" id="messages">
              </div>
            </div>
                        </form>
          </div>

                    {{-- <li class="contact">
                        <div class="wrap">
                            <span class="contact-status online"></span>
                            <img src="http://emilcarlsson.se/assets/louislitt.png" alt="" />
                            <div class="meta">
                                <p class="name">Louis Litt</p>
                                <p class="preview">You just got LITT up, Mike.</p>
                            </div>
                        </div>
                    </li> --}}
                    {{-- <li class="contact active">
					<div class="wrap">
						<span class="contact-status busy"></span>
						<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
						<div class="meta">
							<p class="name">Harvey Specter</p>
							<p class="preview">Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
						</div>
					</div>
				</li>
				<li class="contact">
					<div class="wrap">
						<span class="contact-status away"></span>
						<img src="http://emilcarlsson.se/assets/rachelzane.png" alt="" />
						<div class="meta">
							<p class="name">Rachel Zane</p>
							<p class="preview">I was thinking that we could have chicken tonight, sounds good?</p>
						</div>
					</div>
				</li>
				<li class="contact">
					<div class="wrap">
						<span class="contact-status online"></span>
						<img src="http://emilcarlsson.se/assets/donnapaulsen.png" alt="" />
						<div class="meta">
							<p class="name">Donna Paulsen</p>
							<p class="preview">Mike, I know everything! I'm Donna..</p>
						</div>
					</div>
				</li>
				<li class="contact">
					<div class="wrap">
						<span class="contact-status busy"></span>
						<img src="http://emilcarlsson.se/assets/jessicapearson.png" alt="" />
						<div class="meta">
							<p class="name">Jessica Pearson</p>
							<p class="preview">Have you finished the draft on the Hinsenburg deal?</p>
						</div>
					</div>
				</li>
				<li class="contact">
					<div class="wrap">
						<span class="contact-status"></span>
						<img src="http://emilcarlsson.se/assets/haroldgunderson.png" alt="" />
						<div class="meta">
							<p class="name">Harold Gunderson</p>
							<p class="preview">Thanks Mike! :)</p>
						</div>
					</div>
				</li>
				<li class="contact">
					<div class="wrap">
						<span class="contact-status"></span>
						<img src="http://emilcarlsson.se/assets/danielhardman.png" alt="" />
						<div class="meta">
							<p class="name">Daniel Hardman</p>
							<p class="preview">We'll meet again, Mike. Tell Jessica I said 'Hi'.</p>
						</div>
					</div>
				</li>
				<li class="contact">
					<div class="wrap">
						<span class="contact-status busy"></span>
						<img src="http://emilcarlsson.se/assets/katrinabennett.png" alt="" />
						<div class="meta">
							<p class="name">Katrina Bennett</p>
							<p class="preview">I've sent you the files for the Garrett trial.</p>
						</div>
					</div>
				</li>
				<li class="contact">
					<div class="wrap">
						<span class="contact-status"></span>
						<img src="http://emilcarlsson.se/assets/charlesforstman.png" alt="" />
						<div class="meta">
							<p class="name">Charles Forstman</p>
							<p class="preview">Mike, this isn't over.</p>
						</div>
					</div>
				</li>
				<li class="contact">
					<div class="wrap">
						<span class="contact-status"></span>
						<img src="http://emilcarlsson.se/assets/jonathansidwell.png" alt="" />
						<div class="meta">
							<p class="name">Jonathan Sidwell</p>
							<p class="preview"><span>You:</span> That's bullshit. This deal is solid.</p>
						</div>
					</div>
				</li> --}}
                </ul>
            </div>
            {{-- <div id="bottom-bar">
			<button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
			<button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>
		</div> --}}
        </div>

<div class="scroll scroll-pull message-scroll" data-mobile-height="350">
              {{-- <form enctype="multipart/form-data"> --}}
            
                <div class="messages content" id="messageData">

        </div>
              {{-- </form> --}}
            </div>
       



    </div>
    <script
        src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'>
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(".messages").animate({
            scrollTop: $(document).height()
        }, "fast");

        $("#profile-img").click(function() {
            $("#status-options").toggleClass("active");
        });

        $(".expand-button").click(function() {
            $("#profile").toggleClass("expanded");
            $("#contacts").toggleClass("expanded");
        });

        $("#status-options ul li").click(function() {
            $("#profile-img").removeClass();
            $("#status-online").removeClass("active");
            $("#status-away").removeClass("active");
            $("#status-busy").removeClass("active");
            $("#status-offline").removeClass("active");
            $(this).addClass("active");

            if ($("#status-online").hasClass("active")) {
                $("#profile-img").addClass("online");
            } else if ($("#status-away").hasClass("active")) {
                $("#profile-img").addClass("away");
            } else if ($("#status-busy").hasClass("active")) {
                $("#profile-img").addClass("busy");
            } else if ($("#status-offline").hasClass("active")) {
                $("#profile-img").addClass("offline");
            } else {
                $("#profile-img").removeClass();
            };

            $("#status-options").removeClass("active");
        });

        function newMessage() {
            message = $(".message-input input").val();
            if ($.trim(message) == '') {
                return false;
            }
            $('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>')
                .appendTo($('.messages ul'));
            $('.message-input input').val(null);
            $('.contact.active .preview').html('<span>You: </span>' + message);
            $(".messages").animate({
                scrollTop: $(document).height()
            }, "fast");
        };

        $('.submit').click(function() {
            submitMessage(recievers_id, senders_id, message_id);
        });

        $(window).on('keydown', function(e) {
            if (e.which == 13) {
                submitMessage(recievers_id, senders_id, message_id);
                return false;
            }
        });

        
    </script>

    <script>


        $(document).ready(function() {
            
  $('.fileInput').change(function() {
    $file = $(this).val();
    $file = $file.replace(/.*[\/\\]/, ''); //grab only the file name not the path
    $('.filename-container').append("<span  class='filename'>" + $file + "</span>").show();
  })

})
    </script>

    <script type="text/javascript">

function searchContact(){
    console.log($("#name").val());
    $.ajax({
                url: "{{ route('message.contactList') }}",
                type: "GET",
                data: {
                    _token: '{{ csrf_token() }}',
                    name: $("#name").val()
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult) {
                    $("#bodyData").html('');
                    console.log(dataResult);
                    var resultData = dataResult.data;
                    var session_id = dataResult.session_id;
                    var bodyData = '';
                    var i = 1;
                    $.each(resultData, function(index, row) {
                        var fetchSingleChat = url + '/' + row.id;
                        if(row.senders_id == session_id || row.recievers_id == session_id){
                            if(row.is_seen == 0){
                        bodyData +="<div style=' color: white; font-weight: bold; tex-decoration:none;' data-visualcompletion='ignore-dynamic'><a onclick='myFunction("+row.id+")'><li class='contact'><div class='wrap'><span class='contact-status online'></span>";
                        
                        if(role==2){
                            bodyData +="<img style='height: 45px;' src='"+row.patients_profile_picture+"' alt='' /><div class='meta'><p class='name'>" +row.patients_first_name + "</p>";
                        }
                        else if(role==3){
                            bodyData +="<img style='height: 45px;' src='"+row.profile_picture+"' alt='' /><div class='meta'><p class='name'>" +row.doctors_first_name + "</p>";
                        } 
                        if(row.message != null){
                            bodyData += "<p class='preview'>";
                            if(row.senders_id == session_id){
                                bodyData += "<caption>you: &nbsp;</caption>";
                            }
                            bodyData += row.message + "</p>";
                        }
                        else{
                            bodyData += "<p class='preview'>Sent a file</p>";
                        }
                        bodyData += "</div>";
                        bodyData += "</div></li></a></div>";
                      }
                      else{
                        bodyData +="<div style=' color: gray; tex-decoration:none;' data-visualcompletion='ignore-dynamic'><a onclick='myFunction("+row.id+")'><li class='contact'><div class='wrap'><span class='contact-status online'></span>";
                        if(role==2){
                            bodyData +="<img style='height: 45px;' src='"+row.patients_profile_picture+"' alt='' /><div class='meta'><p class='name'>" +row.patients_first_name + "</p>";
                        }
                        else if(role==3){
                            bodyData +="<img style='height: 45px;' src='"+row.profile_picture+"' alt='' /><div class='meta'><p class='name'>" +row.doctors_first_name + "</p>";
                        } 
                        
                        if(row.message != null){
                            bodyData += "<p class='preview'>";
                            if(row.senders_id == session_id){
                                bodyData += "<caption>you: &nbsp;</caption>";
                            }
                            bodyData += row.message + "</p>";
                        }
                        else{
                            bodyData += "<p class='preview'>Sent a file</p>";
                        }
                        bodyData += "</div>";
                        
                        bodyData += "</div></li></a></div>";
                      }
                        }
                      

                    })
                    $("#bodyData").append(bodyData);
                }
            });
}

var role = '{{ Session::get('role');}}';

    //var id = location;
    let url_str = location;

let url = new URL(url_str);
let search_params = url.searchParams; 

let id = search_params.get('id');
// let senders_id = search_params.get('senders_id');
// let recievers_id = search_params.get('recievers_id');
// alert(id);
// alert(senders_id);
if(id != null){
    // setInterval(alert(role) ,3000);
// function intervalSet(){
myFunction(id);
// }
     
//     setInterval(intervalSet,1000);
}
else{
    contactList();
}

    //alert(search_params.get('senders_id'));

function m(){  
window.value=100;
} 

      function myFunction(id) {
          console.log(id);
          let newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?id=' + id;
          window.history.pushState({
            path: newUrl
          }, '', newUrl);

          $("#messageData").html('');

        $.ajax({
                url: "{{ route('message.chatData') }}",
                type: "GET",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    // senders_id: senders_id,
                    // recievers_id: recievers_id
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult) {
                    
                    
                    
                    
                     console.log(dataResult, 'messages');
                    console.log(dataResult.data[0].recievers_id);
                    console.log(dataResult.data[0].senders_id);
                    console.log(dataResult.RecieversProfilePicture.searchable.patients_profile_picture);
                    console.log(dataResult.SendersProfilePicture.searchable.profile_picture);
                    var recievers_id = dataResult.data[0].recievers_id;
                    var senders_id = dataResult.data[0].senders_id;
                    var message_id = dataResult.data[0].message_id;
                    var resultData = dataResult.data;


function uniqByKeepLast(resultData, key){
    return [...new Set(resultData.map(item => item.id)).values()].map(id => {
        return resultData.find(item => item.id === id);
    });
}
resultData = uniqByKeepLast(resultData, it=>it.id);
                    // let resultData = [...new Set(resultD)];
                    var messageData = '';
                    var i = 1;
                    var session_id = '{{ Session::get('id');}}';
                    
                    // $.each(resultData, function(index, row) {
                       
                    //     if(row.recievers_id === session_id){
                            
                    //             messageData +="<div class='contact-profile'><img style='height: 45px;' src='"+row.patients_profile_picture+"' alt='' /><p>"+row.patients_first_name+"</p><div class='social-media'><i class='fa fa-facebook' aria-hidden='true'></i><i class='fa fa-twitter' aria-hidden='true'></i><i class='fa fa-instagram' aria-hidden='true'></i></div></div>";
                    
                    //             }

                    // });

                    messageData+= "<div class='messages'><ul>";

                        
                    
                    $.each(resultData, function(index, row) {
                       
                        



console.log(new Date());

var date1 = new Date();
var date2 = new Date(row.created_at);
//  console.log(date1.getTime());
//  console.log(date2.getTime());
// var timeDiff = Math.abs(date1.getTime() - date2.getTime());
// var diffHours = Math.ceil(timeDiff / (1000 * 3600)); 
// console.log(diffHours);

const diffTime = Math.abs(date1 - date2);
console.log(diffTime);
// const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
var hours = Math.floor((diffTime / (1000 * 60 * 60)) % 24);
var minutes = Math.floor(diffTime / 60000);
  var seconds = ((diffTime % 60000) / 1000).toFixed(0);
  console.log(  (minutes < 60 ? (minutes < 1 ? seconds + " seconds ago" : minutes + " minutes ago") : hours + " hours ago") );
// console.log(diffTime + " milliseconds");
// console.log(diffDays + " days");


                        if(row.senders_id != session_id){
                            // if(role==2){
                                if(dataResult.SendersProfilePicture.title == row.senders_id){
                                    if(dataResult.SendersProfilePicture.searchable.profile_picture != null){
messageData +="<li class='replies'><img style='height: 32px;' src='"+dataResult.SendersProfilePicture.searchable.profile_picture+"' alt='' />";
}
else if(dataResult.SendersProfilePicture.searchable.patients_profile_picture != null){
messageData +="<li class='replies'><img style='height: 32px;' src='"+dataResult.SendersProfilePicture.searchable.patients_profile_picture+"' alt='' />";
}
                                }
                                else if(dataResult.RecieversProfilePicture.title == row.senders_id){
                                    if(dataResult.RecieversProfilePicture.searchable.profile_picture != null){
messageData +="<li class='replies'><img style='height: 32px;' src='"+dataResult.RecieversProfilePicture.searchable.profile_picture+"' alt='' />";
}
else if(dataResult.RecieversProfilePicture.searchable.patients_profile_picture != null){
messageData +="<li class='replies'><img style='height: 32px;' src='"+dataResult.RecieversProfilePicture.searchable.patients_profile_picture+"' alt='' />";
}
                                }
                                
                            // }
                            // else if(role==3){
                            //     messageData +="<li class='replies'><img style='height: 32px;' src='"+row.patients_profile_picture+"' alt='' />";
                            // }
                    if(row.message != null){
                        messageData +="<p>"+row.message+"<br><small>"+(minutes < 61 ? (minutes < 1 ? seconds + " seconds ago" : minutes + " minutes ago") : hours + " hours ago")+"</small></p>";
                    }
                    
                            if(row.file != null){
                                
                        var fileName = row.file;
                                console.log(fileName.split('.').pop(), 'file');
                                if(fileName.split('.').pop() != 'jpg' && fileName.split('.').pop() != 'jpeg' && fileName.split('.').pop() != 'JPG' && fileName.split('.').pop() != 'JPEG' && fileName.split('.').pop() != 'png' && fileName.split('.').pop() != 'PNG')
                                {
                                    messageData += "<br><p style='margin-left: 20px;'><a style='height: 100px; width: 100px; border-radius: 2px;' href='"+row.file+"' alt=''><i class='fa fa-file-o' style='font-size:48px;color:white'></i></a><br><small>"+(minutes < 61 ? (minutes < 1 ? seconds + " seconds ago" : minutes + " minutes ago") : hours + " hours ago")+"</small></p>";
                                }
                                else{
                        messageData += "<br><p style='margin-left: 20px;'><a href='"+row.file+"'><img style='height: 100px; width: 100px; border-radius: 2px;' src='"+row.file+"' alt='' /></a><br><small>"+(minutes < 61 ? (minutes < 1 ? seconds + " seconds ago" : minutes + " minutes ago") : hours + " hours ago")+"</small></p>";
                    }
                    }
                    messageData += "</li>";
                      

// window.value=row.senders_id;
   
                    }
                        else{
                            
                        // if(role==2){
                                // messageData +="<li class='sent'><img style='height: 32px;' src='"+row.profile_picture+"' alt='' />";
                            // }
                            // else if(role==3){
                            //     messageData +="<li class='sent'><img style='height: 32px;' src='"+row.patients_profile_picture+"' alt='' />";
                            // }

                            if(dataResult.SendersProfilePicture.title == row.senders_id){
                                    if(dataResult.SendersProfilePicture.searchable.profile_picture != null){
messageData +="<li class='sent'><img style='height: 32px;' src='"+dataResult.SendersProfilePicture.searchable.profile_picture+"' alt='' />";
}
else if(dataResult.SendersProfilePicture.searchable.patients_profile_picture != null){
messageData +="<li class='sent'><img style='height: 32px;' src='"+dataResult.SendersProfilePicture.searchable.patients_profile_picture+"' alt='' />";
}
                                }
                                else if(dataResult.RecieversProfilePicture.title == row.senders_id){
                                    if(dataResult.RecieversProfilePicture.searchable.profile_picture != null){
messageData +="<li class='sent'><img style='height: 32px;' src='"+dataResult.RecieversProfilePicture.searchable.profile_picture+"' alt='' />";
}
else if(dataResult.RecieversProfilePicture.searchable.patients_profile_picture != null){
messageData +="<li class='sent'><img style='height: 32px;' src='"+dataResult.RecieversProfilePicture.searchable.patients_profile_picture+"' alt='' />";
}
                                }
                    
                    if(row.message != null){
                        messageData +="<p>"+row.message+"<br><small>"+(minutes < 61 ? (minutes < 1 ? seconds + " seconds ago" : minutes + " minutes ago") : hours + " hours ago")+"</small></p>";
                    }

                    if(row.file != null){
                        var fileName = row.file;
                                console.log(fileName.split('.').pop(), 'file');
                                if(fileName.split('.').pop() != 'jpg' && fileName.split('.').pop() != 'jpeg' && fileName.split('.').pop() != 'JPG' && fileName.split('.').pop() != 'JPEG' && fileName.split('.').pop() != 'png' && fileName.split('.').pop() != 'PNG')
                                {
                                    messageData += "<br><p style='margin-left: 20px;'><a style='height: 100px; width: 100px; border-radius: 2px;' href='"+row.file+"' alt=''><i class='fa fa-file-o' style='font-size:48px;color:white'></i></a><br><small>"+(minutes < 61 ? (minutes < 1 ? seconds + " seconds ago" : minutes + " minutes ago") : hours + " hours ago")+"</small></p>";
                                }
                                else{
                        messageData += "<br><p style='margin-left: 20px;'><a href='"+row.file+"'><img style='height: 100px; width: 100px; border-radius: 2px;' src='"+row.file+"' alt='' /></a><br><small>"+(minutes < 61 ? (minutes < 1 ? seconds + " seconds ago" : minutes + " minutes ago") : hours + " hours ago")+"</small></p>";
                    }
                }
                    messageData += "</li>";    
                    }
                      

                    });

                    messageData+= "</ul></div>";
                    messageData += "<div class='message-input'><div class='wrap'><input type='text' name='message' id='message' placeholder='Write your message...' /><label for='fileInput'><i class='fa fa-paperclip attachment' aria-hidden='true'></i></label><input type='file' name='file' class='fileInput hide' id='fileInput'><button class='submit' onclick='submitMessage("+recievers_id+","+senders_id+","+message_id+")'><i class='fa fa-paper-plane' aria-hidden='true'></i></button></div></div>";
                    
                    $("#messageData").append(messageData);
                    $("#bodyData").html('');
                    contactList();
                    
                    $(".messages").animate({
                scrollTop: 100000000000000000000000000
            }, "fast");
            // window.scrollTo(0,4000);
                }
            });

            }

            function scrollBottom() {
        $('.message-scroll').scrollTop(parseInt($(".messages").height()));
      }


        // $(document).ready(function() {
            function contactList(){
            var url = "{{ route('message.chatData') }}";
            $.ajax({
                url: "{{ route('message.contactList') }}",
                type: "GET",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult) {
                    console.log(dataResult);
                    var resultData = dataResult.data;
                    var session_id = dataResult.session_id;
                    var bodyData = '';
                    var i = 1;
                    $.each(resultData, function(index, row) {

                        var date1 = new Date();
var date2 = new Date(row.created_at);
//  console.log(date1.getTime());
//  console.log(date2.getTime());
// var timeDiff = Math.abs(date1.getTime() - date2.getTime());
// var diffHours = Math.ceil(timeDiff / (1000 * 3600)); 
// console.log(diffHours);

const diffTime = Math.abs(date1 - date2);
console.log(diffTime);
// const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
var hours = Math.floor((diffTime / (1000 * 60 * 60)) % 24);
var minutes = Math.floor(diffTime / 60000);
  var seconds = ((diffTime % 60000) / 1000).toFixed(0);
  console.log(  (minutes < 60 ? (minutes < 1 ? seconds + " seconds ago" : minutes + " minutes ago") : hours + " hours ago") );


                        var fetchSingleChat = url + '/' + row.id;
                      if(row.is_seen == 0){
                        bodyData +="<div style=' color: white; font-weight: bold; tex-decoration:none;' data-visualcompletion='ignore-dynamic'><a onclick='myFunction("+row.id+")'><li class='contact'><div class='wrap'><span class='contact-status online'></span>";
                        
                        if(role==2){
                            bodyData +="<img style='height: 45px;' src='"+row.patients_profile_picture+"' alt='' /><div class='meta'><p class='name'>" +row.patients_first_name + "</p>";
                        }
                        else if(role==3){
                            bodyData +="<img style='height: 45px;' src='"+row.profile_picture+"' alt='' /><div class='meta'><p class='name'>" +row.doctors_first_name + "</p>";
                        } 
                        if(row.message != null){
                            bodyData += "<p class='preview'>";
                            if(row.senders_id == session_id){
                                bodyData += "<caption>you: &nbsp;</caption>";
                            }
                            bodyData += row.message + "&nbsp;<small style='color:white; right: 20px; margin-left:20px;'>"+(minutes < 61 ? (minutes < 1 ? seconds + " seconds ago" : minutes + " minutes ago") : hours + " hours ago")+"</small></p>";
                        }
                        else{
                            bodyData += "<p class='preview'>Sent a file&nbsp;<small style='color:white; right: 20px; margin-left:20px;'>"+(minutes < 61 ? (minutes < 1 ? seconds + " seconds ago" : minutes + " minutes ago") : hours + " hours ago")+"</small></p>";
                        }
                        bodyData += "</div>";
                        bodyData += "</div></li></a></div>";
                      }
                      else{
                        bodyData +="<div style=' color: gray; tex-decoration:none;' data-visualcompletion='ignore-dynamic'><a onclick='myFunction("+row.id+")'><li class='contact'><div class='wrap'><span class='contact-status online'></span>";
                        if(role==2){
                            bodyData +="<img style='height: 45px;' src='"+row.patients_profile_picture+"' alt='' /><div class='meta'><p class='name'>" +row.patients_first_name + "</p>";
                        }
                        else if(role==3){
                            bodyData +="<img style='height: 45px;' src='"+row.profile_picture+"' alt='' /><div class='meta'><p class='name'>" +row.doctors_first_name + "</p>";
                        } 
                        
                        if(row.message != null){
                            bodyData += "<p class='preview'>";
                            if(row.senders_id == session_id){
                                bodyData += "<caption>you: &nbsp;</caption>";
                            }
                            bodyData += row.message + "&nbsp;<small style='color:white; right: 20px; margin-left:20px;'>"+(minutes < 61 ? (minutes < 1 ? seconds + " seconds ago" : minutes + " minutes ago") : hours + " hours ago")+"</small></p>";
                        }
                        else{
                            bodyData += "<p class='preview'>Sent a file &nbsp;<small style='color:white; right: 20px; margin-left:20px;'>"+(minutes < 61 ? (minutes < 1 ? seconds + " seconds ago" : minutes + " minutes ago") : hours + " hours ago")+"</small></p>";
                        }
                        bodyData += "</div>";
                        
                        bodyData += "</div></li></a></div>";
                      }

                    })
                    $("#bodyData").append(bodyData);
                }
            });

        // });
            }

        function submitMessage(recievers_id, senders_id, message_id) {

        console.log($("#message").val());
        console.log(fileInput.files[0]);
        console.log(recievers_id, 'hey');
        console.log(senders_id);
        console.log(message_id);
        console.log({{ Session::get('id');}});

        if ($("#message").val() != "" || fileInput.files[0] != undefined) {
    
    var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
 
        let formData = new FormData();
        var url = "{{ route('message.submitMsg') }}";
        if(recievers_id != {{ Session::get('id');}}){
            t_rcv = recievers_id;
        }
        else if(recievers_id == {{ Session::get('id');}}){
            t_rcv = senders_id;
        }
        
        formData.append("recievers_id", t_rcv);
        formData.append("senders_id", {{ Session::get('id');}});
        formData.append("message_id", message_id);
    formData.append("message", $("#message").val());
    formData.append("file", fileInput.files[0]);
    formData.append("_token", CSRF_TOKEN);
        
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $.ajax({
                url: "{{ route('message.submitMsg') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                dataType: 'json',
                success: function(dataResult) {
                    console.log(dataResult);
                    $("#bodyData").html('');
                    // contactList();

                    $("#messageData").html('');
                    
                    myFunction(dataResult.data.id);
                }
            });
  }
  else{
    //   alert("Any one must be filled out");
      return false;
  }

        


    // await fetch(url, {
    //   method: "POST",
    //   _token: '{{ csrf_token() }}',
    //   data: formData,
    // //   cache: false,
    // //   dataType: 'json',
    // });    
    // alert('The file has been uploaded successfully.');
        }
    </script>
</body>

</html>
