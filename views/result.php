<div><a href="<?=BASE_URL?>import">
        <button type="button" class="btn btn-secondary">Import data</button>
    </a>
    <a href="<?=BASE_URL?>clear">
        <button type="button" class="btn btn-danger">Clear all records</button>
    </a>
</div>
<br>
<?php if ($users === []) : ?>
    <div class="alert alert-primary" role="alert">
        В базі данних немає користувачів
    </div>
<?php else : ?>
    <table>
        <tr>
            <form>
            <td>Фільтри</td>
            <td><input class="form-control" type="text" name="UID" placeholder="UID"></td>
            <td><input class="form-control" type="text" name="Name" placeholder="Name"></td>
            <td><input class="form-control" type="text" name="Age" placeholder="Age"></td>
            <td><input class="form-control" type="text" name="Email" placeholder="Email"></td>
            <td><input class="form-control" type="text" name="Phone" placeholder="Phone"></td>
            <td>
                <select class="form-control" name="Gender">
                    <option value="">Gender</option>
                    <option value="male">male</option>
                    <option value="female">female</option>
                </select>
            </td>
            <td>
                <button class="btn btn-info" type="submit">Фільтрувати</button>
                <a href="<?=BASE_URL?>result"><button class="btn btn-secondary">Скинути</button></a>
            </td>
            </form>
        </tr>
    </table>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>UID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
        </tr>
        </thead>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['UID'] ?></td>
                <td><?= $user['Name'] ?></td>
                <td><?= $user['Age'] ?></td>
                <td><?= $user['Email'] ?></td>
                <td><?= $user['Phone'] ?></td>
                <td><?= $user['Gender'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <form action="" method="post">
        <button class="btn btn-primary mb-1" name="export">Export</button>
    </form>
<?php endif; ?>

