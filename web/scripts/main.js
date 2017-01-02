var buttonState = {
    "text": false,
    "html": false,
    "html-select": false,
    "sql": false,
    "sql-no-id": false,
    "json": false
};

function toggle(part) {
    var html = document.getElementById(part);
    var btn = document.getElementById("btn-" + part);

    if (buttonState[part]) {
        html.style.display = "none";
        btn.innerText = "表示";
    } else {
        html.style.display = "block";
        btn.innerText = "非表示";
    }

    buttonState[part] = !buttonState[part];
}
