function lh_faq_shortcode_hasClass(el, className) {
  if (el.classList)
    return el.classList.contains(className)
  else
    return !!el.className.match(new RegExp('(\\s|^)' + className + '(\\s|$)'))
}

function lh_faq_shortcode_addClass(el, className) {
  if (el.classList)
    el.classList.add(className)
  else if (!lh_faq_shortcode_hasClass(el, className)) el.className += " " + className
}

function lh_faq_shortcode_removeClass(el, className) {
  if (el.classList)
    el.classList.remove(className)
  else if (lh_faq_shortcode_hasClass(el, className)) {
    var reg = new RegExp('(\\s|^)' + className + '(\\s|$)')
    el.className=el.className.replace(reg, ' ')
  }
}

function lh_faq_shortcode_createcss(content) {
	// Create the <style> tag
	var style = document.createElement("style");

	// Add a media (and/or media query) here if you'd like!
        style.setAttribute("media", "screen")


	// WebKit hack :(
	style.appendChild(document.createTextNode(content));

	// Add the <style> element to the page
	document.head.appendChild(style);

	return style.sheet;
};




function lh_faq_shortcode_hide_answers(){

var acc = document.getElementsByClassName("lh_faq_shortcode-question");
var i;

for (i = 0; i < acc.length; i++) {

lh_faq_shortcode_removeClass(acc[i], 'lh_faq_shortcode-question-active');
lh_faq_shortcode_addClass(acc[i], 'lh_faq_shortcode-question-inactive');
lh_faq_shortcode_removeClass(acc[i].nextElementSibling, 'lh_faq_shortcode-answer-active');
lh_faq_shortcode_addClass(acc[i].nextElementSibling, 'lh_faq_shortcode-answer-inactive');



}



}


function lh_faq_shortcode_run_js(){

lh_faq_shortcode_createcss(".lh_faq_shortcode-question { cursor: pointer; cursor: hand; margin-top: 1em; } .lh_faq_shortcode-question-inactive:before { content: \"+ \";} .lh_faq_shortcode-question-active:before { content: \"- \";} .lh_faq_shortcode-answer-inactive { display: none; } .lh_faq_shortcode-answer-active { display: block; }");


var acc = document.getElementsByClassName("lh_faq_shortcode-question");
var i;

for (i = 0; i < acc.length; i++) {


lh_faq_shortcode_addClass(acc[i], 'lh_faq_shortcode-question-inactive');
lh_faq_shortcode_addClass(acc[i].nextElementSibling, 'lh_faq_shortcode-answer-inactive');

    acc[i].onclick = function(){

if (lh_faq_shortcode_hasClass(this.nextElementSibling, 'lh_faq_shortcode-answer-inactive')){
 lh_faq_shortcode_hide_answers();
lh_faq_shortcode_removeClass(this, 'lh_faq_shortcode-question-inactive');
lh_faq_shortcode_addClass(this, 'lh_faq_shortcode-question-active');
lh_faq_shortcode_removeClass(this.nextElementSibling, 'lh_faq_shortcode-answer-inactive');
lh_faq_shortcode_addClass(this.nextElementSibling, 'lh_faq_shortcode-answer-active');
document.location.hash = this.id;
} else {

 lh_faq_shortcode_hide_answers();


}

    }

}

if (document.location.hash){

if (document.getElementById(document.location.hash.slice(1))){

if (lh_faq_shortcode_hasClass(document.getElementById(document.location.hash.slice(1)), 'lh_faq_shortcode-question')){

lh_faq_shortcode_removeClass(document.getElementById(document.location.hash.slice(1)), 'lh_faq_shortcode-question-inactive');
lh_faq_shortcode_addClass(document.getElementById(document.location.hash.slice(1)), 'lh_faq_shortcode-question-active');
lh_faq_shortcode_removeClass(document.getElementById(document.location.hash.slice(1)).nextElementSibling, 'lh_faq_shortcode-answer-inactive');
lh_faq_shortcode_addClass(document.getElementById(document.location.hash.slice(1)).nextElementSibling, 'lh_faq_shortcode-answer-active');

}

}


}

}

lh_faq_shortcode_run_js();