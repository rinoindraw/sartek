	const tengokatas = document.querySelector('.tengokatas');
	const tengokbawah = document.querySelector('.tengokbawah');
	const tengokkiri = document.querySelector('.tengokkiri');
	const tengokkanan = document.querySelector('.tengokkanan');
	const naik = document.querySelector('.naik');
	const turun = document.querySelector('.turun');
	const resetkamera = document.querySelector('.resetkamera');
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                Pergerakan Kamera
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // servo1 dangak ========= DANGAK ========== ==========================================================================================
	var toggle_dangak = -1;
	tengokatas.addEventListener('pointerdown', (event) => {
	  console.log('bergerak tengok atas');
	  if (toggle_dangak == -1)
        toggle_dangak = setInterval(dangak_topic, 100 /*execute every 100ms*/);
	});
	
	tengokatas.addEventListener('pointerup', (event) => {
	  console.log('berhenti tengok atas');
	  if (toggle_dangak != -1) {  //Only stop if exists
        clearInterval(toggle_dangak);
        toggle_dangak = -1;
      }
	});
	
    // ========== Send Topic ==========
    function dangak_topic() {
      let isi = "dangak\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
    }

    // mup_ser1_headleft ========== NUNDUK ==========
	var toggle_nunduk = -1;
	tengokbawah.addEventListener('pointerdown', (event) => {
	  console.log('bergerak tengok atas');
	  if (toggle_nunduk == -1)
        toggle_nunduk = setInterval(nunduk_topic, 100 /*execute every 100ms*/);
	});
	
	tengokbawah.addEventListener('pointerup', (event) => {
	  console.log('berhenti tengok atas');
	  if (toggle_nunduk != -1) {  //Only stop if exists
        clearInterval(toggle_nunduk);
        toggle_nunduk = -1;
      }
	});
	
    // ========== Send Topic ==========
    function nunduk_topic() {
      let isi = "nunduk\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                Pergerakan Layar
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // ser2_headleft ========== TENGOK KIRI ========== ====================================================================================
	var toggle_layarkiri = -1;
	tengokkiri.addEventListener('pointerdown', (event) => {
	  console.log('bergerak tengok kiri');
	  if (toggle_layarkiri == -1)
        toggle_layarkiri = setInterval(layarkiri_topic, 100 /*execute every 100ms*/);
	});
	
	tengokkiri.addEventListener('pointerup', (event) => {
	  console.log('berhenti tengok kiri');
	  if (toggle_layarkiri != -1) {  //Only stop if exists
        clearInterval(toggle_layarkiri);
        toggle_layarkiri = -1;
      }
	});

    // ========== Send Topic ==========
    function layarkiri_topic() {
      let isi = "layarkiri\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
    }

    // ser2_headright ========== TENGOK KANAN ==========
    var toggle_layarkanan = -1;
	tengokkanan.addEventListener('pointerdown', (event) => {
	  console.log('bergerak tengok kanan');
	  if (toggle_layarkanan == -1)
        toggle_layarkanan = setInterval(layarkanan_topic, 100 /*execute every 100ms*/);
	});
	
	tengokkanan.addEventListener('pointerup', (event) => {
	  console.log('berhenti tengok kanan');
	  if (toggle_layarkanan != -1) {  //Only stop if exists
        clearInterval(toggle_layarkanan);
        toggle_layarkanan = -1;
      }
	});

    // ========== Send Topic ==========
    function layarkanan_topic() {
      let isi = "layarkanan\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                Pergerakan Tinggi Badan
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // naik ========= Send Topic NAIK ========== ==========================================================================================
	naik.addEventListener('pointerdown', (event) => {
	  console.log('bergerak naik');
	  let isi = "naik\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
	});
	
	naik.addEventListener('pointerup', (event) => {
	  console.log('berhenti naik');
	  let isi = "stop\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
	});

    // turun ========= Send Topic TURUN ========== ==========================================================================================
	turun.addEventListener('pointerdown', (event) => {
	  console.log('bergerak turun');
	  let isi = "turun\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
	});
	
	turun.addEventListener('pointerup', (event) => {
	  console.log('berhenti turun');
	  let isi = "stop\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
	});
    
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                Reset Ke Tengah
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // reset ========= Send Topic RESET ========== ==========================================================================================
	resetkamera.addEventListener('pointerdown', (event) => {
	  console.log('Kembali ke tengah');
	  let isi = "resetkamera\nresetlayar\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
	});
	