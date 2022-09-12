<!--<style>
    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 1px grey;
        border-radius: 0;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #a7afae;
        border-radius: 5px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #24404d;
    }
    .card-bordered {
        border: 1px solid #ebebeb;
    }

    .card {
        border: 0;
        border-radius: 0px;
        margin-bottom: 30px;
        -webkit-box-shadow: 0 2px 3px rgba(0,0,0,0.03);
        box-shadow: 0 2px 3px rgba(0,0,0,0.03);
        -webkit-transition: .5s;
        transition: .5s;
    }

    .padding {
        padding: 3rem !important
    }
    .padding-2 {
        box-shadow:  1px 1px 10px grey;
        padding: 1rem !important;
    }
    .padding-2 a{
        color: #a7afae!important;
        font-weight: 600;
    }

    body {
        background-color: #f9f9fa
    }

    .card-header:first-child {
        border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
    }


    .card-header {
        display: -webkit-box;
        display: flex;
        -webkit-box-pack: justify;
        justify-content: space-between;
        -webkit-box-align: center;
        align-items: center;
        padding: 15px 20px;
        background-color: transparent;
        border-bottom: 1px solid rgba(77,82,89,0.07);
    }

    .card-header .card-title {
        padding: 0;
        border: none;
    }

    h4.card-title {
        font-size: 17px;
    }

    .card-header>*:last-child {
        margin-right: 0;
    }

    .card-header>* {
        margin-left: 8px;
        margin-right: 8px;
    }

    .btn-secondary {
        color: #4d5259 !important;
        background-color: #e4e7ea;
        border-color: #e4e7ea;
        color: #fff;
    }

    .btn-xs {
        font-size: 11px;
        padding: 2px 8px;
        line-height: 18px;
    }
    .btn-xs:hover{
        color:#fff !important;
    }




    .card-title {
        font-family: Roboto,sans-serif;
        font-weight: 300;
        line-height: 1.5;
        margin-bottom: 0;
        padding: 15px 20px;
        border-bottom: 1px solid rgba(77,82,89,0.07);
    }


    .ps-container {
        position: relative;
    }

    .ps-container {
        -ms-touch-action: auto;
        touch-action: auto;
        overflow: hidden!important;
        -ms-overflow-style: none;
    }

    .media-chat {
        padding-right: 64px;
        margin-bottom: 0;
    }

    .media {
        padding: 16px 12px;
        -webkit-transition: background-color .2s linear;
        transition: background-color .2s linear;
    }

    .media .avatar {
        flex-shrink: 0;
    }

    .avatar {
        position: relative;
        display: inline-block;
        width: 36px;
        height: 36px;
        line-height: 36px;
        text-align: center;
        border-radius: 100%;
        background-color: #f5f6f7;
        color: #8b95a5;
        text-transform: uppercase;
    }

    .media-chat .media-body {
        -webkit-box-flex: initial;
        flex: initial;
        display: table;
    }

    .media-body {
        min-width: 0;
    }

    .media-chat .media-body p {
        position: relative;
        padding: 6px 8px;
        margin: 4px 0;
        background-color: #f5f6f7;
        border-radius: 3px;
        font-weight: 100;
        color:#9b9b9b;
    }

    .media>* {
        margin: 0 8px;
    }

    .media-chat .media-body p.meta {
        background-color: transparent !important;
        padding: 0;
        opacity: .8;
    }

    .media-meta-day {
        -webkit-box-pack: justify;
        justify-content: space-between;
        -webkit-box-align: center;
        align-items: center;
        margin-bottom: 0;
        color: #8b95a5;
        opacity: .8;
        font-weight: 400;
    }

    .media {
        padding: 16px 12px;
        -webkit-transition: background-color .2s linear;
        transition: background-color .2s linear;
    }

    .media-meta-day::before {
        margin-right: 16px;
    }

    .media-meta-day::before, .media-meta-day::after {
        content: '';
        -webkit-box-flex: 1;
        flex: 1 1;
        border-top: 1px solid #ebebeb;
    }

    .media-meta-day::after {
        content: '';
        -webkit-box-flex: 1;
        flex: 1 1;
        border-top: 1px solid #ebebeb;
    }

    .media-meta-day::after {
        margin-left: 16px;
    }

    .media-chat.media-chat-reverse {
        padding-right: 12px;
        padding-left: 64px;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: reverse;
        flex-direction: row-reverse;
    }

    .media-chat {
        padding-right: 64px;
        margin-bottom: 0;
    }

    .media {
        padding: 16px 12px;
        -webkit-transition: background-color .2s linear;
        transition: background-color .2s linear;
    }

    .media-chat.media-chat-reverse .media-body p {
        float: right;
        clear: right;
        background-color: #48b0f7;
        color: #fff;
    }

    .media-chat .media-body p {
        position: relative;
        padding: 6px 8px;
        margin: 4px 0;
        background-color: #f5f6f7;
        border-radius: 3px;
    }


    .border-light {
        border-color: #f1f2f3 !important;
    }

    .bt-1 {
        border-top: 1px solid #ebebeb !important;
    }

    .publisher {
        position: relative;
        display: -webkit-box;
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        padding: 12px 20px;
        background-color: #f9fafb;
    }

    .publisher>*:first-child {
        margin-left: 0;
    }

    .publisher>* {
        margin: 0 8px;
    }

    .publisher-input {
        -webkit-box-flex: 1;
        flex-grow: 1;
        border: none;
        outline: none !important;
        background-color: transparent;
    }

    button, input, optgroup, select, textarea {
        font-family: Roboto,sans-serif;
        font-weight: 300;
    }

    .publisher-btn {
        background-color: transparent;
        border: none;
        color: #8b95a5;
        font-size: 16px;
        cursor: pointer;
        overflow: -moz-hidden-unscrollable;
        -webkit-transition: .2s linear;
        transition: .2s linear;
    }

    .file-group {
        position: relative;
        overflow: hidden;
    }

    .publisher-btn {
        background-color: transparent;
        border: none;
        color: #cac7c7;
        font-size: 16px;
        cursor: pointer;
        overflow: -moz-hidden-unscrollable;
        -webkit-transition: .2s linear;
        transition: .2s linear;
    }

    .file-group input[type="file"] {
        position: absolute;
        opacity: 0;
        z-index: -1;
        width: 20px;
    }

    .text-info {
        color: #48b0f7 !important;
    }
