<html>

<body>
    <input type="text" name="localPeerId" id="localPeerId" readonly>
    <input type="text" name="remotePeerId" id="remotePeerId">
    <button onclick="join()" id="btn-call">Join (Call)</button>
    <br><br>
    <br><br>
    <video height="100px" width="100px" style="border:1px solid black"  class="img-responsive" id='localVideo'>
        Your browser does not support the video tag.
    </video>
    <video style="border:1px solid black" class="img-responsive" id='remoteVideo'>
        Your browser does not support the video tag.
    </video>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>  --}}
<script src="https://unpkg.com/peerjs@1.4.7/dist/peerjs.min.js"></script>
<script th:inline="javascript">
    const btnCall = document.getElementById('btn-call');
    const myId = document.getElementById('localPeerId');
    const peerId = document.getElementById('remotePeerId');
    var localVideo = document.getElementById('localVideo');
    var remoteVideo = document.getElementById('remoteVideo');
    var getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
    var myID = '';
    var peer = new Peer();
    let localStream;

    navigator.mediaDevices.getUserMedia({ video: true, audio: true})
        .then(stream =>{
            localStream = stream;
            localVideo.srcObject = localStream;
            // localVideo.onloadedmetadata = () => localVideo.play();
        });

    peer.on('open', id => {
        myId.value = id;
    });

    function join(){
        const remotePeerId = peerId.value;
        const call = peer.call(remotePeerId, localStream);

        call.on('stream', stream => {
            remoteVideo.srcObject = stream;
            // remoteVideo.onloadedmetadata = () => remoteVideo.play();
        })
    }

    peer.on('call', call => {
        call.answer(localStream);
        call.on('stream', stream => {
            remoteVideo.srcObject = stream;
            // remoteVideo.onloadedmetadata = () => remoteVideo.play();
        })
    })

</script>
</html>
