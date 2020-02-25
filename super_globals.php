<script language="javascript">
    var items=1;
    function AddItem() {
        div=document.getElementById("items");
        button=document.getElementById("add");
        items++;
        newitem="<strong>Число " + items + ": </strong>";
        newitem+="<input type=\"text\" name=\"items[" + items + "]";
        newitem+="\" size=\"45\"><br>";
        newnode=document.createElement("span");
        newnode.innerHTML=newitem;
        div.insertBefore(newnode,button);
    }
</script>


<form  method="post" name="form1">
    <div ID="items">
        <strong>Число 1: </strong>
        <input type="text" name="items[1]" size="45">
        <br>
        <input type="button" value="Добавить число" onClick="AddItem();" ID="add">
    </div>
    <br>
    <input name='frm_sbm' type='submit' value='Отправить'/>
</form>

<?php
if (!empty($_POST)) {
    $summa = 0;
    $summa_string = '';
    $numeric = true;
    foreach ($_POST['items'] as $item){
        if (!is_numeric($item) || $item < 0){
            $numeric = false;
            break;
        }
    }
    if ($numeric == true){
        foreach ($_POST['items'] as $item){
            $summa += $item;
        }
    } else {
        foreach ($_POST['items'] as $item){
            $summa_string .= $item;
        }
    }
    echo 'сумма равна ', $summa ? $summa : $summa_string;
}

?>