</style>-->

<style>
    body{margin-top:20px;}
    /*************** 1.Variables ***************/


    /* ------------------ Color Pallet ------------------ */


    /*************** 2.Mixins ***************/


    /************************************************
        ************************************************
                                            Search Box
        ************************************************
    ************************************************/

    .chat-search-box {
        -webkit-border-radius: 3px 0 0 0;
        -moz-border-radius: 3px 0 0 0;
        border-radius: 3px 0 0 0;
        padding: .75rem 1rem;
    }

    .chat-search-box .input-group .form-control {
        -webkit-border-radius: 2px 0 0 2px;
        -moz-border-radius: 2px 0 0 2px;
        border-radius: 2px 0 0 2px;
        border-right: 0;
    }

    .chat-search-box .input-group .form-control:focus {
        border-right: 0;
    }

    .chat-search-box .input-group .input-group-btn .btn {
        -webkit-border-radius: 0 2px 2px 0;
        -moz-border-radius: 0 2px 2px 0;
        border-radius: 0 2px 2px 0;
        margin: 0;
    }

    .chat-search-box .input-group .input-group-btn .btn i {
        font-size: 1.2rem;
        line-height: 100%;
        vertical-align: middle;
    }

    @media (max-width: 767px) {
        .chat-search-box {
            display: none;
        }
    }


    /************************************************
        ************************************************
                                        Users Container
        ************************************************
    ************************************************/

    .users-container {
        position: relative;
        padding: 1rem 0;
        border-right: 1px solid #e6ecf3;
        height: 100%;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
    }


    /************************************************
        ************************************************
                                                Users
        ************************************************
    ************************************************/

    .users {
        padding: 0;
    }

    .users .person {
        position: relative;
        width: 100%;
        padding: 10px 1rem;
        cursor: pointer;
        border-bottom: 1px solid #f0f4f8;
    }

    .users .person:hover {
        background-color: #ffffff;
        /* Fallback Color */
        background-image: -webkit-gradient(linear, left top, left bottom, from(#e9eff5), to(#ffffff));
        /* Saf4+, Chrome */
        background-image: -webkit-linear-gradient(right, #e9eff5, #ffffff);
        /* Chrome 10+, Saf5.1+, iOS 5+ */
        background-image: -moz-linear-gradient(right, #e9eff5, #ffffff);
        /* FF3.6 */
        background-image: -ms-linear-gradient(right, #e9eff5, #ffffff);
        /* IE10 */
        background-image: -o-linear-gradient(right, #e9eff5, #ffffff);
        /* Opera 11.10+ */
        background-image: linear-gradient(right, #e9eff5, #ffffff);
    }

    .users .person.active-user {
        background-color: #ffffff;
        /* Fallback Color */
        background-image: -webkit-gradient(linear, left top, left bottom, from(#f7f9fb), to(#ffffff));
        /* Saf4+, Chrome */
        background-image: -webkit-linear-gradient(right, #f7f9fb, #ffffff);
        /* Chrome 10+, Saf5.1+, iOS 5+ */
        background-image: -moz-linear-gradient(right, #f7f9fb, #ffffff);
        /* FF3.6 */
        background-image: -ms-linear-gradient(right, #f7f9fb, #ffffff);
        /* IE10 */
        background-image: -o-linear-gradient(right, #f7f9fb, #ffffff);
        /* Opera 11.10+ */
        background-image: linear-gradient(right, #f7f9fb, #ffffff);
    }

    .users .person:last-child {
        border-bottom: 0;
    }

    .users .person .user {
        display: inline-block;
        position: relative;
        margin-right: 10px;
    }

    .users .person .user img {
        width: 48px;
        height: 48px;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        border-radius: 50px;
    }

    .users .person .user .status {
        width: 10px;
        height: 10px;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
        border-radius: 100px;
        background: #e6ecf3;
        position: absolute;
        top: 0;
        right: 0;
    }

    .users .person .user .status.online {
        background: #9ec94a;
    }

    .users .person .user .status.offline {
        background: #c4d2e2;
    }

    .users .person .user .status.away {
        background: #f9be52;
    }

    .users .person .user .status.busy {
        background: #fd7274;
    }

    .users .person p.name-time {
        font-weight: 600;
        font-size: .85rem;
        display: inline-block;
    }

    .users .person p.name-time .time {
        font-weight: 400;
        font-size: .7rem;
        text-align: right;
        color: #8796af;
    }

    @media (max-width: 767px) {
        .users .person .user img {
            width: 30px;
            height: 30px;
        }
        .users .person p.name-time {
            display: none;
        }
        .users .person p.name-time .time {
            display: none;
        }
    }


    /************************************************
        ************************************************
                                        Chat right side
        ************************************************
    ************************************************/

    .selected-user {
        width: 100%;
        padding: 0 15px;
        min-height: 64px;
        line-height: 64px;
        border-bottom: 1px solid #e6ecf3;
        -webkit-border-radius: 0 3px 0 0;
        -moz-border-radius: 0 3px 0 0;
        border-radius: 0 3px 0 0;
    }

    .selected-user span {
        line-height: 100%;
    }

    .selected-user span.name {
        font-weight: 700;
    }

    .chat-container {
        position: relative;
        padding: 1rem;
    }

    .chat-container li.chat-left,
    .chat-container li.chat-right {
        display: flex;
        flex: 1;
        flex-direction: row;
        margin-bottom: 40px;
    }

    .chat-container li img {
        width: 48px;
        height: 48px;
        -webkit-border-radius: 30px;
        -moz-border-radius: 30px;
        border-radius: 30px;
    }

    .chat-container li .chat-avatar {
        margin-right: 20px;
    }

    .chat-container li.chat-right {
        justify-content: flex-end;
    }

    .chat-container li.chat-right > .chat-avatar {
        margin-left: 20px;
        margin-right: 0;
    }

    .chat-container li .chat-name {
        font-size: .75rem;
        color: #999999;
        text-align: center;
    }

    .chat-container li .chat-text {
        padding: .4rem 1rem;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        background: #ffffff;
        font-weight: 300;
        line-height: 150%;
        position: relative;
    }

    .chat-container li .chat-text:before {
        content: '';
        position: absolute;
        width: 0;
        height: 0;
        top: 10px;
        left: -20px;
        border: 10px solid;
        border-color: transparent #ffffff transparent transparent;
    }

    .chat-container li.chat-right > .chat-text {
        text-align: right;
    }

    .chat-container li.chat-right > .chat-text:before {
        right: -20px;
        border-color: transparent transparent transparent #ffffff;
        left: inherit;
    }

    .chat-container li .chat-hour {
        padding: 0;
        margin-bottom: 10px;
        font-size: .75rem;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        margin: 0 0 0 15px;
    }

    .chat-container li .chat-hour > span {
        font-size: 16px;
        color: #9ec94a;
    }

    .chat-container li.chat-right > .chat-hour {
        margin: 0 15px 0 0;
    }

    @media (max-width: 767px) {
        .chat-container li.chat-left,
        .chat-container li.chat-right {
            flex-direction: column;
            margin-bottom: 30px;
        }
        .chat-container li img {
            width: 32px;
            height: 32px;
        }
        .chat-container li.chat-left .chat-avatar {
            margin: 0 0 5px 0;
            display: flex;
            align-items: center;
        }
        .chat-container li.chat-left .chat-hour {
            justify-content: flex-end;
        }
        .chat-container li.chat-left .chat-name {
            margin-left: 5px;
        }
        .chat-container li.chat-right .chat-avatar {
            order: -1;
            margin: 0 0 5px 0;
            align-items: center;
            display: flex;
            justify-content: right;
            flex-direction: row-reverse;
        }
        .chat-container li.chat-right .chat-hour {
            justify-content: flex-start;
            order: 2;
        }
        .chat-container li.chat-right .chat-name {
            margin-right: 5px;
        }
        .chat-container li .chat-text {
            font-size: .8rem;
        }
    }

    .chat-form {
        padding: 15px;
        width: 100%;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ffffff;
        border-top: 1px solid white;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }
    .card {
        border: 0;
        background: #f4f5fb;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        margin-bottom: 2rem;
        box-shadow: none;
    }
</style>