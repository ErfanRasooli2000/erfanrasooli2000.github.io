let searchBox = document.getElementById('searchText');
searchBox.addEventListener('input',search);
searchBox.addEventListener('focusout',function(){
    setTimeout(()=> {
        disabler()
    },500);
});
searchBox.addEventListener('focus',enabler);

let text;

function disabler()
{
    document.getElementById('search_results').style.display = 'none';
}
function enabler()
{
    document.getElementById('search_results').style.display = 'block';
}

function search()
{
    text = searchBox.value;
    if(searchBox.value.trim()=='')
    {
        disabler();
    }
    else
    {
        let xhr = new XMLHttpRequest();
        xhr.open('get','/search/'+escape(text),true);
        document.getElementById('searchBtnEnter').href = '/search/result/'+escape(text);
        xhr.send();
        xhr.onreadystatechange = function ()
        {
            //document.body.innerHTML = xhr.responseText;
            if(xhr.readyState==4 && xhr.status==200)
            {
                if(xhr.responseText=='null')
                {
                    disabler();
                }
                else
                {
                    enabler();
                    document.getElementById('search_results').innerHTML = xhr.responseText;
                }
            }
        };
    }
}
