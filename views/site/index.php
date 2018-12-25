<?php include ROOT . '/views/layouts/header.php' ?>

<div class="container">
    <?php include ROOT . '/views/layouts/messages.php' ?>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 jumbotron">
            <form action="/client/add" method="post">
                <div class="form-group">
                    <label for="inputName">Ваше имя</label>
                    <input required type="text" name="name" class="form-control" placeholder="Ваше имя" id="inputName">
                </div>

                <div class="form-group">
                    <label for="inputPhone">Ваш телефонный номер</label>
                    <input required type="tel" name="phone" class="form-control" placeholder="Ваш телефонный номер"
                           id="inputPhone">
                </div>

                <div class="form-group">
                    <label for="inputEmail">Ваш email</label>
                    <input required type="email" name="email" class="form-control" placeholder="Ваш email"
                           id="inputEmail">
                </div>

                <div class="form-group">
                    <label for="inputAge">Ваш возраст</label>
                    <input required type="number" name="age" class="form-control" placeholder="Ваш возраст"
                           id="inputAge">
                </div>

                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php' ?>

