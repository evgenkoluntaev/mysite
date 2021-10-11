<?php

	$host = 'localhost'; //адрес сервера
    $database = 'facilities'; //имя базы данных
    $user = 'root'; //имя пользователя
	$password = ''; // пароль
	
	$link = mysqli_connect($host, $user, $password, $database)
	or die("Ошибка " . mysqli_error($link));

	$client_code=htmlentities($_POST['id']);

	$result_client = mysqli_query($link, 'select * from clients where client_code ='.$client_code) or die("Ошибка " . mysqli_error($link));

	$client = mysqli_fetch_all($result_client, MYSQLI_ASSOC);

	$client_name = $client[0]["client_name"];

	$client_type = $client[0]["client_type"];

	$client_adress = $client[0]["client_adress"];

    $client_phone = $client[0]["client_phone"];
    
    $result_bond = mysqli_query($link, 'select * from bonds') or die('Ошибка '.mysqli_error($link));

    $rows_bond = mysqli_num_rows($result_bond);

    $bond = mysqli_fetch_all($result_bond, MYSQLI_ASSOC);

    mysqli_close($link);

    $invest_code = 1;
    
?>
<!DOCTYPE html>
<html lang='ru'>
    <head>
        <meta charset='utf-8'>
        <title>Аналитическая компания Евгения Колунтаева</title>
        <meta name='keywords' content='Инвестиции, заработок, надежность'>
        <meta name='desctiption' content='Вложите свои деньги правильно! 
        Работаем с самыми популярными инвест-центрами России.'>
        <link href='ISISCSS.css' rel='stylesheet'>
    </head>
    <body>
        <script>
        
           
            
        </script>
        <div class='site'>
            <div class='image'>
                <img src='uejin.jpg' alt='logo'>
            </div>
            <div class='header'>
                <h1>Аналитическая компания Евгения Колунтаева<sup>&copy</sup></h1>
            </div>
            <div class='intro'>
                <p> Хотите начать зарабатывать на инвестициях в крупные российские компании?<br>
                 Позвоните нам или воспользуйтесь сайтом. Ниже можно узнать больше о вложениях
                    в акции наших партнеров.</p>
            </div>
            <div class='current-client'>
                <p>Информация о клиенте:</p>
                <div>
                    <span>Имя: <b><?php echo $client_name; ?></b></span>
                    <span>Тип: <b><?php echo $client_type; ?></b></span>
                    <span>Адресс: <b><?php echo $client_adress; ?></b></span>
                    <span>Телефон: <b><?php echo $client_phone; ?></b></span>
                </div>
            </div>
            <div class='main-column-1'>
                <ul>
                    <li><span onclick='sber()'>Сбербанк</span></li>
                    <li><span onclick='gaz()'>Газпром</span></li>
                    <li><span onclick='neft()'>Роснефть</span></li>
                    <li><span onclick='oil()'>Лукойл</span></li>
                </ul>
            </div>
            <div class='main-column-2'><a name='home'></a>
                    <p>Название организации: <b id='bond_name'></b><br>
                        Минимальная сумма инвестиции: <b id='bond_min_sum'></b><br>
                        Рейтинг: <b id='bond_rating'></b><br>
                        Доходность за прошлый год: <b id='bond_last_year_profitability'></b><br><br>
                        Дополнительная информация: <b id='bond_other_information'></b>
                    </p>
                    <a href='#invest' class='option button_buy'>Посмотреть вариант</a>
            </div>
            <div class='invest hidden'>
                    <a name='invest'></a>
                    <span>Код инвестиции: <b id='invest_code'></b></span>
                    <span>Котировка: <b id='invest_quotation'></b></span>
                    <span>Дата покупки: <b id='buy_date'><?php echo date('d/m/Y'); ?></b></span>
                    <span>В: <b id='bond_name2'></b></span>
                    <a href='#home' class='button_buy2''>Приобрести</a>
            </div>
            <div class='footer'>
                <p>Make your life better!</p>
                <ul>
                    <li>Телефон: 89267569823</li>
                    <li>Почта: EvgeniyKoluntaevInvestment@gmail.com</li>
                </ul>
            </div>
        </div>
        <script>

            

            var sber = function(){
                document.getElementById('bond_name').innerHTML='<?php echo $bond[0]['bond_name']; ?>'
                document.getElementById('bond_min_sum').innerHTML='<?php echo $bond[0]['bond_min_sum']; ?>'
                document.getElementById('bond_rating').innerHTML='<?php echo $bond[0]['bond_rating']; ?>'
                document.getElementById('bond_last_year_profitability').innerHTML='<?php echo $bond[0]['bond_last_year_profitability']; ?>'
                document.getElementById('bond_other_information').innerHTML='<?php echo $bond[0]['bond_other_information']; ?>'
                <?php $quatation = $bond[0]['bond_min_sum']+rand(0, 1000); ?>
                document.getElementById('invest_quotation').innerHTML='<?php echo $quatation; ?>'
                document.getElementById('bond_name2').innerHTML='<?php echo $bond[0]['bond_name']; ?>'
                document.getElementById('invest_code').innerHTML='<?php echo $invest_code;  ?>';
            }
            var gaz = function(){
                document.getElementById('bond_name').innerHTML='<?php echo $bond[1]['bond_name']; ?>'
                document.getElementById('bond_min_sum').innerHTML='<?php echo $bond[1]['bond_min_sum']; ?>'
                document.getElementById('bond_rating').innerHTML='<?php echo $bond[1]['bond_rating']; ?>'
                document.getElementById('bond_last_year_profitability').innerHTML='<?php echo $bond[1]['bond_last_year_profitability']; ?>'
                document.getElementById('bond_other_information').innerHTML='<?php echo $bond[1]['bond_other_information']; ?>'
                <?php $quatation = $bond[1]['bond_min_sum']+rand(0, 1000); ?>
                document.getElementById('invest_quotation').innerHTML='<?php echo $quatation; ?>'
                document.getElementById('bond_name2').innerHTML='<?php echo $bond[1]['bond_name']; ?>'
                document.getElementById('invest_code').innerHTML='<?php echo $invest_code;  ?>';
            }
            var neft = function(){
                document.getElementById('bond_name').innerHTML='<?php echo $bond[2]['bond_name']; ?>'
                document.getElementById('bond_min_sum').innerHTML='<?php echo $bond[2]['bond_min_sum']; ?>'
                document.getElementById('bond_rating').innerHTML='<?php echo $bond[2]['bond_rating']; ?>'
                document.getElementById('bond_last_year_profitability').innerHTML='<?php echo $bond[2]['bond_last_year_profitability']; ?>'
                document.getElementById('bond_other_information').innerHTML='<?php echo $bond[2]['bond_other_information']; ?>'
                <?php $quatation = $bond[2]['bond_min_sum']+rand(0, 1000); ?>
                document.getElementById('invest_quotation').innerHTML='<?php echo $quatation; ?>'
                document.getElementById('bond_name2').innerHTML='<?php echo $bond[2]['bond_name']; ?>'
                document.getElementById('invest_code').innerHTML='<?php echo $invest_code;  ?>';
            }
            var oil = function(){
                document.getElementById('bond_name').innerHTML='<?php echo $bond[3]['bond_name']; ?>'
                document.getElementById('bond_min_sum').innerHTML='<?php echo $bond[3]['bond_min_sum']; ?>'
                document.getElementById('bond_rating').innerHTML='<?php echo $bond[3]['bond_rating']; ?>'
                document.getElementById('bond_last_year_profitability').innerHTML='<?php echo $bond[3]['bond_last_year_profitability']; ?>'
                document.getElementById('bond_other_information').innerHTML='<?php echo $bond[3]['bond_other_information']; ?>'
                <?php $quatation = $bond[3]['bond_min_sum']+rand(0, 1000); ?>
                document.getElementById('invest_quotation').innerHTML='<?php echo $quatation; ?>'
                document.getElementById('bond_name2').innerHTML='<?php echo $bond[3]['bond_name']; ?>'
                document.getElementById('invest_code').innerHTML='<?php echo $invest_code;  ?>';
            }

            var buy = function(){
                <?php $invest_code++; ?>
                document.getElementById('invest_code').innerHTML='<?php echo $invest_code;  ?>';
                alert('Ценная бумага успешно куплена');
                invest.classList.add('hidden');
            }

            var button = document.querySelector('.option')
            var invest = document.querySelector('.invest');
            var home = document.querySelector('.button_buy2');
            button.addEventListener('click', function(){
                invest.classList.remove('hidden');
            });
            home.addEventListener('click', function(){
                buy();
            })
            
        </script>
     </body>
</html>