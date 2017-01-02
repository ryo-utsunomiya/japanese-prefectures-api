var buttonState = {
    "text": true,
    "html": true,
    "html-select": true,
    "sql": true,
    "sql-no-id": true,
    "json": true
};

/**
 * 項目の表示・非表示を切り替える
 *
 * @param id 表示を切り替える項目のid
 */
function toggle(id) {
    var target = document.getElementById(id);
    var button = document.getElementById("btn-" + id);

    if (!target || !button) {
        throw new Error("指定したIDの要素がみつかりません:" + id);
    }

    if (buttonState[id]) {
        target.style.display = "none";
        button.innerText = "表示";
    } else {
        target.style.display = "block";
        button.innerText = "非表示";
    }

    buttonState[id] = !buttonState[id];
}

// 各項目が初期表示で非表示になるようにする
document.addEventListener("DOMContentLoaded", function () {
    Object.keys(buttonState).forEach(function (id) {
        toggle(id);
    });
});