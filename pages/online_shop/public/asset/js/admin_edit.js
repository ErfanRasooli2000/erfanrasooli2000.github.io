let subject_edit = document.getElementById('subject_edit');
let category_edit = document.getElementById('category_edit');
subject_edit.addEventListener('change',createEditCategory);

function createEditCategory()
{
    let id = subject_edit.value;
    let xhr = new XMLHttpRequest();
    xhr.open('get','/find/category/'+id,true);
    xhr.send();
    xhr.onreadystatechange = function (){
        if(xhr.readyState==4 && xhr.status==200)
        {
            category_edit.innerHTML=xhr.responseText;
        }
    };
}
