let price = document.getElementById('price');
let discount = document.getElementById('discount');

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

let aboutCounter = Number(document.getElementById('aboutcounter').getAttribute('value'));

function addbox()
{
    aboutCounter++;
    document.getElementById('aboutcounter').value = aboutCounter;
    document.getElementById('aboutThisItem').insertAdjacentHTML('beforeend','<input class="w-100 mt-2 aboutThis" name="about'+aboutCounter+'" type="text" placeholder="About This item">');
}

let subject = document.getElementById('subject2');
let category = document.getElementById('category2');
let subCategory = document.getElementById('sub-category2');

subject.addEventListener('change',createCategory);
category.addEventListener('change',createSubCategory);

function createCategory()
{
    HideSubCategory();
    HideCategory();
    let id = subject.value;
    let xhr = new XMLHttpRequest();
    xhr.open('get','/find/category/'+id,true);
    xhr.send();
    xhr.onreadystatechange = function (){
        if(xhr.readyState==4 && xhr.status==200)
        {
            ShowCategory();
            category.innerHTML=xhr.responseText;
        }
    };
}
function createSubCategory()
{
    let id = category.value;
    let xhr = new XMLHttpRequest();
    xhr.open('get','/find/subcategory/'+id,true);
    xhr.send();
    xhr.onreadystatechange = function (){
        if(xhr.readyState==4 && xhr.status==200)
        {
            ShowSubCategory();
            subCategory.innerHTML=xhr.responseText;
        }
    };
}

function ShowCategory()
{
    category.style.display="block";
}
function ShowSubCategory()
{
    addDetails();
    subCategory.style.display="block";
}
function HideCategory()
{
    addDetails();
    category.style.display="none";
}
function HideSubCategory()
{
    addDetails();
    subCategory.style.display="none";
}

let detailCounter = document.getElementById('detailcounter');
let addDetailbtn = document.getElementById('addDetailBox');
addDetailbtn.addEventListener('click',findDetails);

function addDetails()
{
    console.log('ssd');
    document.getElementById('details').innerHTML = '<h4>Add Details to This Item</h4>\n' +
        '<hr>\n' +
        '<div id="detailsHolder">\n' +
        '</div>\n' +
        '<i id="addDetailBox" class="mt-2 add-btn bi bi-plus-circle"></i>';
    detailCounter = 1;
}


let subCategory2 = document.getElementById('sub-category2');
subCategory2.addEventListener('change',addDetails);

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


let uploadBtn = document.getElementById('submitImageUpload');
uploadBtn.addEventListener('click',upload);
let data = document.getElementById('imageUpload').getElementsByTagName('input');
let fileSelect = document.getElementById('product_image');
let allImagesHolder = document.getElementById('allImagesProduct');
HideSpinner();
loadImages();

function upload()
{
    let xhr = new XMLHttpRequest();
    xhr.open('POST','/admin/product/image',true);
    xhr.setRequestHeader('X-Requested-With','Ajax');
    xhr.setRequestHeader('X-CSRF-TOKEN',data[0].value);
    var files = fileSelect.files;
    var formData = new FormData();
    var file = files[0];

    formData.append('file-select',file,file.name);
    formData.append('productId',document.getElementById('product_id').value)

    ShowSpinner();
    Hidebtn();

    xhr.send(formData);
    xhr.onreadystatechange = function(){
        if(xhr.readyState==4 && xhr.status==200)
        {
            fileSelect.value=null;
            HideSpinner();
            Showbtn();
            loadImages();
        }
    };
}

function loadImages()
{
    let xhr = new XMLHttpRequest();
    xhr.open('GET','/admin/product/image/'+document.getElementById('product_id').value , true);
    xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
    xhr.send();
    xhr.onreadystatechange = function (){
        if(xhr.readyState==4 && xhr.status==200)
        {
            allImagesHolder.innerHTML = xhr.responseText;
        }
    };
}

function imageDelete(order,id)
{
    let xhr = new XMLHttpRequest();
    xhr.open('GET','/admin/product/image/'+order+'/'+id , true)
    xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
    xhr.send();
    xhr.onreadystatechange = function (){
        loadImages();
    };
}

function ShowSpinner()
{
    var btn = document.getElementById('spinnerHolder');
    btn.style.display='block';
}
function Showbtn()
{
    var btn = document.getElementById('uploadBtnHolder');
    btn.style.display='block';
}
function HideSpinner()
{
    var btn = document.getElementById('spinnerHolder');
    btn.style.display='none';
}
function Hidebtn()
{
    var btn = document.getElementById('uploadBtnHolder');
    btn.style.display='none';
}
