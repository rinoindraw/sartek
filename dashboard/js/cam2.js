	const atas = document.querySelector('.tengokatas');
	const bawah = document.querySelector('.tengokbawah');
	const kiri = document.querySelector('.tengokkiri');
	const kanan = document.querySelector('.tengokkanan');
	const naik = document.querySelector('.naik');
	const turun = document.querySelector('.turun');
	const resetkamera = document.querySelector('.resetkamera');
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                Pergerakan Layar
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // atas ========= Send Topic ATAS ========== ==========================================================================================
	atas.addEventListener('pointerdown', (event) => {
	  console.log('e');
	  let isi = "e\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
	});
	
	atas.addEventListener('pointerup', (event) => {
	  console.log('s');
	  let isi = "s\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
	});

    // bawah ========= Send Topic BAWAH ========== ==========================================================================================
	bawah.addEventListener('pointerdown', (event) => {
	  console.log('f');
	  let isi = "f\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
	});
	
	bawah.addEventListener('pointerup', (event) => {
	  console.log('s');
	  let isi = "s\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
	});

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                Pergerakan Layar
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // kiri ========= Send Topic KIRI ========== ==========================================================================================
	kiri.addEventListener('pointerdown', (event) => {
	  console.log('c');
	  let isi = "c\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
	});
	
	kiri.addEventListener('pointerup', (event) => {
	  console.log('s');
	  let isi = "s\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
	});

    // kanan ========= Send Topic KANAN ========== ==========================================================================================
	kanan.addEventListener('pointerdown', (event) => {
	  console.log('d');
	  let isi = "d\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
	});
	
	kanan.addEventListener('pointerup', (event) => {
	  console.log('s');
	  let isi = "s\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
	});

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                Pergerakan Tinggi Badan
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // naik ========= Send Topic NAIK ========== ==========================================================================================
	naik.addEventListener('pointerdown', (event) => {
	  console.log('a');
	  let isi = "a\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
	});
	
	naik.addEventListener('pointerup', (event) => {
	  console.log('s');
	  let isi = "s\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
	});

    // turun ========= Send Topic TURUN ========== ==========================================================================================
	turun.addEventListener('pointerdown', (event) => {
	  console.log('b');
	  let isi = "b\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
	});
	
	turun.addEventListener('pointerup', (event) => {
	  console.log('s');
	  let isi = "s\n"
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
	  let isi = "rst\n"
      var msg = new ROSLIB.Message({
        data: isi
      });
      console.log(msg);
      serial_listener.publish(msg);
	});
	