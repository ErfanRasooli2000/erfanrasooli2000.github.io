let allBox = document.getElementsByClassName('address-box');
let allCheckBox = document.getElementsByClassName('address-checkBox');
let idHolder = document.getElementById('address-id');
function selectAddress(id,count)
{
    for(let i=0 ; i<allBox.length ; i++)
    {
        if(i==count)
        {
            allBox[i].style.backgroundColor='#f4f6f8';
            allBox[i].style.border='2px solid green';
            allCheckBox[i].style.opacity='1';
            idHolder.value = id;
        }
        else
        {
            allBox[i].style.backgroundColor='white';
            allBox[i].style.border='2px solid dimgray';
            allCheckBox[i].style.opacity='0';
        }
    }
}
