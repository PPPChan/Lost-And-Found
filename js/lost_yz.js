function checkNumber(field){ 
	var reg=/^1[3|4|5|8][0-9]\d{4,8}$/i;
	with(field) {
		if(value.length==0) {
			return
		}
		else if(value.length<11) {
			alert('手机号长度有误！'); 
			return false
		}
		else if(!reg.test(value)) { 
			alert('手机号不存在!'); 
			return false
		}
		else {
			return true
		}
	}
}

function checkDate(field){ 
	with(field) {
		var obj_value=value.replace(/-/g,"/");//替换字符，变成标准格式(检验格式为：'2009-12-10') 
		var date1=new Date(Date.parse(obj_value)); 
		var date2=new Date();//取今天的日期 
		if(value=="") {
			alert("请填写丢失日期！");
			return false
		}
		else if(date1>date2){ 
			alert("请正确填写丢失日期！"); 
			return false; 
		}
		else {
			return true;
		}
	}
} 

function validate_required(field,alerttxt) {
	with (field) {
		if (value==null||value=="") {
			alert(alerttxt);
			return false
		}
		else {
			return true
		}
	}
}

function validate_form(thisform) {
	with (thisform) {
		if(checkDate(time)==false) {
			time.focus();
			return false
		}
		else if (validate_required(infotype,"请选择信息类型！")==false) {
			infotype.focus();
			return false
		}
		else if(validate_required(name,"请填写姓名！")==false) {
			name.focus();
			return false
		}
		else if(checkNumber(pnumber)==false) {
			pnumber.focus();
			return false
		}
		else if(validate_required(campus,"请选择校区！")==false) {
			campus.focus();
			return false
		}		
		else if(validate_required(title,"请填写标题！")==false) {
			title.focus();
			return false
		}
		else if(validate_required(ttype,"请填写丢失物品！")==false) {
			ttype.focus();
			return false
		}
		
		
	}
}