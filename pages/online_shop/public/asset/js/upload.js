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
