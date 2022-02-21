let sideNavClick = document.getElementById('sideNavClick');
let allNavOverly = document.getElementById('allNavOverly');
let allNavClose  = document.getElementById('allNavClose');
let navContent  = document.getElementById('navContent');

sideNavClick.addEventListener('click',openNav);
allNavClose.addEventListener('click',closeNav);

function openNav()
{
    allNavOverly.style.display='block';
    navContent.style.display='block';
    setTimeout(()=>{
        allNavClose.style.display = 'block';
        allNavOverly.style.opacity = '1';
        navContent.style.left = '0px';
    },400);
}
function closeNav()
{
    allNavOverly.style.opacity = '0';
    allNavClose.style.display = 'none';
    navContent.style.left = '-370px';
    setTimeout(() => {
        allNavOverly.style.display='none';
        navContent.style.display='none';
    }, 400);

}


let sideAll = document.getElementsByClassName('menu_nav');
let menu = [];
let submenu = [];
let status = [];
let i;
let id=[];

for(let j=0 ; j<sideAll.length ; j++)
{
    if(sideAll[j].getAttribute('id').length==5)
    {
        i = Number(sideAll[j].getAttribute('id')[4]);
    }
    else
    {
        i = Number(sideAll[j].getAttribute('id')[4]+sideAll[j].getAttribute('id')[5]);
    }
    menu[i] = document.getElementById('menu'+i);
    submenu[i] = document.getElementById('submenu'+i);
    submenu[i].style.display = 'none';
    status[i] = 0;
}

function clickedNav(i)
{
    if(status[i]==0)
    {
        submenu[i].style.display = 'flex';
        status[i]=1;
    }
    else
    {
        submenu[i].style.display = 'none';
        status[i]=0;
    }
}

function favourite(user_id , product_id)
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
                arr = document.getElementsByClassName('favouriteBtn'+product_id);
                for(let i=0 ; i<arr.length ; i++)
                {
                    arr[i].classList.add('selected-btn');
                }
            }
            else if(xhr.responseText=='deleted')
            {
                arr = document.getElementsByClassName('favouriteBtn'+product_id);
                for(let i=0 ; i<arr.length ; i++)
                {
                    arr[i].classList.remove('selected-btn');
                }
            }
        }
    }
}
function tocart(user_id , product_id)
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
                arr = document.getElementsByClassName('cartBtn'+product_id);
                for(let i=0 ; i<arr.length ; i++)
                {
                    arr[i].classList.add('selected-btn');
                }
            }
            else if(xhr.responseText=='deleted')
            {

                arr = document.getElementsByClassName('cartBtn'+product_id);
                for(let i=0 ; i<arr.length ; i++)
                {
                    arr[i].classList.remove('selected-btn');
                }
            }
        }
    }
}

function favouriteAddToCart(product_id)
{
    let xhr = new XMLHttpRequest();
    xhr.open('get','/cart/'+product_id+'/1',true);
    xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
    xhr.send();
    xhr.onreadystatechange = function ()
    {
        if(xhr.readyState==4 && xhr.status==200)
        {
            if(xhr.responseText=='added')
            {
                document.getElementById('favouriteaddtocartbtn'+product_id).classList.add('in-cart');
                document.getElementById('favouriteaddtocartbtn'+product_id).classList.remove('add-to-cart');
                document.getElementById('favouriteaddtocartbtn'+product_id).textContent='In Cart';
            }
            else if(xhr.responseText=='deleted')
            {
                document.getElementById('favouriteaddtocartbtn'+product_id).classList.remove('in-cart');
                document.getElementById('favouriteaddtocartbtn'+product_id).classList.add('add-to-cart');
                document.getElementById('favouriteaddtocartbtn'+product_id).textContent='Add To Cart';
            }
        }
    }
}
