var replylist = document.querySelectorAll('.reply');
var index = 0;
for (var i = 0; i < replylist.length; i++) {
    replylist[i].onclick = function(e) {
        e.preventDefault();
        // console.log(e.target.parentElement[3].nextElementSibling);
        if (index % 2 == 0) {
            e.target.parentElement.parentElement.parentElement.nextElementSibling.removeAttribute('hidden');
            index++;
        } else {
            e.target.parentElement.parentElement.parentElement.nextElementSibling.setAttribute('hidden', 'true');
            index++;
        }
    }
}

var like = document.querySelectorAll('.like_click');
var index2 = 0;
for (var i = 0; i < like.length; i++) {
    like[i].onclick = function(e) {
        e.preventDefault();
        // console.log(e.target.firstChild);
        if (index2 % 2 == 0) {
            e.target.firstChild.removeAttribute('src');
            e.target.firstChild.setAttribute('src', 'img/like2.png');
            index2++;
        } else {
            e.target.firstChild.removeAttribute('src');
            e.target.firstChild.setAttribute('src', 'img/like1.png');
            index2++;
        }
    }
}
var repair_rep = document.querySelectorAll('.repair_rep');
if (repair_rep != null) {
    for (var i = 0; i < repair_rep.length; i++) {
        repair_rep[i].onclick = function(e) {
            e.preventDefault();
            // console.log(e.target.parentElement.parentElement.nextElementSibling);
            e.target.parentElement.parentElement.previousElementSibling.childNodes[3].removeAttribute('disabled');
            e.target.parentElement.parentElement.setAttribute('hidden', 'true');
            e.target.parentElement.parentElement.nextElementSibling.removeAttribute('hidden');
        }
    }
}
var cancel_rep = document.querySelectorAll('.cancel_rep');
// console.log(cancel);
if (cancel_rep != null) {
    for (var i = 0; i < cancel_rep.length; i++) {
        cancel_rep[i].onclick = function(e) {
            e.preventDefault();
            // console.log(e.target.parentElement.previousElementSibling.previousElementSibling.childNodes);
            e.target.parentElement.previousElementSibling.previousElementSibling.childNodes[3].setAttribute('disabled', 'true');
            e.target.parentElement.setAttribute('hidden', 'true');
            e.target.parentElement.previousElementSibling.removeAttribute('hidden');
            var rep1 = e.target.parentElement.previousElementSibling.previousElementSibling.childNodes[3].innerHTML;
            e.target.parentElement.previousElementSibling.previousElementSibling.childNodes[3].value = rep1;
        }
    }
}
var repair_cmt = document.querySelectorAll('.repair_cmt');
if (repair_cmt != null) {
    for (var i = 0; i < repair_cmt.length; i++) {
        repair_cmt[i].onclick = function(e) {
            e.preventDefault();
            console.log(e.target.parentElement.parentElement.previousElementSibling.childNodes[3]);
            e.target.parentElement.parentElement.previousElementSibling.childNodes[3].removeAttribute('disabled');
            e.target.parentElement.parentElement.setAttribute('hidden', 'true');
            e.target.parentElement.parentElement.nextElementSibling.removeAttribute('hidden');
        }
    }
}
var cancel_cmt = document.querySelectorAll('.cancel_cmt');
// console.log(cancel);
if (cancel_cmt != null) {
    for (var i = 0; i < cancel_cmt.length; i++) {
        cancel_cmt[i].onclick = function(e) {
            e.preventDefault();
            // console.log(e.target.parentElement.previousElementSibling.previousElementSibling.childNodes);
            e.target.parentElement.previousElementSibling.previousElementSibling.childNodes[3].setAttribute('disabled', 'true');
            e.target.parentElement.setAttribute('hidden', 'true');
            e.target.parentElement.previousElementSibling.removeAttribute('hidden');
            var cmt1 = e.target.parentElement.previousElementSibling.previousElementSibling.childNodes[3].innerHTML;
            e.target.parentElement.previousElementSibling.previousElementSibling.childNodes[3].value = cmt1;
        }
    }
}