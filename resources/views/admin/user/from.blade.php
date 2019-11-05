<div class="row">
    <div class="col-xs-12 col-md-6">
        @include('admin.partials.errors')
        <form action="" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">نام کامل :</label>
                <input type="text" class="form-control" name="name" id="name"
                       value="{{old('name',isset($userItem) ? $userItem->name : '')}}">
            </div>
            <div class="form-group">
                <label for="email">ایمیل :</label>
                <input type="email" class="form-control" name="email" id="email"
                       value="{{old('email',isset($userItem) ? $userItem->email : '')}}">
            </div>
            <div class="form-group">
                <label for="password">رمز عبور :</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="role">نقش کاربری :</label>
                <select name="role" id="role" class="form-control">
                    <option value="1" {{ isset($userItem) && $userItem->role==1 ? 'selected' :'' }}>کاربر عادی</option>
                    <option value="2" {{ isset($userItem) && $userItem->role==2 ? 'selected' :'' }} >اپراتور</option>
                    <option value="3" {{ isset($userItem) && $userItem->role==3 ? 'selected' :'' }}>مدیر</option>
                </select>
            </div>
            <div class="form-group">
                <label for="wallet">موجودی کیف پول :</label>
                <input type="text" class="form-control" name="wallet" id="wallet" value="{{old('wallet',isset($userItem) ? $userItem->wallet : 0)}}">
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">ذخیره اطلاعات</button>
            </div>
        </form>
    </div>
</div>