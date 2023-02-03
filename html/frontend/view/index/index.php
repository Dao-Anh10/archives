<div class="container mt-3">
    <h2>Danh sách</h2>
    <div class="d-flex justify-content-between">
        <p>Những tác phẩm tiêu biểu:</p>
        <a href="<?= app()->baseUrl ?>/add-book">Thêm sách</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sách</th>
                <th>Thể loại</th>
                <th>Tác giả</th>
                <th>Năm xuất bản</th>
                <th>Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->books as $book) : ?>
                <tr>
                    <td><?= $book->book_id ?></td>
                    <td><?= $book->book_name ?></td>
                    <td><?= $book->category ?></td>
                    <td><?= $book->author ?></td>
                    <td><?= $book->year_of_publication ?></td>
                    <td>
                        <a href="<?= app()->baseUrl ?>/delete-book/<?= $book->book_id ?>">Xóa</a>
                        <a href="<?= app()->baseUrl ?>/update-book/<?= $book->book_id ?>">Sửa</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>

    </table>

</div>