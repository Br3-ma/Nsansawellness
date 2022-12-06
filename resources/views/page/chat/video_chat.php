<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Video Call | Nsansa Wellness</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="">
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'poppins', sans-serif;

            }
            .header{
                width: 100%;
                height: 100vh;
                background: #00122e;
                position: relative;

            }
            nav{
                position: absolute;
                top: 0;
                left: 0;
                bottom: 0;
                background: #182842;
                width: 120px;
                padding: 10px 0;

            }
            nav .logo{
                width: 56px;
                display: block;
                margin: auto;
                cursor: pointer;
            }
            nav ul{
                margin-top: 160px;

            }
            nav ul li{
                list-style: none;

            }
            nav ul li img{
                width: 50px;
                display: block;
                margin: 10px auto;
                padding: 10px;
                cursor: pointer;
                opacity: 0.5;
                border-radius: 10px;
                transition: opacity 0.5s, background 0.5s;
            }
            nav ul li img:hover{
                opacity: 1;
                background: #4d6181;

            }
            .active{
                opacity: 1;
                background: #4d6181;
            }
            .container{
                margin-left: 120px;
                padding: 0 2.5%;

            }
            .top-icons{
                display: flex;
                align-items: center;
                justify-content: flex-end;
                padding: 25px 0;

            }
            .top-icons img{
                width: 25px;
                margin-left: 40px;
                cursor: pointer;

            }
            .row{
                margin-top: 15px;
                display: flex;
                justify-content: space-between;

            }
            .col-1{
                flex-basis: 65%;

            }
            .col-2{
                flex-basis: 33%;
            }
            .host-img{
                width: 100%;
                border-radius: 15px;
            }
            .contarols{
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .contarols img{
                width: 40px;
                margin: 20px 10px;
                cursor: pointer;
                transition: transform 0.5s;
            }
            .contarols .call-icon{
                width: 70px;

            }
            .contarols img:hover{
                transform: translateY(-10px);

            }
            .joined{
                background: #182842;
                border-radius: 15px;
                padding: 30px 40px 50px;
                color: #fff;

            }
            .joined div{
                margin-top: 20px;
                display: grid;
                grid-template-columns: auto auto auto;
                grid-gap: 20px;

            }
            .joined img{
                width: 100%;
                border-radius: 10px;
                cursor: pointer;

            }
            .invite{
                background: #182842;
                border-radius: 15px;
                padding: 30px 40px 50px;
                color: #fff;
                margin-top: 20px;

            }
            .invite img{
                margin-top: 20px;
                width: 50px;
                margin-left: 5px;
                border-radius: 50%;
                cursor: pointer;
            }
        </style>
        <script src="//localhost:6001/socket.io/socket.io.js"></script>
    </head>
        <div id="app" class="header">
            
            <nav>
                <img width="20%" src="uploads/sites/304/2022/06/logos.svg" class="rounded logo">
                <ul>
                    <li><img src="https://i.postimg.cc/L8zxQBhv/live.png" class="active"></li>
                    <li title="Video"><img src="https://i.postimg.cc/JnggC78Q/video.png"></li>
                    <li title="Invite Someone"><img src="https://i.postimg.cc/k4DZH604/users.png"></li>
                    <li title="Quick Settings"><img src="https://i.postimg.cc/v84Fqkyz/setting.png"></li>
                </ul>
            </nav>
            <template>
                <div class="container">
                    <div class="top-icons">
                        <!-- <a href="#">{{ channel }}</a> -->
                        <img src="https://i.postimg.cc/Pqy2TXWw/menu.png">
                    </div>
                    <div class="row">
                        
                        <div class="col-12">
                            <div style="padding:5px">
                                <video style="border: 1px solid white;" autoplay height="300vh" width="100%" class="img-responsive" id='remoteVideo'>
                                    Your browser does not support the video tag.
                                </video>
                                <video style="border: 1px solid white;" autoplay id='localVideo' class="img-responsive">
                                    Your browser does not support the video tag.
                                </video>

                            </div>
                            <!-- <img height="75%" width="50px" src="https://media1.popsugar-assets.com/files/thumbor/YPjaz8052B7wAJ_dZl99jxVL0zg/fit-in/2048xorig/filters:format_auto-!!-:strip_icc-!!-/2020/02/10/627/n/1922729/330be6f43c47a571_chantablue/i/Chanta-Blue.jpg" class="host-img"> -->
                            <div class="contarols">
                                <img src="https://i.postimg.cc/3NVtVtgf/chat.png">
                                <img src="https://i.postimg.cc/BQPYHG0r/disconnect.png">
                                <img src="https://i.postimg.cc/BQPYHG0r/record.png">
                                <img src="https://i.postimg.cc/fyJH8G00/call.png" class="call-icon">
                                <img src="https://i.postimg.cc/bJFgSmFY/mic.png">
                                <img src="https://i.postimg.cc/Y2sDvCJN/cast.png">
                            </div>
                        </div>
                        <!-- <div class="col-2">
                            <div class="joined">
                                <p>People Joined</p>
                                <div>
                                    <img src="https://i.postimg.cc/WzFnG0QG/people-1.png">
                                    <img src="https://i.postimg.cc/fRhGbb92/people-2.png">
                                    <img src="https://i.postimg.cc/02mgxSbK/people-3.png">
                                    <img src="https://i.postimg.cc/K8rd3y7Z/people-4.png">
                                    <img src="https://i.postimg.cc/HWFGfzsC/people-5.png">
                                </div>
                            </div>
                            <div class="invite">
                                <p>Invite More People</p>
                                <div>
                                    <img src="https://i.postimg.cc/7LHjgQXS/user-1.png">
                                    <img src="https://i.postimg.cc/q71SQXZS/user-2.png">
                                    <img src="https://i.postimg.cc/h4kwCGpD/user-3.png">
                                    <img src="https://i.postimg.cc/GtyfL0hn/user-4.png">
                                    <img src="https://i.postimg.cc/FFd8gSbC/user-5.png">
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </template>
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js" integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
    <!-- <script type="module" src="./node_modules/webrtc-adapter/src/js/adapter_factory.js"></script> -->
    <script src="public/js/vix.js"></script>
    <!-- <script type="module" src="resources/js/bootstrap.js"></script> -->
    <!-- <script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.12.0/echo.min.js"></script> -->
    <script type="module">
        import Echo from "https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.12.0/echo.min.js";
        // import './node_modules/webrtc-adapter/src/js/adapter_core.js';

        $(function () {
            var localVideo = document.getElementById('localVideo');
            var remoteVideo = document.getElementById('remoteVideo');
            var answerButton = document.getElementById('answerCallButton');
            var my_id = "<?php echo $_GET['id']; ?>";
            // answerButton.onclick = answerCall;
            // console.log(localVideo);
            $('input[type=file]').on('change', prepareUpload);
        });

        var files;
        var conversationID;
        var luid;
        var ruid;
        var startTime;
        var localStream;
        var pc;
        var offerOptions = {
            offerToReceiveAudio: 1,
            offerToReceiveVideo: 1
        };
        var isCaller = false;
        var peerConnectionDidCreate = false;
        var candidateDidReceived = false;
        var localConnection, remoteConnection;
        // import Echo from "https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.12.0/echo.min.js";
        new Vue({
            el: "#app",
            data:{
                conversationId : 1,
                channel : 'chat-room-1',
                messages : 'Hello',
                withUser : '',
                text : '',
                constraints : {
                    audio: false,
                    video: true
                },
            },
            beforeMount () {
                var convID = "<?php echo $_GET['conversation']; ?>";
                var user = "<?php echo $_GET['id']; ?>";
                axios.get('/nsawellness/api/fetch-session/'+convID+'/'+user,{
                
                }).then(response => {
                    this.handleResponse(response)
                })
                .catch(e => {
                    this.handleErrors(e)
                })
            },
            mounted() { 
                this.listenForNewMessage();
                this.startVideoCallToUser (1);
            },
            methods: {
                handleResponse(response){
                    this.conversationId = response.data.messages[0]['conversation_id'];
                    this.channel = response.data.channel_name;
                    this.withUser = response.data.messages[0]['sender']['id'];

                    console.log(this.withUser);
                    console.log(this.conversationId);
                    console.log(this.channel);

                    Cookies.set('uuid', response.data.messages[0]['sender']['id']);
                    Cookies.set('conversationID', response.data.messages[0]['conversation_id']);
                },
                startVideoCallToUser (id) {
                    alert(this.withUser);
                    Cookies.set('remoteUUID', id);
                    window.remoteUUID = id;
                    luid = Cookies.get('uuid');
                    ruid = Cookies.get('remoteUUID');
                    isCaller = true;
                    start()
                },
                check(id) {
                        return id === this.currentUser.id;
                },
                send() {
                    axios.post('/nsawellness/chat/message/send',{
                        conversationId : this.conversationId,
                        text: this.text,
                    }).then((response) => {
                        this.text = '';
                    });
                },
                sendFiles() {
                    var data = new FormData();

                    $.each(files, function(key, value)
                    {
                        data.append('files[]', value);
                    });

                    data.append('conversationId' , this.conversationId);

                    axios.post('/chat/message/send/file', data);
                },
                listenForNewMessage: function () {
                    // alert(this.channel);
                    window.Echo.join(this.channel)
                        .here((users) => {
                            console.log(users)
                        })
                        .listen('\\PhpJunior\\LaravelVideoChat\\Events\\NewConversationMessage', (data) => {
                            var self = this;
                            if ( data.files.length > 0 ){
                                $.each( data.files , function( key, value ) {
                                    self.conversation.files.push(value);
                                });
                            }
                            this.messages.push(data);
                        })
                        .listen('\\PhpJunior\\LaravelVideoChat\\Events\\VideoChatStart', (data) => {

                            if(data.to != this.currentUser.id){
                                return;
                            }

                            if(data.type === 'signal'){
                                onSignalMessage(data);
                            }else if(data.type === 'text'){
                                console.log('received text message from ' + data.from + ', content: ' + data.content);
                            }else{
                                console.log('received unknown message type ' + data.type + ' from ' + data.from);
                            }
                        });
                },
            }
        });

    function onSignalMessage(m){
        console.log(m.subtype);
        if(m.subtype === 'offer'){
            console.log('got remote offer from ' + m.from + ', content ' + m.content);
            Cookies.set('remoteUUID', m.from);
            onSignalOffer(m.content);
        }else if(m.subtype === 'answer'){
            onSignalAnswer(m.content);
        }else if(m.subtype === 'candidate'){
            onSignalCandidate(m.content);
        }else if(m.subtype === 'close'){
            onSignalClose();
        }else{
            console.log('unknown signal type ' + m.subtype);
        }
    }
    
    function onSignalClose() {
        trace('Ending call');
        pc.close();
        pc = null;

        closeMedia();
        clearView();
    }

    function closeMedia(){
        localStream.getTracks().forEach(function(track){track.stop();});
    }

    function clearView(){
        localVideo.srcObject = null;
        remoteVideo.srcObject = null;
    }

    function onSignalCandidate(candidate){
        onRemoteIceCandidate(candidate);
    }

    function onRemoteIceCandidate(candidate){
        trace('onRemoteIceCandidate : ' + candidate);
        if(peerConnectionDidCreate){
            addRemoteCandidate(candidate);
        }else{
            //remoteCandidates.push(candidate);
            var candidates = Cookies.getJSON('candidate');
            if(candidateDidReceived){
                candidates.push(candidate);
            }else{
                candidates = [candidate];
                candidateDidReceived = true;
            }
            Cookies.set('candidate', candidates);
        }
    }

    function onSignalAnswer(answer){
        onRemoteAnswer(answer);
    }

    function onRemoteAnswer(answer){
        trace('onRemoteAnswer : ' + answer);
        pc.setRemoteDescription(answer).then(function(){onSetRemoteSuccess(pc)}, onSetSessionDescriptionError);
    }

    function onSignalOffer(offer){
        Cookies.set('offer', offer);
        $('#incomingVideoCallModal').modal('show');
    }

    function answerCall() {
        isCaller = false;
        luid = Cookies.get('uuid');
        ruid = Cookies.get('remoteUUID');
        $('#incomingVideoCallModal').modal('hide');
        start()
    }

    function gotStream(stream) {
        trace('Received local stream');
        localVideo.srcObject = stream;
        localStream = stream;
        call();
    }

    function start() {

        trace('Requesting local stream');

        navigator.mediaDevices.getUserMedia({
            audio: true,
            video: true
        })
        .then(gotStream)
        .catch(function(e) {
            alert('getUserMedia() error: ' + e.name);
        });
        // navigator.getUserMedia({video: true, audio: true}, function (stream) {
        //     localVideo.srcObject = stream;
        //     alert(localVideo.srcObject);
        //     startPeerConnection(stream);
        // }, function (error) {
        //     alert("Camera capture failed!")
        // });
    }

    function startPeerConnection(stream) {
        var configuration = {
            offerToReceiveAudio: true,
            offerToReceiveVideo: true
        }
        localConnection = new RTCPeerConnection({configuration: configuration, iceServers: []});
        remoteConnection = new RTCPeerConnection(configuration);
        stream.getTracks().forEach(
            function (track) {
                localConnection.addTrack(
                    track,
                    stream
                );
            }
        );

        remoteConnection.ontrack = function (e) {
            remoteVideo.srcObject = e.streams[0];
        };

        alert(remoteVideo.srcObject);
        // Set up the ICE candidates for the two peers
        localConnection.onicecandidate = e => !e.candidate
            || remoteConnection.addIceCandidate(e.candidate)
                .catch(e => {
                    console.error(e)
                });

        remoteConnection.onicecandidate = e => !e.candidate
            || localConnection.addIceCandidate(e.candidate)
                .catch(e => {
                    console.error(e)
                });

        localConnection.createOffer()
            .then(offer => localConnection.setLocalDescription(offer))
            .then(() => remoteConnection.setRemoteDescription(localConnection.localDescription))
            .then(() => remoteConnection.createAnswer())
            .then(answer => remoteConnection.setLocalDescription(answer))
            .then(() => localConnection.setRemoteDescription(remoteConnection.localDescription))
            .catch(e => {
                console.error(e)
            });
    }
    function call() {
        conversationID = Cookies.get('conversationID');
        trace('Starting call');
        startTime = window.performance.now();

        var videoTracks = localStream.getVideoTracks();
        var audioTracks = localStream.getAudioTracks();

        if (videoTracks.length > 0) {
            trace('Using video device: ' + videoTracks[0].label);
        }

        if (audioTracks.length > 0) {
            trace('Using audio device: ' + audioTracks[0].label);
        }

        var configuration = { "iceServers": [{ "urls": "stun:stun.ideasip.com" }] };
        pc = new RTCPeerConnection(configuration);

        trace('Created local peer connection object pc');
        // Once remote track media arrives, show it in remote video element.
        try {
            pc.ontrack = function (e) {
                remoteVideo.srcObject = e.streams[0];
            };
            pc.addEventListener('ontrack', async (event) => {
                const [remoteStream] = event.streams;
                remoteVideo.srcObject = remoteStream;
            });
        } catch (error) {
            alert(error);
        }

        pc.onicecandidate = function(e) {
            onIceCandidate(pc, e);
        };

        pc.oniceconnectionstatechange = function(e) {
            onIceStateChange(pc, e);
        };
        
        // Once remote track media arrives, show it in remote video element.
        try {
            pc.ontrack = function (e) {
                remoteVideo.srcObject = e.streams[0];
            };
        } catch (error) {
            alert(error);
        }
        alert(remoteVideo.srcObject);
        alert(localVideo.srcObject);
        // console.log(pc.ontrack);
        // remoteVideo.srcObject = localStream;
        pc.addStream(localStream);
        // pc.addTrack(localStream);
        trace('Added local stream to pc');
        
        peerConnectionDidCreate = true;

        if(isCaller) {
            trace('createOffer start');
            trace('pc createOffer start');

            pc.createOffer(
                offerOptions
            ).then(
                onCreateOfferSuccess,
                onCreateSessionDescriptionError
            );
        }else{
            onAnswer()
        }
    }
    let gotRemoteStream = (e) =>{
        alert('am in');
        if (remoteVideo.srcObject !== e.stream) {
            remoteVideo.srcObject = e.stream;
            trace('pc received remote stream');
        }
    };
    function onAnswer(){
        var remoteOffer = Cookies.getJSON('offer');

        pc.setRemoteDescription(remoteOffer).then(function(){onSetRemoteSuccess(pc)}, onSetSessionDescriptionError);

        pc.createAnswer().then(
            onCreateAnswerSuccess,
            onCreateSessionDescriptionError
        );
    }

    function onCreateAnswerSuccess(desc) {
        trace('Answer from pc:\n' + desc.sdp);
        trace('pc setLocalDescription start');
        pc.setLocalDescription(desc).then(
            function() {
                onSetLocalSuccess(pc);
            },
            onSetSessionDescriptionError
        );
        conversationID = Cookies.get('conversationID');
        var message = {from: luid, to:ruid, type: 'signal', subtype: 'answer', content: desc, time:new Date()};
        axios.post('/nsawellness/trigger/' + conversationID , message );
    }

    function onSetRemoteSuccess(pc) {
        trace(pc + ' setRemoteDescription complete');
        applyRemoteCandidates();
    }

    function applyRemoteCandidates(){
        var candidates = Cookies.getJSON('candidate');
        for(var candidate in candidates){
            addRemoteCandidate(candidates[candidate]);
        }
        Cookies.remove('candidate');
    }

    function addRemoteCandidate(candidate){
        pc.addIceCandidate(candidate).then(
            function() {
                onAddIceCandidateSuccess(pc);
            },
            function(err) {
                onAddIceCandidateError(pc, err);
            });
    }

    function onIceCandidate(pc, event) {
        if (event.candidate){
            trace(pc + ' ICE candidate: \n' + (event.candidate ? event.candidate.candidate : '(null)'));
            conversationID = Cookies.get('conversationID');
            var message = {from: luid, to:ruid, type: 'signal', subtype: 'candidate', content: event.candidate, time:new Date()};
            axios.post('/nsawellness/trigger/' + conversationID , message );
        }
    }

    function onAddIceCandidateSuccess(pc) {
        trace(pc + ' addIceCandidate success');
    }

    function onAddIceCandidateError(pc, error) {
        trace(pc + ' failed to add ICE Candidate: ' + error.toString());
    }

    function onIceStateChange(pc, event) {
        if (pc) {
            trace(pc + ' ICE state: ' + pc.iceConnectionState);
            console.log('ICE state change event: ', event);
        }
    }

    function onCreateSessionDescriptionError(error) {
        trace('Failed to create session description: ' + error.toString());
    }

    function onCreateOfferSuccess(desc) {
        trace('Offer from pc\n' + desc.sdp);
        trace('pc setLocalDescription start');
        pc.setLocalDescription(desc).then(
            function() {
                onSetLocalSuccess(pc);
            },
            onSetSessionDescriptionError
        );

        conversationID = Cookies.get('conversationID');
        var message = {from: luid, to:ruid, type: 'signal', subtype: 'offer', content: desc, time:new Date()};
        axios.post('/nsawellness/trigger/' + conversationID , message );
    }

    function onSetLocalSuccess(pc) {
        trace( pc + ' setLocalDescription complete');
    }

    function onSetSessionDescriptionError(error) {
        trace('Failed to set session description: ' + error.toString());
    }



    function trace(arg) {
        var now = (window.performance.now() / 1000).toFixed(3);
        console.log(now + ': ', arg);
    }

    function prepareUpload(event)
    {
        files = event.target.files;
    }                           
    </script>
    
    <script src="public/js/sock.js"></script>
</html> 