var textitos = {
	en:{
		message:'This site uses cookies , including third parties , to provide you best navigation experience . Continuing navigation is regarded that use in accordance with our ',
		link:'http://sanremo-on.com/en/cookies.html',
		tlink:'cookie policy',
		button:'Do not show this message again'
	},
	it:{
		message:'Questo sito utilizza i cookie, anche di terze parti, per offrirti un\'esperienza di navigazione migliore. Continuando la navigazione si considera accettato tale uso in accordo con la nostra',
		link:'http://sanremo-on.com/it/cookies.html',
		tlink:'cookie policy',
		button:'Non mostrare di nuovo questo messaggio'
	},
	fr:{
		message:'Ce site utilise des cookies, y compris des tiers, de vous fournir la meilleure expérience de navigation. De poursuivre la navigation est considéré que l\'utilisation conformément à notre',
		link:'http://sanremo-on.com/fr/cookies.html',
		tlink:'cookie policy',
		button:'Ne plus afficher ce message'
	},
		ru:{
		message:'Этот сайт использует cookies, в том числе третьих сторон, чтобы предоставить вам лучший опыт навигации. Продолжая навигации считается, использующие в соответствии с нашей',
		link:'http://sanremo-on.com/r/cookies.html',
		tlink:'печенье policyr',
		button:'Больше не показывать это сообщение'
	}

}

window.cookieconsent_options ={"message":textitos[idioma].message,"dismiss":textitos[idioma].button,"learnMore":textitos[idioma].tlink,"link":textitos[idioma].link,"theme":"light-floating"};


var s = document.createElement("script");
s.type = "text/javascript";
s.src = "//s3.amazonaws.com/cc.silktide.com/cookieconsent.latest.min.js";
$("head").append(s);
var style = document.createElement('style');
style.innerHTML = '.cc_btn.cc_btn_accept_all{bottom:15px}.cc_btn.cc_btn_accept_all{bottom:15px}.cc_btn.cc_btn_accept_all{background:#c9840d none repeat scroll 0 0!important;color:#fff!important;font-family: open sans;font-size: 13px;}.cc_logo{display:none !important;}.cc_message{font-family: open sans;font-size: 13px !important;text-align: center !important;}';
$('body').append(style);



