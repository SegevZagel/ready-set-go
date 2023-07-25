$("#logoutBtn").click(function () {
    $.ajax({
        type: 'POST',
        url: '/ready_set_go/api/logout.php',
        success: function (res) {
            window.location.href = "index.php";
        }
    });
});

function deleteUser(userId) {
if (confirm("Are you sure you want to delete this user?")) {
    $.ajax({
        type: 'POST',
        url: '/ready_set_go/api/delete_user.php',
        data: {
            user_id: userId
        },
        success: function (res) {
            alert(res);
            location.reload();
        }
    });
}
}