let star1 = document.getElementById('star1');
let star2 = document.getElementById('star2');
let star3 = document.getElementById('star3');
let star4 = document.getElementById('star4');
let star5 = document.getElementById('star5');

let DefaultColor = 'rgba(255, 69, 0, 0.35)';

let star1DefaultColor = DefaultColor;
let star2DefaultColor = DefaultColor;
let star3DefaultColor = DefaultColor;
let star4DefaultColor = DefaultColor;
let star5DefaultColor = DefaultColor;

let lastRate = Number(document.getElementById('rate').value);
console.log(lastRate);
switch (lastRate)
{
    case 1:
        star1DefaultColor = 'orangered';
        star2DefaultColor = DefaultColor;
        star3DefaultColor = DefaultColor;
        star4DefaultColor = DefaultColor;
        star5DefaultColor = DefaultColor;
    break;
    case 2:
        star1DefaultColor = 'orangered';
        star2DefaultColor = 'orangered';
        star3DefaultColor = DefaultColor;
        star4DefaultColor = DefaultColor;
        star5DefaultColor = DefaultColor;
    break;
    case 3:
        star1DefaultColor = 'orangered';
        star2DefaultColor = 'orangered';
        star3DefaultColor = 'orangered';
        star4DefaultColor = DefaultColor;
        star5DefaultColor = DefaultColor;
    break;
    case 4:
        star1DefaultColor = 'orangered';
        star2DefaultColor = 'orangered';
        star3DefaultColor = 'orangered';
        star4DefaultColor = 'orangered';
        star5DefaultColor = DefaultColor;
    break;
    case 5:
        star1DefaultColor = 'orangered';
        star2DefaultColor = 'orangered';
        star3DefaultColor = 'orangered';
        star4DefaultColor = 'orangered';
        star5DefaultColor = 'orangered';
    break;
}
allToDefault();


star5.onmouseover = function () {
    star1.style.color='orangered';
    star2.style.color='orangered';
    star3.style.color='orangered';
    star4.style.color='orangered';
    star5.style.color='orangered';
}
star5.onmouseout = function () {
    star1.style.color=star1DefaultColor;
    star2.style.color=star2DefaultColor;
    star3.style.color=star3DefaultColor;
    star4.style.color=star4DefaultColor;
    star5.style.color=star4DefaultColor;
}

star4.onmouseover = function () {
    star1.style.color='orangered';
    star2.style.color='orangered';
    star3.style.color='orangered';
    star4.style.color='orangered';
}
star4.onmouseout = function () {
    star1.style.color=star1DefaultColor;
    star2.style.color=star2DefaultColor;
    star3.style.color=star3DefaultColor;
    star4.style.color=star4DefaultColor;
}

star3.onmouseover = function () {
    star1.style.color='orangered';
    star2.style.color='orangered';
    star3.style.color='orangered';
}
star3.onmouseout = function () {
    star1.style.color=star1DefaultColor;
    star2.style.color=star2DefaultColor;
    star3.style.color=star3DefaultColor;
}

star2.onmouseover = function () {
    star1.style.color='orangered';
    star2.style.color='orangered';
}
star2.onmouseout = function () {
    star1.style.color=star1DefaultColor;
    star2.style.color=star2DefaultColor;
}

star1.onmouseover = function () {
    star1.style.color='orangered';
}
star1.onmouseout = function () {
    star1.style.color=star1DefaultColor;
}

star1.addEventListener('click',function () {
    star1DefaultColor = 'orangered';
    star2DefaultColor = DefaultColor;
    star3DefaultColor = DefaultColor;
    star4DefaultColor = DefaultColor;
    star5DefaultColor = DefaultColor;
    allToDefault();
    sendRate(1);
});

star2.addEventListener('click',function () {
    star1DefaultColor = 'orangered';
    star2DefaultColor = 'orangered';
    star3DefaultColor = DefaultColor;
    star4DefaultColor = DefaultColor;
    star5DefaultColor = DefaultColor;
    allToDefault();
    sendRate(2);
});

star3.addEventListener('click',function () {
    star1DefaultColor = 'orangered';
    star2DefaultColor = 'orangered';
    star3DefaultColor = 'orangered';
    star4DefaultColor = DefaultColor;
    star5DefaultColor = DefaultColor;
    allToDefault();
    sendRate(3);
});

star4.addEventListener('click',function () {
    star1DefaultColor = 'orangered';
    star2DefaultColor = 'orangered';
    star3DefaultColor = 'orangered';
    star4DefaultColor = 'orangered';
    star5DefaultColor = DefaultColor;
    allToDefault();
    sendRate(4);
});

star5.addEventListener('click',function () {
    star1DefaultColor = 'orangered';
    star2DefaultColor = 'orangered';
    star3DefaultColor = 'orangered';
    star4DefaultColor = 'orangered';
    star5DefaultColor = 'orangered';
    allToDefault();
    sendRate(5);
});

function allToDefault()
{
    star1.style.color = star1DefaultColor;
    star2.style.color = star2DefaultColor;
    star3.style.color = star3DefaultColor;
    star4.style.color = star4DefaultColor;
    star5.style.color = star5DefaultColor;
}
function allToMain()
{
    star1DefaultColor = DefaultColor;
    star2DefaultColor = DefaultColor;
    star3DefaultColor = DefaultColor;
    star4DefaultColor = DefaultColor;
    star5DefaultColor = DefaultColor;
}

let userId = document.getElementById('userId').value;
let productId = document.getElementById('productId').value;

function sendRate(num)
{
    if(userId!=0)
    {
        let xhr = new XMLHttpRequest();
        xhr.open('GET','/rate/'+userId+'/'+productId+'/'+num,true);
        xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
        xhr.send();
        xhr.onreadystatechange = function()
        {
            if(xhr.readyState==4 && xhr.status==200)
            {
                console.log(xhr.responseText);
                console.log('Okay');
            }
        }
    }
    else
    {
        console.log('not Loged in');
        allToMain();
    }
}


let arr;

function favouritePr(user_id , product_id)
{
    let xhr = new XMLHttpRequest();
    xhr.open('get','/favourite/'+product_id+'/'+user_id,true);
    xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
    xhr.send();
    xhr.onreadystatechange = function ()
    {
        if(xhr.readyState==4 && xhr.status==200)
        {
            if(xhr.responseText=='added')
            {
                document.querySelector('.favouriteBtn'+product_id).classList.add('product-added-to-favourites');
                document.querySelector('.favouriteBtn'+product_id).textContent='Liked';
            }
            else if(xhr.responseText=='deleted')
            {
                document.querySelector('.favouriteBtn'+product_id).classList.remove('product-added-to-favourites');
                document.querySelector('.favouriteBtn'+product_id).textContent='Like';
            }
        }
    }
}
function tocartPr(user_id , product_id)
{
    let xhr = new XMLHttpRequest();
    xhr.open('get','/cart/'+product_id+'/'+user_id,true);
    xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
    xhr.send();
    xhr.onreadystatechange = function ()
    {
        if(xhr.readyState==4 && xhr.status==200)
        {
            if(xhr.responseText=='added')
            {
                document.querySelector('.cartBtn'+product_id).classList.add('product-added-to-basket');
                document.querySelector('.cartBtn'+product_id).textContent='In Cart';
            }
            else if(xhr.responseText=='deleted')
            {
                document.querySelector('.cartBtn'+product_id).classList.remove('product-added-to-basket');
                document.querySelector('.cartBtn'+product_id).textContent='Buy';
            }
        }
    }
}
