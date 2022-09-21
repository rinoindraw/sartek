/**
 * @author Russell Toris - rctoris@wpi.edu
 */

var KEYBOARDTELEOP = KEYBOARDTELEOP || {
  REVISION : '0.3.0'
};

/**
 * @author Russell Toris - rctoris@wpi.edu
 */

/**
 * Manages connection to the server and all interactions with ROS.
 *
 * Emits the following events:
 *   * 'change' - emitted with a change in speed occurs
 *
 * @constructor
 * @param options - possible keys include:
 *   * ros - the ROSLIB.Ros connection handle
 *   * topic (optional) - the Twist topic to publish to, like '/cmd_vel'
 *   * throttle (optional) - a constant throttle for the speed
 */
KEYBOARDTELEOP.Teleop = function(options) {
  var that = this;
  options = options || {};
  var ros = options.ros;
  var topic = options.topic || '/cmd_vel';
  // permanent throttle
  var throttle = options.throttle || 1.0;

  // used to externally throttle the speed (e.g., from a slider)
  this.linearScale = 1.0;
  this.angularScale = 1.0;

  // linear x and y movement and angular z movement
  var x = 0;
  var y = 0;
  var z = 0;
  var th = 0;

  var cmdVel = new ROSLIB.Topic({
    ros : ros,
    name : topic,
    messageType : 'geometry_msgs/Twist'
  });

  // sets up a key listener on the page used for keyboard teleoperation
  var handleKey = function(keyCode, keyDown) {
    // used to check for changes in speed
    var oldX = x;
    var oldY = y;
    var oldZ = z;
    var oldth = th;
	
    var pub = true;

    var speed = 0;
    // throttle the speed by the slider and throttle constant
    if (keyDown === true) {
      linearSpeed = throttle * that.linearScale;
	  angularSpeed = throttle * that.angularScale;
    }
    // check which key was pressed
    switch (keyCode) {
      case 65: // key A
        // turn left
		x = 0.08
        th = 3.5 * angularSpeed; 
        break;
      case 87: // key W
        // up
        x = 0.6 * linearSpeed;
		th = 0;
        break;
      case 68: // key D
        // turn right
		x = 0.08;
        th = -3.5 * angularSpeed;
        break;
      case 83: // key S
        // down
        x = -0.5 * linearSpeed;
		th = 0;
        break;
      case 69: // key E
        // strafe right
		x = 0.5 * linearSpeed;
		th = -4 * angularSpeed;
        break;
      case 81: // key Q
        // strafe left
        x = 0.5 * linearSpeed;
		th = 4 * angularSpeed;
        break;
	  
		/*
	  case 90: // key C
        // strafe left
        x = -0.5 * linearSpeed;
		th = 3;
        break;
	  case 67: // key Z
        // strafe left
        x = -0.5 * linearSpeed;
		th = -3;
        break;*/
      default:
        pub = false;
    }
	
	switch (keyCode) {
		case 73: // key I
        // servo atas
		var datas = "dangak\n"
		  var msg = new ROSLIB.Message({
			data: datas
		  });
		  console.log(msg);
		  serial_listener.publish(msg);
        break;
	  case 74: // key J
        // servo kiri
		var dkiri = "layarkiri\n"
		  var msg = new ROSLIB.Message({
			data: dkiri
		  });
		  console.log(msg);
		  serial_listener.publish(msg);
        break;
	  case 75: // key K
        // servo bawah
		var dbawah = "nunduk\n"
		  var msg = new ROSLIB.Message({
			data: dbawah
		  });
		  console.log(msg);
		  serial_listener.publish(msg);
        break;
	  case 76: // key L
        // servo kanan
		var datas = "layarkanan\n"
		  var msg = new ROSLIB.Message({
			data: datas
		  });
		  console.log(msg);
		  serial_listener.publish(msg);
        break;
	}

    // publish the command
    if (pub === true) {
      var twist = new ROSLIB.Message({
        angular : {
          x : 0,
          y : 0,
          z : th
        },
        linear : {
          x : x,
          y : y,
          z : z
        }
      });
      cmdVel.publish(twist);
	  
	  
	  

      // check for changes
      if (oldX !== x || oldY !== y || oldZ !== z || oldth !== th) {
        that.emit('change', twist);
      }
    }
  };

  // handle the key
  var body = document.getElementsByTagName('body')[0];
  body.addEventListener('keydown', function(e) {
    handleKey(e.keyCode, true);
  }, false);
  body.addEventListener('keyup', function(e) {
    handleKey(e.keyCode, false);
  }, false);
};
KEYBOARDTELEOP.Teleop.prototype.__proto__ = EventEmitter2.prototype;
