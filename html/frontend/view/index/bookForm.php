<h1 class="text-center"><?= empty($this->book) ? 'Thêm sách' : 'Cập nhật thông tin sách' ?></h1>

<form action="<?= app()->baseUrl ?>/<?= empty($this->book) ? 'add-book' : 'update-book/' . $this->book->book_id  ?>" method="post" class="container needs-validation" novalidate>
    <div class="mb-3 mt-3">
        <label for="book-name" class="form-label">Tên sách:</label>
        <input value="<?= empty($this->book) ? '' : $this->book->book_name ?>" type="text" class="form-control" id="book-name" placeholder="Tên sách" name="Book[book_name]" required>
        <div class="invalid-feedback">Vui lòng điền vào tên sách.</div>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Thể loại:</label>
        <input value="<?= empty($this->book) ? '' : $this->book->category ?>" type="text" class="form-control" id="category" placeholder="Thể loại" name="Book[category]" required>
        <div class="invalid-feedback">Vui lòng điền vào thể loại.</div>
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">Tác giả:</label>
        <input value="<?= empty($this->book) ? '' : $this->book->author ?>" type="text" class="form-control" id="author" placeholder="Tác giả" name="Book[author]" required>
        <div class="invalid-feedback">Vui lòng điền vào tác giả.</div>
    </div>
    <div class="mb-3">
        <label for="year" class="form-label">Năm xuất bản:</label>
        <input value="<?= empty($this->book) ? '' : $this->book->year_of_publication ?>" type="number" class="form-control" id="year" placeholder="Năm sản xuất" name="Book[year_of_publication]" required>
        <div class="invalid-feedback">Vui lòng điền vào năm xuất bản.</div>
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>