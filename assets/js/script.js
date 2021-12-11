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