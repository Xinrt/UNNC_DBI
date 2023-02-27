function checkPhone() {
    var value=document.getElementById("idtelephoneNumber").value;
    var reg = /^\d+$/;
    if(reg.test(value) == false)
    {
        alert("The telephone number must consist of only numbers")
        return false;
    }
}