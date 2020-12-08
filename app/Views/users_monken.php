<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Codeigniter 4 Datatables Example - positronx.io</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="mt-3">
        <table class="table table-bordered" id="users-list">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    var csrfToken = '<?=csrf_hash();?>';
    var csrfName = '<?=csrf_token();?>';
    $(document).ready(function () {
        $('#users-list').DataTable({
            "order": [],
            "serverSide": true,
            "ajax": {
                url: '<?=base_url('users-monken');?>',
                type: 'POST',
                data: function ( d ) {
                    d.csrf_test_name = csrfToken;
                }

            }
        });
    });

    $(document).ajaxComplete(function (event, xhr, options) {
       console.log(xhr.responseText);
        let response = xhr.responseText;
        let responseObj = JSON.parse(response);
        csrfToken= responseObj['csrfToken'];
        csrfName= responseObj['csrfName'];
    });
</script>
</body>
</html>