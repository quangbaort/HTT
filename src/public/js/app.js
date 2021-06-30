const post = (path , data) => {
let response;
$.ajax({
    url : path,
    type: 'post',
    data : data ,
    dataType : 'json',
    async : false,
    beforeSend : () => {

    },
    success : (res) => {
        console.log(res)
        response = res.data
    },
    error: function(jqXHR, textStatus, errorThrown){
        console.log(textStatus + ": " + jqXHR.status + " " + errorThrown);
        response = jqXHR.status
    }
})
    return response;
}
