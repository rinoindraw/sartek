	var ros = new ROSLIB.Ros({
      url: "wss://telepresence.id/wss2/"
    });

    ros.on("connection", function () {
      document.getElementById("status").innerHTML = "Terhubung";
    });

    ros.on("error", function (error) {
      document.getElementById("status").innerHTML = "Error";
    });

    ros.on("close", function () {
      document.getElementById("status").innerHTML = "Terputus";
    });
	
	var serial_listener = new ROSLIB.Topic({
      ros: ros,
      name: "/kepala",
      messageType: "std_msgs/String"
    });
	
	/*var txt_listener = new ROSLIB.Topic({
      ros: ros,
      name: "/move_base_simple/goal",
      messageType: "geometry_msgs/PoseStamped"
    });
	
	txt_listener.subscribe(function (m) {
      document.getElementById("msg").innerHTML = m.data;
      //move(1, 0);
    });
	*/
