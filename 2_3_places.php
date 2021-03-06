<!DOCTYPE html>
<html>
    <?php require('0_head.php'); ?>
    <body>
        
        <?php require('db_connect.php'); ?>

        <!-- Шапка -->
        <?php require('0_header.php'); ?>
        <!-- /Шапка -->

        <!-- Тело -->
        <?php $tbl = 'places'; ?>
        <div class="uk-container uk-box-shadow-large" style="width: 80vw; height: 100%; margin-bottom: 50px; padding-bottom: 50px; min-width: 1200px;">
        <h1 class="uk-heading-divider uk-text-center uk-margin-medium-top">Список всех площадок</h1>
        
        
        <div class="uk-flex-inline uk-flex-between" style="width: 100%; height: 100px; min-height: 116px; min-width: 1200px;">
            <div class="uk-flex uk-box-shadow-small" style="width: 82%; height: 100%; min-width: 984px;">
                <form name="filter" method="GET" action="2_3_places.php" style="padding: 12px;">
                    <div class="uk-flex uk-flex-wrap" style="width: 100%; height: 100%;">
                        <div class="uk-flex uk-flex-nowrap uk-flex-left" style="height: 52px;">    
                            <div style="height: 40px; width: 60px;">
                                <input class="uk-input" type="text" placeholder="ID" name="id">
                            </div>
                            <div style="height: 40px; margin-left: 30px; width: 200px;">
                                <select class="uk-select" name="Этаж">
                                    <option selected="selected">Этаж</option>
                                    <?php
                                        $sql_fio = 'SELECT `places`.`Этаж` FROM `places` GROUP BY `Этаж`';
                                        $result = mysqli_query($link, $sql_fio);
                                        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                        foreach ($rows as $row) 
                                        {
                                            echo '<option>' . $row['Этаж'] . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <p style="height: 20px; margin: 10px 0 auto 30px;">Площадь: </p>
                            <div style="height: 40px; margin-left: 10px; width: 100px;">
                                <input class="uk-input" type="text" placeholder="От"  name="Площадь">
                            </div>
                            <div style="height: 40px; margin-left: 10px; width: 100px;">
                                <input class="uk-input" type="text" placeholder="До"  name="Площадь_2">
                            </div>
                            
                            <p style="height: 20px; margin: 10px 10px auto 30px;">Цена: </p>
                            <div style="height: 40px; width: 120px;">
                                <input class="uk-input" type="text" placeholder="От"  name="Цена">
                            </div>
                            <div style="height: 40px; margin-left: 10px; width: 120px;"  name="Цена_2">
                                <input class="uk-input" type="text" placeholder="До">
                            </div>
                        </div>
                        
                        <div class="uk-flex uk-flex-nowrap uk-flex-left" style="height: 40px;">
                            <div style="height: 40px; width: 100px;">
                                <input class="uk-input" type="text" placeholder="Код места"  name="kod">
                            </div>
                        </div>
                    </div>
                <input type="hidden" name="table" value="places">
                <input class="uk-button uk-button-primary uk-align-left" style="width: 200px; margin-top: 25px; margin-left: -10px;" type="submit" value="Применить">
                </form>
            </div>
        
            <div class="uk-flex uk-flex-bottom" style="height: 100%; padding: 52px 0 0 12px;">
                <button class="uk-button uk-button-primary" style="width: 200px; margin: 0;" onclick="window.location.href = './edit.php?mod=add&t=<?php echo $tbl;?>';">Добавить запись</button>
            </div>
        </div>
        
        
        <?php require('2_3_1_table.php'); ?>
        </div>
        <!-- /Тело -->
    </body>
</html>