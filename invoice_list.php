<?php
include_once "base.php";

// $period=ceil(date("m")/2);
// echo $period;

$period=!empty($_GET['period'])?$_GET['period']:ceil(date("m")/2);
//三元運算子，若$_GET['period]帶回來有值就拿來用，若無就用ceil(date("m")/2得到期別值

// $sql="select * from `invoices` where period='$period' order by date desc";

// $rows=$pdo->query($sql)->fetchAll();
//刪除上兩行，導入以下自訂函式撈資料
$rows=all('invoices',['period' => $period],' order by date '); /* order by date 前要空格 */

//測試用可刪掉了
// foreach($rows as $row){
//     echo $row['code'].$row['number']."<br>";
// }
?>

<div class='row justify-content-around' style="list-style-type:none;padding:0">
<li><a href="?do=invoice_list&period=1">1,2月</a></li>
<li><a href="?do=invoice_list&period=2">3,4月</a></li>
<li><a href="?do=invoice_list&period=3">5,6月</a></li>
<li><a href="?do=invoice_list&period=4">7,8月</a></li>
<li><a href="?do=invoice_list&period=5">9,10月</a></li>
<li><a href="?do=invoice_list&period=6">11,12月</a></li>


</div>


<table class="table text-center">
    <tr>
        <td>發票號碼</td>
        <td>消費日期</td>
        <td>消費金額</td>
        <td>操作</td>
    </tr>

<?php
foreach($rows as $row){
?>
<tr>
    <td><?=$row['code'].$row['number']?></td>
    <td><?=$row['date']?></td>
    <td><?=$row['payment']?></td>
    <td>
    <button class="btn btn-sm btn-primary">
        <a class="text-light" href="?do=edit_invoice&id=<?=$row['id'];?>">編輯</a>
        </button>
    <button class="btn btn-sm btn-danger">
    <a class="text-light" href="?do=del_invoice&id=<?=$row['id'];?>">刪除
    </button>
    <button class="btn btn-sm btn-success">
    <a class="text-light" href="?do=award&id=<?=$row['id'];?>">對獎
    </button>
    </td>
</tr>
<?php
}
?>
</table>