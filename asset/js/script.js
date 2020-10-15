function showForm(x) {
	var formFirst = document.querySelectorAll('.form-first')[0];
	var formSecond = document.querySelectorAll('.form-second')[0];

	if(x == "first"){
		formFirst.style.display = "block";
		formSecond.style.display = "none";
	}else if(x == "second"){
		formFirst.style.display = "none";
		formSecond.style.display = "block";
	}
}

function passwdConf(){
	var passwd = document.querySelectorAll('.section-body form input[name=passwd]')[0].value;
	var passwdConf = document.querySelectorAll('.section-body form input[name=passwd-conf]')[0].value;
	var formInfo = document.querySelectorAll('.section-body form .info')[0];
	var formBtn = document.querySelectorAll('.section-body form button')[0];

	if(passwd !== "" || passwdConf !== ""){
		if(passwd !== passwdConf){
			formInfo.innerHTML = "Kata sandi salah!";
			formInfo.style.color = "#f44336";
			formInfo.style.fontWeight = "bold";
			formBtn.disabled = true;
		}else if(passwd === passwdConf){
			formInfo.innerHTML = "*) Wajib untuk diisi.";
			formInfo.style.color = "#666";
			formInfo.style.fontWeight = "normal";
			formBtn.disabled = false;
		}
	}
}