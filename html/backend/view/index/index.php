<h1>Index page</h1>
<h2 style="color: red;"><?= $this->page ?></h2>
<h3 style="color: #af2caf;">Params: <?= '[' . implode(", ", $this->params) . ']' ?></h3>

<table>
    <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Name</td>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($this->data as $book) : ?>
            <tr>
                <td><?= $book->item_id ?></td>
                <td><?= $book->title ?></td>
                <td><?= $book->content ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>