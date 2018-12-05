//charset "utf-8";
// JavaScript Document

	{	
	var quest;
	var qnum;
	var answered=0;
	var answeredp=0;
	var good=0;
	var bad=0;
	var goodp=0;
	var badp=0;
	marked=new Array(qnum);
	}
	
// Проверка правильности ответа на вопрос
	function answer(quest,answer) {		
		if (document.forms[quest].elements[answer].checked)
		{
			document.forms[quest].img.src="/img/eyegreen.gif";
			good++;
		 	marked[quest]=1;			
		}
		else {
			document.forms[quest].img.src="/img/eyered.gif";
			bad++;
		 	marked[quest]=-1;			
		}
		answered++;			
		answeredp=Math.round(answered/qnum*100);
		goodp=Math.round(good/answered*100);
		badp=Math.round(bad/answered*100);
		document.forms[quest].Button1.disabled=true;		
		document.form01.textfield1.value=qnum;
		document.form02.textfield2.value=(answered+" = "+answeredp+"%");
		document.form03.textfield3.value=(good+" = "+goodp+"%");
		document.form04.textfield4.value=(bad+" = "+badp+"%")
	}

// Снимаем блокировку с кнопки
	function ButOn(quest) {
		document.forms[quest].Button1.disabled=false;
		
		if(marked[quest]==1)
		{
			answered--;
			good--;			
		}
		if(marked[quest]==-1) {
			answered--;				
			bad--;
		}
	}

// Определяем количество вопросов	
	function HowManyQuest (x) {qnum=x}
	
// Подсказка	
	function Help(quest,answer) {
		var par = document.forms[quest].getElementsByTagName("li");
		if (par[answer].style.backgroundColor!="") {
 			par[answer].style.backgroundColor="";
                        var tmp = document.forms[quest].Button2.value;                        
			document.forms[quest].Button2.value = document.forms[quest].Button3.value;
                        document.forms[quest].Button3.value = tmp;
                        document.forms[quest].Button2.style.backgroundColor="#ffed4a";
		}
		else {
			par[answer].style.backgroundColor="#B0CE81";
                        var tmp = document.forms[quest].Button2.value;                        
			document.forms[quest].Button2.value = document.forms[quest].Button3.value;
                        document.forms[quest].Button3.value = tmp;
                        document.forms[quest].Button2.style.backgroundColor="transparent";
		}
	}
