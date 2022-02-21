let allPrice = document.getElementsByClassName('product-in-cart-price');
let allCount = document.getElementsByClassName('product-in-cart-count');
let allShowPrice = document.getElementsByClassName('product-cart-price');
let allId = document.getElementsByClassName('product-in-cart-id');
let sum = 0;

calculatePrice();
for (let i=0 ; i<allPrice.length ; i++)
{
    allCount[i].addEventListener('change',calculatePrice);
    allCount[i].addEventListener('change',function () {
        setCount(i);
    });
}

function calculatePrice()
{
    allPrice = document.getElementsByClassName('product-in-cart-price');
    allCount = document.getElementsByClassName('product-in-cart-count');
    allShowPrice = document.getElementsByClassName('product-cart-price');

    for (let i=0 ; i<allPrice.length ; i++)
    {
        allShowPrice[i].textContent = '$'+(Number(allPrice[i].value)*Number(allCount[i].value));
        sum += (Number(allPrice[i].value)*Number(allCount[i].value));
    }
    document.getElementById('final_price').textContent = '$'+sum;
    sum=0;
}

function setCount(i)
{
    let xhr = new XMLHttpRequest();
    xhr.open('get','/cart/count/'+allId[i].value+'/'+allCount[i].value,true);
    xhr.setRequestHeader('content-type','application/www-form-urlencoded');
    xhr.send();
}
