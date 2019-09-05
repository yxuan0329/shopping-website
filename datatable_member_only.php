<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title></title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">

<script src="//code.jquery.com/jquery-3.3.1.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script src="datatable_member.js"></script>
<style>
body {
    font-family: "微軟正黑體";
}

.error {
    color: #D82424;
    font-weight: normal;
    display: inline;
    padding: 1px;
}
</style>
</head>

<body>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 text-center">
            <form class="form-horizontal form-inline" name="form1" id="form1" method="post">
                <input type="hidden" name="oper" id="oper" value="insert">
                <input type="hidden" name="mid_old" id="mid_old" value="">
                <table id="edit" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">會員編號</th>
                            <th class="text-center">帳號</th>
                            <th class="text-center">姓氏</th>
                            <th class="text-center">名字</th>
                            <th class="text-center">生日</th>
                            <th class="text-center">信箱</th>
                            <th class="text-center">密碼</th>
                            <th class="text-center">手機</th>
                            <th class="text-center">存檔/取消</th>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <input type="text" id="mid" name="mid" style="width:80px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="username" name="username" style="width:110px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="first_name" name="first_name" style="width:110px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="last_name" name="last_name" style="width:110px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="birthday" name="birthday"style="width:80px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="email" name="email" style="width:110px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="password" name="password" style="width:110px">
                            </td>
                            <td class="text-center">
                                <input type="text" id="mobile" name="mobile" style="width:110px">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-xs" id="btn-save"><i class="glyphicon glyphicon-save"></i>存檔</button>
                                <button type="reset" class="btn btn-danger btn-xs" id="btn-cancel">取消</button>
                            </td>
                        </tr>
                    </thead>
                </table>
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th class="text-center">會員編號</th>
                            <th class="text-center">帳號</th>
                            <th class="text-center">姓氏</th>
                            <th class="text-center">名字</th>
                            <th class="text-center">生日</th>
                            <th class="text-center">信箱</th>
                            <th class="text-center">密碼</th>
                            <th class="text-center">手機</th>
                           <th class="text-center">修改/刪除</th>
                        </tr>
                    </thead>
                </table>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>