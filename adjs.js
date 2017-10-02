function us_pasal() {
    if (document.getElementById('al_aduser').value == '') {
        alert('用户名不能为空');
        return false;
    } else {
        if (document.getElementById('al_adoldpass').value == '') {
            alert('原密码不能为空');
            return false;
        } else {
            if (document.getElementById('al_adnewpass').value == '') {
                alert('新密码不能为空');
                return false;
            } else {
                if (document.getElementById('al_adrnewpass').value == '') {
                    alert('请再次输入新密码');
                    return false;
                } else {
                    if ("" != document.getElementById("al_adnewpass").value
                        && document.getElementById("al_adrnewpass").value != document.getElementById("al_adnewpass").value) {
                        alert('两次输入的新密码不一致');
                        return false;
                    } else {
                        return true;
                    }
                }
            }
        }
    }
}
function ins_ad() {
    if (document.getElementById('in_admin_login').value == '') {
        alert('请输入用户名');
        return false;
    } else {
        if (document.getElementById('in_admin_pass').value == '') {
            alert('请输入密码');
            return false;
        } else {
            if (document.getElementById('in_email').value == '') {
                alert('请输入邮箱地址');
                return false;
            } else {
                if ("" != document.getElementById("in_admin_pass").value
                    && document.getElementById("in_radmin_pass").value != document.getElementById("in_admin_pass").value) {
                    alert('两次输入的密码不一致');
                    return false;
                } else {
                    var filtertwo = /^0?(13|14|15|18)[0-9]{9}$/;
                    if (!filtertwo.test(document.getElementById('in_phone').value)) {
                        alert('您输入的手机号码格式有误');
                        return false;
                    } else {
                        var filter = /([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})/;
                        if (!filter.test(document.getElementById('in_email').value)) {
                            alert('您输入的邮箱格式有误');
                            return false;
                        } else {
                            return true;
                        }
                    }
                }
            }
        }
    }
}
function al_adrpas(){
    if(""!= document.getElementById("al_adnewpass").value
        && document.getElementById("al_adrnewpass").value!=document.getElementById("al_adnewpass").value){
        document.getElementById('al_adpasfal').innerHTML="两次输入的新密码不一致!";
    } else {
        document.getElementById('al_adpasfal').innerHTML="";
    }
}
function repass(){
    if(""!= document.getElementById("in_admin_pass").value
        && document.getElementById("in_radmin_pass").value!=document.getElementById("in_admin_pass").value){
        document.getElementById('rpassor').innerHTML="两次输入的密码不一致!";
    } else {
        document.getElementById('rpassor').innerHTML="";
    }
}
function reema() {
    var filter = /([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})/;
    if (!filter.test(document.getElementById('in_email').value)){
        document.getElementById('remor').innerHTML="邮箱格式有误!";
    }else{
        document.getElementById('remor').innerHTML="";
    }
}
function chphone() {
    var filtertwo = /^0?(13|14|15|18)[0-9]{9}$/;
    if (!filtertwo.test(document.getElementById('in_phone').value)){
        document.getElementById('cphone').innerHTML="手机号码格式有误!";
    }else{
        document.getElementById('cphone').innerHTML="";
    }
}