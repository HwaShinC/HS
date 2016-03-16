var CONNECTION_URL="106.184.2.204:4501";
var ws;

        window.onkeydown = function (event) {
        sendChat($('#content').val());
        };
    window.setNick = function (arg) {
        sendNickName(arg);
        userScore = 0
		sendMouseMove();
wsConnect("ws://" + CONNECTION_URL);
    };
    function wsConnect(wsUrl) {
        if (ws) {
            ws.onopen = null;
            ws.onmessage = null;
            ws.onclose = null;
            try {
                ws.close()
            } catch (b) {
            }
            ws = null
        }
        nodesOnScreen = [];
        playerCells = [];
        nodes = {};
        nodelist = [];
        Cells = [];
        leaderBoard = [];
        mainCanvas = teamScores = null;
        userScore = 0;
        console.log("Connecting to " + wsUrl);
        ws = new WebSocket(wsUrl);
        ws.binaryType = "arraybuffer";
        ws.onopen = onWsOpen;
        //ws.onmessage = onWsMessage;
        ws.onclose = onWsClose;
        ws.onerror = function () {
            console.log("socket error");
        }
    }
    function onWsOpen() {
        var msg;
        delay = 500;
        console.log("socket open");
        msg = prepareData(5);
        msg.setUint8(0, 254);
        msg.setUint32(1, 1, true);
        wsSend(msg);
        msg = prepareData(5);
        msg.setUint8(0, 255);
        msg.setUint32(1, 1332175218, true);
        wsSend(msg);
        sendNickName($("#nick").val());
    }


    function sendChat(str) {
        if (wsIsOpen() && (str.length < 200) && (str.length > 0)) {
            var msg = prepareData(2 + 2 * str.length);
            var offset = 0;
            msg.setUint8(offset++, 99);
            msg.setUint8(offset++, 0); // flags (0 for now)
            for (var i = 0; i < str.length; ++i) {
                msg.setUint16(offset, str.charCodeAt(i), true);
                offset += 2;
            }

            wsSend(msg);
            //console.log(msg);
        }
    }
    function sendNickName(userNickName) {
        if (wsIsOpen() && null != userNickName) {
            var msg = prepareData(1 + 2 * userNickName.length);
            msg.setUint8(0, 0);
            for (var i = 0; i < userNickName.length; ++i) msg.setUint16(1 + 2 * i, userNickName.charCodeAt(i), true);
            wsSend(msg)
        }
    }
    function onWsClose() {
        console.log("socket close");
    }
    function wsIsOpen() {
        return null != ws && ws.readyState == ws.OPEN
    }
    function wsSend(a) {
        ws.send(a.buffer)
    }
    function onWsMessage(msg) {
        handleWsMessage(new DataView(msg.data))
    }
    function prepareData(a) {
        return new DataView(new ArrayBuffer(a))
    }

    function sendMouseMove() {
		X=$("#x").val();
		Y=$("#y").val();
        var msg;
        if (wsIsOpen()) {
            msg = X;
            var b = Y;
            if (64 <= msg * msg + b * b && !(.01 > Math.abs(oldX - X) && .01 > Math.abs(oldY - Y))) {
                oldX = X;
                oldY = Y;
                msg = prepareData(21);
                msg.setUint8(0, 16);
                msg.setFloat64(1, X, true);
                msg.setFloat64(9, Y, true);
                msg.setUint32(17, 0, true);
                wsSend(msg);
            }
        }
    }
wsConnect("ws://" + CONNECTION_URL);
