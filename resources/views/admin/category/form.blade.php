<div class="row">
    <div class="col-xs-12 col-md-6">
        @include('admin.partials.errors')
        <form action="" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="category_name">عنوان :</label>
                <input type="text" class="form-control" name="category_name" id="category_name"
                       value="{{old('category_name',isset($categoryItem) ? $categoryItem->category_name : '')}}">
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">ذخیره اطلاعات</button>
            </div>
        </form>
    </div>
</div>
