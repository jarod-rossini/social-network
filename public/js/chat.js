document.getElementById('chat').addEventListener('submit', function(e){
    e.preventDefault();

    var data = new FormData(this);

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.response);

            var res = this.response;

            $('#showmsg').append(res.msg);
            $('#msg_zone').val('');
        } else if(this.readyState == 4){
            alert('Une erreur est survenue...');
        }
    };

    xhr.open('POST', 'chatphp', true);
    xhr.responseType = 'json';
    xhr.send(data);

    return false;
});

function clearContents(element) {
    element.value = '';
}