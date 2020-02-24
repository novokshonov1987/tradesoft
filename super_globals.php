<?php
/**
 * Создать форму, для ввода двух чисел, после отправки вывести их сумму
 */
?>
<form method="post" enctype="multipart/form-data">
    <label>Первое число: <input type="text" name="forms_fields[number_1]" required></label>

    <input type="submit">
</form>

    <script language='JavaScript' type="text/javascript">
        var i = 2;

        function ff() {
            document.getElementById('form_inner').innerHTML = document.getElementById('form_inner').innerHTML +"<input type='text' name='input_no_" + i + "'/><br/>";
            i++;
        }
    </script>
    <form name='form' id='form' action='#' method='post'>
        <span name='form_inner' id='form_inner'>
            <input type='text' name='input_no_1'/>
        </span>
        <input name='frm_sbm' type='submit' value='Submit request'/>
    </form>

    <input type='button' value='Add' onclick="ff()">

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