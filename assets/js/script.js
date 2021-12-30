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
    console.log(main);
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