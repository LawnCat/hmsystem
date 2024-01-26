function buy(id, price, count, money) {
    if (count <= 0) {
        alert("库存不足");
        return;
    }
    if (money < price) {
        alert("余额不足");
        return;
    }

    if (confirm("请确认是否购买？")) {
        location.href = "../../controllers/user/buy.php?id=" + id + '&' + 'price=' + price;
    }
    else {
    }
}

function to_index() {
    window.location.href = "../../index.html";
}