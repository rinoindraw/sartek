	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                Pergerakan Robot Dengan Tombol Manual
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // forwardLeft ========= MAJU KIRI ========== =========================================================================================
    var toggle_forwardLeft = -1;
    function mousedown_forwardLeft(event) {
      forwardLeft_topic()
    }

    function mouseup_forwardLeft(event) {
      stop_topic()
    }
    // ========== Send Topic ==========
    function forwardLeft_topic() {
      let isi = "majukiri\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
    }

    // forward ========= MAJU ========== ================================================================================================
    var toggle_forward = -1;
    function mousedown_forward(event) {
      forward_topic()
    }

    function mouseup_forward(event) {
      stop_topic()
    }
    // ========== Send Topic ==========
    function forward_topic() {
      let isi = "maju\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
    }

    // forwardRight ========= MAJU KANAN ========== ======================================================================================
    var toggle_forwardRight = -1;
    function mousedown_forwardRight(event) {
      forwardRight_topic()
    }

    function mouseup_forwardRight(event) {
      stop_topic()
    }
    // ========== Send Topic ==========
    function forwardRight_topic() {
      let isi = "majukanan\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
    }

    // turnLeft ========= BELOK KIRI ========== ===========================================================================================
    var toggle_turnLeft = -1;
    function mousedown_turnLeft(event) {
      turnLeft_topic()
    }

    function mouseup_turnLeft(event) {
      stop_topic()
	}
    // ========== Send Topic ==========
    function turnLeft_topic() {
      let isi = "kekiri\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
    }

    // stop ========= BERHENTI ========== ================================================================================================
    var toggle_stop = -1;
    function mousedown_stop(event) {
      stop_topic()
    }

    function mouseup_stop(event) {
      stop_topic()
    }
    // ========== Send Topic ==========
    function stop_topic() {
      let isi = "motorberhenti\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
    }

    // turnRight ========= BELOK KANAN ========== ===========================================================================================
    var toggle_turnRight = -1;
    function mousedown_turnRight(event) {
      turnRight_topic()
    }

    function mouseup_turnRight(event) {
      stop_topic()
    }
    // ========== Send Topic ==========
    function turnRight_topic() {
      let isi = "kekanan\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
    }

    // backwardLeft ========= MUNDUR KIRI ========== ==========================================================================================
    var toggle_backwardLeft = -1;
    function mousedown_backwardLeft(event) {
      backwardLeft_topic()
    }

    function mouseup_backwardLeft(event) {
      stop_topic()
    }
    // ========== Send Topic ==========
    function backwardLeft_topic() {
      let isi = "mundurkiri\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
    }

    // backward ========= MUNDUR ========== ================================================================================================
    var toggle_backward = -1;
    function mousedown_backward(event) {
      backward_topic()
    }

    function mouseup_backward(event) {
      stop_topic()
    }
    // ========== Send Topic ==========
    function backward_topic() {
      let isi = "mundur\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
    }

    // backwardRight ========= MUNDUR KANAN ========== ======================================================================================
    var toggle_backwardRight = -1;
    function mousedown_backwardRight(event) {
      backwardRight_topic()
    }

    function mouseup_backwardRight(event) {
      stop_topic()
    }
    // ========== Send Topic ==========
    function backwardRight_topic() {
      let isi = "mundurkanan\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
    }

    // ======== BATAS SUCI ========
    var move_base_listener = new ROSLIB.Topic({
      ros: ros,
      name: "/move_base_simple/goal",
      messageType: "geometry_msgs/PoseStamped"
    });