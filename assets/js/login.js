function clearCookie() {
    var date = new Date(0);
    document.cookie = 'login=; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    document.cookie = 'passwd=; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    document.location.href='index.php';
}
function showLogin() {
    document.getElementsByClassName('login')[0].style.display='block';
    if(document.getElementsByTagName('nav')[0].style.display==='block') document.getElementsByTagName('nav')[0].style.display='';
}