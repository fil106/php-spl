<!doctype html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <meta charset="UTF-8">
    <title>Файловый менеджер</title>

</head>
<body>
    <div class="container">
        <h1 class="text-center">Файловый менеджер</h1>
        <a class="btn btn-primary" role="button" href="?id=main&path<?=$res_arr['old_path']; ?>">На уровень вверх</a>
        <table class="table table-bordered">

            <thead>
                <td>Название</td>
                <td>Размер, байт</td>
            </thead>

            <? print_r($res_arr); ?>


            <? if($res_arr['dirs']):?>
                        <? foreach($res_arr['dirs'] as $dirs) :?>
                            <tr>
                            <? foreach($dirs as $my_dir=>$val_dir) :?>
                                <td>
                                    <img src="fold.png" alt=""><a href="?id=main&path=<?=$val_dir;?>"><?=$my_dir;?></a>
                                </td>
                                <td>
                                    -
                                </td>
                            <? endforeach;?>

                            </tr>
                        <? endforeach;?>
                    <? endif;?>

            <? if($res_arr['files']):?>
                <? foreach($res_arr['files'] as $files) :?>
                    <tr>
                        <? foreach($files as $my_file=>$file_size) :?>
                            <td>
                                <img src="file.png" alt=""><a href="<?=$my_file;?>"><?=$my_file;?></a>
                            </td>
                            <td>
                                <?=$file_size;?>
                            </td>
                        <? endforeach;?>

                    </tr>
                <? endforeach;?>
            <? endif;?>




        </table>
        <div class="panel-footer">Чтобы сохранить файл, нажмите правой кнопкой мыши и выберите пункт "Сохранить как".</div>
    </div>
</body>
</html>