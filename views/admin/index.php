<?php include ROOT . '/views/layouts/header.php' ?>


<div class="container">
    <?php include ROOT . '/views/layouts/messages.php' ?>

    <div class="row">

        <div class="col-md-3 jumbotron">
            <form action="/admin" method="post">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Имя" id="inputName">
                </div>

                <div class="form-group">
                    <input type="tel" name="phone" class="form-control" placeholder="Телефонный номер" id="inputPhone">
                </div>

                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Ваш email" id="inputEmail">
                </div>

                <div class="form-group">
                    <input type="number" name="age" class="form-control" placeholder="Ваш возраст" id="inputAge">
                </div>

                <button type="submit" class="btn btn-primary">Поиск</button>
            </form>
        </div>

        <div class="col-sm-9">

            <?php if ($resetBtn): ?>
                <a class="btn btn-primary mb-4" href="/admin">Все клиенты</a>
            <?php endif; ?>

            <div class="card mb-5">
                <table class="table table-sm mb-0">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col" style="padding-left: 20px;">Имя</th>
                        <th scope="col">Телефон</th>
                        <th scope="col">Email</th>
                        <th scope="col">Age</th>
                        <th scope="col">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($clients as $client): ?>
                        <tr>
                            <td style="padding-left: 20px;"><?php echo $client['name'] ?></td>
                            <td><?php echo $client['phone'] ?></td>
                            <td><?php echo $client['email'] ?></td>
                            <td> <?php echo $client['age'] ?></td>
                            <td>
                                <a class="btn btn-secondary" href="admin/remove/<?php echo $client['id'] ?>"
                                   onclick="return confirm('Удалить клиента?')">Удалить</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

<?php include ROOT . '/views/layouts/footer.php' ?>

