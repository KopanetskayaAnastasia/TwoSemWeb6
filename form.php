<!DOCTYPE html>
<html lang ="ru">
  <head>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
      <link href="style.css" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Второй семестр задание №3</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="d-flex flex-column">
        <header>
          <div id="header" class="col-sm-12 p-1 order-md-0 mx-auto">
            <div id="own">Второй семестр задание №3</div>
          </div>
        </header>
        <div id="content">
          <div id = "form" class="col-sm-12 col-md-7 text-center p-1 order-md-4 mx-auto">
            <h1>Форма</h1>
            <?php
              if (!empty($messages)) {
                print('<div id="messages">');
                // Выводим все сообщения.
                foreach ($messages as $message) {
                  print($message);
                }
                print('</div>');
              }

              // Далее выводим форму отмечая элементы с ошибками классом error
              // и задавая начальные значения элементов ранее сохраненными.
             //print_r($values);
            ?>
            <form action="index.php" method="POST">
              <label>Ваше Имя:</label><br>
              <input name="fio" <?php print($errors['fio']? 'class="error"' : '');?> value="<?php print $values['fio']; ?>"/><br>

              <label>Еmail:</label>
              <input name="email" <?php print($errors['email']? 'class="error"':'');?> value="<?php print $values['email']; ?>"/><br>

              <label>Год рождения:</label><br>
              <select name="year" <?php print($errors['year'] ? 'class="error"' : '');?>>
                <?php 
                  for ($i = 1922; $i <= 2022; $i++) {
                    $selected = ($i == $values['year']) ? 'selected="selected"' : '';
                    printf('<option value="%d" %s>%d год</option>', $i, $selected, $i);
                  }
                ?>
              </select><br>

              <label>Пол:</label><br>
              <label><input name="gender" type="radio" value="w" <?php print($errors['gender']? 'class="error"': '');?> 
                        <?php if ($values['gender']=='w') print 'checked';?>/>Женский</label>
              <label><input name="gender" type="radio" value="m" <?php print($errors['gender']? 'class="error"': '');?> 
                        <?php if ($values['gender']=='m') print 'checked';?>/>Мужской</label><br>

              <label>Количество конечностей:</label><br>
              <label>1<input name="limbs" type="radio" value="1" <?php print($errors['limbs']? 'class="error"': '');?> 
                      <?php if ($values['limbs']=='1') print 'checked';?>/></label><br>
              <label>2<input name="limbs" type="radio" value="2" <?php print($errors['limbs']? 'class="error"': '');?> 
                       <?php if ($values['limbs']=='2') print 'checked';?>/></label><br>
              <label>3<input name="limbs" type="radio" value="3" <?php print($errors['limbs']? 'class="error"': '');?> 
                       <?php if ($values['limbs']=='3') print 'checked';?>/></label><br>
              <label>4<input name="limbs" type="radio" value="4"<?php print($errors['limbs']? 'class="error"': '');?> 
                       <?php if ($values['limbs']=='4') print 'checked';?>/></label><br>

              <label>Сверхспособности</label><br>
              <select name="ability[]" multiple="multiple" <?php print($errors['ability']? 'class="error"': '');?>>
                <option value="1" <?php $values['1'] == 1 ? print 'selected' : '';?>>none</option>
                <option value="2" <?php $values['2'] == 1 ? print 'selected' : '';;?>>Бессмертие</option>
                <option value="3" <?php $values['3'] == 1 ? print 'selected' : '';; ?>>Прохождения сквозь стены</option>
                <option value="4" <?php $values['4'] == 1 ? print 'selected' : '';; ?>>Левитация</option>
              </select><br>

              <label>Биография:</label><br>
              <textarea name="biography" type="textarea" <?php print($errors['biography']? 'class="error"': '');?>><?php print $values['biography']; ?></textarea><br>

              <input name='dd' hidden value=<?php print($_GET['edit_id']);?>>
              <input type="submit" name='save' value="Save"/>
              <input type="submit" name='del' value="Delete"/>
            </form>
            <a href='admin.php' class="button">Назад</a>
          </div>
        </div>
      <div>
    </div>
  </body>
</html>
    

