<form action="/TODOLIST/src/list.php" method="POST">
    <div class="side">
        <div class="date">
            <a href="/TODOLIST/src/list.php"><?php echo date("Y-m-d"); ?></a>
            <br><br>
            <input type="date" name="select_date" value="<?php echo date("Y-m-d"); ?>">
            <br><br>
        </div>
        <div class="category_bar">
            <input type="radio" id="category1" name="category_id" value="1">
            <label for="category1">카테고리1</label>
            <br><br>
            <input type="radio" id="category2" name="category_id" value="2">
            <label for="category2">카테고리2</label>
            <br><br>
            <input type="radio" id="category3" name="category_id" value="3">
            <label for="category3">카테고리3</label>
            <br><br>
            <input type="radio" id="category4" name="category_id" value="4">
            <label for="category4">카테고리4</label>
        </div>
    </div>
</form>