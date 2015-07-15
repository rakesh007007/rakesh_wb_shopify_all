function httpGet(theUrl){
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false );
    xmlHttp.send( null );
    return xmlHttp.responseText;
}

console.log(httpGet("/admin/discounts.json?limit=50&order=id+DESC&direction=next HTTP/1.1"));
