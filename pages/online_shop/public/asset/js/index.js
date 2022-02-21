document.getElementById('slide-left').addEventListener('click',slide_left);
document.getElementById('slide-right').addEventListener('click',slide_right);
let slider_pos=1;

function slide_left()
{
    let pagewidth = document.body.offsetWidth;
    console.log(pagewidth);
    switch (slider_pos)
    {
        case 1:
            document.getElementById('slider-holder').style.marginLeft = '-'+pagewidth*3+'px';
            slider_pos = 4;
            break;
        case 2:
            document.getElementById('slider-holder').style.marginLeft = '0px';
            slider_pos = 1;
            break;
        case 3:
            document.getElementById('slider-holder').style.marginLeft = '-'+pagewidth+'px';
            slider_pos = 2;
            break;
        case 4:
            document.getElementById('slider-holder').style.marginLeft = '-'+pagewidth*2+'px';
            slider_pos = 3;
            break;
    }
}
function slide_right()
{
    let pagewidth = document.body.offsetWidth;
    console.log(pagewidth);
    switch (slider_pos)
    {
        case 1:
            document.getElementById('slider-holder').style.marginLeft = '-'+pagewidth+'px';
            slider_pos = 2;
            break;
        case 2:
            document.getElementById('slider-holder').style.marginLeft = '-'+pagewidth*2+'px';
            slider_pos = 3;
            break;
        case 3:
            document.getElementById('slider-holder').style.marginLeft = '-'+pagewidth*3+'px';
            slider_pos = 4;
            break;
        case 4:
            document.getElementById('slider-holder').style.marginLeft = '0px';
            slider_pos = 1;
            break;
    }
}

