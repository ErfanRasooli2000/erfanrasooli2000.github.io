let price = document.getElementById('price');
let discount = document.getElementById('discount');
let detailCounter = 0;
let aboutCounter = 1;


price.addEventListener('change',finalPrice);
discount.addEventListener('change',finalPrice);

function finalPrice()
{
    if(price.value>=1 && discount.value>=0)
    {
        document.getElementById('finalPrice').innerText = "Final Price : " + Number(price.value)*(100-Number(discount.value))/100;
    }
}


let addbtn = document.getElementById('addItemBox');
addbtn.addEventListener('click',addbox);


function addbox()
{
    aboutCounter++;
    document.getElementById('aboutThisItem').insertAdjacentHTML('afterend','<input class="w-100 mt-2 aboutThis" name="about'+aboutCounter+'" type="text" placeholder="About This item">');
    document.getElementById('aboutcounter').value = aboutCounter;
}

let subCategory2 = document.getElementById('sub-category');
subCategory2.addEventListener('change',addDetails);

function addDetails()
{
    console.log('ssd');
    document.getElementById('details').innerHTML = '<h4>Add Details to This Item</h4>\n' +
        '<hr>\n' +
        '<div id="detailsHolder">\n' +
        '</div>\n' +
        '<i id="addDetailBox" class="mt-2 add-btn bi bi-plus-circle"></i>';
    let addDetailbtn = document.getElementById('addDetailBox');
    addDetailbtn.addEventListener('click',findDetails);
}

function findDetails()
{
    detailCounter++;
    let xhr = new XMLHttpRequest();
    xhr.open('GET','/admin/details/'+subCategory2.value+'/'+detailCounter,true);
    xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
    xhr.send();
    xhr.onreadystatechange = function (){
        if(xhr.readyState==4 && xhr.status==200)
        {
            let holder = document.getElementById('detailsHolder');
            holder.insertAdjacentHTML('beforeend',xhr.responseText);
            document.getElementById('detailcounter').value = detailCounter;
        }
    };
}
