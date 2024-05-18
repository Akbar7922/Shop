<div>
    <label for="male" class="form-label mt-3">آقا
        <input type="radio" class="form-check-input" name="gender" id="male" value="1" @if(Auth::user()->isMale == 1) checked @endif>
    </label>
    <label for="female" class="form-label mt-3">خانم
        <input type="radio" class="form-check-input" name="gender" id="female" value="0" @if(Auth::user()->isMale == 0) checked @endif>
    </label>
</div>
