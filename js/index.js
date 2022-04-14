const typedtextspan = document.querySelector(".typed-text");
const cursorspan = document.querySelector(".cursor");
const togglehome = document.getElementById("home");
//const toggleblog = document.getElementById("blog");
const togglecontact = document.getElementById("contact");
const toggleabout = document.getElementById("about");
const togglelogin = document.getElementById("login");
const textarray = ["blog","fun","a journey"];
const typingdelay = 300;
const erasingdelay = 200;
const newtextdelay = 1000;

let textarrayindex = 0;
let charindex = 0;

function type() {
    if(charindex < textarray[textarrayindex].length)
    {
        //if(!cursorspan.classList.contains("typing")) cursorspan.classList.add("typing");
        typedtextspan.textContent += textarray[textarrayindex].charAt(charindex);
        charindex++;
        setTimeout(type, typingdelay);
    }
    else
    {
        //cursorspan.classList.remove("typing");
        setTimeout(erase, erasingdelay);
    }
}
function erase()
{
    if(charindex>0)
    {
        typedtextspan.textContent = textarray[textarrayindex].substring(0,charindex-1);
        charindex--;
        setTimeout(erase,erasingdelay);
    }
    else {
        textarrayindex++;
        if(textarrayindex>=textarray.length)
        {
            textarrayindex = 0;
        }
        setTimeout(type, typingdelay+1100);
    }
}

setTimeout(type, newtextdelay+250);

function mytoggle()
{
    if(togglehome.classList.contains("activated") && toggleabout.classList.contains("activated")&& toggleblog.classList.contains("activated")
    && togglecontact.classList.contains("activated") && togglelogin.classList.contains("activated"))
    {
        toggleabout.classList.remove("activated");
        toggleblog.classList.remove("activated");
        togglecontact.classList.remove("activated");
        togglehome.classList.remove("activated");
        togglelogin.classList.remove("activated");
    }
    else
    {
        toggleabout.classList.add("activated");
        toggleblog.classList.add("activated");
        togglecontact.classList.add("activated");
        togglehome.classList.add("activated");
        togglelogin.classList.add("activated");
    }
}

