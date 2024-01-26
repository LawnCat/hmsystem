
function to_index() {
    window.location.href = "../../index.html";
}
function modify_data(id) {
    window.location.href = "modify_ticket.php?id=" + id;
}
function delete_data(id) {
    if (confirm("确认是否删除")) {
        window.location.href = "../../controllers/admin/ticket_delete.php?id=" + id;
    }
}


function search() {
    var search = document.getElementById("search_val").value;
    if (search == "") {
        return;
    }
    else {
        // window.location.href = "search.php?search=" + search;
    }

}