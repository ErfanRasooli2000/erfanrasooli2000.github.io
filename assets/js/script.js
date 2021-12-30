let slide_now;
function openNavs()
{
    if(document.getElementById('nav-slider').classList.contains('navigation-slider-close'))
    {
        document.getElementById('nav-slider').classList.remove('navigation-slider-close');
        document.getElementById('nav-slider').classList.add('navigation-slider-open');
    }
    else
    {
        document.getElementById('nav-slider').classList.remove('navigation-slider-open');
        document.getElementById('nav-slider').classList.add('navigation-slider-close');
    }
}

function showAllImges(name)
{
    var all = document.getElementsByClassName('work-img');
    if (name!='all')
    {
        var chosen = document.getElementsByClassName('work-img ' + name)
    }
    else
    {
        var chosen = all;
    }

    let size_all = all.length;
    let size_chosen = chosen.length;

    for (let i=0 ; i < size_all ; i++)
    {
            if(all[i].style.display!='none')
            {
                all[i].style.transform='scale(0)';
            }
    }

    setTimeout( () => noner() , 400);
    function noner()
    {
        for (let i=0 ; i < size_all ; i++)
        {
            if(all[i].style.display!='none')
            {
                all[i].style.display='none';
            }
        }
    }
    setTimeout( () => liner() , 400);
    function liner()
    {
        for (let i=0 ; i < size_chosen ; i++)
        {
            chosen[i].style.display='inline-block';
        }
    }
    setTimeout( () => liners() , 500);
    function liners()
    {
        for (let i=0 ; i < size_chosen ; i++)
        {
            chosen[i].style.transform='scale(1)';
        }
    }
    document.getElementById('deve').classList.remove('shadow');
    document.getElementById('photo').classList.remove('shadow');
    document.getElementById('plugin').classList.remove('shadow');
    document.getElementById('design').classList.remove('shadow');
    document.getElementById('all').classList.remove('shadow');
    document.getElementById(name).classList.add('shadow');
}

function first100()
{
    let pagevw = document.body.offsetWidth;
    let marging = document.getElementById('client_slider');
    let current = window.getComputedStyle(marging).getPropertyValue('margin-left');
    slide_now='first100';
   if(current!='0px')
    {
        backcolor('first100');
        document.getElementById('client_slider').style.marginLeft = '0';
    }
}

function secound100()
{
    let pagevw = document.body.offsetWidth;
    let marging = document.getElementById('client_slider');
    let current = window.getComputedStyle(marging).getPropertyValue('margin-left');
    slide_now='secound100';
    if(current!="-"+pagevw+"px")
    {
        backcolor('secound100');
        document.getElementById('client_slider').style.marginLeft = "-"+pagevw+"px";
    }
}

function third100()
{
    let pagevw = document.body.offsetWidth;
    let marging = document.getElementById('client_slider');
    let current = window.getComputedStyle(marging).getPropertyValue('margin-left');
    slide_now='third100';
    if(current!="-"+pagevw*2+"px")
    {
        backcolor('third100');
        document.getElementById('client_slider').style.marginLeft = "-"+pagevw*2+"px";
    }
}

function first50()
{
    let pagevw = document.body.offsetWidth;
    let marging = document.getElementById('client_slider');
    let current = window.getComputedStyle(marging).getPropertyValue('margin-left');
    slide_now='first50';
    if(current!="0")
    {
        backcolor('first50');
        document.getElementById('client_slider').style.marginLeft = "0";
    }
}

function secound50()
{
    let pagevw = document.body.offsetWidth;
    let marging = document.getElementById('client_slider');
    let current = window.getComputedStyle(marging).getPropertyValue('margin-left');
    slide_now='secound50';
    if(current!="-"+pagevw/2+"px")
    {
        backcolor('secound50');
        document.getElementById('client_slider').style.marginLeft = "-"+pagevw/2+"px";
    }
}

function backcolor(main)
{
    document.getElementById('first50').style.color='rgb(134, 151, 145)';
    document.getElementById('secound50').style.color='rgb(134, 151, 145)';
    document.getElementById('first100').style.color='rgb(134, 151, 145)';
    document.getElementById('secound100').style.color='rgb(134, 151, 145)';
    document.getElementById('third100').style.color='rgb(134, 151, 145)';
    document.getElementById(main).style.color='rgb(89 , 89 , 89)';
}

setInterval(slide,5000);
function slide()
{
    switch (slide_now) {
        case 'first100':
            secound100();
            break;
        case 'secound100':
            third100();
            break;
        case 'third100':
            first100();
            break;
        case 'first50':
            secound50();
            break;
        case 'secound50':
            first50();
            break;
        default:
            if (document.body.offsetWidth >= 992)
            {
                first50();
            }
            else
            {
                first100();
            }
    }
}
let typer_text_one = "I'm Erfan .";
let typer_text_two = "I am Developer.";
let cleaner_text;
let clean_which;
let cleanerInter;
let saver = 0;
let sit = 1;
// 0 lets delete
// 1 text one
// 2 text two
let cursor_pos = 1;
let cursor_inter = setInterval(cursor,150);
let all_interval = setInterval(typer_sit,450);

function cursor()
{
    if(cursor_pos==1)
    {
        document.getElementById('typer_cursor').style.color='rgba(255, 255, 255, 1)';
        cursor_pos=2;
    }
    else
    {
        cursor_pos=1;
        document.getElementById('typer_cursor').style.color='rgba(255, 255, 255, 0.7)';
    }
}

function typer_sit()
{
    switch(sit)
    {
        case 1:
            text_one_typer();
            break;
        case 2:
            text_two_typer();
            break;
        case 0:
            cleaner();
            clearInterval(all_interval);
            cleanerInter = setInterval(cleaner,150);
            break;
    }
}
function text_one_typer()
{
    if(typer_text_one[saver]!=undefined)
    {
        if(typer_text_one[saver]==' ')
        {
            document.getElementById('typer_holder').innerText =
                document.getElementById('typer_holder').innerText + typer_text_one[saver]
                + typer_text_one[saver+1];
            saver = saver + 2;
        }
        else
        {
            document.getElementById('typer_holder').innerText =
                document.getElementById('typer_holder').innerText + typer_text_one[saver];
            saver++;
        }
    }
    else
    {
        sit = 0;
        clean_which = 2;
        cleaner_text = document.getElementById('typer_holder').innerText;
    }
}
function text_two_typer()
{
    if(typer_text_two[saver]!=undefined)
    {
        if(typer_text_two[saver]==' ')
        {
            document.getElementById('typer_holder').innerText =
                document.getElementById('typer_holder').innerText + typer_text_two[saver]
                + typer_text_two[saver+1];
            saver = saver + 2;
        }
        else
        {
            document.getElementById('typer_holder').innerText =
                document.getElementById('typer_holder').innerText + typer_text_two[saver];
            saver++;
        }
    }
    else
    {
        sit = 0;
        clean_which = 1;
        cleaner_text = document.getElementById('typer_holder').innerText;
    }
}
function cleaner()
{
    cleaner_text = cleaner_text.substring(0,saver);
    document.getElementById('typer_holder').innerText = cleaner_text;
    saver--;
    if (saver==-1)
    {
        saver=0;
        sit=clean_which;
        clearInterval(cleanerInter);
        all_interval = setInterval(typer_sit,450)
    }
}