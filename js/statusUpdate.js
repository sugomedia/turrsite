$(document).ready(function (){
    $(".statusUpdate").on('change', function() {
        let value = this.value;

        $('.useravatar').load('users/users_statusUpdate.php', {
            status: value
        });
        
    });
});