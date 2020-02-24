<html>
<head>
    <title>Динамическое добавление поля по желанию пользователя.</title>
    <script language="javascript">
        var items=1;
        function AddItem() {
            div=document.getElementById("items");
            button=document.getElementById("add");
            items++;
            newitem="<strong>Поле " + items + ": </strong>";
            newitem+="<input type=\"text\" name=\"item" + items;
            newitem+="\" size=\"45\"><br>";
            newnode=document.createElement("span");
            newnode.innerHTML=newitem;
            div.insertBefore(newnode,button);
        }
    </script>
</head>
<body>
<form  method="post" name="form1">
    <div ID="items">
        <strong>Поле 1: </strong><input type="text" name="item1" size="45"><br>
        <input type="button" value="Добавить поле" onClick="AddItem();" ID="add">
    </div>
    <br>
    <input name='frm_sbm' type='submit' value='Submit request'/>
</form>
</body>
</html>


<?php
if (!empty($_POST)) {
    var_dump($_POST);
//    if (is_numeric( $_POST['number_1'])
//        && is_numeric($_POST['number_2'])
//        && ($_POST['number_1'] > 0)
//        && ($_POST['number_2'] > 0)
//    )
//        {
//            $summa = $_POST['number_1'] +  $_POST['number_2'];
//            echo 'Сумма чисел равна: ', ($summa);
//        } elseif(!is_numeric( $_POST['number_1']) || !is_numeric( $_POST['number_2'])) {
//        $summa_string = $_POST['number_1'] .  $_POST['number_2'];
//        echo 'Конкатенация строк: ', ($summa_string);
//    }

}

?>