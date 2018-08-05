function stringCheck(str) {
    let len = str.length;
    for (let i = 0; i < len; i++) {
        let buf = str.charAt(i);
        if (buf < '0' || buf > '9') return false;
    }
    return true;
}

function redirect() {
    const id = document.getElementById("keyword").value;
    if (id.length === 0) {
        alert("索引串不能为空");
    } else {
        if (stringCheck(id)) window.location.href = id;
        else alert("索引串只能由纯数字组成");
    }
}
