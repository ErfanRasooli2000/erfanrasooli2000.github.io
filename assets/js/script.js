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
        all[i].style.display='none';
    }
    for (let i=0 ; i < size_chosen ; i++)
    {
        console.log('g');
        chosen[i].style.display='inline-block';
    }

    document.getElementById('deve').classList.remove('shadow');
    document.getElementById('photo').classList.remove('shadow');
    document.getElementById('plugin').classList.remove('shadow');
    document.getElementById('design').classList.remove('shadow');
    document.getElementById('all').classList.remove('shadow');
    document.getElementById(name).classList.add('shadow');
}