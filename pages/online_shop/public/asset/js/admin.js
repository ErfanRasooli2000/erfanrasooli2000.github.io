let productParent = document.getElementById('productParent');
let categoryParent = document.getElementById('categoryParent');
let orderParent = document.getElementById('orderParent');

let productChild = document.getElementById('productChild');
let categoryChild = document.getElementById('categoryChild');
let orderChild = document.getElementById('orderChild');

productChild.style.display = 'none';
categoryChild.style.display = 'none';
orderChild.style.display = 'none';

productParent.addEventListener('click',function () {
    productChild.style.display = 'list-item';
    categoryChild.style.display = 'none';
    orderChild.style.display = 'none';
});
categoryParent.addEventListener('click',function () {
    productChild.style.display = 'none';
    categoryChild.style.display = 'list-item';
    orderChild.style.display = 'none';
});
orderParent.addEventListener('click',function () {
    productChild.style.display = 'none';
    categoryChild.style.display = 'none';
    orderChild.style.display = 'list-item';
});



let subject = document.getElementById('subject');
let category = document.getElementById('category');
let subCategory = document.getElementById('sub-category');

subject.addEventListener('change',createCategory);
category.addEventListener('change',createSubCategory);

HideCategory();
HideSubCategory();

let xhr = new XMLHttpRequest();
xhr.open('get','/find/subjects',true);
xhr.send();
xhr.onreadystatechange = function (){
    if(xhr.readyState==4 && xhr.status==200)
    {
        subject.innerHTML=xhr.responseText;
    }
};

function createCategory()
{
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
    subCategory.style.display="block";
}
function HideCategory()
{
    category.style.display="none";
}
function HideSubCategory()
{
    subCategory.style.display="none";
}

